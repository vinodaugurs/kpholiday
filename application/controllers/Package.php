<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller
{


    Public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('associate_model');
        $this->load->helper('form');
        $this->load->model('pack_model');
        $this->load->model('region_model');
        $this->load->model('site_model');
        $this->load->model('agent_model');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->model('sendmail_model'); 
    }


    function holidays()
    {
        $this->load->view('home/holidays');
    }

    function all_package()
    {
        $all = 0;
        $desti = $this->input->get_post('destination');
        $checkin = $this->input->get_post('checkin');
        $checkin1 = date('Y-m-d', strtotime($checkin));
        $checkout = $this->input->get_post('checkout');
        $checkout1 = date('Y-m-d', strtotime($checkout));
        $budget = $this->input->get_post('budget');
        $adult = $this->input->get_post('adults');
        $child = $this->input->get_post('kids');
        $all = $this->input->get_post('infant');

        $search = array(
            'desti' => $this->input->post('destination'),
            'checkin' => $this->input->post('checkin'),
            'checkout' => $this->input->post('checkout'),
            'budget' => $this->input->post('budget'),
            'adult' => $this->input->post('adults'),
            'all' => $all,
            'child' => $this->input->post('kids')
        );

        $data11['data1'] = $search;
        $this->session->set_flashdata('suc_msg', $data11['data1']);
        $this->load->view('home/package_list', $data11, true);
        redirect('package/package_list?d=' . $desti . '&&ci=' . $checkin1 . '&&co=' . $checkout1 . '&&b=' . $budget . '&&a=' . $adult . '&&al=' . $all . '&&ch=' . $child);
    }

    function package_list(){

        $desti = $_REQUEST['d'];
        $checkin = $_REQUEST['ci'];
        $checkout = $_REQUEST['co'];
        $budget = $_REQUEST['b'];
        $adult = $_REQUEST['a'];
        $all = $_REQUEST['al'];
        $child = $_REQUEST['ch'];

        $search = array(
            'desti' => $desti,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'budget' => $budget,
            'adult' => $adult,
            'all' => $all,
            'child' => $child

        );
        $data11['data1'] = $search;
        $this->load->view('home/package_list', $data11);
    }

    function package_view($id)
    {
        $data['detail'] = $this->pack_model->pack_details($id);
        $this->load->view('home/package_detail', $data);
    }

    function user_detail($id){
        $data['user_details'] = $this->agent_model->get_data_table('users', array('uid' => $id));
        $this->load->view('home/userDetail', $data);
    }

    function package_view_admin($id){
        $data['detail'] = $this->pack_model->pack_details($id);
        $this->load->view('home/package_detail_admin', $data);
    }

    public function package_booking($id){
        $userId = $this->session->userdata('uid');
        if (empty($userId)) {
            $this->session->set_flashdata('redirect_url', uri_string());
            redirect('login');
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email Id', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('post', 'Pin Code', 'required|regex_match[/^[0-9]{6}$/]');
        $this->form_validation->set_rules('IdProofId', 'Id Proof Select', 'required');
        $this->form_validation->set_rules('IdProofNumber', 'Enter Id Proof Value', 'required');
        $data = array();
        if ($this->form_validation->run()) {
            
            $condition = array('pack_id' => $this->input->post('package_id'));
            $tempData = $this->region_model->get_data('packages', $condition);
            
            $data['user_id'] = $this->input->post('user_id');
            $data['package_id'] = $this->input->post('package_id');
            $data['package_name'] = $tempData[0]['pack_name'];
            $data['title'] = $this->input->post('title');
            $data['user_name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['address'] = $this->input->post('address');
            $data['country'] = $this->input->post('country');
            $data['state'] = $this->input->post('state');
            $data['city'] = $this->input->post('city');
            $data['post'] = $this->input->post('post');
            $data['IdProofId'] = $this->input->post('IdProofId');
            $data['IdProofNumber'] = $this->input->post('IdProofNumber');
            $data['date'] = date('y-m-d');
            if ($_POST['bookb'] == "confirm") {
                $this->region_model->insert_data('package_booking', $data);

                //send mail
                unset($data['user_id']);
                $data['msgData'] = $data;
                $msg = $this->load->view('email/package', $data, true);
                $email = $data['email'];
                $subject = "KPholidays Package Booking";
                // Set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // Additional headers
                $headers .= 'From: KPholidays<no-reply@kpholidays.com>' . "\r\n";

                // Send email
                //mail($email, $subject, $msg, $headers);
                $this->sendmail_model->send_mail2("no-reply@kpholidays.com","kpholidays",$email,'KPholidays Package Booking',$msg);
                //send sms
                $this->load->library('sms');
                //$condition = array('pack_id' => $data['package_id']);
                //$tempData = $this->region_model->get_data('packages', $condition);
                $msg1 = "Your Package has been confirmed. Your Package Name: " . $tempData[0]['pack_name'] . ", Package Amount:" . $tempData[0]['price'] . " Please Check your email for more details. -KP Holidays.com";
                $mobile = $data['mobile'];
                $data = $this->sms->sendSms($mobile, $msg1);
                echo "<script>alert('Office member will contact you as soon as possible');window.location.href='" . redirect('user/package'). "';</script>";
            }
        }
        $data['detail'] = $this->pack_model->pack_details($id);
        $userId = $this->session->userdata('uid');
        $q = $this->db->get_where('users', array('uid' => $userId));
        $data['user_details'] = $q->result_array();
        $this->load->view('blocks/header');
        $this->load->view('home/package_booking', $data);
        $this->load->view('blocks/footer');
    }

    function city_search(){
        $city = $this->pack_model->package_city($this->input->get_post('term', true));
        echo json_encode($city);
    }
}

?>
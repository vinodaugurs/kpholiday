<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

    Public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('associate_model');
        $this->load->helper('form');
        $this->load->model('pack_model');
        $this->load->model('region_model');
        $this->load->model('site_model');
        $this->load->helper('html');
        $this->load->helper('url');
    }

    function holidays() {

        $this->load->view('home/holidays');
    }

    function all_package() {
//		$data['package']=$this->user_model->all_package($this->input->get_post('destination'));

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

        // $this->load->view('home/holiday_list',$data);         
    }

    function package_list() {

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

        //echo $data1['desti']; die;
        // print_r($search); die;
        //$this->load->view('site/package_view',$search);    

        $this->load->view('home/package_list', $data11);
    }

    function package_view($id) {

        $data['detail'] = $this->pack_model->pack_details($id);



        $this->load->view('home/package_detail', $data);
    }

    function user_detail($id) {

        $data['detail'] = $this->db->get_where('users', array('uid' => $id));



        $this->load->view('home/userDetail', $data);
    }

    function package_view_admin($id) {

        $data['detail'] = $this->pack_model->pack_details($id);



        $this->load->view('home/package_detail_admin', $data);
    }

    public function package_booking($id) {
        if (@$_POST['bookb'] == "confirm") {


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

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/package_booking');
            } else {


                $data = array();
                $data['user_id'] = $this->input->post('user_id');
                $data['package_id'] = $this->input->post('package_id');
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
                    //$this->db->insert('package_booking',$data);
                    $this->load->model('sendmail_model');


                    $data['msgData'] = $data;
                    $msg = $this->load->view('email/customer', $data, true);
                    $email = $data['email'];
                    $this->sendmail_model->send_mail2("no-reply@kpholidays.com", "kpholidays", $email, 'kpholidays Package Booking', $msg);

                    echo "<script>alert('Office member contact as soon as a');window.location.href='" . base_url() . "';</script>";
                }
            }
        } else {

            $data['detail'] = $this->pack_model->pack_details($id);
            $userId = $this->session->userdata('uid');
            $q = $this->db->get_where('users', array('uid' => $userId));

            $data['user_details'] = $q->result_array();

            //print_r($data);
            $this->load->view('home/package_booking', $data);
        }
    }

    function city_search() {

        $city = $this->pack_model->package_city($this->input->get_post('term', true));

        echo json_encode($city);
    }

}

?>
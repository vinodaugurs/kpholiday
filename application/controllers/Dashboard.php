<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('user_model');
        $this->load->model('agent_model');
        $this->load->model('pack_model');
        $this->load->library('upload');
        $this->load->model('region_model');
        $this->load->helper('directory');
        $this->load->database();
        date_default_timezone_set('Asia/Kolkata');
    }


    public function agent_auth()
    {
        $session = $this->session->userdata('uid');
        if (empty($session)) {
            redirect('http://www.kpholidays.com/');
        }
    }

    public function index()
    {
        $this->agent_auth();
        $user_uid = $this->session->userdata('uid');                       //agent     uid
        $auser_uid = $this->session->userdata('auid');                     //admin     uid
        $tuser_uid = $this->session->userdata('tuid');                     //traveler  uid

        if ($user_uid || $auser_uid || $tuser_uid) {
            if ($this->session->userdata('type') === 'Admin') {
                $arr['uid'] = $auser_uid;
                $this->load->view('admin/admin_header', $arr);
                $this->load->view('admin/admin_dashboard_view');
                $this->load->view('admin/admin_footer');

            } else if ($this->session->userdata('type') === 'agent') {
                $arr['uid'] = $user_uid;
                $this->load->view('asso_agent/nev', $arr);

            } else if ($this->session->userdata('type') === 'traveler') {
                $arr['uid'] = $tuser_uid;
                $this->load->view('traveler/dashboard_view', $arr);
            }
        }


    }


    public function del_customize($id)
    {
        $this->agent_auth();
        $this->associate_model->del_customize($id);
        echo "<script>alert('User has been removed!');</script>";
        $this->load->view('admin/customize');
    }

    public function c_detail($id)
    {
        $this->agent_auth();
        $data['detail'] = $this->associate_model->custom_detail($id);
        $this->load->view('admin/customize_detail', $data);
    }


    public function agent($id = null)
    {
        $this->agent_auth();
        $data['apdata'] = $this->pack_model->getallasso($id);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/agent_list');
        $this->load->view('admin/admin_footer');
    }

    public function addAgent()
    {
        $this->agent_auth();
        $this->load->view('admin/addAgent');
    }


    public function check_mail()
    {
        $this->agent_auth();
        $data = $this->input->post('email');
        $data = $this->agent_model->get_data_table('users', array('email' => $data, 'service_type' => 'agent'));
        //$array =  (array) $data;
        //print_r($data);
        if (isset($data[0])) {
            echo "Already Used";
        } else {
            echo "Unique Email Address";
        }
    }

    public function get_country()
    {

        $this->agent_auth();
        if (isset($_POST['data'])) {
            $value = $this->input->post('data');
            $data = $this->region_model->search_data('country', 'country', $value);
            $options = array();
            foreach ($data as $value) {
                $options['myData'][] = array(
                    'CODE' => $value['country'],
                    'id' => $value['id']);
            }
            echo json_encode($options);
        }
    }

    public function get_state()
    {

        $this->agent_auth();
        if (isset($_POST['data'])) {
            $value = $this->input->post('data');
            $data = $this->region_model->search_data('state', 'state', $value);
            $options = array();
            foreach ($data as $value) {
                $options['myData'][] = array(
                    'CODE' => $value['state'],
                    'id' => $value['id']);
                // array_push($temp,$value['city']);
            }
            // $arr = array_values($temp);
            // echo $data2;
            // print_r($arr);
            //   return $arr;
            echo json_encode($options);
        }
    }

    public function get_city()
    {
        $this->agent_auth();

        if (isset($_POST['data'])) {
            $value = $this->input->post('data');
            $data = $this->region_model->search_data('city', 'city', $value);
            $options = array();
            foreach ($data as $value) {
                $options['myData'][] = array(
                    'CODE' => $value['city'],
                    'id' => $value['id']);
                // array_push($temp,$value['city']);
            }
            // $arr = array_values($temp);
            // echo $data2;
            // print_r($arr);
            //   return $arr;
            echo json_encode($options);
        }
    }


    public function agentForm()
    {
        $this->agent_auth();

        $user_name = @$this->input->post('user_name');
        $first_name = @$this->input->post('first_name');
        $last_name = @$this->input->post('last_name');
        $password = @$this->input->post('password');
        $email = $this->input->post('email');
        $phone = @$this->input->post('phone');
        $address = @$this->input->post('address');
        $country = @$this->input->post('country');
        $pincode = $this->input->post('pincode');
        $state = @$this->input->post('state');
        $city = @$this->input->post('city');


        //$this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        //$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/addAgent');
        } else {


            $data = array();
            $password = $this->randomPassword();
            $data['uid'] = $password;
            $data['user_level'] = "2";
            $data['service_type'] = "agent";
            $data['user_name'] = $first_name . " " . $last_name;
            $data['first_name'] = $first_name;
            $data['last_name'] = $last_name;
            $data['password'] = hash('md5', $password);
            $data['email'] = $email;
            $data['type'] = 'agent';
            $data['phone'] = $phone;
            $country = $this->agent_model->get_data_table('country', array('country' => $country));
            $data['country'] = $country[0]['id'];
            $data['PinCode'] = $pincode;
            $state = $this->agent_model->get_data_table('state', array('state' => $state));
            $data['state'] = $state[0]['id'];
            $city = $this->agent_model->get_data_table('city', array('city' => $city));
            $data['city'] = $city[0]['id'];
            $data['active'] = 'Active';
            $data['date'] = date("Y-m-d");


            //print_r($data);
            if ($this->region_model->new_agent($data)) {

                $this->load->model('sendmail_model');

                $sendData['user_name'] = $first_name . "" . $last_name;
                $sendData['Password'] = $password;
                $sendData['Email\UserId'] = $email;
                $sendData['Type'] = 'Agent';
                $sendData['Phone'] = $phone;


                $data['msgData'] = $sendData;
                $msg = $this->load->view('email/customer', $data, true);
                $email = $email;
                $this->sendmail_model->send_mail2("no-reply@kpholidays.com", "KP Holidays", $email, 'KP Holidays New Agent Create', $msg);

                echo "<script>alert('Agent Created');window.location.href='" . base_url('index.php/dashboard/agent/1') . "';</script>";

            }


        }

    }

    public function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function agent_list()
    {
        $this->agent_auth();
        $commisionValue = $this->input->get('commissionType');
        $userId = $this->session->userdata('auid');
        // print_r($this->session->userdata);
        $q = $this->db->get_where('agent_commision_markup', array('uid' => 4545, 'forcommision' => $commisionValue));
        $display['data'] = $q->result_array();
        // print_r($display);
        $this->load->view('admin/commision_list', $display);

    }

    public function add_commission()
    {
        $this->agent_auth();
        if ($this->input->post('adult_Commission')) {

            $condition = array();
            $condition['uid'] = $this->session->userdata('uid');
            $condition['forcommision'] = $this->input->post('markuptype');

            $data = array();
            $data['adult_Commission'] = $this->input->post('adult_Commission');
            $data['created'] = date('y-m-d');
            $this->region_model->add_commission($condition, $data);


            echo "commision Update";
        } else {
            $markuptype = 'International Flight';
            $userID = $this->session->userdata('uid');
            $flight = $this->agent_model->get_query_data('select fligt_name,flight_code,flight_image.id as fid, agent_commision_markup.* from flight_image left join agent_commision_markup on (flight_image.id=agent_commision_markup.`refrence_id` and  `forcommision`="' . $markuptype . '") where agent_commision_markup.uid="' . $userID . '"');
            $data['flight'] = $flight;
            $this->load->view('admin/commision_list', $data);

        }
    }

    function add_data()
    {

        $this->agent_auth();
        $uid = $this->input->post('uid');
        $currentBalance = $this->input->post('currentBalance');
        $updateBalance = $this->input->post('amount');
        $reasion = $this->input->post('reasion');
        $amount = array('BALANCE' => $updateBalance + $currentBalance, 'current' => $currentBalance, 'Uid' => $uid, 'updateBalance' => $updateBalance, 'reasion' => $reasion);
        //print_r($amount);
        $dataCOndition = $this->region_model->add_balance($uid, $amount);
        //echo $dataCOndition;
        if ($dataCOndition) {
            echo "Value Updated";
        } else {
            echo "Value Not Updated";
        }

    }


    function add_amount()
    {
        $this->agent_auth();
        if (isset($_POST['add'])) {
            $uid = $this->input->post('uid');
            $currentBalance = $this->input->post('currentBalance');
            $updateBalance = $this->input->post('amount');
            $amount = array('BALANCE' => $updateBalance + $currentBalance, 'current' => $currentBalance, 'Uid' => $uid, 'updateBalance' => $updateBalance);
            $dataCOndition = $this->region_model->add_balance($uid, $amount);
            //echo $id,$amount;
            if ($dataCOndition) {
                echo "Value Updated";
            } else {
                echo "Value Not Updated";
            }
        } else {
            if (isset($_POST['mail'])) {
                $value = $this->input->post('mail');
                $data = $this->region_model->search_data('users', $value);
                $temp = array();
                foreach ($data as $value) {
                    array_push($temp, $value['email']);
                }
                $arr = array_values($temp);
                // echo $data2;
                return $arr;
            }
            $this->load->view('admin/add_amount');

        }
    }


    function get_place()
    {
        $this->agent_auth();
        header('Access-Control-Allow-Origin: *');

        if (isset($_POST['mail'])) {
            $value = $this->input->post('mail');
            $data = $this->region_model->search_data('city', 'city', $value);
            $options = array();
            foreach ($data as $value) {
                $options['myData'][] = array(
                    'CODE' => $value['city']);
                // array_push($temp,$value['city']);
            }
            // $arr = array_values($temp);
            // echo $data2;
            // print_r($arr);
            //   return $arr;
            echo json_encode($options);
        }

    }

    //   public function get_airport_code(){
    //   $term=$this->input->get('term');
    //   $domestic=$this->input->get('domestic');
    //   $options = array();
    //   $result=$this->region_model->getairportcode($term,$domestic);

    //   foreach($result as $key=>$val){
    //     if($domestic=='true'){
    //      $options['myData'][] = array(
    //       'CODE' => $val['CODE'],
    //       'CITYAIRPORT'=> $val['CITYAIRPORT']
    //     );
    //     }else{
    //       $options['myData'][] = array(
    //       'CODE' => $val['CODE'],
    //       'CITYAIRPORT'=> $val['CITYAIRPORT']."(".$val['COUNTRY'].")"
    //     );
    //     }
    //   }
    //   echo json_encode($options);
    // }


    function customize()
    {
        $this->agent_auth();
        $this->load->view('admin/customize');
    }

    function logout()
    {
        //session_destroy();

        $this->session->unset_userdata('session_id');

        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('auid');
        $this->session->unset_userdata('tuid');
        $this->session->sess_destroy();

        redirect('home/index');
    }

    //we will use later admin profile
    function myprofile()
    {
        $this->agent_auth();
        $user_uid = $this->session->userdata('uid');
        //print_r($data);
        $data = $this->user_model->user_uid($user_uid);
        //$ndata['uid'] = $data[0]['uid'];
        //$ndata = $data;

        $flat = call_user_func_array('array_merge', $data);
        //print_r($flat);

       // $pro = $this->traveler_model->getprofile(['uid' => $user_uid]);
       // $flt = call_user_func_array('array_merge', $pro);
        //print_r($flt);
        $ndata['array1'] = $flat;
      //  $ndata['array2'] = $flt;
        //this->load->view('view_page', $data);
        $this->load->view('admin/profile_view', $ndata);
    }


    //we will use later profile
    function profile()
    {
        $this->agent_auth();

        if ($this->session->userdata('type') == 'Associate') {
            $user_uid = $this->session->userdata('uid');
            //print_r($data);
            $data = $this->user_model->get(['uid' => $user_uid]);
            //$ndata['uid'] = $data[0]['uid'];
            //$ndata = $data;

            $flat = call_user_func_array('array_merge', $data);
            //print_r($flat);

            $pro = $this->user_model->getprofile(['uid' => $user_uid]);
            if ($pro) {
                $flt = call_user_func_array('array_merge', $pro);
            } else {
                $flt = array(
                    'uid' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'dob' => '',
                    'gender' => '',
                    'company_details' => '',
                    'pnt_address' => '',
                    'pincode' => '',
                    'landmark' => '',
                    'fax' => ''

                );
            }
            //print_r($flt);
            $ndata['array1'] = $flat;
            $ndata['array2'] = $flt;
//this->load->view('view_page', $data);
            $this->load->view('associate/profile_view', $ndata);
        }

        if ($this->session->userdata('type') == 'Traveler') {
            $user_uid = $this->session->userdata('tuid');
            //print_r($data);
            $data = $this->user_model->get(['uid' => $user_uid]);
            //$ndata['uid'] = $data[0]['uid'];
            //$ndata = $data;

            $flat = call_user_func_array('array_merge', $data);
            //print_r($flat);

            $pro = $this->user_model->getprofile(['uid' => $user_uid]);
            if ($pro) {
                $flt = call_user_func_array('array_merge', $pro);
            } else {
                $flt = array(
                    'uid' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'dob' => '',
                    'gender' => '',
                    'company_details' => '',
                    'pnt_address' => '',
                    'pincode' => '',
                    'landmark' => '',
                    'fax' => ''

                );
            }
            //print_r($flt);
            $ndata['array1'] = $flat;
            $ndata['array2'] = $flt;
            //this->load->view('view_page', $data);
            $this->load->view('traveler/profile_view', $ndata);

            // $this->load->view('traveler/profile_view');
        }
    }


    //adding no. of room in in a single  hotel
    public function add_room()
    {
        $this->agent_auth();

        $hotel_name = @$this->input->post('hotel_name');
        $room_type = @$this->input->post('room_type');
        $room_price = @$this->input->post('room_price');
        $Review = @$this->input->post('Review');
        $room_facility = @$this->input->post('room_facility');
        $trav_rating = $this->input->post('trav_rating');
        $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
        $this->form_validation->set_rules('room_type', 'room_type', 'required');
        $this->form_validation->set_rules('room_price', 'room_price', 'required');
        $this->form_validation->set_rules('Review', 'Review', 'required');
        $this->form_validation->set_rules('room_facility', 'room_facility', 'required');
        $this->form_validation->set_rules('trav_rating', 'trav_rating', 'required');
        @$this->photo = "";
        if (@$_FILES['photo']['name'] != "") {
            $config['upload_path'] = './upload/hotel/room';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            //$config['file_name'] = $file_name;
            $this->upload_file($config, 'photo');
            //	$this->form_validation->set_rules('photo', 'photo', 'callback_check_file[photo]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add_room');
        } else {

            $length = 5;

            $room_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
            $room = array(
                'room_id' => $room_id,
                'hotel_id' => $hotel_name,
                'room_type' => $room_type,
                'room_price' => $room_price,
                'Review' => $Review,
                'room_facility' => $room_facility,
                'trav_rating' => $trav_rating,
                'image' => $this->photo
            );

            $this->user_model->add_room($room);
            echo "<script>alert('Room is added Thank u !');document.location='" . base_url() . "index.php/dashboard/hotel_view';</script>";

        }

    }


    public function edit_room($r_id)
    {
        $this->agent_auth();
        $data['detail'] = $this->pack_model->room_id($r_id);

        $this->load->view('admin/edit_room', $data);
    }

    public function update_room()
    {
        $this->agent_auth();
        $room_id = @$this->input->post('room_id');
        $hotel_name = @$this->input->post('hotel_id');
        $room_type = @$this->input->post('room_type');
        $room_price = @$this->input->post('room_price');
        $Review = @$this->input->post('Review');
        $room_facility = @$this->input->post('room_facility');
        $trav_rating = $this->input->post('trav_rating');

        @$this->photo = "";
        if (@$_FILES['photo']['name'] != "") {
            $config['upload_path'] = './upload/hotel/room';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            //$config['file_name'] = $file_name;
            $this->upload_file($config, 'photo');
        }
        $room = array(
            'room_id' => $room_id,
            'hotel_id' => $hotel_name,
            'room_type' => $room_type,
            'room_price' => $room_price,
            'Review' => $Review,
            'room_facility' => $room_facility,
            'trav_rating' => $trav_rating,
            'image' => $this->photo
        );

        $this->user_model->update_room($room, $room_id);
        echo "<script>alert('Room is updated Thank u !');document.location='" . base_url() . "index.php/dashboard/hotel_view';</script>";


    }


    public function delete_room($id)
    {
        $this->agent_auth();
        $this->user_model->remove_room($id);
        echo "<script>alert('Room is removed Thank u !');document.location='" . base_url() . "index.php/dashboard/hotel_view';</script>";
    }

    public function addprofile()
    {
        $this->agent_auth();
        $user_uid = $this->session->userdata('uid');
        $this->form_validation->set_rules('user_id', 'user_id', 'max_length[255]');
        $this->form_validation->set_rules('first_name', 'first_name', 'required|max_length[255]');
        $this->form_validation->set_rules('last_name', 'last_name', 'required|max_length[255]');
        $this->form_validation->set_rules('gender', 'gender', 'required|max_length[255]');
        $this->form_validation->set_rules('birth_date', 'birth date', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required|is_numeric|max_length[255]');
        $this->form_validation->set_rules('landmark', 'landmark', 'required|max_length[255]');
        $this->form_validation->set_rules('fax', 'fax', 'required|is_numeric|max_length[255]');
        $this->form_validation->set_rules('company_details', 'company details', 'required');
        $this->photo = "";
        if (@$_FILES['photo']['name'] != "") {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            //$config['file_name'] = $file_name;
            $this->upload_file($config, 'photo');
            $this->form_validation->set_rules('photo', 'photo', 'callback_check_file[photo]');
        }
        $this->document1 = "";
        if (@$_FILES['document1']['name'] != "") {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload_file($config, 'document1');
            $this->form_validation->set_rules('document1', 'document1', 'callback_check_file[document1]');
        }
        $this->document2 = "";
        if (@$_FILES['document2']['name'] != "") {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload_file($config, 'document2');
            $this->form_validation->set_rules('document2', 'document2', 'callback_check_file[document2]');
        }
        $this->document3 = "";
        if (@$_FILES['document3']['name'] != "") {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'png|gif|pdf|doc';
            $config['encrypt_name'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            $this->upload_file($config, 'document3');
            $this->form_validation->set_rules('document3', 'document3', 'callback_check_file[document3]');
        }

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('header');
            $this->load->view('profileadd_view');
            $this->load->view('footer');
        } else // passed validation proceed to post success logic
        {
            // build array for the model

            $form_data = array(
                'uid' => $user_uid,
                'first_name' => @$this->input->post('first_name'),
                'last_name' => @$this->input->post('last_name'),
                'gender' => @$this->input->post('gender'),
                'dob' => @$this->input->post('birth_date'),
                'pnt_address' => @$this->input->post('address'),
                'pincode' => @$this->input->post('pincode'),
                'landmark' => @$this->input->post('landmark'),
                'fax' => @$this->input->post('fax'),
                'company_details' => @$this->input->post('company_details'),
                'photo' => @$this->photo,
                'document_1' => @$this->document1,
                'document_2' => @$this->document2,
                'document_3' => @$this->document3
            );

            // run insert model to write data to db

            if ($this->user_model->profileform($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                redirect('index.php/dashboard/success');   // or whatever logic needs to occur
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }
    }


    public function create_workprofile()
    {
        $this->agent_auth();
        $user_uid = $this->session->userdata('uid');

        $wdata = $this->associate_model->getwprobyid($user_uid);

        if ($wdata) {
            /*     echo "You already created work profile!<a href='".base_url()."index.php/profile?id=".$user_uid."'>view profile</a> <br>click here f                or <a href='".base_url()."index.php/dashboard'> back</a> ";
              echo "<script>alert('Already created workprofile!');</script>";*/
            redirect(base_url() . 'index.php/dashboard/update_work_profile');
            //die;
        }
        $this->form_validation->set_rules('company_name', 'company name', 'required|max_length[255]');
        $this->form_validation->set_rules('company_details', 'company details', 'required');
        $this->form_validation->set_rules('working_type', 'working type', 'required|max_length[255]');
        $this->form_validation->set_rules('country', 'country', 'required|max_length[255]');
        $this->form_validation->set_rules('state', 'state', 'required|max_length[255]');
        $this->form_validation->set_rules('city', 'city', 'required|max_length[255]');
        //$this->form_validation->set_rules('portfolio', 'portfolio', 'required|max_length[255]');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');


        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('associate/create_wprofile_view');
        } else {

            $this->logo = "";
            $config['upload_path'] = './upload/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'logo');
            $this->form_validation->set_rules('logo', 'logo', 'callback_check_file[logo]');


            $form_data = array(
                'uid' => $user_uid,
                'logo' => $this->logo,
                'company_name' => @$this->input->post('company_name'),
                'company_details' => @$this->input->post('company_details'),
                'working_type' => @$this->input->post('working_type'),
                'country' => @$this->input->post('country'),
                'state' => @$this->input->post('state'),
                'city' => @$this->input->post('city'),
                'date' => date('Y/M/d'),
                'time' => date('H:i:s')
                //	'portfolio' => @$this->input->post('portfolio')
            );

            // run insert model to write data to db

            if ($this->associate_model->wprodata($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                redirect(base_url() . 'index.php/dashboard/update_work_profile');   // or whatever logic needs to occur
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }


    }

    function view_check()
    {
        $this->agent_auth();
        if ($this->input->post('view') === "select") {
            $this->form_validation->set_message('view_check', 'Select option !');
            return FALSE;

        } else {
            return True;
        }
    }

    public function addpackage()
    {
        $this->agent_auth();
        $this->form_validation->set_rules('pack_name', 'pack name', 'required|max_length[255]');

        $this->image_1 = "";
        if (@$_FILES['image_1']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '15048';
            $this->upload_file($config, 'image_1');
        }
        $this->image_2 = "";
        if (@$_FILES['image_2']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_2');
        }
        $this->image_3 = "";
        if (@$_FILES['image_3']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_3');
        }
        $this->image_4 = "";
        if (@$_FILES['image_4']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_4');
        }
        $this->image_5 = "";
        if (@$_FILES['image_5']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_5');
        }
        $this->image_6 = "";
        if (@$_FILES['image_6']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_6');
        }

        $this->form_validation->set_error_delimiters('<span class="error"><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
            $this->load->view('admin/create_pack_view');

        } else {
            $days_detail = @$this->input->post('day_detail');
            $kk = '';
            if ($days_detail) {
                foreach ($days_detail as $days_detail => $k) {
                    $kk .= $k;
                }
            }
            $facilities = '';
            $facilitiesArr = @$this->input->post('day_detail');
            if ($facilitiesArr) {
                foreach ($facilitiesArr as $key => $value) {
                    $facilities .= $facilities == '' ? $value : ",$value";
                }
            }
            
            $front_image = "";

            $gallery = '';
            if (@$this->image_1){
                $gallery .= $gallery == '' ? @$this->image_1 : "," . @$this->image_1;
                $front_image = @$this->image_1;
            }
            if (@$this->image_2)
                $gallery .= $gallery == '' ? @$this->image_2 : "," . @$this->image_2;
            if (@$this->image_3)
                $gallery .= $gallery == '' ? @$this->image_3 : "," . @$this->image_3;
            if (@$this->image_4)
                $gallery .= $gallery == '' ? @$this->image_4 : "," . @$this->image_4;
            if (@$this->image_5)
                $gallery .= $gallery == '' ? @$this->image_5 : "," . @$this->image_5;
            if (@$this->image_6)
                $gallery .= $gallery == '' ? @$this->image_6 : "," . @$this->image_6;
            
            $length = 5;
            $package_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            $day_detail = $this->input->post();
            $form_data = array(
                'pack_id' => $package_id,
                'pack_name' => @$this->input->post('pack_name'),
                'package_type' => @$this->input->post('package_type'),
                'details' => @$this->input->post('details'),
                'price' => @$this->input->post('price'),
                'final_price' => @$this->input->post('final_price'),
                'currency' => @$this->input->post('currency'),
                'transport' => @$this->input->post('transport'),
                'hotel' => @$this->input->post('hotel'),
                'hotel_website' => @$this->input->post('hotel_website'),
                'nights' => @$this->input->post('nights'),
                'days' => @$this->input->post('days'),
                'activities' => $kk,
                'facilities' => $facilities,
                'no_of_people' => @$this->input->post('no_of_people'),
                'tour_highlight' => @$this->input->post('highlights'),
                'exclusions' => @$this->input->post('exclusions'),
                'country' => @$this->input->post('country'),
                'state' => @$this->input->post('state'),
                'city' => @$this->input->post('city'),
                'gallery' => $gallery,
                'status' => @$this->input->post('status'),
                'front_image' => $front_image,

            );

            $qqqq = $this->pack_model->addpackform($form_data);
            if ($qqqq == TRUE) {
                redirect(base_url() . 'index.php/dashboard/mypackage');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }

    }


    function upload_file($config, $fieldname)
    {
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload($fieldname);
        $error = $this->upload->display_errors();
        if (empty($error)) {
            $data = $this->upload->data();
            $this->$fieldname = $data['file_name'];
        } else {
            $this->custom_errors[$fieldname] = $error;
        }
    }


    function mypackage()
    {
        $this->agent_auth();

        $data = $this->pack_model->get();
        if ($data) {
            $flat = call_user_func_array('array_merge', $data);
            $this->load->view('admin/admin_header', $flat);
            $this->load->view('admin/mypackage_view');
            $this->load->view('admin/admin_footer');
        } else {
            redirect(base_url() . 'index.php/dashboard/addpackage');
        }


    }

    function update_package()
    {
        $this->agent_auth();
        $id = $this->input->get_post('id');

        $this->form_validation->set_rules('pack_name', 'pack name', 'required|max_length[255]');

        $this->image_1 = "";
        if (@$_FILES['image_1']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '15048';
            $this->upload_file($config, 'image_1');
        }
        $this->image_2 = "";
        if (@$_FILES['image_2']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_2');
        }
        $this->image_3 = "";
        if (@$_FILES['image_3']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_3');
        }
        $this->image_4 = "";
        if (@$_FILES['image_4']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_4');
        }
        $this->image_5 = "";
        if (@$_FILES['image_5']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_5');
        }
        $this->image_6 = "";
        if (@$_FILES['image_6']['name'] != "") {
            $config['upload_path'] = './upload/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_6');
        }

        $this->form_validation->set_error_delimiters('<span class="error"><font color="red">', '</font></span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            echo validation_errors();
            $this->load->view('admin/create_pack_view');

        } else {
            $days_detail = @$this->input->post('day_detail');

            $kk = '';
            if ($days_detail) {
                foreach ($days_detail as $days_detail => $k) {
                    $kk .= $k . "<111>";
                }
            }
            $facilities = '';
            $facilitiesArr = @$this->input->post('facilities');
            if ($facilitiesArr) {
                foreach ($facilitiesArr as $key => $value) {
                    $facilities .= $facilities == '' ? $value : ",$value";
                }
            }

            $gallery = '';
            $oldImagesArr = @$this->input->post('old_image');
            if ($oldImagesArr) {
                foreach ($oldImagesArr as $key => $value) {
                    $gallery .= $gallery == '' ? $value : ",$value";
                }
            }
            if (@$this->image_1)
                $gallery .= $gallery == '' ? @$this->image_1 : "," . @$this->image_1;
            if (@$this->image_2)
                $gallery .= $gallery == '' ? @$this->image_2 : "," . @$this->image_2;
            if (@$this->image_3)
                $gallery .= $gallery == '' ? @$this->image_3 : "," . @$this->image_3;
            if (@$this->image_4)
                $gallery .= $gallery == '' ? @$this->image_4 : "," . @$this->image_4;
            if (@$this->image_5)
                $gallery .= $gallery == '' ? @$this->image_5 : "," . @$this->image_5;
            if (@$this->image_6)
                $gallery .= $gallery == '' ? @$this->image_6 : "," . @$this->image_6;


            $day_detail = $this->input->post();
            $data = array(

                'pack_name' => @$this->input->post('pack_name'),
                'package_type' => @$this->input->post('package_type'),
                'details' => @$this->input->post('details'),
                'price' => @$this->input->post('price'),
                'final_price' => @$this->input->post('final_price'),
                'currency' => @$this->input->post('currency'),
                'transport' => @$this->input->post('transport'),
                'hotel' => @$this->input->post('hotel'),
                'hotel_website' => @$this->input->post('hotel_website'),
                'nights' => @$this->input->post('nights'),
                'days' => @$this->input->post('days'),
                'activities' => $kk,
                'facilities' => $facilities,
                'no_of_people' => @$this->input->post('no_of_people'),
                'tour_highlight' => @$this->input->post('highlights'),
                'exclusions' => @$this->input->post('exclusions'),
                'country' => @$this->input->post('country'),
                'state' => @$this->input->post('state'),
                'city' => @$this->input->post('city'),
                'gallery' => $gallery,
                'status' => @$this->input->post('status')

            );
            $this->pack_model->uppack($id, $data);

            echo "<script>alert('package is updated:');document.location='" . base_url() . "index.php/dashboard/mypackage';</script>";
        }

    }


    function add_destination()
    {
        $this->agent_auth();
        $this->form_validation->set_rules('desti_name', 'Name', 'required|max_length[255]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('accommodation', 'accommodation', 'required');
        $this->form_validation->set_rules('food', 'Food', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->main_image = "";
        if (@$_FILES['main_image']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'main_image');
        }

        $this->acco_image_1 = "";
        if (@$_FILES['acco_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'acco_image_1');
        }
        $this->food_image_1 = "";
        if (@$_FILES['food_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'food_image_1');
        }
        $this->acco_image_2 = "";
        if (@$_FILES['acco_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'acco_image_2');
            //	$this->form_validation->set_rules('acco_image_2', 'acco_image_2', 'callback_check_file[acco_image_2]');
        }
        $this->food_image_2 = "";
        if (@$_FILES['food_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'food_image_2');
        }
        $this->other_image_1 = "";
        if (@$_FILES['other_image_1']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_1');
        }
        $this->other_image_2 = "";
        if (@$_FILES['other_image_2']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_2');
            //$this->form_validation->set_rules('other_image_2', 'other_image_2', 'callback_check_file[other_image_2]');
        }
        $this->other_image_3 = "";
        if (@$_FILES['other_image_3']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_3');
        }

        $this->other_image_4 = "";
        if (@$_FILES['other_image_4']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_4');
        }

        $this->other_image_5 = "";
        if (@$_FILES['other_image_5']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_5');
        }

        $this->other_image_6 = "";
        if (@$_FILES['other_image_6']['name'] != "") {
            $config['upload_path'] = './upload/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'other_image_6');
        }

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/add_desti_view');
        } else {
            $form_data = array(
                'name' => @$this->input->post('desti_name'),
                'description' => @$this->input->post('description'),
                'getting_there' => @$this->input->post('getting_there'),
                'train' => @$this->input->post('train'),
                'road' => @$this->input->post('road'),
                'air' => @$this->input->post('air'),
                'visit_time' => @$this->input->post('visit_time'),
                'visit_do' => @$this->input->post('visit_and_do'),
                'acco' => @$this->input->post('accommodation'),
                'food' => @$this->input->post('food'),
                'imp_facts' => @$this->input->post('imp_facts'),
                'main_image_title' => @$this->input->post('main_image_title'),
                'acco_image_1_title' => @$this->input->post('acco_image_1_title'),
                'acco_image_2_title' => @$this->input->post('acco_image_2_title'),
                'food_image_1_title' => @$this->input->post('food_image_1_title'),
                'food_image_2_title' => @$this->input->post('food_image_2_title'),
                'main_image' => @$this->main_image,
                'acco_image_1' => @$this->acco_image_1,
                'food_image_1' => @$this->food_image_1,
                'acco_image_2' => @$this->acco_image_2,
                'food_image_2' => @$this->food_image_2,
                'other_image_1' => @$this->other_image_1,
                'other_image_2' => @$this->other_image_2,
                'other_image_3' => @$this->other_image_3,
                'other_image_4' => @$this->other_image_4,
                'other_image_5' => @$this->other_image_5,
                'other_image_6' => @$this->other_image_6,

                'country' => @$this->input->post('country'),
                'state' => @$this->input->post('state'),
                'status' => '0',
                'city' => @$this->input->post('city')
            );
            $this->associate_model->savedesti($form_data);
            echo "<script> alert('" . @$this->input->post('desti_name') . "Destination added successfully! Waiting for approval');document.location='" . site_url('dashboard/destination') . "';</script>";
        }
    }

    function offers()
    {
        $this->agent_auth();
        $name = $this->input->post('offer_name');
        $detail = $this->input->post('offer_details');
        $pid = $this->input->post('package');
        $disc = $this->input->post('discount');
        $st = $this->input->post('status');
        $this->form_validation->set_rules('offer_name', 'offer  name', 'required|max_length[255]');
        $this->form_validation->set_rules('offer_details', 'offer details', 'required');
        $this->form_validation->set_rules('discount', 'discount', 'required|is_numeric|max_length[255]');
        $this->form_validation->set_rules('package', 'package', 'required|callback_package_upoffcheck');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/offer');
        }
        else // passed validation proceed to post success logic
        {
            $data = array(
                'offer_name' => $name,
                'offer_details' => $detail,
                'pack_id' => $pid,
                'discount' => $disc,
                'date' => date('Y/m/d'),
            );
            if ($this->pack_model->offerform($data) == TRUE) // the information has therefore been successfully saved in the db
            {
                if ($pid) {
                    //$priced = $this->pack_model->getpackbypid($pid);
                    $priced = $this->pack_model->pack_details($pid);
                    $offid = $this->pack_model->getoff();
                    $finprice = $priced[0]['price'] - $disc;                                    // according to offer deducting price not percentage
                    $pdata = array(
                        'final_price' => $finprice,
                        'offer_id' => $offid[0]['id']
                    );
                    $this->pack_model->uppackfprice($pid, $pdata);
                    echo "<script>alert('new offer is created');document.location='" . base_url() . "index.php/dashboard/myoffers';</script>";
                }
            } else {
                echo 'An Error Occurred saving your information. Please try again later';
            }
        }
    }

    function destination()
    {
        $this->agent_auth();
        $this->load->view('admin/admin_header');
        $this->load->view('admin/all_desti');
        $this->load->view('admin/admin_footer');
    }

    function edit_destination()
    {
        $this->agent_auth();
        $id = $_REQUEST['id'];
        $myid['id'] = $_REQUEST['id'];
        $ddata = $this->pack_model->getdestibyid($id);
        if ($ddata) {
            $mydata = $this->pack_model->getdestibyid($id);
            
            $this->form_validation->set_rules('desti_name', 'Name', 'required|max_length[255]');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('getting_there', 'Getting_there', 'required');
            $this->form_validation->set_rules('train', 'Train', 'required');
            $this->form_validation->set_rules('road', 'Road', 'required');
            $this->form_validation->set_rules('air', 'Air', 'required');
            $this->form_validation->set_rules('visit_time', 'visit_time', 'required');
            $this->form_validation->set_rules('visit_and_do', 'visit and Do', 'required');
            $this->form_validation->set_rules('accommodation', 'accommodation', 'required');
            $this->form_validation->set_rules('food', 'Food', 'required');
            $this->form_validation->set_rules('imp_facts', 'Imp Facts', 'required');
            $this->main_image = "";
            if (@$_FILES['main_image']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'main_image');
            }else{
                $this->main_image = $ddata[0]["main_image"];
            }
            $this->acco_image_1 = "";
            if (@$_FILES['acco_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'acco_image_1');
            }else{
                $this->acco_image_1 = $ddata[0]["acco_image_1"];
            }
            $this->food_image_1 = "";
            if (@$_FILES['food_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'food_image_1');
            }else{
                $this->food_image_1 = $ddata[0]["food_image_1"];
            }
            $this->acco_image_2 = "";
            if (@$_FILES['acco_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'acco_image_2');
            }else{
                $this->acco_image_2 = $ddata[0]["acco_image_2"];
            }
            $this->food_image_2 = "";
            if (@$_FILES['food_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'food_image_2');
            }else{
                $this->food_image_2 = $ddata[0]["food_image_2"];
            }
            $this->other_image_1 = "";
            if (@$_FILES['other_image_1']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_1');
            }else{
                $this->other_image_1 = $ddata[0]["other_image_1"];
            }
            $this->other_image_2 = "";
            if (@$_FILES['other_image_2']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_2');
            }else{
                $this->other_image_2 = $ddata[0]["other_image_2"];
            }
            $this->other_image_3 = "";
            if (@$_FILES['other_image_3']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_3');
            }else{
                $this->other_image_3 = $ddata[0]["other_image_3"];
            }
            $this->other_image_4 = "";
            if (@$_FILES['other_image_4']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_4');
            }else{
                $this->other_image_4 = $ddata[0]["other_image_4"];
            }
            $this->other_image_5 = "";
            if (@$_FILES['other_image_5']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_5');
            }else{
                $this->other_image_5 = $ddata[0]["other_image_5"];
            }
            $this->other_image_6 = "";
            if (@$_FILES['other_image_6']['name'] != "") {
                $config['upload_path'] = './upload/destination/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '5048';
                $this->upload_file($config, 'other_image_6');
            }else{
                $this->other_image_6 = $ddata[0]["other_image_6"];
            }
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $this->load->view('admin/admin_header', $myid);
                $this->load->view('admin/edit_desti_view');
                $this->load->view('admin/admin_footer');
            } else {
                $mainimage = @$this->main_image;
                $acco_image_1 = @$this->acco_image_1;
                $acco_image_2 = @$this->acco_image_2;
                $food_image_1 = @$this->food_image_1;
                $food_image_2 = @$this->food_image_2;
                $other_image_1 = @$this->other_image_1;
                $other_image_2 = @$this->other_image_2;
                $other_image_3 = @$this->other_image_3;
                $other_image_4 = @$this->other_image_4;
                $other_image_5 = @$this->other_image_5;
                $other_image_6 = @$this->other_image_6;

                $upid = $_REQUEST['id'];

                $updata = array(
                    'name' => @$this->input->post('desti_name'),
                    'description' => @$this->input->post('description'),
                    'getting_there' => @$this->input->post('getting_there'),
                    'train' => @$this->input->post('train'),
                    'road' => @$this->input->post('road'),
                    'air' => @$this->input->post('air'),
                    'visit_time' => @$this->input->post('visit_time'),
                    'visit_do' => @$this->input->post('visit_and_do'),
                    'acco' => @$this->input->post('accommodation'),
                    'food' => @$this->input->post('food'),
                    'imp_facts' => @$this->input->post('imp_facts'),
                    'places_nearby' => @$this->input->post('places_near_by'),

                    'main_image_title' => @$this->input->post('main_image_title'),
                    'acco_image_1_title' => @$this->input->post('acco_image_1_title'),
                    'acco_image_2_title' => @$this->input->post('acco_image_2_title'),
                    'food_image_1_title' => @$this->input->post('food_image_1_title'),
                    'food_image_2_title' => @$this->input->post('food_image_2_title'),
                    'other_image_1_title' => @$this->input->post('other_image_1_title'),
                    'other_image_2_title' => @$this->input->post('other_image_2_title'),
                    'other_image_3_title' => @$this->input->post('other_image_3_title'),
                    'other_image_4_title' => @$this->input->post('other_image_4_title'),
                    'other_image_5_title' => @$this->input->post('other_image_5_title'),
                    'other_image_6_title' => @$this->input->post('other_image_6_title'),

                    'main_image' => $mainimage,
                    'acco_image_1' => $acco_image_1,
                    'food_image_1' => $food_image_1,
                    'acco_image_2' => $acco_image_2,
                    'food_image_2' => $food_image_2,
                    'other_image_1' => $other_image_1,
                    'other_image_2' => $other_image_2,
                    'other_image_3' => $other_image_3,
                    'other_image_4' => $other_image_4,
                    'other_image_5' => $other_image_5,
                    'other_image_6' => $other_image_6

                );
                $this->pack_model->updesti($upid, $updata);
                $mid['id'] = $upid;
                echo "<script>alert('Your Destination is updated!');</script>";
                redirect(base_url().'index.php/dashboard/destination');
            }
        }
    }

    function del_desti()
    {
        $this->agent_auth();
        $id = $_REQUEST['id'];
        $this->pack_model->del_desti($id);
        $this->load->view('admin/all_desti');
        echo "<script>alert(' Destination  is removed !');</script>";

    }

    function myoffers()
    {
        $this->agent_auth();
        $this->load->view('admin/myoffer_view');
    }

    function editoffer()
    {
        $this->agent_auth();
        $offid = $this->input->get_post('id');

        if ($offid == '') {
            redirect('index.php/dashboard/myoffers');
        }
        $this->load->view('admin/myofferedit_view');
    }


    function update_offer()
    {
        $this->agent_auth();
        $id = $this->input->get_post('id');
        $name = $this->input->get_post('offer_name');
        $detail = $this->input->get_post('offer_details');
        $status = $this->input->get_post('status');
        $discount = $this->input->get_post('discount');
        $pid = $this->input->get_post('package');
        $offid = $this->input->get_post('off_id');
        $this->form_validation->set_rules('offer_name', 'offer  name', 'required|max_length[255]');
        $this->form_validation->set_rules('offer_details', 'offer details', 'required');
        //$this->form_validation->set_rules('discount', 'discount', 'required|is_numeric|callback_discount_check');
        //  $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('package', 'package', 'required|callback_package_upoffcheck');
        $this->form_validation->set_error_delimiters('<br /><span class="error"><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/myofferedit_view');
        } else {
            //echo  $user_uid = $this -> session ->userdata('uid');

            $data = array(

                'offer_name' => $name,
                'offer_details' => $detail,

                'pack_id' => $pid,
                'discount' => $discount,
                'date' => date('Y/m/d'),
                'status' => $status
            );

            $this->pack_model->offer_update($id, $data);
            if ($pid) {
                $pr = $this->pack_model->getpackbypid($pid);

                $fprice = $pr[0]['price'] - $discount;
                $offdata = array
                (
                    'offer_id' => $id,
                    'final_price' => $fprice
                );
                $this->pack_model->offtopack($pid, $offdata);

            }


        }

        echo "<script>alert('Your offer is updated');document.location='" . site_url() . "/dashboard/myoffers'</script>";

    }


    function package_upoffcheck()
    {
        $this->agent_auth();
        if ($this->input->post('package') === '0') {
            $this->form_validation->set_message('package_upoffcheck', 'package must be select to attach offer !');
            return False;
        } else {
            return TRUE;
        }
    }


    function del_package()
    {
        $this->agent_auth();
        echo "<script>alert('R U sure u want to Delete :')</script>";
        $id = $this->input->get_post('id');
        if ($id) {
            $this->pack_model->delpack($id);


            echo "<script>alert('Your package has been deleted :!');document.location='" . base_url() . "index.php/dashboard/mypackage';</script>";

        }
    }

    function deloffer()
    {
        $this->agent_auth();
        $id = $this->input->get_post('id');
        if ($id) {
            $this->pack_model->deloffer($id);

            echo "<script>alert('offer is removed from database :!');document.location='" . base_url() . "index.php/dashboard/myoffers';</script>";
        }
    }

    function package()
    {
        $this->agent_auth();
        if ($this->input->get_post('id') != '') {
            $pid = $this->input->get_post('id');
            $data['info'] = $this->pack_model->getpackbyid($pid);
            $data['facilities'] = $this->pack_model->get_facilities();
            /*$this->load->view('admin/admin_header', $data);
            $this->load->view('admin/mypackageedit_view');
            $this->load->view('admin/admin_footer');*/
            $this->load->view('admin/mypackageedit_view', $data);
        }
    }


    function update_work_profile()
    {
        $this->agent_auth();
        $user_uid = $this->session->userdata('uid');
        $wdata = $this->associate_model->getwprobyid($user_uid);
        if (!$wdata) {
            redirect(base_url() . 'index.php/dashboard/create_workprofile');
        }
        $this->form_validation->set_rules('company_name', 'company_name', 'required|max_length[255]');

        $this->form_validation->set_rules('company_details', 'company details', 'required');
        //  $this->form_validation->set_rules('city', 'city', 'required|max_length[255]');
        // $this->form_validation->set_rules('state', 'state', 'required|max_length[255]');
        // $this->form_validation->set_rules('country', 'country', 'required|max_length[255]');

        $this->photo = "";
        if (@$_FILES['photo']['name'] != "") {
            $config['upload_path'] = './upload/wprofile/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';
            //$config['file_name'] = $file_name;
            $this->upload_file($config, 'photo');
            $this->form_validation->set_rules('photo', 'photo', 'callback_check_file[photo]');
        }

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {

            $this->load->view('associate/edit_work_profile');

        } else {
            $pic = $this->associate_model->getwprobyid($user_uid);
            if (@$this->photo) {
                $photo = @$this->photo;
            } else {
                $photo = $pic[0]['image'];

            }
            if (@$this->input->post('city') and @$this->input->post('state') and @$this->input->post('country')) {
                $city = @$this->input->post('city');

                $state = @$this->input->post('state');
                $country = @$this->input->post('country');
                if ($country === '0') {
                    $country = $pic[0]['country'];
                }

            } else {
                $city = $pic[0]['city'];
                $state = $pic[0]['state'];
                $country = $pic[0]['country'];


            }
            // $this->associate_model->getwprobyid();

            $form_updata = array(
                //'uid' => $user_uid,
                'company_name' => @$this->input->post('company_name'),
                'working_type' => @$this->input->post('working_type'),
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'company_details' => @$this->input->post('company_details'),
                'image' => $photo

            );


            if ($this->associate_model->upwpro($form_updata) == TRUE) {
                redirect('index.php/dashboard');   // or whatever logic needs to occur
            } else {
                echo 'An error occurred saving your information. Please try again later';
                $this->load->view('associate/edit_work_profile');
                // Or whatever error handling is necessary
            }


        }

    }

    function update_portfolio()
    {
        $this->load->view('associate/update_portfolio_view');


    }


    function add_cab()
    {
        $this->agent_auth();
        $cname = @$this->input->post('cab_name');
        $cab_type = @$this->input->post('cab_type');
        $desc = @$this->input->post('cab_details');
        $ctry = @$this->input->post('country');
        $state = @$this->input->post('state');
        $city = @$this->input->post('city');
        $price = $this->input->post('price');

        $rating = $this->input->post('rating');

        $offer = $this->input->post('offer');
        $trv_feedback = $this->input->post('trv_feedback');
        $this->form_validation->set_rules('cab_type', 'Cab  Type', 'required');
        $this->form_validation->set_rules('cab_name', 'Cab  name', 'required');

        $this->form_validation->set_rules('cab_details', 'Cab details', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');

        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        $this->form_validation->set_rules('trv_feedback', 'Trveler feedback', 'required');

        $this->cab_image = "";
        if (@$_FILES['cab_image']['name'] != "") {
            $config['upload_path'] = './upload/cabs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'cab_image');
            //$this->form_validation->set_rules('cab_image', 'cab_image', 'callback_check_file[cab_image]');
        }
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/add_cab');
        } else {


            $length = 5;

            $cab_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            $local = $this->input->post('local');
            $out_station = $this->input->post('out_station');
            $transfer = $this->input->post('transfer');

            $local_d = implode("%#%", $local);


            $out_station_d = implode("%#%", $out_station);


            $transfer_d = implode("%#%", $transfer);


            $cdata = array(
                'cab_id' => $cab_id,
                'cab_type' => $cab_type,
                'cab' => $cname,
                'details' => $desc,
                'country' => $ctry,
                'state' => $state,
                'city' => $city,
                'price' => $price,
                'rating' => $rating,

                'image' => @$this->cab_image,
                'offer' => $offer,
                'trv_feedback' => $trv_feedback,
                'local' => $local_d,
                'out_station' => $out_station_d,
                'transfer' => $transfer_d

            );
            //echo "<pre>";
            //print_r($cdata);die;
            if ($this->associate_model->addcab($cdata) === True) {

                echo "<script>alert('" . $cname . " Cab Added Successfully'); window.location='" . base_url() . "index.php/dashboard/cab_view';</script>";
            }


        }
    }

    function flight_add()
    {

        $this->agent_auth();
        //print_r($_POST);
        $this->load->helper(array('form', 'url'));
        $data = null;
        if (isset($_POST['submit'])) {

            $flight_name = @$this->input->post('flight_name');
            $filght_code = @$this->input->post('flight_code');
            $this->form_validation->set_rules('flight_name', 'Enter Flight Name', 'required');
            $this->form_validation->set_rules('flight_code', 'Enter Flight Code', 'required');


            $this->flight_image = "";
            if ($_FILES['flight_image']['name'] != "") {
                $config['upload_path'] = './assets/ico/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5048';
                $this->upload_file($config, 'flight_image');
                //	$this->form_validation->set_rules('image_1', 'image_1', 'callback_check_file[image_1]');
            }

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/add_flight');
            } else {

                $data1 = array(
                    'fimage' => $_FILES['flight_image']['name'],
                    'flight_code' => $filght_code,
                    'fligt_name' => $flight_name
                );

                //print_r($data1);
                $this->region_model->insert_data('flight_image', $data1);
                echo "<script>alert('Upload Detail Successfully');window.location.href=" . base_url() . ";</script>";

            }
        } else {

            $this->load->view('admin/add_flight');
        }

    }


    public function do_upload()
    {

    }


    function update_cab()
    {
        $this->agent_auth();

        $cname = @$this->input->post('cab_name');
        $desc = @$this->input->post('cab_details');
        $this->form_validation->set_rules('cab_name', 'cab_name', 'required');
        $this->form_validation->set_rules('cab_details', 'cab_details', 'required');

        //$ctry = @$this->input->post('country');
        //$state = @$this->input->post('state');
        // $city = @$this->input->post('city');
        $price = $this->input->post('price');

        $rating = $this->input->post('rating');

        $offer = $this->input->post('offer');
        $trv_feedback = $this->input->post('trv_feedback');


        $this->cab_image = "";

        if (@$_FILES['cab_image']['name'] != "") {
            $config['upload_path'] = './upload/cabs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'cab_image');
            //$this->form_validation->set_rules('cab_image', 'cab_image', 'callback_check_file[cab_image]');
        }

        $cab_id['hid'] = $this->input->get_post('id');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/edit_cab_view', $cab_id);
        } else {

            $local = $this->input->post('local');

            $out_station = $this->input->post('out_station');
            $transfer = $this->input->post('transfer');

            $local_d = implode("%#%", $local);


            $out_station_d = implode("%#%", $out_station);


            $transfer_d = implode("%#%", $transfer);


            $cdata = array(
                'cab_id' => $this->input->get_post('id'),
                'cab' => $cname,
                'details' => $desc,

                'price' => $price,
                'rating' => $rating,

                'image' => $this->cab_image,
                'offer' => $offer,
                'trv_feedback' => $trv_feedback,
                'local' => $local_d,
                'out_station' => $out_station_d,
                'transfer' => $transfer_d

            );


            if (empty($cdata['image'])) {
                unset($cdata['image']);
            }
            // print_r($cdata); die;


            $this->associate_model->upcab($cab_id['hid'], $cdata);


            echo "<script>alert('Cab updated  Successfully'); window.location='" . base_url() . "index.php/dashboard/cab_view';</script>";


        }
    }


    function cab_view()
    {

        $this->load->view('admin/cab_view');
    }


    function del_cab()
    {
        $this->agent_auth();

        $del_cab = $this->input->post('hid');
        $del = $this->associate_model->delete_cab($del_cab);
        if ($del == TRUE) {
            echo "<script>alert('Cab Removed Successfully'); window.location='" . base_url() . "index.php/dashboard/cab_view';</script>";

        }
    }

    function edit_cab()
    {
        $this->agent_auth();
        $cab['hid'] = $this->input->get_post('id');
        $cabdata = $this->associate_model->getcabbyid($cab['hid']);
        if ($cab['hid'] != "" AND $cabdata) {

            $this->load->view('admin/edit_cab_view', $cab);

        }

    }


    // hotel methods  are defined  here
    function add_hotel()
    {
        $this->agent_auth();
        $hname = @$this->input->post('hotel_name');
        $desc = @$this->input->post('description');
        $ctry = @$this->input->post('country');
        $state = @$this->input->post('state');
        $city = @$this->input->post('city');
        $price = $this->input->post('price');

        $rating = $this->input->post('rating');

        $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
        // $this->form_validation->set_rules('main_image', 'main_image', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');

        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('rating', 'rating', 'required');
        $this->main_image = "";
        if (@$_FILES['main_image']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'main_image');
            //$this->form_validation->set_rules('main_image', 'main_image', 'callback_check_file[main_image]');
        }
        $this->image_1 = "";
        if (@$_FILES['image_1']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_1');
            //$this->form_validation->set_rules('image_1', 'image_1', 'callback_check_file[image_1]');
        }
        $this->image_2 = "";
        if (@$_FILES['image_2']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_2');
            //$this->form_validation->set_rules('image_2', 'image_2', 'callback_check_file[image_2]');
        }

        $this->image_3 = "";
        if (@$_FILES['image_3']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_3');
            //$this->form_validation->set_rules('image_3', 'image_3', 'callback_check_file[image_3]');
        }
        $this->image_4 = "";
        if (@$_FILES['image_4']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_4');
            //$this->form_validation->set_rules('image_4', 'image_4', 'callback_check_file[image_4]');
        }
        $this->image_5 = "";
        if (@$_FILES['image_5']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_5');
            //$this->form_validation->set_rules('image_5', 'image_5', 'callback_check_file[image_5]');
        }
        $this->image_6 = "";
        if (@$_FILES['image_6']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_6');
            //	$this->form_validation->set_rules('image_6', 'image_6', 'callback_check_file[image_6]');
        }
        if (@$this->main_image != "") {
            $this->form_validation->set_rules('main_image_title', 'main_image_title', 'required');

        }


        $this->form_validation->set_error_delimiters('<br /><span class="error"><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/add_hotel_view');
        } else {


            $length = 5;

            $hoteld_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

            $hdata = array(
                'hotel_id' => $hoteld_id,
                'hotel_name' => $hname,
                'description' => $desc,
                'country' => $ctry,
                'state' => $state,
                'city' => $city,
                'price' => $price,
                'rating' => $rating,

                'main_image' => @$this->main_image,
                'image_1' => @$this->image_1,
                'main_image_title' => @$this->input->post('main_image_title'),
                'image_2' => @$this->image_2,
                //'image_2'=> @$this->image_2,
                'image_3' => @$this->image_3,
                'image_4' => @$this->image_4,
                'image_5' => @$this->image_5,
                'image_6' => @$this->image_6

            );


            if ($this->associate_model->addhotel($hdata) === True) {
                echo "<script>alert('" . $hname . " Hotel Added Successfully'); window.location='" . base_url() . "index.php/dashboard/hotel_view';</script>";

            }

        }


    }


    function hotel_view()
    {
        $this->load->view('admin/hotel_view');
    }


    function hotel()
    {
        $user_uid = $this->session->userdata('uid');

        if (!$user_uid) {
            redirect('dashboard');
        }


        $ucheck = $this->user_model->get($user_uid);
        if ($ucheck[0]['service_type'] == '1') {
            echo "<script>alert('you are not registered for this service!');document.location='" . base_url() . "index.php/dashboard';</script>";

            //redirect('index.php/dashboard');

        }
        $del = $this->input->post('delid');
        if ($del === '1') {
            $this->associate_model->delhotel($this->input->post('hid'));
            echo "<script>alert('deleted!');</script>";
        }
        $this->load->view('associate/hotel_view');
    }


    function del_hotel()
    {
        $id = $this->input->get_post('id');
        $this->pack_model->del_hotel($id);
        echo "<script>alert('Hotel is removed!');document.location='" . base_url() . "index.php/dashboard/hotel_view';</script>";


    }


    function edit_hotel()
    {
        $hotel['hid'] = $this->input->get_post('id');
        $htldata = $this->associate_model->gethotelbyid($hotel['hid']);
        if ($hotel['hid'] != "" AND $htldata) {

            $this->load->view('admin/edit_hotel_view', $hotel);

        }


    }


    function update_hotel()
    {
        $this->agent_auth();
        $hotel['hid'] = $this->input->get_post('id');

        $htldata = $this->associate_model->gethotelbyid($this->input->get_post('id'));

        $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
        // $this->form_validation->set_rules('main_image', 'main_image', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        $ctry = $htldata[0]['country'];
        $state = $htldata[0]['state'];
        $city = $htldata[0]['city'];
        if ($this->input->get_post('place') === '1') {
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');


            $ctry = $this->input->post('country');
            $state = $this->input->post('state');
            $city = $this->input->post('city');

        }


        $this->main_image = "";
        if (@$_FILES['main_image']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'main_image');
            //	$this->form_validation->set_rules('main_image', 'main_image', 'callback_check_file[main_image]');
        }
        $this->image_1 = "";
        if (@$_FILES['image_1']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_1');
            //	$this->form_validation->set_rules('image_1', 'image_1', 'callback_check_file[image_1]');
        }
        $this->image_2 = "";
        if (@$_FILES['image_2']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_2');
            //	$this->form_validation->set_rules('image_2', 'image_2', 'callback_check_file[image_2]');
        }

        $this->image_3 = "";
        if (@$_FILES['image_3']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_3');
            //	$this->form_validation->set_rules('image_3', 'image_3', 'callback_check_file[image_3]');
        }
        $this->image_4 = "";
        if (@$_FILES['image_4']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_4');
            //		$this->form_validation->set_rules('image_4', 'image_4', 'callback_check_file[image_4]');
        }
        $this->image_5 = "";
        if (@$_FILES['image_5']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_5');
            //		$this->form_validation->set_rules('image_5', 'image_5', 'callback_check_file[image_5]');
        }
        $this->image_6 = "";
        if (@$_FILES['image_6']['name'] != "") {
            $config['upload_path'] = './upload/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '5048';
            $this->upload_file($config, 'image_6');
            //	$this->form_validation->set_rules('image_6', 'image_6', 'callback_check_file[image_6]');
        }
        if (@$this->main_image != "") {
            $this->form_validation->set_rules('main_image_title', 'main_image_title', 'required');

        } else {
            @$this->main_image = $htldata[0]['main_image'];
        }


        $this->form_validation->set_error_delimiters('<br /><span class="error"><font color="red">', '</font></span>');
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->view('admin/edit_hotel_view', $hotel);
        } else {
            $hoteldata = array(
                'hotel_name' => $this->input->post('hotel_name'),
                'description' => $this->input->post('description'),
                'main_image_title' => $this->input->post('main_image_title'),
                'country' => $ctry,
                'state' => $state,
                'city' => $city,
                'main_image' => @$this->main_image,
                'main_image_title' => $this->input->post('main_image_title'),

                'image_1' => @$this->image_1,
                'image_2' => @$this->image_2,
                'image_3' => @$this->image_3,
                'image_4' => @$this->image_4,
                'image_5' => @$this->image_5,
                'image_6' => @$this->image_6

            );

            $this->associate_model->uphotel($hotel['hid'], $hoteldata);
            redirect('dashboard/hotel_view');
        }


    }

    function notification()
    {
        $this->load->view('admin/notify_view');

    }

    function del_notify($id)
    {
        $this->pack_model->delete_notify($id);
        $this->notification();
    }

    function fetchstate()
    {
        if ($this->input->is_ajax_request()) {

            $cdata = $this->region_model->getstate($this->input->post('country_id'));
            echo "<br/><label for='state' class='control-label_'> State <span class='required'>* </span></lebel>
                </label> <select name='state' onchange='showCity(this);' class='form-control' >
	            <option value=''>Please Select</option>";
            foreach ($cdata as $allstate) {
                echo '<option value="' . $allstate['id'] . '">' . $allstate['state'] . '</option>';
            }
            echo '</select>';
        }
    }

    function fetchcity()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->region_model->getcity($this->input->post('state_id'));
            echo "<br/><label for='city' class='control-label_'> City <span class='required'>* </span></lebel>
   <select name='city'  class='form-control'>
	<option value=''>Please Select</option>";
            foreach ($data as $allcity) {
                echo '<option value="' . $allcity['id'] . '">' . $allcity['city'] . '</option>';
            }
            echo '</select>';
        }
    }

    function addcity()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->region_model->getcidbyname($this->input->post('country'));
            $cid = $data[0]['id'];
            $cdata = $this->region_model->getstate($cid);
            $i = 0;
            foreach ($cdata as $allstate) {
                $state[$i] = $allstate['state'];
                $i++;

            }

            $st['state'] = $state;
            print_r(json_encode($st));
        }

    }

    public function book_package($limit = 0)
    {
        $this->agent_auth();
        $pageData = 5;
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Pre';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url('index.php/dashboard/book_package');
        $q = $this->db->get('package_booking');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pageData;
        $this->pagination->initialize($config);

        $data['display'] = $this->region_model->getPackageBooking($limit, $pageData);
        $data['limit'] = $limit;
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/book_package');
        $this->load->view('admin/admin_footer');
    }

    /* Function for booked flight */
    public function book_flight($limit = null)
    {
        $this->agent_auth();
        $pageData = 5;
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Pre';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url('index.php/dashboard/book_flight');
        $q = $this->db->get('flight_bookings');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pageData;
        $this->pagination->initialize($config);

        $data['display'] = $this->region_model->getFlightBooking($limit, $pageData);
        $this->load->view('admin/book_flight', $data);
    }
    /* Function end for booked flight */


    /* Function for booked buses */
    public function book_buses($limit = null)
    {
        $this->agent_auth();
        $pageData = 5;
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Pre';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url('index.php/dashboard/book_buses');
        $q = $this->db->get('bus_bookings');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pageData;
        $this->pagination->initialize($config);

        $data['display'] = $this->region_model->getBusesBooking($limit, $pageData);
        $this->load->view('admin/book_buses', $data);
    }
    /* Function end for booked buses*/

    /* Function for booked hotels */
    public function book_hotels($limit = null)
    {
        $this->agent_auth();
        $pageData = 5;
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Pre';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url('index.php/dashboard/book_hotels');
        $q = $this->db->get('hotel_bookings');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pageData;
        $this->pagination->initialize($config);

        $data['display'] = $this->region_model->getHotelsBooking($limit, $pageData);
        $this->load->view('admin/book_hotels', $data);
    }

    /* Function end for booked hotels*/

    public function agent_request($limit = null)
    {
        $this->agent_auth();

        $pagedata = 5;
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Pre';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url('index.php/dashboard/agent_request');
        $q = $this->db->get('agent_request');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pagedata;
        $this->pagination->initialize($config);

        $display['data'] = $this->agent_model->show_agent_request($limit, $pagedata);
        $this->load->view('admin/agent_request', $display);

    }

    function delImg()
    {
        $this->agent_auth();
        $data = $this->input->post('id');
        $this->region_model->row_delete('flight_image', $data);
        return true;
    }


}// close brace of class   

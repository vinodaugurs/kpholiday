<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $destinations = $this->user_model->destinations();
        $packages = $this->pack_model->packeges();
        $this->load->view('blocks/header');
        $this->load->view('home/home', array('destinations' => $destinations, 'packages' => $packages));
        $this->load->view('blocks/footer');
    }

    public function login() {

        $this->session->keep_flashdata('redirect_url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $username = $this->input->post('email');
            $pass = $this->input->post('password');
            $encode = hash('md5', $pass);
            $result = $this->user_model->get(['email' => $username, 'password' => $encode]);
            if (!empty($result)) {
                if ($result[0]['type'] === 'agent') {
                    $this->session->set_userdata($result[0]);
                    redirect('agent/index');
                } else if ($result[0]['type'] === 'Admin') {
                    $this->session->set_userdata($result[0]);
                    redirect('dashboard/index');
                } else if ($result[0]['type'] === 'traveler') {
                    $this->session->set_userdata($result[0]);
                    $redirect_url = $this->session->flashdata('redirect_url');
                    //die($redirect_url);
                    if (!empty($redirect_url)) {
                        redirect($redirect_url);
                    }
                    redirect('user/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Email or Paassword. Please try again');
                // die;
                redirect('login');
            }
        }
        $this->load->view('home/login');
    }

    public function checkLogin($username = "", $password = "") {
        $encode = hash('md5', $password);
        $result = $this->user_model->get(array(
            'email' => $username,
            'password' => $encode
        ));
        if ($result) {
            $this->session->set_userdata($result[0]);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    ///********** Register new user *********///
    public function registerNewUser() {
        $this->session->keep_flashdata('redirect_url');
        $fullName = $this->input->post('txtFullName');
        $boxEmail = $this->input->post('txtEmail');
        $password = $this->input->post('txtPassword');


        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtFullName', 'Full name', 'required');
        $this->form_validation->set_rules('txtEmail', 'Email address', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|max_length[16]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('home/login');
        } else {

            $eml = explode("@", $boxEmail);
            $username = $eml[0];
            $i = 1;
            while (($this->user_model->check_username($username)) != true) {
                $username = $username . $i;
            }

            $registerData = array();
            $registerData['uid'] = $this->randomPassword();
            $registerData['user_level'] = "1";
            $registerData['service_type'] = "traveler";
            $registerData['user_name'] = $username;
            $registerData['user_name'] = $fullName;
            $name = explode(" ", $fullName);
            $registerData['first_name'] = current($name);
            $registerData['last_name'] = end($name);
            $txtPassword = $password;
            $registerData['password'] = hash('md5', $txtPassword);
            $registerData['email'] = $boxEmail;
            $registerData['type'] = 'traveler';
            $registerData['phone'] = "";
            $registerData['country'] = "";
            $registerData['PinCode'] = "";
            $registerData['state'] = "";
            $registerData['city'] = "";
            $registerData['active'] = 'Active';
            $registerData['date'] = date("Y-m-d");
            $password = hash('md5', $txtPassword);

            $success = $this->user_model->register_user($registerData);
            if ($success) {
                $result = $this->user_model->get(['email' => $boxEmail, 'password' => $password]);
                if ($result) {
                    if (!empty($result)) {
                        if ($result[0]['type'] === 'agent') {
                            $this->session->set_userdata($result[0]);
                            $this->session->set_userdata('auid', $result[0]['uid']);
                            redirect('agent');
                        } else if ($result[0]['type'] === 'Admin') {
                            $this->session->set_userdata($result[0]);
                            redirect('dashboard/index');
                        } else if ($result[0]['type'] === 'traveler') {
                            $this->session->set_userdata($result[0]);
                            $redirect_url = $this->session->flashdata('redirect_url');
                            if (!empty($redirect_url)) {
                                redirect($redirect_url);
                            }
                            redirect('user/index');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Invalid Email or Paassword. Please try again');
                        redirect('login');
                    }
                }
            }
        }

        if (!empty($result)) {

            /*
              $this->load->model('sendmail_model');
              $sendetails['Email'] = $registerData['email'];
              $sendetails['UserID'] = $registerData['uid'];
              $sendetails['Password'] = $txtPassword;
              $data['msgData'] = $sendetails;
              $msg = $this->load->view('email/customer', $data, true);
              $this->sendmail_model->send_mail2("no-reply@kpholidays.com", "KP Holidays", $registerData['email'], 'KP Holidays User Registration', $msg);
              $this->email->from('support@kpholidays.com', 'Support');
              $this->email->to($registerData['email']);
              $this->email->cc('rahulpal.mailbox@gmail.com');
              $this->email->subject('KP Holidays User Registration');
              $this->email->message('Your are successfully complete registration process and your password is:'.$txtpassword);

              $this->email->send();

              #$this->session->set_userdata($result[0]);
              $data['error'] = 0;
              $data['msg'] = "Account Created Successfully";
              echo json_encode($data);
              die;
             */
        } else {
            /* $data['error'] = 1;
              $data['msg'] = "Sorry some error occured please retry";
              echo json_encode($data);
              die; */
        }
    }

    //get state data
    public function getState($id) {
        $result = $this->region_model->getstate($id);
        echo json_encode($result);
        die();
    }

    //get city data
    public function getcity($id) {
        $result = $this->region_model->getcity($id);
        echo json_encode($result);
        die();
    }

    public function checkMail($value) {
        $result = $this->user_model->check_email($value);
        return $result;
    }

    /* use only booking from time start    */

    public function getStateBookig($name) {

        $id = $this->region_model->getCountryName(urldecode($name));


        $result = $this->region_model->getstate($id['0']['id']);
        echo json_encode($result);
        die();
    }

    public function getcityBookig($name) {

        $id = $this->region_model->getStateId($name);


        // $result = $this->region_model->getcity($id['0']['']);
        //echo json_encode($result);
        die();
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function logout() {
        $this->session->unset_userdata('auid');
        $this->session->unset_userdata('uid');
        $this->session->sess_destroy();
        redirect();
    }

    public function view_detail($id) {
        $data['detail'] = $this->pack_model->about_destination($id);
        $this->load->view('blocks/header');
        $this->load->view('home/destination', $data);
        $this->load->view('blocks/footer');
    }

    public function aboutus() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/aboutus', $data);
    }

    public function PrivacyPolicy() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/PrivacyPolicy', $data);
    }

    public function UserAgreement() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/UserAgreement', $data);
    }

    public function TeamEaseyatra() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/TeamEaseyatra', $data);
    }

    public function FareRules() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/FareRules', $data);
    }

    public function Jobs() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/Jobs', $data);
    }

    public function TermsofService() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/TermsofService', $data);
    }

    public function RegisterPage() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/RegisterPage', $data);
    }

    public function bookings() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/bookings', $data);
    }

    public function customer_support_page() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/customer_support_page', $data);
    }

    public function package_detail($id) {
        
        $this->load->model("package_rating_model");
        $data['detail'] = $this->pack_model->pack_details($id);
        //$data['facilities'] = $this->pack_model->get_facilities();
        $data['reviews'] = $this->package_rating_model->getAllReview($id);
        $review_rating = $this->package_rating_model->getReviewAvg($id);
        
        $data['review_rating'] = $review_rating;
        $data['review_submit_button'] = true;
        $userId = $this->session->userdata('uid');
        if($this->package_rating_model->checkAlreadyDoneReview($id , $userId)>0){
            $data['review_submit_button'] = false;
        }
        
        $this->load->view('blocks/header', $data);
        $this->load->view('home/package_detail');
        $this->load->view('blocks/footer');
    }
    
    public function submitReview(){
        
        $this->load->model("package_rating_model");
        $userId = $this->session->userdata('uid');
        if (empty($userId)) {
            $this->session->set_flashdata('redirect_url', uri_string());
            redirect('login');
        }

        if($this->input->post('sbmt')=="Leave a Review"){
            
            $review_title = $this->input->post("review_title");
            $review_text = $this->input->post("review_text");
            $pack_id = $this->input->post("pack_id");
            $sleep = $this->input->post("sleep");
            $location = $this->input->post("location");
            $service = $this->input->post("service");
            $clearness = $this->input->post("clearness");
            $rooms = $this->input->post("rooms");
            
            $cal_average_rating = ($sleep + $location + $service + $clearness + $rooms)/5;
            
            if($this->package_rating_model->checkAlreadyDoneReview($pack_id , $userId)>0){
                $this->session->set_flashdata('success', 'Success! You have done successfully.');
                redirect(base_url('index.php/home/package_detail/'.$pack_id));
            }
            
            $data = array(
                "pack_id"=> $pack_id,
                "user_id"=> $userId,
                "review_title"=> $review_title,
                "review_text"=> $review_text,
                "sleep"=> $sleep,
                "location"=> $location,
                "service"=> $service,
                "clearness"=> $clearness,
                "rooms"=> $rooms,
                "rating_average"=> $cal_average_rating,
            );
            if($this->package_rating_model->save($data)){
                $this->session->set_flashdata('', 'Success! You have done successfully.');
                redirect(base_url('index.php/home/package_detail/'.$pack_id));
            }
        }
    }

    public function View_PNR() {
        $ticket = array();
        if (isset($_POST['ticketpnr']) and isset($_POST['mobilenumber']) and $this->input->post('ticketpnr') != '' and $this->input->post('mobilenumber') != '') {
            $ticket = $this->user_model->get_data("flight_bookings", array('ContactNumber' => trim($this->input->post('mobilenumber')), 'HermesPNR' => trim($this->input->post('ticketpnr'))));
            if (!empty($ticket)) {
                $this->Flightprint_ticket($ticket);
                return;
            }

            //find hotle bookings
            $ticket = $this->user_model->get_data("hotel_bookings", array('MobileNumber' => trim($this->input->post('mobilenumber')), 'BookingID' => trim($this->input->post('ticketpnr'))));
            if (!empty($ticket)) {
                //print_r($ticket);
                if ($ticket[0]['HotelType'] == "Domestic")
                    echo $result = file_get_contents(base_url('/index.php/hotel/print_dom_ticket/' . $ticket[0]['BookingID']));
                else
                    echo $result = file_get_contents(base_url('/index.php/hotel/print_Intl_ticket/' . $ticket[0]['BookingID']));

                return true;
            }

            //find bus bookings
            $ticket = $this->user_model->get_data("bus_bookings", array('ContactNumber' => trim($this->input->post('mobilenumber')), 'TransportPNR' => trim($this->input->post('ticketpnr'))));
            if (!empty($ticket)) {
                echo $result = file_get_contents(base_url('/index.php/bus/get_printHome/' . $ticket[0]['TransportPNR']));
                return true;
            }

            if (empty($ticket)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>SORRY!</strong> NO Ticket Found with this PNR and mobile number
                            </div>');
            }
        }
        $data['data'] = array();
        $this->load->view('home/View_PNR', $data);
    }

    public function Flightprint_ticket($data) {
        if (empty($data)) {
            redirect(base_url('/'), 'refresh');
        }
        $HermesPNR = explode("_", $data[0]['HermesPNR']);
        $gresult = array();
        foreach ($HermesPNR as $tid) {
            if ($data[0]['TravelType'] == "D")
                $result = file_get_contents(base_url('/index.php/flight/GetReprint/' . $tid . '/' . true));
            else
                $result = file_get_contents(base_url('/index.php/flight/IntGetReprint/' . $tid . '/' . true));


            $gresult[] = json_decode($result, true);
        }

        $data['data'] = $gresult;
        // $data['Flight_dietail']=$Flight_dietail;
        // print_r($gresult);
        if (empty($data['data'])) {
            redirect(base_url('/'), 'refresh');
        }
        $this->load->view('user/print-airline-ticket', $data);
    }

    public function MyCancellations() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/MyCancellations', $data);
    }

    public function MyBookings() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/MyBookings', $data);
    }

    public function servicespage() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/services_page', $data);
    }

    public function contactuspage() {
        $data['data'] = array();
        $this->load->view('blocks/header', $data);
        $this->load->view('home/contact_us_page');
        $this->load->view('blocks/footer');
    }

    public function HelpTopics() {
        $data['data'] = array();
        $this->load->view('home/HelpTopics', $data);
    }

    public function SignUpPage() {
        //$data['detail']=$this->pack_model->about_destination($id);
        $data['data'] = array();
        $this->load->view('home/SignUpPage', $data);
    }

    public function DMR_Url() {
        $AgentCode = $this->session->userdata('uid');
        $Userid = $this->session->userdata('aid');
        $SecurityID = $_SERVER['REMOTE_ADDR'];
        $MerchantID = "139";
        $Terminalid = "100139";
        $LoginKey = "5421447410";
        $encryptdata = $AgentCode . '~' . $Userid . '~' . $SecurityID . '~' . $MerchantID . '~' . $Terminalid . '~' . $LoginKey;
        $encryptdata = base64_encode($encryptdata);
        // echo 'http://202.54.157.77/ICCDMRWL/Default.aspx?Credentials='.$encryptdata;
        //header('Location: http://202.54.157.77/ICCDMRWL/Default.aspx?Credentials='.$encryptdata);
        //echo 'http://dmr.icashcard.in/default.aspx?Credentials='.$encryptdata;
        header('Location: http://dmr.icashcard.in/default.aspx?Credentials=' . $encryptdata);
        exit;
    }

    public function DMR_Url_DEMO() {
        header('Content-type: application/xml');
        $postData = file_get_contents('php://input');
        libxml_use_internal_errors(true);
        $request = simplexml_load_string($postData);
        if (!$request) {
            $errors = libxml_get_errors();
            $msg = (isset($errors[0]->message)) ? $errors[0]->message : "Request xml is not in correct formate";
            libxml_clear_errors();


            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR><STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>" . $msg . "</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }
        $myfile = fopen("dmrdata.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $postData . date("Y-m-d H:i:s"));
        fclose($myfile);

        $AGENTCODE = $this->user_model->get_data("users", array('uid' => trim($request->AGENTCODE)));
        $USERID = $this->user_model->get_data("users", array('id' => trim($request->USERID)));
        if ($request->AGENTCODE == '' or empty($AGENTCODE) or empty($USERID)) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE/USERID, Invalid AGENTCODE/USERID</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if (!isset($request->METHODID) or $request->METHODID == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->getName() == 'CHECKBALANCEREQUEST') {
            $this->DMR_CheckBalance($request);
        }
        if ($request->getName() == 'AGENTQUOTADEBITREQUEST') {
            $this->DMR_DebitAgent($request);
        }

        if ($request->getName() == "AGENTQUOTACREDITREQUEST") {
            $this->DMR_CreditAgent($request);
        }

        if ($request->getName() == "VERIFICATIONREQUEST") {
            $this->DMR_verification($request);
        }

        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
        echo $xml;
        exit();
    }

    public function DMR_Process() {
        header('Content-type: application/xml');
        $postData = file_get_contents('php://input');
        libxml_use_internal_errors(true);
        $request = simplexml_load_string($postData);
        if (!$request) {
            $errors = libxml_get_errors();
            $msg = (isset($errors[0]->message)) ? $errors[0]->message : "Request xml is not in correct formate";
            libxml_clear_errors();


            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR><STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>" . $msg . "</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }
        $myfile = fopen("dmrdata.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $postData . date("Y-m-d H:i:s"));
        fclose($myfile);

        $AGENTCODE = $this->user_model->get_data("users", array('uid' => trim($request->AGENTCODE)));
        $USERID = $this->user_model->get_data("users", array('id' => trim($request->USERID)));
        if ($request->AGENTCODE == '' or empty($AGENTCODE) or empty($USERID)) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE/USERID, Invalid AGENTCODE/USERID</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if (!isset($request->METHODID) or $request->METHODID == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->getName() == 'CHECKBALANCEREQUEST') {
            $this->DMR_CheckBalance($request);
        }
        if ($request->getName() == 'AGENTQUOTADEBITREQUEST') {
            $this->DMR_DebitAgent($request);
        }

        if ($request->getName() == "AGENTQUOTACREDITREQUEST") {
            $this->DMR_CreditAgent($request);
        }

        if ($request->getName() == "VERIFICATIONREQUEST") {
            $this->DMR_verification($request);
        }

        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
        echo $xml;
        exit();
    }

    public function DMR_CheckBalance($request) {
        header('Content-type: application/xml');

        $xml = "";
        /* if(!isset($request->AGENTCODE) or !isset($request->USERID) or !isset($request->GIREFID)){
          $xml="<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
          <STATUSCODE>1</STATUSCODE>
          <STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
          </ERROR>";
          echo $xml;
          exit();
          } */

        if ($request->AGENTCODE == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->USERID == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN User ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->GIREFID == '' or strlen(trim($request->GIREFID)) > 16) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        $transaction = $this->user_model->DMR_get_transaction(trim($request->GIREFID));
        if (count($transaction) > 0) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GIID ,GIREFID should be unique</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if (!isset($request->METHODID) or $request->METHODID != 1) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
						<USERID>" . $request->USERID . "</USERID>
						<GIREFID>" . $request->GIREFID . "</GIREFID>
						<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }
        $balance_array = $this->user_model->DMR_get_balance($request->USERID);
        $balance = ($balance_array->BALANCE != '') ? $balance_array->BALANCE : 0;
        //add transction
        $tdata = array();
        $tdata['user_id'] = $request->USERID;
        $tdata['AGENTCODE'] = trim($request->AGENTCODE);
        $tdata['GIREFID'] = trim($request->GIREFID);
        $tdata['METHODID'] = trim($request->METHODID);
        $tdata['BALANCE'] = $balance;
        $tdata['STATUSCODE'] = 0;
        $tdata['STATUSDESCRIPTION'] = 'SUCCESS';
        $this->user_model->DMR_add_transaction($tdata);
        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><CHECKBALANCERESPONSE>
				<STATUSCODE>0</STATUSCODE>
				<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
				<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
				<USERID>" . $request->USERID . "</USERID>
				<GIREFID>" . $request->GIREFID . "</GIREFID>
				<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>
				<BALANCE>" . $balance . "</BALANCE>
				<METHODID>1</METHODID>
				</CHECKBALANCERESPONSE>";
        echo $xml;
        exit();
    }

    public function DMR_CreditAgent($request) {
        header('Content-type: application/xml');
        $xml = "";
        /* if(!isset($request->AGENTCODE) or !isset($request->USERID) or !isset($request->GIREFID) or !isset($request->CREDITAMOUNT) or !isset($request->REASON)){
          $xml="<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
          <STATUSCODE>1</STATUSCODE>
          <STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
          </ERROR>";
          echo $xml;
          exit();
          } */

        if ($request->AGENTCODE == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->USERID == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN User ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->GIREFID == '' or strlen(trim($request->GIREFID)) > 16) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }
        if ($request->CREDITAMOUNT == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->REASON == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if (!isset($request->METHODID) or $request->METHODID != 3) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
						<USERID>" . $request->USERID . "</USERID>
						<GIREFID>" . $request->GIREFID . "</GIREFID>
						<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }

        $transaction = $this->user_model->DMR_get_transaction(trim($request->GIREFID));
        if (count($transaction) > 0) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GIID ,GIREFID should be unique</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        $balance_array = $this->user_model->DMR_get_balance($request->USERID);
        $balance = ($balance_array->BALANCE != '') ? $balance_array->BALANCE : 0;
        $tbalance = $balance + $request->CREDITAMOUNT;
        $this->user_model->DMR_update_balance($tbalance, $request->USERID);
        $tdata = array();
        $tdata['user_id'] = $request->USERID;
        $tdata['AGENTCODE'] = trim($request->AGENTCODE);
        $tdata['GIREFID'] = trim($request->GIREFID);
        $tdata['METHODID'] = trim($request->METHODID);
        $tdata['BALANCE'] = $tbalance;
        $tdata['CREDITAMOUNT'] = trim($request->CREDITAMOUNT);
        $tdata['REASON'] = trim($request->REASON);
        $tdata['STATUSCODE'] = 0;
        $tdata['STATUSDESCRIPTION'] = 'SUCCESS';
        $this->user_model->DMR_add_transaction($tdata);

        $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
		<AGENTQUOTACREDITRESPONSE>
				<STATUSCODE>0</STATUSCODE>
				<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
				<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
				<USERID>" . $request->USERID . "</USERID>
				<GIREFID>" . $request->GIREFID . "</GIREFID>
				<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>
				<CREDITAMOUNT>" . $request->CREDITAMOUNT . "</CREDITAMOUNT>
				<BALANCE>" . $tbalance . "</BALANCE>
				<METHODID>3</METHODID>
				</AGENTQUOTACREDITRESPONSE>";
        echo $xml;
        exit();
    }

    public function DMR_DebitAgent($request) {
        header('Content-type: application/xml');
        $xml = "";
        /* if(!isset($request->AGENTCODE) or !isset($request->USERID) or !isset($request->GIREFID) or !isset($request->TOTALAMOUNT) or !isset($request->RECHARGEFEE) or !isset($request->NETAMOUNT)){
          $xml="<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
          <STATUSCODE>1</STATUSCODE>
          <STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
          </ERROR>";
          echo $xml;
          exit();
          } */

        if ($request->AGENTCODE == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->USERID == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN User ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->GIREFID == '' or strlen(trim($request->GIREFID)) > 16) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }
        if ($request->TOTALAMOUNT == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN Total Amount  INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->RECHARGEFEE == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN Recharge fee INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if ($request->NETAMOUNT == '') {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Check all the  xml tag corrected passed or not</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        if (!isset($request->METHODID) or $request->METHODID != 2) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>INVALID METHOD ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
						<USERID>" . $request->USERID . "</USERID>
						<GIREFID>" . $request->GIREFID . "</GIREFID>
						<METHODID>" . $request->METHODID . "</METHODID>
					</ERROR>";
            echo $xml;
            exit();
        }

        $transaction = $this->user_model->DMR_get_transaction(trim($request->GIREFID));
        if (count($transaction) > 0) {
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GIID ,GIREFID should be unique</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
            echo $xml;
            exit();
        }

        $balance_array = $this->user_model->DMR_get_balance($request->USERID);
        $balance = ($balance_array->BALANCE != '') ? $balance_array->BALANCE : 0;


        $debutamount_with_percent = $request->NETAMOUNT + (($request->NETAMOUNT * .6) / 100);
        $tbalance = $balance - $request->NETAMOUNT;


        if ($tbalance >= 0) {
            $tdata = array();
            $tdata['user_id'] = $request->USERID;
            $tdata['AGENTCODE'] = trim($request->AGENTCODE);
            $tdata['GIREFID'] = trim($request->GIREFID);
            $tdata['METHODID'] = trim($request->METHODID);
            $tdata['BALANCE'] = $tbalance;
            $tdata['TOTALAMOUNT'] = trim($request->TOTALAMOUNT);
            $tdata['DEBITAMOUNT'] = trim($request->NETAMOUNT);
            $tdata['RECHARGEFEE'] = trim($request->RECHARGEFEE);
            $tdata['ADMIN_COMMISSION'] = trim(($request->NETAMOUNT * .6) / 100);
            $tdata['REASON'] = trim($request->REASON);
            $tdata['STATUSCODE'] = 0;
            $tdata['STATUSDESCRIPTION'] = 'SUCCESS';
            $this->user_model->DMR_add_transaction($tdata);
            $this->user_model->DMR_update_balance($tbalance, $request->USERID);

            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
				<AGENTQUOTADEBITRESPONSE>		
					<STATUSCODE>0</STATUSCODE>
					<STATUSDESCRIPTION>SUCCESS</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>
					<TOTALAMOUNT>" . $request->TOTALAMOUNT . "</TOTALAMOUNT>
					<RECHARGEFEE>" . $request->RECHARGEFEE . "</RECHARGEFEE>
					<NETAMOUNT>" . $request->NETAMOUNT . "</NETAMOUNT>
					<BALANCE>" . $tbalance . "</BALANCE>
					<METHODID>" . $request->METHODID . "</METHODID>
				</AGENTQUOTADEBITRESPONSE>";
            echo $xml;
            exit();
        } else {

            $tdata = array();
            $tdata['user_id'] = $request->USERID;
            $tdata['AGENTCODE'] = trim($request->AGENTCODE);
            $tdata['GIREFID'] = trim($request->GIREFID);
            $tdata['METHODID'] = trim($request->METHODID);
            $tdata['BALANCE'] = $balance;
            $tdata['TOTALAMOUNT'] = trim($request->TOTALAMOUNT);
            $tdata['DEBITAMOUNT'] = trim($request->NETAMOUNT);
            $tdata['RECHARGEFEE'] = trim($request->RECHARGEFEE);
            $tdata['REASON'] = trim($request->REASON);
            $tdata['STATUSCODE'] = 1;
            $tdata['STATUSDESCRIPTION'] = 'INSUFFICIENT BALANCE';
            $this->user_model->DMR_add_transaction($tdata);
            //$this->user_model->DMR_update_balance($tbalance,78);
            $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
				<AGENTQUOTADEBITRESPONSE>		
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>INSUFFICIENT BALANCE</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>
					<TOTALAMOUNT>" . $request->TOTALAMOUNT . "</TOTALAMOUNT>
					<RECHARGEFEE>" . $request->RECHARGEFEE . "</RECHARGEFEE>
					<NETAMOUNT>" . $request->NETAMOUNT . "</NETAMOUNT>
					<BALANCE>" . $balance . "</BALANCE>
					<METHODID>" . $request->METHODID . "</METHODID>
				</AGENTQUOTADEBITRESPONSE>";
            echo $xml;
            exit();
        }
    }

    public function DMR_verification($request) {
        header('Content-type: application/xml');
        $xml = "";
        if ($request->METHODID == 1) {
            if (!isset($request->AGENTCODE) or ! isset($request->USERID) or ! isset($request->GIREFID)) {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }

            if ($request->AGENTCODE == '') {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN AGENTCODE INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }

            if ($request->USERID == '') {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN User ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }

            if ($request->GIREFID == '') {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>ERROR IN GI Ref. ID INPUT</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }


            $transaction = $this->user_model->DMR_get_transaction(trim($request->GIREFID), trim($request->METHODID));

            if ($transaction != '') {

                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
				<VERIFICATIONRESPONSE>		
					<STATUSCODE>" . $transaction->STATUSCODE . "</STATUSCODE>
					<STATUSDESCRIPTION>" . $transaction->STATUSDESCRIPTION . "</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>						
					<BALANCE>" . $transaction->BALANCE . "</BALANCE>
					<METHODID>" . $request->METHODID . "</METHODID>
				</VERIFICATIONRESPONSE>";
                echo $xml;
                exit();
            } else {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<VERIFICATIONRESPONSE>				
						<STATUSCODE>1</STATUSCODE>
						<STATUSDESCRIPTION>Eroor Invalid GIREFID or METHODID,no transaction not match with this  GIREFID and Mehod ID</STATUSDESCRIPTION>
						<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
					</VERIFICATIONRESPONSE>";
                echo $xml;
                exit();
            }
        } elseif ($request->METHODID == 2) {

            if (!isset($request->AGENTCODE) or ! isset($request->USERID) or ! isset($request->GIREFID)) {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }

            /* if($request->RECHARGEFEE==''){
              $xml="<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
              <STATUSCODE>1</STATUSCODE>
              <STATUSDESCRIPTION>ERROR IN Recharge fee INPUT</STATUSDESCRIPTION>
              </ERROR>";
              echo $xml;
              exit();
              }

              if($request->NETAMOUNT==''){
              $xml="<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
              <STATUSCODE>1</STATUSCODE>
              <STATUSDESCRIPTION>ERROR IN Net Amount INPUT</STATUSDESCRIPTION>
              </ERROR>";
              echo $xml;
              exit();
              } */

            $transaction = $this->user_model->DMR_get_transaction($request->GIREFID, $request->METHODID);
            if ($transaction != '') {

                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
							<VERIFICATIONRESPONSE>				
								<STATUSCODE>" . $transaction->STATUSCODE . "</STATUSCODE>
								<STATUSDESCRIPTION>" . $transaction->STATUSDESCRIPTION . "</STATUSDESCRIPTION>
								<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
								<USERID>" . $request->USERID . "</USERID>
								<GIREFID>" . $request->GIREFID . "</GIREFID>
								<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>						
								<TOTALAMOUNT>" . $transaction->TOTALAMOUNT . "</TOTALAMOUNT>
								<RECHARGEFEE>" . $transaction->RECHARGEFEE . "</RECHARGEFEE>
								<NETAMOUNT>" . $transaction->DEBITAMOUNT . "</NETAMOUNT>
								<BALANCE>" . $transaction->BALANCE . "</BALANCE>
								<METHODID>" . $request->METHODID . "</METHODID>
							</VERIFICATIONRESPONSE>";
                echo $xml;
                exit();
            } else {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>
					<STATUSCODE>1</STATUSCODE>	
					<STATUSDESCRIPTION>Eroor Invalid GIREFID or METHODID,no transaction not match with this  GIREFID and Mehod ID</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>					
					</ERROR>";
                echo $xml;
                exit();
            }
        } elseif ($request->METHODID == 3) {


            if (!isset($request->AGENTCODE) or ! isset($request->USERID) or ! isset($request->GIREFID)) {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?><ERROR>
					<STATUSCODE>1</STATUSCODE>
					<STATUSDESCRIPTION>Check all the  xml tag whether it  corrected passed or not</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>
				</ERROR>";
                echo $xml;
                exit();
            }

            $transaction = $this->user_model->DMR_get_transaction($request->GIREFID, $request->METHODID);
            if ($transaction != '') {

                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
				<VERIFICATIONRESPONSE>								
					<STATUSCODE>" . $transaction->STATUSCODE . "</STATUSCODE>
					<STATUSDESCRIPTION>" . $transaction->STATUSDESCRIPTION . "</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<CHANNELPARTNERREFID>TEST</CHANNELPARTNERREFID>						
					<CREDITAMOUNT>" . $transaction->CREDITAMOUNT . "</CREDITAMOUNT>
					<BALANCE>" . $transaction->BALANCE . "</BALANCE>
					<METHODID>" . $request->METHODID . "</METHODID>
				</VERIFICATIONRESPONSE>";
                echo $xml;
                exit();
            } else {
                $xml = "<?xml version='1.0' encoding='utf-8' standalone='no'?>
					<ERROR>					
					<STATUSCODE>1</STATUSCODE>	
					<STATUSDESCRIPTION>Eroor Invalid GIREFID or METHODID,no transaction not match with this  GIREFID and Mehod ID</STATUSDESCRIPTION>
					<AGENTCODE>" . $request->AGENTCODE . "</AGENTCODE>
					<USERID>" . $request->USERID . "</USERID>
					<GIREFID>" . $request->GIREFID . "</GIREFID>
					<METHODID>" . $request->METHODID . "</METHODID>			
					</ERROR>";
                echo $xml;
                exit();
            }
        }
    }

    public function forget() {
        $email = $this->input->post('email');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {

            $state['error'] = 1;
            $state['msg'] = strip_tags(validation_errors());
            echo json_encode($state);
            die;
        }


        $data = $this->user_model->forget($email);
        // echo json_encode($data);
        if (empty($data)) {

            $msg = 'Email adderess not present in database';
            echo json_encode($msg);
        } else {

            $randomUrl = $this->randomPassword();
            // print_r($data);
            $this->user_model->forget_activeRecord($randomUrl, $data[0]['uid']);

            //send mail

            $url = base_url('index.php/home/forget_url_link/' . $randomUrl . '/' . $data[0]['uid']);


            $this->load->model('sendmail_model');

            $msg1['Activation Link'] = urldecode($url);
            $data['msgData'] = $msg1;
            $msg = $this->load->view('email/forgot', $data, true);
            $this->sendmail_model->send_mail2("no-reply@kpholidays.com", "KP Holidays", $email, 'Forgot Password Request', $msg);
            $msg = "Please Check your Register Mail Account";
            echo json_encode($msg);
        }
    }

    public function forget_url_link($activeRecord, $uid) {
        $condition = $this->user_model->check_active_record($activeRecord);
        if (empty($condition)) {
            redirect('/');
        }
        $data = array('uid' => $uid);
        $this->load->view('home/forget-password', $data);
    }

    public function password_change($uid) {
        if (isset($_POST['submit'])) {
            $password = hash('md5', $this->input->post('password'));

            $this->user_model->passwordChange($uid, $password);
            redirect('/');
        }
    }

    public function addnewsletter() {
        $email = $this->input->get('email');
        if ($email != '') {
            $data = array();
            $data['email'] = $email;
            $this->user_model->add_data('newsletter', $data);
            echo "Your Email Address Added Successfully";
        } else {
            echo "Invalid Email Addresss";
        }
    }

    public function addnewsletter2() {
        header("Access-Control-Allow-Origin: http://agent.kpholidays.com");
        $email = $this->input->post('email');
        if ($email != '') {
            $data = array();
            $data['email'] = $email;
            $this->user_model->add_data('newsletter', $data);
            echo "Your Email Address Added Successfully";
        } else {
            echo "Invalid Email Addresss";
        }
    }

    public function testsendmail() {
        $this->load->model('sendmail_model');
        $sendetails['Email'] = "abc@abc.com";
        $sendetails['UserID'] = '5453';
        $sendetails['Password'] = '1234567';
        $msg = $this->load->view('email/customer', $sendetails, true);
        echo $msg;
        $this->sendmail_model->send_mail2("no-reply@kpholidays.com", "KP Holidays", "pguru.khalid@gmail.com", 'KP Holidays User Registration', $msg);
        die;
    }

    public function view_all_packages() {

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'index.php/home/view_all_packages'; //url to set pagination
        $config['total_rows'] = $this->pack_model->packeges_all_count();
        $config['per_page'] = 8;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 10;
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $offset = ($this->uri->segment(3));
        } else {
            $offset = 1;
        }
        $data["packages"] = $this->pack_model->packeges_all($config["per_page"], ($offset - 1) * $config["per_page"]);


        $this->load->view('blocks/header', $data);
        $this->load->view('home/view_all_packages');
        $this->load->view('blocks/footer');
    }

    /* function for view all destinations */

    public function view_all_destinations() {

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'index.php/home/view_all_destinations'; //url to set pagination
        $config['total_rows'] = $this->user_model->destinations_all_count();
        $config['per_page'] = 8;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 10;
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $offset = ($this->uri->segment(3));
        } else {
            $offset = 1;
        }
        $data["destinations"] = $this->user_model->destinations_all($config["per_page"], ($offset - 1) * $config["per_page"]);

        $this->load->view('blocks/header', $data);
        $this->load->view('home/view_all_destinations');
        $this->load->view('blocks/footer');
    }

    /* function end for view all destinations */
}

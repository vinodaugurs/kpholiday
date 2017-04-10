<?php

class User extends CI_Controller {

    public function index() {
        
        $log_user['user'] = $this->session->userdata('username');
        $log_user['uid'] = $this->session->userdata('uid');
        $log_user['profile'] = $this->user_model->login_detail($log_user['uid']);
        
        $log_user['activeMenu'] = 'index';
        $this->load->view('user/MyBookings', $log_user);
    }

    public function userSettings() {
        $this->load->model('User_model');
        $data['user'] = $this->user_model->user_uid($this->session->userdata('uid'));
        $data['activeMenu'] = 'userSettings';
        $this->load->helper('form');

        $this->load->view('user/ProfileSettings', $data);
    }

    public function travelPhotos() {
        $data['activeMenu'] = 'travelPhotos';
        $this->load->view('user/user-travel-photos', $data);
    }

    public function bookingHistory() {
        $data['activeMenu'] = 'bookingHistory';
        $this->load->view('user/booking-history', $data);
    }

    public function savedCards() {
        $data['activeMenu'] = 'savedCards';
        $this->load->view('user/saved-cards', $data);
    }

    public function wishlist() {
        $data['activeMenu'] = 'wishlist';
        $this->load->view('user/wishlist', $data);
    }

    public function update_user_info() {
        $updateData = array();

        $updateData['first_name'] = $this->input->post('fName');
        $updateData['last_name'] = $this->input->post('lName');
        $updateData['email'] = $this->input->post('email');
        $updateData['phone'] = $this->input->post('phone');
        $updateData['country'] = $this->input->post('country');
        $updateData['PinCode'] = $this->input->post('pincode');
        $updateData['state'] = $this->input->post('state');
        $updateData['city'] = $this->input->post('city');
        $updateData['address'] = $this->input->post('address');
        $uid = $this->session->userdata('uid');
        
        $result = $this->user_model->register_update($updateData, $uid);
        if($result){
            $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black"><strong>Success!</strong> You have successfully updated your profile.</div>');
        }
        redirect('user/userSettings');
    }

    public function update_password() {
        $currentPass = hash('md5', $this->input->post('currentPass'));
        $newPass = $this->input->post('newPass');
        $newPass2 = $this->input->post('newPass2');
        $uid = $this->session->userdata('uid');
        if (!($newPass == $newPass2)) {
            $data['error'] = 1;
            $data['msg'] = "New Password's doesn't match";
            echo json_encode($data);
            die;
        }
        $newPass = hash('md5', $this->input->post('newPass'));
        $result = $this->user_model->updatePassword($uid, $currentPass, $newPass);
        redirect('user/userSettings');
    }

    public function profile_data() {
        $log_user['user'] = $this->session->userdata('username');

        $log_user['uid'] = $this->session->userdata('uid');

        $log_user['profile'] = $this->user_model->login_detail($log_user['uid']);

        $this->load->view('home/bookings', $log_user);
    }

    public function failed_booking() {
        $log_user['user'] = $this->session->userdata('username');

        $log_user['uid'] = $this->session->userdata('uid');

        if (!$log_user['uid']) {
            redirect(base_url());
        }

        $log_user['profile'] = $this->user_model->login_detail($log_user['uid']);
        $failed_data = $this->user_model->failed_booking_data($log_user['uid']);

        $data = array('profile_data' => $log_user['profile'], 'page_data' => $failed_data);
        $this->load->view('user/failed_booking', $data);
    }

    //user profile airline all work start
    public function upcoming_airline_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        //airline booking data
        $id = array('uid' => $uid);
        $futureCondition = "uid='" . $uid . "' AND DepartureDateTime>now()";
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
        $config['base_url'] = base_url('index.php/user/upcoming_airline_booking');
        $config['total_rows'] = $this->user_model->get_total_record('flight_bookings', $futureCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);


        $future_airline_data = $this->user_model->getBookingDetail($futureCondition, $limit, $pageData);
        $data = array('future_airline_data' => $future_airline_data);
        $this->load->view('user/upcoming_airline_booking', $data);
    }

    public function history_airline_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);

        $historyCondition = "uid='" . $uid . "' AND DepartureDateTime<now()";

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
        $config['base_url'] = base_url('index.php/user/history_airline_booking');
        $config['total_rows'] = $this->user_model->get_total_record('flight_bookings', $historyCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);


        $history_airline_data = $this->user_model->getBookingDetail($historyCondition, $limit, $pageData);

        //$history_airline_data = $this->user_model->getBookingDetail($historyCondition);

        $data = array('history_airline_data' => $history_airline_data);

        $this->load->view('user/history_airline_booking', $data);
    }

    public function cancel_airline_booking($limit = null) {
        $uid = $this->session->userdata('uid');

        $id = array('uid' => $uid);

        $pageData = 5;

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='FLIGHT'";

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
        $config['base_url'] = base_url('index.php/user/cancel_airline_booking');
        $config['total_rows'] = $this->user_model->get_total_record('canceled_tickets', $cancelCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $booking_cancel_airline = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition, $limit, $pageData);


        //$booking_cancel_airline = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition);

        $data = array('booking_cancel_airline' => $booking_cancel_airline);

        $this->load->view('user/cancel_airline_booking', $data);
    }

    public function payu_airline_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);
        $cashData = "user_id='" . $uid . "' AND FORPAYMENT IN ('DomesticFlight', 'InterNatio')";
        print_r($cashData);
        die;

        $pageData = 5;
        //$cashData = array('user_id'=>$uid, 'FORPAYMENT'=>'Bussbooking');
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
        $config['base_url'] = base_url('index.php/user/payu_airline_booking');
        $config['total_rows'] = $this->user_model->get_total_record('payumoney_transaction', $cashData);
        $config['per_page'] = $pageData;
        // echo $this->db->last_query();
        $this->pagination->initialize($config);

        $eCash = $this->user_model->puyuMoney($cashData, $limit, $pageData);


        //        $eCash = $this->user_model->puyuMoney($cashData);
        $data = array('eCash' => $eCash);
        $this->load->view('user/payu_airline_booking', $data);
    }

//user profile airline all work end


    public function airline() {
        $uid = $this->session->userdata('uid');
        //airline booking data
        $id = array('uid' => $uid);

        $futureCondition = "uid='" . $uid . "' AND DepartureDateTime>now()";
        $future_airline_data = $this->user_model->getBookingDetail($futureCondition);


        $historyCondition = "uid='" . $uid . "' AND DepartureDateTime<now()";
        $history_airline_data = $this->user_model->getBookingDetail($historyCondition);

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='FLIGHT'";
        $booking_cancel_airline = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition);


        // $cancelCondition = array('uid'=>$uid, 'Status'=>'Booking Cancel');
        // $cancel_airline_data = $this->user_model->getBookingDetail($cancelCondition);
        //payummoney airline transcation data
        // $cashData = array('user_id'=>$uid, 'FORPAYMENT'=>'DomesticFlight', 'FORPAYMENT'=>'InterNatio');
        $cashData = "user_id='" . $uid . "' AND FORPAYMENT='DomesticFlight' OR FORPAYMENT='InterNatio'";
        $eCash = $this->user_model->puyuMoney($cashData);


        $data = array('future_airline_data' => $future_airline_data, 'history_airline_data' => $history_airline_data, 'booking_cancel_airline' => $booking_cancel_airline, 'eCash' => $eCash);
        $this->load->view('user/airline', $data);
    }

    public function bus_booking() {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }

        $futureCondition = "uid='" . $uid . "' AND TravelDate>now()";
        $future_bus_data = $this->user_model->get_bus_booking($futureCondition);

        $historyCondition = "uid='" . $uid . "' AND TravelDate<now()";
        $history_bus_data = $this->user_model->get_bus_booking($historyCondition);

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='BUS'";
        $booking_cancel_bus = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition);

        $cashData = array('user_id' => $uid, 'FORPAYMENT' => 'Bussbooking');
        $eCash = $this->user_model->puyuMoney($cashData);

        $data = array('future_bus_data' => $future_bus_data, 'history_bus_data' => $history_bus_data, 'booking_cancel_bus' => $booking_cancel_bus, 'eCash' => $eCash);
        $this->load->view('user/bus_booking', $data);
    }

    //user profile bus boooking all work start
    public function upcoming_bus_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }
        $futureCondition = "uid='" . $uid . "' AND TravelDate>now()";
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
        $config['base_url'] = base_url('index.php/user/upcoming_bus_booking');
        $config['total_rows'] = $this->user_model->get_total_record('bus_bookings', $futureCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $future_bus_data = $this->user_model->get_bus_booking($futureCondition, $limit, $pageData);
        $data = array('future_bus_data' => $future_bus_data);
        $this->load->view('user/upcoming_bus_booking', $data);
    }

    public function history_bus_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }

        $historyCondition = "uid='" . $uid . "' AND TravelDate<now()";

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
        $config['base_url'] = base_url('index.php/user/history_bus_booking');
        $config['total_rows'] = $this->user_model->get_total_record('bus_bookings', $historyCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        //      $future_bus_data = $this->user_model->get_bus_booking($futureCondition, $limit, $pageData);

        $history_bus_data = $this->user_model->get_bus_booking($historyCondition, $limit, $pageData);

        $data = array('history_bus_data' => $history_bus_data);
        $this->load->view('user/history_bus_booking', $data);
    }

    public function cancel_bus_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='BUS'";

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
        $config['base_url'] = base_url('index.php/user/cancel_bus_booking');
        $config['total_rows'] = $this->user_model->get_total_record('canceled_tickets', $cancelCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $booking_cancel_bus = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition, $limit, $pageData);

        $data = array('booking_cancel_bus' => $booking_cancel_bus);
        $this->load->view('user/cancel_bus_booking', $data);
    }

    public function payu_bus_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }
        $pageData = 5;
        $cashData = array('user_id' => $uid, 'FORPAYMENT' => 'Bussbooking');
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
        $config['base_url'] = base_url('index.php/user/payu_bus_booking');
        $config['total_rows'] = $this->user_model->get_total_record('PayUMoney_transaction', $cashData);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);


        $eCash = $this->user_model->puyuMoney($cashData, $limit, $pageData);

        $data = array('eCash' => $eCash);
        $this->load->view('user/payu_bus_booking', $data);
    }

    //user profile bus boooking all work end
    //user profile hotel boooking all work start
    public function upcoming_hotel_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);


        $futureCondition = "uid='" . $uid . "' AND CheckIn>now()";
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
        $config['base_url'] = base_url('index.php/user/upcoming_hotel_booking');
        $config['total_rows'] = $this->user_model->get_total_record('hotel_bookings', $futureCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $future_hotel_data = $this->user_model->get_hotel_booking($futureCondition, $limit, $pageData);

        $data = array('future_hotel_data' => $future_hotel_data);
        $this->load->view('user/upcoming_hotel_booking', $data);
    }

    public function history_hotel_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);

        $historyCondition = "uid='" . $uid . "' AND CheckIn<now()";
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
        $config['base_url'] = base_url('index.php/user/history_hotel_booking');
        $config['total_rows'] = $this->user_model->get_total_record('hotel_bookings', $historyCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $history_hotel_data = $this->user_model->get_hotel_booking($historyCondition, $limit, $pageData);

        $data = array('history_hotel_data' => $history_hotel_data);
        $this->load->view('user/history_hotel_booking', $data);
    }

    public function cancel_hotel_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='HOTEL'";

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
        $config['base_url'] = base_url('index.php/user/cancel_hotel_booking');
        $config['total_rows'] = $this->user_model->get_total_record('canceled_tickets', $cancelCondition);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $booking_cancel_hotel = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition, $limit, $pageData);

        $data = array('booking_cancel_hotel' => $booking_cancel_hotel);
        $this->load->view('user/cancel_hotel_booking', $data);
    }

    public function payu_hotel_booking($limit = null) {
        $uid = $this->session->userdata('uid');
        if (!$uid) {
            redirect(base_url());
        }

        $cashData = array('user_id' => $uid, 'FORPAYMENT' => 'DomesticHotel');

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
        $config['base_url'] = base_url('index.php/user/payu_hotel_booking');
        $config['total_rows'] = $this->user_model->get_total_record('PayUMoney_transaction', $cashData);
        $config['per_page'] = $pageData;

        $this->pagination->initialize($config);

        $eCash = $this->user_model->puyuMoney($cashData, $limit, $pageData);

        $data = array('eCash' => $eCash);
        $this->load->view('user/payu_hotel_booking', $data);
    }

    //user profile hotel boooking all work end !
    public function hotel_booking() {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);

        $futureCondition = "uid='" . $uid . "' AND CheckIn>now()";
        $future_hotel_data = $this->user_model->get_hotel_booking($futureCondition);

        $historyCondition = "uid='" . $uid . "' AND CheckIn<now()";
        $history_hotel_data = $this->user_model->get_hotel_booking($historyCondition);

        $cancelCondition = array('uid' => $uid, 'Status' => 'Booking Cancel');
        $cancel_airline_data = $this->user_model->get_hotel_booking($cancelCondition);

        $cancelCondition = "uid='" . $uid . "' AND ForTicket='HOTEL'";
        $booking_cancel_hotel = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition);

        $cashData = array('user_id' => $uid, 'FORPAYMENT' => 'DomesticHotel');
        $eCash = $this->user_model->puyuMoney($cashData);

        $data = array('future_hotel_data' => $future_hotel_data, 'history_hotel_data' => $history_hotel_data, 'cancel_airline_data' => $cancel_airline_data, 'booking_cancel_hotel' => $booking_cancel_hotel, 'eCash' => $eCash);
        $this->load->view('user/hotel_booking', $data);
    }

    //bus ticket booking

    public function busTicketPrint($id) {
        $data = $this->user_model->basBookingData($id);
        echo json_encode($data);
    }

    public function hotelTicketPrint($id) {
        $data = $this->user_model->hotelBookingData($id);
        echo json_encode($data);
    }

//print ticket all bus , hotel and air;

    public function print_bus_ticket($id, $url) {
        $uid = $this->session->userdata('uid');
        $log_user = $this->user_model->user_uid($id);

        $data = $this->user_model->get_data('bus_bookings', array('id' => $id));

        $GetReprint = file_get_contents(base_url('/index.php/bus/GetReprintUser/' . $data[0]['TransactionId']));
        $GetReprint = json_decode($GetReprint, true);
        print_r($GetReprint);
        $printValue = array('printData' => $data, 'user_name' => $log_user, 'url' => $url);
        $this->load->view('user/print-bus-ticket', $printValue);
    }

    public function print_hotel_ticket($id, $url) {
        $data = $this->user_model->get_data('hotel_bookings', array('id' => $id));
        $printValue = array('printData' => $data, 'url' => $url);

        $this->load->view('user/print-hotel-ticket', $printValue);
    }

    public function print_airline_ticket($id, $url) {
        $data = $this->user_model->get_data('flight_bookings', array('id' => $id));
        $GetReprint = array();
        if ($data[0]['TravelType'] == 'I') {
            $GetReprint = file_get_contents(base_url('/index.php/flight/IntGetReprint/' . $data[0]['HermesPNR'] . '/true'));
            $GetReprint = json_decode($GetReprint, true);
            // print_r($GetReprint);
        } else {
            $GetReprint = file_get_contents(base_url('/index.php/flight/GetReprint/' . $data[0]['TransactionId']));
        }
        $printValue = array('printData' => $GetReprint, 'url' => $url);
        $this->load->view('user/print-airline-ticket', $printValue);
    }

//this function use getting table data
    public function view_detail($id) {
        $data = $this->user_model->get_data('flight_bookings', array('id' => $id));
        $printValue = array('printData' => $data);
        $this->load->view('user/view-airline-ticket', $printValue);
    }

    public function view_detail_bus($id) {
        $data = $this->user_model->get_data('bus_bookings', array('id' => $id));
        $printValue = array('printData' => $data);
        $this->load->view('user/view-bus-detail', $printValue);
    }

    public function view_detail_hotel($id) {
        $data = $this->user_model->get_data('hotel_bookings', array('id' => $id));
        $printValue = array('printData' => $data);
        $this->load->view('user/view-hotel-detail', $printValue);
    }

    public function updateFrom() {

        $data = array();
        $Email = $this->input->post('email');
        $sessionEmail = $this->input->post('sesssionEmail');
        // $fullName = $this->input->post('txtFullName');
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('name', 'Full name', 'required');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('pincode', 'Zip/Pin code', 'required|numeric|max_length[8]');

        if ($this->form_validation->run() == FALSE) {

            $data['error'] = 1;
            $data['msg'] = strip_tags(validation_errors());
            echo json_encode($data);
            die;
        }

        if ($Email != $sessionEmail) {

            if (!$this->user_model->check_email($Email)) {
                $data['error'] = 1;
                $data['msg'] = "$Email emial already resgistred";
                echo json_encode($data);
                die;
            }
        }

        $registerData = array();
        // $txtFullname = $this->input ->post('name');
        // $registerData['user_name'] = $this->input->post('name');
        // $name = explode(" ", $txtFullname);
        $registerData['first_name'] = $this->input->post('fName');
        $registerData['last_name'] = $this->input->post('lName');
        $password = $this->input->post('password');
        if ($password != '') {
            $registerData['password'] = hash('md5', $password);
        }
        $registerData['email'] = $this->input->post('email');
        $registerData['phone'] = $this->input->post('phone');
        $registerData['country'] = $this->input->post('country');
        $registerData['PinCode'] = $this->input->post('pincode');
        $registerData['state'] = $this->input->post('state');
        $registerData['city'] = $this->input->post('city');
        $registerData['address'] = $this->input->post('adddress');
        $registerData['date'] = date("Y-m-d");
        $uid = $this->input->post('uid');
        // echo $uid; 
        // print_r($registerData);

        $result = $this->user_model->register_update($registerData, $uid);


        if ($result == true) {
            $data['error'] = 1;
            $data['msg'] = "Account Update Successfully";

            echo json_encode($data);
        }
    }

    //help to find booking detail and pass user id
    /* public function getBookingDetail($data){

      $this->db->get_where('flight_bookings' array('uid'=>$data));
      return $data->result_array();
      } */


    public function detail() {
        $uid = $this->session->userdata('uid');
        $id = array('uid' => $uid);
        $dataBooking = $this->user_model->getBookingDetail($id);
        $data = array('booking' => $dataBooking);
        $this->load->view('user/nev', $data);
    }

    public function domestic_hotel() {

        $this->load->view('user/doems_hotel');
    }

    public function search_hotel() {

        $city = $this->input->get_post('city_id');


        $hotel_tpye = $this->user_model->get_hotel($city);

        if ($hotel_tpye) {
            $all = 0;


            foreach ($hotel_tpye as $key => $val) {

                echo "<option value=" . $val['rating'] . ">" . $val['rating'] . "&nbsp;&nbsp; Star&nbsp;&nbsp; Hotel  </option>";
            }

            echo "<option value=" . $all . ">&nbsp;&nbsp;All Type &nbsp;&nbsp; Hotel  </option>";
        } else {

            echo "<option value=''>Soryy Not available</option>";
        }
    }

    public function av_hotel() {

        $hotel = $this->input->get_post('hotel');

        $val = $this->user_model->get_all_hotel($hotel);

        foreach ($val as $v) {

            echo "<option value=" . $v['hotel_id'] . ">" . $v['hotel_name'] . "&nbsp;&nbsp; Star&nbsp;&nbsp; Hotel  </option>";
        }
    }

    public function search_domestic_hotel() {


        $data = $this->user_model->get_domestic_hotel();

        $_SESSION['trav_search'] = $data;


        redirect('home/search_hotel_by_travel_panel');
    }

    public function international_hotel() {
        
    }

    public function domestic_flight() {

        echo "<script>alert('comming Soon!');</script>";
    }

    public function international_flight() {
        echo "<script>alert('comming Soon!');</script>";
    }

    public function cabs() {
        $this->load->view('user/book_cab');
    }

    public function package($limit = 0) {
        
        $uid = $this->session->userdata('uid');
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
        $config['base_url'] = base_url('index.php/user/package');
        $this->db->where("user_id", $uid);
        $q = $this->db->get('package_booking');
        $config['total_rows'] = $q->num_rows();
        $config['per_page'] = $pageData;
        $this->pagination->initialize($config);
        $data['display'] = $this->region_model->getPackageBookingByUser($uid, $limit, $pageData);
        
        $data['limit'] = $limit;
        $this->load->view('user/book_package',$data);
    }

    public function booking_request() {
        $this->load->view('user/booking_request');
    }

    public function book_package() {

        redirect('home/our_travel');
    }

    public function booking_status() {

        $this->load->view('user/booking_record');
    }

    public function all_booking_rc() {

        $this->load->view('user/whole_booking_record');
    }

    public function log_out() {

        redirect('home/log_out');
    }

    public function reward_point() {

        $this->load->view('user/reward_point');

        //  $this->load->view('user/booking_record');
    }

    public function getStateBooking($name) {

        $id = $this->region_model->getCountryName(urldecode($name));

        $result = $this->region_model->getstate($id['0']['id']);
        echo json_encode($result);
        die();
    }

    public function getcityBooking($name) {
        $id = $this->region_model->getStateName(urldecode($name));

        $result = $this->region_model->getcity($id['0']['id']);
        echo json_encode($result);
        die();
    }

}

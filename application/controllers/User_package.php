<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_package extends CI_Controller {

    Public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('associate_model');
        $this->load->model('sendmail_model');
        $this->load->helper('form');
        $this->load->model('pack_model');
        $this->load->model('region_model');
        $this->load->model('site_model');
        $this->load->model('agent_model');
        $this->load->helper('html');
        $this->load->helper('url');
    }

    public function make_package() {
        $this->db->where("status", 1);
        $data['city'] = $this->db->get("city");
        $this->load->view('user_package/make_package', $data);
    }

    public function create_package() {
        $start_city = $this->input->post("start_city");
        $start_date = $this->input->post("start_date");
        $source = $this->input->post("source");
        $rooms = $this->input->post("rooms");
        $adult = $this->input->post("adult");
        $child = $this->input->post("child");
        $infants = $this->input->post("infants");
        $email = $this->input->post("email");
        $number = $this->input->post("number");
        $msg = "You have a created a package with the following details:<br> Start City : " . $start_city . "<br>Start Date : " . $start_date . "<br> Destination : " . $source . "<br>Rooms : " . $rooms . "<br>Adults : " . $adult . "<br> Child : " . $child . "<br> Infants : " . $infants . "<br> Thanks for contacting us.<br>We will get in touch with you soon.";
        $msg1 = "User with email : " . $email . " and contact number : " . $number . " has submitted a package with following details : <br>Start City : " . $start_city . "<br>Start Date : " . $start_date . "<br> Destination : " . $source . "<br>Rooms : " . $rooms . "<br>Adults : " . $adult . "<br> Child : " . $child . "<br> Infants : " . $infants;
        $this->sendmail_model->send_mail2("noreply@augurs.in", "KPHolidays", $email, 'Your Own Package', $msg);
        $this->sendmail_model->send_mail2("noreply@augurs.in", "KPHolidays", "pradeep241414@gmail.com", 'User Created Package', $msg1);
        // echo $msg .'\n';
        echo 1;
    }

    public function test() {
        echo $this->sendmail_model->send_mail2("noreply@augurs.in", "KPHolidays", "taru.augurs@gmail.com", 'Your Own Package', "fffff");
    }

}

?>
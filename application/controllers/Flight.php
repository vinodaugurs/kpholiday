<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends CI_Controller {

//Getting the flight data list either one way or round trip we used this method flight_list  and after getting the data from cross domain here we r using two page to view the availabile filght one page name is  flights_list for oneWay trip second page for round trip page name is RtripFlight which show round trip details. 


    var $Credentials;

    public function __construct() {
        parent::__construct();
        // Test
        //demostic
        $this->Credentials['Pyment'] = false;
        $this->Credentials['checkError'] = false;
        $this->Credentials['live'] = false;
        //live
        if ($this->Credentials['live']) {
            $this->Credentials['LoginId'] = 'KPHOLIDAYS';
            $this->Credentials['Password'] = 'KPHOLIDAYS123';
            $this->Credentials['apiurl'] = "http://api.hermes-it.in/DOM_Airlines/DomesticAir.svc/JsonService";

            $this->Credentials['IntLoginId'] = 'KPHOLIDAYS';
            $this->Credentials['IntPassword'] = 'KPHOLIDAYS123';
            $this->Credentials['Intapiurl'] = "http://api.hermes-it.in/INT_Airlines/InternationalAir.svc/JsonService";
        } else {
            //Demo
            $this->Credentials['LoginId'] = 'KPHOLIDAYS';
            $this->Credentials['Password'] = 'KPHOLIDAYS123';
            $this->Credentials['apiurl'] = "http://115.248.39.80/HermesDomAir/DomesticAir.svc/JSONService";
            //International
            $this->Credentials['IntLoginId'] = 'KPHOLIDAYS';
            $this->Credentials['IntPassword'] = 'KPHOLIDAYS123';
            $this->Credentials['Intapiurl'] = "http://115.248.39.80/HermesAir/InternationalAir.svc/JSONService";
        }
        $this->load->helper('file');
    }

    public function flight_list($agent = false) {
        $source = $this->region_model->get_data('airport_code', "CODE='" . $this->input->post('source') . "' OR CITYAIRPORT like '" . $this->input->post('source') . " %'");
        if (!empty($source)) {
            $_POST['source'] = $source[0]['CODE'];
        }
        $destination = $this->region_model->get_data('airport_code', "CODE='" . $this->input->post('destination') . "' OR CITYAIRPORT like '" . $this->input->post('destination') . " %'");
        if (!empty($destination)) {
            $_POST['destination'] = $destination[0]['CODE'];
        }

        $searc_post = array();
        $searc_post['way'] = $this->input->post('way');
        $searc_post['source'] = $this->input->post('source');
        $searc_post['destination'] = $this->input->post('destination');
        $searc_post['ClassType'] = $this->input->post('ClassType');
        $searc_post['adult'] = $this->input->post('adult');
        $searc_post['child'] = $this->input->post('child');
        $searc_post['infant'] = $this->input->post('infant');
        $searc_post['departure'] = $this->input->post('departure');
        $searc_post['arrive'] = $this->input->post('arrive');
        $this->session->set_userdata('flight_search_post', $searc_post);

        if ($this->input->post('flight_mode') == "International") {
            $this->internal_flight_list($agent);
            return;
        }
        $booking = array("way" => $this->input->post('way'), "sourc" => $this->input->post('source'), "destination" => $this->input->post('destination'), "adult" => $this->input->post('adult'), "child" => $this->input->post('child'), "infant" => $this->input->post('infant'), "departure" => $this->input->post('departure'), "arrive" => @$this->input->post('arrive'), 'ClassType' => $this->input->post('ClassType'));
        $this->session->set_userdata('booking_data', $booking);
        $JourneyDetails = array();
        if ($booking['way'] == 'R') {
            $JourneyDetails = array(
                array(
                    "Origin" => $booking['sourc'],
                    "Destination" => $booking['destination'],
                    "TravelDate" => $booking['departure']
                ),
                array(
                    "Origin" => $booking['destination'],
                    "Destination" => $booking['sourc'],
                    "TravelDate" => $booking['arrive']
                )
            );
        } else {
            $JourneyDetails = array(array(
                    "Origin" => $booking['sourc'],
                    "Destination" => $booking['destination'],
                    "TravelDate" => $booking['departure']
            ));
        }

        $flight = array(
            "Authentication" => array(
                "LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']
            ),
            "AvailabilityInput" => array(
                "BookingType" => trim($booking['way']),
                "JourneyDetails" => $JourneyDetails,
                "ClassType" => $booking['ClassType'],
                "AirlineCode" => "",
                "AdultCount" => $booking['adult'],
                "ChildCount" => $booking['child'],
                "InfantCount" => $booking['infant'],
                "ResidentofIndia" => 1,
                "Optional1" => 1,
                "Optional2" => 0,
                "Optional3" => 0
            )
        );

        $result = $this->CutlPost('GetAvailability', $flight);
        if ($agent) {
            echo $result;
            die;
        }
        $result = json_decode($result, true);
        $responsdata['flight_data'] = $result;
        
        if (!$result['ResponseStatus']) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . '
                            </div>');
        }
        if ($booking['way'] == "O") {
            $this->load->view('blocks/header', $responsdata);
            $this->load->view('home/flights_list');
            $this->load->view('blocks/footer');
        }
        if ($booking['way'] == "R") {
            $this->load->view('blocks/header', $responsdata);
            $this->load->view('home/RtripFlight');
            $this->load->view('blocks/footer');
        }
    }

    // to Get fare rul & tax to call this method
    // to Get fare rul & tax to call this method

    public function tax_fare($tdata = NULL, $agent = false) {

        if ($tdata != NULL and $tdata != 'NULL') {
            $data = $tdata;
        } else {
            $data = $this->input->post('value');
        }

        if ($agent) {
            $data = json_decode($data, true);
        }


        $tax = array("Authentication" => array("LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']),
            "UserTrackId" => $data["UserTrackId"],
            "TaxInput" => array("TaxReqFlightSegments" => $data['AvailSegments']
            )
        );
        // print_r($tax);
        $result = $this->CutlPost('GetTax', $tax);
        $fare_data = json_decode($result, true);
        $fare_rule = $this->fare_rule($data);
        $fare_data = json_decode($fare_rule, true);

        $tax_data = json_decode($result, true);
        if ($tdata != NULL and $tdata != 'NULL') {
            return $tax_data;
        }


        if ($agent) {
            echo json_encode($tax_data);
            die;
        }



        foreach ($tax_data['TaxOutput']['TaxResFlightSegments'] as $taxsgm => $txtFare) {
            if ($txtFare['AdultTax']['FareBreakUpDetails']['GrossAmount'] > 0) {
                echo "<table class='table table-striped'>";





                echo " <tr><td>Base Fare</td><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']

                ['BasicAmount'] . "'</td></tr>

						<tr><td>Tax Amount</td><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']

                ['TotalTaxAmount'] . "'</td></tr>

						<tr><th>Passenger Service Fee</th><td></td></tr>

						<tr><th>User Development Fee</th><td></td></tr>

						<tr><th>Arrival User Development Fee</th><td></td></tr>

						

						<tr><th>Total Pay</th><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']['GrossAmount'] . "'</td></tr>

						 <tr><th></th><td></td></tr>";



                echo "</table>";

                echo "<br/><hr/>";
            }
        }
        $print_fare = explode("?", $fare_data['FareRuleOutput']['FareRules']);

        echo "<h4 align='center'>Fare Rules </h4><hr/>";

        echo "<ul>";

        for ($i = 0; $i < count($print_fare); $i++) {

            echo "<ol>";

            echo $print_fare[$i];

            echo "</ol><br/>";
        }

        echo "</ul>";
    }

    public function fare_rule($fare) {

        $fare_data = array("Authentication" => array("LoginId" => $this->Credentials['LoginId'], "Password" => $this->Credentials['Password']), "UserTrackId" => $fare["UserTrackId"],
            "FareRuleInput" => array("AirlineCode" => $fare['AvailSegments'][0]['AirlineCode'],
                "FlightId" => $fare['AvailSegments'][0]['FlightId'], "ClassCode" => $fare['AvailSegments'][0]['ClassCode'])
        );


        $result = $this->CutlPost('GetFareRule', $fare_data);
        return $result;
    }

    public function updateTicketselection() {
        if ($this->session->userdata('uid') != '') {
            $booking = $this->input->post('value');
            $returndata = (!empty($_REQUEST['returndata'])) ? $this->input->post('returndata') : '';
            $booking['returndata'] = $returndata;
            $this->session->set_userdata('Flight_' . $booking['UserTrackId'], $booking);
            echo $booking['UserTrackId'];
            die;
        } else {
            echo 'false';
            die;
        }
    }

    public function ticketSelection() {
        $booking = $this->input->post('value');
        $returndata = (!empty($_REQUEST['returndata'])) ? $this->input->post('returndata') : '';
        $booking['returndata'] = $returndata;
        $this->session->set_userdata('Flight_' . $booking['UserTrackId'], $booking);
        echo $booking['UserTrackId'];
    }

    public function OnewayFlightBooking($UserTrackId) {

        $userId = $this->session->userdata('uid');
        if (empty($userId)) {
            $this->session->set_flashdata('redirect_url', uri_string());
            redirect('login');
        }

        if ($UserTrackId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);

        if ($Flight_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }
        //add confirmation
        if ($this->input->post('flight') == 'confirm') {
            $this->ManageOnewaybooking($Flight_dietail);
        }
        $data = array();

        $data['Flight_dietail'] = $Flight_dietail;

        $user_details = $this->user_model->user_uid($this->session->userdata('uid'));
        $data['user_details'] = $user_details[0];
        $flight_search_post = $this->session->userdata('flight_search_post');
        $data['flight_search'] = $flight_search_post;
        $get_taxfare = $this->tax_fare($Flight_dietail);
        $data['tax_details'] = $get_taxfare;
        //set return text
        if (is_array($Flight_dietail['returndata'])) {
            $get_taxfarer = $this->tax_fare($Flight_dietail['returndata']);
            $data['return_tax_details'] = $get_taxfarer;
        }
        if (isset($_POST['status']) and $_POST['status'] == 'success' and isset($_POST['udf2']) and $_POST['udf2'] == 'bookingDetail_' . $UserTrackId) {
            $this->load->library('PayUMoney');
            if ($this->payumoney->validatePayment()) {

                /* $RefrenceID = $UserTrackId;
                  $payData = array();
                  $payData['user_id'] = $this->session->userdata('uid');
                  $payData['FORPAYMENT'] = 'DomesticFlight';
                  $payData['RefrenceID'] = $UserTrackId;
                  $user_details = $this->savePuMoney($payData);
                 */

                $bookingDetail = $this->session->userdata('bookingDetail_' . $UserTrackId);
                $this->bookingProcess($_POST['udf1'], $bookingDetail);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> Payemnt information not match.
								</div>');
            }
        } else {
            if (isset($_POST['status']) and $_POST['status'] != 'success') {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $_POST['error'] . ' ' . $_POST['error_Message'] . '
                            </div>');
            }
        }
        $this->load->view('blocks/header', $data);
        $this->load->view('home/OnewayFlightBooking');
        $this->load->view('blocks/footer');
    }

    public function ManageOnewaybooking($booking_data) {


        $this->session->set_userdata('goingDetail', '');
        $this->session->set_userdata('bothDetail', '');
        //for adult		
        $PassengerDetails = array();
        $PassengerDetails2 = array();
        $adult_count = count($this->input->post('adult_first_name'));

        $BookingSegments = array();
        foreach ($booking_data['AvailSegments'] as $AvailSegments) {
            $tmparray = array();
            $tmparray["FlightId"] = $AvailSegments['FlightId'];
            $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
            $tmparray["SpecialServiceCode"] = "";
            $tmparray["FrequentFlyerId"] = "";
            $tmparray["FrequentFlyerNumber"] = "";
            $tmparray["MealCode"] = "";
            $tmparray["SeatPreferId"] = "";
            $BookingSegments[] = $tmparray;
        }

        if (is_array($booking_data['returndata'])) {
            $BookingSegments2 = array();
            foreach ($booking_data['returndata']['AvailSegments'] as $AvailSegments) {
                $tmparray = array();
                $tmparray["FlightId"] = $AvailSegments['FlightId'];
                $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
                $tmparray["SpecialServiceCode"] = "";
                $tmparray["FrequentFlyerId"] = "";
                $tmparray["FrequentFlyerNumber"] = "";
                $tmparray["MealCode"] = "";
                $tmparray["SeatPreferId"] = "";
                $BookingSegments2[] = $tmparray;
            }
        }

        foreach ($this->input->post('adult_first_name') as $key => $adult) {
            $tmp_array = array();
            $adult_title = $this->input->post('adult_title');
            $adult_last_name = $this->input->post('adult_last_name');
            $adult_gender = $this->input->post('adult_gender');
            $adult_DateofBirth = $this->input->post('adult_DateofBirth');
            $adult_DateofBirth_explode = explode("/", $adult_DateofBirth[$key]);
            $age_a = @date_diff(date_create($adult_DateofBirth_explode[2] . '-' . $adult_DateofBirth_explode[0] . '-' . $adult_DateofBirth_explode[1]), date_create('today'))->y;
            $tmp_array["PassengerType"] = "ADULT";
            $tmp_array["Title"] = $adult_title[$key];
            $tmp_array["FirstName"] = $adult;
            $tmp_array["LastName"] = $adult_last_name[$key];
            $tmp_array["Gender"] = $adult_gender[$key];
            $tmp_array["Age"] = $age_a;
            $tmp_array["IdentityProofId"] = '';
            $tmp_array["IdentityProofNumber"] = '';
            $tmp_array["DateofBirth"] = $adult_DateofBirth[$key];
            $tmp_array["BookingSegments"] = $BookingSegments;
            $PassengerDetails[] = $tmp_array;
            if (is_array($booking_data['returndata'])) {
                $tmp_array["BookingSegments"] = $BookingSegments2;
                $PassengerDetails2[] = $tmp_array;
            }
        }
        //for child
        $child_count = count($this->input->post('child_first_name'));
        if (is_array($this->input->post('child_first_name'))) {
            foreach ($this->input->post('child_first_name') as $key => $child) {
                $tmp_array = array();
                $child_title = $this->input->post('child_title');
                $child_last_name = $this->input->post('child_last_name');
                $child_gender = $this->input->post('child_gender');
                $child_DateofBirth = $this->input->post('child_DateofBirth');
                $child_DateofBirth_explode = explode("/", $child_DateofBirth[$key]);
                $age_a = @date_diff(date_create($child_DateofBirth_explode[2] . '-' . $child_DateofBirth_explode[0] . '-' . $child_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "CHILD";
                $tmp_array["Title"] = $child_title[$key];
                $tmp_array["FirstName"] = $child;
                $tmp_array["LastName"] = $child_last_name[$key];
                $tmp_array["Gender"] = $child_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $child_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                if (is_array($booking_data['returndata'])) {
                    $tmp_array["BookingSegments"] = $BookingSegments2;
                    $PassengerDetails2[] = $tmp_array;
                }
            }
        }

        //for child
        $infant_count = count($this->input->post('infant_first_name'));
        if (is_array($this->input->post('infant_first_name'))) {
            foreach ($this->input->post('infant_first_name') as $key => $infant) {
                $tmp_array = array();
                $infant_title = $this->input->post('infant_title');
                $infant_last_name = $this->input->post('infant_last_name');
                $infant_gender = $this->input->post('infant_gender');
                $infant_DateofBirth = $this->input->post('infant_DateofBirth');
                $infant_DateofBirth_explode = explode("/", $infant_DateofBirth[$key]);
                $age_a = @date_diff(date_create($infant_DateofBirth_explode[2] . '-' . $infant_DateofBirth_explode[0] . '-' . $infant_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "INFANT";
                $tmp_array["Title"] = $infant_title[$key];
                $tmp_array["FirstName"] = $infant;
                $tmp_array["LastName"] = $infant_last_name[$key];
                $tmp_array["Gender"] = $infant_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $infant_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                if (is_array($booking_data['returndata'])) {
                    $tmp_array["BookingSegments"] = $BookingSegments2;
                    $PassengerDetails2[] = $tmp_array;
                }
            }
        }


        $get_taxfare = $this->tax_fare($booking_data);
        $adult_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $adult_TotalAmount = $adult_GrossAmount * $adult_count;

        $child_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $child_TotalAmount = $child_GrossAmount * $child_count;

        $infant_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $infant_TotalAmount = $infant_GrossAmount * $infant_count;

        $totalamount1 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
        $gamount = $totalamount1;


        $FlightBookingDetailsT = array("AirlineCode" => $booking_data["AvailSegments"][0]["AirlineCode"],
            "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount1), "TourCode" => "",
            "PassengerDetails" => $PassengerDetails
        );

        $FlightBookingDetails[] = $FlightBookingDetailsT;
        $BookingType = "O";

        if (is_array($booking_data['returndata'])) {
            $get_taxfare = $this->tax_fare($booking_data['returndata']);
            $adult_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $adult_TotalAmount = $adult_GrossAmount * $adult_count;

            $child_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $child_TotalAmount = $child_GrossAmount * $child_count;

            $infant_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $infant_TotalAmount = $infant_GrossAmount * $infant_count;

            $totalamount2 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
            $gamount = $gamount + $totalamount2;

            $FlightBookingDetailsT = array("AirlineCode" => $booking_data['returndata']["AvailSegments"][0]["AirlineCode"],
                "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount2), "TourCode" => "",
                "PassengerDetails" => $PassengerDetails2
            );

            $FlightBookingDetails[] = $FlightBookingDetailsT;
            $BookingType = "R";
        }
        $tgamount = $gamount;
        if ($this->Credentials['checkError'] != true) {
            $gamount = -$gamount;
        }
        $bookingDetail = array("Authentication" => array("LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']),
                "UserTrackId" => $booking_data["UserTrackId"],
                "BookInput" => array("CustomerDetails" => array("Title" => $this->input->post('user_title'),
                "Name" => $this->input->post('user_name'),
                "Address" => $this->input->post('user_address'),
                "City" => $this->input->post('user_city'),
                "CountryId" => $this->input->post('user_country'),
                "ContactNumber" => $this->input->post('user_contact'),
                "EmailId" => $this->input->post('user_email'),
                "PinCode" => $this->input->post('user_pincode')),
                "SpecialRemarks" => "",
                "NotifyByMail" => 1,
                "NotifyBySMS" => 1,
                "AdultCount" => $adult_count,
                "ChildCount" => $child_count,
                "InfantCount" => $infant_count,
                "BookingType" => $BookingType,
                "TotalAmount" => $gamount,
                "FrequentFlyerRequest" => null,
                "SpecialServiceRequest" => null,
                "FSCMealsRequest" => null,
                "FlightBookingDetails" => $FlightBookingDetails
            )
        );


        //check balance
        $balcne = $this->GetAgentCreditBalance();
        if ($balcne['AgentCreditBalanceOutput']['RemainingAmount'] < $tgamount) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> YOUR AGENT CREDIT LIMIT(' . $balcne['AgentCreditBalanceOutput']['RemainingAmount'] . ') IS LESS THAN THE TOTAL COST
                            </div>');
            return false;
        }
        //print_r($bookingDetail);die;
        $this->session->set_userdata('bookingDetail_' . $booking_data["UserTrackId"], $bookingDetail);
        if ($this->Credentials['Pyment'] and $this->Credentials['checkError']) {
            $this->load->library('PayUMoney');
            $payUmoney = array();
            $payUmoney['productinfo'] = array(array('name' => "Flight Booking",
                    'description' => 'Domestic Flight Booking',
                    'value' => $gamount,
                    "isRequired" => true));
            $payUmoney['amount'] = $gamount;
            $payUmoney['firstname'] = $this->input->post('user_name');
            $payUmoney['email'] = $this->input->post('user_email');
            $payUmoney['phone'] = $this->input->post('user_contact');
            $payUmoney['surl'] = base_url('/index.php/flight/OnewayFlightBooking/' . $booking_data["UserTrackId"]);
            $payUmoney['furl'] = base_url('/index.php/flight/OnewayFlightBooking/' . $booking_data["UserTrackId"]);
            $payUmoney['udf1'] = 'GetBook';
            $payUmoney['udf2'] = 'bookingDetail_' . $booking_data["UserTrackId"];
            $payUmoney['udf3'] = 'DomesticFlightBooking';
            $this->payumoney->setpayUMoney($payUmoney);
            return true;
        }
        $this->bookingProcess('GetBook', $bookingDetail);
        // print_r($result);
    }

    public function bookingProcess($method, $bookingDetail) {

        $result = $this->CutlPost($method, $bookingDetail);
        $result = json_decode($result, true);
        
        write_file(APPPATH.'/response_log.txt', json_encode($result));
        
        
        if (!$result['ResponseStatus']) {
            if ($result['FailureRemarks'] == 'Your total amount is not correct' and $this->Credentials['checkError'] != true) {
                $Flight_dietail = $this->session->userdata('Flight_' . $result['UserTrackId']);
                $this->Credentials['checkError'] = true;
                $this->ManageOnewaybooking($Flight_dietail);
                return false;
            }
            if (isset($_POST['mihpayid'])) {
                $this->BookingFailed($bookingDetail);
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . ' ' . $result['FailureRemarks'] . ' sorry for this problem please contact our customre care with payemntid ' . $_POST['mihpayid'] . ' for return your payemnt 
                            </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . '
                            </div>');
            }
        } else {
            $hermsPnr = array();
            $this->saveBooking($result);

            foreach ($result['BookOutput']['FlightTicketDetails'] as $pnrs) {
                $hermsPnr[] = $pnrs['HermesPNR'];
            }
            $hermsPnr = implode("_", $hermsPnr);
            redirect(base_url('/index.php/flight/OnewayThankyou/' . $hermsPnr . '/' . $result['UserTrackId']), 'refresh');
        }
    }

    public function ManageOnewaybookingAgent() {
        $booking_data = json_decode($this->input->post('Flight_dietail'), true);

        $PassengerDetails = array();
        $PassengerDetails2 = array();

        $_POST['adult_first_name'] = json_decode($this->input->post('adult_first_name'), true);
        $_POST['adult_last_name'] = json_decode($this->input->post('adult_last_name'));
        $_POST['adult_gender'] = json_decode($this->input->post('adult_gender'));
        $_POST['adult_DateofBirth'] = json_decode($this->input->post('adult_DateofBirth'));
        $_POST['adult_title'] = json_decode($this->input->post('adult_title'));

        $_POST['child_first_name'] = json_decode($this->input->post('child_first_name'));
        $_POST['child_title'] = json_decode($this->input->post('child_title'));
        $_POST['child_last_name'] = json_decode($this->input->post('child_last_name'));
        $_POST['child_gender'] = json_decode($this->input->post('child_gender'));
        $_POST['child_DateofBirth'] = json_decode($this->input->post('child_DateofBirth'));

        $_POST['infant_first_name'] = json_decode($this->input->post('infant_first_name'));
        $_POST['infant_title'] = json_decode($this->input->post('infant_title'));
        $_POST['infant_gender'] = json_decode($this->input->post('infant_gender'));
        $_POST['infant_DateofBirth'] = json_decode($this->input->post('infant_DateofBirth'));
        $_POST['infant_last_name'] = json_decode($this->input->post('infant_last_name'));

        $adult_count = count($this->input->post('adult_first_name'));

        $BookingSegments = array();
        foreach ($booking_data['AvailSegments'] as $AvailSegments) {
            $tmparray = array();
            $tmparray["FlightId"] = $AvailSegments['FlightId'];
            $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
            $tmparray["SpecialServiceCode"] = "";
            $tmparray["FrequentFlyerId"] = "";
            $tmparray["FrequentFlyerNumber"] = "";
            $tmparray["MealCode"] = "";
            $tmparray["SeatPreferId"] = "";
            $BookingSegments[] = $tmparray;
            $this->load->model('agent_model');
            $markepdata = $this->agent_model->get_domesticFlightMrakup($booking_data['AvailSegments'][0]['AirlineCode'], 'Domestic Flight');
            $adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
            $Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
            $Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;
        }

        if (is_array($booking_data['returndata'])) {
            $BookingSegments2 = array();
            foreach ($booking_data['returndata']['AvailSegments'] as $AvailSegments) {
                $tmparray = array();
                $tmparray["FlightId"] = $AvailSegments['FlightId'];
                $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
                $tmparray["SpecialServiceCode"] = "";
                $tmparray["FrequentFlyerId"] = "";
                $tmparray["FrequentFlyerNumber"] = "";
                $tmparray["MealCode"] = "";
                $tmparray["SeatPreferId"] = "";
                $BookingSegments2[] = $tmparray;

                $markepdata = $this->agent_model->get_domesticFlightMrakup($booking_data['returndata']['AvailSegments'][0]['AirlineCode'], 'Domestic Flight');
                $Return_adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
                $Return_Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
                $Return_Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;
            }
        }

        foreach ($this->input->post('adult_first_name') as $key => $adult) {
            $tmp_array = array();
            $adult_title = $this->input->post('adult_title');
            $adult_last_name = $this->input->post('adult_last_name');
            $adult_gender = $this->input->post('adult_gender');
            $adult_DateofBirth = $this->input->post('adult_DateofBirth');
            $adult_DateofBirth_explode = explode("/", $adult_DateofBirth[$key]);
            $age_a = @date_diff(date_create($adult_DateofBirth_explode[2] . '-' . $adult_DateofBirth_explode[0] . '-' . $adult_DateofBirth_explode[1]), date_create('today'))->y;
            $tmp_array["PassengerType"] = "ADULT";
            $tmp_array["Title"] = $adult_title[$key];
            $tmp_array["FirstName"] = $adult;
            $tmp_array["LastName"] = $adult_last_name[$key];
            $tmp_array["Gender"] = $adult_gender[$key];
            $tmp_array["Age"] = $age_a;
            $tmp_array["IdentityProofId"] = '';
            $tmp_array["IdentityProofNumber"] = '';
            $tmp_array["DateofBirth"] = $adult_DateofBirth[$key];
            $tmp_array["BookingSegments"] = $BookingSegments;
            $PassengerDetails[] = $tmp_array;
            if (is_array($booking_data['returndata'])) {
                $tmp_array["BookingSegments"] = $BookingSegments2;
                $PassengerDetails2[] = $tmp_array;
            }
        }
        //for child
        $child_count = count($this->input->post('child_first_name'));
        if (is_array($this->input->post('child_first_name'))) {
            foreach ($this->input->post('child_first_name') as $key => $child) {
                $tmp_array = array();
                $child_title = $this->input->post('child_title');
                $child_last_name = $this->input->post('child_last_name');
                $child_gender = $this->input->post('child_gender');
                $child_DateofBirth = $this->input->post('child_DateofBirth');
                $child_DateofBirth_explode = explode("/", $child_DateofBirth[$key]);
                $age_a = @date_diff(date_create($child_DateofBirth_explode[2] . '-' . $child_DateofBirth_explode[0] . '-' . $child_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "CHILD";
                $tmp_array["Title"] = $child_title[$key];
                $tmp_array["FirstName"] = $child;
                $tmp_array["LastName"] = $child_last_name[$key];
                $tmp_array["Gender"] = $child_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $child_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                if (is_array($booking_data['returndata'])) {
                    $tmp_array["BookingSegments"] = $BookingSegments2;
                    $PassengerDetails2[] = $tmp_array;
                }
            }
        }

        //for child
        $infant_count = count($this->input->post('infant_first_name'));
        if (is_array($this->input->post('infant_first_name'))) {
            foreach ($this->input->post('infant_first_name') as $key => $infant) {
                $tmp_array = array();
                $infant_title = $this->input->post('infant_title');
                $infant_last_name = $this->input->post('infant_last_name');
                $infant_gender = $this->input->post('infant_gender');
                $infant_DateofBirth = $this->input->post('infant_DateofBirth');
                $infant_DateofBirth_explode = explode("/", $infant_DateofBirth[$key]);
                $age_a = @date_diff(date_create($infant_DateofBirth_explode[2] . '-' . $infant_DateofBirth_explode[0] . '-' . $infant_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "INFANT";
                $tmp_array["Title"] = $infant_title[$key];
                $tmp_array["FirstName"] = $infant;
                $tmp_array["LastName"] = $infant_last_name[$key];
                $tmp_array["Gender"] = $infant_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $infant_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                if (is_array($booking_data['returndata'])) {
                    $tmp_array["BookingSegments"] = $BookingSegments2;
                    $PassengerDetails2[] = $tmp_array;
                }
            }
        }


        $get_taxfare = $this->tax_fare($booking_data);
        $adult_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $adult_TotalAmount = $adult_GrossAmount * $adult_count;
        $adult_markup = $adult_markup * $adult_count;

        $child_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $child_TotalAmount = $child_GrossAmount * $child_count;
        $Child_markup = $Child_markup * $child_count;

        $infant_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $infant_TotalAmount = $infant_GrossAmount * $infant_count;
        $Infant_markup = $Infant_markup * $infant_count;
        $totalamount1 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
        $gamount = $totalamount1;

        $grandTotalmarkup = $adult_markup + $Child_markup + $Infant_markup;

        $amount = $this->user_model->user_wallet_amout($this->input->post('uid'));

        if ($amount['0']['BALANCE'] < $gamount) {
            echo "NoBalance";
            die;
        }

        $FlightBookingDetailsT = array("AirlineCode" => $booking_data["AvailSegments"][0]["AirlineCode"],
            "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount1), "TourCode" => "",
            "PassengerDetails" => $PassengerDetails
        );

        $FlightBookingDetails[] = $FlightBookingDetailsT;
        $BookingType = "O";

        if (is_array($booking_data['returndata'])) {
            $get_taxfare = $this->tax_fare($booking_data['returndata']);
            $adult_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $adult_TotalAmount = $adult_GrossAmount * $adult_count;
            $Return_adult_markup = $Return_adult_markup * $adult_count;
            $child_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $child_TotalAmount = $child_GrossAmount * $child_count;
            $Return_Child_markup = $Return_Child_markup * $child_count;
            $infant_GrossAmount = (isset($get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['TaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
            $infant_TotalAmount = $infant_GrossAmount * $infant_count;
            $Return_Infant_markup = $Return_Infant_markup * $infant_count;

            $totalamount2 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
            $gamount = $gamount + $totalamount2;
            $grandTotalmarkup = $grandTotalmarkup + $Return_adult_markup + $Return_Child_markup + $Return_Infant_markup;

            $FlightBookingDetailsT = array("AirlineCode" => $booking_data['returndata']["AvailSegments"][0]["AirlineCode"],
                "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount2), "TourCode" => "",
                "PassengerDetails" => $PassengerDetails2
            );

            $FlightBookingDetails[] = $FlightBookingDetailsT;
            $BookingType = "R";
        }

        $bookingDetail = array("Authentication" => array("LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']),
            "UserTrackId" => $booking_data["UserTrackId"],
            "BookInput" => array("CustomerDetails" => array("Title" => $this->input->post('user_title'),
                    "Name" => $this->input->post('user_name'),
                    "Address" => $this->input->post('user_address'),
                    "City" => $this->input->post('user_city'),
                    "CountryId" => $this->input->post('user_country'),
                    "ContactNumber" => $this->input->post('user_contact'),
                    "EmailId" => trim($this->input->post('user_email')),
                    "PinCode" => $this->input->post('user_pincode')),
                "SpecialRemarks" => "",
                "NotifyByMail" => 1,
                "NotifyBySMS" => 1,
                "AdultCount" => $adult_count,
                "ChildCount" => $child_count,
                "InfantCount" => $infant_count,
                "BookingType" => $BookingType,
                "TotalAmount" => $gamount,
                "FrequentFlyerRequest" => null,
                "SpecialServiceRequest" => null,
                "FSCMealsRequest" => null,
                "FlightBookingDetails" => $FlightBookingDetails
            )
        );


        $result = $this->CutlPost('GetBook', $bookingDetail);
        $result = json_decode($result, true);
        // print_r($bookingDetail);
        if (!$result['ResponseStatus']) {
            
        } else {
            $hermsPnr = array();
            $result['uid'] = $this->input->post('uid');
            $result['grandTotalmarkup'] = $grandTotalmarkup;

            $getValue = json_decode($this->input->post('commission'), true);
            $getCommission = $this->agent_model->get_data_table('agent_commision_markup', array('forcommision' => 'Domestic Flight', 'uid' => 4545));

            $CommissionAddedValue = (($getValue * $getCommission[0]['adult_Commission']) / 100);
            $gamount = $gamount - $CommissionAddedValue;
            $result['commission'] = $CommissionAddedValue;
            $this->saveBooking($result);
            $amount = $this->user_model->user_wallet_amout($result['uid']);
            $balance = $amount['0']['BALANCE'];

            $tdata = array();
            $tdata['user_id'] = $result['uid'];
            $tdata['AGENTCODE'] = $result['uid'];
            $tdata['GIREFID'] = trim($result['BookOutput']['FlightTicketDetails'][0]['HermesPNR']);
            $tdata['METHODID'] = "FlightBooking";
            $tdata['BALANCE'] = ($balance - $gamount - $result['commission']);
            $tdata['TOTALAMOUNT'] = trim($balance);
            $tdata['DEBITAMOUNT'] = trim(($gamount - $result['commission']));
            $tdata['RECHARGEFEE'] = 0;
            $tdata['REASON'] = "Domestic Flight Booking";
            $tdata['STATUSCODE'] = 0;
            $tdata['STATUSDESCRIPTION'] = 'SUCCESS';
            $this->user_model->DMR_add_transaction($tdata);
            $this->user_model->user_wallet_amout_update(($balance - $gamount), $result['uid']);
        }

        echo json_encode($result);
        die;
    }

    public function OnewayThankyou($tranctionid, $UserTrackId, $agentPrint = false) {
        if (empty($tranctionid)) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);
        $tranctionid = explode("_", $tranctionid);
        $gresult = array();
        foreach ($tranctionid as $tid) {
            $result = $this->GetReprint($tid);
            $gresult[] = json_decode($result, true);
        }
        $data['data'] = $gresult;
        $data['Flight_dietail'] = $Flight_dietail;
        // print_r($gresult);
        if (empty($data['data'])) {
            redirect(base_url('/'), 'refresh');
        }
        if ($agentPrint) {
            echo json_encode($data);
            die;
        }
        $this->load->view('blocks/header', $data);
        $this->load->view('home/flightoneway_thankyou');
        $this->load->view('blocks/footer');
    }

    public function GetReprint($HermesPNR, $print = false) {
        if (empty($HermesPNR)) {
            redirect(base_url('/'), 'refresh');
        }
        $data = array("Authentication" => array("LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']), 'ReprintInput' => array('HermesPNR' => $HermesPNR));
        if ($print)
            echo $result = $this->CutlPost('GetReprint', $data);
        else
            return $result = $this->CutlPost('GetReprint', $data);
    }

    public function BookingRespons() {

        $this->load->view('home/bookingRespons');
    }

    public function internal_flight_list($agent = false) {

        $booking = array("way" => $this->input->post('way'), "sourc" => $this->input->post('source'), "destination" => $this->input->post('destination'), "adult" => $this->input->post('adult'), "child" => $this->input->post('child'), "infant" => $this->input->post('infant'), "departure" => $this->input->post('departure'), "arrive" => @$this->input->post('arrive'), "ClassType" => @$this->input->post('ClassType'));
        $JourneyDetails = array();
        if ($booking['way'] == 'R') {
            $JourneyDetails = array(
                array(
                    "Origin" => $booking['sourc'],
                    "Destination" => $booking['destination'],
                    "TravelDate" => $booking['departure']
                ),
                array(
                    "Origin" => $booking['destination'],
                    "Destination" => $booking['sourc'],
                    "TravelDate" => $booking['arrive']
                )
            );
        } else {
            $JourneyDetails = array(array(
                    "Origin" => $booking['sourc'],
                    "Destination" => $booking['destination'],
                    "TravelDate" => $booking['departure']
            ));
        }

        $flight = array(
            "Authentication" => array(
                "LoginId" => $this->Credentials['IntLoginId'],
                "Password" => $this->Credentials['IntPassword']
            ),
            "LCCAvailabilityInput" => array(
                "BookingType" => trim($booking['way']),
                "JourneyDetails" => $JourneyDetails,
                "ClassType" => $booking['ClassType'],
                "AirlineCode" => "",
                "AdultCount" => $booking['adult'],
                "ChildCount" => $booking['child'],
                "InfantCount" => $booking['infant'],
                "ResidentofIndia" => 1,
                "Optional1" => 1,
                "Optional2" => 0,
                "Optional3" => 0
            )
        );
        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $result = $this->CutlPost('GetLCCAirAvailability', $flight);
        $result = json_decode($result, true);

        //result2 with fsc method
        $flightFSC = array(
            "Authentication" => array(
                "LoginId" => $this->Credentials['IntLoginId'],
                "Password" => $this->Credentials['IntPassword']
            ),
            "FSCAvailabilityInput" => array(
                "BookingType" => trim($booking['way']),
                "JourneyDetails" => $JourneyDetails,
                "ClassType" => $booking['ClassType'],
                "AirlineCode" => "",
                "AdultCount" => $booking['adult'],
                "ChildCount" => $booking['child'],
                "InfantCount" => $booking['infant'],
                "ResidentofIndia" => 1,
                "Optional1" => 1,
                "Optional2" => 0,
                "Optional3" => 0
            )
        );
        $result2 = $this->CutlPost('GetFSCAirAvailability', $flightFSC);
        if ($agent) {
            $responsdata['flight_data'] = $result;
            $responsdata['flight_dataFSC'] = json_decode($result2);
            echo json_encode($responsdata);
            die;
        }
        $result2 = json_decode($result2, true);
        if (!$result['ResponseStatus']) {
            if (!$result2['ResponseStatus']) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . '
                            </div>');
            }
        }
        $responsdata['flight_data'] = $result;
        $responsdata['flight_dataFSC'] = $result2;
        if ($booking['way'] == "O") {
            $this->load->view('blocks/header', $responsdata);
            $this->load->view('home/interntl_flights_list');
            $this->load->view('blocks/footer');
        }
        if ($booking['way'] == "R") {
            $this->load->view('blocks/header', $responsdata);
            $this->load->view('home/Interntl_RtripFlight');
            $this->load->view('blocks/footer');
        }
    }

    public function IntOnewayFlightBooking($UserTrackId) {

        $userId = $this->session->userdata('uid');
        if (empty($userId)) {
            $this->session->set_flashdata('redirect_url', uri_string());
            redirect('login');
        }
        if ($UserTrackId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);
        if ($Flight_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }
        //add confirmation
        if ($this->input->post('flight') == 'confirm') {
            $this->International_ManageOnewaybooking($Flight_dietail);
        }

        $data = array();
        $data['Flight_dietail'] = $Flight_dietail;
        $user_details = $this->user_model->user_uid($this->session->userdata('uid'));
        $data['user_details'] = $user_details[0];
        $flight_search_post = $this->session->userdata('flight_search_post');
        $data['flight_search'] = $flight_search_post;
        //set return text
        
        if (is_array($Flight_dietail['returndata'])) {
            foreach ($Flight_dietail['returndata']['AvailSegments'] as $segment) {
                $Flight_dietail['AvailSegments'][] = $segment;
            }
            $get_taxfarer = $this->internal_tax_fare($Flight_dietail);
            $data['return_tax_details'] = $get_taxfarer;
            $data['tax_details'] = $get_taxfarer;
        } else {
            $get_taxfare = $this->internal_tax_fare($Flight_dietail);
            $data['tax_details'] = $get_taxfare;
        }

        if (isset($_POST['status']) and $_POST['status'] == 'success' and isset($_POST['udf2']) and $_POST['udf2'] == 'bookingDetail_' . $UserTrackId) {
            $this->load->library('PayUMoney');
            if ($this->payumoney->validatePayment()) {

                $RefrenceID = $UserTrackId;
                $payData = array();
                $payData['user_id'] = $this->session->userdata('uid');
                $payData['FORPAYMENT'] = 'InterNationalFlight';
                $payData['RefrenceID'] = $UserTrackId;
                $user_details = $this->savePuMoney($payData);

                $bookingDetail = $this->session->userdata('bookingDetail_' . $UserTrackId);
                $this->IntbookingProcess($_POST['udf1'], $bookingDetail);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> Payemnt information not match.
								</div>');
            }
        } else {
            if (isset($_POST['status']) and $_POST['status'] != 'success') {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $_POST['error'] . ' ' . $_POST['error_Message'] . '
                            </div>');
            }
        }
        $this->load->view('blocks/header', $data);
        $this->load->view('home/IntOnewayFlightBooking');
        $this->load->view('blocks/footer');
    }

    public function internal_tax_fare($tdata = 'NULL', $agent = false) {
        if ($tdata != 'NULL')
            $data = $tdata;
        else {
            $data = $this->input->post('value');
        }
        if ($agent) {
            $data = json_decode($data, true);
        }
        $Fmethod = "";
        if (isset($data['Fmethod'])) {
            $Fmethod = $data['Fmethod'];
        } else {
            $Fmethod = "LCC";
        }
        $tax = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
                "Password" => $this->Credentials['IntPassword']),
                "UserTrackId" => $data["UserTrackId"],
                $Fmethod . "TaxInput" => array("TaxReqFlightSegments" => $data['AvailSegments']
            )
        );
        
        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $result = $this->CutlPost('Get' . $Fmethod . 'AirTax', $tax);
        
        $fare_data = json_decode($result, true);
        $fare_rule = $this->international_fare_rule($data);
        $fare_data = json_decode($fare_rule, true);
        $tax_data = json_decode($result, true);
        if ($tdata != 'NULL') {
            if (isset($tax_data['FSCTaxOutput'])) {
                $tax_data['LCCTaxOutput'] = $tax_data['FSCTaxOutput'];
            }
            return $tax_data;
        }
        if ($agent) {
            $tax_data = json_decode($result, true);
            if (isset($tax_data['FSCTaxOutput'])) {
                $tax_data['LCCTaxOutput'] = $tax_data['FSCTaxOutput'];
            }
            echo json_encode($tax_data);
            die;
        }
        if ($tax_data['ResponseStatus']) {
            foreach ($tax_data[$Fmethod . 'TaxOutput']['TaxResFlightSegments'] as $taxsgm => $txtFare) {
                if ($txtFare['AdultTax']['FareBreakUpDetails']['GrossAmount'] > 0) {
                    echo "<table class='table table-striped'>";
                    echo "<tr><td>Base Fare</td><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']['BasicAmount'] . "'</td></tr>
			<tr><td>Tax Amount</td><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']['TotalTaxAmount'] . "'</td></tr>
			<tr><th>Passenger Service Fee</th><td></td></tr>
			<tr><th>User Development Fee</th><td></td></tr>
			<tr><th>Arrival User Development Fee</th><td></td></tr>
			<tr><th>Total Pay</th><td>'" . $txtFare['AdultTax']['FareBreakUpDetails']['GrossAmount'] . "'</td></tr>
			<tr><th></th><td></td></tr>";
                    echo "</table>";
                    echo "<br/><hr/>";
                }
            }
        } else {
            echo $tax_data['FailureRemarks'];
        }
        $print_fare = explode("?", $fare_data['FareRuleOutput']['FareRules']);
        echo "<h4 align='center'>Fare Rules </h4><hr/>";
        echo "<ul>";
        for ($i = 0; $i < count($print_fare); $i++) {
            echo "<ol>";
            echo $print_fare[$i];
            echo "</ol><br/>";
        }
        echo "</ul>";
    }

    public function international_fare_rule($fare) {

        $fare_data = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'], "Password" => $this->Credentials['IntPassword']), "UserTrackId" => $fare["UserTrackId"],
            "FareRuleInput" => array("AirlineCode" => $fare['AvailSegments'][0]['AirlineCode'],
                "FlightId" => $fare['AvailSegments'][0]['FlightId'], "ClassCode" => $fare['AvailSegments'][0]['ClassCode'])
        );

        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $result = $this->CutlPost('GetFareRule', $fare_data);
        return $result;
    }

    public function International_ManageOnewaybooking($booking_data) { //$data=explode('/',$booking_data);			
        $PassengerDetails = array();
        $PassengerDetails2 = array();
        $adult_count = count($this->input->post('adult_first_name'));

        $BookingSegments = array();
        foreach ($booking_data['AvailSegments'] as $AvailSegments) {
            $tmparray = array();
            $tmparray["FlightId"] = $AvailSegments['FlightId'];
            $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
            $tmparray["SpecialServiceCode"] = "";
            $tmparray["FrequentFlyerId"] = "";
            $tmparray["FrequentFlyerNumber"] = "";
            $tmparray["MealCode"] = "";
            $tmparray["SeatPreferId"] = "";
            $BookingSegments[] = $tmparray;
        }
        if (is_array($booking_data['returndata'])) {
            $BookingSegments2 = array();
            foreach ($booking_data['returndata']['AvailSegments'] as $AvailSegments) {
                $tmparray = array();
                $tmparray["FlightId"] = $AvailSegments['FlightId'];
                $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
                $tmparray["SpecialServiceCode"] = "";
                $tmparray["FrequentFlyerId"] = "";
                $tmparray["FrequentFlyerNumber"] = "";
                $tmparray["MealCode"] = "";
                $tmparray["SeatPreferId"] = "";
                $BookingSegments[] = $tmparray;
                $booking_data['AvailSegments'][] = $AvailSegments;
            }
        }

        foreach ($this->input->post('adult_first_name') as $key => $adult) {
            $tmp_array = array();
            $adult_title = $this->input->post('adult_title');
            $adult_last_name = $this->input->post('adult_last_name');
            $adult_gender = $this->input->post('adult_gender');
            $adult_passport = $this->input->post('adult_passport');
            $adult_PassportIssuingCountry = $this->input->post('adult_PassportIssuingCountry');
            $adult_PassportExpiryDate = $this->input->post('adult_PassportExpiryDate');
            $adult_Nationality = $this->input->post('adult_Nationality');
            $adult_DateofBirth = $this->input->post('adult_DateofBirth');
            $adult_DateofBirth_explode = explode("/", $adult_DateofBirth[$key]);
            $age_a = @date_diff(date_create($adult_DateofBirth_explode[2] . '-' . $adult_DateofBirth_explode[0] . '-' . $adult_DateofBirth_explode[1]), date_create('today'))->y;
            $tmp_array["PassengerType"] = "ADULT";
            $tmp_array["Title"] = $adult_title[$key];
            $tmp_array["FirstName"] = $adult;
            $tmp_array["LastName"] = $adult_last_name[$key];
            $tmp_array["Gender"] = $adult_gender[$key];
            $tmp_array["Age"] = $age_a;
            $tmp_array["IdentityProofId"] = '';
            $tmp_array["IdentityProofNumber"] = '';
            $tmp_array["PassportNumber"] = $adult_passport[$key];
            $tmp_array["PassportExpiryDate"] = $adult_PassportExpiryDate[$key];
            $tmp_array["PassportIssuingCountry"] = $adult_PassportIssuingCountry[$key];
            $tmp_array["Nationality"] = $adult_Nationality[$key];
            $tmp_array["DateofBirth"] = $adult_DateofBirth[$key];
            $tmp_array["BookingSegments"] = $BookingSegments;
            $PassengerDetails[] = $tmp_array;
            /* if(is_array($booking_data['returndata'])){
              $tmp_array["BookingSegments"]=$BookingSegments2;
              $PassengerDetails2[]=$tmp_array;
              } */
        }
        //for child
        $child_count = count($this->input->post('child_first_name'));
        if (is_array($this->input->post('child_first_name'))) {
            foreach ($this->input->post('child_first_name') as $key => $child) {
                $tmp_array = array();
                $child_title = $this->input->post('child_title');
                $child_last_name = $this->input->post('child_last_name');
                $child_gender = $this->input->post('child_gender');
                $child_passport = $this->input->post('child_passport');
                $child_PassportExpiryDate = $this->input->post('child_PassportExpiryDate');
                $child_PassportIssuingCountry = $this->input->post('child_PassportIssuingCountry');
                $child_Nationality = $this->input->post('child_Nationality');
                $child_DateofBirth = $this->input->post('child_DateofBirth');
                $child_DateofBirth_explode = explode("/", $child_DateofBirth[$key]);
                $age_a = @date_diff(date_create($child_DateofBirth_explode[2] . '-' . $child_DateofBirth_explode[0] . '-' . $child_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "CHILD";
                $tmp_array["Title"] = $child_title[$key];
                $tmp_array["FirstName"] = $child;
                $tmp_array["LastName"] = $child_last_name[$key];
                $tmp_array["Gender"] = $child_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["PassportNumber"] = $child_passport[$key];
                $tmp_array["PassportExpiryDate"] = $child_PassportExpiryDate[$key];
                $tmp_array["PassportIssuingCountry"] = $child_PassportIssuingCountry[$key];
                $tmp_array["Nationality"] = $child_Nationality[$key];
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $child_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                /* if(is_array($booking_data['returndata'])){
                  $tmp_array["BookingSegments"]=$BookingSegments2;
                  $PassengerDetails2[]=$tmp_array;
                  } */
            }
        }

        //for child
        $infant_count = count($this->input->post('infant_first_name'));
        if (is_array($this->input->post('infant_first_name'))) {
            foreach ($this->input->post('infant_first_name') as $key => $infant) {
                $tmp_array = array();
                $infant_title = $this->input->post('infant_title');
                $infant_last_name = $this->input->post('infant_last_name');
                $infant_gender = $this->input->post('infant_gender');
                $infant_PassportExpiryDate = $this->input->post('infant_PassportExpiryDate');
                $infant_PassportIssuingCountry = $this->input->post('infant_PassportIssuingCountry');
                $infant_passport = $this->input->post('infant_passport');
                $infant_Nationality = $this->input->post('infant_Nationality');
                $infant_DateofBirth = $this->input->post('infant_DateofBirth');
                $infant_DateofBirth_explode = explode("/", $infant_DateofBirth[$key]);
                $age_a = @date_diff(date_create($infant_DateofBirth_explode[2] . '-' . $infant_DateofBirth_explode[0] . '-' . $infant_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "INFANT";
                $tmp_array["Title"] = $infant_title[$key];
                $tmp_array["FirstName"] = $infant;
                $tmp_array["LastName"] = $infant_last_name[$key];
                $tmp_array["Gender"] = $infant_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["PassportNumber"] = $infant_passport[$key];
                $tmp_array["PassportExpiryDate"] = $infant_PassportExpiryDate[$key];
                $tmp_array["PassportIssuingCountry"] = $infant_PassportIssuingCountry[$key];
                $tmp_array["Nationality"] = $infant_Nationality[$key];
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $infant_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                /* if(is_array($booking_data['returndata'])){
                  $tmp_array["BookingSegments"]=$BookingSegments2;
                  $PassengerDetails2[]=$tmp_array;
                  } */
            }
        }

        //print_r($booking_data
        $get_taxfare = $this->internal_tax_fare($booking_data);
        //print_r($get_taxfare);
        $adult_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $adult_TotalAmount = $adult_GrossAmount * $adult_count;

        $child_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $child_TotalAmount = $child_GrossAmount * $child_count;

        $infant_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $infant_TotalAmount = $infant_GrossAmount * $infant_count;

        $totalamount1 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
        $gamount = $totalamount1;


        $FlightBookingDetailsT = array("AirlineCode" => $booking_data["AvailSegments"][0]["AirlineCode"],
            "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount1), "TourCode" => "",
            "PassengerDetails" => $PassengerDetails
        );

        $FlightBookingDetails = $FlightBookingDetailsT;
        $BookingType = "O";

        if (is_array($booking_data['returndata'])) {
            $BookingType = "R";
        }
        $tgamount = $gamount;
        if ($this->Credentials['checkError'] != true) {
            $gamount = -$gamount;
        }

        $bookingDetail = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'], "Password" => $this->Credentials['IntPassword']),
            "UserTrackId" => $booking_data["UserTrackId"],
            $booking_data['Fmethod'] . "BookInput" => array("CustomerDetails" => array("Title" => $this->input->post('user_title'),
                "Name" => $this->input->post('user_name'),
                "Address" => $this->input->post('user_address'),
                "City" => $this->input->post('user_city'),
                "CountryId" => $this->input->post('user_country'),
                "ContactNumber" => $this->input->post('user_contact'),
                "EmailId" => $this->input->post('user_email'),
                "PinCode" => $this->input->post('user_pincode')),
                "SpecialRemarks" => "",
                "NotifyByMail" => 1,
                "NotifyBySMS" => 1,
                "AdultCount" => $adult_count,
                "ChildCount" => $child_count,
                "InfantCount" => $infant_count,
                "BookingType" => $BookingType,
                "TotalAmount" => $gamount,
                "FrequentFlyerRequest" => null,
                "SpecialServiceRequest" => null,
                "FSCMealsRequest" => null,
                "BookingDetails" => $FlightBookingDetails
            )
        );

        $balcne = $this->IntGetAgentCreditBalance();
        if ($balcne['AgentCreditBalanceOutput']['RemainingAmount'] < $tgamount) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> YOUR AGENT CREDIT LIMIT(' . $balcne['AgentCreditBalanceOutput']['RemainingAmount'] . ') IS LESS THAN THE TOTAL COST
                            </div>');
            return false;
        }
        $this->session->set_userdata('bookingDetail_' . $booking_data["UserTrackId"], $bookingDetail);
        if ($this->Credentials['Pyment'] and $this->Credentials['checkError']) {
            $this->load->library('PayUMoney');
            $payUmoney = array();
            $payUmoney['productinfo'] = array(array('name' => "Flight Booking",
                    'description' => 'International Flight Booking',
                    'value' => $gamount,
                    "isRequired" => true));
            $payUmoney['amount'] = $gamount;
            $payUmoney['firstname'] = $this->input->post('user_name');
            $payUmoney['email'] = $this->input->post('user_email');
            $payUmoney['phone'] = $this->input->post('user_contact');
            $payUmoney['surl'] = base_url('/index.php/flight/IntOnewayFlightBooking/' . $booking_data["UserTrackId"]);
            $payUmoney['furl'] = base_url('/index.php/flight/IntOnewayFlightBooking/' . $booking_data["UserTrackId"]);
            $payUmoney['udf1'] = 'Get' . $booking_data['Fmethod'] . 'AirBook';
            $payUmoney['udf2'] = 'bookingDetail_' . $booking_data["UserTrackId"];
            $payUmoney['udf3'] = 'DomesticFlightBooking';
            $this->payumoney->setpayUMoney($payUmoney);
            return true;
        }

        $this->IntbookingProcess('Get' . $booking_data['Fmethod'] . 'AirBook', $bookingDetail);
    }

    public function International_ManageOnewaybookingAgent() { //$data=explode('/',$booking_data);			
        $booking_data = json_decode($this->input->post('Flight_dietail'), true);
        $_POST['adult_first_name'] = json_decode($this->input->post('adult_first_name'), true);
        $_POST['adult_last_name'] = json_decode($this->input->post('adult_last_name'));
        $_POST['adult_gender'] = json_decode($this->input->post('adult_gender'));
        $_POST['adult_DateofBirth'] = json_decode($this->input->post('adult_DateofBirth'));
        $_POST['adult_title'] = json_decode($this->input->post('adult_title'));
        $_POST['adult_passport'] = json_decode($this->input->post('adult_passport'));
        $_POST['adult_PassportExpiryDate'] = json_decode($this->input->post('adult_PassportExpiryDate'));
        $_POST['adult_PassportIssuingCountry'] = json_decode($this->input->post('adult_PassportIssuingCountry'));
        $_POST['adult_Nationality'] = json_decode($this->input->post('adult_Nationality'));

        $_POST['child_first_name'] = json_decode($this->input->post('child_first_name'));
        $_POST['child_title'] = json_decode($this->input->post('child_title'));
        $_POST['child_last_name'] = json_decode($this->input->post('child_last_name'));
        $_POST['child_gender'] = json_decode($this->input->post('child_gender'));
        $_POST['child_DateofBirth'] = json_decode($this->input->post('child_DateofBirth'));
        $_POST['child_passport'] = json_decode($this->input->post('child_passport'));
        $_POST['child_PassportExpiryDate'] = json_decode($this->input->post('child_PassportExpiryDate'));
        $_POST['child_PassportIssuingCountry'] = json_decode($this->input->post('child_PassportIssuingCountry'));
        $_POST['child_Nationality'] = json_decode($this->input->post('child_Nationality'));

        $_POST['infant_first_name'] = json_decode($this->input->post('infant_first_name'));
        $_POST['infant_title'] = json_decode($this->input->post('infant_title'));
        $_POST['infant_gender'] = json_decode($this->input->post('infant_gender'));
        $_POST['infant_DateofBirth'] = json_decode($this->input->post('infant_DateofBirth'));
        $_POST['infant_last_name'] = json_decode($this->input->post('infant_last_name'));
        $_POST['infant_passport'] = json_decode($this->input->post('infant_passport'));
        $_POST['infant_PassportExpiryDate'] = json_decode($this->input->post('infant_PassportExpiryDate'));
        $_POST['infant_PassportIssuingCountry'] = json_decode($this->input->post('infant_PassportIssuingCountry'));
        $_POST['infant_Nationality'] = json_decode($this->input->post('infant_Nationality'));

        $PassengerDetails = array();
        $PassengerDetails2 = array();
        $adult_count = count($this->input->post('adult_first_name'));

        $BookingSegments = array();
        foreach ($booking_data['AvailSegments'] as $AvailSegments) {
            $tmparray = array();
            $tmparray["FlightId"] = $AvailSegments['FlightId'];
            $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
            $tmparray["SpecialServiceCode"] = "";
            $tmparray["FrequentFlyerId"] = "";
            $tmparray["FrequentFlyerNumber"] = "";
            $tmparray["MealCode"] = "";
            $tmparray["SeatPreferId"] = "";
            $BookingSegments[] = $tmparray;

            $this->load->model('agent_model');
            $markepdata = $this->agent_model->get_domesticFlightMrakup($booking_data['AvailSegments'][0]['AirlineCode'], 'International Flight');
            $adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
            $Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
            $Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;
        }

        if (is_array($booking_data['returndata'])) {
            $BookingSegments2 = array();
            foreach ($booking_data['returndata']['AvailSegments'] as $AvailSegments) {
                $tmparray = array();
                $tmparray["FlightId"] = $AvailSegments['FlightId'];
                $tmparray["ClassCode"] = $AvailSegments['ClassCode'];
                $tmparray["SpecialServiceCode"] = "";
                $tmparray["FrequentFlyerId"] = "";
                $tmparray["FrequentFlyerNumber"] = "";
                $tmparray["MealCode"] = "";
                $tmparray["SeatPreferId"] = "";
                $BookingSegments[] = $tmparray;
                $booking_data['AvailSegments'][] = $AvailSegments;

                $markepdata = $this->agent_model->get_domesticFlightMrakup($booking_data['returndata']['AvailSegments'][0]['AirlineCode'], 'International Flight');
                $Return_adult_markup = isset($markepdata[0]['adult_Commission']) ? $markepdata[0]['adult_Commission'] : 0;
                $Return_Child_markup = isset($markepdata[0]['Child_Commission']) ? $markepdata[0]['Child_Commission'] : 0;
                $Return_Infant_markup = isset($markepdata[0]['Infant_Commission']) ? $markepdata[0]['Infant_Commission'] : 0;
            }
        }

        foreach ($this->input->post('adult_first_name') as $key => $adult) {
            $tmp_array = array();
            $adult_title = $this->input->post('adult_title');
            $adult_last_name = $this->input->post('adult_last_name');
            $adult_gender = $this->input->post('adult_gender');
            $adult_passport = $this->input->post('adult_passport');
            $adult_PassportIssuingCountry = $this->input->post('adult_PassportIssuingCountry');
            $adult_PassportExpiryDate = $this->input->post('adult_PassportExpiryDate');
            $adult_Nationality = $this->input->post('adult_Nationality');
            $adult_DateofBirth = $this->input->post('adult_DateofBirth');
            $adult_DateofBirth_explode = explode("/", $adult_DateofBirth[$key]);
            $age_a = @date_diff(date_create($adult_DateofBirth_explode[2] . '-' . $adult_DateofBirth_explode[0] . '-' . $adult_DateofBirth_explode[1]), date_create('today'))->y;
            $tmp_array["PassengerType"] = "ADULT";
            $tmp_array["Title"] = $adult_title[$key];
            $tmp_array["FirstName"] = $adult;
            $tmp_array["LastName"] = $adult_last_name[$key];
            $tmp_array["Gender"] = $adult_gender[$key];
            $tmp_array["Age"] = $age_a;
            $tmp_array["IdentityProofId"] = '';
            $tmp_array["IdentityProofNumber"] = '';
            $tmp_array["PassportNumber"] = $adult_passport[$key];
            $tmp_array["PassportExpiryDate"] = $adult_PassportExpiryDate[$key];
            $tmp_array["PassportIssuingCountry"] = $adult_PassportIssuingCountry[$key];
            $tmp_array["Nationality"] = $adult_Nationality[$key];
            $tmp_array["DateofBirth"] = $adult_DateofBirth[$key];
            $tmp_array["BookingSegments"] = $BookingSegments;
            $PassengerDetails[] = $tmp_array;
            /* if(is_array($booking_data['returndata'])){
              $tmp_array["BookingSegments"]=$BookingSegments2;
              $PassengerDetails2[]=$tmp_array;
              } */
        }
        //for child
        $child_count = count($this->input->post('child_first_name'));
        if (is_array($this->input->post('child_first_name'))) {
            foreach ($this->input->post('child_first_name') as $key => $child) {
                $tmp_array = array();
                $child_title = $this->input->post('child_title');
                $child_last_name = $this->input->post('child_last_name');
                $child_gender = $this->input->post('child_gender');
                $child_passport = $this->input->post('child_passport');
                $child_PassportExpiryDate = $this->input->post('child_PassportExpiryDate');
                $child_PassportIssuingCountry = $this->input->post('child_PassportIssuingCountry');
                $child_Nationality = $this->input->post('child_Nationality');
                $child_DateofBirth = $this->input->post('child_DateofBirth');
                $child_DateofBirth_explode = explode("/", $child_DateofBirth[$key]);
                $age_a = @date_diff(date_create($child_DateofBirth_explode[2] . '-' . $child_DateofBirth_explode[0] . '-' . $child_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "CHILD";
                $tmp_array["Title"] = $child_title[$key];
                $tmp_array["FirstName"] = $child;
                $tmp_array["LastName"] = $child_last_name[$key];
                $tmp_array["Gender"] = $child_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["PassportNumber"] = $child_passport[$key];
                $tmp_array["PassportExpiryDate"] = $child_PassportExpiryDate[$key];
                $tmp_array["PassportIssuingCountry"] = $child_PassportIssuingCountry[$key];
                $tmp_array["Nationality"] = $child_Nationality[$key];
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $child_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
                /* if(is_array($booking_data['returndata'])){
                  $tmp_array["BookingSegments"]=$BookingSegments2;
                  $PassengerDetails2[]=$tmp_array;
                  } */
            }
        }

        //for child
        $infant_count = count($this->input->post('infant_first_name'));
        if (is_array($this->input->post('infant_first_name'))) {
            foreach ($this->input->post('infant_first_name') as $key => $infant) {
                $tmp_array = array();
                $infant_title = $this->input->post('infant_title');
                $infant_last_name = $this->input->post('infant_last_name');
                $infant_gender = $this->input->post('infant_gender');
                $infant_PassportExpiryDate = $this->input->post('infant_PassportExpiryDate');
                $infant_PassportIssuingCountry = $this->input->post('infant_PassportIssuingCountry');
                $infant_passport = $this->input->post('infant_passport');
                $infant_Nationality = $this->input->post('infant_Nationality');
                $infant_DateofBirth = $this->input->post('infant_DateofBirth');
                $infant_DateofBirth_explode = explode("/", $infant_DateofBirth[$key]);
                $age_a = @date_diff(date_create($infant_DateofBirth_explode[2] . '-' . $infant_DateofBirth_explode[0] . '-' . $infant_DateofBirth_explode[1]), date_create('today'))->y;
                $tmp_array["PassengerType"] = "INFANT";
                $tmp_array["Title"] = $infant_title[$key];
                $tmp_array["FirstName"] = $infant;
                $tmp_array["LastName"] = $infant_last_name[$key];
                $tmp_array["Gender"] = $infant_gender[$key];
                $tmp_array["Age"] = $age_a;
                $tmp_array["PassportNumber"] = $infant_passport[$key];
                $tmp_array["PassportExpiryDate"] = $infant_PassportExpiryDate[$key];
                $tmp_array["PassportIssuingCountry"] = $infant_PassportIssuingCountry[$key];
                $tmp_array["Nationality"] = $infant_Nationality[$key];
                $tmp_array["IdentityProofId"] = '';
                $tmp_array["IdentityProofNumber"] = '';
                $tmp_array["DateofBirth"] = $infant_DateofBirth[$key];
                $tmp_array["BookingSegments"] = $BookingSegments;
                $PassengerDetails[] = $tmp_array;
            }
        }

        $get_taxfare = $this->internal_tax_fare($booking_data);
        $adult_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['AdultTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $adult_TotalAmount = $adult_GrossAmount * $adult_count;
        $adult_markup = $adult_markup * $adult_count;
        $child_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['ChildTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $child_TotalAmount = $child_GrossAmount * $child_count;
        $Child_markup = $Child_markup * $child_count;
        $infant_GrossAmount = (isset($get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'])) ? $get_taxfare['LCCTaxOutput']['TaxResFlightSegments'][0]['InfantTax']['FareBreakUpDetails']['GrossAmount'] : 0;
        $infant_TotalAmount = $infant_GrossAmount * $infant_count;
        $Infant_markup = $Infant_markup * $infant_count;
        $totalamount1 = $adult_TotalAmount + $child_TotalAmount + $infant_TotalAmount;
        $gamount = $totalamount1;
        $grandTotalmarkup = $adult_markup + $Child_markup + $Infant_markup;
        $amount = $this->user_model->user_wallet_amout($this->input->post('uid'));
        if ($amount['0']['BALANCE'] < $gamount) {
            echo "NoBalance";
            die;
        }

        $FlightBookingDetailsT = array("AirlineCode" => $booking_data["AvailSegments"][0]["AirlineCode"],
            "PaymentDetails" => array("CurrencyCode" => "INR", "Amount" => $totalamount1), "TourCode" => "",
            "PassengerDetails" => $PassengerDetails
        );

        $FlightBookingDetails = $FlightBookingDetailsT;
        $BookingType = "O";

        if (is_array($booking_data['returndata'])) {
            $grandTotalmarkup = $grandTotalmarkup * 2;
            $BookingType = "R";
        }


        $bookingDetail = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
            "Password" => $this->Credentials['IntPassword']),
            "UserTrackId" => $booking_data["UserTrackId"],
            $booking_data['Fmethod'] . "BookInput" => array("CustomerDetails" => array("Title" => $this->input->post('user_title'),
                    "Name" => $this->input->post('user_name'),
                    "Address" => $this->input->post('user_address'),
                    "City" => $this->input->post('user_city'),
                    "CountryId" => $this->input->post('user_country'),
                    "ContactNumber" => $this->input->post('user_contact'),
                    "EmailId" => $this->input->post('user_email'),
                    "PinCode" => $this->input->post('user_pincode')),
                "SpecialRemarks" => "",
                "NotifyByMail" => 1,
                "NotifyBySMS" => 1,
                "AdultCount" => $adult_count,
                "ChildCount" => $child_count,
                "InfantCount" => $infant_count,
                "BookingType" => $BookingType,
                "TotalAmount" => $gamount,
                "FrequentFlyerRequest" => null,
                "SpecialServiceRequest" => null,
                "FSCMealsRequest" => null,
                "BookingDetails" => $FlightBookingDetails
            )
        );


        $result = $this->CutlPost('Get' . $booking_data['Fmethod'] . 'AirBook', $bookingDetail);
        $result = json_decode($result, true);
        if (!$result['ResponseStatus']) {
            
        } else {
            $hermsPnr = array();
            if (isset($result['FSCBookOutput'])) {
                $hermsPnr[] = $result['FSCBookOutput']['TicketDetails']['HermesPNR'];
            } else {
                $hermsPnr[] = $result['LCCBookOutput']['TicketDetails']['HermesPNR'];
            }
            $result['uid'] = $this->input->post('uid');
            $result['grandTotalmarkup'] = $grandTotalmarkup;
            $result['commission'] = json_decode($this->input->post('commission'), true);
            $this->IntsaveBooking($result);
            $amount = $this->user_model->user_wallet_amout($result['uid']);
            $balance = $amount['0']['BALANCE'];

            $tdata = array();
            $tdata['user_id'] = $result['uid'];
            $tdata['AGENTCODE'] = $result['uid'];
            $tdata['GIREFID'] = implode("_", $hermsPnr);
            $tdata['METHODID'] = "FlightBooking";
            $tdata['BALANCE'] = ($balance - $gamount - $result['commission']);
            $tdata['TOTALAMOUNT'] = trim($balance);
            $tdata['DEBITAMOUNT'] = trim(($gamount - $result['commission']));
            $tdata['RECHARGEFEE'] = 0;
            $tdata['REASON'] = "International Flight Booking";
            $tdata['STATUSCODE'] = 0;
            $tdata['STATUSDESCRIPTION'] = 'SUCCESS';
            $this->user_model->DMR_add_transaction($tdata);
            $this->user_model->user_wallet_amout_update(($balance - $gamount - $result['commission']), $result['uid']);
        }

        echo json_encode($result);
        die;
    }

    public function IntbookingProcess($method, $bookingDetail) {

        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $result = $this->CutlPost($method, $bookingDetail);
        $result = json_decode($result, true);
        
        if (!$result['ResponseStatus']) {

            if ($result['FailureRemarks'] == 'Your Total Amount is not correct.' and $this->Credentials['checkError'] != true) {
                $Flight_dietail = $this->session->userdata('Flight_' . $result['UserTrackId']);
                $this->Credentials['checkError'] = true;
                $this->International_ManageOnewaybooking($Flight_dietail);
                return false;
            }

            if (isset($_POST['mihpayid'])) {
                $this->BookingFailed($bookingDetail);
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> ' . @$result['FailureRemarks'] . ' ' . @$response['FailureRemarks'] . ' sorry for this problem please contact our customre care with payemntid ' . $_POST['mihpayid'] . ' for return your payemnt 
								</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> ' . $result['FailureRemarks'] . '
								</div>');
            }
        } else {
            $this->IntsaveBooking($result);
            $hermsPnr = array();
            if (isset($result['FSCBookOutput'])) {
                $hermsPnr[] = $result['FSCBookOutput']['TicketDetails']['HermesPNR'];
            } else {
                $hermsPnr[] = $result['LCCBookOutput']['TicketDetails']['HermesPNR'];
            }
            $hermsPnr = implode("_", $hermsPnr);
            redirect(base_url('/index.php/flight/IntOnewayThankyou/' . $hermsPnr . '/' . $result['UserTrackId']), 'refresh');
        }
    }

    public function IntOnewayThankyou($tranctionid, $UserTrackId, $agentPrint = false) {
        if (empty($tranctionid)) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);
        $tranctionid = explode("_", $tranctionid);
        $gresult = array();
        foreach ($tranctionid as $tid) {
            $result = $this->IntGetReprint($tid);

            $gresult[] = json_decode($result, true);
        }
        $data['data'] = $gresult;
        $data['Flight_dietail'] = $Flight_dietail;
        if (empty($data['data'])) {
            redirect(base_url('/'), 'refresh');
        }
        if ($agentPrint) {
            echo json_encode($data);
            die;
        }
        $this->load->view('blocks/header', $data);
        $this->load->view('home/flightoneway_thankyou');
        $this->load->view('blocks/footer');
    }

    public function IntGetReprint($HermesPNR, $print = false) {
        if (empty($HermesPNR)) {
            redirect(base_url('/'), 'refresh');
        }
        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $data = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
                "Password" => $this->Credentials['IntPassword']), 'ReprintInput' => array('HermesPNR' => $HermesPNR));
        $result = $this->CutlPost('GetReprint', $data);
        if ($print)
            echo $result = $this->CutlPost('GetReprint', $data);
        else
            return $result = $this->CutlPost('GetReprint', $data);
    }

    function get_ip() {
        $url = "http://202.54.157.22/knowyouripv1/yourip.svc/jsonservice/knowyourip";
        $headers = array('Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if (($result = curl_exec($ch)) === FALSE) {
            die('cURL error: ' . curl_error($ch) . "<br/>\n");
        } else {
            print_r($result);
        }
    }

    public function get_airport_code() {

        $term = $this->input->get('term');
        $domestic = $this->input->get('domestic');
        $options = array();
        $result = $this->region_model->getairportcode($term, $domestic);

        foreach ($result as $key => $val) {
            if ($domestic == 'true') {
                $options['myData'][] = array(
                    'CODE' => $val['CODE'],
                    'CITYAIRPORT' => $val['CITYAIRPORT']
                );
            } else {
                $options['myData'][] = array(
                    'CODE' => $val['CODE'],
                    'CITYAIRPORT' => $val['CITYAIRPORT'] . "(" . $val['COUNTRY'] . ")"
                );
            }
        }
        echo json_encode($options);
    }

    public function GetAgentCreditBalance() {
        $auth = array("Authentication" => array(
                "LoginId" => $this->Credentials['LoginId'],
                "Password" => $this->Credentials['Password']
        ));
        $result = $this->CutlPost('GetAgentCreditBalance', $auth);
        return json_decode($result, true);
    }

    public function IntGetAgentCreditBalance() {
        $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
        $auth = array("Authentication" => array(
                "LoginId" => $this->Credentials['IntLoginId'],
                "Password" => $this->Credentials['IntPassword']
        ));
        $result = $this->CutlPost('GetAgentCreditBalance', $auth);
        return json_decode($result, true);
    }

    function CutlPost($url, $postdata) {
        $url = $this->Credentials['apiurl'] . '/' . $url;
        $booking = json_encode($postdata);
        $headers = array('Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $booking);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if (($result = curl_exec($ch)) === FALSE) {
            die('cURL error: ' . curl_error($ch) . "<br/>\n");
        } else {
            return $result;
        }
        curl_close($ch);
    }

    function savePuMoney($payData) {
        //$this->load->model('User_model', '', TRUE);
        //$payData=array();				
        //$payData['user_id']=$this->session->userdata('uid');
        //$payData['FORPAYMENT']='DomesticFlight';
        //$payData['RefrenceID']=$UserTrackId;
        $payData['mihpayid'] = $_POST['mihpayid'];
        $payData['mode'] = $_POST['mode'];
        $payData['status'] = $_POST['status'];
        $payData['txnid'] = $_POST['txnid'];
        $payData['amount'] = $_POST['amount'];
        $payData['discount'] = $_POST['discount'];
        $payData['productinfo'] = json_encode($_POST['productinfo']);
        $payData['firstname'] = $_POST['firstname'];
        $payData['lastname'] = $_POST['lastname'];
        $payData['address1'] = $_POST['address1'];
        //$payData['address2']=$_POST['address2'];
        $payData['city'] = $_POST['city'];
        $payData['state'] = $_POST['state'];
        $payData['country'] = $_POST['country'];
        $payData['bank_ref_num'] = $_POST['bank_ref_num'];
        $payData['unmappedstatus'] = $_POST['unmappedstatus'];
        $payData['payuMoneyId'] = $_POST['payuMoneyId'];
        $user_details = $this->user_model->savePayUMoney($payData);
    }

    function saveBooking($data) {

        $bookingDetail = $this->session->userdata('bookingDetail_' . $data['UserTrackId']);
        $payData = array();
        $hermsPnr = array();
        $TransactionId = array();
        $AirlineDetails = array();
        $TotalAmount = 0;
        $Arrivaldatetime = '';
        $TicketNumber = array();
        $ClassCodeDesc = array();
        $PassengerName = array();
        $PassengerType = array();
        $TransmissionControlNo = array();
        foreach ($data['BookOutput']['FlightTicketDetails'] as $pnrs) {
            $hermsPnr[] = $pnrs['HermesPNR'];
            $TransactionId[] = $pnrs['TransactionId'];
            $AirlineDetails[] = $pnrs['AirlineDetails'];
            $TotalAmount = $TotalAmount + $pnrs['TotalAmount'];
            foreach ($pnrs['PassengerDetails'] as $PassengerDetails) {
                foreach ($PassengerDetails['BookedSegments'] as $BookedSegments) {
                    $Arrivaldatetime = ($pnrs['BookingType'] == 'R') ? $BookedSegments['DepartureDateTime'] : '';
                    $TicketNumber[] = $BookedSegments['TicketNumber'];
                    $ClassCodeDesc[] = $BookedSegments['ClassCodeDesc'];
                    $PassengerName[] = $PassengerDetails['FirstName'] . ' ' . $PassengerDetails['LastName'];
                    $PassengerType[] = $PassengerDetails['PassengerType'];
                    $TransmissionControlNo[] = $PassengerDetails['TransmissionControlNo'];
                }
            }
        }

        $payData['uid'] = (isset($data['uid'])) ? $data['uid'] : $this->session->userdata('uid');
        $payData['UserTrackId'] = $data['UserTrackId'];
        $payData['ContactNumber'] = $data['BookOutput']['FlightTicketDetails'][0]['CustomerDetails']['ContactNumber'];
        $payData['TravelType'] = $data['BookOutput']['FlightTicketDetails'][0]['TravelType'];
        $payData['BookingType'] = $data['BookOutput']['FlightTicketDetails'][0]['BookingType'];
        $payData['HermesPNR'] = implode("_", $hermsPnr);
        $payData['TransactionId'] = implode("_", $TransactionId);
        $payData['AirlineDetails'] = json_encode($AirlineDetails);
        $payData['FlightBookingDetails'] = json_encode($bookingDetail['BookInput']['FlightBookingDetails']);
        $payData['TotalAmount'] = $TotalAmount;
        $payData['IssueDatTime'] = $data['BookOutput']['FlightTicketDetails'][0]['IssueDateTime'];
        $payData['BaseOrigin'] = $data['BookOutput']['FlightTicketDetails'][0]['BaseOrigin'];
        $payData['BaseDestination'] = $data['BookOutput']['FlightTicketDetails'][0]['PassengerDetails'][0]['BookedSegments'][0]['Destination'];
        $payData['DepartureDateTime'] = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $data['BookOutput']['FlightTicketDetails'][0]['PassengerDetails'][0]['BookedSegments'][0]['DepartureDateTime'])));
        $payData['Arrivaldatetime'] = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $Arrivaldatetime)));
        $payData['TicketNumber'] = implode(',', $TicketNumber);
        $payData['ClassCodeDesc'] = implode(',', $ClassCodeDesc);
        $payData['PassengerName'] = implode(',', $PassengerName);
        $payData['PassengerType'] = implode(',', $PassengerType);
        $payData['TransmissionControlNo'] = implode(',', $TransmissionControlNo);
        $payData['GrandTotalmarkup'] = (isset($data['grandTotalmarkup'])) ? $data['grandTotalmarkup'] : 0;
        $payData['commission'] = @$data['commission'];
        $payData['created'] = date("Y-m-d H:i:s");
        $payData['status'] = 'Confirm';

        if ($user_details = $this->user_model->saveFlightBooking($payData)) {

            $this->load->model('sendmail_model');
            $tans = $payData['HermesPNR'];
            $userid = $payData['UserTrackId'];
            $msg = "";
            $headers = array('Content-Type: application/html');
            $url = base_url("/index.php/flight/print_ticket1/$tans/$userid");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            if (($result = curl_exec($ch)) === FALSE) {
                die('cURL error: ' . curl_error($ch) . "<br/>\n");
            } else {
                $msg = $result;
            }
            $user = $this->region_model->get_data('users', array('uid' => $payData['uid']));
            $tempEmail = $user[0]['email'];
            $email = ($this->session->userdata('email')) ? $this->session->userdata('email') : $tempEmail;
            $this->sendmail_model->send_ticket_mail("no-reply@kpholidays.com", "KP Holidays", $email, 'KP Holidays Flight Booking', $msg);

            //send sms
            $this->load->library('sms');
            $msg = 'Your Flight ticket booking has been confirmed. Your Transport PNR: ' . $payData['HermesPNR'] . ', Ticket Number: ' . $payData['TicketNumber'] . ', Origin: ' . $payData['BaseOrigin'] . ', Destination: ' . $payData['BaseDestination'] . '. Please Check your email for more details. -KP Holidays.com';
            $mobile = $payData['ContactNumber'];
            $data = $this->sms->sendSms($mobile, $msg);

            return true;
        } else {
            die("some error occured in saveBooking");
        }
    }

    function check_mail() {
        $tans = "B6XKQH";
        $userid = "RMOPL97099949986927983976154050745331072";
        $this->load->model('sendmail_model');
        $msg = file_get_contents(base_url("/index.php/flight/print_ticket1/$tans/$userid"));
        $email = "rahulpal@augurs.in";
        $this->sendmail_model->send_ticket_mail("no-reply@kpholidays.com", "KP Holidays", $email, 'KP Holidays Flight Booking', $msg);
        echo "send mail";
    }

    function check_value() {
        $tans = "B6XKQH";
        $userid = "RMOPL97099949986927983976154050745331072";
        $this->load->model('sendmail_model');
        echo $msg = file_get_contents(base_url("/index.php/flight/print_ticket1/$tans/$userid"));
    }

    function BookingFailed($data) {

        $payData['uid'] = $this->session->userdata('uid');
        $payData['UserTrackId'] = $this->input->post('udf4');
        $payData['ForBooking'] = 'FLIGHT';
        $payData['PyaUID'] = $_POST['mihpayid'];
        $payData['TotalAmount'] = $_POST['amount'];
        $payData['data'] = json_encode($data);
        $user_details = $this->user_model->add_data('booking_failed', $payData);
    }

    function IntsaveBooking($data) {

        $data['LCCBookOutput'] = (isset($data['FSCBookOutput'])) ? $data['FSCBookOutput'] : $data['LCCBookOutput'];
        $bookingDetail = $this->session->userdata('bookingDetail_' . $data['UserTrackId']);
        $bookingDetail['LCCBookInput'] = (isset($bookingDetail['FSCBookInput'])) ? $bookingDetail['FSCBookInput'] : $bookingDetail['LCCBookInput'];

        $payData = array();
        $hermsPnr = array();
        $TransactionId = array();
        $AirlineDetails = array();
        $TotalAmount = 0;
        $Arrivaldatetime = '';
        $TicketNumber = array();
        $ClassCodeDesc = array();
        $PassengerName = array();
        $PassengerType = array();
        $TransmissionControlNo = array();
        $pnrs = $data['LCCBookOutput']['TicketDetails'];
        $hermsPnr[] = $pnrs['HermesPNR'];
        $TransactionId[] = $pnrs['TransactionId'];
        $AirlineDetails[] = $pnrs['AirlineDetails'];
        $TotalAmount = $TotalAmount + $pnrs['TotalAmount'];
        foreach ($pnrs['PassengerDetails'] as $PassengerDetails) {
            foreach ($PassengerDetails['BookedSegments'] as $BookedSegments) {
                $Arrivaldatetime = ($pnrs['BookingType'] == 'R') ? $BookedSegments['DepartureDateTime'] : '';
                $TicketNumber[] = $BookedSegments['TicketNumber'];
                $ClassCodeDesc[] = $BookedSegments['ClassCodeDesc'];
                $PassengerName[] = $PassengerDetails['FirstName'] . ' ' . $PassengerDetails['LastName'];
                $PassengerType[] = $PassengerDetails['PassengerType'];
                $TransmissionControlNo[] = $PassengerDetails['TransmissionControlNo'];
            }
        }


        $payData['uid'] = (isset($data['uid'])) ? $data['uid'] : $this->session->userdata('uid');
        $payData['UserTrackId'] = $data['UserTrackId'];
        $payData['ContactNumber'] = $data['LCCBookOutput']['TicketDetails']['CustomerDetails']['ContactNumber'];
        $payData['TravelType'] = $data['LCCBookOutput']['TicketDetails']['TravelType'];
        $payData['BookingType'] = $data['LCCBookOutput']['TicketDetails']['BookingType'];
        $payData['HermesPNR'] = implode("_", $hermsPnr);
        $payData['TransactionId'] = implode("_", $TransactionId);
        $payData['AirlineDetails'] = json_encode($AirlineDetails);
        $payData['FlightBookingDetails'] = json_encode($bookingDetail['LCCBookInput']['BookingDetails']);
        $payData['TotalAmount'] = $TotalAmount;
        $payData['IssueDatTime'] = $data['LCCBookOutput']['TicketDetails']['IssueDateTime'];
        $payData['BaseOrigin'] = $data['LCCBookOutput']['TicketDetails']['BaseOrigin'];
        $payData['BaseDestination'] = $data['LCCBookOutput']['TicketDetails']['PassengerDetails'][0]['BookedSegments'][0]['Destination'];
        $payData['DepartureDateTime'] = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $data['LCCBookOutput']['TicketDetails']['PassengerDetails'][0]['BookedSegments'][0]['DepartureDateTime'])));
        $payData['Arrivaldatetime'] = date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $Arrivaldatetime)));
        $payData['TicketNumber'] = implode(',', $TicketNumber);
        $payData['ClassCodeDesc'] = implode(',', $ClassCodeDesc);
        $payData['PassengerName'] = implode(',', $PassengerName);
        $payData['PassengerType'] = implode(',', $PassengerType);
        $payData['TransmissionControlNo'] = implode(',', $TransmissionControlNo);
        $payData['GrandTotalmarkup'] = (isset($data['grandTotalmarkup'])) ? $data['grandTotalmarkup'] : 0;
        $payData['status'] = 'Confirm';
        $payData['created'] = date("Y-m-d H:i:s");
        $payData['status'] = 'Confirm';
        $payData['commission'] = @$data['commission'];

        if ($user_details = $this->user_model->saveFlightBooking($payData)) {
            //send mail
            $this->load->model('sendmail_model');
            $tans = $payData['HermesPNR'];
            $userid = $payData['UserTrackId'];
            
            $msg = "";
            $headers = array('Content-Type: application/html');
            $url = base_url("/index.php/flight/print_ticket1/$tans/$userid");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            if (($result = curl_exec($ch)) === FALSE) {
                die('cURL error: ' . curl_error($ch) . "<br/>\n");
            } else {
                $msg = $result;
            }
            $user = $this->region_model->get_data('users', array('uid' => $payData['uid']));
            $tempEmail = $user[0]['email'];
            $email = ($this->session->userdata('email')) ? $this->session->userdata('email') : $tempEmail;
            $this->sendmail_model->send_ticket_mail("no-reply@kpholidays.com", "KP Holidays", $email, 'KP Holidays Flight Booking', $msg);

            //send sms
            $this->load->library('sms');

            $msg = 'Your Flight ticket booking has been confirmed. Your Transport PNR: ' . $payData['HermesPNR'] . ', Ticket Number: ' . $payData['TicketNumber'] . ', Origin: ' . $payData['BaseOrigin'] . ', Destination: ' . $payData['BaseDestination'] . '. Please Check your email for more details. -KP Holidays.com';
            $mobile = $payData['ContactNumber'];
            $data = $this->sms->sendSms($mobile, $msg);

            return true;
        } else {
            $errMess = $this->db->_error_message();
            die("some error occured in saveBooking");
        }
    }

    function user_getGetCancellation($agent = 'false') {

        $responsdata = array();

        if ($this->input->post('action')) {

            if ($this->input->post('TravelType') == 'I') {
                $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
            }


            if ($agent == 'true') {
                $PartialCancelPassengerDetails = json_decode($this->input->post('PartialCancelPassengerDetails'), true);
                $data = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
                        "Password" => $this->Credentials['IntPassword']), 'PartialCancellationInput' => $PartialCancelPassengerDetails);

                // print_r($data);
                $result = $this->CutlPost('GetPartialCancellation', $data);
                echo $result;
                die;
            }
            $responsdata['details'] = $this->session->userdata('canceldata');
            $PartialCancelPassengerDetails = array();
            $tarray = array();

            foreach ($responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CancelPassengerDetails'] as $key => $pasenger) {

                $TPartialCancelTicketDetails = array();
                foreach ($pasenger['CancelTicketDetails'] as $key2 => $CancelTicketDetails) {
                    $PartialCancelTicketDetails = array();
                    if (in_array($CancelTicketDetails['TicketNumber'], $this->input->post('ticketselected'))) {

                        $PartialCancelTicketDetails['TicketNumber'] = $CancelTicketDetails['TicketNumber'];
                        $PartialCancelTicketDetails['SegmentId'] = $CancelTicketDetails['SegmentId'];
                        $PartialCancelTicketDetails['FlightNumber'] = $CancelTicketDetails['FlightNumber'];
                        $PartialCancelTicketDetails['Origin'] = $CancelTicketDetails['Origin'];
                        $PartialCancelTicketDetails['Destination'] = $CancelTicketDetails['Destination'];
                        $TPartialCancelTicketDetails[] = $PartialCancelTicketDetails;
                    }
                }
                if (!empty($TPartialCancelTicketDetails)) {
                    $tarray['PartialCancelTicketDetails'] = $TPartialCancelTicketDetails;
                    $tarray['PaxNumber'] = $pasenger['PaxNumber'];
                    $PartialCancelPassengerDetails['PartialCancelPassengerDetails'][] = $tarray;
                }
            }
            $PartialCancelPassengerDetails['HermesPNR'] = $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR'];
            $PartialCancelPassengerDetails['AirlinePNR'] = $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['AilinePNR'];
            $PartialCancelPassengerDetails['CRSPNR'] = $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CRSPNR'];


            $data = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
                    "Password" => $this->Credentials['IntPassword']), 'PartialCancellationInput' => $PartialCancelPassengerDetails);

            // print_r($data);
            $result = $this->CutlPost('GetPartialCancellation', $data);
            $result = json_decode($result, true);
            if ($result['ResponseStatus']) {
                $payData['uid'] = $this->session->userdata('uid');
                $payData['HermesPNR'] = $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR'];
                $payData['ForTicket'] = 'FLIGHT';
                $payData['AirlinePNR'] = $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['AilinePNR'];
                $this->user_model->add_data('canceled_tickets', $payData);

                $condition = array('HermesPNR' => $responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR']);
                $this->user_model->update_table_data('flight_bookings', $condition);

                //send mail
                $this->load->model('sendmail_model');



                $user = $this->region_model->get_data('users', array('uid' => $payData['uid']));
                $tempEmail = $user[0]['email'];
                $email = ($this->session->userdata('email')) ? $this->session->userdata('email') : $tempEmail;
                unset($payData['uid']);
                $data['msgData'] = $payData;
                $msg = $this->load->view('email/flight_cancel', $data, true);
                $this->sendmail_model->send_ticket_mail("no-reply@kpholidays.com", "KP Holidays", $email, 'KP Holidays Flight Booking Cancel', $msg);

                //send sms
                $this->load->library('sms');

                $condition = array('email' => $this->session->userdata('email'));
                $data = $this->region_model->get_data('users', $condition);

                $msg = 'Your Flight ticket cancel has been confirmed. Your Transport PNR: ' . $payData['HermesPNR'] . ', Airline PNR : ' . $payData['AirlinePNR'] . ' Please Check your email for more details. -KP Holidays.com';
                $mobile = $data['0']['phone'];
                $data = $this->sms->sendSms($mobile, $msg);



                $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> ' . $result['PartialCancellationOutput']['PartialCancellationDetails']['PartialCancellationRemarks'] . '
                            </div>');

                redirect(base_url('/index.php/user/upcoming_airline_booking'), 'refresh');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . '
                            </div>');
            }
        } else {
            if (!$this->input->post('hermspnr')) {
                redirect(base_url('/'), 'refresh');
            }
            if ($this->input->post('TravelType') == 'I') {
                $this->Credentials['apiurl'] = $this->Credentials['Intapiurl'];
            }
            $data = array("Authentication" => array("LoginId" => $this->Credentials['IntLoginId'],
                    "Password" => $this->Credentials['IntPassword']), 'CancellationInput' => array('HermesPNR' => $this->input->post('hermspnr'), 'AirlinePNR' => $this->input->post('AirlinePNR'), 'CancelType' => $this->input->post('CancelType')));
            $result = $this->CutlPost('GetCancellation', $data);
            if ($agent == 'true') {
                echo $result;
                die;
            }
            $result = json_decode($result, true);

            if ($result['ResponseStatus']) {
                if (isset($result['CancellationOutput']['CancellationDetails']['FullCancellationRemarks'])) {

                    /* $data=array("Authentication"=>array("LoginId"=>$this->Credentials['IntLoginId'],
                      "Password"=>$this->Credentials['IntPassword']),'CancellationDetailsInput'=>array('HermesPNR'=>$this->input->post('hermspnr')));
                      $result2=$this->CutlPost('GetCancellationDetails',$data);
                      $result2=json_decode($result2,true);
                      print_r($result2); */

                    $payData['uid'] = $this->session->userdata('uid');
                    $payData['HermesPNR'] = $this->input->post('hermspnr');
                    $payData['ForTicket'] = 'FLIGHT';
                    $payData['AirlinePNR'] = $this->input->post('AirlinePNR');
                    $this->user_model->add_data('canceled_tickets', $payData);
                    $condition = array('HermesPNR' => $this->input->post('hermspnr'));
                    $this->user_model->update_table_data('flight_bookings', $condition);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">
                              <strong>Error!</strong> ' . $result['CancellationOutput']['CancellationDetails']['FullCancellationRemarks'] . '
                            </div>');
                    redirect(base_url('/index.php/user/upcoming_airline_booking'), 'refresh');
                } else {
                    $this->session->set_userdata('canceldata', $result);
                    $responsdata['details'] = $result;
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> ' . $result['FailureRemarks'] . '
                            </div>');
                redirect(base_url('/index.php/user/upcoming_airline_booking'), 'refresh');
            }
        }
        $this->load->view('user/FlightGetCancellation', $responsdata);
    }

    public function print_ticket($tranctionid, $UserTrackId) {
        if (empty($tranctionid)) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);
        $tranctionid = explode("_", $tranctionid);
        $gresult = array();
        foreach ($tranctionid as $tid) {
            $result = $this->GetReprint($tid);

            $gresult[] = json_decode($result, true);
        }
        $dresult = $this->user_model->get_data('flight_bookings', array('UserTrackId' => $UserTrackId));
        $data['GrandTotalmarkup'] = $dresult[0]['GrandTotalmarkup'];
        $data['data'] = $gresult;
        $data['Flight_dietail'] = $Flight_dietail;
        // print_r($gresult);
        if (empty($data['data'])) {
            redirect(base_url('/'), 'refresh');
        }
        $this->load->view('user/print-airline-ticket', $data);
    }

    public function print_ticket1($tranctionid, $UserTrackId) {
        if (empty($tranctionid)) {
            redirect(base_url('/'), 'refresh');
        }
        $Flight_dietail = $this->session->userdata('Flight_' . $UserTrackId);
        $tranctionid = explode("_", $tranctionid);
        $gresult = array();
        foreach ($tranctionid as $tid) {
            $result = $this->GetReprint($tid);

            $gresult[] = json_decode($result, true);
        }
        $dresult = $this->user_model->get_data('flight_bookings', array('UserTrackId' => $UserTrackId));
        $data['GrandTotalmarkup'] = $dresult[0]['GrandTotalmarkup'];
        $data['data'] = $gresult;
        $data['Flight_dietail'] = $Flight_dietail;
        // print_r($gresult);
        if (empty($data['data'])) {
            redirect(base_url('/'), 'refresh');
        }
        $this->load->view('user/print-airline-ticket1', $data);
    }

}

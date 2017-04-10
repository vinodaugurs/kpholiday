<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Hotel extends CI_Controller
{


//Getting the Hotel data list either one way or round trip we used this method flight_list  and after getting the data from cross domain here we r using two page to view the availabile filght one page name is  flights_list for oneWay trip second page for round trip page name is RtripFlight which show round trip details.
//them path \\Augurs11-pc\augurs server\preeti\kpholidays\html\kpholidays-travelo
//cunstructior
    var $Credentials;

    public function __construct()
    {
        parent::__construct();
        $this->Credentials['Pyment'] = false;
        $this->Credentials['checkError'] = false;
        $this->Credentials['live'] = false;


        if ($this->Credentials['live']) {
            //Live
            $this->Credentials['B2BCode'] = 'CR02';
            $this->Credentials['VendorID'] = 'hariom';
            $this->Credentials['VendorCode'] = 'hariom456$';
            $this->Credentials['apiurl'] = "http://202.54.157.78/hotelapiservice/hotelapiws.asmx";
            $this->Credentials['apiurlInterntl'] = "http://202.54.157.78/hotelapiintlservice/hotelws.asmx";
        } else {
            //demo
            $this->Credentials['B2BCode'] = 'CR02';
            $this->Credentials['VendorID'] = 'hariom';
            $this->Credentials['VendorCode'] = 'hariom123$';
            $this->Credentials['apiurl'] = "http://115.248.39.72/hotelapiservice/hotelAPIws.asmx";
            $this->Credentials['apiurlInterntl'] = "http://115.248.39.72/hotelapiIntlservice/hotelws.asmx";
        }
    }

    public function hotel_list($agent = false)

    {
        if ($this->input->post('hotel') == 'search') {
            if ($this->input->post('hotel_mode') == 'International') {
                $this->hotel_list_International($agent);
                return;
            }
            //$this->get_city();die;
            //Singapore, Hongkong, Pattaya, Dubai
            //Orchid
            //P.O.BOX 14042 ,DUBAI,UNITED ARAB EMIRATES -
            $RoomInfo = "";
            $adults = floor($this->input->post('adults') / $this->input->post('rooms'));
            $kids = floor(@($this->input->post('kids') / $this->input->post('rooms')));
            for ($i = 1; $i <= $this->input->post('rooms'); $i++) {
                $RoomInfo .= $i . ',' . $adults . ',' . $kids . ',~0,|';
            }
            $searc_post = array();
            $searc_post['rooms'] = $this->input->post('rooms');
            $searc_post['adults'] = $this->input->post('adults');
            $searc_post['kids'] = $this->input->post('kids');
            $this->session->set_userdata('search_post', $searc_post);

            $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <HotelSearch xmlns="http://tempuri.org/">
      <CityName>' . $this->input->post('city') . '</CityName>
      <CheckIn>' . $this->input->post('checkin') . '</CheckIn>
      <CheckOut>' . $this->input->post('checkout') . '</CheckOut>
      <RoomInfo>' . $RoomInfo . '</RoomInfo>
    </HotelSearch>
  </soap12:Body>
</soap12:Envelope>';
            $responsdata = $this->soapPost('HotelSearch', $xmlRequest);
            $responsdata = $this->xml_to_array($responsdata);
            if ($agent) {
                echo json_encode($responsdata);
                die;
            }
            if (!empty($responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails'])) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] . ' ' . $responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'] . '
                            </div>');
            }

            $result['hotel_data'] = $responsdata;
            $this->load->view('home/hotel_list', $result);
        } else {
            redirect(base_url('/'), 'refresh');
        }
    }


    public function hotel_detailed($Providerid = NULL, $HotelId = NULL)

    {
        if ($Providerid == NULL or $HotelId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $hotel_dietail = $this->session->userdata('Hotel_' . $HotelId);
        if ($hotel_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }

        //fecth hotel details
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <HotelDetails xmlns="http://tempuri.org/">
      <HotelID>' . $HotelId . '</HotelID>
      <ProviderId>' . $Providerid . '</ProviderId>
    </HotelDetails>
  </soap12:Body>
</soap12:Envelope>';

        $responsdata = $this->soapPost('HotelDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (isset($responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails'])) {
            echo $responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'];
            die;
        }
        $result['hoteldetail_data'] = $responsdata['soapBody'];
        $result['ghoteldietail'] = $hotel_dietail;
        $this->load->view('home/hotel_detailed', $result);
    }


    public function hotel_booking($HotelId = NULL, $RoomTypeID = NULL, $RateplanId = NULL)

    {
        if ($HotelId == NULL or $RoomTypeID == NULL or $RateplanId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $RoomTypeID = urldecode($RoomTypeID);
        $RateplanId = urldecode($RateplanId);
        $hotel_dietail = $this->session->userdata('Hotel_' . $HotelId);
        if ($hotel_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }

        $bookingDetail = $this->session->userdata($this->input->post('udf2'));
        if (isset($_POST['status']) and $_POST['status'] == 'success' and isset($_POST['udf2']) and $bookingDetail != '') {
            $this->load->library('PayUMoney');
            if ($this->payumoney->validatePayment()) {

                $RefrenceID = $this->input->post('udf4');
                $payData = array();
                $payData['user_id'] = $this->session->userdata('uid');
                $payData['FORPAYMENT'] = 'DomesticHotel';
                $payData['RefrenceID'] = $RefrenceID;
                $user_details = $this->savePuMoney($payData);
                $this->bookingProcess($_POST['udf1'], $RefrenceID, $bookingDetail, $RoomTypeID);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Danger!</strong> Payemnt information not match.
								</div>');
            }


        } else {
            if (isset($_POST['status']) and $_POST['status'] != 'success') {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $_POST['error'] . ' ' . $_POST['error_Message'] . '
                            </div>');
            }
        }

        if ($this->input->post('booking') == 'confirm') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $postel = $this->input->post('post');
            $mobile = $this->input->post('mobile');

            //custom data
            $CheckInarray = explode("/", $hotel_dietail['CheckIn']);
            $CheckOutarray = explode("/", $hotel_dietail['CheckOut']);
            $CheckIn = strtotime($CheckInarray[2] . '/' . $CheckInarray[1] . '/' . $CheckInarray[0]);
            $CheckOut = strtotime($CheckOutarray[2] . '/' . $CheckOutarray[1] . '/' . $CheckOutarray[0]);
            $datediff = $CheckOut - $CheckIn;
            $nights = floor($datediff / (60 * 60 * 24));
            $room_name = "";
            $room_price = "";
            $room_tax = "";
            $Providerid = $hotel_dietail['Providerid'];
            $Searchid = $hotel_dietail['Searchid'];
            $search_post = $this->session->userdata('search_post');
            $RoomInfo = "";
            $adults = floor($search_post['adults'] / $search_post['rooms']);
            $kids = floor(@($search_post['kids'] / $search_post['rooms']));
            for ($i = 1; $i <= $search_post['rooms']; $i++) {
                $RoomInfo .= $i . ',' . $adults . ',' . $kids . ',~0,|';
            }
            if (array_key_exists(0, $hotel_dietail['RatePlanDetails']['Row'])) {
                foreach ($hotel_dietail['RatePlanDetails']['Row'] as $RatePlan) {
                    if ($RoomTypeID == $RatePlan['RoomTypeID']) {
                        $room_name = $RatePlan['HotelRoomTypeDesc'];
                        $room_price = ($RatePlan['PromotionTotal'] > 0) ? $RatePlan['PromotionTotal'] : $RatePlan['RoomCharges'];
                        $room_tax = $RatePlan['Tax'];
                    }
                }
            } else {
                $room_name = $hotel_dietail['RatePlanDetails']['Row']['HotelRoomTypeDesc'];
                $room_price = ($hotel_dietail['RatePlanDetails']['Row']['PromotionTotal'] > 0) ? $hotel_dietail['RatePlanDetails']['Row']['PromotionTotal'] : $hotel_dietail['RatePlanDetails']['Row']['RoomCharges'];
                $room_tax = $hotel_dietail['RatePlanDetails']['Row']['Tax'];
            }

            //set booking xml
            $grossamount = $room_price + $room_tax;
            $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingTrack xmlns="http://tempuri.org/">
      <ProviderId>' . $Providerid . '</ProviderId>
      <SearchId>' . $Searchid . '</SearchId>
      <HotelId>' . $HotelId . '</HotelId>
      <CheckIn>' . $hotel_dietail['CheckIn'] . '</CheckIn>
      <CheckOut>' . $hotel_dietail['CheckOut'] . '</CheckOut>
      <BookingAmount>' . (($grossamount)) . '</BookingAmount>
      <NoofNights>' . $nights . '</NoofNights>
      <RoomInfo>' . $RoomInfo . '</RoomInfo>
      <RateplanId>' . $RateplanId . '</RateplanId>
      <RoomTypeID>' . $RoomTypeID . '</RoomTypeID>
      <Fname>' . $first_name . '</Fname>
      <Lname>' . $last_name . '</Lname>
      <Address>' . $address . '</Address>
      <City>' . $city . '</City>
      <Country>' . $country . '</Country>
      <PostalCode>' . $postel . '</PostalCode>
      <Mobile>' . $mobile . '</Mobile>
      <Email>' . $email . '</Email>
      <State>' . $state . '</State>
    </BookingTrack>
  </soap12:Body>
</soap12:Envelope>';
            $responsdata = $this->soapPost('BookingTrack', $xmlRequest);
            $responsdata = $this->xml_to_array($responsdata);

            if (isset($responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['BookingTrack']['TrackId'])) {
                $TrackId = $responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['BookingTrack']['TrackId'];
                $ClientTrackId = $TrackId . time();
                $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingConfirmation xmlns="http://tempuri.org/">
      <TrackId>' . $TrackId . '</TrackId>
      <SearchId>' . $Searchid . '</SearchId>
      <HotelId>' . $HotelId . '</HotelId>
      <RateplanId>' . $RateplanId . '</RateplanId>
      <ProviderId>' . $Providerid . '</ProviderId>
      <ClientTrackId>' . $ClientTrackId . '</ClientTrackId>
    </BookingConfirmation>
  </soap12:Body>
</soap12:Envelope>';


                if ($this->Credentials['Pyment']) {
                    $this->session->set_userdata('bookingDetail_' . $TrackId, $xmlRequest);
                    $this->load->library('PayUMoney');
                    $payUmoney = array();
                    $payUmoney['productinfo'] = array(array('name' => "Hotel Booking",
                        'description' => 'Domestic Hotel Booking',
                        'value' => $grossamount,
                        "isRequired" => true));
                    $payUmoney['amount'] = $grossamount;
                    $payUmoney['firstname'] = $this->input->post('first_name');
                    $payUmoney['lastname'] = $this->input->post('last_name');
                    $payUmoney['email'] = $this->input->post('email');
                    $payUmoney['phone'] = $this->input->post('mobile');
                    $payUmoney['surl'] = base_url('/index.php/hotel/hotel_booking/' . $HotelId . '/' . $RoomTypeID . '/' . $RateplanId);
                    $payUmoney['furl'] = base_url('/index.php/hotel/hotel_booking/' . $HotelId . '/' . $RoomTypeID . '/' . $RateplanId);
                    $payUmoney['udf1'] = 'BookingConfirmation';
                    $payUmoney['udf2'] = 'bookingDetail_' . $TrackId;
                    $payUmoney['udf3'] = 'DomesticHotelBooking';
                    $payUmoney['udf4'] = $TrackId;
                    $this->payumoney->setpayUMoney($payUmoney);
                    die;
                }
                $this->bookingProcess('BookingConfirmation', $TrackId, $xmlRequest, $RoomTypeID);
            } else {
                //$UserTrackId=explode('UserTrackId-',$responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg']);
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] . ' ' . $responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'] . '
                            </div>');


            }

        }
        $user_details = $this->user_model->user_uid($this->session->userdata('uid'));
        $result['user_details'] = $user_details[0];
        $result['RoomTypeID'] = $RoomTypeID;
        $result['RateplanId'] = $RateplanId;
        $result['ghoteldietail'] = $hotel_dietail;
        $this->load->view('home/hotel_booking', $result);
    }

    public function bookingProcess($method, $TrackId, $xmlRequest, $RoomTypeID)
    {

        $responsdata = $this->soapPost($method, $xmlRequest);

        $responsdata = $this->xml_to_array($responsdata);
        if (isset($responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['Status']) and $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['Status'] == 0) {
            $this->saveBooking($responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['BookingID'], $xmlRequest, $RoomTypeID);
            redirect(base_url('index.php/hotel/hotel_thankyou/' . $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['BookingID']), 'refresh');
        } else {
            if (isset($_POST['mihpayid']))
                $this->BookingFailed($xmlRequest);

            if ($responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] == 201) {
                $updatebooking = $this->UpdateBookingId($TrackId);
                if (isset($updatebooking['soapBody']['UpdateBookingIdResponse']['UpdateBookingIdResult']['BookingInformation>']['BookingID'])) {
                    $BookingConfirmation = $updatebooking['soapBody']['UpdateBookingIdResponse']['UpdateBookingIdResult']['BookingInformation']['BookingID'];
                    $this->saveBooking($BookingConfirmation, $xmlRequest, $RoomTypeID);
                    redirect(base_url('index.php/hotel/hotel_thankyou/' . $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['BookingID']), 'refresh');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $updatebooking['soapBody']['UpdateBookingIdResponse']['UpdateBookingIdResult']['BookingInformation']['ErrorDetails']['Error']['ErrorCode'] . ' ' . $updatebooking['soapBody']['UpdateBookingIdResponse']['UpdateBookingIdResult']['BookingInformation']['ErrorDetails']['Error']['ErrorMsg'] . '
                            </div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] . ' ' . $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'] . '
                            </div>');
            }
        }
    }


    public function UpdateBookingId($TrackId)
    {

        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <UpdateBookingId xmlns="http://tempuri.org/">
      <TrackId>' . $TrackId . '</TrackId>
    </UpdateBookingId>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('UpdateBookingId', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);
    }

    public function hotel_thankyou($BookingID = NULL)

    {
        if ($BookingID == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingInfo xmlns="http://tempuri.org/">
      <BookingID>' . $BookingID . '</BookingID>
    </BookingInfo>
  </soap12:Body>
</soap12:Envelope>';
        $this->session->set_userdata('hotel_bookingId', $BookingID);
        $responsdata = $this->soapPost('BookingInfo', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (!isset($responsdata['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel'])) {
            print_r($responsdata);
            die;
        }
        $result['BookingInfoResponse'] = $responsdata;
        $this->load->view('home/hotel_thankyou', $result);
    }

    public function BookingDetails($BookingID = NULL, $EmailId = NULL)

    {
        if ($BookingID == NULL and $EmailId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingDetails xmlns="http://tempuri.org/">
      <BookingID>' . $BookingID . '</BookingID>
      <EmailId>' . $EmailId . '</EmailId>
    </BookingDetails>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('BookingDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        print_r($responsdata);
        die;

    }

    public function BookingDetails_Daywise()

    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingDetails_Daywise xmlns="http://tempuri.org/">
      <FromDate>01/01/2016</FromDate>
      <ToDate>01/10/2016</ToDate>
    </BookingDetails_Daywise>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('BookingDetails_Daywise', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        print_r($responsdata);
        die;

    }


    /* public  function hotel_thankyou($BookingID=NULL,$EmailId=NULL)

   {  if($BookingID==NULL and $EmailId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$xmlRequest='<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>'.$this->Credentials['B2BCode'].'</B2BCode>
      <VendorID>'.$this->Credentials['VendorID'].'</VendorID>
      <VendorCode>'.$this->Credentials['VendorCode'].'</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingDetails xmlns="http://tempuri.org/">
      <BookingID>'.$BookingID.'</BookingID>
      <EmailId>'.$EmailId.'</EmailId>
    </BookingDetails>
  </soap12:Body>
</soap12:Envelope>';
			 $responsdata=$this->soapPost('BookingDetails',$xmlRequest);
	    	$responsdata=$this->xml_to_array($responsdata);
				print_r($responsdata);die;

   }*/

    public function TNC_CancelPolicy()
    {

        if ($this->input->post('hoteltype') == 'Domestic') {
            /*<RoomTypeID>'.$this->input->post('providerid').'</RoomTypeID>*/
            $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <TNC_CancelPolicy xmlns="http://tempuri.org/">
      <ProviderId>' . $this->input->post('providerid') . '</ProviderId>
      <HotelID>' . $this->input->post('hotelid') . '</HotelID>
      <CheckIn>' . date("m/d/Y", strtotime($this->input->post('checkin'))) . '</CheckIn>
      <CheckOut>' . date("m/d/Y", strtotime($this->input->post('checkout'))) . '</CheckOut>
      <RatePlanID>' . $this->input->post('rateplanid') . '</RatePlanID>
      <RoomTypeID>' . $this->input->post('roomtypeid') . '</RoomTypeID>
      <RoomInfo>' . $this->input->post('roominfo') . '</RoomInfo>
      <SearchId>' . $this->input->post('searchid') . '</SearchId>
    </TNC_CancelPolicy>
  </soap12:Body>
</soap12:Envelope>';
            $responsdata = $this->soapPost('TNC_CancelPolicy', $xmlRequest);
            $responsdata = $this->xml_to_array($responsdata);
            if (isset($responsdata['soapBody']['TNC_CancelPolicyResponse']['TNC_CancelPolicyResult']['Policies']['CancelPolicy'])) {
                echo $responsdata['soapBody']['TNC_CancelPolicyResponse']['TNC_CancelPolicyResult']['Policies']['CancelPolicy'];
            } else {
                echo 'Hotel Cancel Policy Not available';
            }
        } else {
            $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <GetBookingTrackandCancelPolicy xmlns="http://tempuri.org/">
      <BookingKey>' . $this->input->post('bookingid') . '</BookingKey>
      <RCount>' . $this->input->post('RCount') . '</RCount>
      <RoomsInfo>' . $this->input->post('roominfo') . '</RoomsInfo>
      <SearchID>' . $this->input->post('searchid') . '</SearchID>
    </GetBookingTrackandCancelPolicy>
  </soap12:Body>
</soap12:Envelope>';
            $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
            $responsdata = $this->soapPost('GetBookingTrackandCancelPolicy', $xmlRequest);
            $responsdata = $this->xml_to_array($responsdata);
            if (isset($responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['Policies']['CancelPolicy'])) {
                echo $responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['Policies']['CancelPolicy'];
            } else {
                echo $error = (isset($responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['ErrorDetails']['Error']['@attributes'])) ? $responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorCode'] . ' ' . $responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'] : 'Hotel Cancel Policy Not available';
            }
        }


    }

    public function user_getGetCancellation()
    {
        if ($this->input->post('EmailId') == '' or $this->input->post('BookingID') == '') {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong>Email and BookingId is required</div>');
            redirect(base_url('/index.php/user/upcoming_hotel_booking'), 'refresh');
        }
        if ($this->input->post('HotelType') == 'Domestic') {
            $response = $this->CancelBooking($this->input->post('BookingID'), $this->input->post('EmailId'));
            if (isset($response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'])) {
                $jdata = array();
                $jdata['MTransId'] = $payData['HermesPNR'] = $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'];
                $jdata['CancelAmount'] = $payData['HermesPNR'] = $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['CancelAmount'];
                $jdata['Refund'] = $payData['HermesPNR'] = $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Refund'];
                $jdata['Message'] = $payData['HermesPNR'] = $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Message'];

                $payData['uid'] = $this->session->userdata('uid');
                $payData['HermesPNR'] = $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'];
                $payData['ForTicket'] = 'HOTEL';
                $payData['AirlinePNR'] = $this->input->post('BookingID');
                $payData['CanceledPNRDetails'] = json_encode($jdata);
                $this->user_model->add_data('canceled_tickets', $payData);
                $condition = array('BookingID' => $this->input->post('BookingID'));
                $this->user_model->update_table_data('hotel_bookings', $condition);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> ' . $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Message'] . '
                            </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong>' . $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] . '-' . $response['soapBody']['CancelBookingResponse']['CancelBookingResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'] . '</div>');
            }
        } else {
            $response = $this->HotelBookingCancelRQIntl($this->input->post('BookingID'));
            if (isset($response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['CancelBooking']['CancelDetails']['Cancel']['@attributes']['CancelStatus'])) {

                $payData['uid'] = $this->session->userdata('uid');
                $payData['HermesPNR'] = $this->input->post('BookingID');
                $payData['ForTicket'] = 'HOTEL';
                $payData['AirlinePNR'] = $this->input->post('BookingID');
                //$payData['CanceledPNRDetails']=json_encode($jdata);
                $this->user_model->add_data('canceled_tickets', $payData);
                $condition = array('BookingID' => $this->input->post('BookingID'));
                $this->user_model->update_table_data('hotel_bookings', $condition);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> ' . $response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['CancelBooking']['CancelDetails']['Cancel']['@attributes']['CancelStatus'] . '
                            </div>');
            } else {
                //print_r($response);
                $error = isset($response['soapBody']['soapFault']['soapReason']) ? $response['soapBody']['soapFault']['soapReason'] : 'Unknown error';
                $error = isset($response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['Unknown']['Error']['Code']) ? $response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['Unknown']['Error']['Code'] : $error;

                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong>' . $error . '</div>');
            }
        }


        redirect(base_url('/index.php/user/upcoming_hotel_booking'), 'refresh');
    }

    public function CancelBooking($BookingID = NULL, $EmailId = NULL)

    {

        //$EmailId='khalidhashmi1dfd3@gmail.com';
        if ($BookingID == NULL and $EmailId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <CancelBooking xmlns="http://tempuri.org/">
      <BookingID>' . $BookingID . '</BookingID>
      <EmailId>' . urldecode($EmailId) . '</EmailId>
    </CancelBooking>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('CancelBooking', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);
        print_r($responsdata);
        die;

    }

    public function get_city()
    {


        $term = $this->input->get('term');
        $domestic = $this->input->get('domestic');
        $options = array();
        $result = $this->region_model->getHotelCitys($term, $domestic);

        foreach ($result as $key => $val) {
            if ($domestic == 'true') {
                $options['myData'][] = array(
                    'city' => $val['city'] . ', ' . $val['state'],
                    'state' => $val['city'] . ', ' . $val['state']
                );
            } else {
                $city = "";
                $city .= ($val['city'] != '') ? $val['city'] : '';
                $city .= ($val['state'] != '') ? ', ' . $val['state'] : '';
                $city .= ($val['country'] != '') ? ', ' . $val['country'] : '';
                $options['myData'][] = array(
                    'city' => $city,
                    'state' => $city
                );
            }
        }
        echo json_encode($options);

    }

    public function get_city_save()
    {

        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Body>
    <GetCityDetails xmlns="http://tempuri.org/" />
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('GetCityDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        //print_r($responsdata);die;
        foreach ($responsdata['soapBody']['GetCityDetailsResponse']['GetCityDetailsResult']['CityNames']['City'] as $city) {
            $data = array();
            $ctdata = explode(", ", $city['CityName']);

            $data['city'] = $ctdata[0];
            $data['state'] = (count($ctdata) == 3) ? $ctdata[1] : '';
            $data['country'] = (count($ctdata) == 3) ? $ctdata[2] : $ctdata[1];
            $data['type'] = 'Domestic';
            $data['created'] = date("Y-m-d");
            $this->region_model->insertcityHotels($data);
        }
        die;
    }


    //Internationl Method
    public function get_cityInternational_save()
    {

        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <getAllCities xmlns="http://tempuri.org/" />
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('getAllCities', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        foreach ($responsdata['soapBody']['getAllCitiesResponse']['getAllCitiesResult']['CityNames']['City'] as $city) {
            $data = array();
            $ctdata = explode(", ", $city['CityName']);

            $data['city'] = $ctdata[0];
            $data['state'] = (count($ctdata) == 3) ? $ctdata[1] : '';
            $data['country'] = (count($ctdata) == 3) ? $ctdata[2] : $ctdata[1];
            $data['type'] = 'International';
            $data['created'] = date("Y-m-d");
            $this->region_model->insertcityHotels($data);
        }
        die;
    }

    public function get_cityInternational()
    {

        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <getAllCities xmlns="http://tempuri.org/" />
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('getAllCities', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);

        print_r($responsdata);
    }

    public function hotel_list_International($agent)

    {
        $RoomInfo = "";
        $adults = floor($this->input->post('adults') / $this->input->post('rooms'));
        $kids = floor(@($this->input->post('kids') / $this->input->post('rooms')));
        for ($i = 1; $i <= $this->input->post('rooms'); $i++) {
            $RoomInfo .= $i . ',' . $adults . ',' . $kids . ',~0,|';
        }
        $searc_post = array();
        $searc_post['checkin'] = $this->input->post('checkin');
        $searc_post['checkout'] = $this->input->post('checkout');
        $searc_post['rooms'] = $this->input->post('rooms');
        $searc_post['adults'] = $this->input->post('adults');
        $searc_post['kids'] = $this->input->post('kids');
        $this->session->set_userdata('search_post', $searc_post);
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <SearchHotels xmlns="http://tempuri.org/">
      <DestName>' . $this->input->post('city') . '</DestName>
      <chkIn>' . $this->input->post('checkin') . '</chkIn>
      <chkOut>' . $this->input->post('checkout') . '</chkOut>
      <Rcount>' . $this->input->post('rooms') . '</Rcount>
      <rmInfo>' . $RoomInfo . '</rmInfo>
    </SearchHotels>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('SearchHotels', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if ($agent) {
            echo json_encode($responsdata);
            die;
        }
        if (!empty($responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails'])) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'] . ' ' . $responsdata['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'] . '
                            </div>');
        }
        //print_r($responsdata);
        $result['hotel_data'] = $responsdata;
        $this->load->view('home/hotel_listInternational', $result);

    }

    public function hotel_detailedIntl($Providerid = NULL, $HotelId = NULL)

    {
        if ($Providerid == NULL or $HotelId == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $hotel_dietail = $this->session->userdata('Hotel_' . $HotelId);
        if ($hotel_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }
        //fecth hotel details
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <GetHotelDetails xmlns="http://tempuri.org/">
      <hotelID>' . $HotelId . '</hotelID>
      <providerId>' . $Providerid . '</providerId>
    </GetHotelDetails>
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('GetHotelDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);

        if (!isset($responsdata['soapBody']['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail'])) {
            print_r($responsdata);
            die;
        }
        $result['hoteldetail_data'] = $responsdata['soapBody'];
        $result['ghoteldietail'] = $hotel_dietail;
        $this->load->view('home/hotel_detailedIntl', $result);
    }

    public function hotel_bookingIntl($HotelId = NULL, $Bookingkey = NULL, $TrackId = NULL)

    {
        if ($HotelId == NULL or $Bookingkey == NULL) {
            redirect(base_url('/'), 'refresh');
        }

        $hotel_dietail = $this->session->userdata('Hotel_' . $HotelId);
        if ($hotel_dietail == '') {
            redirect(base_url('/'), 'refresh');
        }


        $bookingDetail = $this->session->userdata($this->input->post('udf2'));
        if (isset($_POST['status']) and $_POST['status'] == 'success' and isset($_POST['udf2']) and $bookingDetail != '') {
            $this->load->library('PayUMoney');
            if ($this->payumoney->validatePayment()) {

                $RefrenceID = $this->input->post('udf4');
                $payData = array();
                $payData['user_id'] = $this->session->userdata('uid');
                $payData['FORPAYMENT'] = 'InternationalHotel';
                $payData['RefrenceID'] = $RefrenceID;
                $user_details = $this->savePuMoney($payData);
                $this->bookingProcessInt($_POST['udf1'], $RefrenceID, $bookingDetail);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
								  <strong>Danger!</strong> Payemnt information not match.
								</div>');
            }


        } else {
            if (isset($_POST['status']) and $_POST['status'] != 'success') {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $_POST['error'] . ' ' . $_POST['error_Message'] . '
                            </div>');
            }
        }

        if ($this->input->post('booking') == 'confirm') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $country = $this->input->post('country');
            $city = $this->input->post('city');
            $state = $this->input->post('state');
            $postel = $this->input->post('post');
            $mobile = $this->input->post('mobile');

            //custom data
            $search_post = $this->session->userdata('search_post');

            $CheckInarray = explode("/", $search_post['checkin']);
            $CheckOutarray = explode("/", $search_post['checkout']);
            $CheckIn = strtotime($CheckInarray[2] . '-' . $CheckInarray[0] . '-' . $CheckInarray[1]);
            $CheckOut = strtotime($CheckOutarray[2] . '-' . $CheckOutarray[0] . '-' . $CheckOutarray[1]);
            $datediff = $CheckOut - $CheckIn;
            $nights = floor($datediff / (60 * 60 * 24));
            $room_name = "";
            $room_price = "";
            $room_tax = "";

            $attributes = (isset($hotel_dietail['@attributes'])) ? $hotel_dietail['@attributes'] : $hotel_dietail;
            $Providerid = $attributes['Providerid'];
            $Searchid = $hotel_dietail['Searchid'];

            $RoomInfo = "";
            $adults = floor($search_post['adults'] / $search_post['rooms']);
            $kids = floor(@($search_post['kids'] / $search_post['rooms']));
            $PaxInfo = "";
            for ($i = 1; $i <= $search_post['rooms']; $i++) {
                $Adults = "";
                for ($j = 1; $j <= $adults; $j++) {
                    $Adults .= $first_name . $j . "," . $last_name . $j . "^";
                    //$Adults.="room".$i.$first_name.$j.",room".$i.$last_name.$j."^";
                }
                $Childs = "^~";
                for ($j = 1; $j <= $kids; $j++) {
                    $Childs .= $first_name . $j . "," . $last_name . $j . "^";
                    //$Childs.="room".$i.$first_name.$j.",room".$i.$last_name.$j."^";
                }
                $RoomInfo .= $i . ',' . $adults . ',' . $kids . ',~0,|';
                $PaxInfo .= rtrim($Adults, "^") . rtrim($Childs, "^") . '|';
            }
            if (array_key_exists(0, $hotel_dietail['RoomTypes']['RoomType'])) {
                foreach ($hotel_dietail['RoomTypes']['RoomType'] as $RatePlan) {
                    if (urldecode($Bookingkey) == $RatePlan['@attributes']['Bookingkey']) {
                        $room_name = $RatePlan['@attributes']['Roomname'];
                        $room_price = ($RatePlan['@attributes']['GIRoomChargesINR']);
                        $room_tax = $RatePlan['@attributes']['TaxesINR'];
                    }
                }
            } else {
                $room_name = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['Roomname'];
                $room_price = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'];
                $room_tax = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'];
            }

            //set booking xml


            $tdata = array();
            $tdata['SearchId'] = $Searchid;
            $tdata['bookingkey'] = urldecode($Bookingkey);
            $tdata['providerId'] = $Providerid;
            $tdata['Hotelid'] = $HotelId;
            $tdata['RCount'] = $search_post['rooms'];
            $tdata['RoomsInfo'] = $RoomInfo;
            $tdata['CheckIn'] = date('m/d/Y', $CheckIn);
            $tdata['CheckOut'] = date('m/d/Y', $CheckOut);
            $tdata['room_price'] = $room_price;
            $tdata['room_tax'] = $room_tax;
            $tdata['first_name'] = $first_name;
            $tdata['last_name'] = $last_name;
            $tdata['address'] = $address;
            $tdata['city'] = $city;
            $tdata['country'] = $country;
            $tdata['postel'] = $postel;
            $tdata['mobile'] = $mobile;
            $tdata['email'] = $email;
            $tdata['Bookingkey'] = urldecode($Bookingkey);
            $tdata['PaxInfo'] = $PaxInfo;


            if ($TrackId != NULL) {
                $tdata['UserTrackID'] = $TrackId;
                $responsdata = $this->HotelBookingIntl($tdata);
            }

            $PrebookIntl = $this->HotelDetailsPrebookIntl($tdata);
            $room_price = $PrebookIntl['soapBody']['HotelDetailsPrebookResponse']['HotelDetailsPrebookResult']['PreBookingDetails']['PreBookingDetail']['RoomChargesINR'];
            $room_tax = $PrebookIntl['soapBody']['HotelDetailsPrebookResponse']['HotelDetailsPrebookResult']['PreBookingDetails']['PreBookingDetail']['RoomChargesINR'];
            //call canel policy
            $cancelpolicy = $this->GetBookingTrackandCancelPolIntl($tdata);
            $GetHotelUserTrack = $this->GetHotelUserTrackIntl($tdata);
            //print_r($GetHotelUserTrack);die;


            if (isset($GetHotelUserTrack['soapBody']['GetHotelUserTrackResponse']['GetHotelUserTrackResult']['HotelTrackDetails']['HotelUserTracks']['UserTrackid'])) {
                $TrackId = $GetHotelUserTrack['soapBody']['GetHotelUserTrackResponse']['GetHotelUserTrackResult']['HotelTrackDetails']['HotelUserTracks']['UserTrackid'];


                $precheck = $this->PriceCheckIntl($TrackId);
                //print_r($precheck);die;
                $newprice = @$precheck['soapBody']['PriceCheckResponse']['PriceCheckResult']['PriceStatusDetails']['PriceDetails']['Detail']['@attributes']['Price'];
                //echo $room_price.'!='.$newprice;
                if (isset($precheck['soapBody']['PriceCheckResponse']['PriceCheckResult']['PriceStatusDetails']['PriceDetails']['Detail']['@attributes']['Price']) and $room_price != $newprice) {
                    $tdata['room_price'] = $newprice;
                    $updateprice = $this->UpdateRevisedPriceIntl($tdata);
                    $tdata['room_tax'] = $updateprice['soapBody']['UpdateRevisedPriceResponse']['UpdateRevisedPriceResult']['UpdatedPriceDetails']['PriceDetails']['Detail']['@attributes']['UpdatedTax'];
                    $tdata['room_price'] = $updateprice['soapBody']['UpdateRevisedPriceResponse']['UpdateRevisedPriceResult']['UpdatedPriceDetails']['PriceDetails']['Detail']['@attributes']['UpdatedPrice'];

                    if (array_key_exists(0, $hotel_dietail['RoomTypes']['RoomType'])) {
                        foreach ($hotel_dietail['RoomTypes']['RoomType'] as $keyrm => $RatePlan) {
                            if (urldecode($Bookingkey) == $RatePlan['@attributes']['Bookingkey']) {
                                $room_name = $RatePlan['@attributes']['Roomname'];
                                $room_price = ($RatePlan['@attributes']['GIRoomChargesINR']);
                                $room_tax = $RatePlan['@attributes']['TaxesINR'];
                                $hotel_dietail['RoomTypes']['RoomType'][$keyrm]['@attributes']['GIRoomChargesINR'] = $room_price;
                                $hotel_dietail['RoomTypes']['RoomType'][$keyrm]['@attributes']['TaxesINR'] = $room_tax;
                                $hotel_dietail = $this->session->set_userdata('Hotel_' . $HotelId, $hotel_dietail);
                            }
                        }
                    } else {
                        $room_name = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['Roomname'];
                        $room_price = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'];
                        $room_tax = $hotel_dietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'];
                        $hotel_dietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'] = $room_price;
                        $hotel_dietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'] = $room_tax;
                        $hotel_dietail = $this->session->set_userdata('Hotel_' . $HotelId, $hotel_dietail);
                    }
                    $this->form_validation->set_message('room_charges', 'Room chareges has been changed.');
                    redirect(base_url('index.php/hotel/hotel_bookingIntl/' . $HotelId . '/' . $Bookingkey . '/' . $TrackId), 'refresh');

                }

                $tdata['UserTrackID'] = $TrackId;
                $responsdata = $this->HotelBookingIntl($tdata);

            } else {
                //$UserTrackId=explode('UserTrackId-',$responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg']);
                //echo $xmlRequest;

                $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $GetHotelUserTrack['soapBody']['GetHotelUserTrackResponse']['GetHotelUserTrackResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorCode'] . ' ' . $GetHotelUserTrack['soapBody']['GetHotelUserTrackResponse']['GetHotelUserTrackResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'] . '
                            </div>');
            }

        }

        $user_details = $this->user_model->user_uid($this->session->userdata('uid'));
        $result['user_details'] = $user_details[0];
        $result['Bookingkey'] = urldecode($Bookingkey);
        $result['ghoteldietail'] = $hotel_dietail;
        $this->load->view('home/hotel_bookingIntl', $result);
    }

    public function GetHotelUserTrackIntl($data)

    {
        if (empty($data)) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
       <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <GetHotelUserTrack xmlns="http://tempuri.org/">
      <ProviderId>' . $data['providerId'] . '</ProviderId>
      <SearchId>' . $data['SearchId'] . '</SearchId>
      <HotelId>' . $data['Hotelid'] . '</HotelId>
      <CheckIn>' . $data['CheckIn'] . '</CheckIn>
      <CheckOut>' . $data['CheckOut'] . '</CheckOut>
      <BookingAmount>' . (($data['room_price'] + $data['room_tax'])) . '</BookingAmount>
      <FName>' . $data['first_name'] . '</FName>
      <LName>' . $data['last_name'] . '</LName>
      <Address>' . $data['address'] . '</Address>
      <City>' . $data['city'] . '</City>
      <Country>' . $data['country'] . '</Country>
      <PostalCode>' . $data['postel'] . '</PostalCode>
      <Mobile>' . $data['mobile'] . '</Mobile>
      <Email>' . $data['email'] . '</Email>
      <Bookingkey>' . $data['Bookingkey'] . '</Bookingkey>
      <PaxInfo>' . $data['PaxInfo'] . '</PaxInfo>
    </GetHotelUserTrack>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('GetHotelUserTrack', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);

    }

    public function hotel_thankyouIntl($BookingID = NULL)

    {
        if ($BookingID == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <getBookingDetails xmlns="http://tempuri.org/">
      <BookingPNR>' . $BookingID . '</BookingPNR>
    </getBookingDetails>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('getBookingDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (!isset($responsdata['soapBody']['getBookingDetailsResponse']['getBookingDetailsResult']['BookingDetails']['BookingDetail']['Hotel']['Status'])) {
            print_r($responsdata);
            die;
        }
        //	print_r($responsdata);
        $result['BookingInfoResponse'] = $responsdata;
        $this->load->view('home/hotel_thankyouIntl', $result);
    }

    public function bookingProcessInt($method, $TrackId, $xmlRequest)
    {
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost($method, $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);

        if (isset($responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['BookingDetails']['BookingDetail']['Hotel']['BookingRefNumber'])) {

            $this->saveBookingInt($responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['BookingDetails']['BookingDetail']['Hotel']['BookingRefNumber'], $xmlRequest);
            redirect(base_url('index.php/hotel/hotel_thankyouIntl/' . $responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['BookingDetails']['BookingDetail']['Hotel']['BookingRefNumber']), 'refresh');
        } else {
            if (isset($_POST['mihpayid']))
                $this->BookingFailed($xmlRequest);
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> ' . $responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorCode'] . ' ' . $responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'] . '
                            </div>');
        }

    }

    function HotelDetailsPrebookIntl($data)
    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <HotelDetailsPrebook xmlns="http://tempuri.org/">
      <SearchId>' . $data['SearchId'] . '</SearchId>
      <bookingkey>' . $data['bookingkey'] . '</bookingkey>
      <providerId>' . $data['providerId'] . '</providerId>
      <Hotelid>' . $data['Hotelid'] . '</Hotelid>
    </HotelDetailsPrebook>
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('HotelDetailsPrebook', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);

    }

    function GetBookingTrackandCancelPolIntl($data, $booking_key = NULL)
    {
        if (!is_array($data) and $booking_key != NULL) {
            $data = urldecode($data);
            $booking_key = urldecode($booking_key);
            $search_post = $this->session->userdata('search_post');
            $hotel_dietail = $this->session->userdata('Hotel_' . $data);
            $Providerid = $hotel_dietail['@attributes']['Providerid'];
            $Searchid = @$hotel_dietail['@attributes']['Searchid'];
            $RCount = $search_post['rooms'];

            $RoomInfo = "";
            $adults = floor($search_post['adults'] / $search_post['rooms']);
            $kids = floor(@($search_post['kids'] / $search_post['rooms']));
            for ($i = 1; $i <= $search_post['rooms']; $i++) {
                $RoomInfo .= $i . ',' . $adults . ',' . $kids . ',~0,|';
            }
            $data = array();
            $data['bookingkey'] = urldecode($booking_key);
            $data['RCount'] = $RCount;
            $data['RoomsInfo'] = $RoomInfo;
            $data['SearchId'] = $Searchid;
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <GetBookingTrackandCancelPolicy xmlns="http://tempuri.org/">
      <BookingKey>' . $data['bookingkey'] . '</BookingKey>
      <RCount>' . $data['RCount'] . '</RCount>
      <RoomsInfo>' . $data['RoomsInfo'] . '</RoomsInfo>
      <SearchID>' . $data['SearchId'] . '</SearchID>
    </GetBookingTrackandCancelPolicy>
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('GetBookingTrackandCancelPolicy', $xmlRequest);
        if ($booking_key != NULL) {
            $responsdata = $this->xml_to_array($responsdata);
            if (isset($responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'])) {
                echo $responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'];
            } elseif (isset($responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['HotelBookingChargesRS']['Response'])) {
                $note = $responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['HotelBookingChargesRS']['Response']['Notes'];
                foreach ($responsdata['soapBody']['GetBookingTrackandCancelPolicyResponse']['GetBookingTrackandCancelPolicyResult']['HotelBookingChargesRS']['Response']['item'] as $item) {
                    $note .= @implode(",", $item);
                }
                echo $note;
            } else {
                print_r($responsdata);
            }
        } else {
            return $responsdata = $this->xml_to_array($responsdata);
        }

    }

    function PriceCheckIntl($UserTrackID)
    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <PriceCheck xmlns="http://tempuri.org/">
      <UserTrackID>' . trim($UserTrackID) . '</UserTrackID>
    </PriceCheck>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('PriceCheck', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);

    }

    function HotelBookingCancelRQIntl($BookingPNR)
    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <HotelBookingCancelRQ xmlns="http://tempuri.org/">
      <BookingPNR>' . $BookingPNR . '</BookingPNR>
    </HotelBookingCancelRQ>
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('HotelBookingCancelRQ', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);


    }

    function UpdateRevisedPriceIntl($data)
    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <UpdateRevisedPrice xmlns="http://tempuri.org/">
      <SearchId>' . $data['SearchId'] . '</SearchId>
      <bookingkey>' . $data['bookingkey'] . '</bookingkey>
      <providerId>' . $data['providerId'] . '</providerId>
      <Hotelid>' . $data['Hotelid'] . '</Hotelid>
      <NewRoomCharges>' . $data['room_price'] . '</NewRoomCharges>
    </UpdateRevisedPrice>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('UpdateRevisedPrice', $xmlRequest);
        return $responsdata = $this->xml_to_array($responsdata);


    }

    function HotelBookingIntl($data)
    {
        $ClientTrackId = $data['UserTrackID'] . time();
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <HotelBooking xmlns="http://tempuri.org/">
      <UserTrackID>' . $data['UserTrackID'] . '</UserTrackID>
      <SearchId>' . $data['SearchId'] . '</SearchId>
      <bookingkey>' . $data['bookingkey'] . '</bookingkey>
      <TotalRequestedPrice>' . ($data['room_price'] + $data['room_tax']) . '</TotalRequestedPrice>
      <providerId>' . $data['providerId'] . '</providerId>
      <ClientTrackID>' . $ClientTrackId . '</ClientTrackID>
    </HotelBooking>
  </soap12:Body>
</soap12:Envelope>';
        $grossamount = $data['room_price'] + $data['room_tax'];
        if ($this->Credentials['Pyment']) {
            $this->session->set_userdata('bookingDetail_' . $data['UserTrackID'], $xmlRequest);
            $this->load->library('PayUMoney');
            $payUmoney = array();
            $payUmoney['productinfo'] = array(array('name' => "Hotel Booking",
                'description' => 'International Hotel Booking',
                'value' => $grossamount,
                "isRequired" => true));
            $payUmoney['amount'] = $grossamount;
            $payUmoney['firstname'] = $this->input->post('first_name');
            $payUmoney['lastname'] = $this->input->post('last_name');
            $payUmoney['email'] = $this->input->post('email');
            $payUmoney['phone'] = $this->input->post('mobile');
            $payUmoney['surl'] = base_url('/index.php/hotel/hotel_bookingIntl/' . $data['Hotelid'] . '/' . $data['bookingkey'] . '/' . $data['UserTrackID']);
            $payUmoney['furl'] = base_url('/index.php/hotel/hotel_bookingIntl/' . $data['Hotelid'] . '/' . $data['bookingkey'] . '/' . $data['UserTrackID']);
            $payUmoney['udf1'] = 'HotelBooking';
            $payUmoney['udf2'] = 'bookingDetail_' . $data['UserTrackID'];
            $payUmoney['udf3'] = 'InternationalHotelBooking';
            $payUmoney['udf4'] = $data['UserTrackID'];
            print_r($payUmoney);
            die;
            $this->payumoney->setpayUMoney($payUmoney);
            die;
        }
        $this->bookingProcessInt('HotelBooking', $data['UserTrackID'], $xmlRequest);
        // $responsdata=$this->soapPost('HotelBooking',$xmlRequest);
        //  return $responsdata=$this->xml_to_array($responsdata);


    }

    function Hotel_testInternational()
    {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <TestHeader xmlns="http://tempuri.org/" />
  </soap12:Body>
</soap12:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('Test', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        print_r($responsdata);
    }

    function CutlPost($url, $postdata)
    {

        $booking = json_encode($postdata);
        //print_r($bookingDetail);die;

        $headers = array('Content-Type: application/json');

        // Build the cURL session

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $booking);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);


        // Send the request and check the response

        if (($result = curl_exec($ch)) === FALSE) {

            die('cURL error: ' . curl_error($ch) . "<br/>\n");

        } else {

            return $result;

        }

        curl_close($ch);

    }


    public function soapPost($action, $xml)
    {
        //$url = "http://202.54.157.78/hotelapiservice/hotelapiws.asmx";
        $url = $this->Credentials['apiurl'];
        $action = "http://tempuri.org/$action";
        //echo $xml;
        $headers = array(
            'Content-Type: text/xml; charset=utf-8', 'Accepts: text/xml; charset=utf-8',
            'Content-Length: ' . strlen($xml),
            'SOAPAction: ' . $action
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // Send the request and check the response
        if (($result = curl_exec($ch)) === FALSE) {
            die('cURL error: ' . curl_error($ch) . "<br />\n");
        } else {
            return $result;
            //$result=$this->xml_to_array($result);
            //print_r($result);

        }
        curl_close($ch);
        // Handle the response from a successful request
        $xmlobj = simplexml_load_string($result);
        var_dump($xmlobj);
        //print_r(var_dump);

    }


    public function xml_to_array($xml)
    {
        $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
        $deXml = simplexml_load_string(trim($xml));
        $deJson = json_encode($deXml);
        $xml_array = json_decode($deJson, TRUE);
        if (!empty($main_heading)) {
            $returned = $xml_array[$main_heading];
            return $returned;
        } else {
            return $xml_array;
        }
    }


    function savePuMoney($payData)
    {
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

    function saveBooking($BookingID, $Request, $RoomTypeID)
    {
        $Request = $this->xml_to_array($Request);
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingInfo xmlns="http://tempuri.org/">
      <BookingID>' . $BookingID . '</BookingID>
    </BookingInfo>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('BookingInfo', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        //print_r($responsdata);
        if (!isset($responsdata['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel'])) {
            print_r($responsdata);
            die;
        }

        $payData = array();

        $booking_details = $responsdata['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel'];
        $payData['uid'] = $this->session->userdata('uid');
        $payData['HotelType'] = 'Domestic';
        $payData['BookingID'] = $BookingID;
        $payData['MobileNumber'] = $booking_details['MobileNumber'];
        $payData['TrackID'] = $booking_details['TrackID'];
        $payData['SearchId'] = $Request['soap12Body']['BookingConfirmation']['SearchId'];
        $payData['HotelId'] = $Request['soap12Body']['BookingConfirmation']['HotelId'];
        $payData['RateplanId'] = $Request['soap12Body']['BookingConfirmation']['RateplanId'];
        $payData['ProviderId'] = $Request['soap12Body']['BookingConfirmation']['ProviderId'];
        $payData['ClientTrackId'] = $Request['soap12Body']['BookingConfirmation']['ClientTrackId'];
        $payData['RoomTypeID'] = $RoomTypeID;
        $payData['CheckIn'] = date("Y-m-d", strtotime($booking_details['CheckIn']));
        $payData['CheckOut'] = date("Y-m-d", strtotime($booking_details['CheckOut']));
        $payData['RoomInfo'] = $booking_details['RoomInfo'];
        $payData['HotelName'] = $booking_details['HotelName'];
        $payData['ImageURL'] = $booking_details['ImageURL'];
        $payData['address1'] = $booking_details['address1'];
        $payData['Starlevel'] = $booking_details['Starlevel'];
        $payData['RoomType'] = $booking_details['RoomType'];
        $payData['RCount'] = $booking_details['RCount'];
        $payData['Telephone'] = $booking_details['Telephone'];
        $payData['NoOfNight'] = $booking_details['NoOfNight'];
        $payData['Date'] = $booking_details['Date'];
        $payData['BookingAmount'] = $booking_details['BookingAmount'];
        $payData['CheckInTime'] = $booking_details['CheckInTime'];
        $payData['CheckOutTime'] = $booking_details['CheckOutTime'];
        $payData['Status'] = $booking_details['Status'];
        $payData['created'] = date("Y-m-d H:i:s");
        if ($user_details = $this->user_model->saveHotelBooking($payData)) {
            return true;
        } else {
            die("some error occured in saveBooking");
        }
    }

    function BookingFailed($data)
    {

        $payData['uid'] = $this->session->userdata('uid');
        $payData['UserTrackId'] = $this->input->post('udf4');
        $payData['ForBooking'] = 'Hotel';
        $payData['PyaUID'] = $_POST['mihpayid'];
        $payData['TotalAmount'] = $_POST['amount'];
        $payData['data'] = json_encode($data);
        $user_details = $this->user_model->add_data('booking_failed', $payData);

    }

    function saveBookingInt($BookingID, $Request)
    {
        $Request = $this->xml_to_array($Request);

        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <getBookingDetails xmlns="http://tempuri.org/">
      <BookingPNR>' . $BookingID . '</BookingPNR>
    </getBookingDetails>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('getBookingDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (!isset($responsdata['soapBody']['getBookingDetailsResponse']['getBookingDetailsResult']['BookingDetails']['BookingDetail']['Hotel'])) {
            print_r($responsdata);
            die;
        }

        $payData = array();
        //print_r($responsdata);
        $booking_details = $responsdata['soapBody']['getBookingDetailsResponse']['getBookingDetailsResult']['BookingDetails']['BookingDetail']['Hotel'];
        $payData['uid'] = $this->session->userdata('uid');
        $payData['HotelType'] = 'International';
        $payData['BookingID'] = $BookingID;
        $payData['MobileNumber'] = $booking_details['GuestMobileNumber'];
        $payData['TrackID'] = $booking_details['UserTrackID'];

        $payData['SearchId'] = $Request['soap12Body']['HotelBooking']['SearchId'];
        //$payData['HotelId']=$Request['soap12Body']['HotelBooking']['HotelId'];
        //$payData['RateplanId']=$Request['soap12Body']['HotelBooking']['RateplanId'];
        $payData['ProviderId'] = $Request['soap12Body']['HotelBooking']['providerId'];
        $payData['ClientTrackId'] = $Request['soap12Body']['HotelBooking']['ClientTrackID'];

        $payData['CheckIn'] = date("Y-m-d", strtotime(str_replace("/", "-", $booking_details['CheckIn'])));
        $payData['CheckOut'] = date("Y-m-d", strtotime(str_replace("/", "-", $booking_details['CheckOut'])));
        $payData['RoomInfo'] = $booking_details['RoomInfo'];
        $payData['HotelName'] = $booking_details['HotelName'];
        $payData['ImageURL'] = $booking_details['ImageURL'];
        $payData['address1'] = $booking_details['address'];
        $payData['Starlevel'] = json_encode($booking_details['Starlevel']);
        $payData['RoomType'] = $booking_details['RoomType'];
        $payData['RCount'] = $booking_details['RCount'];
        $payData['Telephone'] = $booking_details['Telephone'];
        $payData['NoOfNight'] = $booking_details['NoOfNight'];
        $payData['Date'] = $booking_details['Date'];
        $payData['BookingAmount'] = $booking_details['TotalPriceINR'];
        $payData['CheckInTime'] = '';
        $payData['CheckOutTime'] = '';
        $payData['Status'] = $booking_details['Status'];
        $payData['created'] = date("Y-m-d H:i:s");
        //print_r($payData);
        if ($user_details = $this->user_model->saveHotelBooking($payData)) {
            return true;
        } else {
            die("some error occured in saveBooking");
        }
    }


    public function print_dom_ticket($BookingID = null)
    {
        if ($BookingID == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorID>' . $this->Credentials['VendorID'] . '</VendorID>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <BookingInfo xmlns="http://tempuri.org/">
      <BookingID>' . $BookingID . '</BookingID>
    </BookingInfo>
  </soap12:Body>
</soap12:Envelope>';
        $responsdata = $this->soapPost('BookingInfo', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (!isset($responsdata['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel'])) {
            print_r($responsdata);
            die;
        }
        $result['BookingInfoResponse'] = $responsdata;
        $this->load->view('user/print-hotel-ticket', $result);


    }


    public function print_Intl_ticket($BookingID = NULL)
    {
        if ($BookingID == NULL) {
            redirect(base_url('/'), 'refresh');
        }
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>' . $this->Credentials['B2BCode'] . '</B2BCode>
      <VendorId>' . $this->Credentials['VendorID'] . '</VendorId>
      <VendorCode>' . $this->Credentials['VendorCode'] . '</VendorCode>
    </AuthHeader>
  </soap:Header>
  <soap:Body>
    <getBookingDetails xmlns="http://tempuri.org/">
      <BookingPNR>' . $BookingID . '</BookingPNR>
    </getBookingDetails>
  </soap:Body>
</soap:Envelope>';
        $this->Credentials['apiurl'] = $this->Credentials['apiurlInterntl'];
        $responsdata = $this->soapPost('getBookingDetails', $xmlRequest);
        $responsdata = $this->xml_to_array($responsdata);
        if (!isset($responsdata['soapBody']['getBookingDetailsResponse']['getBookingDetailsResult']['BookingDetails']['BookingDetail']['Hotel']['Status'])) {
            print_r($responsdata);
            die;
        }
        //	print_r($responsdata);
        $result['BookingInfoResponse'] = $responsdata;
        $this->load->view('user/print_hotel_intl', $result);
    }

}




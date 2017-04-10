<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent1 extends CI_Controller{

  var $Credentials;
   public function __construct()
   {
		parent::__construct();
		
		$this->load->model('agent_model');
		
		/*$this->Credentials['Pyment'] =false;
		$this->Credentials['checkError']=false;
		$this->Credentials['live']=false;
		
		
		if($this->Credentials['live']){
			//Live
			$this->Credentials['B2BCode'] ='CR02';
			$this->Credentials['VendorID'] ='hariom';
			$this->Credentials['VendorCode']='hariom456$';
			$this->Credentials['apiurl']="http://202.54.157.78/hotelapiservice/hotelapiws.asmx";
			$this->Credentials['apiurlInterntl']="http://202.54.157.78/hotelapiintlservice/hotelws.asmx";
		}else{
			//demo
			 $this->Credentials['B2BCode'] ='CR02';
  			 $this->Credentials['VendorID'] ='hariom';
  			 $this->Credentials['VendorCode']='hariom123$';
  			 $this->Credentials['apiurl']="http://115.248.39.72/hotelapiservice/hotelAPIws.asmx";
  			 $this->Credentials['apiurlInterntl']="http://115.248.39.72/hotelapiIntlservice/hotelws.asmx";
		}*/
   }

   public function walletSearch($limit=0){
   	if(isset($_POST['submit'])){
   		$from = $this->input->post('fromDate');
   		$from=explode('/',$from);
		$from=$from[0].'-'.$from[1].'-'.$from[2]. ' 00:00:00';

   		$to = $this->input->post('toDate');
   		$to=explode('/',$to);
		$to=$to[0].'-'.$to[1].'-'.$to[2]. ' 23:59:00';

		$conditons=array();
		$conditons['created >=']=str_replace("/","-",$from);
		$conditons['created <']=str_replace("/","-",$to);



		$offset=10;
        
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
        $config['base_url'] = base_url('index.php/agent1/walletSearch');
        $config['total_rows'] = $this->user_model->get_total_record('dmr_transaction', $conditons);
        $config['per_page'] = $offset; 
        $this->pagination->initialize($config); 
      


      $data['result'] = $this->agent_model->table_pagnination_condition('dmr_transaction', $conditons, $limit, $offset);
      echo $this->db->last_query();


		$this->load->view('agent/wallet', $data);

   	}
   }

	public function index(){
		$this->load->view('agent/index');
	}
	

	//login function
	public function login(){
	
    $username= $this->input->post('userName');
    $pass= $this->input->post('userPassword');
	


     $encode = hash('md5',$pass);
	 $result = $this->agent_model->get([      
                         'email' => $username,
						 'type'=>'agent',
                         'password' =>  $encode 
						 
        				]);
  
	   if(!empty($result)){   

	        
	       	$agentData = $result[0];
	       	$agentData['auid'] = $agentData['uid'];
	       	$agentData['aid'] = $agentData['id'];
    		$agentData['auser_level'] = $agentData['user_level'];
    		$agentData['aservice_type'] = $agentData['service_type']; 
    		$agentData['auser_name'] = $agentData['user_name']; 
	    	$agentData['afirst_name'] = $agentData['first_name'];
    		$agentData['alast_name'] = $agentData['last_name'];
    		$agentData['apassword'] = $agentData['password'];
    		$agentData['aemail'] = $agentData['email'];
    		$agentData['atype'] = $agentData['type'];
    		$agentData['aphone'] = $agentData['phone'];
    		$agentData['acountry'] = $agentData['country'];
    		$agentData['aPinCode'] = $agentData['PinCode'];
    		$agentData['astate'] = $agentData['state'];
    		$agentData['aBALANCE'] = $agentData['BALANCE'];
    		$agentData['acity'] = $agentData['city'];
		    $agentData['aaddress'] = $agentData['address'];  
    		$agentData['astatus'] = $agentData['status'];
        	$agentData['aactive'] = $agentData['active'];
    		$agentData['areset'] = $agentData['reset']; 
    		$agentData['aonline'] = $agentData['online'];
    		$agentData['aactivecode'] = $agentData['activecode'];
    		$agentData['adate'] = $agentData['date'];   	
	       	$this->session->set_userdata($agentData);
		    redirect('agent/index');
			// redirect('dashboard/index');
	       
	       
	      
	    }else{    
	             echo "<script>alert('Invalid Login tyr again');document.location='http://agent.kpholidays.com/index.php';</script>";    
	    } 

	}

	public function logout()
	{
	    $this->session->unset_userdata('auid');
        $this->session->unset_userdata('uid');
		redirect('http://agent.kpholidays.com/index.php');
	}

	//agent sign up function

	public function signUp(){
		if(isset($_POST['submit'])){

			$allData = array();
			$allData['name'] = $this->input->post('travelagent');
			$allData['agencyType'] = $this->input->post('agency_type');
			$allData['contact_person'] = $this->input->post('contact_person');
			$allData['email'] = $this->input->post('email_address');
			$allData['telephone'] = $this->input->post('tel_phone');
			$allData['mobile'] = $this->input->post('mobile_number');
			$allData['address'] = $this->input->post('address');
			$allData['city'] = $this->input->post('city');
			$allData['state'] = $this->input->post('state');
			$allData['remarks'] = $this->input->post('remark');
			$allData['created'] = date("Y-m-d");

/*			$allData = array($travelagent,$email_address,$contact_person,$email_address,$tel_phone,$mobile_number,$address,$city,$state,$remark);*/

			$result = $this->agent_model->insertAgent($allData);
			if($result){
				echo "<script>alert('Your request can be send');document.location='http://agent.kpholidays.com/index.php';</script>";

			}else{
				echo "<script>alert('Your request can't be send');document.location='http://agent.kpholidays.com/index.php';</script>";
			}
/*INSERT INTO agent_request(`name`, `agencyType`, `contact_person`, `email`, `telephone`, `mobile`, `address`, `city`, `state`, `remarks`, `created`)
*/

//			print_r($allData);

		}
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

//forget password start
    public function forget(){
    	header("Access-Control-Allow-Origin: http://agent.kpholidays.com");
	  	$email = $this->input->post('email');
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('email', 'Email address', 'required|valid_email'); 
	     

	    if ($this->form_validation->run() == FALSE)
			{
				 
				 $state['error']=1;
		   		 $state['msg']=strip_tags(validation_errors());
				 echo json_encode($state);die;
			} 	
	  	

	  	$data = $this->agent_model->forget($email);
	  	// echo json_encode($data);
			if(empty($data)){

				$state['msg']= 'Email adderess not present in database';
				echo json_encode($state);		
			}else{

				$randomUrl = $this->randomPassword();
				// print_r($data);
				$this->agent_model->forget_activeRecord($randomUrl, $data[0]['uid']);
				
				//send mail
				$url = 'http://agent.kpholidays.com/forget-password.php?&random='.$randomUrl.'&uid='.$data[0]['uid'];

				$state['msg']= urldecode($url);
				echo json_encode($state);

			}
	  	
    }

 /*   public function forget_url_link($activeRecord, $uid){
    	$condition = $this->agent_model->check_active_record($activeRecord);
    	if(empty($condition)){
    		redirect('/');
    	}
    	$data = array('uid'=>$uid);
    	$this->load->view('agent/forget-password',$data);

    }*/

  public function password_change($activeRecord, $uid){
    	$condition = $this->agent_model->check_active_record($activeRecord);
    	if(empty($condition)){
    		echo "<script>alert('Already Use this code');document.location='http://agent.kpholidays.com/index.php';</script>";
    		// redirect('/');
    	}

  	if(isset($_POST['submit'])){
  		$password = hash('md5', $this->input->post('password')); 

  		$this->agent_model->passwordChange($uid, $password);
  		redirect('http://agent.kpholidays.com/index.php');

  	}
  }
//forget password end


public function flight_list(){
	$this->load->view('agent/flights_list');
}
public function bus_list(){
	$data=array();
	if($this->input->post('bus')=='search'){
		 if($this->input->post('Origin')=='' or $this->input->post('Destination')=='' or $this->input->post('bus_departureDate')==''){
		 	 $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> Please select Origin and Destination</div>');
								  $this->load->view('agent/bus_list');
								  return false;
		 }
		 
		 $origin=$this->region_model->getCitysBus($this->input->post('Origin'));
		if(empty($origin)){
			//msg orgin is not correct
			 $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> No Origin Found</div>');
								  $this->load->view('agent/bus_list');
								  return false;
		}
		$searc_post=array();
		 $searc_post['way']=$this->input->post('way');
		 $searc_post['Origin']=$this->input->post('Origin');
		 $searc_post['Destination']=$this->input->post('Destination');
		 $searc_post['bus_returnDate']=$this->input->post('bus_returnDate');
		 $searc_post['bus_departureDate']=$this->input->post('bus_departureDate');
		 $searc_post['bus_destination_code']=$this->input->post('bus_destination_code');
		 $searc_post['OriginId']=$origin[0]['OriginId'];
		 $searc_post['Seats']=$this->input->post('Seats');
		 
		 $this->session->set_userdata('search_post', $searc_post);	
		 
		$postdata = http_build_query(
			array(
				'bus' => 'search',
				'way' => $this->input->post('way'),
				'Origin' => $this->input->post('Origin'),
				'Destination' => $this->input->post('Destination'),
				'bus_returnDate' => $this->input->post('bus_returnDate'),
				'bus_departureDate' => $this->input->post('bus_departureDate'),
				'bus_destination_code' => $this->input->post('bus_destination_code'),
				'OriginId' => $this->input->post('OriginId'),
				'Seats' => $this->input->post('Seats'),
			)
		);
		
					$opts = array('http' =>
				array(
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => $postdata
				)
			);
			
			$context  = stream_context_create($opts);
			
			$result = file_get_contents(base_url('/index.php/bus/bus_list/true'), false, $context);		
			$result=json_decode($result,true);
		//print_r($result);	  
		$data['Buses']=$result['Buses'];
		
		 
	  
	   }
	$this->load->view('agent/bus_list',$data);
}
public function hotel_list(){
	$this->load->view('agent/hotel-list');
}


public  function hotel_detailed()
	{ 
    /*if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}*/
		// $hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		/*if($hotel_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
		
		//fecth hotel details
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
    <HotelDetails xmlns="http://tempuri.org/">
      <HotelID>'.$HotelId.'</HotelID>
      <ProviderId>'.$Providerid.'</ProviderId>
    </HotelDetails>
  </soap12:Body>
</soap12:Envelope>';

		  $responsdata=$this->soapPost('HotelDetails',$xmlRequest);
	    $responsdata=$this->xml_to_array($responsdata);	
	    /*if(isset($responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails'])){
			echo $responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'];die;
		// }*/
		// $result['hoteldetail_data']=$responsdata['soapBody'];	
		// $result['ghoteldietail']=$hotel_dietail;
	   $this->load->view('agent/hotel_detailed'); 
	}




 /* function CutlPost($url,$postdata){
	  
	  $booking=json_encode($postdata);
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

		  if (($result = curl_exec($ch)) === FALSE)

			  {

			   die('cURL error: '.curl_error($ch)."<br/>\n");

			  } 

		 

		 else {		          	 

				return $result;				

			  }				

			  curl_close($ch);
	  
  }*/
  
  
/*  public function soapPost($action,$xml){
	   //$url = "http://202.54.157.78/hotelapiservice/hotelapiws.asmx";
	   $url=$this->Credentials['apiurl'];
	   $action = "http://tempuri.org/$action";
	   //echo $xml;
	   $headers = array(
						 'Content-Type: text/xml; charset=utf-8', 'Accepts: text/xml; charset=utf-8',
						 'Content-Length: '.strlen($xml),
						 'SOAPAction: '.$action
						 );
				$ch = curl_init();
				 curl_setopt($ch, CURLOPT_URL, $url);
				 curl_setopt($ch, CURLOPT_POST, TRUE);
				 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				 curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
				 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				 // Send the request and check the response
				if (($result = curl_exec($ch)) === FALSE) {
				 die('cURL error: '.curl_error($ch)."<br />\n");
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

  }*/
  
  
  /*
  public function xml_to_array($xml) {
	  $xml = preg_replace("/(<\/?)(\w+):([^>]*>)/","$1$2$3", $xml);
    $deXml = simplexml_load_string(trim($xml));
    $deJson = json_encode($deXml);
    $xml_array = json_decode($deJson,TRUE);	
    if (! empty($main_heading)) {
        $returned = $xml_array[$main_heading];
        return $returned;
    } else {
        return $xml_array;
    }
  }*/

  public  function hotel_detailedIntl($Providerid=NULL,$HotelId=NULL)
   { 
    /*if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
		//fecth hotel details
		$xmlRequest='<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <AuthHeader xmlns="http://tempuri.org/">
      <B2BCode>'.$this->Credentials['B2BCode'].'</B2BCode>
      <VendorId>'.$this->Credentials['VendorID'].'</VendorId>
      <VendorCode>'.$this->Credentials['VendorCode'].'</VendorCode>
    </AuthHeader>
  </soap12:Header>
  <soap12:Body>
    <GetHotelDetails xmlns="http://tempuri.org/">
      <hotelID>'.$HotelId.'</hotelID>
      <providerId>'.$Providerid.'</providerId>
    </GetHotelDetails>
  </soap12:Body>
</soap12:Envelope>';
		  $this->Credentials['apiurl']=$this->Credentials['apiurlInterntl'];
		  $responsdata=$this->soapPost('GetHotelDetails',$xmlRequest);
	    $responsdata=$this->xml_to_array($responsdata);	
		
	    if(!isset($responsdata['soapBody']['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail'])){
			print_r($responsdata);die;
		}
		$result['hoteldetail_data']=$responsdata['soapBody'];	
		$result['ghoteldietail']=$hotel_dietail;	*/
	   $this->load->view('agent/hotel_detailedIntl'); 
   }

   public  function GetSeatMap($ScheduleId=NULL,$UserTrackId=NULL)
   {
	   if($ScheduleId==NULL or $UserTrackId==NULL){
	   	redirect(base_url('/index.php/agent/bus_list'), 'refresh');
   		}
		$bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);
		if($bus_dietail==''){
	   	redirect(base_url('/index.php/agent/bus_list'), 'refresh');
   		}
		
		$searc_post=$this->session->userdata('search_post');	
		//print_r($bus_dietail);die;
	   $postdata = http_build_query(
			array(
				'StationId' => $bus_dietail['StationId'],
				'TransportId' => $bus_dietail['TransportId'],
				'bus_departureDate' =>$searc_post['bus_departureDate']
			)
		);
		
					$opts = array('http' =>
				array(
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => $postdata
				)
			);
			
			$context  = stream_context_create($opts);
		$result = file_get_contents(base_url("/index.php/bus/GetSeatMapAgent/$ScheduleId/$UserTrackId"),false,$context);	 
		$result=json_decode($result,true);		
		if(!$result['ResponseStatus']){
			redirect(base_url('/index.php/agent/BusBooking/'.$ScheduleId), 'refresh');}
		$data['bus_dietail']=$bus_dietail;
		$data['bus_seat_map']=$result;	  
	   $this->load->view('agent/bus_detailed',$data); 
	  
   }

	




    public function hotel_ticket_history($offset=0){
		
		$this->input->get('from-date'); 
		$url=$_SERVER['QUERY_STRING'];
		$urlData = explode('&per_page=',$url); 
//		$urlData = ltrim($url, "/index.php/agent/airline_ticket_history");
	  // $url=$_SERVER['QUERY_STRING'];
		//$totalsegment=count(explode("&",$url));
		$this->load->library('pagination');
    	$uid = $this->session->userdata('auid');
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
		$config['page_query_string'] = TRUE;
		$config['num_tag_close'] = '</li>';
		if(!empty($urlData)){
			$config['base_url'] = base_url('index.php/agent/hotel_ticket_history?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/hotel_ticket_history');}
		$data=array();
    	if(isset($_GET['submit'])){
			
			$airline_type = $this->input->get('hotel-type');
			
			$from = $this->input->get('from-date');
			$from=explode('/',$from);
			$from=$from[2].'-'.$from[0].'-'.$from[1]. ' 00:00:00';	
			$to = $this->input->get('to-date');		
			$to=explode('/',$to);
			$to=$to[2].'-'.$to[0].'-'.$to[1]. ' 23:59:59';
			$filerKey = array();
			$filerValue = array();
			
			$conditons=array();
			$conditons['created >=']=str_replace("/","-",$from);
			$conditons['created <']=str_replace("/","-",$to);
			
			
			if($this->input->get('hotel_mode_booked')=="Booking Cancel"){
				unset($conditons['created >=']);
				unset($conditons['created <']);
				$conditons['canceled_tickets.created >=']=str_replace("/","-",$from);
			    $conditons['canceled_tickets.created <']=str_replace("/","-",$to);
				$conditons['canceled_tickets.uid']=$uid;
				if($this->input->get('filter2')!=""){
					$filter2 = $this->input->get('filter2');
					$filterResult2 = $this->input->get('filter2Result');
					$conditons[$filter2]=$filterResult2;
				}
				if($this->input->get('filter1')!=""){
					$filter1 = $this->input->get('filter1');
					$filterResult1 = $this->input->get('filter1Result');
					$conditons[$filter1]=$filterResult1;
				}
				$conditons['HotelType']=$airline_type;

				$this->db->select('count(*) as cnt');
				// $conditons['flight_bookings.HermesPNR']='canceled_tickets.HermesPNR';
				$this->db->join('hotel_bookings', 'hotel_bookings.BookingID=canceled_tickets.HermesPNR');
				$this->db->order_by("canceled_tickets.created", "desc"); 				
				$query = $this->db->get_where('canceled_tickets', $conditons);
				
				$countResult=$query->result_array();
				echo $this->db->last_query();
				

				$pageData=5;
		             
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 

		        $this->pagination->initialize($config); 
	
		     	 $this->db->select('hotel_bookings.*');
				$this->db->join('hotel_bookings', 'hotel_bookings.BookingID=canceled_tickets.HermesPNR');	
				$this->db->order_by("canceled_tickets.created", "desc"); 			
				$query = $this->db->get_where('canceled_tickets', $conditons, $pageData, $offset);
				$result=$query->result_array();

				$data['result']=$result;
			}else{
				 $this->input->get('filter2');
				$conditons['uid']=$uid;
				if($this->input->get('filter2')!=""){
					$filter2 = $this->input->get('filter2');
					$filterResult2 = $this->input->get('filter2Result');
					$conditons[$filter2]=$filterResult2;
				}
				if($this->input->get('filter1')!=""){
					$filter1 = $this->input->get('filter1');
					$filterResult1 = $this->input->get('filter1Result');
					$conditons[$filter1]=$filterResult1;
				}
				$conditons['HotelType']=$airline_type;

				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('hotel_bookings',$conditons);
				$countResult=$query->result_array();
				
				echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('hotel_bookings',$conditons,$pageData, $offset);
				$result=$query->result_array();
				$data['result']=$result;
				echo $this->db->last_query();
				
			}

			

		
				
		}else{
			
			$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('hotel_bookings',array('uid'=>$uid));
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);	
				$this->db->order_by("created", "desc");  				
				$query = $this->db->get_where('hotel_bookings',array('uid'=>$uid),$pageData,$offset);				
				$result=$query->result_array();
				echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/hotel-ticket-history',$data);
	}


    public function airline_ticket_history()
    {
    	$uid = $this->session->userdata('auid');
    	if(isset($_POST['submit'])){
			$airline_type = $this->input->post('airline-type');
			$from = $this->input->post('from-date')." 00:00:00";
			$to = $this->input->post('to-date')." 00:00:00";
	
			$filerKey = array();
			$filerValue = array();
			//start cancel condition start
				if($this->input->post('hotel_mode_booked')=="cancelledTicket"){

					if($this->input->post('filter2')!=""){

						$filter2 = $this->input->post('filter2');
						$filterResult2 = $this->input->post('filter2Result');

						$q = "SELECT * FROM canceled_tickets left join flight_bookings on canceled_tickets.HermesPNR=flight_bookings.HermesPNR  WHERE canceled_tickets.uid='".$uid."' and `ForTicket`='FLIGHT'  AND TravelType='".$airline_type."' AND ".$filter1."='".$filterResult1."' AND ".$filter2."='".$filterResult2."' AND DepartureDateTime between '".$from."' AND '".$to."'";

						$result = $this->agent_model->get_query_data($q);

						//echo $this->db->last_query();
						print_r($result);
					}

				if($this->input->post('filer1')!=""){
						$filter1 = $this->input->post('filer1');
						$filterResult1 = $this->input->post('filterResult');
					
						$q = "SELECT * FROM `canceled_tickets` left join flight_bookings on canceled_tickets.HermesPNR=flight_bookings.HermesPNR  WHERE canceled_tickets.uid='".$uid."' and `ForTicket`='FLIGHT' AND DepartureDateTime between ('".$from."' AND '".$to."') AND TravelType='".$airline_type."' AND ".$filter1."='".$filterResult1."'";

						$result = $this->agent_model->get_query_data($q);
						print_r($result);


				}

				
				$q = "SELECT * FROM canceled_tickets left join flight_bookings on canceled_tickets.HermesPNR=flight_bookings.HermesPNR  WHERE canceled_tickets.uid='".$uid."' and `ForTicket`='FLIGHT'  AND TravelType='".$airline_type."' AND DepartureDateTime between '".$from."' AND '".$to."'";


				$result =$this->agent_model->get_query_data($q);
				// echo $this->db->last_query();
				print_r($result);
				exit;
				}//cancel condition end's


			if($this->input->post('filter2')!=""){
				$filter2 = $this->input->post('filter2');
				$filterResult2 = $this->input->post('filter2Result');
		
				$condition = "uid = '".$uid."' AND DepartureDateTime between ('".$from."' AND '".$to."') AND TravelType='".$airline_type."' AND ".$this->input->post('filer1')."='".$this->input->post('filterResult')."' AND ".$filter2."='".$filterResult2."'";
					$result = $this->user_model->get_data('flight_bookings', $condition);
					$result['data'] = $data;
					$this->load->view('agent/air-ticket-history', $result);					
			}

			if($this->input->post('filer1')!=""){
					$filter1 = $this->input->post('filer1');
					$filterResult1 = $this->input->post('filterResult');
				
					$condition = "uid = '".$uid."' AND DepartureDateTime between ('".$from."' AND '".$to."') AND TravelType='".$airline_type."' AND ".$filter1."='".$filterResult1."'";
					$result = $this->user_model->get_data('flight_bookings', $condition);
					$result['data'] = $data;
					$this->load->view('agent/air-ticket-history', $result);					
			}

			
			$condition = "uid = '".$uid."' AND DepartureDateTime between ('".$from."' AND '".$to."') AND TravelType='".$airline_type."'";


			$data = $this->user_model->get_data('flight_bookings', $condition);
			$result['data'] = $data;
			$this->load->view('agent/air-ticket-history', $result);
		}else{
			$this->load->view('agent/air-ticket-history');
		}
    }

    public function bus_ticket_history($offset=0)
    {
		
		$this->input->get('from-date'); 
		$url=$_SERVER['QUERY_STRING'];
		$urlData = explode('&per_page=',$url); 
		$this->load->library('pagination');
    	$uid = $this->session->userdata('auid');
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
		$config['page_query_string'] = TRUE;
		$config['num_tag_close'] = '</li>';
		if(!empty($urlData)){
			$config['base_url'] = base_url('index.php/agent/bus-ticket-history?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/bus-ticket-history');}
		$data=array();
    	if(isset($_GET['submit'])){
			
			$airline_type = $this->input->get('airline-type');
			
			$from = $this->input->get('from-date');
			$from=explode('/',$from);
			$from=$from[2].'-'.$from[0].'-'.$from[1]. ' 00:00:00';	
			$to = $this->input->get('to-date');		
			$to=explode('/',$to);
			$to=$to[2].'-'.$to[0].'-'.$to[1]. ' 23:59:59';
			$filerKey = array();
			$filerValue = array();
			
			$conditons=array();
			$conditons['created >=']=str_replace("/","-",$from);
			$conditons['created <']=str_replace("/","-",$to);
			
			
			if($this->input->get('hotel_mode_booked')=="cancelledTicket"){
				
				$conditons['uid']=$uid;
				if($this->input->get('filter2')!=""){
					$filter2 = $this->input->get('filter2');
					$filterResult2 = $this->input->get('filter2Result');
					$conditons[$filter2]=$filterResult2;
				}
				if($this->input->get('filter1')!=""){
					$filter1 = $this->input->get('filter1');
					$filterResult1 = $this->input->get('filter1Result');
					$conditons[$filter1]=$filterResult1;
				}
				

				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('bus_bookings',$conditons);
				echo $this->db->last_query();
				$countResult=$query->result_array();
				

				$pageData=5;
		             
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 

		        $this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('bus_bookings',$conditons,$pageData, $offset);
				$result=$query->result_array();
				$data['result']=$result;
				
				
			}else{
				 $this->input->get('filter2');
				$conditons['uid']=$uid;
				if($this->input->get('filter2')!=""){
					$filter2 = $this->input->get('filter2');
					$filterResult2 = $this->input->get('filter2Result');
					$conditons[$filter2]=$filterResult2;
				}
				if($this->input->get('filter1')!=""){
					$filter1 = $this->input->get('filter1');
					$filterResult1 = $this->input->get('filter1Result');
					$conditons[$filter1]=$filterResult1;
				}
				

				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('bus_bookings',$conditons);
				$countResult=$query->result_array();
				
				
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				
		        $this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('bus_bookings',$conditons,$pageData, $offset);
				echo $this->db->last_query();
				$result=$query->result_array();
				$data['result']=$result;
				
				
			}

				
		}else{
			
			$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('bus_bookings',array('uid'=>$uid));
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);					
				$query = $this->db->get_where('bus_bookings',array('uid'=>$uid),$pageData,$offset);				
				$result=$query->result_array();
				//echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/bus-ticket-history',$data);
	}
	
	 public function walletReporting($limit=0){
	$id = $this->session->userdata('aid');
	$uid = $this->session->userdata('auid');	
	
	$where = "user_id='".$uid."'  OR user_id='".$uid."'";
	//$result = $this->user_model->get_data('dmr_transaction',$condition);
//	$data['result'] = $result;
	
	$offset=10;
        
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
        $config['base_url'] = base_url('index.php/agent1/walletReporting');
        $config['total_rows'] = $this->user_model->get_total_record('dmr_transaction', $where);
        $config['per_page'] = $offset; 
        $this->pagination->initialize($config); 
      


      $data['result'] = $this->agent_model->table_pagnination_condition('dmr_transaction', $where, $limit, $offset);
	
	
	$this->load->view('agent/wallet', $data);
	}

}
?>

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller{

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


   public function agent_auth(){
   		$session = $this->session->userdata('auid');
		if(empty($session)){
			redirect('http://www.agent.kpholidays.com/');
		}
   }



	public function index(){
		$this->agent_auth();
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

		$this->agent_auth();
		
		 $data=array();
	   $data['flight_data']=array();
		if($this->input->post('source')!=''){ 
		
	     $source=$this->region_model->get_data('airport_code',"CODE='".$this->input->post('source')."' OR CITYAIRPORT like '".$this->input->post('source')." %'");
		 if(!empty($source)){
			 $_POST['source']=$source[0]['CODE'];
		 }
		 $destination=$this->region_model->get_data('airport_code',"CODE='".$this->input->post('destination')."' OR CITYAIRPORT like '".$this->input->post('destination')." %'");
		 if(!empty($destination)){
			 $_POST['destination']=$destination[0]['CODE'];
		 }
		 
	     $searc_post=array();		
		 $searc_post['way']=$this->input->post('way');
		 $searc_post['source']=$this->input->post('source');
		 $searc_post['destination']=$this->input->post('destination');
		 $searc_post['ClassType']=$this->input->post('ClassType');
		 $searc_post['adult']=$this->input->post('adult');
		 $searc_post['child']=$this->input->post('child');
		 $searc_post['infant']=$this->input->post('infant');
		 $searc_post['departure']=$this->input->post('departure');
		 $searc_post['arrive']=$this->input->post('arrive');	
		 $searc_post['flight_mode']=$this->input->post('flight_mode');		 
		 $this->session->set_userdata('flight_search_post', $searc_post);
			      
	    $result=$this->CutlPost(base_url('/index.php/flight/flight_list/true'),$searc_post);
		 	
		$result=json_decode($result,true);
		if(isset($result['flight_data'])){
			$data=$result;
			if(!$result['flight_data']['ResponseStatus']){
			 $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> '.$result['flight_data']['FailureRemarks'].'
								</div>');
			 }
		}else{
			$data['flight_data']=$result;
		}
	    
  	  
	}

	  
	   if($this->input->post('way')=="R")

	   {
		if($this->input->post('flight_mode')=="International"){
			$this->load->view('agent/Interntl_RtripFlight',$data); 
		}else{
		   $this->load->view('agent/RtripFlight',$data); 
		}

	   }else{
		   if($this->input->post('flight_mode')=="International"){
		    $this->load->view('agent/interntl_flights_list',$data); 
		   }else{
			   $this->load->view('agent/flights_list',$data); 
		   }
	   }


}
  public function OnewayFlightBooking($UserTrackId){

  		$this->agent_auth();
		
		if($UserTrackId==NULL){
	   	redirect(base_url('/index.php/agent/flight_list'), 'refresh');
   		}
		$Flight_dietail=$this->session->userdata('Flight_'.$UserTrackId);
		if($Flight_dietail==''){
	   	redirect(base_url('/index.php/agent/flight_list'), 'refresh');
   		}
		//add confirmation
		if($this->input->post('flight')=='confirm'){
			
			$cdata['Flight_dietail']=json_encode($Flight_dietail);	
			$cdata['user_title']=$this->input->post('user_title');
			$cdata['user_name']=$this->input->post('user_name');
			$cdata['user_address']=$this->input->post('user_address');
			$cdata['user_city']=$this->input->post('user_city');	
			$cdata['user_country']=$this->input->post('user_country');
			$cdata['user_email']=$this->input->post('user_email');
			$cdata['user_pincode']=$this->input->post('user_pincode');
			$cdata['user_contact']=$this->input->post('user_contact');
			
			$cdata['adult_first_name']=json_encode($this->input->post('adult_first_name'));	
			$cdata['adult_last_name']=json_encode($this->input->post('adult_last_name'));
			$cdata['adult_gender']=json_encode($this->input->post('adult_gender'));
			$cdata['adult_DateofBirth']=json_encode($this->input->post('adult_DateofBirth'));
			$cdata['adult_title']=json_encode($this->input->post('adult_title'));
			
			$cdata['child_first_name']=json_encode($this->input->post('child_first_name'));	
			$cdata['child_title']=json_encode($this->input->post('adult_last_name'));
			$cdata['child_last_name']=json_encode($this->input->post('child_last_name'));
			$cdata['child_gender']=json_encode($this->input->post('child_gender'));
			$cdata['child_DateofBirth']=json_encode($this->input->post('child_DateofBirth'));
			
			$cdata['infant_first_name']=json_encode($this->input->post('infant_first_name'));	
			$cdata['infant_title']=json_encode($this->input->post('infant_title'));
			$cdata['infant_gender']=json_encode($this->input->post('infant_gender'));
			$cdata['infant_DateofBirth']=json_encode($this->input->post('infant_DateofBirth'));
			$cdata['infant_last_name']=json_encode($this->input->post('infant_last_name'));
			$cdata['uid']=$this->session->userdata('auid');
			$cdata['commission'] = $this->session->userdata('flight_ticket_commission');			
			print_r($cdata);
			
			echo $GetBook=$this->CutlPost(base_url('/index.php/flight/ManageOnewaybookingAgent'),$cdata);die;

			
			if($GetBook!='NoBalance'){
					 	
			$GetBook=json_decode($GetBook,true);
			if(!$GetBook['ResponseStatus']){			 
			
		   
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$GetBook['FailureRemarks'].'
                            </div>');
			
		
				}else{
					 foreach($GetBook['BookOutput']['FlightTicketDetails'] as $pnrs){
				 $hermsPnr[]=$pnrs['HermesPNR'];
			 }
			 $hermsPnr=implode("_",$hermsPnr);
			 redirect(base_url('/index.php/agent/OnewayThankyou/'.$hermsPnr.'/'.$GetBook['UserTrackId']), 'refresh');
				}
			
			}else{
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> you don\'t have sufficient balance.
								</div>');
			}
		}	
		
		$data=array();
		
		$data['Flight_dietail']=$Flight_dietail;
		
		$user_details=$this->user_model->user_uid($this->session->userdata('uid'));
		$data['user_details']=$user_details[0];		
		$flight_search_post=$this->session->userdata('flight_search_post');
		$data['flight_search']=$flight_search_post;
		$cdata['value']=json_encode($Flight_dietail);
		$get_taxfare=$this->CutlPost(base_url('/index.php/flight/tax_fare/NULL/true'),$cdata);		 	
		$get_taxfare=json_decode($get_taxfare,true);		
		$data['tax_details']=$get_taxfare;
		//set return text
		if(is_array($Flight_dietail['returndata'])){
			
			$cdata['value']=json_encode($Flight_dietail['returndata']);
			$get_taxfare=$this->CutlPost(base_url('/index.php/flight/tax_fare/NULL/true'),$cdata);			
			$get_taxfare=json_decode($get_taxfare,true);	
			$data['tax_details']=$get_taxfare;
			$data['return_tax_details']=$get_taxfare;
		}		
		
		$this->load->view('agent/OnewayFlightBooking',$data); 
	}
  public function IntOnewayFlightBooking($UserTrackId){

  		$this->agent_auth();
		
		if($UserTrackId==NULL){
	   	redirect(base_url('/index.php/agent/flight_list'), 'refresh');
   		}
		$Flight_dietail=$this->session->userdata('Flight_'.$UserTrackId);
		if($Flight_dietail==''){
	   	redirect(base_url('/index.php/agent/flight_list'), 'refresh');
   		}
		//add confirmation
		if($this->input->post('flight')=='confirm'){
			
			$cdata['Flight_dietail']=json_encode($Flight_dietail);	
			$cdata['user_title']=$this->input->post('user_title');
			$cdata['user_name']=$this->input->post('user_name');
			$cdata['user_address']=$this->input->post('user_address');
			$cdata['user_city']=$this->input->post('user_city');	
			$cdata['user_country']=$this->input->post('user_country');
			$cdata['user_email']=$this->input->post('user_email');
			$cdata['user_pincode']=$this->input->post('user_pincode');
			$cdata['user_contact']=$this->input->post('user_contact');
			
			$cdata['adult_first_name']=json_encode($this->input->post('adult_first_name'));	
			$cdata['adult_last_name']=json_encode($this->input->post('adult_last_name'));
			$cdata['adult_gender']=json_encode($this->input->post('adult_gender'));
			$cdata['adult_DateofBirth']=json_encode($this->input->post('adult_DateofBirth'));
			$cdata['adult_title']=json_encode($this->input->post('adult_title'));			
			$cdata['adult_passport']=json_encode($this->input->post('adult_passport'));
			$cdata['adult_PassportExpiryDate']=json_encode($this->input->post('adult_PassportExpiryDate'));
			$cdata['adult_PassportIssuingCountry']=json_encode($this->input->post('adult_PassportIssuingCountry'));
			$cdata['adult_Nationality']=json_encode($this->input->post('adult_Nationality'));
			
			$cdata['child_first_name']=json_encode($this->input->post('child_first_name'));	
			$cdata['child_title']=json_encode($this->input->post('adult_last_name'));
			$cdata['child_last_name']=json_encode($this->input->post('child_last_name'));
			$cdata['child_gender']=json_encode($this->input->post('child_gender'));
			$cdata['child_DateofBirth']=json_encode($this->input->post('child_DateofBirth'));
			$cdata['child_passport']=json_encode($this->input->post('child_passport'));
			$cdata['child_PassportExpiryDate']=json_encode($this->input->post('child_PassportExpiryDate'));
			$cdata['child_PassportIssuingCountry']=json_encode($this->input->post('child_PassportIssuingCountry'));
			$cdata['child_Nationality']=json_encode($this->input->post('child_Nationality'));
			
			$cdata['infant_first_name']=json_encode($this->input->post('infant_first_name'));	
			$cdata['infant_title']=json_encode($this->input->post('infant_title'));
			$cdata['infant_gender']=json_encode($this->input->post('infant_gender'));
			$cdata['infant_DateofBirth']=json_encode($this->input->post('infant_DateofBirth'));
			$cdata['infant_last_name']=json_encode($this->input->post('infant_last_name'));
			$cdata['infant_passport']=json_encode($this->input->post('infant_passport'));
			$cdata['infant_PassportExpiryDate']=json_encode($this->input->post('infant_PassportExpiryDate'));
			$cdata['infant_PassportIssuingCountry']=json_encode($this->input->post('infant_PassportIssuingCountry'));
			$cdata['infant_Nationality']=json_encode($this->input->post('infant_Nationality'));
			$cdata['uid']=$this->session->userdata('auid');	
			$cdata['commission'] = $this->session->userdata('Int_commission'.$UserTrackId);
			print_r($cdata);
			echo $GetBook=$this->CutlPost(base_url('/index.php/flight/International_ManageOnewaybookingAgent'),$cdata);die;
			
			if($GetBook!='NoBalance'){
					 	
			$GetBook=json_decode($GetBook,true);
			if(!$GetBook['ResponseStatus']){			 
			
		   
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$GetBook['FailureRemarks'].'
                            </div>');
			
		
				}else{
					 $hermsPnr=array();
			// foreach($result['LCCBookOutput']['TicketDetails'] as $pnrs){
				if(isset($GetBook['FSCBookOutput'])){
						$hermsPnr[]=$GetBook['FSCBookOutput']['TicketDetails']['HermesPNR'];
					}else{
				 		$hermsPnr[]=$GetBook['LCCBookOutput']['TicketDetails']['HermesPNR'];
					}
			//}
			 $hermsPnr=implode("_",$hermsPnr);
			 redirect(base_url('/index.php/agent/IntOnewayThankyou/'.$hermsPnr.'/'.$GetBook['UserTrackId']), 'refresh');
				}
			
			}else{
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> you don\'t have sufficient balance.
								</div>');
			}
		}	
		
		$data=array();
		
		$data['Flight_dietail']=$Flight_dietail;
		
		$user_details=$this->user_model->user_uid($this->session->userdata('uid'));
		$data['user_details']=$user_details[0];		
		$flight_search_post=$this->session->userdata('flight_search_post');
		$data['flight_search']=$flight_search_post;
		$cdata['value']=json_encode($Flight_dietail);
		$get_taxfare=$this->CutlPost(base_url('/index.php/flight/internal_tax_fare/NULL/true'),$cdata);		 	
		$get_taxfare=json_decode($get_taxfare,true);		
		$data['tax_details']=$get_taxfare;
		//set return text
		if(is_array($Flight_dietail['returndata'])){
			foreach($Flight_dietail['returndata']['AvailSegments'] as $segment){
			$Flight_dietail['AvailSegments'][]=$segment;
			}			
			$cdata['value']=json_encode($Flight_dietail);
			$get_taxfare=$this->CutlPost(base_url('/index.php/flight/internal_tax_fare/NULL/true'),$cdata);		
			
			$get_taxfare=json_decode($get_taxfare,true);	
			$data['return_tax_details']=$get_taxfare;
			$data['tax_details']=$get_taxfare;
		}		
		
		$this->load->view('agent/IntOnewayFlightBooking',$data); 
	}
public function bus_list(){

	$this->agent_auth();

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
 	function bus_getGetCancellation(){
	  
	$responsdata=array(); 	
	 if(!$this->input->post('TicketNumber')){
	   	redirect(base_url('/index.php/agent/bus_ticket_history'), 'refresh');
   		}   	
					
		
		
		$postdata =
			array(
				'TicketNumber' => json_encode($this->input->post('TicketNumber')),
				'TransactionId' => $this->input->post('TransactionId'),
				'TransportId' => $this->input->post('TransportId')				
			
		);		
					
		$result=$this->CutlPost(base_url('/index.php/bus/user_getGetCancellation/true'),$postdata);
		$result=json_decode($result,true);			
		if($result['ResponseStatus']){
			if(isset($result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails'])){
				
				
				
				$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['TransportPNR'];	
				$payData['ForTicket']='BUS';
				$payData['AirlinePNR']=$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['CancellationNumber'];
				$payData['CanceledPNRDetails']=json_encode($result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']);									
				$this->user_model->add_data('canceled_tickets',$payData);

				$condition = array('TransportPNR'=>$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['TransportPNR']);
				$this->user_model->update_table_data('bus_bookings', $condition);
				
			 $this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Error!</strong> ticket successfully canceled with Cancellation Number '.$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['CancellationNumber'].'
                            </div>');
			redirect(base_url('/index.php/agent/bus_ticket_history'), 'refresh');
			}else{
				 $this->session->set_userdata('canceldata', $result);
				$responsdata['details']=$result;
			}
				
		}else{
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.@$result['FailureRemarks'].'
                            </div>');
				redirect(base_url('/index.php/agent/bus_ticket_history'), 'refresh');
		}
	}
public function hotel_list(){

	$this->agent_auth();

	$data=array();
	 if($this->input->post('hotel')=='search'){
		 
		 $searc_post=array();
		 $searc_post['rooms']=$this->input->post('rooms');
		 $searc_post['adults']=$this->input->post('adults');
		 $searc_post['kids']=$this->input->post('kids');
		 $searc_post['checkin']=$this->input->post('checkin');
		 $searc_post['checkout']=$this->input->post('checkout');
		 $this->session->set_userdata('search_post', $searc_post);
		 
		 	$postdata =
			array(
				'hotel' => $this->input->post('hotel'),
				'hotel_mode' => $this->input->post('hotel_mode'),
				'adults' => $this->input->post('adults'),
				'kids' => $this->input->post('kids'),
				'rooms' => $this->input->post('rooms'),
				'city' => $this->input->post('city'),
				'checkin' => $this->input->post('checkin'),
				'checkout' => $this->input->post('checkout')
			
		);		
					
			$result=$this->CutlPost(base_url('/index.php/hotel/hotel_list/true'),$postdata);						
			$result=json_decode($result,true);
			// print_r($result);
		 	if(!empty($result['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails'])){
		 $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$result['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'].' '.$result['soapBody']['HotelSearchResponse']['HotelSearchResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'].'
                            </div>');
		 }		
		$data['hotel_data']=$result;	
		 
		 }
	if($this->input->post('hotel_mode')=='International'){
		$this->load->view('agent/hotel_listInternational',$data);
	}else{
	    $this->load->view('agent/hotel-list',$data);
	}
}


public  function hotel_detailed($Providerid=NULL,$HotelId=NULL)
	{ 

		$this->agent_auth();

    if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
	
		 $result=$this->CutlPost(base_url("/index.php/hotel/hotel_detailed/$Providerid/$HotelId/true"),array());
		 $responsdata=json_decode($result,true);
		
	    if(isset($responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails'])){
			echo $responsdata['soapBody']['HotelDetailsResponse']['HotelDetailsResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'];die;
		 }
		 $data['hoteldetail_data']=$responsdata['soapBody'];	
		 $data['ghoteldietail']=$hotel_dietail;
	   $this->load->view('agent/hotel_detailed',$data); 
	}


   public  function hotel_booking($HotelId=NULL,$RoomTypeID=NULL,$RateplanId=NULL)

   { 

   	$this->agent_auth();

    if($HotelId==NULL or $RoomTypeID==NULL or $RateplanId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$RoomTypeID=urldecode($RoomTypeID);
		$RateplanId=urldecode($RateplanId);
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('/index.php/agent/hotel_list'), 'refresh');
   		}	
		
		
		if($this->input->post('booking')=='confirm'){
			
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$email=$this->input->post('email');
			$address=$this->input->post('address');
			$country=$this->input->post('country');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$postel=$this->input->post('post');
			$mobile=$this->input->post('mobile');		
			
			$CheckInarray=explode("/",$hotel_dietail['CheckIn']);
			$CheckOutarray=explode("/",$hotel_dietail['CheckOut']);
			$CheckIn = strtotime($CheckInarray[2].'/'.$CheckInarray[1].'/'.$CheckInarray[0]);
			$CheckOut = strtotime($CheckOutarray[2].'/'.$CheckOutarray[1].'/'.$CheckOutarray[0]);
			$datediff = $CheckOut - $CheckIn;
			$nights=floor($datediff/(60*60*24));
			$room_name="";
			$room_price="";
			$room_tax="";
			$Providerid=$hotel_dietail['Providerid'];
			$Searchid=$hotel_dietail['Searchid'];
			$search_post=$this->session->userdata('search_post');
			
			$RoomInfo="";
				$adults=floor($search_post['adults']/$search_post['rooms']);
				$kids=floor(@($search_post['kids']/$search_post['rooms']));
				for($i=1;$i<=$search_post['rooms'];$i++){
				 $RoomInfo.= $i.','.$adults.','.$kids.',~0,|';
				}
			if(array_key_exists(0,$hotel_dietail['RatePlanDetails']['Row'])){ 					
				foreach($hotel_dietail['RatePlanDetails']['Row'] as $RatePlan){
					if($RoomTypeID==$RatePlan['RoomTypeID']){
					$room_name=$RatePlan['HotelRoomTypeDesc'];
					$room_price=($RatePlan['PromotionTotal']>0)?$RatePlan['PromotionTotal']:$RatePlan['RoomCharges'];
					$room_tax=$RatePlan['Tax'];
					}
				}
			}else{
					$room_name=$hotel_dietail['RatePlanDetails']['Row']['HotelRoomTypeDesc'];
					$room_price=($hotel_dietail['RatePlanDetails']['Row']['PromotionTotal']>0)?$hotel_dietail['RatePlanDetails']['Row']['PromotionTotal']:$hotel_dietail['RatePlanDetails']['Row']['RoomCharges'];
					$room_tax=$hotel_dietail['RatePlanDetails']['Row']['Tax'];
			}
			
			//set booking xml
			$grossamount=$room_price+$room_tax;
			$amount = $this->user_model->user_wallet_amout($this->session->userdata('auid'));
			if($amount['0']['BALANCE']>=$grossamount){
				
				$markepdata=$this->agent_model->get_busMrakup('Domestic Hotel');
				$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;
				$postdata=array('Providerid'=>$Providerid,
								'SearchId'=>$Searchid,
								'HotelId'=>$HotelId,
								'CheckIn'=>$hotel_dietail['CheckIn'],
								'CheckOut'=>$hotel_dietail['CheckOut'],
								'BookingAmount'=>$grossamount,
								'NoofNights'=>$nights,
								'RoomInfo'=>$RoomInfo,
								'RateplanId'=>$RateplanId,
								'RoomTypeID'=>$RoomTypeID,
								'Fname'=>$first_name,
								'Lname'=>$last_name,
								'Address'=>$address,
								'City'=>$city,
								'Country'=>$country,
								'PostalCode'=>$postel,
								'Mobile'=>$mobile,
								'Email'=>$email,
								'markup'=>$markup,
								'uid'=>$this->session->userdata('auid'),
								'State'=>$state
				);						
				$result=$this->CutlPost(base_url("/index.php/hotel/hotel_bookingAgent"),$postdata);
		 		$responsdata=json_decode($result,true);
				if(isset($responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['Hotels']['ErrorDetails']['Error'])){
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> '.$responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'].' '.$responsdata['soapBody']['BookingTrackResponse']['BookingTrackResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'].'
								</div>');
					
				}else{
					if(isset($responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['Status']) and $responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['Status']==0){
							
							redirect(base_url('index.php/agent/hotel_thankyou/'.$responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['BookingInformation']['BookingID']), 'refresh');				 
						 }else{							 
							if(isset($responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'])){
							$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'].' '.$responsdata['soapBody']['BookingConfirmationResponse']['BookingConfirmationResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'].'
                            </div>');
							}else{
								$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.json_encode($responsdata).'
                            </div>');
							}
							
						 }
				}
			}else{
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> you don\'t have sufficient balance.
								</div>');
			}


					
					
			
		}
		$user_details=$this->user_model->user_uid($this->session->userdata('auid'));		
		$data['user_details']=$user_details[0];		
		$data['RoomTypeID']=$RoomTypeID;
		$data['RateplanId']=$RateplanId;
		$data['ghoteldietail']=$hotel_dietail;	
	   $this->load->view('agent/hotel_booking',$data); 
   }

 public  function hotel_thankyou($BookingID=NULL)

   {
   		$this->agent_auth();

     if($BookingID==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}

   		$jsonData=file_get_contents(base_url('/index.php/hotel/print_dom_ticket/'.$BookingID.'/true'));
   			// echo $jsonData;
		$thankyou['data'] = json_decode($jsonData,true);	
		//		print_r($result);			
		
		$this->load->view('agent/hotel_thankyou',$thankyou);
   }

    public  function hotel_thankyouIntl($BookingID=NULL)

   { 
   		$this->agent_auth();


    if($BookingID==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}

   		$jsonData=file_get_contents(base_url('/index.php/hotel/print_Intl_ticket/'.$BookingID.'/true'));
   			// echo $jsonData;
		$thankyou['data'] = json_decode($jsonData,true);	
				// print_r($thankyou);			
		$this->load->view('agent/hotel_thankyouIntl',$thankyou);
   }
   
      public function hotel_getGetCancellation(){
	   if($this->input->post('EmailId')=='' or $this->input->post('BookingID')==''){
		   $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong>Email and BookingId is required</div>');
	   	redirect(base_url('/index.php/agent/hotel_ticket_history'), 'refresh');
   		}
		if($this->input->post('HotelType')=='Domestic'){
		
		$postdata =array();		
					
		$result=$this->CutlPost(base_url('/index.php/hotel/CancelBooking/'.urlencode($this->input->post('BookingID')).'/'.urlencode($this->input->post('EmailId')).'/true'),$postdata);
		
		$response=json_decode($result,true);		
			if(isset($response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'])){
				$jdata=array();
				$jdata['MTransId']=$payData['HermesPNR']=$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'];
				$jdata['CancelAmount']=$payData['HermesPNR']=$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['CancelAmount'];
				$jdata['Refund']=$payData['HermesPNR']=$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Refund'];
				$jdata['Message']=$payData['HermesPNR']=$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Message'];
				
				$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['MTransId'];	
				$payData['ForTicket']='HOTEL';
				$payData['AirlinePNR']=$this->input->post('BookingID');	
				$payData['CanceledPNRDetails']=json_encode($jdata);								
				$this->user_model->add_data('canceled_tickets',$payData);
				$condition = array('BookingID'=>$this->input->post('BookingID'));
				$this->user_model->update_table_data('hotel_bookings', $condition);
				$this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> '.$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['CancelBooking']['TransactionInfo']['Message'].'
                            </div>');
			}else{
				if(trim($response['soapBody']['CancelBookingResponse']['CancelBookingResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'])=='Cancellation Done'){
				$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$this->input->post('BookingID');	
				$payData['ForTicket']='HOTEL';
				$payData['AirlinePNR']=$this->input->post('BookingID');	
				$payData['CanceledPNRDetails']='';								
				$this->user_model->add_data('canceled_tickets',$payData);
				$condition = array('BookingID'=>$this->input->post('BookingID'));
				$this->user_model->update_table_data('hotel_bookings', $condition);
				}
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong>'.$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['Hotels']['ErrorDetails']['Error']['ErrorCode'].'-'.$response['soapBody']['CancelBookingResponse']['CancelBookingResult']['Hotels']['ErrorDetails']['Error']['ErrorMsg'].'</div>');
			}
		}else{
			$postdata =array();	
			$result=$this->CutlPost(base_url('/index.php/hotel/HotelBookingCancelRQIntl/'.urlencode($this->input->post('BookingID')).'/true'),$postdata);
		    $response=json_decode($result,true);			
			if(isset($response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['CancelBooking']['CancelDetails']['Cancel']['@attributes']['CancelStatus'])){
				
				$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$this->input->post('BookingID');	
				$payData['ForTicket']='HOTEL';
				$payData['AirlinePNR']=$this->input->post('BookingID');	
				//$payData['CanceledPNRDetails']=json_encode($jdata);								
				$this->user_model->add_data('canceled_tickets',$payData);
				$condition = array('BookingID'=>$this->input->post('BookingID'));
				$this->user_model->update_table_data('hotel_bookings', $condition);
				$this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> '.$response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['CancelBooking']['CancelDetails']['Cancel']['@attributes']['CancelStatus'].'
                            </div>');
			}else{
				//print_r($response);
				$error=isset($response['soapBody']['soapFault']['soapReason'])?$response['soapBody']['soapFault']['soapReason']:'Unknown error';
				$error=isset($response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['Unknown']['Error']['Code'])?$response['soapBody']['HotelBookingCancelRQResponse']['HotelBookingCancelRQResult']['Unknown']['Error']['Code']:$error;
				
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong>'.$error.'</div>');
			}
		}
		
		 
	   	redirect(base_url('/index.php/agent/hotel_ticket_history'), 'refresh');
   }
   

	public  function BusThankyou($tranctionid,$ScheduleId)

   {
   		$this->agent_auth();

     if(empty($tranctionid)){
	   	redirect(base_url('/'), 'refresh');
   		}

   		$jsonData=file_get_contents(base_url('/index.php/bus/BusThankyou/'.$tranctionid.'/'.$ScheduleId.'/true'));
   			// echo $jsonData;
		$result = json_decode($jsonData,true);	
				// print_r($result);			
		$this->load->view('agent/bus_thankyou',$result);
   }


	public  function IntOnewayThankyou($tranctionid,$UserTrackId){
		$this->agent_auth();


     if(empty($tranctionid)){
	   	redirect(base_url('/'), 'refresh');
   		}

   		$jsonData=file_get_contents(base_url('/index.php/flight/IntOnewayThankyou/'.$tranctionid.'/'.$UserTrackId.'/true'));
   			// echo $jsonData;
		$result = json_decode($jsonData,true);	
				// print_r($result);			
		$this->load->view('agent/flightoneway_thankyou',$result);
   }

   public  function OnewayThankyou($tranctionid,$UserTrackId){

   		$this->agent_auth();

     if(empty($tranctionid)){
	   	redirect(base_url('/'), 'refresh');
   		}

   		$jsonData=file_get_contents(base_url('/index.php/flight/OnewayThankyou/'.$tranctionid.'/'.$UserTrackId.'/true'));
   			// echo $jsonData;
		$result = json_decode($jsonData,true);
		$dresult = $this->user_model->get_data('flight_bookings', array('UserTrackId'=>$UserTrackId));	
		$result['GrandTotalmarkup']=$dresult[0]['GrandTotalmarkup'];	
		
		$this->load->view('agent/flightoneway_thankyou',$result);
   }

  public  function hotel_detailedIntl($Providerid=NULL,$HotelId=NULL)
   {

   	$this->agent_auth();
	    
    if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
		
		 $result=$this->CutlPost(base_url("/index.php/hotel/hotel_detailedIntl/$Providerid/$HotelId/true"),array());
		 
		 $responsdata=json_decode($result,true);
	   if(!isset($responsdata['soapBody']['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail'])){
			print_r($responsdata);die;
		}
		
		 $data['hoteldetail_data']=$responsdata['soapBody'];	
		 $data['ghoteldietail']=$hotel_dietail;
	   $this->load->view('agent/hotel_detailedIntl',$data); 
	
	}
	
	 public  function hotel_bookingIntl($HotelId=NULL,$Bookingkey=NULL,$TrackId=NULL)

   { 
   		$this->agent_auth();

    if($HotelId==NULL or $Bookingkey==NULL){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
		
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('index.php/agent/hotel_list'), 'refresh');
   		}
		
		if($this->input->post('booking')=='confirm'){
			
			$first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
			$email=$this->input->post('email');
			$address=$this->input->post('address');
			$country=$this->input->post('country');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$postel=$this->input->post('post');
			$mobile=$this->input->post('mobile');
			
			//custom data
			$search_post=$this->session->userdata('search_post');
			
			$CheckInarray=explode("/",$search_post['checkin']);
			$CheckOutarray=explode("/",$search_post['checkout']);
			$CheckIn = strtotime($CheckInarray[2].'-'.$CheckInarray[0].'-'.$CheckInarray[1]);
			$CheckOut = strtotime($CheckOutarray[2].'-'.$CheckOutarray[0].'-'.$CheckOutarray[1]);
			$datediff = $CheckOut - $CheckIn;
			$nights=floor($datediff/(60*60*24));
			$room_name="";
			$room_price="";
			$room_tax="";
			
			$attributes=(isset($hotel_dietail['@attributes']))?$hotel_dietail['@attributes']:$hotel_dietail;
			$Providerid=$attributes['Providerid'];
			$Searchid=$hotel_dietail['Searchid'];
			
			$RoomInfo="";
				$adults=floor($search_post['adults']/$search_post['rooms']);
				$kids=floor(@($search_post['kids']/$search_post['rooms']));
				$PaxInfo="";
				for($i=1;$i<=$search_post['rooms'];$i++){
					$Adults="";
					for($j=1;$j<=$adults;$j++){					
					$Adults.=$first_name.$j.",".$last_name.$j."^";
					//$Adults.="room".$i.$first_name.$j.",room".$i.$last_name.$j."^";
					}
					$Childs="^~";
					for($j=1;$j<=$kids;$j++){					
					$Childs.=$first_name.$j.",".$last_name.$j."^";
					//$Childs.="room".$i.$first_name.$j.",room".$i.$last_name.$j."^";
					}
				$RoomInfo.= $i.','.$adults.','.$kids.',~0,|';
				 $PaxInfo.= rtrim($Adults,"^").rtrim($Childs,"^").'|';
				}
			if(array_key_exists(0,$hotel_dietail['RoomTypes']['RoomType'])){ 					
				foreach($hotel_dietail['RoomTypes']['RoomType'] as $RatePlan){
					if(urldecode($Bookingkey)==$RatePlan['@attributes']['Bookingkey']){
					$room_name=$RatePlan['@attributes']['Roomname'];
					$room_price=($RatePlan['@attributes']['GIRoomChargesINR']);
					$room_tax=$RatePlan['@attributes']['TaxesINR'];
					}
				}
			}else{
					$room_name=$hotel_dietail['RoomTypes']['RoomType']['@attributes']['Roomname'];
					$room_price=$hotel_dietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'];
					$room_tax=$hotel_dietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'];
			}
			
			$markepdata=$this->agent_model->get_busMrakup('International Hotel');
			$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;
			//set booking xml
			

			$tdata=array();
			$tdata['SearchId']=$Searchid;
			$tdata['agentMarkup']=$markup;
			$tdata['bookingkey']=urldecode($Bookingkey);
			$tdata['providerId']=$Providerid;
			$tdata['Hotelid']=$HotelId;
			$tdata['RCount']=$search_post['rooms'];
			$tdata['RoomsInfo']=$RoomInfo;
			$tdata['CheckIn']=date('m/d/Y',$CheckIn);
			$tdata['CheckOut']=date('m/d/Y',$CheckOut);
			$tdata['room_price']=$room_price;
			$tdata['room_tax']=$room_tax;
			$tdata['first_name']=$first_name;
			$tdata['last_name']=$last_name;
			$tdata['address']=$address;
			$tdata['city']=$city;
			$tdata['country']=$country;
			$tdata['postel']=$postel;
			$tdata['mobile']=$mobile;
			$tdata['email']=$email;
			$tdata['Bookingkey']=urldecode($Bookingkey);
			$tdata['PaxInfo']=$PaxInfo;
			$tdata['UserTrackID']=$TrackId;
			$tdata['uid']=$this->session->userdata('auid');		
			$tdata['hotel_dietail']=json_encode($hotel_dietail);		
		$grossamount=$tdata['room_price']+$tdata['room_tax'];	
		$amount = $this->user_model->user_wallet_amout($this->session->userdata('auid'));	
		if($amount['0']['BALANCE']>=$grossamount){	
				
				
				$result=$this->CutlPost(base_url("/index.php/hotel/HotelBookingIntlAgent"),$tdata);
		 		$responsdata=json_decode($result,true);						
				if(isset($responsdata['price_change'])){
				$this->session->set_userdata('Hotel_'.$HotelId,$responsdata['hotel_dietail']);
				$this->form_validation->set_message('room_charges', 'Room chareges has been changed.');
							redirect(base_url('index.php/agent/hotel_bookingIntl/'.$HotelId.'/'.$Bookingkey.'/'.$responsdata['TrackId']), 'refresh');					 
				}
				
				
				 if(isset($responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['BookingDetails']['BookingDetail']['Hotel']['BookingRefNumber'])){			   				
			   				
							 redirect(base_url('index.php/agent/hotel_thankyouIntl/'.$responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['BookingDetails']['BookingDetail']['Hotel']['BookingRefNumber']), 'refresh');
					}else{
							 
							 $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorCode'].' '.$responsdata['soapBody']['HotelBookingResponse']['HotelBookingResult']['Hotels']['ErrorDetails']['Error']['@attributes']['ErrorMsg'].'
                            </div>');
					}
			
					
			
			 
			
				
			
			
		}else{
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Error!</strong> you don\'t have sufficient balance.
								</div>');
		}
	}
		
		
		$user_details=$this->user_model->user_uid($this->session->userdata('auid'));		
		$Pagedata['user_details']=$user_details[0];
		$Pagedata['Bookingkey']=urldecode($Bookingkey);
		$Pagedata['ghoteldietail']=$hotel_dietail;	
	    $this->load->view('agent/hotel_bookingIntl',$Pagedata); 
   }
   

   public  function GetSeatMap($ScheduleId=NULL,$UserTrackId=NULL)
   {

   		$this->agent_auth();

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

 public  function BusBooking($ScheduleId)

   {

   	$this->agent_auth();

	   if($ScheduleId==NULL){
	   	redirect(base_url('/index.php/agent/bus_list'), 'refresh');
   		}
		$bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);
		if($bus_dietail==''){
	   	redirect(base_url('/index.php/agent/bus_list'), 'refresh');
   		}
		
		$data=array();
		//From BUS Detail Method
		if($this->input->post('bookb')=='seatSelected'){
			$data['seatselected']=$this->input->post('seatselected');
			$data['boarding_point']=$this->input->post('boarding_point');
			$data['dropping_point']=$this->input->post('dropping_point');
			
			$sarchpost=$this->session->userdata('search_post');
			$sarchpost['seatselected']=$data['seatselected'];
			$sarchpost['boarding_point']=$data['boarding_point'];
			$sarchpost['dropping_point']=$data['dropping_point'];
			$this->session->set_userdata('search_post', $sarchpost);	
		}else{
			$sarchpost=$this->session->userdata('search_post');
			
			if(isset($sarchpost['seatselected'])){
			$data['seatselected']=$sarchpost['seatselected'];
			$data['boarding_point']=$sarchpost['boarding_point'];
			$data['dropping_point']=$sarchpost['dropping_point'];
			}
		}
		
		
		
		
		
		if($this->input->post('bookb')=='confirm'){
			$searc_post=$this->session->userdata('search_post');
			$total_ticket=count($this->input->post('PassengerName'));
			$priceBySeat=array();
			foreach($bus_dietail['Fares'] as $fare){
			   $priceBySeat[$fare['SeatTypeId']]['Fare']=$fare['Fare'];
			   $priceBySeat[$fare['SeatTypeId']]['ServiceTax']=$fare['ServiceTax'];
			}
			$totla_price=0;
			foreach($this->input->post('PassengerSeatNo') as $seats){
				if($seats!=''){
				$set_typeid=explode("_",$seats);
				$totla_price=$totla_price+$priceBySeat[$set_typeid[0]]['Fare'];
				}else{
					$totla_price=$totla_price+$bus_dietail['Fares'][0]['Fare'];
				}
				
			}
			$pasengerlist=array();
			$PassengerGender=$this->input->post('PassengerGender');
			$PassengerAge=$this->input->post('PassengerAge');
			$PassengerSeatNo=$this->input->post('PassengerSeatNo');
			$PassengerBoardingId=$this->input->post('PassengerBoardingId');
			$PassengerDroppingId=$this->input->post('PassengerDroppingId');
			
			
			
			$BusType=($bus_dietail['BusType']=='AC')?'AC Bus':'Bus';
			$markepdata=$this->agent_model->get_busMrakup($BusType);							
			$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;
			
			foreach($this->input->post('PassengerName') as $key=>$Passenger){
				if($PassengerSeatNo[$key]!=''){
				$setno=explode("_",$PassengerSeatNo[$key]);
				$seatno=$setno[1];
				$seattypeid=$setno[0];
				$fare=$priceBySeat[$seattypeid]['Fare'];
				}else{
					$seatno='';
					$seattypeid=$bus_dietail['Fares'][0]['SeatTypeId'];
					$fare=$bus_dietail['Fares'][0]['Fare'];
				}
				$tarrray=array(				
				'PassengerName'=>$Passenger,
				'Gender'=>$PassengerGender[$key],
				'Age'=>$PassengerAge[$key],
				'SeatNo'=>$seatno,
				'SeatTypeId'=>$seattypeid,
				'Fare'=>$fare,
				'BoardingId'=>$PassengerBoardingId[$key],
				'DroppingId'=>$PassengerDroppingId[$key]);
				$pasengerlist[]=$tarrray;
			}
			$Buses=$this->session->userdata('SearchOutput');
			$data['title']=$this->input->post('title');
			$data['Name']=$this->input->post('name');
			$data['Address']=$this->input->post('address');
			$data['CountryId']=$this->input->post('country');
			$data['City']=$this->input->post('city');
			$data['ContactNumber']=$this->input->post('mobile');
			$data['EmailId']=$this->input->post('email');
			$data['IdProofId']=$this->input->post('IdProofId');
			$data['IdProofNumber']=$this->input->post('IdProofNumber');
			$data['BookedDate']=date('m/d/Y');
			$data['TotalTickets']=$total_ticket;
			$data['TotalAmount']=$totla_price;
			$data['TransportId']=$bus_dietail['TransportId'];
			$data['BusType']=$bus_dietail['BusType'];
			$data['markup']=($markup*$total_ticket);
			$data['ScheduleId']=$bus_dietail['ScheduleId'];
			$data['StationId']=$bus_dietail['StationId'];
			$data['UserTrackId']=$Buses['UserTrackId'];
			$data['TravelDate']=$searc_post['bus_departureDate'];
			$data['pasengerlist']=json_encode($pasengerlist);
			$data['seatselected']=json_encode($data['seatselected']);
			$data['commission']=$this->session->userdata('bus_final_commission_value');
			$data['auid']=$this->session->userdata('auid');
			
			 $response=$this->CutlPost(base_url('/index.php/bus/GetBookAgent'),$data);
			$data['seatselected']=json_decode($data['seatselected'],true);
			$data['pasengerlist']=$pasengerlist;						
			 $response=json_decode($response,true);	
			// print_r($response);			
			if($response['ResponseStatus']){	
							
					redirect(base_url('/index.php/agent/BusThankyou/'.$response['BookingOutput']['TicketDetails']['PNRDetails']['TransactionId'].'/'.$ScheduleId), 'refresh');
				
			}else{
					
				if(isset($response['ResponseStatus'])){
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$response['UserTrackId'].' '.$response['FailureRemarks'].'
                            </div>');
				}else{
					//print_r($response);
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.strip_tags($response).'
                            </div>');
				}
			}
			
		}
	   
		 $searc_post=$this->session->userdata('search_post');		
			  
		$user_details=$this->user_model->user_uid($this->session->userdata('uid'));
		
		$data['user_details']=$user_details[0];	
		$data['bus_dietail']=$bus_dietail;
		$data['searc_post']=$searc_post;	  
	   $this->load->view('agent/bus_booking',$data); 
	  
   }

/*
public function bus_ticket_history(){
	$uid = $this->session->userdata('auid');
	if(isset($_POST['submit'])){

		if(isset($_POST['hotel_mode_booked'])){
			$from = $this->input->post('from-date');
			$to = $this->input->post('to-date');
			
			if(isset($_POST['filer1'])){
				$filter1 = $this->input->post('filer1');
				$filterResult1 = $this->input->post('filterResult');
				$condition = "uid=".$uid." AND status=CONFIRM AND 	TravelDate=".$from."<".$to."AND ".$filter1."=".$filterResult1;
			}else{
			
			$condition = "uid='".$uid."' AND TravelDate='".$from."'<'".$to."'AND status='CONFIRM'";
			}
			$result = $this->user_model->get_data('bus_bookings', $condition);
			$data = array('result'=>$result);
			$this->load->view('agent/bus_ticket_history',$data);
			
		}else{

			$from = $this->input->post('from-date');
			$to = $this->input->post('to-date');
			$condition = "uid='".$uid."' AND TravelDate='".$from."'<'".$to."'AND status='Booking Cancel'";
			$result = $this->user_model->get_data('bus_bookings', $condition);
			// print_r($result);
			$data = array('result'=>$result);
			$this->load->view('agent/bus_ticket_history',$data);
		}
		$booked = $this->input->post('hotel_mode_booked');

	}else{
	$this->load->view('agent/bus_ticket_history');
		}
}*/

function CutlPost($url,$postdata){
	 
	     //$booking=json_encode($postdata);
			//print_r($bookingDetail);die;

	      $headers = array(' "Content-Type: text/xml",');  

		  // Build the cURL session
		/*$headers = array(
						 'Content-Type: text/xml; charset=utf-8', 'Accepts: text/xml; charset=utf-8'
						 
						 );*/
		  $ch = curl_init();

		  curl_setopt($ch, CURLOPT_URL, $url);

		  curl_setopt($ch, CURLOPT_POST, TRUE);

		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

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
	  
  }


    public function airline_ticket_history($offset=0)
    {
		$this->agent_auth();

		$this->input->get('from-date'); 
		$url=$_SERVER['QUERY_STRING'];
		$offset=(isset($_REQUEST['per_page']))?$_REQUEST['per_page']:0;
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
			$config['base_url'] = base_url('index.php/agent/airline_ticket_history?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/airline_ticket_history');}
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
				$conditons['TravelType']=$airline_type;

				$this->db->select('count(*) as cnt');
				// $conditons['flight_bookings.HermesPNR']='canceled_tickets.HermesPNR';
				$this->db->join('flight_bookings', 'flight_bookings.HermesPNR=canceled_tickets.HermesPNR');
				$this->db->order_by("canceled_tickets.created", "desc"); 				
				$query = $this->db->get_where('canceled_tickets', $conditons);
				
				$countResult=$query->result_array();
				//echo $this->db->last_query();
				

				$pageData=5;
		             
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 

		        $this->pagination->initialize($config); 
	
		     	 $this->db->select('flight_bookings.*');
				$this->db->join('flight_bookings', 'flight_bookings.HermesPNR=canceled_tickets.HermesPNR');	
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
				$conditons['TravelType']=$airline_type;

				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('flight_bookings',$conditons);
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('flight_bookings',$conditons,$pageData, $offset);
				$result=$query->result_array();
				$data['result']=$result;
				//echo $this->db->last_query();
				
			}

			

		
				
		}else{
			
			$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('flight_bookings',array('uid'=>$uid));
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);	
				$this->db->order_by("created", "desc");  				
				$query = $this->db->get_where('flight_bookings',array('uid'=>$uid),$pageData,$offset);				
				$result=$query->result_array();
				//echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/air-ticket-history',$data);
	}
	
	public function walletReporting($offset=0)
    {
    	$this->agent_auth();


		$id = $this->session->userdata('aid');
		
		 
		$url=$_SERVER['QUERY_STRING'];
		$urlData = explode('&per_page=',$url); 
		$offset=(isset($_REQUEST['per_page']))?$_REQUEST['per_page']:0;
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
			$config['base_url'] = base_url('index.php/agent/walletReporting?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/walletReporting');}
		$data=array();
    	if(isset($_GET['submit'])){
	
			$from = $this->input->get('fromDate');
			$from=explode('/',$from);
			$from=$from[0].'-'.$from[1].'-'.$from[2]. ' 00:00:00';	
			$to = $this->input->get('toDate');		
			$to=explode('/',$to);
			$to=$to[0].'-'.$to[1].'-'.$to[2]. ' 23:59:59';

			$onlyDMR = $this->input->get('onlyDMR');
			
			
			$conditons=array();
			$conditons['created >=']=str_replace("/","-",$from);
			$conditons['created <']=str_replace("/","-",$to);
				if($onlyDMR){
				$conditions['METHODID >']=0;	
				}
				$conditons['user_id']=$id."'  OR AGENTCODE='".$uid;

				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('dmr_transaction',$conditons);
				$countResult=$query->result_array();
				
				// echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 

				$this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('dmr_transaction',$conditons,$pageData, $offset);
				$result=$query->result_array();
				$data['result']=$result;
				// echo $this->db->last_query();

		}else{
			
			    $this->db->select('count(*) as cnt');
				$query = $this->db->get_where('dmr_transaction',array('user_id'=>$uid));
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=5;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);	
				$this->db->order_by("created", "desc");  				
				$query = $this->db->get_where('dmr_transaction',array('user_id'=>$uid),$pageData,$offset);				
				$result=$query->result_array();
				// echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/wallet',$data);
	}

	public function excelDownload()
	{
		$this->agent_auth();

        $this->load->library('export');
			$id = $this->session->userdata('aid');
			$uid = $this->session->userdata('auid');

        	$from = $this->input->get('fromDate');
			$from=explode('/',$from);
			$from=$from[0].'-'.$from[1].'-'.$from[2]. ' 00:00:00';

			$to = $this->input->get('toDate');		
			$to=explode('/',$to);
			$to=$to[0].'-'.$to[1].'-'.$to[2]. ' 23:59:59';
			
			
			$conditons=array();
			$conditons['created >=']=str_replace("/","-",$from);
			$conditons['created <']=str_replace("/","-",$to);
			$conditons['user_id']=$id."'  OR AGENTCODE='".$uid;
			$query = $this->db->get_where('dmr_transaction',$conditons);
			// $result=$query->result_array();
			// print_r($result);
			$this->export->to_excel($query, 'nameForFile'); 

    }


    public function cancelTicket($offset=0)
    {
    	$this->agent_auth();
		
		$url=$_SERVER['QUERY_STRING'];
		$urlData = explode('&per_page=',$url); 
		$offset=(isset($_REQUEST['per_page']))?$_REQUEST['per_page']:0;
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
			$config['base_url'] = base_url('index.php/agent/cancelTicket?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/cancelTicket');}
		$data=array();
    	if(isset($_GET['submit'])){
	
			$from = $this->input->get('fromDate');
			$from=explode('/',$from);
			$from=$from[0].'-'.$from[1].'-'.$from[2]. ' 00:00:00';	
			$to = $this->input->get('toDate');		
			$to=explode('/',$to);
			$to=$to[0].'-'.$to[1].'-'.$to[2]. ' 23:59:59';

			$conditons=array();
			$conditons['created >=']=str_replace("/","-",$from);
			$conditons['created <']=str_replace("/","-",$to);
				
			$conditons['uid']=$uid;
				$this->db->select('count(*) as cnt');
				$query = $this->db->get_where('canceled_tickets',$conditons);
				$countResult=$query->result_array();
				
				// echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=10;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 

				$this->pagination->initialize($config);		
				$this->db->order_by("created", "desc");       
				$query = $this->db->get_where('canceled_tickets',$conditons,$pageData, $offset);
				$result=$query->result_array();
				$data['result']=$result;
				// echo $this->db->last_query();

		}else{
			
			    $this->db->select('count(*) as cnt');
				$query = $this->db->get_where('canceled_tickets',array('uid'=>$uid));
				$countResult=$query->result_array();
				
				//echo $this->db->last_query();
				//print_r($countResult);die;
				$pageData=10;		       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData; 
				//$offset=$offset*$pageData;
		        $this->pagination->initialize($config);	
				$this->db->order_by("created", "desc");  				
				$query = $this->db->get_where('canceled_tickets',array('uid'=>$uid),$pageData,$offset);				
				$result=$query->result_array();
				// echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/cancel_booking',$data);
	}

    /*public function cancelTicket($offset=0)
    {
        $uid = $this->session->userdata('auid');

        $id = array('uid'=>$uid);

        $pageData = 10;

        $cancelCondition = "uid='".$uid."'";        
        
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
        $config['base_url'] = base_url('index.php/agent/cancelTicket');
        $config['total_rows'] = $this->user_model->get_total_record('canceled_tickets', $cancelCondition);
        $config['per_page'] = $pageData; 

        $this->pagination->initialize($config);
      
      $booking_cancel = $this->user_model->get_cancel_booking('canceled_tickets', $cancelCondition, $offset, $pageData);
      
        $data = array('result'=>$booking_cancel);
        // print_r($data);
        $this->load->view('agent/cancel_booking', $data);   
    }*/
	
	
	 public function bus_ticket_history($offset=0)
    {
    	$this->agent_auth();
		
		$this->input->get('from-date'); 
		$url=$_SERVER['QUERY_STRING'];
		$offset=(isset($_REQUEST['per_page']))?$_REQUEST['per_page']:0;
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
			$config['base_url'] = base_url('index.php/agent/bus_ticket_history?'.$urlData[0]);
		}else{$config['base_url'] = base_url('index.php/agent/bus_ticket_history');}
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
			
			
			if($this->input->get('hotel_mode_booked')=="Booking Cancel"){
				$conditons['status']=$this->input->get('hotel_mode_booked');
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
				echo $this->db->last_query();
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
				//echo $this->db->last_query();
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
				$this->db->order_by("created", "desc"); 				
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
	

	public function hotel_ticket_history($offset=0){
		
		$this->agent_auth();

		$this->input->get('from-date'); 
		$url=$_SERVER['QUERY_STRING'];
		$urlData = explode('&per_page=',$url); 
//		$urlData = ltrim($url, "/index.php/agent/airline_ticket_history");
	  // $url=$_SERVER['QUERY_STRING'];
		//$totalsegment=count(explode("&",$url));
		$offset=(isset($_REQUEST['per_page']))?$_REQUEST['per_page']:0;
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
				// echo $this->db->last_query();
				

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
				
				// echo $this->db->last_query();
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
				// echo $this->db->last_query();
				
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
				// echo $this->db->last_query();
				
						       
		        $config['total_rows'] = $countResult[0]['cnt'];
		        $config['per_page'] = $pageData;
		        $this->pagination->initialize($config);		
				$data['result']=$result;
			
		}
		
		$this->load->view('agent/hotel-ticket-history',$data);
	}





	

      function flight_getGetCancellation(){
	  
	$responsdata=array(); 
	
	if($this->input->post('action')){  
		 $responsdata['details']=$this->session->userdata('canceldata');	
			if($this->input->post('TravelType')=='I'){
			$this->Credentials['apiurl']=$this->Credentials['Intapiurl'];
			}
		 $PartialCancelPassengerDetails=array();
		 $tarray=array();
		 
		 foreach($responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CancelPassengerDetails'] as $key=>$pasenger){ 
		  
		  		$TPartialCancelTicketDetails=array();
                 foreach($pasenger['CancelTicketDetails'] as $key2=>$CancelTicketDetails){
					$PartialCancelTicketDetails=array();
					 if(in_array($CancelTicketDetails['TicketNumber'],$this->input->post('ticketselected'))){
						
						 $PartialCancelTicketDetails['TicketNumber']=$CancelTicketDetails['TicketNumber'];
						 $PartialCancelTicketDetails['SegmentId']=$CancelTicketDetails['SegmentId'];
						 $PartialCancelTicketDetails['FlightNumber']=$CancelTicketDetails['FlightNumber'];
						 $PartialCancelTicketDetails['Origin']=$CancelTicketDetails['Origin'];
						 $PartialCancelTicketDetails['Destination']=$CancelTicketDetails['Destination'];
						 $TPartialCancelTicketDetails[]=$PartialCancelTicketDetails;
						
						 
					 }
				 }
				 if(!empty($TPartialCancelTicketDetails)){
				 $tarray['PartialCancelTicketDetails']=$TPartialCancelTicketDetails;
				 $tarray['PaxNumber']=$pasenger['PaxNumber'];
				 $PartialCancelPassengerDetails['PartialCancelPassengerDetails'][]=$tarray;
				 }
		 }
		  $PartialCancelPassengerDetails['HermesPNR']=$responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR'];
						 $PartialCancelPassengerDetails['AirlinePNR']=$responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['AilinePNR'];
						 $PartialCancelPassengerDetails['CRSPNR']=$responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CRSPNR'];
		
		
		 $searc_post=array();		
		 $searc_post['PartialCancelPassengerDetails']=json_encode($PartialCancelPassengerDetails);
		 $searc_post['action']=$this->input->post('action');
		 $searc_post['TravelType']=$this->input->post('TravelType');
		 $searc_post['ticketselected']=json_encode($this->input->post('ticketselected'));	
		 				      
	    $result=$this->CutlPost(base_url('/index.php/flight/user_getGetCancellation/true'),$searc_post);	
		$result=json_decode($result,true);		
		if($result['ResponseStatus']){
			$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR'];	
				$payData['ForTicket']='FLIGHT';
				$payData['AirlinePNR']=$responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['AilinePNR'];								
				$this->user_model->add_data('canceled_tickets',$payData);

				$condition = array('HermesPNR'=>trim($responsdata['details']['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR']));
				$this->user_model->update_table_data('flight_bookings', $condition);
				
			$this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Success!</strong> '.$result['PartialCancellationOutput']['PartialCancellationDetails']['PartialCancellationRemarks'].'
                            </div>');
							
							redirect(base_url('/index.php/agent/airline_ticket_history'), 'refresh');
		}else{
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$result['FailureRemarks'].'
                            </div>');
		}
	}else{
	 if(!$this->input->post('hermspnr')){
	   	redirect(base_url('/index.php/agent/airline_ticket_history'), 'refresh');
   		}   	
		if($this->input->post('TravelType')=='I'){
		$this->Credentials['apiurl']=$this->Credentials['Intapiurl'];
		}
		
		 $searc_post=array();		
		 $searc_post['hermspnr']=$this->input->post('hermspnr');
		 $searc_post['AirlinePNR']=$this->input->post('AirlinePNR');
		 $searc_post['CancelType']=$this->input->post('CancelType');			      
	    $result=$this->CutlPost(base_url('/index.php/flight/user_getGetCancellation/true'),$searc_post);	
		$result=json_decode($result,true);
		
		if($result['ResponseStatus']){
			if(isset($result['CancellationOutput']['CancellationDetails']['FullCancellationRemarks'])){			
				
				$payData['uid']=$this->session->userdata('auid');				
				$payData['HermesPNR']=$this->input->post('hermspnr');	
				$payData['ForTicket']='FLIGHT';
				$payData['AirlinePNR']=$this->input->post('AirlinePNR');								
				$this->user_model->add_data('canceled_tickets',$payData);
				$condition = array('HermesPNR'=>trim($this->input->post('hermspnr')));
				$this->user_model->update_table_data('flight_bookings', $condition);
			 $this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Error!</strong> '.$result['CancellationOutput']['CancellationDetails']['FullCancellationRemarks'].'
                            </div>');
			redirect(base_url('/index.php/agent/airline_ticket_history'), 'refresh');
			}else{
				 $this->session->set_userdata('canceldata', $result);
				$responsdata['details']=$result;
			}
				
		}else{
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Error!</strong> '.$result['FailureRemarks'].'
                            </div>');
				redirect(base_url('/index.php/agent/airline_ticket_history'), 'refresh');
		}
	}
		$this->load->view('agent/FlightGetCancellation',$responsdata); 
  }


	public function setting(){

		$this->agent_auth();

    $log_user['uid']=$this->session->userdata('auid');      

    $log_user['profile'] = $this->user_model->login_detail($log_user['uid']);

    $this->load->view('agent/bookings',$log_user);
	}


	public function updateFrom(){
      
		$this->agent_auth();

      $data=array();
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
     
      if ($this->form_validation->run() == FALSE)
      {
         
         $data['error']=1;
           $data['msg']=strip_tags(validation_errors());
         echo json_encode($data);die;
      }

      if($Email != $sessionEmail){

      if(!$this->user_model->check_email($Email)){
        $data['error']=1;
          $data['msg']="$Email emial already resgistred";
         echo json_encode($data);die;
      }
      }

        $registerData = array();
        // $txtFullname = $this->input ->post('name');
        // $registerData['user_name'] = $this->input->post('name');
        // $name = explode(" ", $txtFullname);
        $registerData['first_name'] = $this->input->post('fName');
        $registerData['last_name'] = $this->input->post('lName');
        $password = $this->input->post('password');
          if($password != ''){
        $registerData['password'] = hash('md5', $password);
        }
        $registerData['email'] = $this->input->post('email');
        $registerData['phone'] = $this->input ->post('phone');
        $registerData['country'] = $this->input ->post('country');
        $registerData['PinCode'] = $this->input ->post('pincode');
        $registerData['state'] = $this->input ->post('state');
        $registerData['city'] = $this->input ->post('city');
        $registerData['address'] = $this->input->post('adddress');
        $registerData['date']=date("Y-m-d");
        $uid = $this->input->post('uid');
        // echo $uid; 
        // print_r($registerData);

        $result = $this->user_model->register_update($registerData,$uid);

  
        if($result == true){
          $data['error']=1;
       $data['msg']="Account Update Successfully";

          echo json_encode($data);
        }

    }

    public function controlPanel(){

$this->agent_auth();

    	$this->load->view('agent/controlPanel');
    }
	
	public function edit_markup(){
		
		if(isset($_POST['updatemarkup']) and $this->input->post('updatemarkup')==true and ($this->input->post('forcommision')=='International Flight' or $this->input->post('forcommision')=='Domestic Flight')){
			if($this->input->post('markupid')==''){
				$flights=$this->user_model->add_data('agent_commision_markup',
															array('uid'=>$this->session->userdata('auid'),
																  'type'=>$this->input->post('updatemarkup'),
																  'adult_Commission'=>$this->input->post('Adult_commision'),
																  'Child_Commission'=>$this->input->post('Child_Commission'),
																  'Infant_Commission'=>$this->input->post('Infant_Commission'),														
																  'fixed'=>true,
																  'forcommision'=>$this->input->post('forcommision'),
																  'refrence_id'=>$this->input->post('refrenceid')
																)
													);
			}else{
				$flights=$this->user_model->update_data('agent_commision_markup',
															array(
																  'adult_Commission'=>$this->input->post('Adult_commision'),
																  'Child_Commission'=>$this->input->post('Child_Commission'),
																  'Infant_Commission'=>$this->input->post('Infant_Commission')
																  ),$this->input->post('markupid')
													);
				
			}
		 }
		
		$markuptype="International Flight";
		$markuptype=(isset($_GET['markuptype']) and $_GET['markuptype']!='')? $this->input->get('markuptype'):$markuptype;
		
		
		if($markuptype=="International Flight" or $markuptype=="Domestic Flight"){	
		 
		$flights=$this->agent_model->get_query_data('select fligt_name,flight_code,flight_image.id as fid, agent_commision_markup.* from flight_image left join agent_commision_markup on (flight_image.id=agent_commision_markup.`refrence_id` and  `forcommision`="'.$markuptype.'")');
		//print_r($flights);
		$data['flights']=$flights;
		}else{	
		 if(isset($_POST['updatemarkup']) and $this->input->post('updatemarkup')==true){
			 if($this->input->post('markupid')==''){
				$this->user_model->add_data('agent_commision_markup',
															array('uid'=>$this->session->userdata('auid'),
																  'type'=>$this->input->post('forcommision'),
																  'adult_Commission'=>$this->input->post('Adult_commision'), 													
																  'fixed'=>true,
																  'forcommision'=>$this->input->post('forcommision')
																  )
													); 
			 }else{
				 $this->user_model->update_data('agent_commision_markup',
															array(
																  'adult_Commission'=>$this->input->post('Adult_commision')),						                                                                   $this->input->post('markupid')
													);
			 }
		 }
		$otherdata=$this->agent_model->get_query_data('select agent_commision_markup.* from agent_commision_markup where `forcommision`="'.$markuptype.'"');
		
		$data['otherdata']=$otherdata;
		}
		
		$data['markuptype']=$markuptype;
		
    	$this->load->view('agent/edit_markup',$data);
    }

}
?>

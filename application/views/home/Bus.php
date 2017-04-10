<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Bus extends CI_Controller {



//Getting the Hotel data list either one way or round trip we used this method flight_list  and after getting the data from cross domain here we r using two page to view the availabile filght one page name is  flights_list for oneWay trip second page for round trip page name is RtripFlight which show round trip details. 
//them path \\Augurs11-pc\augurs server\preeti\kpholidays\html\kpholidays-travelo
//cunstructior
   var $Credentials;
  public function __construct()
   {
		parent::__construct();
		// Your own constructor code		
		
		$this->Credentials['Pyment'] =false;
		$this->Credentials['checkError']=false;
		$this->Credentials['live']=false;
		
		
		if($this->Credentials['live']){
			//Live
			$this->Credentials['LoginId'] ='CrestCosmos';
			$this->Credentials['Password'] ='apiCrestCosmos';		
			$this->Credentials['apiurl']="http://api.hermes-it.in/BUS_V1/Bus.svc/JSONService";
		}else{
			//demo
			$this->Credentials['LoginId'] ='hermes';
			$this->Credentials['Password'] ='hermes123';		
			$this->Credentials['apiurl']="http://115.248.39.80/hermesBusV1/Bus.svc/JSONService";
		}
		
   }
 
 public  function bus_list($agent=false)

   {
	   if($this->input->post('bus')=='search'){
		 if($this->input->post('Origin')=='' or $this->input->post('Destination')=='' or $this->input->post('bus_departureDate')==''){
		 	 redirect(base_url('/'), 'refresh');
		 }
		 
		 $origin=$this->region_model->getCitysBus($this->input->post('Origin'));
		if(empty($origin)){
			//msg orgin is not correct
			redirect(base_url('/'), 'refresh');
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
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'SearchInput'=>array(
															'OriginId'=>$searc_post['OriginId'],
															'DestinationId'=>$searc_post['Destination'],
															'TravelDate'=>$searc_post['bus_departureDate'],
														)
															
							);
					
		$result=$this->CutlPost('GetSearch',$postData);
		$result=json_decode($result,true);
		//print_r($result);	  
		$data['Buses']=$result;
		if($agent){
			echo json_encode($data);
			die;
		}
		 
	   $this->load->view('home/bus_list',$data); 
	   }else{
		   redirect(base_url('/'), 'refresh');
	   }
   }
   
   
   
   
   public  function GetSeatMap($ScheduleId=NULL,$UserTrackId=NULL)

   {
	   if($ScheduleId==NULL or $UserTrackId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);
		if($bus_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
	   
		 $searc_post=$this->session->userdata('search_post');		
			  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								"UserTrackId"=>$UserTrackId,
								'SeatMapInput'=>array(
															'ScheduleId'=>$ScheduleId,
															'StationId'=>$bus_dietail['StationId'],
															'TransportId'=>$bus_dietail['TransportId'],
															'TravelDate'=>$searc_post['bus_departureDate'],
														)
															
							);
							
		$result=$this->CutlPost('GetSeatMap',$postData);
		$result=json_decode($result,true);//print_r($result);
		if(!$result['ResponseStatus']){
			redirect(base_url('/index.php/bus/BusBooking/'.$ScheduleId), 'refresh');}
		$data['bus_dietail']=$bus_dietail;
		$data['bus_seat_map']=$result;	  
	   $this->load->view('home/bus_detailed',$data); 
	  
   }
   
   public  function GetSeatMapAgent($ScheduleId=NULL,$UserTrackId=NULL)

   {
	   
	   
		 	
			  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								"UserTrackId"=>$UserTrackId,
								'SeatMapInput'=>array(
															'ScheduleId'=>$ScheduleId,
															'StationId'=>$this->input->post('StationId'),
															'TransportId'=>$this->input->post('TransportId'),
															'TravelDate'=>$this->input->post('bus_departureDate'),
														)
															
							);
							
		echo $result=$this->CutlPost('GetSeatMap',$postData);		
		die;
		
	  
   }
   
    public  function BusBooking($ScheduleId)

   {
	   if($ScheduleId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);
		if($bus_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
		$this->load->library('PayUMoney');
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
		
		
		$bookingDetail=$this->session->userdata($this->input->post('udf2'));
		if(isset($_POST['status']) and $_POST['status']=='success' and isset($_POST['udf2']) and $bookingDetail!=''){
			$tseatselected=array();
		    foreach($bookingDetail['pasengerlist'] as $pasengerlist){
				$tseatselected[]=$pasengerlist['SeatTypeId'].'_'.$pasengerlist['SeatNo'];
			}
			$data['seatselected']=$tseatselected;
			$this->load->library('PayUMoney');
			if($this->payumoney->validatePayment()){
				
				$RefrenceID=$this->input->post('udf4');		
				$payData=array();				
				$payData['user_id']=$this->session->userdata('uid');
				$payData['FORPAYMENT']='Bussbooking';
				$payData['RefrenceID']=$_POST['udf4'];			
				$user_details=$this->savePuMoney($payData);	
				$response=$this->GetBook($bookingDetail);			
			    $response=json_decode($response,true);			
					if($response['ResponseStatus']){
						$this->saveBooking($response,$bookingDetail);				
						redirect(base_url('/index.php/bus/BusThankyou/'.$response['BookingOutput']['TicketDetails']['PNRDetails']['TransactionId'].'/'.$ScheduleId), 'refresh');
					
				}else{
					//booking failed
						$this->BookingFailed($bookingDetail);
					if(isset($response['ResponseStatus'])){
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Danger!</strong> '.$response['UserTrackId'].' '.$response['FailureRemarks'].' sorry for this problem please contact our customre care with payemntid '.$_POST['mihpayid'].' for return your payemnt 
								</div>');
					}else{
						$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Danger!</strong> '.strip_tags($response).' sorry for this problem please contact our customre care with payemntid '.$_POST['mihpayid'].' for return your payemnt.
								</div>');
					}
				}
			  }else{
				  $this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
								  <strong>Danger!</strong> Payemnt information not match.
								</div>');
			  }
			
			
		}else{
			if(isset($_POST['status']) and $_POST['status']!='success'){
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.$_POST['error'].' '.$_POST['error_Message'].'
                            </div>');
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
			$data['ScheduleId']=$bus_dietail['ScheduleId'];
			$data['StationId']=$bus_dietail['StationId'];
			$data['UserTrackId']=$Buses['UserTrackId'];
			$data['TravelDate']=$searc_post['bus_departureDate'];
			$data['pasengerlist']=$pasengerlist;
		    $response=$this->GetSeatBlock($data);
			$responseresult=json_decode($response,true);	
			//print_r($responseresult);die;		
			if(isset($responseresult['ResponseStatus']) and $responseresult['ResponseStatus']){
				if($responseresult['BlockingOutput']['BlockingStatus']){
					if($this->Credentials['Pyment']){
								$this->session->set_userdata('bookingDetail_'.$data['UserTrackId'],$data); 
								$this->load->library('PayUMoney');
								$payUmoney=array();
								 $payUmoney['productinfo']=array(array('name'=>"Hotel Booking",
												 'description'=>'Bus  Booking',
												 'value'=>$totla_price,
												 "isRequired"=>true));
								$payUmoney['amount']=$totla_price;
								$payUmoney['firstname']=$data['Name'];
								$payUmoney['lastname']='';
								$payUmoney['email']=$data['EmailId'];
								$payUmoney['phone']=$data['ContactNumber'];
								$payUmoney['surl']=base_url('/index.php/bus/BusBooking/'.$ScheduleId);	
								$payUmoney['furl']=base_url('/index.php/bus/BusBooking/'.$ScheduleId);
								$payUmoney['udf1']='BookingConfirmation';
								$payUmoney['udf2']='bookingDetail_'.$data['UserTrackId'];
								$payUmoney['udf3']='Busbooking';
								$payUmoney['udf4']=$data['UserTrackId'];
								
								$this->payumoney->setpayUMoney($payUmoney);		 	
								die;
							 }	
				}else{
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.$responseresult['UserTrackId'].' '.$responseresult['BlockingOutput']['Remarks'].'
                            </div>');
				}
				//print_r($data);die;
			$response=$this->GetBook($data);			
			$response=json_decode($response,true);			
			if($response['ResponseStatus']){	
					$this->saveBooking($response,$data);			
					redirect(base_url('/index.php/bus/BusThankyou/'.$response['BookingOutput']['TicketDetails']['PNRDetails']['TransactionId'].'/'.$ScheduleId), 'refresh');
				
			}else{
					
				if(isset($response['ResponseStatus'])){
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.$response['UserTrackId'].' '.$response['FailureRemarks'].'
                            </div>');
				}else{
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.strip_tags($response).'
                            </div>');
				}
			}
			}else{
				$responseresult=json_decode($response,true);				
				if(isset($responseresult['ResponseStatus'])){
				$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.$responseresult['UserTrackId'].' '.$responseresult['FailureRemarks'].'
                            </div>');
				}else{
					$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.strip_tags($response).'
                            </div>');
				}
			}
		}
	   
		 $searc_post=$this->session->userdata('search_post');		
			  
		$user_details=$this->user_model->user_uid($this->session->userdata('uid'));
		$data['user_details']=$user_details[0];	
		$data['bus_dietail']=$bus_dietail;
		$data['searc_post']=$searc_post;	  
	   $this->load->view('home/bus_booking',$data); 
	  
   }
   public function BusThankyou($tranctionid,$ScheduleId,$thankyou=false){
	   if(empty($tranctionid)){
	   	redirect(base_url('/'), 'refresh');
   		}
   	   $this->session->set_userdata('ScheduleId',$ScheduleId);
	   $bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);	
	   $result=$this->GetReprint($tranctionid);
	   $data['data']=json_decode($result,true);
	   $data['bus_dietail']=$bus_dietail;
	   //print_r($bus_dietail);
	   if(empty($data['data'])){
	   	redirect(base_url('/'), 'refresh');
   		}
   		if($thankyou){
			echo json_encode($data);die;
		}
	   $this->load->view('home/bus_thankyou',$data);
   }
   public  function GetSeatBlock($data)
   {
	   
	   if(empty($data)){
	   	redirect(base_url('/'), 'refresh');
   		}	
		
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'UserTrackId'=>$data['UserTrackId'],
								'BlockingInput'=>array('BookingCustomerDetails'=>array(
															'Title'=>trim($data['title']),
															'Name'=>$data['Name'],
															'Address'=>$data['Address'],
															'ContactNumber'=>$data['ContactNumber'],
															'City'=>$data['City'],
															'CountryId'=>91,
															'EmailId'=>$data['EmailId'],
															'IdProofId'=>$data['IdProofId'],
															'IdProofNumber'=>$data['IdProofNumber'],
															'BookedDate'=>$data['BookedDate']
															),
														'BookingDetails'=>array(
																		'TotalTickets'=>$data['TotalTickets'],
																		'TotalAmount'=>$data['TotalAmount'],
																		'TransportId'=>$data['TransportId'],
																		'ScheduleId'=>$data['ScheduleId'],
																		'StationId'=>$data['StationId'],
																		'TravelDate'=>$data['TravelDate'],
																		'PassengerList'=>$data['pasengerlist']
																		)
														)
															
							);
						//print_r($postData);	 	
		return $result=$this->CutlPost('GetSeatBlock',$postData);
		 
	   $this->load->view('home/bus_list',$result); 
	  
   }
  
  public  function GetBookAgent()
   {
	   $data=$_POST;
	   
	   
		
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'UserTrackId'=>$data['UserTrackId'],
								'BookingInput'=>array('BookingCustomerDetails'=>array(
															'Title'=>trim($data['title']),
															'Name'=>$data['Name'],
															'Address'=>$data['Address'],
															'ContactNumber'=>$data['ContactNumber'],
															'City'=>$data['City'],
															'CountryId'=>91,
															'EmailId'=>$data['EmailId'],
															'IdProofId'=>$data['IdProofId'],
															'IdProofNumber'=>$data['IdProofNumber'],
															'BookedDate'=>$data['BookedDate']
															),
														'BookingDetails'=>array(
																		'TotalTickets'=>$data['TotalTickets'],
																		'TotalAmount'=>$data['TotalAmount'],
																		'TransportId'=>$data['TransportId'],
																		'ScheduleId'=>$data['ScheduleId'],
																		'StationId'=>$data['StationId'],
																		'TravelDate'=>$data['TravelDate'],
																		'PassengerList'=>json_decode($data['pasengerlist'],true)
																		)
														)
															
							);
					//print_r($postData);	
		$result=$this->CutlPost('GetBook',$postData);
		$result=json_decode($result,true); 
		if($result['ResponseStatus']){
						$this->saveBooking($result,$data);	
						
					$amount = $this->user_model->user_wallet_amout($data['auid']); 
					$balance=$amount['0']['BALANCE'];
					
					$tdata=array();
					$tdata['user_id']=$data['auid'];
					$tdata['AGENTCODE']=$data['auid'];
					$tdata['GIREFID']=$result['UserTrackId'];
					$tdata['METHODID']="BusBooking";
					$tdata['BALANCE']=($balance-$data['TotalAmount']);
					$tdata['TOTALAMOUNT']=trim($balance);
					$tdata['DEBITAMOUNT']=trim($data['TotalAmount']);
					$tdata['RECHARGEFEE']=0;
					$tdata['REASON']="Bus Booking";
					$tdata['STATUSCODE']=0;
					$tdata['STATUSDESCRIPTION']='SUCCESS';		
					$this->user_model->DMR_add_transaction($tdata);	
					$this->user_model->user_wallet_amout_update(($balance-$data['TotalAmount']),$data['auid']);	
						
					
				}
	  echo json_encode($result);die;
   } 
   
  public  function GetBook($data)
   {
	   if(empty($data)){
	   	redirect(base_url('/'), 'refresh');
   		}	
	   
		
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'UserTrackId'=>$data['UserTrackId'],
								'BookingInput'=>array('BookingCustomerDetails'=>array(
															'Title'=>trim($data['title']),
															'Name'=>$data['Name'],
															'Address'=>$data['Address'],
															'ContactNumber'=>$data['ContactNumber'],
															'City'=>$data['City'],
															'CountryId'=>91,
															'EmailId'=>$data['EmailId'],
															'IdProofId'=>$data['IdProofId'],
															'IdProofNumber'=>$data['IdProofNumber'],
															'BookedDate'=>$data['BookedDate']
															),
														'BookingDetails'=>array(
																		'TotalTickets'=>$data['TotalTickets'],
																		'TotalAmount'=>$data['TotalAmount'],
																		'TransportId'=>$data['TransportId'],
																		'ScheduleId'=>$data['ScheduleId'],
																		'StationId'=>$data['StationId'],
																		'TravelDate'=>$data['TravelDate'],
																		'PassengerList'=>$data['pasengerlist']
																		)
														)
															
							);
					//print_r($postData);	
		return $result=$this->CutlPost('GetBook',$postData);
		
	  
   }
   
  public  function GetTransactionStatus($UserTrackId)
   {
	   
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'UserTrackId'=>''														
							);
							
		$result=$this->CutlPost('GetTransactionStatus',$postData);
		print_r($result);	  
	   $this->load->view('home/bus_list',$result); 
	  
   }
   
   public  function GetReprint($TransactionId=NULL)
   {
	   if($TransactionId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		
	   
		
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'ReprintInput'=>array('TransactionId'=>$TransactionId)														
							);
							
		return $result=$this->CutlPost('GetReprint',$postData);
		
	  
   }
   
   public  function GetCancellationPolicy($TransportId)
   {
	  
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'CancellationPolicyInput'=>array('TransportId'=>$TransportId)														
							);
							
		return $result=$this->CutlPost('GetCancellationPolicy',$postData);
		
	   $this->load->view('home/bus_list',$result); 
	  
   }
   
   public  function GetCancellationPenalty($TransactionId)
   {
	  	  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'CancellationPenaltyInput'=>array('TransactionId'=>$TransactionId)														
							);
							
		echo $result=$this->CutlPost('GetCancellationPenalty',$postData);die;
		//print_r($result);	  
	   $this->load->view('home/bus_list',$result); 
	  
   }
   
   public  function GetCancellation($TransactionId)
   {
	     //$result=$this->GetCancellationPolicy(24);		
		 //$result=$this->GetTransactionStatus();
		 $result=$this->GetCancellationPenalty($TransactionId);
		 $result=json_decode($result,true);
		  //print_r($result);die;
		  $cancelticketnumber='';
		  foreach($result['CancellationPenaltyOutput']['ToCancelPNRDetails']['ToCancelPaxList'] as $tickets){
			   $cancelticketnumber.=$tickets['TicketNumber'].',';
		  }
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'CancellationInput'=>array('TransactionId'=>$TransactionId,
															'TotalTicketsToCancel'=>count($result['CancellationPenaltyOutput']['ToCancelPNRDetails']['ToCancelPaxList']),
															'PenaltyAmount'=>$result['CancellationPenaltyOutput']['ToCancelPNRDetails']['PenatlyAmount'],
															'TicketNumbers'=>$cancelticketnumber,
															'TransportId'=>24
													)														
							);
							
		echo $result=$this->CutlPost('GetCancellation',$postData);
		print_r(json_decode($result,true));	  die;
	  // $this->load->view('home/bus_list',$result); 
	  
   }
  
  
   public  function GetBookedHistory()
   {
	   if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
	   
		$searc_post=array();
		 $searc_post['way']=$this->input->post('way');
		 $searc_post['Origin']=$this->input->post('Origin');
		 $searc_post['Destination']=$this->input->post('Destination');
		 $searc_post['bus_returnDate']=$this->input->post('bus_returnDate');
		 $searc_post['bus_departureDate']=$this->input->post('bus_departureDate');
		 $searc_post['Seats']=$this->input->post('Seats');
		 $this->session->set_userdata('search_post', $searc_post);		  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'BookedHistoryInput'=>array('FromDate'=>'',
															'ToDate'=>'',
															'RecordsBy'=>''															
													)														
							);
							
		$result=$this->CutlPost('GetBookedHistory',$postData);
		print_r($result);	  
	   $this->load->view('home/bus_list',$result); 
	  
   }
   
    public  function GetAccountStatement()
   {
	   if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
	   
		$searc_post=array();
		 $searc_post['way']=$this->input->post('way');
		 $searc_post['Origin']=$this->input->post('Origin');
		 $searc_post['Destination']=$this->input->post('Destination');
		 $searc_post['bus_returnDate']=$this->input->post('bus_returnDate');
		 $searc_post['bus_departureDate']=$this->input->post('bus_departureDate');
		 $searc_post['Seats']=$this->input->post('Seats');
		 $this->session->set_userdata('search_post', $searc_post);		  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								),
								'AccountStatementInput'=>array('FromDate'=>'',
															'ToDate'=>''
																													
													)														
							);
							
		$result=$this->CutlPost('GetAccountStatement',$postData);
		print_r($result);	  
	   $this->load->view('home/bus_list',$result); 
	  
   }  
  
   
   
   public  function GetAgentCreditBalance()
   {
	   if($Providerid==NULL or $HotelId==NULL){
	   	redirect(base_url('/'), 'refresh');
   		}
		$hotel_dietail=$this->session->userdata('Hotel_'.$HotelId);
		if($hotel_dietail==''){
	   	redirect(base_url('/'), 'refresh');
   		}
	   
		$searc_post=array();
		 $searc_post['way']=$this->input->post('way');
		 $searc_post['Origin']=$this->input->post('Origin');
		 $searc_post['Destination']=$this->input->post('Destination');
		 $searc_post['bus_returnDate']=$this->input->post('bus_returnDate');
		 $searc_post['bus_departureDate']=$this->input->post('bus_departureDate');
		 $searc_post['Seats']=$this->input->post('Seats');
		 $this->session->set_userdata('search_post', $searc_post);		  
		   $result=array();
		   $postData=array(
								'Authentication'=>array(
														'LoginId'=>$this->Credentials['LoginId'],
														'Password'=>$this->Credentials['Password']
								)
																					
							);
							
		$result=$this->CutlPost('GetAgentCreditBalance',$postData);
		print_r($result);	  
	   $this->load->view('home/bus_list',$result); 
	  
   }
     
  public function BusGetOrigin_save(){
	  
	  $postData=array(
							'Authentication'=>array(
													'LoginId'=>$this->Credentials['LoginId'],
													'Password'=>$this->Credentials['Password']
							)
						);
		$result=$this->CutlPost('GetOrigin',$postData);	
		$result=json_decode($result,true);
			//print_r($result);die;
			$citycount=0;
		  foreach($result['OriginOutput']['OriginCities'] as $city){  
			  
			  $data['OriginId']=$city['OriginId'];
			  $data['OriginName']=$city['OriginName'];		  
			  $this->region_model->insertcityBus($data);
			  $citycount++;
		  }
		  echo $citycount ."citys saved";
		  die;
  }
   
  public function BusGetOrigin(){  
	  
		$term=$this->input->get('term');
		
		$options = array();	
		$result=$this->region_model->getCitysBus($term);
		
		foreach($result as $key=>$val){
			
			 $options['myData'][] = array(
				'OriginName' => $val['OriginName'],
				'OriginName'=> $val['OriginName']
			); 
			
		}
		echo json_encode($options);
	
  
	  }
  
  public function BusGetDestination(){
	  
	    $originId=$this->input->get('term');
		$origin=$this->region_model->getCitysBus($originId);
		if(empty($origin)){
			echo 'false';
			exit();
		}
		$postData=array(
							'Authentication'=>array(
													'LoginId'=>$this->Credentials['LoginId'],
													'Password'=>$this->Credentials['Password']
							),
							'DestinationInput'=>array(
														'OriginId'=>$origin[0]['OriginId']
													)
														
						);
		$result=$this->CutlPost('GetDestination',$postData);	
		$result=json_decode($result,true);
		if(isset($result['DestinationOutput']['DestinationCities'][0])){
			echo json_encode($result['DestinationOutput']['DestinationCities']);
			exit();
		}else{
			echo 'false';
			exit();
		}
		
	
  }
  
  function savePuMoney($payData){
		
				$payData['mihpayid']=$_POST['mihpayid'];
				$payData['mode']=$_POST['mode'];
				$payData['status']=$_POST['status'];
				$payData['txnid']=$_POST['txnid'];
				$payData['amount']=$_POST['amount'];
				$payData['discount']=$_POST['discount'];
				$payData['productinfo']=json_encode($_POST['productinfo']);
				$payData['firstname']=$_POST['firstname'];
				$payData['lastname']=$_POST['lastname'];
				$payData['address1']=$_POST['address1'];				
				//$payData['address2']=$_POST['address2'];
				$payData['city']=$_POST['city'];
				$payData['state']=$_POST['state'];				
				$payData['country']=$_POST['country'];
				$payData['bank_ref_num']=$_POST['bank_ref_num'];
				$payData['unmappedstatus']=$_POST['unmappedstatus'];
				$payData['payuMoneyId']=$_POST['payuMoneyId'];
				$user_details=$this->user_model->savePayUMoney($payData);
	}
	
	function saveBooking($data,$bookingdetails){	 
	  
	  		 // print_r($bookingdetails);
				$payData['uid']=(isset($bookingdetails['auid']))?$bookingdetails['auid']:$this->session->userdata('uid');				
				$payData['UserTrackId']=$data['UserTrackId'];
				$payData['ContactNumber']=$bookingdetails['ContactNumber'];	
				$payData['TransportId']=$bookingdetails['TransportId'];				
				$payData['TransactionId']=$data['BookingOutput']['TicketDetails']['PNRDetails']['TransactionId'];
				$payData['TransportPNR']=$data['BookingOutput']['TicketDetails']['PNRDetails']['TransportPNR'];
				$payData['TotalAmount']=$data['BookingOutput']['TicketDetails']['PNRDetails']['TotalAmount'];
				$payData['TotalTickets']=$data['BookingOutput']['TicketDetails']['PNRDetails']['TotalTickets'];
				$payData['BusName']=$data['BookingOutput']['TicketDetails']['PNRDetails']['BusName'];
				$payData['Origin']=$data['BookingOutput']['TicketDetails']['PNRDetails']['Origin'];
				$payData['Destination']=$data['BookingOutput']['TicketDetails']['PNRDetails']['Destination'];
				$payData['TravelDate']=date("Y-m-d",strtotime(str_replace("/","-",$data['BookingOutput']['TicketDetails']['PNRDetails']['TravelDate'])));
				$payData['DepartureTime']=$data['BookingOutput']['TicketDetails']['PNRDetails']['DepartureTime'];
				$payData['status']='CONFIRM';	

				if($user_details=$this->user_model->add_data('bus_bookings',$payData)){
				
				$this->load->model('sendmail_model');
				unset($payData['uid']);
				$data['msgData']=$payData;
				$msg=$this->load->view('email/customer',$data,true);
				$email=$this->session->userdata('email');
				$this->sendmail_model->send_mail2("no-reply@kpholidays.com","kpholidays",$email,'kpholidays User Registration',$msg);

				return true;
				}else{
					die("some error occured in saveBooking");
				}
  }	
  
  function BookingFailed($data){  
	  		
				$payData['uid']=$this->session->userdata('uid');				
				$payData['UserTrackId']=$data['UserTrackId'];
				$payData['ForBooking']='BUS';
				$payData['PyaUID']=$_POST['mihpayid'];;
				$payData['TotalAmount']=$_POST['amount'];
				$payData['data']=json_encode($data);				
				$user_details=$this->user_model->add_data('booking_failed',$payData);
				
  	}	
	    
  function CutlPost($url,$postdata){
	  $url=$this->Credentials['apiurl'].'/'.$url;
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
	  
  }
   
  
 	function user_getGetCancellation($agent='false'){
	  
	$responsdata=array(); 	
	 if(!$this->input->post('TicketNumber')){
	   	redirect(base_url('/'), 'refresh');
   		}   	
		
		if($agent=='true'){
			$_POST['TicketNumber']=json_decode($_POST['TicketNumber'],true);
		}
		$TotalTicketsToCancel=count($this->input->post('TicketNumber'));
		$TicketNumbers="";
		$PenaltyAmount=0;
		foreach($this->input->post('TicketNumber') as $tickets){
			$ticketarray=explode("_",$tickets);
			$TicketNumbers.=$ticketarray[0].',';
			$PenaltyAmount=$PenaltyAmount+($ticketarray[1]);
		}
		
		$postData=array(
							'Authentication'=>array(
													'LoginId'=>$this->Credentials['LoginId'],
													'Password'=>$this->Credentials['Password']
							),
							'CancellationInput'=>array(
														'TransactionId'=>$this->input->post('TransactionId'),
														'TotalTicketsToCancel'=>$TotalTicketsToCancel,
														'PenaltyAmount'=>$PenaltyAmount,
														'TicketNumbers'=>$TicketNumbers,
														'TransportId'=>$this->input->post('TransportId')
													)
														
						);
						  
		$result=$this->CutlPost('GetCancellation',$postData);
		if($agent=='true'){
			echo $result;die;
		}
		$result=json_decode($result,true);
		//print_r($result);die;		
		if($result['ResponseStatus']){
			if(isset($result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails'])){
				
				
				
				$payData['uid']=$this->session->userdata('uid');				
				$payData['HermesPNR']=$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['TransportPNR'];	
				$payData['ForTicket']='BUS';
				$payData['AirlinePNR']=$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['CancellationNumber'];
				$payData['CanceledPNRDetails']=json_encode($result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']);									
				$this->user_model->add_data('canceled_tickets',$payData);

				$condition = array('TransportPNR'=>$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['TransportPNR']);
				$this->user_model->update_table_data('bus_bookings', $condition);
				//send mail;
				$this->load->model('sendmail_model');
				unset($payData['uid']);
				$payData['CanceledPNRDetails'] = implode(",",json_decode($payData['CanceledPNRDetails'],true));
					
				$data['msgData']=$payData;
				$msg=$this->load->view('email/customer',$data,true);
				$email=$this->session->userdata('email');
				$this->sendmail_model->send_mail2("no-reply@kpholidays.com","kpholidays",$email,'kpholidays User Registration',$msg);
				
			 $this->session->set_flashdata('msg',  '<div class="alert alert-success" style="color:black">
                              <strong>Msg!</strong> ticket successfully canceled with Cancellation Number '.$result['CancellationOutput']['CanceledTicketDetails']['CanceledPNRDetails']['CancellationNumber'].'
                            </div>');
			redirect(base_url('/index.php/user/upcoming_bus_booking'), 'refresh');
			}else{
				 $this->session->set_userdata('canceldata', $result);
				$responsdata['details']=$result;
			}
				
		}else{
			$this->session->set_flashdata('msg',  '<div class="alert alert-danger" style="color:black">
                              <strong>Danger!</strong> '.@$result['FailureRemarks'].'
                            </div>');
				redirect(base_url('/index.php/user/upcoming_bus_booking'), 'refresh');
		}
	}


	public function get_print($tranctionid){
	  	$condition = array('TransactionId'=>$tranctionid);
	  	// $data = $this->user_model->get_data('bus_bookings', $condition);
	  	$ScheduleId = $this->session->userdata('ScheduleId');
	  	$bus_dietail=$this->session->userdata('Bus_'.$ScheduleId);
	  	$result=$this->GetReprint($tranctionid);
   	    $data['data']=json_decode($result,true);
	    $data['bus_dietail']=$bus_dietail;
	    $data['status'] = $this->user_model->ticket_status($tranctionid);

	  	$printDetail = array('full_detail'=>$data);
	  	print_r($printDetail);
	  	$this->load->view('user/print-bus-ticket',$printDetail);
	}
	
	public function get_printHome($tranctionid){
	  	$condition = array('TransactionId'=>$tranctionid);	  	
	  	$result=$this->GetReprint($tranctionid);
   	    $data['data']=json_decode($result,true);
	   // $data['bus_dietail']=$bus_dietail;
	    $data['status'] = $this->user_model->ticket_status($tranctionid);
	  	$printDetail = array('full_detail'=>$data);
	  	$this->load->view('user/print-bus-ticket',$printDetail);
	}
		
 

}




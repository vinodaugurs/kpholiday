<?php
//print_r($bus_dietail);
//print_r($searc_post);
$pasenger_count=(isset($seatselected) and is_array($seatselected) and count($seatselected)>0)?count($seatselected):$searc_post['Seats'];
$boarding_point_txt='';
$boarding_point_time='';

foreach($bus_dietail['BoardingPoints'] as $key=>$brdn){
	if(isset($boarding_point) and $boarding_point==$brdn['BoardingId']){
		$boarding_point_txt=$brdn['Place'].','.$brdn['Address'];
		$boarding_point_time=($brdn['Time']!='')?$brdn['Time']:$bus_dietail['DepartureTime'];
		break;
	}else{
		$boarding_point_txt=$searc_post['Origin'];
		$boarding_point=$searc_post['OriginId'];
		$boarding_point_time=$bus_dietail['DepartureTime'];
	}
}

if((!isset($boarding_point)) or $boarding_point==''){
	$boarding_point_txt=$searc_post['Origin'];
	$boarding_point=$searc_post['OriginId'];
	$boarding_point_time=$bus_dietail['DepartureTime'];
}

$dropping_point_txt='';
$dropping_point_time='';

foreach($bus_dietail['DroppingPoints'] as $key=>$brdn){
	if(isset($dropping_point) and $dropping_point==$brdn['DroppingId']){
		$dropping_point_txt=$brdn['Place'].','.$brdn['Address'];
		$dropping_point_time=($brdn['Time']!='')?$brdn['Time']:$bus_dietail['ArrivalTime'];
		break;
	}else{
		$dropping_point_txt=$searc_post['bus_destination_code'];
		$dropping_point=$searc_post['Destination'];
		$dropping_point_time=$bus_dietail['ArrivalTime'];
	}
}
 
if((!isset($dropping_point)) or $dropping_point==''){
	$dropping_point_txt=$searc_post['bus_destination_code'];
	$dropping_point=$searc_post['Destination'];
	$dropping_point_time=$bus_dietail['ArrivalTime'];
}

//calculate price 
$priceBySeat=array();
foreach($bus_dietail['Fares'] as $fare){
   $priceBySeat[$fare['SeatTypeId']]['Fare']=$fare['Fare'];
   $priceBySeat[$fare['SeatTypeId']]['ServiceTax']=$fare['ServiceTax'];
}
//print_r($bus_dietail);
$base_price=0;
$tax_price=0;
$totla_price=0;
	
if(isset($seatselected) and is_array($seatselected) and count($seatselected)>0){	
	foreach($seatselected as $seat){
		$seat_rec=explode("_",$seat);
		$set_typeid=$seat_rec[0];
		$set_number=$seat_rec[1];
		$base_price=$base_price+($priceBySeat[$set_typeid]['Fare']-$priceBySeat[$set_typeid]['ServiceTax']);
		$tax_price=$tax_price+$priceBySeat[$set_typeid]['ServiceTax'];
		$totla_price=$totla_price+$priceBySeat[$set_typeid]['Fare'];
	}
}else{
	$base_price=($bus_dietail['Fares'][0]['Fare']-$bus_dietail['Fares'][0]['ServiceTax']);
	$tax_price=$tax_price-($bus_dietail['Fares'][0]['ServiceTax']);
	$totla_price=($bus_dietail['Fares'][0]['Fare']);
}
?>		
<?php  $this->load->view('agent/header');?> 
<?php include'sub-header.php';?> 						
   <div id="page-wrapper">
	
        
        
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                             <?php echo $this->session->flashdata('msg');?>
                            <form class="booking-form" method="post">
                                <div class="person-information">
                                    <h2>Your Personal Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Title</label>
                                            <select name="title" class="full-width">
                                                	<option <?php echo (set_value('title')=='Mr.')?'selected':''; ?>>Mr.</option>
                                                    <option <?php echo (set_value('title')=='Mrs')?'selected':''; ?>>Mrs</option>
                                                    <option <?php echo (set_value('title')=='Miss')?'selected':''; ?>>Miss</option>
                                                    
                                                </select>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Name</label>                                            
                                            <input required type="text" name="name" class="input-text full-width" value="<?php echo (set_value('name')== false)?$user_details['first_name'].' '.$user_details['last_name']:set_value('name') ?>" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" readonly required class="input-text full-width"  name="email" placeholder="email address" value="<?php echo (set_value('email')== false)?$user_details['email']:set_value('email'); ?>" />                                          
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Mobile</label>                                           
                                            <input type="text" required class="input-text full-width" name="mobile" value="<?php echo (set_value('mobile')== false)?$user_details['phone']:set_value('mobile') ?>" placeholder="Phone number" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Address</label>
                                            <div class="selector">                                              
                                               <input type="text" required class="input-text full-width" name="address" value="<?php echo (set_value('address')== false)?$user_details['address']:set_value('address') ?>" placeholder="Address" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                        <?php 
                                        $countryValue = $user_details['country'];
                                        $countryData = $this->region_model->getCountryValue($countryValue);
                                         ?>
                                             <label>Country</label>
                                            <div class="selector">
                                                <select name="country" class="full-width" id="country">
                                                <option value="">-Select Country-</option>
                                                    <?php foreach($countryData as $value){ 
                                                        
                                                        if( $user_details['country'] == $value['id']){
                                                            echo '<option value="'.$value["country"].'" selected>';
                                                        }else{echo '<option value="'.$value["country"].'">';}
                                                         
                                                         echo $value['country'].'</option>';

                                                         }?>


                                                                                                         
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">

                                            <?php 
                                            $state = $user_details['state'];
                                            $stateData = $this->region_model->getStateValue($state);
                                            ?>

                                             <label>State</label>
                                            <div class="selector">
                                                <select name="state" class="full-width" id="dropGetState">
                                                    <option value="">-Select State-</option>
                                                    <?php if(isset($user_details['state'])){
                                                    echo '<option value="'.$stateData["0"]["state"].'" selected>'.$stateData['0']['state'].'</option>';
                                                    } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">

                                             <label>City</label>
                                             <div class="selector">

                                           <?php 
                                            $city = $user_details['city'];
                                            $cityData = $this->region_model->getCityValue($city);
                                            ?>

                                            <select  name="city" id="dropGetCity" class="form-control" required>
                                            <option value="">-Select City-</option>
                                            <?php if(isset($user_details['city'])){
                                                echo '<option value="'.$cityData["0"]["city"].'" selected>'.$cityData['0']['city'].'</option>';
                                                } ?>
                                            </select>

                                              </div>
                                        </div>
                                    </div>

<script type="text/javascript">
$(document).ready(function(){
   
   //get state
$('#country').change(function(){        
   $('#dropGetState').html();
   var getCountryData = $('#country').val();
    $.ajax({
    type:"get",
    url:"<?php echo base_url('index.php/user/getStateBooking/')?>/"+getCountryData,
    success: function(dataJson){
      
      data = JSON.parse(dataJson)
      var optionss = '<option value="">-Select State-</option>';
      $(data).each(function(index, element){                       
      optionss=optionss+'<option value="'+element.state+'">'+element.state+'</option>'
      });

      $('#dropGetState').html(optionss);
      $('#dropGetState').siblings('.custom-select').remove();
      changeTraveloElementUI();

      },
    error:function(data){
      }
    });
});



//get city data
    $('#dropGetState').change(function(){
      var state1 = $('#dropGetState').val();
   $.ajax({
     type:"get",
     url:"<?php echo base_url('index.php/user/getcityBooking')?>/"+state1,
    success: function(dataJson){
      data = JSON.parse(dataJson)
        var optionss = '<option value="">-Select City-</option>';
       $(data).each(function(index, element) {
             optionss = optionss+'<option value="'+element.city+'">'+element.city+'</option>'
            });
      $('#dropGetCity').html(optionss);
      $('#dropGetCity').siblings('.custom-select').remove();
      changeTraveloElementUI();
       },
     error: function(data){
       }
     });
    });


    
});
</script>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                           <label>PostalCode</label>                                            
                                             <input required type="text" class="input-text full-width" name="post" value="<?php echo (set_value('post')== false)?$user_details['PinCode']:set_value('post') ?>" placeholder="PinCode" />
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                           <label>IdProof Type</label>
                                            <select name="IdProofId" class="full-width">                                         
                                                	<option <?php echo (set_value('IdProofId')=='3')?'selected':''; ?> value="3">VoterId</option>
                                                    <option <?php echo (set_value('IdProofId')=='4')?'selected':''; ?> value="4">Driving License</option>
                                                    <option <?php echo (set_value('IdProofId')=='5')?'selected':''; ?> value="5">PAN Card</option>
                                                     <option <?php echo (set_value('IdProofId')=='1')?'selected':''; ?> value="1">Passport</option>
                                                    
                                                </select>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>IdProof Number</label>
                                            <input name="IdProofNumber" required type="text" class="input-text full-width" value="<?php echo (set_value('IdProofNumber')!=false)?set_value('IdProofNumber'):''; ?>" placeholder="" />
                                        </div>
                                    </div>
                                    
                                    <!--<div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input  type="checkbox"> I want to receive <span class="skin-color">KP Holidays</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>-->
                                </div>
                                <hr />
                                <div class="card-information">
                                    <h2>Passenger Details</h2>
                                    <?php for($i=1;$i<=$pasenger_count;$i++){?>
                                    <?php $j=$i-1;?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>PassengerName <?php echo $i?></label>
                                            <input name="PassengerName[]" required type="text" class="input-text full-width" placeholder="Passenger Name" value="<?php echo (set_value("PassengerName[$j]")!= false)?set_value("PassengerName[$j]"):'' ?>" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Gender</label>
                                            <div class="selector">
                                                <select name="PassengerGender[]" class="full-width">
                                                    <option <?php echo (set_value("PassengerGender[$j]")=='M')?'selected':''; ?> value="M">Male</option>
                                                     <option <?php echo (set_value("PassengerGender[$j]")=='F')?'selected':''; ?> value="F">Female</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Age</label>
                                            <input type="number" name="PassengerAge[]" required class="input-text full-width" value="<?php echo (set_value("PassengerAge[$j]")!= false)?set_value("PassengerAge[$j]"):'' ?>" placeholder="" />
                                            
                                            <input type="hidden" name="PassengerSeatNo[]"  class="input-text full-width" value="<?php echo (set_value("PassengerSeatNo[$j]")!= false)?set_value("PassengerSeatNo[$j]"):$seatselected[$j] ?>" placeholder="" />
                                            
                                            <input type="hidden" name="PassengerSeatTypeId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerSeatTypeId[$j]")!= false)?set_value("PassengerSeatTypeId[$j]"):'' ?>" placeholder="" />
                                            <input type="hidden" name="PassengerFare[]"  class="input-text full-width" value="" placeholder="<?php echo (set_value("PassengerFare[$j]")!= false)?set_value("PassengerFare[$j]"):'' ?>" />
                                            <input type="hidden"  name="PassengerBoardingId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerBoardingId[$j]")!= false)?set_value("PassengerBoardingId[$j]"):$boarding_point?>" placeholder="" />
                                            <input type="hidden" name="PassengerDroppingId[]"  class="input-text full-width" value="<?php echo (set_value("PassengerDroppingId[$j]")!= false)?set_value("PassengerDroppingId[$j]"):$dropping_point?>" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                           
                                        </div>
                                    </div>
                                    <hr/>
                                    <?php } ?>
                                </div>
                                <hr/>
                                
                                
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input required type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" name="bookb" value="confirm" class="full-width btn-large">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                        <?php 
								$BusType=($bus_dietail['BusType']=='AC')?'AC Bus':'Bus';
								$markepdata=$this->agent_model->get_busMrakup($BusType);
								$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;?>
                            <h4>Booking Details</h4>
                            <article class="image-box hotel listing-style1">
                                <figure class="clearfix">
                                    
                                    <div class="travel-title">
                                     <?php $Buses=$this->session->userdata('SearchOutput');?>
                                        <h5 class="box-title"><?php echo $bus_dietail['BusName']?><small><?php echo $bus_dietail['TransportName']?></small></h5>
                                        <?php if(isset($seatselected)){?>
                                        <a href="<?php echo base_url('index.php/agent/GetSeatMap/'.$bus_dietail['ScheduleId'].'/'.$Buses['UserTrackId']);?>" class="button">EDIT</a>
                                        <?php } ?>
                                    </div>
                                </figure>
                                <div class="details">
                                    
                                    <div class="constant-column-5 timing clearfix">
                                        
                                    </div>
                                    
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Bus Type:</dt><dd class="value"><?php echo $bus_dietail['BusType']?></dd>
                                <dt class="feature">Boarding:</dt><dd class="value"><?php echo $boarding_point_txt?></dd>
                                <dt class="feature">Boarding Time:</dt><dd class="value"><?php echo $boarding_point_time;?></dd>
                                <dt class="feature">Dropping:</dt><dd class="value"><?php echo $dropping_point_txt?></dd>
                                <dt class="feature">DroppingPoints Time:</dt><dd class="value"><?php echo $dropping_point_time;?></dd>
                                <dt class="feature">Seat(s):</dt><dd class="value"><?php echo $pasenger_count;?></dd>
                                <dt class="feature">Base Fare:</dt><dd class="value"><?php echo $base_price;?></dd>
                                <dt class="feature">Service Tax:</dt><dd class="value"><?php echo $tax_price;?></dd>
                                <dt class="total-price">Total Price:</dt><dd class="total-price-value"><?php echo $totla_price;?></dd>
                                <dt class="feature">Agent Markup:</dt><dd class="value"> RS <?php echo $markup?>(Per Ticket)</dd>

                              <?php
                                $getCom = $bus_dietail['Commission'];
                                 if($getCom=='0.00'){ $commission = $getCom;  }else{

                                  if($bus_dietail['BusType']=='AC'){
                                    $commissionData = $this->session->userdata('Bus_commission_ac');

                                    $getCommission =  $this->agent_model->get_data_table('agent_commision_markup',array('forcommision'=>'AC Bus','uid'=>4545));
                                    $commission = (($commissionData*$getCommission['0']['adult_Commission'])/100);
                                  }else{
                                    $commissionData = $this->session->userdata('Bus_commission_nonAC');

                                    $getCommission =  $this->agent_model->get_data_table('agent_commision_markup',array('forcommision'=>'Non AC Bus','uid'=>4545));
                                    $commission = (($commissionData*$getCommission['0']['adult_Commission'])/100);


                                  }
                                  $this->session->set_userdata('bus_final_commission_value',$commission);
                                    // echo $this->session->userdata('bus_final_commission_value');

                                 }
                                 ?>

                                <dt class="total-price">Total Price:</dt><dd class="total-price-value"><?php echo $totla_price+($markup*$pasenger_count)+$commission;?>
                            </dl>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>Need KP Holidays Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@KP Holidays.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Fare Details</h4>
        <a href=""></a>
	  </div>
      <div class="modal-body">
        <!-- Nav tabs -->

      <div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
 	  </div>
	  <p  id="wait" align="center">Please Wait ....</p>
	  <p  class="fare_rule">
	  
	  </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
 </div>
  


 
  <!-- Google Map Api -->
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    
<script>    //Finding the fare Rule and Tax  Details                   

$(document).ready(function(){      
	
$(".farerule").click(function()
  {
	var fare=$(this).attr('id');
	datat=$("#div_"+fare).html();
       var fare = JSON.parse(datat);
   $.ajax({
		
		type:"post",
		url:"<?php echo base_url('index.php/flight/internal_tax_fare');?>",
		data : {value: fare},
		 beforeSend: function() {
             
             
           },
        success:function(data)
        {     
			   $('.fare_rule').html(data);
               $(".preloader").hide(); 
			   $("#wait").hide();
		}		
	}); 
 });
	$(".selectnow").click(function(){
		
		var booking_data=$(this).attr('id');
		datat=$("#sdiv_"+booking_data).html();
        var booking_data = JSON.parse(datat);
	     $.ajax({
			 type:"post",
             url:"<?php echo base_url('index.php/flight/International_OnewayBooking');?>",			 
		     data : {value: booking_data},
			   success:function(data)
               {     
			    alert(data);
			    window.location.href='<?php echo base_url('index.php/flight/InternationalBookingRespons');?>';
		       }
		 });
	});	  
  
});
</script>

<?php  include'footer.php';?> 


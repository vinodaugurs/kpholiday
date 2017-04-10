<?php $search_post=$this->session->userdata('search_post');

 
												$CheckInarray=explode("/",$search_post['checkin']);
												$CheckOutarray=explode("/",$search_post['checkout']);
										         $CheckIn = strtotime($CheckInarray[2].'/'.$CheckInarray[0].'/'.$CheckInarray[1]);
												 $CheckOut = strtotime($CheckOutarray[2].'/'.$CheckOutarray[0].'/'.$CheckOutarray[1]);
												 $datediff = $CheckOut - $CheckIn;
												 $nights=floor($datediff/(60*60*24));
 $room_name="";
 $room_price="";
 $room_tax="";
 
									if(array_key_exists(0,$ghoteldietail['RoomTypes']['RoomType'])){
										foreach($ghoteldietail['RoomTypes']['RoomType'] as $RatePlan){
											if($Bookingkey==$RatePlan['@attributes']['Bookingkey']){
											$room_name=$RatePlan['@attributes']['Roomname'];
											$room_price=($RatePlan['@attributes']['GIRoomChargesINR']);
											$room_tax=$RatePlan['@attributes']['TaxesINR'];
											}
										}
									}else{
										$room_name=$ghoteldietail['RoomTypes']['RoomType']['@attributes']['Roomname'];
											$room_price=$ghoteldietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR'];
											$room_tax=$ghoteldietail['RoomTypes']['RoomType']['@attributes']['TaxesINR'];
									}
$markepdata=$this->agent_model->get_busMrakup('International Hotel');
$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;
											?>	
<?php  $this->load->view('agent/header');?> 
<?php include'sub-header.php';?>                                    								
   <div id="page-wrapper">
	
        
       
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                     <?php echo $this->session->flashdata('msg');?>
                        <div class="booking-section travelo-box">
                            
                            <form class="booking-form" method="post">
                                <div class="person-information">
                                    <h2>Your Personal Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>first name</label>
                                            <input required name="first_name" type="text" class="input-text full-width" value="<?php echo (set_value('first_name')== false)?$user_details['first_name']:set_value('first_name') ?>" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>last name</label>
                                            <input required name="last_name" type="text" class="input-text full-width" value="<?php echo (set_value('last_name')== false)?$user_details['first_name'].''.$user_details['last_name']:set_value('last_name') ?>" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input required name="email" type="email" class="input-text full-width" value="<?php echo (set_value('email')== false)?$user_details['email']:set_value('email'); ?>" placeholder="" />
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Mobile</label>
                                            <input name="mobile" type="text" class="input-text full-width" value="<?php echo (set_value('mobile')== false)?$user_details['phone']:set_value('mobile') ?>" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Address</label>
                                            <div class="selector">
                                               <input name="address" type="text" class="input-text full-width" value="<?php echo (set_value('address')== false)?$user_details['address']:set_value('address') ?>" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                             <label>Country</label>
                                            <div class="selector">


                                                <?php $country = $this->region_model->getcountry(); ?>

                                                    <select id="dropGetCountry" name="country" class="form-control" required>
                                                    <option value="">-Select Country-</option>
                                                <?php foreach($country as $value){ 
                                                    
                                                    if( $user_details['country'] == $value['id']){
                                                        echo '<option value='.$value['id'].' selected>';
                                                    }else{echo '<option value='.$value['id'].'>';}
                                                     
                                                     echo $value['country'].'</option>';

                                                     }?>


                                                   
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                             <label>State</label>
                                            <div class="selector">
                                                <?php 
                                                $state = $user_details['state'];
                                                $stateData = $this->region_model->getStateValue($state);
                                                ?>

                                            <select name="state" id="dropGetState" class="form-control" required>
                                                <option value="">-Select State-</option>
                                                    <?php if(isset($user_details['state'])){
                                                    echo '<option value='.$user_details['state'].' selected>'.$stateData['0']['state'].'</option>';
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
                                                echo '<option value='.$user_details['city'].' selected>'.$cityData['0']['city'].'</option>';
                                                } ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
<script lang="JavaScript" type="text/javascript">
    
$(document).ready(function(){

//get state data
$('#dropGetCountry').change(function(){
   $('#dropGetState').html();
   var country = $('#dropGetCountry').val();
    $.ajax({
    type:"get",
    url:"<?php echo base_url('index.php/Home/getState/')?>/"+country,
    success: function(dataJson){
      
      data = JSON.parse(dataJson)
      var optionss = '<option value="">-Select State-</option>';
      $(data).each(function(index, element){                       
      optionss=optionss+'<option value="'+element.id+'">'+element.state+'</option>'
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
     url:"<?php echo base_url('index.php/Home/getcity')?>/"+state1,
    success: function(dataJson){
      data = JSON.parse(dataJson)
        var optionss = '<option value="">-Select City-</option>';
       $(data).each(function(index, element) {
             optionss = optionss+'<option value="'+element.id+'">'+element.city+'</option>'
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
                                            <input name="post" type="text" class="input-text full-width" value="<?php echo (set_value('post')== false)?$user_details['PinCode']:set_value('post') ?>" placeholder="" />
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input required type="checkbox"> I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>
                                </div>-->
                               
                                
                                <hr />
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input required type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" name="booking" value="confirm" class="full-width btn-large">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="image-box hotel listing-style1">
                                <figure class="clearfix">
                                    <a href="hotel-detailed.html" class="hover-effect middle-block"><img class="middle-item" width="270" height="160" alt="" style="max-height:160px; max-width:270px" src="<?php echo (@getimagesize(str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']))!=false)?str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']):'http://placehold.it/270x160'?>"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title"><?php echo $ghoteldietail['@attributes']['HotelName']?><small><?php echo $ghoteldietail['@attributes']['HotelAddess']?></small></h5>
                                        <a href="<?php echo base_url('index.php/agent/hotel_detailedIntl/'.$ghoteldietail['@attributes']['Providerid'].'/'.$ghoteldietail['@attributes']['Hotelid']);?>" class="button">EDIT</a>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="feedback">
                                   <!--     <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="<?php echo $ghoteldietail['@attributes']['Starrating']?>  stars"><span style="width: 80%;" class="<?php echo str_replace(" ","-",$ghoteldietail['@attributes']['Starrating'])?>"><?php echo $ghoteldietail['@attributes']['Starrating']?></span></div>-->
                                        <div >
                                                 <?php for($i=1;$i<=5;$i++){?>
                                            	<?php
												if($i<=$ghoteldietail['@attributes']['Starrating']){?>
                                                <div class="one2-stars-g-container"></div>
                                                <?php }else{?>
                                                <div class="one2-stars-container"></div>
                                                <?php }
											}?>
                                               
                                               <!-- <span class="review">270 reviews</span>-->
                                            </div>
                                        <!--<span class="review">270 reviews</span>-->
                                    </div>
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Check in</label>
                                            <span><?php echo $search_post['checkin']?><br /></span>
                                        </div>
                                        <div class="duration text-center">
                                       
                                            <i class="soap-icon-clock"></i>
                                            <span><?php echo $nights?> Nights</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Check out</label>
                                            <span><?php echo $search_post['checkout']?><br /></span>
                                        </div>
                                    </div>
                                    <div class="guest">
                                     	
                                        <small class="uppercase"> 
										<?php $children=($search_post['kids'])?$search_post['kids']." Kids":"";?>
										<?php echo $search_post['rooms']?> <?php echo $room_name?> <span class="skin-color"><?php echo $search_post['adults']?> Persons <?php echo $children?></span></small>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">room Type:</dt><dd class="value"><?php echo $room_name?></dd>
                                <dt class="feature">per Room price:</dt><dd class="value">Rs <?php echo $room_price?></dd>
                                <dt class="feature"><?php echo $nights?> night Stay:</dt><dd class="value"><?php echo $nights*$room_price?></dd>
                                <dt class="feature">taxes and fees:</dt><dd class="value"><?php echo $room_tax?></dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value"><?php echo ($room_price+$room_tax)?></dd>
                                <dt class="feature">Agent Markup</dt><dd class="value"><?php echo ($markup)?></dd>
                                <dt class="total-price">Grand Total Price</dt><dd class="total-price-value"><?php echo ($room_price+$room_tax+$markup)?></dd>
                            </dl>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>Need kpholidays Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@kpholidays.com</a>
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
  


 
 

 
<?php  include'footer.php';?> 

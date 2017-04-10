<?php 
//print_r($hotel_data);
$len= @count($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails']);

?>
<?php  $this->load->view('agent/header');?>

<!-- add some file start -->
<!-- <body style="overflow-x:hidden;">

    <div id="introLoader" class="introLoading"></div> -->
 
<!-- add file start -->
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.js"></script>


<!-- add some add -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 
<!-- load revolution slider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>">

</script> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 

<!-- load BXSlider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js');?>"></script> 



<!-- Flex Slider --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- waypoint --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script> 



<!-- load page Javascript --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> 


<!-- Twitter Bootstrap --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 


 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 



<!-- Twitter Bootstrap --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 



<!-- load revolution slider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>">

</script> 

<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> 



<!-- load BXSlider scripts --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js');?>"></script> 



<!-- Flex Slider --> 

<script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- parallax --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 



<!-- waypoint --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script> 



<!-- load page Javascript --> 

<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> 





<!-- add file end -->


<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
 
     
<link href="http://kpholidays.com/assets/css/custom.css" rel="stylesheet">

<link href="http://kpholidays.com/assets/css/style.css" rel="stylesheet">
    
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
 
 
 <style>
 .form-group label{ font-size:10px;

  }
   label{ font-size:10px !important;

  }
 .dropdown a{ background-color:transparent !important;}


 
 </style>

<!-- add some file end -->

   <div id="page-wrapper">
	
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b id="resultfound"><?php echo $len ?></b> results found.</h4>
                            <div class="toggle-container filters-container">
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                    </h4>
                                    <div id="price-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="price-range"></div>
                                            <br />
                                            <span class="min-price-label pull-left"></span>
                                            <span class="max-price-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>


                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                                    </h4>
                                    <div id="rating-filter" class="panel-collapse collapse filters-container">
                                        <div class="panel-content starcontainer">
                                             <div class="one-stars-container sfirst starlist"  style="cursor:pointer;"><span class="hidden">1</span></div>
                                             <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">2</span></div>
                                             <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">3</span></div>
                                             <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">4</span></div>
                                             <div class="one-stars-container starlist" style="cursor:pointer;"><span class="hidden">5</span></div>
                                            <br />
                                           <!-- <small>2458 REVIEWS</small>-->
                                        </div>
                                    </div>
                                </div> 
                                
                               <!--<div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                                    </h4>
                                    <div id="accomodation-type-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">All<small>(722)</small></a></li>
                                                <li><a href="#">Hotel<small>(982)</small></a></li>
                                                <li><a href="#">Resort<small>(127)</small></a></li>
                                                <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                                <li><a href="#">Condo<small>(158)</small></a></li>
                                                <li><a href="#">Residence<small>(439)</small></a></li>
                                                <li><a href="#">Guest House<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>--> 
                                
                                 <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                                    </h4>
                                    <div id="amenities-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square amenities filters-option">
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">Free Wi-Fi</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">Restaurant</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">Swimming pool</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">Internet</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">BusinessCenter</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">Laundry</a></li>
                                                <li onclick="jQuery(this).toggleClass('active')"><a href="#">RoomService</a></li>                                             
                                               
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div> 
                                
                                 <!-- <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>
                                    </h4>
                                    <div id="language-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">English<small>(722)</small></a></li>
                                                <li><a href="#">Español<small>(982)</small></a></li>
                                                <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                                <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                                <li><a href="#">Suomi<small>(158)</small></a></li>
                                                <li><a href="#">Italiano<small>(439)</small></a></li>
                                                <li><a href="#">Sign Language<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>  -->
                                
                                 
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                        
                        <div class="ModifySearchBox">
                        
                        
                        
                      
                        
                        <div class="tab-pane1 fade1" id="hotels-tab1">

            <form action="<?php echo base_url('index.php/agent/hotel_list');?>" method="post">

              <div class="row">
   <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio"  checked="checked" name="hotel_mode"   value="Domestic"  id="hotel_domestic" class="R"  
                <?php echo (set_value('hotel_mode')== True)?((set_value('hotel_mode')=='Domestic')?"checked='checked'":" " ):" " ?>/>

                Domestic 

              </label>

			</div>

            

          </div>
          
          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="hotel_mode"    class="way" id="hotel_internationl"  value="International"  <?php echo (set_value('hotel_mode')== True)?((set_value('hotel_mode')=='International')?"checked='checked'":" " ):" " ?>>

                International

              </label>

			</div>

            

          </div>

          <div class=" clearfix"></div>
                <div class="form-group col-sm-6 col-md-3">

               

                  <label>Your Destination</label>

                  <input type="text" id="hotel_city" name="city" required class="search input-text full-width" placeholder="Select City, Area or Hotel..."  value="<?php echo (set_value('city')== True)?set_value('city'):""?>"/>
				 <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="HotelDropdownCountry">

                      </ul>
                </div>

                <div class="form-group col-sm-6 col-md-4">

                  

                  <div class="row">

                    <div class="col-xs-6">

                      <label>Check In</label>

                      <div class="datepicker-wrap">

                        <input type="text" name="checkin" required class="input-text full-width" placeholder="mm/dd/yy" value="<?php echo (set_value('checkin')==TRUE)?set_value('checkin'):''; ?>"/>

                      </div>

                    </div>

                    <div class="col-xs-6">

                      <label>Check Out</label>

                      <div class="datepicker-wrap">

                        <input type="text" name="checkout" required class="input-text full-width" placeholder="mm/dd/yy" value="<?php echo (set_value('checkout')==TRUE)?set_value('checkout'):''; ?>"/>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="form-group col-sm-6 col-md-3">

                 

                  <div class="row">

                    <div class="col-xs-4">

                      <label>Rooms</label>

                      <div class="selector">

                        <select name="rooms" required="required" class="full-width">
                          
                          <option value="1" <?php echo (set_value('rooms')=='1')?'selected':''; ?> >01</option>

                          <option value="2" <?php echo (set_value('rooms')=='2')?'selected':''; ?> >02</option>

                          <option value="3"  <?php echo (set_value('rooms')=='3')?'selected':''; ?> >03</option>

                          <option value="4"  <?php echo (set_value('rooms')=='4')?'selected':''; ?> >04</option>

                        </select>

                      </div>

                    </div>

                    <div class="col-xs-4">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select name="adults" required="required" class="full-width">

                          <option value="1"  <?php echo (set_value('adults')=='1')?'selected':''; ?>>01</option>

                          <option value="2"  <?php echo (set_value('adults')=='2')?'selected':''; ?> >02</option>

                          <option value="3" <?php echo (set_value('adults')=='3')?'selected':''; ?> >03</option>

                          <option value="4"  <?php echo (set_value('adults')=='4')?'selected':''; ?> >04</option>

                        </select>

                      </div>

                    </div>

                    <div class="col-xs-4" style="padding:0px;">

                      <label>Kids(0-11)</label>

                      <div class="selector">

                        <select name="kids" class="full-width">
						              <option value="0"  <?php echo (set_value('kids')=='1')?'selected':''; ?> >00</option>
                          
                          <option value="1"  <?php echo (set_value('kids')=='1')?'selected':''; ?> >01</option>

                          <option value="2"  <?php echo (set_value('kids')=='2')?'selected':''; ?> >02</option>

                          <option value="3"  <?php echo (set_value('kids')=='3')?'selected':''; ?> >03</option>

                          <option value="4"  <?php echo (set_value('kids')=='4')?'selected':''; ?> >04</option>

                        </select>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="form-group col-sm-6 col-md-2 fixheigh1t">

                  <label class="hidden-xs">&nbsp;</label>

                  <button name="hotel" value="search" type="submit" class=" animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>

                </div>

              </div>

            </form>

          </div>
                        
                        
                                               
                        </div><!--ModifySearchBox-->
                        
                        
                        
                        
                        
                        
                        
                            <div class="sort-by-section clearfix">
                                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name"><a onClick="sorByContent('name',$(this));" class="sort-by-container" href="javascript:;"><span>name</span></a></li>
                                    <li class="sort-by-price active"><a onClick="sorByContent('price',$(this));" class="sort-by-container" href="javascript:;"><span>price</span></a></li>
                                    <li class="clearer visible-sms"></li>
                                    <li class="sort-by-rating "><a  onClick="sorByContent('rating',$(this));" class="sort-by-container" href="javascript:;"><span>rating</span></a></li>
                                  
                                </ul>
                                
                               
                            </div>
                            <div class="hotel-list listing-style3 hotel">
                             <?php echo $this->session->flashdata('msg');?>
					<?php     // If responsive Sattus is then will show flight list if 0 no flight will be available go in  elsepart                       
                                           //this loop will view Show the no. of flight list   
                                 if($len>0)
                                  {
                                    // print_r($hotel_data);
                                    $similar=array();
                                   foreach($hotel_data['soapBody']['HotelSearchResponse']['HotelSearchResult']['SearchData']['MultipleHotels']['HotelDetails'] as $key=>$hotel)
                                    {
										$similar[]=$hotel;
                                   ?>
                                <article class="box">
                                    <figure class="col-sm-5 col-md-4">
                                        <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" style="max-height:160px;max-width:270px;" alt="" src="<?php echo @(getimagesize($hotel['HotelImages'])!== false)?str_replace("\\","/",$hotel['HotelImages']):'http://placehold.it/270x160';?>"></a>
                                    </figure>
                                    <?php $FacilityId=array();
									if($hotel['FacilityId']!=0){
										if(isset($hotel['FacilityId']['Facilities'][0])){
											foreach($hotel['FacilityId']['Facilities'] as $Facilities){
												$FacilityId[]=trim($Facilities['FacilityName']);
											}
										}else{
											$FacilityId[$hotel['FacilityId']['Facilities']['Facility']]=trim($hotel['FacilityId']['Facilities']['FacilityName']);
										}
									}
									?>
                                    <div class="hidden Facilities"><?php echo json_encode($FacilityId);?></div>
                                    <div class="details col-sm-7 col-md-8 info"  data-price="<?php echo round(($hotel['LowRate']+$hotel['Highrate'])/2,2);?>" data-rating="<?php echo $hotel['StarCategoryId'];?>">
                                        <div>
                                            <div>
                                                <h4 class="box-title"><?php echo $hotel['HotelName']?><small><i class="soap-icon-departure yellow-color"></i><?php echo (!is_array($hotel['Location']))?$hotel['Location']:'';?>,<?php echo $hotel['CityDesc']?></small></h4>
                                                <div class="amenities">
                                                	<?php 
													
												if(isset($hotel['FacilityId']['Facilities']) and array_key_exists(0,$hotel['FacilityId']['Facilities'])){	
													foreach($hotel['FacilityId']['Facilities'] as $Facilities){
														?>
                                                     <?php if(@$Facilities['Facility']==1){?> 
                                                    	<i class="soap-icon-wifi circle"></i>                                   
                                                        <!--<i class="soap-icon-fitnessfacility circle"></i>-->
                                                         <?php }elseif(@$Facilities['Facility']==2){?>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <?php }else{
                                                        		echo @$Facilities['FacilityName'].',';
                                                        	} ?>
                                                        <!--<i class="soap-icon-television circle"></i>-->
                                                    <?php }
												}else{?>
                                                
                                                		<?php if(@$hotel['FacilityId']['Facilities']['Facility']==1){?> 
                                                    	<i class="soap-icon-wifi circle"></i>                                   
                                                        <!--<i class="soap-icon-fitnessfacility circle"></i>-->
                                                         <?php }elseif(@$$hotel['FacilityId']['Facilities']['Facility']==2){?>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <?php }else{
                                                        		echo @$hotel['FacilityId']['Facilities']['FacilityName'].',';
                                                        	} ?>
                                                <?php }?>
                                                </div>
                                            </div>
                                            <div>
                                            <?php for($i=1;$i<=5;$i++){?>
                                            	<?php
												if($i<=$hotel['StarCategoryId']){?>
                                                <div class="one2-stars-g-container"></div>
                                                <?php }else{?>
                                                <div class="one2-stars-container"></div>
                                                <?php }
											}?>
                                               
                                                
                                               
                                                <!--<span class="review">270 reviews</span>-->
                                            </div>
                                        </div>
                                        <div>
                                            <p><!--Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.--></p>
                                            <div>
                                                <span class="price"><small>AVG/NIGHT</small>Rs <?php echo round(($hotel['LowRate']+$hotel['Highrate'])/2,2);?> </span>
                                                <?php $this->session->set_userdata('Hotel_'.$hotel['HotelId'], $hotel);?>
                                                <?php if($this->session->userdata('uid')!=''){ ?>
                                                <a class="button btn-small full-width text-center" title="" href="<?php echo base_url('index.php/agent/hotel_detailed/'.$hotel['Providerid'].'/'.$hotel['HotelId']);?>">SELECT</a>
                                                <?php }else{ ?>
											    <a class="button btn-small full-width text-center" title="" href="javascript:;" onClick="onpenSignup('<?php echo $hotel['Providerid'].'/'.$hotel['HotelId']?>');">SELECT</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php }
									
									$this->session->set_userdata('similar', $similar);
								  }else{?>

	  <h3 align="center">Sorry Hotel is not available on this city !</h3>

	

   <?php }?> 
                                
                                
                                
                                
                                
                               
                               
                            </div>
<!--                             <a href="#" class="uppercase full-width button btn-large">load more listing</a> -->
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

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="color:#428BCA;" class="modal-title" id="myModalLabel"> <div class="BookOnlineHeader"> <strong>Sign in now to Book Online</strong></div><!--BookOnlineHeader--></h2>
        <a href=""></a>
	  </div>
      <div class="modal-body">
        <div>
    
        <div><input type="text" class="form-control" required id="boxemial" name="boxemial" placeholder="Email"></div>
        <p>Your booking details will be sent to this email address.</p>
        <div class="checkbox disabled">
          <label>
            <input type="checkbox"  onChange="$('#haveaccount').toggleClass('hidden','show');$('#signupdiv').toggleClass('hidden','show');" value="haveaccoutn">
            I have a kpholidays Account.
          </label>
        </div>
        <div class="hidden" id="haveaccount">
        <div><input type="password" class="form-control" required id="boxpassword" name="boxpassword" placeholder="Password"></div>
        <p>Forgot Password?</p>
        
        <div class="Proceed-to-Book"><button id="loginbtn"  class="btn btn-danger">Proceed to Book</button></div><!--Proceed-to-Book-->
        </div>
        <div id="signupdiv" class="show">
         <div><input type="text" class="form-control" required id="boxPhone" name="boxPhone" placeholder="Enter phone number"></div>
        <p>We'll use this number to send possible updaye alerts.</p>
        
        <div class="Proceed-to-Book"><button id="signuup" class="btn btn-danger">Proceed to Book</button></div><!--Proceed-to-Book-->
    	</div>
    
    
    
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


 </div>
  
<?php  $this->load->view('agent/footer');?>

 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog modal-sm">

    <div class="modal-content">

         <div id="progress_bar" class="ui-progress-bar ui-container">

         <div class="ui-progress" style="width: 79%;">

        <span class="ui-label" style="display:none;">Processing <b class="value">79%</b></span>

       </div>

  

    </div>

  </div>

</div>



</div>
<script lang="JavaScript" type="text/javascript">   //Finding the fare Rule and Tax  Details                   
var currentlselection="";
var currentStar=0;
jQuery(function ($){      
	
jQuery(".farerule").click(function()
  {
	var fare=jQuery(this).attr('id');
	datat=jQuery("#div_"+fare).html();
       var fare = JSON.parse(datat);
   jQuery.ajax({
		
		type:"post",
		url:"<?php echo base_url('index.php/flight/internal_tax_fare');?>",
		data : {value: fare},
		 beforeSend: function() {
             
             
           },
        success:function(data)
        {     
			   jQuery('.fare_rule').html(data);
               jQuery(".preloader").hide(); 
			   jQuery("#wait").hide();
		}		
	}); 
 });
	jQuery(".selectnow").click(function(){
		
		var booking_data=jQuery(this).attr('id');
		datat=jQuery("#sdiv_"+booking_data).html();
        var booking_data = JSON.parse(datat);
	     jQuery.ajax({
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
  


jQuery("#loginbtn").click(function(){
		
		
		var boxpassword=jQuery("#boxpassword").val();
		var boxemial=jQuery("#boxemial").val();
		if(boxemial==''){
			jQuery("#boxemial").focus();
			alert('Please insert email');
			return false;
		}
		if(boxpassword==''){
			jQuery("#boxpassword").focus();
			alert('Please insert password');
			return false;
		}
		jQuery('.bs-example-modal-sm').modal('show');
	     jQuery.ajax({
			 type:"post",
             url:"<?php echo base_url('index.php/home/checkLogin');?>",			 
		     data : {boxemial:boxemial,boxpassword:boxpassword},
			   success:function(data)
               {     
			   	
					if(data=='false'){
						jQuery('.bs-example-modal-sm').modal('hide');
					alert("Invalid email or password");
					}else{
						updateTicketselection()
					}
			    
		       }
		 });
	});	
	
	jQuery("#signuup").click(function(){
		
		jQuery('.bs-example-modal-sm').modal('show');
		var boxemial=jQuery("#boxemial").val();
		var boxPhone=jQuery("#boxPhone").val();
	     jQuery.ajax({
			 type:"post",
             url:"<?php echo base_url('index.php/home/registerUser');?>",			 
		     data :{boxemial:boxemial,boxPhone:boxPhone},
			   success:function(data)
               {     
			   
				var obj = jQuery.parseJSON(data);
			    if(obj.error){
						jQuery('.bs-example-modal-sm').modal('hide');
					alert(obj.msg);
					return false;
				}
			    updateTicketselection()
		       }
		 });
	});	   



  // autocomplete

 jQuery("#hotel_city").autocomplete( {
    source: function(request,response) {
    //console.log(jQuery('#Domestic2').is(':checked'));
        jQuery.ajax ( {
          url: "<?php echo base_url('index.php/hotel/get_city');?>",
          data: {term: request.term,domestic:jQuery('#hotel_domestic').is(':checked')},
          dataType: "json",
          success: function(data) {           
      response( jQuery.map( data.myData, function( item ) {
                return {
                    label: item.state,
                    value: item.state
                }
            }));
          } 
    }) }
 });
  
  
});
	function updateTicketselection(){		
				   
			        window.location.href='<?php echo base_url('index.php/hotel/hotel_detailed');?>/'+currentlselection;		  
				
	}
 function onpenSignup(Providerid){
	 currentlselection=Providerid;
	 jQuery('#signupModal').modal('show');
 }
</script>

 
    <script type="text/javascript">
      var minprice="";
	  var maxprice="";
  tjq(document).ready(function() {
	   sortUsingNestedText(tjq('.hotel'), '.box', '.info');
	    minprice=tjq('.hotel-list>article .details').data('price');
		maxprice=(tjq('.hotel-list>article .details').last().data('price')+1000);
            tjq("#price-range").slider({
                range: true,
                min: tjq('.hotel-list>article .details').data('price'),
                max: (tjq('.hotel-list>article .details').last().data('price')+1000),
                values: [ tjq('.hotel-list>article .details').data('price'), tjq('.hotel-list>article .details').last().data('price')+1000 ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "Rs " + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "Rs " + ui.values[ 1 ]);
                },
				 change: function( event, ui ) {
					minprice=ui.values[ 0 ];
					maxprice=ui.values[ 1 ];					   
				   globalSearch();
				}
            });
            tjq(".min-price-label").html( "Rs " + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "Rs " + tjq("#price-range").slider( "values", 1 ));

           
           tjq('.starlist').on('click',function(){
			  currentStar=jQuery(this).find('.hidden').html();
			  if(tjq(this).hasClass('one-stars-g-container')){
				  if(tjq(this).hasClass('sfirst'))
				  currentStar=0;
			  }
			  tjq('.starlist').each(function(index, element) {
                
					star=jQuery(this).find('.hidden').html();
					if(star<=currentStar){
						tjq(this).removeClass('one-stars-g-container');
						tjq(this).addClass('one-stars-g-container','one-stars-container');
					}else{
						tjq(this).removeClass('one-stars-g-container');
						tjq(this).addClass('one-stars-container');
					}
            	});	
				globalSearch();		  
		   });

           
        });
function sortUsingNestedText(parent, childSelector, keySelector) {
  var items = parent.children(childSelector).sort(function(a, b) {
  var vA = jQuery(keySelector, a).data('price');
  var vB = jQuery(keySelector, b).data('price');
  return (vA < vB) ? -1 : (vA > vB) ? 1 : 0;
  });
  parent.append(items);
}

function searchbyPrice(obj){
		if(jQuery(obj).find('.details').data('price')>=minprice && jQuery(obj).find('.details').data('price')<=maxprice){
			return 1;
		}else{
			return 0;
		}
  
}
function searchbyStars(obj){
	//console.log(currentStar);
		if(jQuery(obj).find('.details').data('rating')==currentStar || currentStar==0){
			return 1;
		}else{
			return 0;
		}
  
}
function serachByAmenities(obj){
	
	var activeFlights=new Array();
	tjq('.amenities li').each(function(index, element) {
            if(jQuery(this).hasClass('active')){				
				activeFlights.push(jQuery(this).find('a').html());				
			}
        });
	var value=1;
	//jQuery('.flight article').each(function(index, element) {        
		codeclass=jQuery(obj).find('.Facilities').html();		
		codeclass=JSON.parse(codeclass);
		jQuery(activeFlights).each(function(index, element) {
			//console.log(element,codeclass,jQuery.inArray(element,codeclass));
            if(jQuery.inArray(element,codeclass)!=-1){				
				//return 0;
			}else{
				
				value=0;
			}
        });
		return value;
		
   // });
	
}

jQuery('.amenities li').on('click',function(){
	globalSearch();
});
function globalSearch(){
	var resultfound=0;
	jQuery('.hotel-list article').each(function(index, element) {	
		//console.log(serachByAmenities(jQuery(this)));    
		if(searchbyPrice(jQuery(this))){
			if(searchbyStars(jQuery(this))){
				if(serachByAmenities(jQuery(this))){
					jQuery(this).fadeIn();
					resultfound=resultfound+1;
				}else{
					jQuery(this).fadeOut();
				}
			 
			}else{
			jQuery(this).fadeOut();
			}
		  }else{
			jQuery(this).fadeOut();
		}
    });
	jQuery('#resultfound').html(resultfound);
}

function sorByContent(byname,obj){
	jQuery('.sort-bar li').removeClass('active');
	obj.parent().addClass('active');
	var mylist = jQuery('.hotel');
	var listitems = mylist.children('article').get();
	
	listitems.sort(function(a, b) {
		if(byname=='rating' || byname=='price'){			
			var a=jQuery(a).find('.info').data(byname);
			var b=jQuery(b).find('.info').data(byname);
			if(byname=='rating')			
			return (a > b) ? -1 : (a < b) ? 1 : 0;	
			else
			return (a < b) ? -1 : (a > b) ? 1 : 0;			 
		}else{
	   return jQuery(a).find('.info .box-title').html().toUpperCase().localeCompare(jQuery(b).find('.info .box-title').html().toUpperCase());
		}
	});
	
	jQuery.each(listitems, function(index, item) {
	   mylist.append(item); 
	});	
	
}

    </script>
</body>
</html>


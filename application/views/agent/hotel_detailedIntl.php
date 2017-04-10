<?php 
//print_r($hoteldetail_data);
//print_r($ghoteldietail);
$hotel_galeery=@explode(", ",$hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['GalleryImages']['Images']);
$AmenityDetail=@explode(", ",$hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['AmenityDetail']['Amenity']);


$markepdata=$this->agent_model->get_busMrakup('International Hotel');
$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;
?>
<?php  $this->load->view('agent/header');?> 
<?php include'sub-header.php';?>
<div id="page-wrapper">
  
  <section id="content">
    <div class="container">
      <div class="row">
        <div id="main" class="col-md-9">
          <div class="tab-container style1" id="hotel-main-content">
            <ul class="tabs">
              <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
              <li><a data-toggle="tab" href="#map-tab">map</a></li>
              <li><a data-toggle="tab" href="#steet-view-tab">street view</a></li>
              <!--  <li><a data-toggle="tab" href="#calendar-tab">calendar</a></li>-->
              
              <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">TRAVEL GUIDE</a></li>
            </ul>
            <div class="tab-content">
              <div id="photos-tab" class="tab-pane fade in active">
                <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                  <ul class="slides">
                    <?php
										 if(is_array($hotel_galeery)){
										  foreach($hotel_galeery as $galeryimg){?>
                    <li><img width="900" height="500" src="<?php echo str_replace("\\","/",trim($galeryimg,","));?>" alt="" /></li>
                    <?php } }else{?>
                    <li><img width="70" height="70" src="<?php echo (@getimagesize(str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']))!=false)?str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']):'http://placehold.it/70x70';?>" alt="" /></li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                  <ul class="slides">
                    <!-- <li><img src="http://placehold.it/70x70" alt="" /></li>-->
                    <?php if(is_array($hotel_galeery)){ foreach($hotel_galeery as $galeryimg){?>
                    <li><img width="70" height="70" src="<?php echo str_replace("\\","/",trim($galeryimg,","));?>" alt="" /></li>
                    <?php } }?>
                  </ul>
                </div>
              </div>
              <div id="map-tab" class="tab-pane fade"> </div>
              <div id="steet-view-tab" class="tab-pane fade" style="height: 500px;"> </div>
              <div id="calendar-tab" class="tab-pane fade">
                <label>SELECT MONTH</label>
                <div class="col-sm-6 col-md-4 no-float no-padding">
                  <div class="selector">
                    <select class="full-width" id="select-month">
                      <option value="2014-6">June 2014</option>
                      <option value="2014-7">July 2014</option>
                      <option value="2014-8">August 2014</option>
                      <option value="2014-9">September 2014</option>
                      <option value="2014-10">October 2014</option>
                      <option value="2014-11">November 2014</option>
                      <option value="2014-12">December 2014</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    <div class="calendar"></div>
                    <div class="calendar-legend">
                      <label class="available">available</label>
                      <label class="unavailable">unavailable</label>
                      <label class="past">past</label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <p class="description"> The calendar is updated every five minutes and is only an approximation of availability. <br />
                      <br />
                      Some hosts set custom pricing for certain days on their calendar, like weekends or holidays. The rates listed are per day and do not include any cleaning fee or rates for extra people the host may have for this listing. Please refer to the listing's Description tab for more details. <br />
                      <br />
                      We suggest that you contact the host to confirm availability and rates before submitting a reservation request. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="hotel-features" class="tab-container">
            <ul class="tabs">
              <li><a href="#hotel-description" data-toggle="tab">Description</a></li>
              <li class="active"><a href="#hotel-availability" data-toggle="tab">Availability</a></li>
              <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
              <!-- <li><a href="#hotel-reviews" data-toggle="tab">Reviews</a></li>
                                <li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>
                                <li><a href="#hotel-things-todo" data-toggle="tab">Things to Do</a></li>
                                <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li>-->
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade " id="hotel-description">
                <div class="intro table-wrapper full-width hidden-table-sms">
                  <div class="col-sm-5 col-lg-4 features table-cell">
                    <ul>
                      <li>
                        <label>hotel type:</label>
                        <?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel']?> STAR</li>
                      <!-- <li><label>Extra people:</label>No Charge</li>
                                                <li><label>Minimum Stay:</label>2 nights</li>
                                                <li><label>Security Deposit:</label>$279</li>-->
                      <li>
                        <label>Country:</label>
                        <?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['country']?></li>
                      <li>
                        <label>City:</label>
                        <?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['city']?></li>
                      <!-- <li><label>Neighborhood:</label>République</li>
                                                <li><label>Cancellation:</label>strict</li>-->
                    </ul>
                  </div>
                  <div class="col-sm-7 col-lg-8 table-cell testimonials">
                    <div class="testimonial style1">
                      <ul class="slides ">
                        <li>
                          <p class="description">Always enjoyed my stay with Hilton Hotel and Resorts, top class room service and rooms have great outside views and luxury assessories. Thanks for great experience.</p>
                          <div class="author clearfix"> <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                            <h5 class="name">Jessica Brown<small>guest</small></h5>
                          </div>
                        </li>
                        <li>
                          <p class="description">Always enjoyed my stay with Hilton Hotel and Resorts, top class room service and rooms have great outside views and luxury assessories. Thanks for great experience.</p>
                          <div class="author clearfix"> <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                            <h5 class="name">Lisa Kimberly<small>guest</small></h5>
                          </div>
                        </li>
                        <li>
                          <p class="description">Always enjoyed my stay with Hilton Hotel and Resorts, top class room service and rooms have great outside views and luxury assessories. Thanks for great experience.</p>
                          <div class="author clearfix"> <a href="#"><img src="http://placehold.it/270x270" alt="" width="74" height="74" /></a>
                            <h5 class="name">Jessica Brown<small>guest</small></h5>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="long-description">
                  <h2>About <?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['HotelName']?></h2>
                  <p> <?php echo ($hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['Description']);?> </p>
                </div>
              </div>
              <div class="tab-pane fade in active" id="hotel-availability"> 
                
                <h2>Available Rooms</h2>
                <div class="room-list listing-style3 hotel">
                  <?php 
				  
				$getValue = $this->agent_model->get_data_table('agent_commision_markup',array('forcommision'=>'International Hotel','uid'=>4545));
				$commission = $getValue[0]['adult_Commission'];
				//echo $commission;
				  
				  
				  if(array_key_exists(0,$ghoteldietail['RoomTypes']['RoomType'])){?>
                  <?php foreach($ghoteldietail['RoomTypes']['RoomType'] as $RatePlanDetails){?>
                  
                  <article class="box">
                  
                    <figure class="col-sm-4 col-md-3"> <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" style="max-width:230px;max-height:160px" src="<?php echo (@getimagesize(str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']))!==false)?str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']):'http://placehold.it/230x160';?>" alt=""></a> </figure>
                    <div class="details col-xs-12 col-sm-8 col-md-9">
                      <div>
                        <div>
                          <div class="box-title">
                            <h4 class="title"><?php echo $RatePlanDetails['@attributes']['Roomname'];?></h4>
                            <dl class="description">
                              <dt>Max Guests:</dt>
                              <dd><?php echo $RatePlanDetails['@attributes']['MaxAdult'];?> Adult,<?php echo $RatePlanDetails['@attributes']['MaxChild'];?>Child</dd>
                            </dl>
                          </div>
                          <div class="amenities">
                            <?php 
															
															foreach($AmenityDetail as $Facilities){
														?>
                            <?php if(@$Facilities==1){?>
                            <i class="soap-icon-wifi circle"></i> 
                            <!--<i class="soap-icon-fitnessfacility circle"></i>-->
                            <?php }elseif(@$Facilities==2){?>
                            <i class="soap-icon-fork circle"></i>
                            <?php }else{
                                                        		echo @$Facilities.',';
                                                        	} ?>
                            <!--<i class="soap-icon-television circle"></i>-->
                            <?php } ?>
                          </div>
                        </div>
                        <div class="price-section"> <span class="price"> <a class="button btn-small yellow-bg white-color farerule" href="javascript:;" data-id="<?php echo $ghoteldietail['@attributes']['Hotelid']?>" data-key="<?php echo urlencode($RatePlanDetails['@attributes']['Bookingkey'])?>"  >Cancellation Policy</a> </span>
                          <div class="clearfix"></div>
                          <span class="price"><small>PER/NIGHT</small>Rs <?php echo $RatePlanDetails['@attributes']['GIRoomChargesINR']+$markup;?></span>
                          
                          
                          <span class=""><small>Commission </small>Rs <?php
						  
						  if($RatePlanDetails['@attributes']['Commission']!=0){
							  
							  $agent = $RatePlanDetails['@attributes']['Commission'];
							  $CommissionAddedValue = (($agent*$commission)/100);
							  
							  $this->session->set_userdata('hotel_commission'.urlencode($ghoteldietail['RoomTypes']['RoomType']['@attributes']['Bookingkey']),$CommissionAddedValue);
							  echo $CommissionAddedValue;
							  }else{
								  echo $RatePlanDetails['@attributes']['Commission'];
								}
						   
						   ?></span>
                           </div>
                      </div>
                      <div> 
                        <!-- <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>-->
                        <div class="action-section"> <a href="<?php echo base_url('index.php/agent/hotel_bookingIntl/'.$ghoteldietail['@attributes']['Hotelid'].'/'.urlencode($RatePlanDetails['@attributes']['Bookingkey']));?>" title="" class="button btn-small full-width text-center">BOOK NOW</a> </div>
                      </div>
                    </div>
                  </article>
                  <?php }?>
                  <?php }else{?>
                  <article class="box">
                    <figure class="col-sm-4 col-md-3"> <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" style="max-height:160px;max-width:230px" src="<?php echo (@getimagesize(str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']))!==false)?str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']):'http://placehold.it/230x160';?>" alt=""></a> </figure>
                    <div class="details col-xs-12 col-sm-8 col-md-9">
                      <div>
                        <div>
                          <div class="box-title">
                            <h4 class="title"><?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['Roomname'];?></h4>
                            <dl class="description">
                              <dt>Max Guests:</dt>
                              <dd><?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['MaxAdult'];?> Adult,<?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['MaxChild'];?>Child</dd>
                            </dl>
                          </div>
                          <div class="amenities">
                            <?php foreach($AmenityDetail as $Facilities){
														?>
                            <?php if(@$Facilities==1){?>
                            <i class="soap-icon-wifi circle"></i> 
                            <!--<i class="soap-icon-fitnessfacility circle"></i>-->
                            <?php }elseif(@$Facilities==2){?>
                            <i class="soap-icon-fork circle"></i>
                            <?php }else{
                                                        		echo @$Facilities.',';
                                                        	} ?>
                            <!--<i class="soap-icon-television circle"></i>-->
                            <?php } ?>
                          </div>
                        </div>
                        <div class="price-section"> <a class="button btn-small yellow-bg white-color farerule" href="javascript:;" data-id="<?php echo $ghoteldietail['RoomTypes']['RoomType']['@attributes']['Bookingkey']?>" data-key="<?php echo urlencode($ghoteldietail['RoomTypes']['RoomType']['@attributes']['Bookingkey'])?>"  >Cancellation Policy</a> <span class="price"><small>PER/NIGHT</small>Rs<?php echo ($ghoteldietail['RoomTypes']['RoomType']['@attributes']['GIRoomChargesINR']+$markup);?></span> </div>
                      </div>
                      <div> 
                        <!-- <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>-->
                        <div class="action-section"> <a href="<?php echo base_url('index.php/agent/hotel_bookingIntl/'.$ghoteldietail['@attributes']['Hotelid'].'/'.urlencode($ghoteldietail['RoomTypes']['RoomType']['@attributes']['Bookingkey']));?>" title="" class="button btn-small full-width text-center">BOOK NOW</a> </div>
                      </div>
                    </div>
                  </article>
                  <?php }?>
                  <a href="#" class="load-more button full-width btn-large fourty-space">LOAD MORE ROOMS</a> </div>
              </div>
              <div class="tab-pane fade" id="hotel-amenities">
                <h2>Amenities</h2>
                <ul class="amenities clearfix style1">
                  <?php 
									 foreach($AmenityDetail as $amety){?>
                  <li class="col-md-4 col-sm-6">
                    <div class="icon-box style1"><i class="soap-icon-<?php echo str_replace(" ","-",$amety);?>"></i><?php echo $amety;?></div>
                  </li>
                  <?php }?>
                </ul>
                <br />
              </div>
              <div class="tab-pane fade" id="hotel-reviews">
                <div class="intro table-wrapper full-width hidden-table-sms">
                  <div class="rating table-cell col-sm-4"> <span class="score">3.9/5.0</span>
                    <div class="five-stars-container">
                      <div class="five-stars" style="width: 78%;"></div>
                    </div>
                    <a href="#" class="goto-writereview-pane button green btn-small full-width">WRITE A REVIEW</a> </div>
                  <div class="table-cell col-sm-8">
                    <div class="detailed-rating">
                      <ul class="clearfix">
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>service</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Value</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Sleep Quality</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Cleanliness</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>location</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>rooms</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>swimming pool</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>fitness facility</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="guest-reviews">
                  <h2>Guest Reviews</h2>
                  <div class="guest-review table-wrapper">
                    <div class="col-xs-3 col-md-2 author table-cell"> <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                      <p class="name">Jessica Brown</p>
                      <p class="date">NOV, 12, 2013</p>
                    </div>
                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                      <div class="comment-header clearfix">
                        <h4 class="comment-title">We had great experience while our stay and Hilton Hotels!</h4>
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div class="five-stars" style="width: 80%;"></div>
                          </div>
                          <span class="score">4.0/5.0</span> </div>
                      </div>
                      <div class="comment-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                      </div>
                    </div>
                  </div>
                  <div class="guest-review table-wrapper">
                    <div class="col-xs-3 col-md-2 author table-cell"> <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                      <p class="name">David Jhon</p>
                      <p class="date">NOV, 12, 2013</p>
                    </div>
                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                      <div class="comment-header clearfix">
                        <h4 class="comment-title">I love the speediness of their services.</h4>
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div class="five-stars" style="width: 64%;"></div>
                          </div>
                          <span class="score">3.2/5.0</span> </div>
                      </div>
                      <div class="comment-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                      </div>
                    </div>
                  </div>
                  <div class="guest-review table-wrapper">
                    <div class="col-xs-3 col-md-2 author table-cell"> <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                      <p class="name">Kyle Martin</p>
                      <p class="date">NOV, 12, 2013</p>
                    </div>
                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                      <div class="comment-header clearfix">
                        <h4 class="comment-title">When you look outside from the windows its breath taking.</h4>
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div class="five-stars" style="width: 76%;"></div>
                          </div>
                          <span class="score">3.8/5.0</span> </div>
                      </div>
                      <div class="comment-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="button full-width btn-large">LOAD MORE REVIEWS</a> </div>
              <div class="tab-pane fade" id="hotel-faqs">
                <h2>Frquently Asked Questions</h2>
                <div class="topics">
                  <ul class="check-square clearfix">
                    <li class="col-sm-6 col-md-4"><a href="#">address &amp; map</a></li>
                    <li class="col-sm-6 col-md-4"><a href="#">messaging</a></li>
                    <li class="col-sm-6 col-md-4"><a href="#">refunds</a></li>
                    <li class="col-sm-6 col-md-4"><a href="#">pricing</a></li>
                    <li class="col-sm-6 col-md-4 active"><a href="#">reservation requests</a></li>
                    <li class="col-sm-6 col-md-4"><a href="#">your reservation</a></li>
                  </ul>
                </div>
                <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                <div class="toggle-container">
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question1" data-toggle="collapse">How do I know a reservation is accepted or confirmed?</a> </h4>
                    <div class="panel-collapse collapse" id="question1">
                      <div class="panel-content"> </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question2" data-toggle="collapse">What do I do after I receive a reservation request from a guest?</a> </h4>
                    <div class="panel-collapse collapse" id="question2">
                      <div class="panel-content">
                        <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="" href="#question3" data-toggle="collapse">How much time do I have to respond to a reservation request?</a> </h4>
                    <div class="panel-collapse collapse in" id="question3">
                      <div class="panel-content">
                        <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question4" data-toggle="collapse">Why can’t I call or email hotel or host before booking?</a> </h4>
                    <div class="panel-collapse collapse" id="question4">
                      <div class="panel-content"> </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question5" data-toggle="collapse">Am I allowed to decline reservation requests?</a> </h4>
                    <div class="panel-collapse collapse" id="question5">
                      <div class="panel-content"> </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question6" data-toggle="collapse">What happens if I let a reservation request expire?</a> </h4>
                    <div class="panel-collapse collapse" id="question6">
                      <div class="panel-content"> </div>
                    </div>
                  </div>
                  <div class="panel style1 arrow-right">
                    <h4 class="panel-title"> <a class="collapsed" href="#question7" data-toggle="collapse">How do I set reservation requirements?</a> </h4>
                    <div class="panel-collapse collapse" id="question7">
                      <div class="panel-content"> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="hotel-things-todo">
                <h2>Things to Do</h2>
                <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                <div class="activities image-box style2 innerstyle">
                  <article class="box">
                    <figure> <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a> </figure>
                    <div class="details">
                      <div class="details-header">
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div style="width: 60%;" class="five-stars"></div>
                          </div>
                          <span class="reviews">25 reviews</span> </div>
                        <h4 class="box-title">Central Park Walking Tour</h4>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                      <a class="button" title="" href="#">MORE</a> </div>
                  </article>
                  <article class="box">
                    <figure> <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a> </figure>
                    <div class="details">
                      <div class="details-header">
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div style="width: 60%;" class="five-stars"></div>
                          </div>
                          <span class="reviews">25 reviews</span> </div>
                        <h4 class="box-title">Museum of Modern Art</h4>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                      <a class="button" title="" href="#">MORE</a> </div>
                  </article>
                  <article class="box">
                    <figure> <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a> </figure>
                    <div class="details">
                      <div class="details-header">
                        <div class="review-score">
                          <div class="five-stars-container">
                            <div style="width: 60%;" class="five-stars"></div>
                          </div>
                          <span class="reviews">25 reviews</span> </div>
                        <h4 class="box-title">Crazy Horse Cabaret Show</h4>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                      <a class="button" title="" href="#">MORE</a> </div>
                  </article>
                </div>
              </div>
              <div class="tab-pane fade" id="hotel-write-review">
                <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                  <article class="image-box box hotel listing-style1 photo table-cell col-sm-4">
                    <figure> <a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a> </figure>
                    <div class="details">
                      <h4 class="box-title">Hilton Hotel and Resorts<small><i class="soap-icon-departure"></i> Paris, france</small></h4>
                      <div class="feedback">
                        <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                        <span class="review">270 reviews</span> </div>
                    </div>
                  </article>
                  <div class="table-cell col-sm-8">
                    <div class="overall-rating">
                      <h4>Your overall Rating of this property</h4>
                      <div class="star-rating clearfix">
                        <div class="five-stars-container">
                          <div class="five-stars" style="width: 80%;"></div>
                        </div>
                        <span class="status">VERY GOOD</span> </div>
                      <div class="detailed-rating">
                        <ul class="clearfix">
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>service</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Value</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Sleep Quality</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Cleanliness</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>location</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>rooms</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>swimming pool</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>fitness facility</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <form class="review-form">
                  <div class="form-group col-md-5 no-float no-padding">
                    <h4 class="title">Title of your review</h4>
                    <input type="text" name="review-title" class="input-text full-width" value="" placeholder="enter a review title" />
                  </div>
                  <div class="form-group">
                    <h4 class="title">Your review</h4>
                    <textarea class="input-text full-width" placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <h4 class="title">What sort of Trip was this?</h4>
                    <ul class="sort-trip clearfix">
                      <li><a href="#"><i class="soap-icon-businessbag circle"></i></a><span>Business</span></li>
                      <li><a href="#"><i class="soap-icon-couples circle"></i></a><span>Couples</span></li>
                      <li><a href="#"><i class="soap-icon-family circle"></i></a><span>Family</span></li>
                      <li><a href="#"><i class="soap-icon-friends circle"></i></a><span>Friends</span></li>
                      <li><a href="#"><i class="soap-icon-user circle"></i></a><span>Solo</span></li>
                    </ul>
                  </div>
                  <div class="form-group col-md-5 no-float no-padding">
                    <h4 class="title">When did you travel?</h4>
                    <div class="selector">
                      <select class="full-width">
                        <option value="2014-6">June 2014</option>
                        <option value="2014-7">July 2014</option>
                        <option value="2014-8">August 2014</option>
                        <option value="2014-9">September 2014</option>
                        <option value="2014-10">October 2014</option>
                        <option value="2014-11">November 2014</option>
                        <option value="2014-12">December 2014</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <h4 class="title">Add a tip to help travelers choose a good room</h4>
                    <textarea class="input-text full-width" rows="3" placeholder="write something here"></textarea>
                  </div>
                  <div class="form-group col-md-5 no-float no-padding">
                    <h4 class="title">Do you have photos to share? <small>(Optional)</small> </h4>
                    <div class="fileinput full-width">
                      <input type="file" class="input-text" data-placeholder="select image/s" />
                    </div>
                  </div>
                  <div class="form-group">
                    <h4 class="title">Share with friends <small>(Optional)</small></h4>
                    <p>Share your review with your friends on different social media networks.</p>
                    <ul class="social-icons icon-circle clearfix">
                      <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                      <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                      <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                      <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
                    </ul>
                  </div>
                  <div class="form-group col-md-5 no-float no-padding no-margin">
                    <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="sidebar col-md-3">
          <article class="detailed-logo">
            <figure> <img width="114" height="85" style="max-width:114px;max-height:85px" src="<?php echo (@getimagesize(str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']))!==false)?str_replace("\\","/",$ghoteldietail['@attributes']['HotelImage']):'http://placehold.it/114x85';?>" alt=""> </figure>
            <div class="details">
              <h2 class="box-title"><?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['HotelName']?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['address']?>, <?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['city']?></span></small></h2>
              <span class="price clearfix"> <small class="pull-left">avg/night</small> <span class="pull-right">Rs <?php echo $ghoteldietail['@attributes']['GIAvgAmount']+$markup;?></span> </span>
              <div class="feedback clearfix">
                <div title="<?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel']?> stars" class="<?php echo str_replace(" ",'-',$ghoteldietail['@attributes']['Starrating'])?>s-container" data-toggle="tooltip" data-placement="bottom"><span class="<?php echo str_replace(" ",'-',$hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel'])?>s" style="width: 80%;"><?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['Starlevel']?></span></div>
                <!-- <span class="review pull-right">270 reviews</span>--> 
              </div>
              <p class="description"><?php echo $ghoteldietail['@attributes']['HotelDesc']?>.</p>
              <a class="button yellow full-width uppercase btn-small">add to wishlist</a> </div>
          </article>
          <div class="travelo-box contact-box">
            <h4>Need kpholidays Help?</h4>
            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
            <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span> <br>
            <a class="contact-email" href="#">help@kpholidays.com</a>
            </address>
          </div>
          <div class="travelo-box">
            <?php $similarhotel_dietail=$this->session->userdata('similar');?>
            <h4>Similar Listings</h4>
            <div class="image-box style14">
              <?php foreach($similarhotel_dietail as $skey=>$similar){
									if($similar['@attributes']['Hotelid']==$ghoteldietail['@attributes']['Hotelid'])
									continue;
									if($skey==5)
										break;
									?>
              <article class="box">
                <figure> <a href="<?php echo base_url('index.php/agent/hotel_detailedIntl/'.$similar['@attributes']['Providerid'].'/'.$similar['@attributes']['Hotelid']);?>"><img style="max-height:59px;max-width:63px" width="63" height="59" src="<?php echo (@getimagesize(str_replace("\\","/",$similar['@attributes']['HotelImage'])))?str_replace("\\","/",$similar['@attributes']['HotelImage']):'http://placehold.it/63x59'?>" alt="" /></a> </figure>
                <div class="details">
                  <h5 class="box-title"><a href="<?php echo base_url('index.php/agent/hotel_detailedIntl/'.$similar['@attributes']['Providerid'].'/'.$similar['@attributes']['Hotelid']);?>"><?php echo $similar['@attributes']['HotelName']?></a></h5>
                  <label class="price-wrapper"> <span class="price-per-unit">Rs <?php echo $similar['@attributes']['GIAvgAmount']+$markup;?></span>avg/night </label>
                </div>
              </article>
              <?php }?>
            </div>
          </div>
          <div class="travelo-box book-with-us-box">
            <h4>Why Book with us?</h4>
            <ul>
              <li> <i class="soap-icon-hotel-1 circle"></i>
                <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                <p>Nunc cursus libero pur congue arut nimspnty.</p>
              </li>
              <li> <i class="soap-icon-savings circle"></i>
                <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                <p>Nunc cursus libero pur congue arut nimspnty.</p>
              </li>
              <li> <i class="soap-icon-support circle"></i>
                <h5 class="title"><a href="#">Excellent Support</a></h5>
                <p>Nunc cursus libero pur congue arut nimspnty.</p>
              </li>
            </ul>
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
          <h4 class="modal-title" id="myModalLabel">Cancellation Policy</h4>
          <a href=""></a> </div>
        <div class="modal-body"> 
          <!-- Nav tabs -->
          
          <div  class=".preloader"  style="display:none;"> <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/> </div>
          <p  id="wait" align="center">Please Wait ....</p>
          <p  class="fare_rule"> </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div id="progress_bar" class="ui-progress-bar ui-container">
        <div class="ui-progress" style="width: 79%;"> <span class="ui-label" style="display:none;">Processing <b class="value">79%</b></span> </div>
      </div>
    </div>
  </div>
</div>
<!-- Google Map Api --> 
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> 
<script>    //Finding the fare Rule and Tax  Details                   

jQuery(document).ready(function(){      
	
jQuery(".farerule").click(function()
  {
	  jQuery("#myModal").modal("show");
	  jQuery('.fare_rule').html('');
	  jQuery("#wait").show();
	var hotel_id=jQuery(this).data('id');
	var hotel_bkey=jQuery(this).data('key');	
   jQuery.ajax({
		
		type:"post",
		url:"<?php echo base_url('index.php/hotel/GetBookingTrackandCancelPolIntl');?>/"+encodeURI(hotel_id)+"/"+encodeURI(hotel_bkey),		
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
	  
  
});
</script> 
<script type="text/javascript">
        
            
           
		tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        });
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng(<?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['latitude']?>,<?php echo $hoteldetail_data['GetHotelDetailsResponse']['GetHotelDetailsResult']['HotelDetails']['HotelDetail']['longitude']?>);
        var mapOptions = {
            center: fenway,
            zoom: 12
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
        function initialize() {
            tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
            map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php  include'footer.php';?>

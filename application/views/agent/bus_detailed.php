<?php 
//print_r($bus_seat_map);
//print_r($bus_dietail);

$bookedSeat=array();
if(is_array($bus_seat_map['SeatMapOutput']['SeatLayoutDetails']['BookedSeats'])){
	foreach($bus_seat_map['SeatMapOutput']['SeatLayoutDetails']['BookedSeats'] as $bookst){
		$bookedSeat[$bookst['SeatNo']]=$bookst['Gender'];
	}
}
$priceBySeat=array();
foreach($bus_seat_map['SeatMapOutput']['Fares'] as $fare){
   $priceBySeat[$fare['SeatTypeId']]['Fare']=$fare['Fare'];
   $priceBySeat[$fare['SeatTypeId']]['ServiceTax']=$fare['ServiceTax'];
}
?>
<link href="http://kpholidays.com/assets/css/custom.css" rel="stylesheet">
<link href="http://kpholidays.com/assets/css/style.css" rel="stylesheet">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
img {
	display: block;
	height: auto !important;
	max-width: auto !important;
	width: auto !important;
}
</style>

<div id="page-wrapper">
  <?php  $this->load->view('agent/header');
    //$this->load->view('agent/sub-header');
    ?>
  
  <!-- <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Bus Detailed</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">Bus Detailed</li>
                </ul>
            </div>
        </div> -->
  <section id="content">
    <div class="container">
      <div class="row">
        <div id="main" class="col-md-9">
          <div class="tab-container style1" id="cruise-main-content">
            <ul class="tabs">
              <li class="active"><a data-toggle="tab" href="#calendar-tab">BUS SHEET </a></li>
              <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">TRAVEL GUIDE</a></li>
            </ul>
            <div class="tab-content">
              <div id="calendar-tab" class="tab-pane fade in active">
                <?php 
								 $data = array('onsubmit' => "return checkseat();"); 
								echo form_open('agent/BusBooking/'.$bus_dietail['ScheduleId'],$data);?>
                <div class="Bus-Seats-w3-upper">
                  <div class="col-sm-8">
                    <div class="Bus-Seats-new2 Bus-w21">
                      <div class="bus-img-new"><img src="/img2/s.png" alt="" style="margin-bottom:15px;"/></br>
                        &nbsp;&nbsp;<img src="/img2/Low2.png" alt=""/></div>
                      <?php $setrow=0;
											   $upper_berth_array=array();
											   foreach($bus_seat_map['SeatMapOutput']['SeatLayoutDetails']['SeatLayout']['SeatColumns'] as $key=>$seatmap_row){	
											   	 $tmp_array=array();?>
                      <div class="Bus-Seats-new-row">
                        <ul>
                          <?php foreach($seatmap_row['Seats'] as $key2=>$seatmapclm){
															if(is_array($seatmapclm)){
																if($seatmapclm['BerthType']=='U'){
																	$tmp_array[]=$seatmapclm;
																	continue;
																}
																if($key==0)
																$setrow++;
																 ?>
                          <li title="Seat No: <?php echo $seatmapclm['SeatNo']?> | Fare: Rs.<?php echo $priceBySeat[$seatmapclm['SeatTypeId']]['Fare']?>" class=" setselection <?php echo (array_key_exists($seatmapclm['SeatNo'],$bookedSeat))?'Seats-Low-Booked-Gents':'Seats-Low-Available'?>"> <a class="setselectiona"  data-settypeid="<?php echo $seatmapclm['SeatTypeId']?>" data-setno="<?php echo $seatmapclm['SeatNo']?>" data-seatprice="<?php echo $priceBySeat[$seatmapclm['SeatTypeId']]['Fare']?>" data-seatTax="<?php echo $priceBySeat[$seatmapclm['SeatTypeId']]['ServiceTax']?>" title="Seat No: <?php echo $seatmapclm['SeatNo']?> | Fare: Rs.<?php echo $priceBySeat[$seatmapclm['SeatTypeId']]['Fare']?>" ></a>
                            <input type="checkbox" style="display:none"  class="seatcheck" name="seatselected[]" data-seatno="<?php echo $seatmapclm['SeatNo']?>" value="<?php echo $seatmapclm['SeatTypeId'].'_'.$seatmapclm['SeatNo']?>">
                          </li>
                          <?php }else{
															?>
                          <li class="Seats-Img-No"></li>
                          <?php
															}
														} ?>
                        </ul>
                      </div>
                      <!--Bus-Seats-new-row-->
                      
                      <?php $upper_berth_array[]=$tmp_array;} ?>
                      <!--<div class="Bus-Seats-new-row">
                                                	<ul>
                                                        <li class="Seats-Low-Available"></li>
                                                        <li class="Seats-Low-Selected"></li>
                                                        <li class="Seats-Low-Booked-Gents"></li>
                                                        <li class="Seats-Low-Booked-Gents"></li>
                                                        <li class="Seats-Low-Booked-Ladies"></li>
                                                        <li class="Seats-Low-Booked-Ladies"></li>
                                                    </ul>
                                                
                                                
                                                </div>--><!--Bus-Seats-new-row--> 
                      
                    </div>
                    <?php if(!empty($upper_berth_array)){?>
                    <div class="Bus-Seats-up ">
                      <div class="bus-img-up"><img src="/img2/up.png" alt=""/></div>
                      <?php foreach($upper_berth_array as $key=>$upper_berth_row){
													if(is_array($upper_berth_row)){	?>
                      <div class="Bus-Seats-up-row">
                        <ul>
                          <?php foreach($upper_berth_row as $key2=>$upper_berth_colm){?>
                          <li title="Seat No: <?php echo $upper_berth_colm['SeatNo']?> | Fare: Rs.<?php echo $priceBySeat[$upper_berth_colm['SeatTypeId']]['Fare']?>" class=" setselectionup <?php echo (array_key_exists($upper_berth_colm['SeatNo'],$bookedSeat))?'Seats-up-Booked-Gents':'Seats-up-Available'?>"> <a class="setselectiona"  data-settypeid="<?php echo $upper_berth_colm['SeatTypeId']?>" data-setno="<?php echo $upper_berth_colm['SeatNo']?>" data-seatprice="<?php echo $priceBySeat[$upper_berth_colm['SeatTypeId']]['Fare']?>" data-seatTax="<?php echo $priceBySeat[$upper_berth_colm['SeatTypeId']]['ServiceTax']?>" title="Seat No: <?php echo $upper_berth_colm['SeatNo']?> | Fare: Rs.<?php echo $priceBySeat[$upper_berth_colm['SeatTypeId']]['Fare']?>" ></a>
                            <input type="checkbox" style="display:none"  class="seatcheck" name="seatselected[]" data-seatno="<?php echo $upper_berth_colm['SeatNo']?>" value="<?php echo $upper_berth_colm['SeatTypeId'].'_'.$upper_berth_colm['SeatNo']?>">
                          </li>
                          <?php } ?>
                        </ul>
                      </div>
                      <!--Bus-Seats-new-row-->
                      <?php }else{?>
                      <div class="Bus-Seats-Row"> </div>
                      <!--Bus-Seats-Row-->
                      <?php } }?>
                      <!--<div class="Bus-Seats-up-row">
                                                	<ul>
                                                       <li class="Seats-up-Available"></li>
                                                        <li class="Seats-up-Selected"></li>
                                                        <li class="Seats-up-Booked-Gents"></li>
                                                        <li class="Seats-up-Img-No2"></li>
                                                        <li class="Seats-up-Booked-Ladies"></li>
                                                        <li class="Seats-up-Img2"></li>
                                                    </ul>
                                                
                                                
                                                </div>Bus-Seats-new-row
--> 
                      <!--Bus-Seats-new-row--> 
                      <!--Bus-Seats-new-row--> 
                      <!--Bus-Seats-new-row--> 
                      
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-sm-4">
                    <div class="Bus-Seats-w3-lower">
                      <div class="col-sm-12">
                        <div class="Bus-Seats-w3-info">
                          <ul>
                            <li><span><img src="/img2/s-sp1.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Available Seat</li>
                            <li><span><img src="/img2/s-sp2.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Selected Seat</li>
                            <li><span><img src="/img2/s-sp3.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Booked Seat</li>
                            <li><span><img src="/img2/s-sp4.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Available Ladies Seat</li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="Bus-Seats-w3-info">
                          <ul>
                            <li><span><img src="/img2/sp4.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Available Seat</li>
                            <li><span><img src="/img2/sp1.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Selected Seat</li>
                            <li><span><img src="/img2/sp2.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Booked Seat</li>
                            <li><span><img src="/img2/sp3.png" alt=""/></span>&nbsp;&nbsp;&nbsp;Available Ladies Seat</li>
                          </ul>
                        </div>
                        <!--Bus-Seats-w3-info--> 
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="fare">
                      <div class="seatsSelected clearfix">
                        <label><b>Seat(s)</b> : <span id="setselectedHtml"></span></label>
                      </div>
                      <div class="amount clearfix">
                        <label>Base Fare : <span class="basefare fareval" id="baseFareHtml"></span></label>
                      </div>
                      <!--  <div class="amount clearfix Hide" id="svcDiv" style="display: none;">
						<label>Service Charge : </label>
						<span class="servicecharge fareval"></span>
					</div>-->
                      <div class="amount clearfix" id="svtDiv">
                        <label>Service Tax : <span class="servicetax fareval" id="servicetax"></span></label>
                      </div>
                      <div class="amount clearfix">
                        <label>Total Fare : <span class="totalfare fareval" id="totalfare"></span></label>
                      </div>
                      <?php 
								$BusType=($bus_dietail['BusType']=='AC')?'AC Bus':'Bus';
								$markepdata=$this->agent_model->get_busMrakup($BusType);
								$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;?>
                                
                      <div class="amount clearfix">
                        <label>Agent Markup : RS <?php echo $markup?>(Per Ticket)</label>
                      </div>
                       <div class="amount clearfix">
                        <label>Grand Total Fare : <span class="grandtotalfare fareval" id="grandtotalfare"></span></label>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                          <?php if(is_array($bus_seat_map['SeatMapOutput']['BoardingPoints'])){?>
                          <label>Choose boarding point</label>
                          <select  name="boarding_point"  class="input-text full-width">
                            <!--  <option value="">-- Boarding points --</option>-->
                            <?php foreach($bus_seat_map['SeatMapOutput']['BoardingPoints'] as $key=>$boarding){?>
                            <option value="<?php echo $boarding['BoardingId'];?>"><?php echo $boarding['Place'];?>,<?php echo $boarding['Address'];?></option>
                            <?php }?>
                          </select>
                          <?php }?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                          <?php if(is_array($bus_seat_map['SeatMapOutput']['DroppingPoints'])){?>
                          <label>Choose Dropping Points</label>
                          <select  name="dropping_point"  class="input-text full-width">
                            <option value="">-- Dropping Points --</option>
                            <?php foreach($bus_seat_map['SeatMapOutput']['DroppingPoints'] as $key=>$boarding){?>
                            <option value="<?php echo $boarding['DroppingId'];?>"><?php echo $boarding['Place'];?>,<?php echo $boarding['Address'];?></option>
                            <?php }?>
                          </select>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <button class="pull-right" name="bookb" value="seatSelected" type="submit">Book</button>
                <?php echo form_close();?> </div>
            </div>
          </div>
          <div id="cruise-features" class="tab-container">
            <ul class="tabs">
              <li class="active"><a href="#cruise-description" data-toggle="tab">Description</a></li>
              <li><a href="#car-upgrade" data-toggle="tab">Upgrade Your Bus</a></li>
              <!--<li><a href="#cruise-availability" data-toggle="tab">Availability</a></li>
                                <li><a href="#cruise-amenities" data-toggle="tab">Amenities</a></li>
                                <li><a href="#cruise-food-dinning" data-toggle="tab">Food &amp; Dinning</a></li>-->
              <li><a href="#cruise-reviews" data-toggle="tab">Reviews</a></li>
              <li><a href="#cruise-write-review" data-toggle="tab">Write a Review</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="cruise-description">
                <div class="intro table-wrapper full-width hidden-table-sms">
                  <div class="col-sm-5 col-lg-4 features table-cell">
                    <ul>
                      <li>
                        <label>Bus name:</label>
                        <?php echo $bus_dietail['BusName']?></li>
                      <li>
                        <label>Bus Type:</label>
                        <?php echo $bus_dietail['BusType']?></li>
                      <li>
                        <label>Transport Name:</label>
                        <?php echo $bus_dietail['TransportName']?></li>
                      <li>
                        <label>Departure Time:</label>
                        <?php echo $bus_dietail['DepartureTime']?></li>
                      <li>
                        <label>Arrival Time:</label>
                        <?php echo $bus_dietail['ArrivalTime']?></li>
                      <li>
                        <label>Available Seat:</label>
                        <?php echo $bus_dietail['AvailableSeatCount']?></li>
                    </ul>
                  </div>
                  <div class="col-sm-7 col-lg-8 table-cell cruise-itinerary">
                    <div class="travelo-box">
                      <h4 class="box-title">Boarding Points</h4>
                      <table>
                        <thead>
                          <tr>
                            <th>Place</th>
                            <th>Time</th>
                            <th>Address</th>
                            <th>ContactNumber</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($bus_seat_map['SeatMapOutput']['BoardingPoints'])){?>
                          <?php foreach($bus_seat_map['SeatMapOutput']['BoardingPoints'] as $BoardingPoints){?>
                          <tr>
                            <td><?php echo $BoardingPoints['Place']?></td>
                            <td><small><?php echo $BoardingPoints['Time']?></small></td>
                            <td><small><?php echo $BoardingPoints['Address']?></small></td>
                            <td><?php echo $BoardingPoints['ContactNumber']?></td>
                          </tr>
                          <?php }
													}?>
                        </tbody>
                      </table>
                      <?php if(is_array($bus_seat_map['SeatMapOutput']['DroppingPoints'])){?>
                      <h4 class="box-title">Dropping Points</h4>
                      <table>
                        <thead>
                          <tr>
                            <th>Place</th>
                            <th>Time</th>
                            <th>Address</th>
                            <th>ContactNumber</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($bus_seat_map['SeatMapOutput']['DroppingPoints'] as $BoardingPoints){?>
                          <tr>
                            <td><?php echo $BoardingPoints['Place']?></td>
                            <td><small><?php echo $BoardingPoints['Time']?></small></td>
                            <td><small><?php echo $BoardingPoints['Address']?></small></td>
                            <td><?php echo $BoardingPoints['ContactNumber']?></td>
                          </tr>
                          <?php
													}?>
                        </tbody>
                      </table>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <div class="long-description"> </div>
              </div>
              <div class="tab-pane fade in" id="car-upgrade">
                <h2>Upgrade Your Bus Experience</h2>
                <div class="car-list listing-style3 car">
                  <?php $Buses=$this->session->userdata('SearchOutput');?>
                  .
                  <?php foreach($Buses['SearchOutput']['AvailableBuses'] as $key=>$bus){?>
                  <?php if($key>11)break; ?>
                  <?php if($bus_dietail['ScheduleId']==$bus['ScheduleId'])continue; ?>
                  <article class="box"> 
                    <!-- <figure class="col-xs-3">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>-->
                    <div class="details col-xs-12 clearfix">
                      <div class="col-sm-8">
                        <div class="clearfix">
                          <h4 class="box-title"><?php echo $bus['BusName']?><small><?php echo $bus['BusType']?></small></h4>
                          <div class="logo"> Seat Available <?php echo $bus['AvailableSeatCount']?> </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-2 character">
                        <dl class="">
                          <dt class="skin-color">DepartureTime</dt>
                          <dd><?php echo $bus['DepartureTime']?></dd>
                          <dt class="skin-color">ArrivalTime</dt>
                          <dd><?php echo $bus['ArrivalTime']?></dd>
                        </dl>
                      </div>
                      <div class="action col-xs-6 col-sm-2"> <span class="price"><small>per seat avg</small>Rs <?php echo $bus['Fares'][0]['Fare']?></span>
                        <?php $this->session->set_userdata('Bus_'.$bus['ScheduleId'], $bus);?>
                        <a href="<?php echo base_url('index.php/agent/GetSeatMap/'.$bus['ScheduleId'].'/'.$Buses['UserTrackId']);?>" class="button btn-small full-width">select</a> </div>
                    </div>
                  </article>
                  <?php }?>
                </div>
                <a href="#" class="button btn-large full-width">LOAD MORE CARS</a> </div>
              <div class="tab-pane fade" id="cruise-reviews">
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
                            <label>Ship Quality</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Ship Staff Quality</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Dining/Food</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Activities</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>rooms Quality</label>
                            <div class="five-stars-container">
                              <div class="five-stars" style="width: 78%;"></div>
                            </div>
                          </div>
                        </li>
                        <li class="col-md-6">
                          <div class="each-rating">
                            <label>Play areas</label>
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
                        <h4 class="comment-title">Pretty good for a weekend</h4>
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
                        <h4 class="comment-title">First time cruise - FANTASTIC</h4>
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
                        <h4 class="comment-title">5-day Carnival Inspiration out of Tampa</h4>
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
              <div class="tab-pane fade" id="cruise-write-review">
                <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                  <article class="image-box box cruise listing-style1 photo table-cell col-sm-4">
                    <figure> <a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a> </figure>
                    <div class="details">
                      <h4 class="box-title">Carnival Cruise Lines<small>Carnival inspiration</small></h4>
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
                              <label>Ship Quality</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Ship Staff Quality</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Dining/Food</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Activities</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>rooms Quality</label>
                              <div class="five-stars-container editable-rating" data-original-stars="4"></div>
                            </div>
                          </li>
                          <li class="col-md-6">
                            <div class="each-rating">
                              <label>Play areas</label>
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
                    <h4 class="title">Add a tip to help travelers choose a good ship</h4>
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
            <figure> <img width="320" height="80" src="http://placehold.it/320x80" alt=""> </figure>
            <div class="details">
              <h2 class="box-title">4 Night Baja Mexico<small>mon, Jan 26, 2014</small></h2>
              <span class="price clearfix"> <small class="pull-left">from</small> <span class="pull-right">$239</span> </span>
              <div class="feedback clearfix">
                <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                <span class="review pull-right">270 reviews</span> </div>
              <p class="description">Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
              <a class="button yellow full-width uppercase btn-small">add to wishlist</a> </div>
          </article>
          <div class="travelo-box contact-box">
            <h4>Need KP Holidays Help?</h4>
            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
            <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span> <br>
            <a class="contact-email" href="#">help@KP Holidays.com</a>
            </address>
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
          <h4 class="modal-title" id="myModalLabel">Fare Details</h4>
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
<style>
 .Bus-Seats-Boxs{
	background: #2d3e52 !important;
    padding: 20px 30px; color: #7c9abd;
	 
	}
  
  
 .Bus-Seats{ 
 	background-color:#FFF; 
	padding:5px; 
	border:1px solid #eaeaea; 
	border-radius:4px; 
	/*width:136px;     
	height: 335px;*/ 
	margin:0 auto; 
	float:none;
 }
 
 
 
 .bus-img{margin-bottom: 14px;}
 
  .Bus-w1{
	  width:136px;
	  }
 .Bus-w2{ width:156px;}
 
 
 .Bus-w3{ width:400px;}
  .Bus-Seats-Row{
	
}
 
 .Bus-Seats ul{     
 	position: relative;
	margin-bottom:10px;
	}
 .Bus-Seats ul li{ position:relative;
 margin-left:1px;
 margin-right:1px;} 
 .Bus-Seats ul li a{
	padding: 0;
    margin: 0;
    background-image: url(/img2/s1.png);
    background-repeat: no-repeat;
    display: block;
    text-decoration: none; 
	width:22px; 
	height:18px; 
	cursor:pointer;
	/*position: absolute;*/
	 
	 }
 .Bus-Seats ul li:hover{}
 
  .Bus-Seats-w3{ 
 	background-color:#FFF; 
	padding:12px; 
	border:1px solid #eaeaea; 
	border-radius:4px; 
	  
	height: 125px; 
	margin:0 auto; 
	float:none; position:relative;
 }
 .Bus-Seats-w3 ul{     
 	position: relative;
	}
 .Bus-Seats-w3 ul li{ position:absolute;} 
 .Bus-Seats-w3 ul li a{
	padding: 0;
    margin: 0;
    background-image: url(/img2/sp2.png);
    background-repeat: no-repeat;
    display: block;
    text-decoration: none; 
	width:58px; 
	height:19px; 
	position: absolute;
	 
	 }
 .Bus-Seats-w3 ul li:hover{}
 
 .Bus-Seats-w3-info{ 
 	background-color:#FFF; 
	padding:5px; 
	border: 1px solid #eaeaea; 
	border-radius: 4px;}

 .Bus-Seats-w3-img{ position:absolute;     
 	left: 35px;
    top: 25px;}
.Bus-Seats-w3-lower{ margin-top:25px;}
.bus-img2{ position:absolute;} 
.bookedseat{
	 background-image: url(/img2/s4.png) !important;
}
/**/
 
  .Bus-Seats-w3-info{ 
 	background-color:#FFF; 
	padding:5px; 
	border: 1px solid #eaeaea; 
	border-radius: 4px; margin-bottom:15px;}
	
 .Bus-Seats-w3-lower{ margin-top:35px;}
 
  .Bus-Seats-new{ 
 	background-color:#FFF; 
	padding:10px; 
	border:1px solid #eaeaea; 
	border-radius:4px; 
	width:425px;     
	height: 116px; margin-top:35px; 
 } 
 
   .Bus-Seats-new2{ 
 	background-color:#FFF; 
	padding:10px; 
	border:1px solid #eaeaea; 
	border-radius:4px; 
	width:425px;	   
	height: 150px; 
	margin-top:35px; 
 }

.Bus-Seats-new-row{
	width:32px;
	float:left
}

.bus-img-new{ 
	width:50px; 
	float:left;
}
	
.Seats-Low-Available{
	background-image: url(/img2/s-sp1.png);
    background-repeat: no-repeat;
	cursor:pointer;
	width:24px; 
	height:22px;
}
.Seats-Low-Selected{
	background-image: url(/img2/s-sp2.png);
    background-repeat: no-repeat;
	width:24px; 
	cursor:pointer;
	height:22px;
}

.Seats-Low-Booked-Gents{
	background-image: url(/img2/s-sp3.png);
    background-repeat: no-repeat;
	width:24px; 
	height:22px;
}
.Seats-Low-Booked-Ladies{
	background-image: url(/img2/s-sp4.png);
    background-repeat: no-repeat;
	width:24px; 
	height:22px;
}	
	

.Seats-Img-No{
	width:22px; 
	height:18px;
	}


	
.Bus-Seats-up{ 
	background-color:#FFF; 
	padding:10px; 
	border:1px solid #eaeaea; 
	border-radius:4px; 
	min-width:425px;    
	width:100%; 
	height:180px;	
	margin-top:35px; 
	
}
.Bus-Seats-up-row{
	width:65px; 
	float:left;}
.Seats-up-Available{
	background-image: url(/img2/sp4.png);
    background-repeat: no-repeat;
	width:58px; 
	height:19px;
	cursor:pointer;
	margin-bottom:5px;
}
.Seats-up-Selected{
	background-image: url(/img2/sp1.png);
    background-repeat: no-repeat;
	width:58px; 
	cursor:pointer;
	height:19px;
	margin-bottom:5px;
}

.Seats-up-Booked-Gents{
	background-image: url(/img2/sp2.png);
    background-repeat: no-repeat;
	width:58px; 
	height:19px;
	margin-bottom:5px;
}
.Seats-up-Booked-Ladies{
	background-image: url(/img2/sp3.png);
    background-repeat: no-repeat;
	width:58px; 
	height:19px;
	margin-bottom:5px;
}
.Seats-up-Img-No2{
	width:58px; 
	height:19px;
	
	}
.bus-img-up{ 
	width:50px; 
	float:left;
}
/*.Bus-w21{
	width:100%;
	min-width:300px;
}*/
  
</style>

<!-- Google Map Api --> 
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> 
<script type="text/javascript">
	
	
	
			/*$(".setselection").click(function() {
				
				if($(this).css('background-image')=='url("http://kpholidays.com/img2/s1.png")'){
					$(this).css('background-image','url("/img2/s2.png")');
					$(this).parent().find('.seatcheck').prop( "checked", true );
					calcullatePrice($(this));				
				}else{				
					if($(this).css('background-image')=='url("http://kpholidays.com/img2/s2.png")'){
						$(this).css('background-image','url("/img2/s1.png")');	
						$(this).parent().find('.seatcheck').prop( "checked", false );
						calcullatePrice($(this));		
					}
				}
				
			});*/
		
        $(".setselection").click(function() {
				
				if($(this).hasClass('Seats-Low-Available')){
					$(this).addClass('Seats-Low-Selected');
					$(this).removeClass('Seats-Low-Available');
					$(this).find('.seatcheck').prop( "checked", true );
					calcullatePrice($(this));				
				}else{				
					if($(this).hasClass('Seats-Low-Selected')){
						$(this).addClass('Seats-Low-Available');
					    $(this).removeClass('Seats-Low-Selected');
						$(this).find('.seatcheck').prop( "checked", false );
						calcullatePrice($(this));		
					}
				}
				
			});
			
		$(".setselectionup").click(function() {
				
				if($(this).hasClass('Seats-up-Available')){
					$(this).addClass('Seats-up-Selected');
					$(this).removeClass('Seats-up-Available');
					$(this).find('.seatcheck').prop( "checked", true );
					calcullatePrice($(this));				
				}else{				
					if($(this).hasClass('Seats-up-Selected')){
						$(this).addClass('Seats-up-Available');
					    $(this).removeClass('Seats-up-Selected');
						$(this).find('.seatcheck').prop( "checked", false );
						calcullatePrice($(this));		
					}
				}
				
			});
		
		function calcullatePrice(obj){
			var selectedSeat="";
			var tax=0;
			var baseprice=0;
			var numofseatselected=0;
			$('.seatcheck').each(function(index, element) {
                //console.log($(this).prop( "checked" ));
				if($(this).prop( "checked" )){
					selectedSeat=selectedSeat+$(this).data('seatno')+",";
					tax=tax+$(this).parent().find('.setselectiona').data('seattax');
					basepricet=$(this).parent().find('.setselectiona').data('seatprice')-$(this).parent().find('.setselectiona').data('seattax');
					baseprice=baseprice+basepricet;
					numofseatselected++;
				}
            });
			$("#setselectedHtml").html(selectedSeat);
			$("#servicetax").html("Rs "+tax);
			$("#baseFareHtml").html("Rs "+baseprice);
			$("#totalfare").html("Rs "+(baseprice+tax));
			$("#grandtotalfare").html("Rs "+(baseprice+tax+(numofseatselected*(<?php echo $markup?>))));
		}
        
       function checkseat(){
		   if($("#setselectedHtml").html()==''){
			   alert('Please select at least 1 seat');
			   return false;
		   }
	   }
    </script>
<?php  $this->load->view('agent/footer');?>

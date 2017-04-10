<?php
          
 
				 $search_data=array();
				 $j=0;
				for($i=0;$i<count($FlightId[1]);$i++)
                {
					$search_data[$i]['FlightId']=$FlightId[1][$i];					
					$search_data[$i]['CarrierCode']=$CarrierCode[1][$i];
					$search_data[$i]['FlightNo']=$FlightNo[1][$i];
					$search_data[$i]['AirCraftType']=$AirCraftType[1][$i];
					$search_data[$i]['Source']=$Source[1][$i];
					$search_data[$i]['Destination']=$Destination[1][$i];
					$search_data[$i]['DepartureDateTime']=$DepartureDateTime[1][$i];
					$search_data[$i]['ArrivalDateTime']=$ArrivalDateTime[1][$i];
					$search_data[$i]['Duration']=$Duration[1][$i];
					$search_data[$i]['NumberofStops']=$NumberofStops[1][$i];
					$search_data[$i]['CurrencyCode']=$CurrencyCode[1][$i];
					$search_data[$i]['GrossAmount']=$GrossAmount[1][$i];
					$search_data[$i]['ClassCode']=$ClassCode[1][$i];
					$search_data[$i]['BasicAmount']=$BasicAmount[1][$i];
					
					
				}
				
                  	
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>52WKENDS</title>
    
<link rel="shortcut icon" href="<?php echo base_url(); ?>site/favicon.ico" type="image/x-icon"/>

<link href="<?php echo base_url(); ?>site/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>site/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>site/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>site/css/media.css" rel="stylesheet">

<!-- Owl Carousel Assets -->
<link href="<?php echo base_url(); ?>site/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>site/owl-carousel/owl.theme.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<script src="<?php echo base_url('assets/js/jqueryui/jquery-1.8.3.js');?>"></script>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link  href="<?php echo base_url('assets/css/jquery-ui-1.9.2.custom.css');?>"rel="stylesheet"/>
<!--here used jquery  ui js -->

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
   </head>
   <body>
     <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    
    
    <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
      <div class="header-link col-lg-6 col-md-5 col-sm-4 col-xs-12">
        <ul>
          <li><a href="<?php echo base_url('index.php/site/index');?>" title="Home"><i class="fa fa-home"></i></a></li>
          <li><a href="#" title="Offer"><i class="fa fa-gift"></i></a></li>
        </ul>
      </div>
      <!--header-link-->
      <form class="navbar-form navbar-right TopRightBtn" role="search">
       
        <a href="<?php echo base_url();?>index.php/user/" class="btn btn-warning signup"> Login</a> 
        <a href="<?php echo base_url();?>index.php/user/register" class="btn btn-warning signup"> Register</a>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">
        	
        </a></li>-->

<li><a href="#"> <i class="fa fa-phone"></i> &nbsp;+91 7753999992</a></li>

        <li class="sep hidden-xs"> </li>
        <li><a href="#">My Rewards</a></li>
      </ul>
    
    </div>
    
    
    
    <!--/.navbar-collapse --> 
  </div>
  <!-- End container--> 
</nav>
<header class="header">
  
  <div class="container">
  
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 logo">
      <div class="row"> <a href="<?php echo base_url();?>" ><img src="<?php echo base_url(); ?>site/images/logo.png"></a> </div>
    </div>
    <!-- End logo-->
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 Nav-Icon">
      <div class="row">
        <div class="text-center">
          <ul class="nav navbar-nav new-nav Nav-Icon">
            <li class=" navbar-navicon"><a href="#"> <i class="fa fa-plane"></i> </a></li>
            <li class=" navbar-navicon"><a href="#"> <i class="fa fa-subway"></i> </a></li>
            <li class=" navbar-navicon"><a href="#"> <i class="fa fa-car"></i> </a></li>
            <li class=" navbar-navicon"><a href="#"> <i class="fa fa-cutlery"></i> </a></li>
           
          </ul>

          <!-- End Nav-Icon--> 
        </div>
      </div>
    </div>
  </div>
  <!-- End container--> 
</header> 
	    
         <div class="container">
           <div class="row">       
         	<div class="Content-Wrap">
            
           <div class="Inspire-Search clearfix">
               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" >
        
          <div style="width: 200px; height:80px; float: left;">
            <div style="float: left;">Flight<br/><br />
               <?php echo $detail['flight']; ?>
              	
            </div>
           
            <div class="clearfix"></div>
          </div>
        
          <div style="width: 300px; height:80px; float: left;">
            <div style="width: 260px; height:80px; float: left; margin-left: 20px;"> From<br/><br />
              <?php echo $detail['from']; ?>
              	
              </div>
            <div style="float: left; margin-left: 130px; margin-top: -80px; "> To<br/><br />
              <?php echo $detail['to']; ?></div>
            <div class="clearfix"></div>
          </div>
        
          <div>&nbsp;</div>
        <div class="clearfix"></div><div class="clearfix"></div>
           <div  style="width: 300px; height:80px; float:right;margin-top:-80px;margin-left:-150px; margin-right:23px;">
            <div style="width: 100px; height:80px; float: left; margin-left: 30px;">Date<br/><br />
              <?php echo $a=$detail['checkin']; ?>
            </div>
            <div style="width: 200px; height:80px; float: right;margin-right: -25px; margin-top: -80px;">No. of Adults<br/>
              <?php echo $detail['adults']; ?>
            </div>
            <div class="clearfix"></div>
          </div>
          
        
         <input type="hidden" id="chkin" value="<?php echo $detail['checkin'];?>">
         <input type="hidden" id="chkout" value="<?php echo $detail['checkout'];?>">
        
        </div>
             
        <div style="width: 200px; height:80px; float:right; margin-right:0px;">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"> Modify       
          </button>
        </div>

		  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
         
            <div class="modal-content modal-content">
             <div style="background-color:#EFB400; padding:6px;"><h4 class="modal-title">Search Flight</h4></div>                      <div class="modal-body">
                <!--<form>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>-->
              
              <!--this is modify block  bellow-->
               
                <?php     
					$attributes = array('class' => 'require-validation', 'id' => '', 'method' => 'post');
					echo form_open_multipart('index.php/site/packages', $attributes); ?>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">DESTINATION</label>
                          <div class="input-group">
                            <input type="text" id="destination" value="" name="destination" class="form-control" required >
                            <span class=" input-group-addon addon"> <i class="glyphicon glyphicon-triangle-bottom"></i> </span> </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">BUDGET</label>
                          <div class="input-group">
                            <input type="number" name="budget" class="form-control" value="" required>
                            <span class=" input-group-addon addon"> <i class="glyphicon glyphicon-triangle-bottom"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">FROM</label>
                          <div class="input-group">
                            <input type="text" name="checkin" class="form-control datepicker"  value="" required>
                            <span class=" input-group-addon addon"> <i class="glyphicon glyphicon-triangle-bottom"></i> </span> </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="control-label">TO</label>
                          <div class="input-group">
                            <input type="text" name="checkout" class="form-control datepicker" value="" required>
                            <span class=" input-group-addon addon"> <i class="glyphicon glyphicon-triangle-bottom"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="lbl"> ADULTS: 12+Yrs </label>
                          <input type="number" name="adults" class="form-control input-sm" value="" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="lbl">CHILD: 2-11 Yrs</label>
                          <input type="number" name="child" class="form-control input-sm" value="" >
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="lbl">INFANT: 0-2 Yrs</label>
                          <input type="number" name="infant" class="form-control input-sm" value="" >
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label class="lbl">CHILD: 2-11 Yrs</label>
                          <input type="number" name="child_" class="form-control input-sm" placeholder="1" >
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                        
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <input type="submit" name="submit" id="submit" value="Search Packages" class="btn btn-warning btn-block btn-sm btn-y">
                        <!--<a class="btn btn-warning btn-block btn-sm btn-y" href="">Search PACKAGES </a>--> 
                      </div>
                      <div class="col-sm-6 col-xs-12"> </div>
                    </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Send message2222</button>-->
              </div>
            </div>
          </div>
        </div>
       

         <div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
         
            <div class="modal-content modal-content">
             <div style="background-color:#EFB400; padding:6px;"><h4 class="modal-title">Fare Detail</h4></div>  
			 <div class="modal-body">
                                
                    <div class="row">
                      
                      
                    </div>
                     
                   
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Send message2222</button>-->
              </div>
            </div>
          </div>
        </div>
                
		   
                   
                 </div><!--Inspire-Search-->
            	
				<div class=" clearfix"></div>
				
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Left-Colum">
                 	<h3>Reset All</h3>
                                        
                 	<div class="Filter-Box clearfix">
                    	<div class=""><h4>Budget <span>Reset</span></h4></div>
                        <ol>
                            <li>
                               <a href="#">Up To INR19999 <span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                            	<a href="#">INR20000 To INR29999 <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">INR30000 To INR39999 <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">INR40000 To INR49999 <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->
                    <div class="Filter-Box clearfix">
                    	<div class=""><h4>Duration <span>Reset</span></h4></div>
                        <ol>
                        	 <li>
                               <a href="#">Up To 3 Nights<span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                               <a href="#">4 Nights <span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                            	<a href="#">5 To 7 Nights <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">8 To 10 Nights <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">11 Nights And above <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->
                    <div class="Filter-Box clearfix">
                    	<div class=""><h4>Hotels Star Rating <span>Reset</span></h4></div>
                        <ol>
                            <li>
                            	<a href="#">Up To 3 Stars <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">4 Stars <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">5 Stars <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->
                    <div class="Filter-Box clearfix">
                    	<div class=""><h4>Travel By/Inclusions <span>Reset</span></h4></div>
                        <ol>
                        	<li>
                               <a href="#">By Flight <span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                               <a href="#">By Car <span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                            	<a href="#">By Bus <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Includes Sightseeing<span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Includes Meals <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->
                    <div class="Filter-Box clearfix">
                    	<div class=""><h4>Holiday Theme <span>Reset</span></h4></div>
                        <ol>
                            
                            <li>
                            	<a href="#">Honeymoon <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Group <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Customizable <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->	
					 <div class="Filter-Box clearfix">
                    	<div class=""><h4>Cities <span>Reset</span></h4></div>
                        <ol>
                            <li>
                               <a href="#">Shenzhen <span>0</span></a>
                               <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->              
                            </li>
                            <li>
                            	<a href="#">Macau City <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Disneyland <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>
                            <li>
                            	<a href="#">Super Star Virgo Hong Kong <span>0</span></a>
                                <input type="checkbox" class="Filter-Checkbox"> 
                                <!-- End Filter-Checkbox-->
                            </li>   
                                              
                        </ol>
                    </div><!--Filter-Box-->	
                 
                 </div><!--Left-Colum-->
				
<span id="UserTrackId"   style="display:none;"><?php echo $UserTrackId[1][0];?></span>	
				
				<!--Flight search -List-->
                <?php 
				
                if(!empty($CarrierCode[1][0]))
                {					
				$a=0;$b=3;
				for($i=0;$i<count($FlightId[1]);$i++){?> 
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 Center-Column">
                 
                 	<div class="List-Items clearfix">
                    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 List-Item-Info">
                        
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ListWrp-Thum" id="">
                               <?php echo $search_data[$i]['Source'];?>&nbsp;
                                    <img   src="<?php echo base_url('assets/img/arrow.png');?>"/>&nbsp;<?php echo $search_data[$i]['Destination'];?>
                                 

                              <?php $f_image=$this->notify_model->flight_image($search_data[$i]['CarrierCode']);
							      
							  ?>  
							   <div>
							   <img   src='<?php echo base_url('assets/ico/'.$f_image[0]['fimage']);?>'
							   width="30"  height="30"/></div>
                               <div>
                               
							   <?php 
   echo "<span id='AirlineId'>".$search_data[$i]['CarrierCode']."</span>"; echo ":&nbsp;&nbsp;".$search_data[$i]['FlightNo'];
							   
							   ?> </div>
   <input type="hidden" id="FlightId[]"  value="<?php echo $search_data[$i]['FlightId'];?>">
   <input type="hidden" id="ClassCode[]"  value="<?php echo $search_data[$i]['ClassCode'];?>">
   <input type="hidden" id="BasicAmount[]"  value="<?php echo $BasicAmount[1][$a];?>">
   
	</div><!-- End ListWrp-Thum-->
                            
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ListWrp-TextView">
                                <!-- <div class="ListWrp-Heading"><a href="#"></a> </div>End ListWrp-Heading-->

                                <div>
                                 <div><strong>Departure &nbsp;&nbsp;&nbsp;</strong><?php echo $search_data[$i]['DepartureDateTime'];?></div>
                                 <div><strong>Arrive &nbsp;&nbsp;&nbsp;</strong><?php echo $search_data[$i]['ArrivalDateTime'];?></div>

                                 </div>

                                <div class="ListWrpRs">
                                	<ul>          
                                        <li class="promoM mt10" style="width:auto;"> 
                                        <span style="font-size:13px;"><strong>Duration: </strong>            
                                        <span class="RupeeSign" style="font-size:14px;">
										<?php echo $search_data[$i]['Duration'];?></span> </span>
										
										  <span style="font-size:13px;">&nbsp;&nbsp;&nbsp;Stops             
                                        <span class="RupeeSign" style="font-size:14px;">
										<?php echo $search_data[$i]['NumberofStops'];?></span> </span>
                                        </li>  
                                     </ul>
                                
                                </div><!-- End ListWrpRs-->
                                
                                
                                
                                
                                </div>
                                
                            <div class="clearfix"></div>
                            
                        </div><!-- End List-Item-Info-->
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 List-Item-ShowPrice">
                            <div>
                             
                            </div>

                        <div class="ShowPackagePrice">     
                            <ul>      
                            <li class="startingFrom"></li>       
                            <li class="text-center"><?php echo $search_data[$i]['CurrencyCode'];?>
                             <?php echo $GrossAmount[1][$a];?> </li>
                            <li>          
                           
                            <button class="ShowPackagePrice-Btn2" type="submit">Book </button><!-- End View-Details-Btn-->
							<!--<a class="js-open-modal" href="#" data-modal-id="popup">Fare Detail</a>-->
							<div style="width: 200px; float:right; margin-right:0px;">
                             <a href="#exampleModals"  data-toggle="modal"  id="fare_detail"  data-whatever="@fat"> Fare Detail       
                             </a>
        </div>
                            </li>            
                              <!-- Large modal -->
                  
					 </ul>       
                    
                     </div>
                        
                        </div><!-- End List-Item-ShowPrice-->
                        <div class="clearfix"></div>              
                    </div><!-- End List-Items-->

               
                 </div><!-- Flight List-->
                 <br/>
                 <br/>
				<?php 
                   $a=$b;
				   $b=$b+3;

				} 
				}
				
				else
				{
					echo "<h3>Sorry no Flight Details  are available in this Root !</h3>";
				}
				
				?>
				  
				 <div class=" clearfix"></div>

            	</div><!-- End Content-Wrap-->
         
         	</div><!-- End row-->
          
		 </div><!-- End container-->
      

<div id="popup" class="modal-box">  
  <header>
    <a href="#" class="js-modal-close close">×</a>
    <h3><a href="http://www.jqueryscript.net/tags.php?/Modal/">Modal</a> Title</h3>
  </header>
  <div class="modal-body">
    <p>Modal Body</p>
  </div>
  <footer>
    <a href="#" class="js-modal-close">Close Button</a>
  </footer>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-clock-o"></i> Please Wait</h4>
      </div>
      <div class="modal-body center-block">
        <p>Probíhá přesouvání časových zázamů</p>
        <div class="progress">
          <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
	  
	  
      
      <footer>
         <div class="Footer-Wrp">
            <div class="container">
               <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 Footer-Contact">
                  <h6> Contact Us <span><a href="#"><i class="fa fa-envelope-o"></i></a></span></h6>  
               </div><!-- End Footer-Contact-->
               <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                  <div class="input-append newsletter-box text-center">
                     <input type="text" class="full text-center" placeholder="Enter email address for deals in your inbox">
                  </div><!-- End input-append newsletter-box-->
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 Footer-Social">
                  <div class="row">
                     <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 hidden-xs">
                        <div class="row">
                           <h6> Follow Us</h6>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 Footer-Social-Icon">
                         <div class="row social">
                            <ul>
                               <li class="fb"> <a href="#" title="Facebook"> <i class=" fa fa-facebook">   </i> </a> </li>
                               <li> <a href="#" title="Twitter"> <i class="fa fa-twitter">   </i> </a> </li>
                               <li> <a href="#" title="Google Plus"> <i class="fa fa-google-plus">   </i> </a> </li>
                               <li> <a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a> </li>
                            </ul>
                          </div><!-- End row--> 
                     </div><!-- End Footer-Social-Icon-->
                  </div><!-- End row-->
               </div>
            </div><!-- End container-->
         </div><!-- End Footer-Wrp-->
      </footer>
    
<script src="<?php echo base_url();?>site/owl-carousel/owl.carousel.js"></script>
  
<script src="<?php echo base_url('assets/js/jqueryui/jquery-ui-1.9.2.custom.js');?>"></script>


<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('assets/js/jqueryui/jquery-ui-1.9.2.custom.min.js');?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      
	<!--Flight tax-->
	 <script>
	 $(document).ready(function(){
        		
	  
	   /*	$.ajax(function(){
			 
			 
		 });
		*/ 
		 
	 });
	 
	 
	 </script>
	<!---->
	
	
	
	
	
	
		 <script>
			$(document).ready(function() {
			  $("#owl-demo").owlCarousel({
				autoPlay: 3000,
				items : 1,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			  });
				$("#owl-demo1").owlCarousel({
				autoPlay: 3000,
				items : 1,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			  });
		
			});
		
	$('#myModal').on('shown.bs.modal', function () {
 
    var progress = setInterval(function() {
    var $bar = $('.bar');

    if ($bar.width()==500) {
      
        // complete
      
        clearInterval(progress);
        $('.progress').removeClass('active');
        $('#myModal').modal('hide');
        $bar.width(0);
        
    } else {
      
        // perform processing logic here
      
        $bar.width($bar.width()+50);
    }
    
    $bar.text($bar.width()/5 + "%");
	}, 800);
  
  
});
		
		</script>


   </body>
</html>
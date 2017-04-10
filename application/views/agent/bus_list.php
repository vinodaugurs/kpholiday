<?php //print_r($Buses);?>

   <?php  $this->load->view('agent/header');?>
   <div id="page-wrapper">
	

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



<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
 
     
<link href="http://kpholidays.com/assets/css/custom.css" rel="stylesheet">

<link href="http://kpholidays.com/assets/css/style.css" rel="stylesheet">
    
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

<!-- add file end -->


         <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <!-- <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Bus Search Results</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">Bus Search Results</li>
                </ul>
            </div>
        </div> -->
        <section id="content" class="gray-area">
            <div class="container">
                    <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b id="resultfound"><?php echo @count($Buses['SearchOutput']['AvailableBuses']); ?></b> results found.</h4>
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
                                        <a data-toggle="collapse" href="#flight-times-filter" class="collapsed">Bus Times</a>
                                    </h4>
                                    <div id="flight-times-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="flight-times" class="slider-color-yellow"></div>
                                            <br />
                                            <span class="start-time-label pull-left"></span>
                                            <span class="end-time-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>                           
                                
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                        
                        	<div class="ModifySearchBox">
                            <div class="tab-pane1 fade1" id="Buses1">
                            
                            <form action="<?php echo base_url('index.php/agent/bus_list');?>" method="post">
            					<div class=" clearfix"></div>
                                  <div class="row">
                                      <div class="col-sm-2">
                                      <div class="form-group">
                                       <label>Select Origin</label>
                        
                                            <input type="text" name="Origin" id="bus_origin" required="required" class="input-text full-width" placeholder="Select Origin"  value="<?php echo (set_value('Origin')== True)?set_value('Origin'):""?>"/>


                                             <input type="hidden" name="bus_origin_code" id="bus_origin_code" required="required" class="input-text full-width" placeholder="Select Origin" />
                                          </div>
                                      </div>
                                       <div class="col-sm-2" style="padding:0px;">
                        
                                       <div class="form-group">
                        
                                            <label>Select Destination</label>
                        
                                            <input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="First chose  Origin"   value="<?php echo (set_value('Destination')== True)?set_value('Destination'):""?>"/>


                                            <input type="hidden" name="bus_destination_code" id="bus_destination_code" required="required"  class="input-text full-width" placeholder="Select Destination" />
                                          </div>
                        
                                       </div>
                    
                                        <div class="col-sm-3">
                        
                                            <div class="col-sm-12">
                        
                                            <label>Depart Date</label>
                        
                                              <div class="datepicker-wrap">
                        
                                                <input type="text" name="bus_departureDate" id="bus_departureDate" required="required" class="input-text full-width" placeholder="Depart Date" 
                                                value="<?php echo (set_value('bus_departureDate')==TRUE)?set_value('bus_departureDate'):''; ?>"
                                                />
                        
                                              </div>
                        
                                            </div>
                                        </div>
                    
                                    <div class="col-xs-3">
                        
                                     <label>&nbsp;</label>
                        
                                    <div class="input-group number-spinner">
                        
                                        <span class="input-group-btn data-dwn">
                        
                                        <button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" id="sub"><span class="glyphicon glyphicon-minus"></span></button>
                        
                                        </span>
                        
                                        <input type="text" title="Seats" name="Seats" class="form-control text-center" placeholder="1 Seats" min="-1" max="40"   value="<?php echo (set_value('Seats')==TRUE)?set_value('Seats'):'1'; ?>" id="value">
                        
                                        <span class="input-group-btn data-up">
                        
                                        <button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" id="add"><span class="glyphicon glyphicon-plus"></span></button>


                        
                                        </span>
                        
                                    </div>
                                            </div>
                                         <div class="col-sm-2">
                        
                                            <label>&nbsp;</label>
                        
                                         <button name="bus" value="search" class="full-width icon-check">SEARCH NOW</button>
                        
                                         </div>
                                  </div>

            				</form>
            
          						</div>
                            </div><!--ModifySearchBox-->
                        
                        
                        
                        
                            <div class="sort-by-section clearfix">
                                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name"><a onClick="sorByContent('name',jQuery(this));" class="sort-by-container" href="javascript:;"><span>name</span></a></li>
                                    <li class="sort-by-price active"><a onClick="sorByContent('price',jQuery(this));" class="sort-by-container" href="javascript:;"><span>price</span></a></li>
                                    <li class="clearer visible-sms"></li>
                                   
                                  
                                </ul>
                                
                                <!--<ul class="swap-tiles clearfix block-sm">
                                    <li class="swap-list active">
                                        <a href="car-list-view.html"><i class="soap-icon-list"></i></a>
                                    </li>
                                    <li class="swap-grid">
                                        <a href="car-grid-view.html"><i class="soap-icon-grid"></i></a>
                                    </li>
                                    <li class="swap-block">
                                        <a href="car-block-view.html"><i class="soap-icon-block"></i></a>
                                    </li>
                                </ul>-->
                            </div>
                            <div class="car-list listing-style3 car">
                            
                            <?php if(isset($Buses['SearchOutput'])){ ?>
                            <?php $this->session->set_userdata('SearchOutput', $Buses);?>
                            <?php foreach($Buses['SearchOutput']['AvailableBuses'] as $bus){?>
                                <article class="box">
                                <?php 
								$BusType=($bus['BusType']=='AC')?'AC Bus':'Bus';
								$markepdata=$this->agent_model->get_busMrakup($BusType);
								$markup=isset($markepdata[0]['adult_Commission'])?$markepdata[0]['adult_Commission']:0;


                                //commission task
                                $commissionData =$bus['Commission'];
                                // echo $commissionData;
                                if(isset($commissionData)){

                                
                                if($bus['BusType']=='AC'){

                                $this->session->set_userdata('Bus_commission_ac', $commissionData);
                                $getCommission =  $this->agent_model->get_data_table('agent_commision_markup',array('forcommision'=>'AC Bus','uid'=>4545));
                                // echo $commissionData;
                                // print_r($getCommission);
                                $commission = (($commissionData*$getCommission['0']['adult_Commission'])/100);
                                // $commission =0;
                                }else{
                                $this->session->set_userdata('Bus_commission_nonAC', $commissionData);
                                $getCommission =  $this->agent_model->get_data_table('agent_commision_markup',array('forcommision'=>'Non AC Bus','uid'=>4545));
                                $commission = (($commissionData*$getCommission)/100);

                                }

                                }
                                ?>
                                   <!-- <figure class="col-xs-3">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>-->
                                    <div class="details col-xs-12 clearfix" data-DepartureTime="<?php echo str_replace(array(' PM',' AM'),':00',$bus['DepartureTime'])?>" data-price="<?php echo $bus['Fares'][0]['Fare']?>">
                                        <div class="col-sm-8">
                                            <div class="clearfix">
                                                <h4 class="box-title"><?php echo $bus['BusName']?><small><?php echo $bus['BusType']?></small></h4>
                                                <div class="logo">
                                                   Seat Available <?php echo $bus['AvailableSeatCount']?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-6 col-sm-2 character">
                                            <dl class="">
                                                <dt class="skin-color">DepartureTime</dt><dd><?php echo $bus['DepartureTime']?></dd>
                                                <dt class="skin-color">ArrivalTime</dt><dd><?php echo $bus['ArrivalTime']?></dd>
                                                <dt class="skin-color">Commission</dt><dd>Rs <?php  if(isset($bus['Commission'])){ echo $commission; }?></dd>
                                               <dt class="skin-color">Agent Markup:</dt><dd>Rs <?php echo $markup?></dd>
                                            </dl>
                                        </div>
                                        <div class="action col-xs-6 col-sm-2">
                                            <span class="price"><small>per seat avg</small>Rs <?php echo $bus['Fares'][0]['Fare']+$markup?></span>
                                            <?php $this->session->set_userdata('Bus_'.$bus['ScheduleId'], $bus);?>
                                            <?php if($this->session->userdata('uid')!=''){ ?>
                                            <a href="<?php echo base_url('index.php/agent/GetSeatMap/'.$bus['ScheduleId'].'/'.$Buses['UserTrackId']);?>" class="button btn-small full-width">select</a>
                                             <?php }else{ ?>
											    <a class="button btn-small full-width text-center" title="" href="javascript:;" onClick="onpenSignup('<?php echo $bus['ScheduleId'].'/'.$Buses['UserTrackId']?>');">SELECT</a>
                                                <?php }?>
                                        </div>
                                    </div>
                                </article>
                                	<?php }?>
                                <?php }else{
									
									if(isset($Buses['ResponseStatus']) and $Buses['ResponseStatus']==0){?>
                                <h3 align="center">Sorry Bus is not available on this route !</h3>
                                <?php }} ?>
                               
                               
                            </div>
<!--                             <a href="#" class="button uppercase full-width btn-large">load more listings</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        <img src="<?php echo base_url('image/preloader.gif');?>"  width="50" height="25"/>  
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
<script type="text/javascript">    //Finding the fare Rule and Tax  Details                   

jQuery(function ($){   


jQuery("#add").click(function(){
      var data = parseInt(jQuery("#value").val());
      if(data<=9){
      
      var data = data+1;
     jQuery("#value").val(data);
	 return:false;

      }else{
        alert("Not More Then 10");
      }

    });

    jQuery("#sub").click(function(){
      var data = jQuery("#value").val();
      if(data>1){
      
      var data = data-1;
      jQuery("#value").val(data);

      }else{
        alert("Must Greater Then Zero");
      }

    });  
	

 var lastSearch="";




 jQuery("#bus_origin").blur(function(e) {
     if(lastSearch==jQuery("#bus_origin").val()){
         return false;
     }
      jQuery("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="Please Wait..." />');   

     jQuery.ajax ( {
          url: "<?php echo base_url('index.php/bus/BusGetDestination');?>",
          data: {term: jQuery("#bus_origin").val()},
          dataType: "json",
          success: function(data) {
                 lastSearch=jQuery("#bus_origin").val();
                  if(data==false){
                      alert("Sorry! no bus available from this origin");
                      jQuery("#bus_destination")
        .replaceWith('<select  id="bus_destination" required="required" placeholder="chose diffrent origin..."  name="Destination" class="input-text full-width"><option value="">please chose diffrent origin</option></select>');
                  }else{
                      var optionss='';
                      jQuery(data).each(function(index, element) {                       
                        optionss=optionss+'<option value="'+element.DestinationId+'">'+element.DestinationName+'</option>'
                    });
                    jQuery("#bus_destination")
        .replaceWith('<select onchange="jQuery(\'#bus_destination_code\').val(jQuery(\'#bus_destination>option:selected\').text());" id="bus_destination" required="required"  name="Destination" class="input-text full-width"><option value=\'\'>--Select Destination--'+optionss+'</select>');
                  }
              } 
    })
    
    
});



    
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


//autocomplete
 jQuery("#bus_origin").autocomplete( {    
    source: function(request,response) {    
         jQuery("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="First choose  Origin" />');  
        jQuery.ajax ( {
          url: "<?php echo base_url('index.php/bus/BusGetOrigin');?>",
          data: {term: request.term},
          dataType: "json",
          success: function(data) {           
            response( jQuery.map( data.myData, function( item ) {
                return {
                    label: item.OriginId,
                    value: item.OriginName
                }
            }));
          } 
    }) },
    select: function(event, ui) {
                           jQuery("#bus_origin_code").val(ui.item.value);                           
                         }
 });




/*jQuery(window).load(function(e) {
     if(lastSearch==jQuery("#bus_origin").val()){
         return false;
     }
      jQuery("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="Please Wait..." />');   

     jQuery.ajax ( {
          url: "<?php// echo base_url('index.php/bus/BusGetDestination');?>",
          data: {term: jQuery("#bus_origin").val()},
          dataType: "json",
          success: function(data) {
                 lastSearch=jQuery("#bus_origin").val();
                  if(data==false){
                      alert("Sorry! no bus available from this origin");
                      jQuery("#bus_destination")
        .replaceWith('<select  id="bus_destination" required="required" placeholder="chose diffrent origin..."  name="Destination" class="input-text full-width"><option value="">please chose diffrent origin</option></select>');
                  }else{
                      var optionss='';
                      jQuery(data).each(function(index, element) {                       
                        optionss=optionss+'<option value="'+element.DestinationId+'">'+element.DestinationName+'</option>'
                    });
                    jQuery("#bus_destination")
        .replaceWith('<select onchange="jQuery(\'#bus_destination_code\').val(jQuery(\'#bus_destination>option:selected\').text());" id="bus_destination" required="required"  name="Destination" class="input-text full-width"><option value=\'\'>--Select Destination--'+optionss+'</select>');
                  }
              } 
    })
    
    
});*/




  
});
</script>
<script type="text/javascript">    //Finding the fare Rule and Tax  Details                   
var currentlselection="";
var mintime;
var maxtime;
jQuery(function (jQuery){      
	

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
  
});
	function updateTicketselection(){		
				   
			        window.location.href='<?php echo base_url('index.php/agent/GetSeatMap');?>/'+currentlselection;		  
				
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
			sortUsingNestedText(tjq('.car'), '.box', '.details');
			minprice=tjq('.car-list>article .details').data('price');
		    maxprice=(tjq('.car-list>article').last().find('.details').data('price')+1000);
            tjq("#price-range").slider({
                range: true,
                min: minprice,
                max: maxprice,
                values: [ minprice, maxprice ],
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
            tjq(".min-price-label").html( "Rs" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "Rs" + tjq("#price-range").slider( "values", 1 ));

            function convertTimeToHHMM(t) {
                var minutes = t % 60;
                var hour = (t - minutes) / 60;
                var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
                var date = new Date("2014/01/01 " + timeStr + ":00");
                var hhmm = date.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'});
                return hhmm;
            }
			mintime=0;
		    maxtime=1440;
            tjq("#flight-times").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 5,
                values: [ 0, 1440 ],
                slide: function( event, ui ) {
                    
                    tjq(".start-time-label").html( convertTimeToHHMM(ui.values[0]) );
                    tjq(".end-time-label").html( convertTimeToHHMM(ui.values[1]) );
                },
				 change: function( event, ui ) {
					mintime=ui.values[ 0 ];
					maxtime=ui.values[ 1 ];				  
				   //searchbyTime(ui.values[ 0 ],ui.values[ 1 ]);
				   globalSearch();
				}
            });
            tjq(".start-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 0 )) );
            tjq(".end-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 1 )) );
				defaultdestination=jQuery("#bus_destination").val();
                if(tjq("#bus_origin").val()!='')
				getBusdestination();  
        });


        function sortUsingNestedText(parent, childSelector, keySelector) {
          var items = parent.children(childSelector).sort(function(a, b) {
          var vA = jQuery(keySelector, a).data('price');
          var vB = jQuery(keySelector, b).data('price');
          return (vA < vB) ? -1 : (vA > vB) ? 1 : 0;
          });
          parent.append(items);
        }
		
function globalSearch(){
	var resultfound=0;
	jQuery('.car-list article').each(function(index, element) { 
	     
		if(searchbyPrice(jQuery(this))){
			if(searchbyTime(jQuery(this))){
				
					
			 			jQuery(this).fadeIn();
					resultfound=resultfound+1;
				
			}else{
				jQuery(this).fadeOut();
			}
		}else{
			jQuery(this).fadeOut();
		}
    });
	jQuery('#resultfound').html(resultfound);
}
function hmsToMinutesOnly(hms){
//	var hms = '02:04:33';   // your input string
var a = hms.split(':'); // split it at the colons

// minutes are worth 60 seconds. Hours are worth 60 minutes.
return minutes = (+a[0]) *  60 + (+a[1]); 
}
function searchbyTime(obj){	
	//jQuery('.flight article').each(function(index, element) {        
		timinminutes=hmsToMinutesOnly(jQuery(obj).find('.details').data('departuretime'));
		if(timinminutes>=mintime && timinminutes<=maxtime){
			return 1;
		}else{
			return 0;
		}
   // });
}

function searchbyPrice(obj){
		if(jQuery(obj).find('.details').data('price')>=minprice && jQuery(obj).find('.details').data('price')<=maxprice){
			return 1;
		}else{
			return 0;
		}
  
}

function sorByContent(byname,obj){
	jQuery('.sort-bar li').removeClass('active');
	obj.parent().addClass('active');
	var mylist = jQuery('.car-list');
	var listitems = mylist.children('article').get();
	
	listitems.sort(function(a, b) {
		if(byname=='rating' || byname=='price'){			
			var a=jQuery(a).find('.details').data(byname);
			var b=jQuery(b).find('.details').data(byname);
			if(byname=='rating')			
			return (a > b) ? -1 : (a < b) ? 1 : 0;	
			else
			return (a < b) ? -1 : (a > b) ? 1 : 0;			 
		}else{
	   return jQuery(a).find('.box-title').html().toUpperCase().localeCompare(jQuery(b).find('.box-title').html().toUpperCase());
		}
	});
	
	jQuery.each(listitems, function(index, item) {
	   mylist.append(item); 
	});	
	
}    

function getBusdestination(){
	
    defaultdestination=jQuery("#bus_destination").val();
      jQuery("#bus_destination").replaceWith('<input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="Please Wait..." />');   

     jQuery.ajax ( {
          url: "<?php echo base_url('index.php/bus/BusGetDestination');?>",
          data: {term: jQuery("#bus_origin").val()},
          dataType: "json",
          success: function(data) {
               //  lastSearch=jQuery("#bus_origin").val();
                  if(data==false){
                      alert("Sorry! no bus available from this origin");
                      jQuery("#bus_destination")
        .replaceWith('<select  id="bus_destination" required="required" placeholder="chose diffrent origin..."  name="Destination" class="input-text full-width"><option value="">please chose diffrent origin</option></select>');
                  }else{
                      var optionss='';
                      jQuery(data).each(function(index, element) {                       
                        optionss=optionss+'<option value="'+element.DestinationId+'">'+element.DestinationName+'</option>'
                    });
					
                    jQuery("#bus_destination")
        .replaceWith('<select onchange="$(\'#bus_destination_code\').val($(\'#bus_destination>option:selected\').text());" id="bus_destination" required="required"  name="Destination" class="input-text full-width"><option value=\'\'>--Select Destination--'+optionss+'</select>');
					jQuery("#bus_destination").val(defaultdestination);
                  }
              } 
    })
	
    
    

}     
     
    </script>
<?php  $this->load->view('agent/footer');?> 


<?php  $this->load->view('agent/header');?>
<?php  $this->load->view('agent/sub-header');?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 


<div class="container">
                <div class="row">
                    <div style=" min-height:350px;" class="col-xs-12  ">
                        <?php echo $this->session->flashdata('msg');?> 
    <div align="center" class="panel panel-info">
        
        <div class="panel-heading">
            <h3 class="panel-title">
               <span class="CL">AIR TICKET HISTORY</span>
            </h3>
        </div>
   
    <div style="text-align: left;" class="panel-body ">
        <div id="cphETTSS_upipanelHeader">
				<form action="<?php echo base_url('index.php/agent/airline_ticket_history') ?>" method="get">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <table>
				<tbody>
                <tr>
					<td>
					<span><input type="radio" <?php echo ((isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='bookedTicket') or !isset($_GET['hotel_mode_booked']))?'checked':'';?>  value="bookedTicket" name="hotel_mode_booked" id="Ticket_booked" checked>
					</span>
					<label class="CL">BOOKED TICKETS</label></td>

                    <td>
                    <span><input type="radio" value="cancelledTicket" <?php echo (isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='cancelledTicket')?'checked':'';?>  name="hotel_mode_booked" id="Ticket_cancel"></span><label>CANCELLED TICKETS</label>
                    </td>

                    <td><input type="radio" value="D" name="airline-type" <?php echo ((isset($_GET['airline-type']) and $_GET['airline-type']=='D') or !isset($_GET['airline-type']))?'checked':'';?>><span>Domestic</span></td>

                    <td><input type="radio" value="I" <?php echo (isset($_GET['airline-type']) and $_GET['airline-type']=='I')?'checked':'';?> name="airline-type"><span>International</span></td>
					
				</tr>
			</tbody>
			</table>
                    </div>
                    <div class="col-md-4">
                    <input type="checkbox"  id="all-booking" name="all-booking" value="all-booking-data"><label class="CL" for="cphETTSS_chkboxAll" >ALL BOOKING</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <span class="CL">FROM</span>

					<div class="datepicker-wrap-dob">
					<input class="input-text full-width" type="text" id="from_date" placeholder="From Date" name="from-date" value="<?php if(isset($_GET['from-date'])){ echo $_GET['from-date']; } ?>" required>
					
					</div>

                        
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <span class="CL">Disparture TO</span>
                      	
                    <div class="datepicker-wrap-dob">

					<input class="input-text full-width" type="text" id="to_date" placeholder="To Date" name="to-date" value="<?php if(isset($_GET['to-date'])){echo $_GET['to-date'];} ?>" required>
					
					</div>

                    </div>
                </div>


                <div style="z-index: 150;" class="row hidden-xs" id="cphETTSS_pnlFilter">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="CL">FILTER</span> 1<br>
                                <select class="form-control" id="filter1" name="filter1" disabled>
									<option value="" selected="selected">--Select--</option>
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='BaseDestination')?'selected="selected"':'';?>  value="BaseDestination">Destination</option>
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='BaseOrigin')?'selected="selected"':'';?> value="BaseOrigin">Origin</option>
									
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='UserTrackId')?'selected="selected"':'';?> value="UserTrackId">User Track Id</option>
                                    <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='DepartureDateTime')?'selected="selected"':'';?>  value="DepartureDateTime">Travel Date</option>
								</select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                <input type="text" class="form-control" id="filter01" name="filter1Result" value="<?php if(isset($_GET['filter1Result'])){echo $_GET['filter1Result'];} ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="CL">FILTER</span> 2<br>
                                <select class="form-control" id="filter2" name="filter2" disabled>
									<option value="" selected="selected">--Select--</option>
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='BaseDestination')?'selected="selected"':'';?> value="BaseDestination" <?php if(isset($_GET['filter2'])){ }?>>Destination</option>
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='BaseOrigin')?'selected="selected"':'';?>  value="BaseOrigin"  >Origin</option>
									
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='UserTrackId')?'selected="selected"':'';?>  value="UserTrackId">User Track id.</option>
									
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='DepartureDateTime')?'selected="selected"':'';?>  value="DepartureDateTime">Travel Date</option>

								</select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <div class="form-group">
                                <input type="text" class="form-control" id="filter02" name="filter2Result" value="<?php if(isset($_GET['filter2Result'])){echo $_GET['filter2Result'];} ?>" disabled>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 15px;" class="row">
                    <div class="col-md-9">
                        <span style="color:Red;font-weight:bold;" class="label" id="cphETTSS_lblmsg"></span>
                    </div>
                    <div class="col-md-2 pull-right">
                        
                        <input type="submit" class="btn btn-primary mt-5" id="submit" value="SUBMIT" name="submit">
                    </div>
                </div>
      </form>     
</div>
    </div>
    </div>
   

    </div></div></div>
       


     
         
<!-- result data -->

<?php //print_r($result);
if(isset($result)){ 
    
    ?>

<div class="container">
           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>HERMES PNR</th>
        <th>Base Origin</th>
        <th>Base Destination</th>
        <th>Booking Type</th>
        <th>Ticket Number</th>
        <th>BOOKING DATE</th>
        <th>AMOUNT</th>
        <th>Markup</th>
        <th>STATUS</th>
        <th>Print or Cancel</th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $print) { ?>
        <tr>
        <td><?php echo $print['HermesPNR'] ?></td>
        <td><?php echo $print['BaseOrigin'] ?></td>
        <td><?php echo $print['BaseDestination'] ?></td>
        <td><?php echo $print['BookingType'] ?></td>
        <td><?php echo $print['TicketNumber'] ?></td>
        <td><?php echo $print['created'] ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['TotalAmount']); ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['GrandTotalmarkup']); ?></td>
        <td><?php echo $print['status'];?></td>
        <td> <div class="AirlinePNRs hidden"><?php echo $print['AirlineDetails'] ?></div>
                          <a href="<?php $url='upcoming_airline_booking';
                          echo base_url('index.php/flight/print_ticket').'/'.$print['HermesPNR'].'/'.$print['UserTrackId']; ?>"><button class="btn-small btn">Print Ticket</button></a>
                            <input type="button" class="btn btn-danger ftcancel" data-HermesPNR="<?php echo $print['HermesPNR'] ?>" data-TravelType="<?php echo $print['TravelType']?>" Value="Cancel" /></td>
        </tr>
    <?php } ?>
      
    </tbody>
    <?php echo $this->pagination->create_links(); ?>
  </table>
</div>
<?php } ?>

<div class="modal fade" id="cancelmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ticket Cancel</h4>
        <a href=""></a> </div>
      <div class="modal-body"> 
        <!-- Nav tabs --> 
        
        <!--<div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
      </div>
      <p  id="wait" align="center">Please Wait ....</p>-->
        <div  class="fare_rule">
        
        <form class="booking-form" method="post" action="<?php echo base_url('index.php/agent/flight_getGetCancellation');?>">
          
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>Hermes PNR</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="hermspnr" value="" id="hermspnr"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
            <div style="height:20px;"></div>
            
            <div class=" col-sm-12" style=" position:relative;">
              <div class="col-sm-3">
                <label><strong>AIRLINEPNR</strong> </label>
              </div>
              <div class="col-sm-8">
               <select name="AirlinePNR" required="required" id="AirlinePNR" class="form-control">
               <option value="" selected="selected">--Select Flight--</option>
               </select>
                <!--<input type="text" required="required"  readonly="readonly" name="AirlinePNR" value="" id="AirlinePNR" class="form-control" />-->
               
              <div class=" clearfix"></div>
            </div>
             <div class=" clearfix"></div>
            <br />
            <div class=" col-sm-12">
              <div class="col-sm-3" style="padding-left:0;">
                <label><strong>CancelType</strong> </label>
              </div>
              <div class="col-sm-8" style="padding-left:0;">
                <div class="col-md-4 col-sm-5" style="padding-left:0;">
                  <label>
                    <input type="radio" checked="checked" style="width:20px; float:left;" name="CancelType" value="PARTIAL" id="CancelType" class="form-control1" />
                
                  <div class="col-sm-6"> <strong>Partial</strong> </div></label>
                  <div class=" clearfix"></div>
                </div>
                <div class="col-sm-6" style="padding-left:0;">
                <label>
                    <input type="radio" style="width:20px; float:left;"name="CancelType" value="FULL" id="CancelType" class="form-control1" />
                
                  <div class="col-sm-6"><strong>Full</strong></div></label>
                  <div class=" clearfix"></div>
                </div>
                <div class=" clearfix"></div>
              </div>
              <div class=" clearfix"></div>
            </div>
            
            
            
            
             <div class=" clearfix"></div>
            
            
          </div>
           <div class=" clearfix"></div>
           
          <div class="form-group">
          <div class=" col-xs-12">
          <div class=" col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" required=""> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div></div>
          </div>
          
          <div class=" clearfix"></div>
          <div class="form-group row">
            <div class="col-sm-6 col-md-5" style="float:right;">
              <input type="hidden" name="TravelType" id="TravelType" value="" />
              <button type="submit" name="booking" value="confirm" class="full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
            </div>
          </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(".ftcancel").click(function()
  {
      jQuery("#hermspnr").val(jQuery(this).data('hermespnr'));
     
      jQuery("#TravelType").val(jQuery(this).data('traveltype'));
      jQuery('#cancelmodel').modal('show');
    
     var obj = jQuery.parseJSON(jQuery(this).parent().find('.AirlinePNRs').html());
     jQuery('#AirlinePNR').html('<option value="" selected="selected">--Select Flight--</option>');
        jQuery.each(obj, function(idx, obj) {
            jQuery.each(obj, function(idx, obj) {
            //console.log(obj.AirlinePNR);
            
            jQuery('#AirlinePNR').append('<option value="'+obj.AirlinePNR+'">'+obj.AirlinePNR+' '+obj.AirlineCode+'-'+obj.AirlineName+'</option>');
            });
        });
        
 });
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery('#from_date').datepicker();
	jQuery('#to_date').datepicker();	
	jQuery('#all-booking').click(function() {
	        if (jQuery(this).is(':checked')) {
	            jQuery('#filter1, #filter01').removeAttr('disabled');
	            jQuery('#filter2, #filter02').removeAttr('disabled');
	        } else {
	            jQuery('#filter1, #filter01').attr('disabled', 'disabled');
	            jQuery('#filter2, #filter02').attr('disabled', 'disabled');
	        }
	    });

		<?php echo (isset($_GET['all-booking']) and $_GET['all-booking']=='all-booking-data')?"jQuery('#all-booking').click();":'';?>
		if($('#filter1').val()=='DepartureDateTime'){
			$("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
		}
		if($('#filter2').val()=='DepartureDateTime'){
			$("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
		}
	});
	
	$('#filter1').on("change",function(e){
		$("#filter01").val('');
		if($(this).val()=='DepartureDateTime'){
			$("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
		}else{
			$("#filter01").datepicker("destroy");
		}
	});
	
	$('#filter2').on("change",function(e){
		$("#filter02").val('');
		if($(this).val()=='DepartureDateTime'){
			$("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
		}else{
			$("#filter02").datepicker("destroy");
		}
	});	
		
</script>

<?php  $this->load->view('agent/footer');?> 
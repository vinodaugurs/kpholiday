<?php  $this->load->view('agent/header');?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script>

<style> 
	body{
	background-color: #EEE;	
	}

</style>

<div class="container">
  <div class="row">
    <div style=" min-height:350px;" class="col-xs-12  ">
    <?php echo $this->session->flashdata('msg');?> 
      <div align="center" class="panel panel-info">
        <div style="height:8px;"></div>
        <div class="panel-heading" style="margin-top:20px; border:1px solid #ccc; padding:10px;">
          <h3 class="panel-title"> <span class="CL">HOTEL TICKET HISTORY</span> </h3>
        </div>
        <div style="text-align: left; padding:10px; border:1px solid #ccc;" class="panel-body ">
          <div id="cphETTSS_upipanelHeader">
          <form action="<?php echo base_url('index.php/agent/hotel_ticket_history') ?>" method="get">
            <div class="row">
              <div class="col-md-8 col-xs-12"> 
                <!-- <table>
				<tbody>
                <tr>
					<td>
					<span>

                    <td>
                    <span><input type="radio" value="Booking Cancel" name="hotel_mode_booked" id="Ticket_cancel"></span><label>CANCELLED TICKETS</label>
                    </td>

                    <td><input type="radio" value="Domestic" name="airline-type" checked/><span>Domestic</span></td>

                    <td><input type="radio" value="International" name="airline-type"/><span>International</span></td>
					
				</tr>
			</tbody>
			</table> -->
            <div>
            <div class=" col-sm-3">
            	<div class="radio">
                  <label>
                    <input type="radio"  value="Booking Confirmed" value="Booking Confirmed" <?php echo ((isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='bookedTicket') or !isset($_GET['hotel_mode_booked']))?'checked':'';?> name="hotel_mode_booked" id="Ticket_booked" checked>
                    BOOKED TICKETS </label>
                </div>
            
            </div>
            <div class=" col-sm-3">
            	<div class="radio">
                  <label>
                    <input type="radio" value="Booking Cancel" <?php echo (isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='Booking Cancel')?'checked':'';?> name="hotel_mode_booked" id="Ticket_cancel">
                    CANCELLED TICKETS </label>
                </div>
            
            
            </div>
            <div class=" col-sm-3">
            	<div class="radio">
                  <label>
                    <input type="radio" value="Domestic" <?php echo ((isset($_GET['hotel-type']) and $_GET['hotel-type']=='Domestic') or !isset($_GET['hotel-type']))?'checked':'';?> name="hotel-type" checked/>
                    Domestic </label>
                </div>
            
            
            </div>
            <div class=" col-sm-3">
            	<div class="radio">
                  <label>
                    <input type="radio" value="International" <?php echo (isset($_GET['hotel-type']) and $_GET['hotel-type']=='International')?'checked':'';?> name="hotel-type"/>
                    International </label>
                </div>
            
            </div>
            
            
            
            
            
            </div>
            
            
            
            
                
                
                
                
              </div>
              <div class="col-md-4">
                <input type="checkbox" id="all-booking" name="all-booking" value="all-booking-data">
                <span>ALL BOOKING</span> </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12"> <span class="CL">FROM</span>
                <div class="datepicker-wrap">
                  <input class="input-text full-width" value="<?php if(isset($_GET['from-date'])){ echo $_GET['from-date']; } ?>" id="from_date" type="text" placeholder="From Date" name="from-date" required>
                </div>
              </div>
              <div class="col-md-6 col-xs-12"> <span class="CL">TO</span>
                <div class="datepicker-wrap">
                  <input class="input-text full-width" id="to_date" value="<?php if(isset($_GET['to-date'])){echo $_GET['to-date'];} ?>" type="text" placeholder="To Date" name="to-date" required>
                </div>
              </div>
            </div>
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
    if($('#filter1').val()=='CheckInTime'){
      $("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
    }
    if($('#filter2').val()=='CheckInTime'){
      $("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
    }
  
  
  $('#filter1').on("change",function(e){
    $("#filter01").val('');
    if($(this).val()=='CheckIn'){
      $("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
    }else{
      $("#filter01").datepicker("destroy");
    }
  });
  
  $('#filter2').on("change",function(e){
    $("#filter02").val('');
    if($(this).val()=='CheckOut'){
      $("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
    }else{
      $("#filter02").datepicker("destroy");
    }
  }); 
  
  if($('#filter1').val()=='DepartureDateTime'){
   $("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
  }
  if($('#filter2').val()=='DepartureDateTime'){
   $("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
  }
  });
</script>
            <div style="z-index: 150;" class="row hidden-xs" id="cphETTSS_pnlFilter">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6"> <span class="CL">FILTER</span> 1<br>
                    <select  id="filter1" class="form-control" name="filter1" disabled>
                      <option value="" selected="selected">--Select--</option>
                      <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='HotelId')?'selected="selected"':'';?> value="HotelId">Hotel Id</option>
                      <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='BookingID')?'selected="selected"':'';?> value="BookingID">Booking ID</option>
                      <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='UserTrackId')?'selected="selected"':'';?> value="TrackID">Track Id</option>
                      <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='CheckIn')?'selected="selected"':'';?>  value="CheckIn">Check In Date</option>
                    </select>
                  </div>
                  <div class="col-md-6"> <br>
                    <div class="form-group">
                      <input type="text" class="form-control" value="<?php if(isset($_GET['filter1Result'])){echo $_GET['filter1Result'];} ?>" id="filter01" name="filter1Result" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6"> <span class="CL">FILTER</span> 2<br>
                    <select id="filter2" class="form-control" name="filter2" disabled>
                      <option value="" selected="selected">--Select--</option>
                      <option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='BaseDestination')?'selected="selected"':'';?> value="HotelId">Hotel Id</option>
                      <option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='BookingID')?'selected="selected"':'';?> value="BookingID">Booking ID</option>
                      <option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='TrackID')?'selected="selected"':'';?> value="TrackID">Track id</option>
                      <option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='CheckOut')?'selected="selected"':'';?>  value="CheckOut">Check Out date </option>
                    </select>
                  </div>
                  <div class="col-md-6"> <br>
                    <div class="form-group">
                      <input type="text" class="form-control" id="filter02" value="<?php if(isset($_GET['filter2Result'])){echo $_GET['filter2Result'];} ?>" name="filter2Result" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="margin-top: 15px;" class="row">
              <div class="col-md-9"> <span style="color:Red;font-weight:bold;" class="label" id="cphETTSS_lblmsg"></span> </div>
              <div class="col-md-3">
                <input type="submit" style="width:100%" class="btn btn-primary mt-5" id="submit" value="SUBMIT" name="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- result data -->

<?php if(isset($result)){ ?>
<div class="container">
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>Hotel Type</th>
        <th>Hotel Id</th>
        <th>Booking ID</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Hotel Name</th>
        <th>created</th>
        <th>Booking Amount</th>
        <th>Markup</th>
        <th>STATUS</th>
        <th>Print or Cancel</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $print) { ?>
      <tr>
        <td><?php echo $print['HotelType'] ?></td>
        <td><?php echo $print['HotelId'] ?></td>
        <td><?php echo $print['BookingID'] ?></td>
        <td><?php echo $print['CheckIn'] ?></td>
        <td><?php echo $print['CheckOut'] ?></td>
        <td><?php echo $print['HotelName'] ?></td>
        <td><?php echo $print['created'] ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['BookingAmount']); ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['agentMarkup']); ?></td>
        <td><?php echo $print['Status'] ?></td>
        <td><a href="<?php if($print['HotelType']=="Domestic"){
                                                echo base_url('index.php/hotel/print_dom_ticket/').'/'.$print['BookingID']; }else{
                                                  echo base_url('index.php/hotel/print_Intl_ticket/').'/'.$print['BookingID'];
                                                  } ?>">
          <button class="btn">Re-PRINT</button>
          </a>
          <input type="button" class="btn btn-danger ftcancel" data-BookingID="<?php echo $print['BookingID'] ?>" data-ProviderId="<?php echo $print['ProviderId']?>" data-RateplanId="<?php echo $print['RateplanId']?>" data-HotelId="<?php echo $print['HotelId']?>" data-SearchId="<?php echo $print['SearchId']?>" data-HotelType="<?php echo $print['HotelType']?>" data-RoomInfo="<?php echo $print['RoomInfo']?>" data-RCount="<?php echo $print['RCount']?>" data-CheckIn="<?php echo $print['CheckIn']?>" data-CheckOut="<?php echo $print['CheckOut']?>" data-RoomTypeID="<?php echo $print['RoomTypeID']?>" Value="Cancel" /></td>
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
        
        <div  class=".preloader"  style="display:none;"> <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/> </div>
        <p  id="wait" align="center">Please Wait ....</p>
        <p id="cancelpoicy"></p>
        <div  class="fare_rule">
          <form class="booking-form" method="post" action="<?php echo base_url('index.php/agent/hotel_getGetCancellation');?>">
            <div class="form-group1 row">
              <div class=" col-sm-12">
                <div class="col-sm-3">
                  <label><strong>EmailId</strong></label>
                </div>
                <div class="col-sm-8">
                  <input type="text"  name="EmailId" value="<?php echo $this->session->userdata('email')?>" id="EmailId"  class="form-control"/>
                </div>
                <div class=" clearfix"></div>
              </div>
              <div class=" clearfix"></div>
              <div style="height:20px;"></div>
              <div class=" col-sm-12" style=" position:relative;">
                <div class="col-sm-3">
                  <label><strong>BookingID</strong> </label>
                </div>
                <div class="col-sm-8">
                  <input type="text" readonly="readonly"  name="BookingID" value="" id="BookingID"  class="form-control"/>
                  <div class=" clearfix"></div>
                </div>
                <div class=" clearfix"></div>
                <br />
              </div>
              <div class=" clearfix"></div>
              <div class="form-group">
                <div class=" col-xs-12">
                  <div class=" col-xs-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" required="">
                        By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>. </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" clearfix"></div>
              <div class="form-group row">
                <div class="col-sm-6 col-md-5" style="float:right;">
                  <input type="hidden" name="HotelType" id="HotelType" value="" />
                  <button type="submit" name="booking" value="confirm" class="full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
                </div>
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
$(".ftcancel").click(function()
  {
      $("#hermspnr").val($(this).data('hermespnr'));
     $('#cancelpoicy').html('');
     $('#HotelType').val($(this).data('hoteltype'));
      $("#TravelType").val($(this).data('traveltype'));
      $("#BookingID").val($(this).data('bookingid'));
      $('#cancelmodel').modal('show');
         $('#wait').show();
     
      $.ajax ( {
          url: "<?php echo base_url('index.php/hotel/TNC_CancelPolicy');?>",         
           type:'post',           
           data:{hoteltype:$(this).data('hoteltype'),roominfo:$(this).data('roominfo'),searchid:$(this).data('searchid'),hotelid:$(this).data('hotelid'),rateplanid:$(this).data('rateplanid'),providerid:$(this).data('providerid'),RCount:$(this).data('rcount'),bookingid:$(this).data('bookingid'),checkout:$(this).data('checkout'),checkin:$(this).data('checkin'),roomtypeid:$(this).data('roomtypeid')},
          success: function(data) {
                $('#wait').hide();              
                 $('#cancelpoicy').html("<strong>"+data+"</strong>");
              } 
     });
        
 });
</script>
<?php  $this->load->view('agent/footer');?>

<?php  $this->load->view('agent/header');?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 

<div class="container">
                <div class="row">
                    <div style=" min-height:350px;" class="col-xs-12  ">
                    <?php echo $this->session->flashdata('msg');?>     
    <div align="center" class="panel panel-info">
    
    <div style="height:8px;"></div>
        
        <div class="panel-heading">
            <h3 class="panel-title">
               <span class="CL">BUS TICKET HISTORY</span>
            </h3>
        </div>
   
    <div style="text-align: left;" class="panel-body ">
        <div id="cphETTSS_upipanelHeader">
				<form action="<?php echo base_url('index.php/agent/bus_ticket_history') ?>" method="get">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <table>
				<tbody><tr>
					<td>
					<span><input type="radio" <?php echo ((isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='CONFIRM') or !isset($_GET['hotel_mode_booked']))?'checked':'';?> value="CONFIRM" name="hotel_mode_booked" id="Ticket_booked" checked>
					</span>
					<label class="CL">BOOKED TICKETS</label></td>
					<td><span><input type="radio" value="Booking Cancel" name="hotel_mode_booked" id="Ticket_cancel" <?php echo (isset($_GET['hotel_mode_booked']) and $_GET['hotel_mode_booked']=='Booking Cancel')?'checked':'';?>></span><label>CANCELLED TICKETS</label>
					</td>
					
				</tr>
			</tbody>
			</table>
                    </div>
                    <div class="col-md-4">
                    <div class="checkbox">
    <label class="CL" for="cphETTSS_chkboxAll">
      <input type="checkbox" id="all-booking" name="all-booking" value="all-booking-data"> ALL BOOKING
    </label>
  </div>
                    
                    
                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <span class="CL">FROM</span>

                        <div class="datepicker-wrap">
                    <input class="input-text full-width" type="text" id="from_date" placeholder="From Date" name="from-date" value="<?php if(isset($_GET['from-date'])){ echo $_GET['from-date']; } ?>" required>
                    
                    </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <span class="CL">TO</span>

                      <div class="datepicker-wrap">

                    <input class="input-text full-width" type="text" id="to_date" placeholder="To Date" name="to-date" value="<?php if(isset($_GET['to-date'])){echo $_GET['to-date'];} ?>" required>
                    
                    </div>
                    </div>
                </div>


                <div style="z-index: 150;" class="row hidden-xs" id="cphETTSS_pnlFilter">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="CL">FILTER</span> 1<br>
                                <select  id="filter1" class="form-control" name="filter1" disabled>
									<option value="" selected="selected">--Select--</option>
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='Destination')?'selected="selected"':'';?> value="Destination" >Destination</option>
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='Origin')?'selected="selected"':'';?> value="Origin">Origin</option>
									<option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='TransactionId')?'selected="selected"':'';?> value="TransactionId">TransactionId</option>
                                    <option <?php echo (isset($_GET['filter1']) and $_GET['filter1']=='TravelDate')?'selected="selected"':'';?>  value="TravelDate">Travel Date</option>
									
									

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
                                <select id="filter2" class="form-control" name="filter2" disabled>
									<option value="" selected="selected">--Select--</option>
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='Destination')?'selected="selected"':'';?> value="Destination" >Destination</option>
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='Origin')?'selected="selected"':'';?> value="Origin">Origin</option>
									<option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='TransactionId')?'selected="selected"':'';?> value="TransactionId">TransactionId</option>
                                    <option <?php echo (isset($_GET['filter2']) and $_GET['filter2']=='TravelDate')?'selected="selected"':'';?>  value="TravelDate">Travel Date</option>
									
									
									

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
                    <div class="col-md-3">
                        
                        <input type="submit" class="btn btn-primary mt-5" style="width:100%" id="submit" value="SUBMIT" name="submit">
                    </div>
                </div>
      </form>     
</div>
    </div>
    </div>
   

    </div></div></div>
       


     
         
<!-- result data -->

<?php if(isset($result)){
    //print_r($result);
 ?>
<div class="container">
           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>TransactionId</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Travel Date</th>
        <th>BOOKING DATE</th>
        <th>AMOUNT</th>
        <th>Markup</th>
        <th>STATUS</th>
        <th>Print</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($result as $print) { ?>
        <tr>
        
        <td><?php echo $print['TransactionId'] ?></td>
        <td><?php echo $print['Origin'] ?></td>
        <td><?php echo $print['Destination'] ?></td>
        
        <td><?php echo $print['TravelDate'] ?></td>
        <td><?php echo $print['created'] ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['TotalAmount']); ?></td>
        <td><i class="fa fa-inr"></i>&nbsp;<?php echo number_format($print['Totalmarkup']); ?></td>
        <td><?php echo $print['status'] ?></td>
        <td><a href="<?php echo base_url('index.php/bus/get_print').'/'.$print['TransactionId']; ?>">
                                <button class="btn">Re-PRINT</button>
                                </a>
                                <input type="button" class="btn btn-danger ftcancel" data-TransactionId="<?php echo $print['TransactionId'] ?>" data-TransportId="<?php echo $print['TransportId']?>" Value="Cancel" />
        </td>
        </tr>
    <?php } ?>
     <?php echo $this->pagination->create_links(); ?>
    </tbody>
   
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
        
        <div  class=".preloader"  style="display:none;">
        <img src="<?php echo base_url('image/preloader.png');?>"  width="50" height="25"/>  
      </div>
      <p  id="wait" align="center"><strong>Please Wait ....</strong></p>
        <div  class="fare_rule">
          <form class="booking-form" method="post" action="<?php echo base_url('index.php/agent/bus_getGetCancellation');?>">
            <div class="form-group1 row">
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>TransportName</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="TransportName" value="" id="TransportName"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
            <div style="height:20px;"></div>
            <div class=" col-sm-12" style=" position:relative;">
              <div class="col-sm-3">
                <label><strong>Origin</strong> </label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="Origin" value="" id="Origin"  class="form-control"/>
                <div class=" clearfix"></div>
              </div>
              <div class=" clearfix"></div>
              <br />
              
              <div class=" clearfix"></div>
            </div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>Destination</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="Destination" value="" id="Destination"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>BookedDate</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="BookedDate" value="" id="BookedDate"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>TravelDate</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="TravelDate" value="" id="TravelDate"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>DepatureTime</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="DepatureTime" value="" id="DepatureTime"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
            <div class=" col-sm-12">
              <div class="col-sm-3">
                <label><strong>PNRStatus</strong></label>
              </div>
              <div class="col-sm-8">
                <input type="text" readonly="readonly" name="PNRStatus" value="" id="PNRStatus"  class="form-control"/>
              </div>
              <div class=" clearfix"></div>
            </div>
            <div class=" clearfix"></div>
             <div style="height:20px;"></div>
              <h2>Passenger Details</h2>
                          <div class="table-responsive">
                          <table id="tablepasenger" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Actions</th>
                                <th>TicketNumber</th>
                                <th>PassengerName</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>SeatNo</th>
                                <th>Fare</th>
                                <th>PenatlyAmount</th>                                
                              </tr>
                            </thead>
                            <tbody>
                             
                            </tbody>
                          </table>
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
                 <input type="hidden" name="TransportId" id="TransportId" value="" />
                 <input type="hidden" name="TransactionId" id="TransactionId" value="" />
                 <input type="hidden" name="TravelType" id="TravelType" value="" />
                 <input type="hidden" name="PenatlyAmount" id="PenatlyAmount" value="" />
                <button type="submit" id="sbutton" name="booking" value="confirm" class="hidden full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
                            <button type="button" id="pbutton"  name="booking" value="confirm" class=" full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
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
jQuery(".ftcancel").click(function()
  {
      jQuery('#wait').show();
      jQuery('#wait').html('Please Wait ....'); 
      jQuery("#pbutton").removeAttr('disabled');
      var transactionid=jQuery(this).data('transactionid');    
       jQuery("#TransportId").val(jQuery(this).data('transportid'));
       jQuery("#TransactionId").val(transactionid);
    jQuery('#cancelmodel').modal('show');
    
      jQuery.ajax ( {
          url: "<?php echo base_url('index.php/bus/GetCancellationPenalty');?>/"+transactionid,         
          dataType: "json",
           crossDomain: true,
          success: function(data) {    
             
           // console.log(data.CancellationPenaltyOutput.ToCancelPNRDetails.TransportName);
           if(!data.ResponseStatus){
                 jQuery('#wait').html(data.FailureRemarks); 
                 jQuery("#pbutton").attr('disabled','disabled');
                 return;
           }
            jQuery('#wait').hide();     
            jQuery('#TransportName').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.TransportName);
            jQuery('#Origin').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.Origin);
            jQuery('#Destination').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.Destination);
            jQuery('#BookedDate').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.BookedDate);
            jQuery('#TravelDate').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.TravelDate);
            jQuery('#DepatureTime').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.DepatureTime);
            jQuery('#PNRStatus').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.PNRStatus);
            
            jQuery('#PenatlyAmount').val(data.CancellationPenaltyOutput.ToCancelPNRDetails.PenatlyAmount);
            
            passengerdetails=data.CancellationPenaltyOutput.ToCancelPNRDetails.ToCancelPaxList;
            //console.log(passengerdetails);
            jQuery('.tablerow').remove();
            jQuery(passengerdetails).each(function( index ) {
                
             var tr='<tr class="tablerow"><td><input type="checkbox"   name="TicketNumber[]" value="'+passengerdetails[index].TicketNumber+'_'+passengerdetails[index].PenatlyAmount+'" id="TicketNumber[]"  class="form-control ticketselected"/></td><td>'+passengerdetails[index].TicketNumber+'</td><td>'+passengerdetails[index].PassengerName+'</td><td>'+passengerdetails[index].Gender+'</td><td>'+passengerdetails[index].Age+'</td><td>'+passengerdetails[index].SeatNo+'</td><td>'+passengerdetails[index].Fare+'</td><td>'+passengerdetails[index].PenatlyAmount+'</td></tr>';
             jQuery("#tablepasenger").append(tr);
            });
          } 
     });
        
 });
 jQuery("#pbutton").click(function(e){

    var number_of_checked_checkbox= jQuery(".ticketselected:checked").length;
    if(number_of_checked_checkbox==0){
        alert("select minimum one");
    }else{
        jQuery("#sbutton").click();
    }

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
		if($('#filter1').val()=='TravelDate'){
			$("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
		}
		if($('#filter2').val()=='TravelDate'){
			$("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
		}
	});
	
	$('#filter1').on("change",function(e){
		$("#filter01").val('');
		if($(this).val()=='TravelDate'){
			$("#filter01").datepicker({dateFormat: 'yy/mm/dd'});
		}else{
			$("#filter01").datepicker("destroy");
		}
	});
	
	$('#filter2').on("change",function(e){
		$("#filter02").val('');
		if($(this).val()=='TravelDate'){
			$("#filter02").datepicker({dateFormat: 'yy/mm/dd'});
		}else{
			$("#filter02").datepicker("destroy");
		}
	});	
		
</script>

<?php  $this->load->view('agent/footer');?> 
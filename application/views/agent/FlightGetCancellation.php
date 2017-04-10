<?php include(APPPATH.'views/agent/header.php');?>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<style>
.table-responsive {
	width: 100%;
	margin-bottom: 15px;
	overflow-y: hidden;
	overflow-x: scroll;
	-ms-overflow-style: -ms-autohiding-scrollbar;
	border: 1px solid #ddd;
	-webkit-overflow-scrolling: touch
}
</style>

<div id="page-wrapper">
  <section id="content">    
    <div class="container">
      <div class="row">
        <div id="main" class="col-md-12 Runningtext">
          <div class="Register-Page">
            <div class="block">
              <div class="tab-container full-width-style white-bg">                
                <div class="tab-content"> <?php echo $this->session->flashdata('msg');?> 
                  <!-- ------------------first tab start ------------------------ -->
                  
                  <div class="tab-pane fade in active" id="first-tab">
                  <a class="btn btn-success" href="<?php echo base_url('index.php/agent/airline_ticket_history'); ?>"> Back </a> <br/>
                    <h1 class="tab-content-title">Partial Cancellation</h1>
                    
                    <div id="main" class="col-sms-6 col-sm-12 col-md-12">
                      <form class="booking-form" method="post" action="<?php echo base_url('index.php/agent/flight_getGetCancellation');?>">
                      
                        <div class=" col-sm-12">
                          <div class="col-sm-3">
                            <label><strong>Hermes PNR</strong></label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" readonly="readonly" name="hermspnr" value="<?php echo (set_value('hermspnr')== false)?$details['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['HermesPNR']:set_value('hermspnr') ?>" id="hermspnr"  class="form-control"/>
                          </div>
                          <div class=" clearfix"></div>
                        </div>
                        <div class=" clearfix"></div>
                        <div class=" col-sm-12">
                          <div class="col-sm-3">
                            <label><strong>CRSPNR</strong></label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" readonly="readonly" name="CRSPNR" value="<?php echo (set_value('CRSPNR')== false)?$details['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CRSPNR']:set_value('CRSPNR') ?>" id="hermspnr"  class="form-control"/>
                          </div>
                          <div class=" clearfix"></div>
                        </div>
                        <div style="height:20px;"></div>
                        <div class=" col-sm-12" style=" position:relative;">
                          <div class="col-sm-3">
                            <label><strong>AIRLINEPNR</strong> </label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text"  readonly="readonly" name="AirlinePNR[]" value="<?php echo $details['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['AilinePNR'] ?>" id="AirlinePNR" class="form-control" />
                            <div class=" clearfix"></div>
                          </div>
                          <div class=" clearfix"></div>
                          <br />
                          <h2>Passenger Details</h2>
                          <div class="table-responsive">
                          <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Actions</th>
                                <th>TicketNumber</th>
                                <th>Name</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>GrossAmount</th>
                                <th>DepartureDateTime</th>
                              </tr>
                            </thead>
                            <tbody>
                             <?php foreach($details['CancellationOutput']['CancellationDetails']['PartialCancelPNRDetails']['CancelPassengerDetails'] as $key=>$pasenger){ ?>
                          <?php foreach($pasenger['CancelTicketDetails'] as $key2=>$CancelTicketDetails){ ?>
                              <tr>
                                <td><input type="checkbox"   name="ticketselected[]" value="<?php echo $CancelTicketDetails['TicketNumber']?>" id="hermspnr"  class="form-control ticketselected"/></td>
                                <td><?php echo (set_value('TicketNumber')== false)?$CancelTicketDetails['TicketNumber']:set_value('TicketNumber') ?></td>
                                <td><?php echo $pasenger['FirstName'].' '.$pasenger['LastName'];?></td>
                                <td><?php echo $CancelTicketDetails['Origin'] ?></td>
                                <td><?php echo $CancelTicketDetails['Destination'] ?></td>
                                <td><?php echo $CancelTicketDetails['GrossAmount'] ?></td>
                                <td><?php echo $CancelTicketDetails['DepartureDateTime'] ?></td>
                              </tr>
                               <?php }
						}?>
                            </tbody>
                          </table>
                         </div>
                          
                         
                          <div class=" clearfix"></div>
                        </div>
                        <div class=" clearfix"></div>
                        
                        <div class=" clearfix"></div>
                        <div class="form-group row">
                          <div class="col-sm-6 col-md-5" style="float:right;">
                            <input type="hidden" name="TravelType" id="TravelType" value="<?php echo (set_value('TravelType')!= false)?set_value('TravelType'):'' ?>" />
                            <input type="hidden" name="action" id="partial" value="partial" />
                            <button type="submit" id="sbutton" name="booking" value="confirm" class="hidden full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
                            <button type="button" id="pbutton"  name="booking" value="confirm" class=" full-width btn-large btn btn-danger">CONFIRM CANCEL</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <!--clearfix--> 
            
          </div>
          <!--Register-Page--> 
          
        </div>
        <!--#main--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--content--> 
</div>
<!--page-wrapper-->



  
<script>

 $("#pbutton").click(function(e){

    var number_of_checked_checkbox= $(".ticketselected:checked").length;
    if(number_of_checked_checkbox==0){
        alert("select minimum one");
    }else{
        $("#sbutton").click();
    }

         });
    
</script>
<?php include APPPATH.'views/agent/footer.php';?>

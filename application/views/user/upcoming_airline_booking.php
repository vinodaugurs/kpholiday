<?php include(APPPATH . 'views/home/header.php'); ?>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/style2.css') ?>">
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
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Airline Booking Data</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li class="active">User Agreement</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="main" class="col-md-12 Runningtext">
                    <div class="Register-Page">
                        <div class="block">
                            <div class="tab-container full-width-style white-bg">
                                <ul class="tabs">
                                    <li class="active"><a href="<?php echo base_url('index.php/user/upcoming_airline_booking'); ?>"><i class="fa fa-calendar-o"></i> Upcoming booking</a></li>
                                    <li><a href="<?php echo base_url('index.php/user/history_airline_booking'); ?>" ><i class="fa fa-user"></i>Airline History Data</a></li>
                                    <li><a href="<?php echo base_url('index.php/user/cancel_airline_booking'); ?>" ><i class="fa fa-users"></i>Cancel Ticket</a></li>
                                    <!--<li><a href="<?php echo base_url('index.php/user/payu_airline_booking'); ?>"><i class="fa fa-money"></i>PayU Transaction</a></li>-->
                                </ul>
                                <div class="tab-content"> 
                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <!-- ------------------first tab start ------------------------ -->
                                    <div class="tab-pane fade in active" id="first-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                                            <button type="button" class="btn btn-success"><< Back</button>
                                        </a> <br/>
                                        <h2 class="tab-content-title">Future Booking Data</h2>
                                        <br/>
                                        <div class="tab-container trans-style box"> </div>
                                        <?php if (count($future_airline_data) != '0') { ?>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Hermes PNR</th>
                                                            <th>Transaction Id</th>
                                                            <th>Booking Type</th>
                                                            <th>Travel Type</th>
                                                            <th>Base Origin</th>
                                                            <th>Base Destination</th>
                                                            <th>Departure DateTime</th>
                                                            <th>Issue Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($future_airline_data as $key => $flight) {
                                                            $AirlineDetails = json_decode($flight['AirlineDetails'], true);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $key + 1; ?></td>
                                                                <td><?php echo $flight['HermesPNR'] ?></td>
                                                                <td><?php echo $flight['TransactionId'] ?></td>
                                                                <td><?php
                                                                    $type = $flight['BookingType'];
                                                                    if ($type == 'R') {
                                                                        echo "Roundtrip";
                                                                    } else {
                                                                        echo "One Way";
                                                                    }
                                                                    ?></td>
                                                                <td><?php
                                                                    $type = $flight['TravelType'];
                                                                    if ($type == 'D') {
                                                                        echo "Domistic";
                                                                    } else {
                                                                        echo "International";
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo $flight['BaseOrigin'] ?></td>
                                                                <td><?= $flight['BaseDestination'] ?></td>
                                                                <td><?= $flight['DepartureDateTime'] ?>
                                                                    <br />
                                                                    <?php if ($type == 'R') { ?>
                                                                        Return Departure Date Time
                                                                        <?= $flight['Arrivaldatetime'] ?>
                                                                    <?php } ?></td>

                                                                <td><?= $flight['created'] ?></td>
                                                                <td>
                                                                    <div class="AirlinePNRs hidden"><?php echo $flight['AirlineDetails'] ?></div>
                                                                    <a href="<?php
                                                                    $url = 'upcoming_airline_booking';
                                                                    echo base_url('index.php/flight/print_ticket1') . '/' . $flight['HermesPNR'] . '/' . $flight['UserTrackId'];
                                                                    ?>"><button class="btn-small btn">Print Ticket</button></a>
                                                                    <input type="button" class="btn btn-danger ftcancel" data-HermesPNR="<?php echo $flight['HermesPNR'] ?>" data-TravelType="<?php echo $flight['TravelType'] ?>" Value="Cancel" /></td>

                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                                <?php echo $this->pagination->create_links(); ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> No record found in database </div>
                                        <?php } ?>
                                    </div>
                                    <!-- ------------------first tab end ------------------------ --> 
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


<div class="modal fade" id="myModalStatus" role="dialog">
    <div class="modal-dialog"> 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail</h4>
            </div>
            <div class="modal-body">
                <?php
                $jsonData = $flight['AirlineDetails'];
                $flightDetail = json_decode($jsonData, true);
                echo "Column No:" . count($flightDetail) . "<br>";
                // print_r($flightDetail);
                foreach ($flightDetail as $PassengerDetail) {
                    // echo implode(" ", $PassengerDetail);
                    // print_r($PassengerDetail);  
                    ?>
                    <label>AirlineCode :</label>
                    <span>
                        <?= $PassengerDetail[0]['AirlineCode'] ?>
                    </span><br/>
                    <label>AirlinePNR :</label>
                    <span>
                        <?= $PassengerDetail[0]['AirlinePNR'] ?>
                    </span><br/>
                    <label>AirlineName :</label>
                    <span>
                        <?= $PassengerDetail[0]['AirlineName'] ?>
                    </span><br/>
                    <label>Address1 :</label>
                    <span>
                        <?= $PassengerDetail[0]['Address1'] ?>
                    </span><br/>
                    <label>Address2 :</label>
                    <span>
                        <?= $PassengerDetail[0]['Address2'] ?>
                    </span><br/>
                    <label>City :</label>
                    <span>
                        <?= $PassengerDetail[0]['City'] ?>
                    </span><br/>
                    <label>ContactNumber :</label>
                    <span>
                        <?= $PassengerDetail[0]['ContactNumber'] ?>
                    </span><br/>
                    <label>FaxNumber :</label>
                    <span>
                        <?= $PassengerDetail[0]['FaxNumber'] ?>
                    </span><br/>
                    <label>EMailId :</label>
                    <span>
                        <?= $PassengerDetail[0]['EMailId'] ?>
                    </span><br/>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
                <img src="<?php echo base_url('image/preloader.png'); ?>"  width="50" height="25"/>  
                  </div>
                  <p  id="wait" align="center">Please Wait ....</p>-->
                <div  class="fare_rule">

                    <form class="booking-form" method="post" action="<?php echo base_url('index.php/flight/user_getGetCancellation'); ?>">
                        <div class="form-group1 row">

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
                                                <input type="checkbox" class="i-check" required=""> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
    $(".ftcancel").click(function ()
    {
        $("#hermspnr").val($(this).data('hermespnr'));

        $("#TravelType").val($(this).data('traveltype'));
        $('#cancelmodel').modal('show');

        var obj = jQuery.parseJSON($(this).parent().find('.AirlinePNRs').html());
        $('#AirlinePNR').html('<option value="" selected="selected">--Select Flight--</option>');
        $.each(obj, function (idx, obj) {
            $.each(obj, function (idx, obj) {
                //console.log(obj.AirlinePNR);

                $('#AirlinePNR').append('<option value="' + obj.AirlinePNR + '">' + obj.AirlinePNR + ' ' + obj.AirlineCode + '-' + obj.AirlineName + '</option>');
            });
        });

    });
</script> 
<?php include APPPATH . 'views/home/footer.php'; ?>
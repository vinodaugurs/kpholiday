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
                    <h2 class="entry-title">Hotel Booking Data</h2>
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
                                    <li class="active"><a href="<?php echo base_url('index.php/user/upcoming_hotel_booking'); ?>"><i class="fa fa-calendar-o"></i> Upcoming hotel booking</a></li>
                                    <li><a href="<?php echo base_url('index.php/user/history_hotel_booking'); ?>" ><i class="fa fa-user"></i>History hotel Data</a></li>
                                    <li><a href="<?php echo base_url('index.php/user/cancel_hotel_booking'); ?>" ><i class="fa fa-users"></i>Cancel hotel Ticket</a></li>
                                    <!--<li><a href="<?php echo base_url('index.php/user/payu_hotel_booking'); ?>" ><i class="fa fa-money"></i>PayU Transaction</a></li>-->
                                </ul>
                                <div class="tab-content"> <?php echo $this->session->flashdata('msg'); ?> 
                                    <!-- ------------------first tab start ------------------------ -->
                                    <div class="tab-pane fade in active" id="first-tab"> <a href="<?php echo base_url('index.php/user/index'); ?>">
                                            <button type="button" class="btn btn-success"><< Back</button>
                                        </a> <br/>
                                        <h2 class="tab-content-title">Upcoming Hotel Booking</h2>
                                        <br/>
                                        <div class="tab-container trans-style box"> </div>
                                        <?php
                                        // print_r($booking);
                                        if (count($future_hotel_data) != '0') {
                                            ?>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sms-6 col-sm-8 col-md-9">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. No</th>
                                                                        <th>Booking ID</th>
                                                                        <th>Hotel Image</th>
                                                                        <th>Hotel Name</th>
                                                                        <th>Address</th>
                                                                        <th>Room type</th>
                                                                        <th>CheckIn</th>
                                                                        <!-- <th>CheckOut</th>-->
                                                                        <th>Status</th>
                                                                        <!-- <th>Telephone</th>--> 

        <!--<th>Booking Amount</th>    -->

                                                                        <th>Booked date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($future_hotel_data as $key => $hotel) { ?>
                                                                        <tr>
                                                                            <td><?php echo $key + 1; ?></td>
                                                                            <td><?php echo $hotel['BookingID']; ?></td>
                                                                            <td><img src="<?php echo $hotel['ImageURL']; ?>" style="hight:75px; width: 75px;"/></td>
                                                                            <td><?php echo $hotel['HotelName']; ?></td>
                                                                            <td><?php echo $hotel['address1']; ?></td>
                                                                            <td><?php echo $hotel['RoomType']; ?></td>
                                                                            <td><?php echo date('d M Y', strtotime($hotel['CheckIn'])); ?></td>
                                                                            <!--<td><?php echo $hotel['CheckOut']; ?></td>-->
                                                                            <td><?php echo $hotel['Status']; ?></td>

                <!--<td><?php echo $hotel['Telephone']; ?></td>--> 

                <!-- <td><?php echo $hotel['BookingAmount']; ?></td>-->

                                                                            <td><?= date('d M Y', strtotime($hotel['created'])) ?></td>
                                                                            <td><a href="<?php
                                                                                if ($hotel['HotelType'] == "Domestic") {
                                                                                    echo base_url('index.php/hotel/print_dom_ticket/') . '/' . $hotel['BookingID'];
                                                                                } else {
                                                                                    echo base_url('index.php/hotel/print_Intl_ticket/') . '/' . $hotel['BookingID'];
                                                                                }
                                                                                ?>">
                                                                                    <button class="btn">PRINT & View</button>
                                                                                </a>
                                                                                <input type="button" class="btn btn-danger ftcancel" data-BookingID="<?php echo $hotel['BookingID'] ?>" data-ProviderId="<?php echo $hotel['ProviderId'] ?>" data-RateplanId="<?php echo $hotel['RateplanId'] ?>" data-HotelId="<?php echo $hotel['HotelId'] ?>" data-SearchId="<?php echo $hotel['SearchId'] ?>" data-HotelType="<?php echo $hotel['HotelType'] ?>" data-RoomInfo="<?php echo $hotel['RoomInfo'] ?>" data-RCount="<?php echo $hotel['RCount'] ?>" data-CheckIn="<?php echo $hotel['CheckIn'] ?>" data-CheckOut="<?php echo $hotel['CheckOut'] ?>" data-RoomTypeID="<?php echo $hotel['RoomTypeID'] ?>" Value="Cancel" /></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php echo $this->pagination->create_links(); ?> </div>
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
                            foreach ($flightDetail as $PassengerDetail) {
                                ?>
                                <label>Airline Code :</label>
                                <span>
                                    <?= $PassengerDetail[0]['AirlineCode'] ?>
                                </span><br/>
                                <label>Airline PNR :</label>
                                <span>
                                    <?= $PassengerDetail[0]['AirlinePNR'] ?>
                                </span><br/>
                                <label>Airline Name :</label>
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
                                <label>Contact Number :</label>
                                <span>
                                    <?= $PassengerDetail[0]['ContactNumber'] ?>
                                </span><br/>
                                <label>Fax Number :</label>
                                <span>
                                    <?= $PassengerDetail[0]['FaxNumber'] ?>
                                </span><br/>
                                <label>E-Mail Id :</label>
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

                            <div  class=".preloader"  style="display:none;"> <img src="<?php echo base_url('image/preloader.png'); ?>"  width="50" height="25"/> </div>
                            <p  id="wait" align="center">Please Wait ....</p>
                            <p id="cancelpoicy"></p>
                            <div  class="fare_rule">
                                <form class="booking-form" method="post" action="<?php echo base_url('index.php/hotel/user_getGetCancellation'); ?>">
                                    <div class="form-group1 row">
                                        <div class=" col-sm-12">
                                            <div class="col-sm-3">
                                                <label><strong>EmailId</strong></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text"  name="EmailId" value="<?php echo $this->session->userdata('email') ?>" id="EmailId"  class="form-control"/>
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
                                                            <input type="checkbox" checked="checked" required="">
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
                $(".ftcancel").click(function ()
                {
                    $("#hermspnr").val($(this).data('hermespnr'));
                    $('#cancelpoicy').html('');
                    $('#HotelType').val($(this).data('hoteltype'));
                    $("#TravelType").val($(this).data('traveltype'));
                    $("#BookingID").val($(this).data('bookingid'));
                    $('#cancelmodel').modal('show');
                    $('#wait').show();

                    $.ajax({
                        url: "<?php echo base_url('index.php/hotel/TNC_CancelPolicy'); ?>",
                        type: 'post',
                        data: {hoteltype: $(this).data('hoteltype'), roominfo: $(this).data('roominfo'), searchid: $(this).data('searchid'), hotelid: $(this).data('hotelid'), rateplanid: $(this).data('rateplanid'), providerid: $(this).data('providerid'), RCount: $(this).data('rcount'), bookingid: $(this).data('bookingid'), checkout: $(this).data('checkout'), checkin: $(this).data('checkin'), roomtypeid: $(this).data('roomtypeid')},
                        success: function (data) {
                            $('#wait').hide();
                            $('#cancelpoicy').html("<strong>" + data + "</strong>");
                        }
                    });

                });
            </script>
            <?php include APPPATH . 'views/home/footer.php'; ?>
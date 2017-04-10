<?php $booking_details = $BookingInfoResponse['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel'];?>
<div class="container">
    <div class="row">
        <div class="gap"></div>
        <div class="col-md-8 col-md-offset-2">
            <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>
            <h2 class="text-center">Booking Confirmation</h2>
            <hr/>
            <h5 class="text-center mb30">Thank You. Your Booking Order is Confirmed Now.</h5>
            <p class="text-center">A confirmation email has been sent to your provided email address.</p>
            <hr/>
            <h2><i class="fa fa-user"></i> Traveler Information <a style="color:#FFFFFF" class="btn btn-danger" target="_blank" href="<?php echo base_url('index.php/hotel/print_dom_ticket/' . $booking_details['BookingId']); ?>">Print Details</a></h2>
            <ul class="order-payment-list list mb30">
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Customer Name:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['CustomerName']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>E-mail address:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['Emailid']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Booking number:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['BookingId']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Hotel Name:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['HotelName']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Rooms:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['RCount']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Booking Amount:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['BookingAmount']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Room Type:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['RoomType']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>CheckIn Date:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['CheckIn']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>CheckIn Time:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['CheckInTime']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>CheckOut Date:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['CheckOut']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>CheckOut Time:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['CheckOutTime']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Street Address and number:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['Address']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Town / City:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['city']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>ZIP code:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['Pincode']; ?></span></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-xs-4"><h5>Country:</h5></div>
                        <div class="col-xs-8">
                            <p class="text-right"><span class="text-lg"><?php echo $booking_details['Country']; ?></span></p>
                        </div>
                    </div>
                </li>
            </ul>
            <hr/>
            <h2>Payment</h2>
            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec
                lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi
                adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum
                quis.</p>
            <br/>
            <!--                        <p class="red-color">Payment is made by Credit Card Via Paypal.</p>-->
            <hr/>
            <h2>View Booking Details</h2>
            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec
                lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi
                adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum
                quis.</p>
        </div>
    </div>
    <div class="gap"></div>
</div>


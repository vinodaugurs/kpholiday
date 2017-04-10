<?php $booking_details = $data['BookingInfoResponse']['soapBody']['BookingInfoResponse']['BookingInfoResult']['BookingDetails']['Hotel']; ?>
<?php
$this->load->view('agent/header');
$this->load->view('agent/sub-header');
?>
<div id="page-wrapper">
    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sm-8 col-md-9">
                    <div class="booking-information travelo-box">
                        <h2>Booking Confirmation</h2>
                        <hr />
                        <div class="booking-confirmation clearfix">
                            <i class="soap-icon-recommend icon circle"></i>
                            <div class="message">
                                <h4 class="main-message">Thank You. Your Booking Order is Confirmed Now.</h4>
                                <p>A confirmation email has been sent to your provided email address.</p>
                            </div>

                            <a href="<?php echo base_url('index.php/hotel/print_dom_ticket/' . $booking_details['BookingId']); ?>"><button  class="button btn-small print-button uppercase" >print Details</button></a>

                        </div>
                        <hr />
                        <h2>Traveler Information</h2>
                        <div id="print_detail">
                            <dl class="term-description">
                                <dt>Customer Name:</dt><dd><?php echo $booking_details['CustomerName']; ?></dd>                 
                                <dt>E-mail address:</dt><dd><?php echo $booking_details['Emailid']; ?></dd>
                                <dt>Booking number:</dt><dd><?php echo $booking_details['BookingId']; ?></dd>
                                <dt>Hotel Name:</dt><dd><?php echo $booking_details['HotelName']; ?></dd>
                                <dt>Rooms:</dt><dd><?php echo $booking_details['RCount']; ?></dd>
                                <dt>Booking Amount:</dt><dd><?php echo $booking_details['BookingAmount']; ?></dd>
                                <dt>Room Type:</dt><dd><?php echo $booking_details['RoomType']; ?></dd>
                                <dt>Check In Date:</dt><dd><?php echo $booking_details['CheckIn']; ?></dd>
                                <dt>Check In Time:</dt><dd><?php echo $booking_details['CheckInTime']; ?></dd>
                                <dt>Check Out Date:</dt><dd><?php echo $booking_details['CheckOut']; ?></dd>   
                                <dt>Check Out Time:</dt><dd><?php echo $booking_details['CheckOutTime']; ?></dd>                                
                                <dt>Street Address and number:</dt><dd><?php echo $booking_details['Address']; ?></dd>
                                <dt>Town / City:</dt><dd><?php echo $booking_details['city']; ?></dd>
                                <dt>ZIP code:</dt><dd><?php echo $booking_details['Pincode']; ?></dd>
                                <dt>Country:</dt><dd><?php echo $booking_details['Country']; ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-sm-4 col-md-3">
                    <div class="travelo-box contact-box">
                        <h4>Need kpholidays Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> +91- 9208232323-HELLO</span>
                            <br>
                            <a class="contact-email" href="#">help@kpholidays.com</a>
                        </address>
                    </div>
                    <div class="travelo-box book-with-us-box">
                        <h4>Why Book with us?</h4>
                        <ul>
                            <li>
                                <i class="soap-icon-hotel-1 circle"></i>
                                <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-savings circle"></i>
                                <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-support circle"></i>
                                <h5 class="title"><a href="#">Excellent Support</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('agent/footer'); ?>  
</body>
</html>


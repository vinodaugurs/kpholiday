<div class="container">
    <div class="row">
        <div class="gap"></div>
        <div class="col-md-8 col-md-offset-2">
            <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>
            <h2 class="text-center">Booking Confirmation</h2>
            <hr/>
            <h5 class="text-center mb30">Thank You. Your Booking Order is Confirmed Now.</h5>
            <p class="text-center">A confirmation email has been sent to your provided email address.</p>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php if($data['0']['ResponseStatus']==1){ ?>
                    <a class="text-center btn btn-primary-invert btn-block" style="color: #FFFFFF !important; font-weight: bolder" target="_blank" href="<?php echo base_url('index.php/flight/print_ticket1/' . $data['0']['ReprintOutput']['TicketDetails']['HermesPNR'] . '/' . $data['0']['UserTrackId']); ?>">Print Ticket</a>
                    <?php } ?>
                </div>
                <div class="col-md-4"></div>
            </div>
            <hr/>
            <!--
            <h2><i class="fa fa-user"></i> Traveler Information</h2>
            <ul class="order-payment-list list mb30">
                <li>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php foreach ($data as $key => $idata) { ?>
                                <div id="print_detail">
                                    <dl class="term-description">
                                        <dt>HermesPNR:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['HermesPNR'] ?></dd>
                                        <dt>TransactionId:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['TransactionId'] ?></dd>
                                        <dt>Customer Name:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['CustomerDetails']['Name'] ?></dd>
                                        <dt>Customer ContactNumber:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['CustomerDetails']['ContactNumber'] ?></dd>
                                        <dt>Customer Address:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['CustomerDetails']['Address'] ?></dd>
                                        <dt>BaseOrigin:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['BaseOrigin'] ?></dd>
                                        <dt>BaseDestination:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['BaseDestination'] ?></dd> 
                                        <dt>TotalAmount:</dt><dd><?php echo $idata['ReprintOutput']['TicketDetails']['TotalAmount'] ?></dd>                               
                                    </dl>
                                    <hr/>
                                    <h2>AirlineDetails</h2>
                                    <dl class="term-description">
                                        <?php foreach ($idata['ReprintOutput']['TicketDetails']['AirlineDetails'] as $key1 => $AirlineDetails) { ?>
                                            <dt>AirlineCode:</dt><dd><?php echo $AirlineDetails['AirlineCode'] ?></dd>
                                            <dt>AirlinePNR:</dt><dd><?php echo $AirlineDetails['AirlinePNR'] ?></dd>
                                            <dt>AirlineName:</dt><dd><?php echo $AirlineDetails['AirlineName'] ?></dd>
                                            <dt>ContactNumber:</dt><dd><?php echo $AirlineDetails['ContactNumber'] ?></dd>
                                            <dt>EMailId:</dt><dd><?php echo $AirlineDetails['EMailId'] ?></dd>
                                            <dt>&nbsp;</dt><dd>&nbsp;</dd>  
                                        <?php } ?>                             
                                    </dl>
                                    <hr/>
                                    <h2>PassengerDetails</h2>
                                    <dl class="term-description">
                                        <?php foreach ($idata['ReprintOutput']['TicketDetails']['PassengerDetails'] as $key1 => $PassengerDetails) { ?>
                                            <dt>TransmissionControlNo:</dt><dd><?php echo $PassengerDetails['TransmissionControlNo'] ?></dd>
                                            <dt>PassengerType:</dt><dd><?php echo $PassengerDetails['PassengerType'] ?></dd>
                                            <dt>FirstName:</dt><dd><?php echo $PassengerDetails['FirstName'] ?></dd>
                                            <dt>LastName:</dt><dd><?php echo $PassengerDetails['LastName'] ?></dd>
                                            <?php foreach ($PassengerDetails['BookedSegments'] as $key2 => $BookedSegments) { ?>
                                                <dt>TicketNumber:</dt><dd><?php echo $BookedSegments['TicketNumber'] ?></dd>
                                                <dt>FlightNumber:</dt><dd><?php echo $BookedSegments['FlightNumber'] ?></dd>
                                                <dt>AirCraftType:</dt><dd><?php echo $BookedSegments['AirCraftType'] ?></dd>
                                                <dt>Origin:</dt><dd><?php echo $BookedSegments['Origin'] ?></dd>
                                                <dt>DepartureDateTime:</dt><dd><?php echo $BookedSegments['DepartureDateTime'] ?></dd>
                                                <dt>Destination:</dt><dd><?php echo $BookedSegments['Destination'] ?></dd>
                                                <dt>Arrivaldatetime:</dt><dd><?php echo $BookedSegments['Arrivaldatetime'] ?></dd>
                                                <dt>AirlineCode:</dt><dd><?php echo $BookedSegments['AirlineCode'] ?></dd>
                                                <dt>ClassCode:</dt><dd><?php echo $BookedSegments['ClassCodeDesc'] ?></dd>
                                                <?php if ($BookedSegments['GrossAmount'] != 0) { ?>
                                                    <dt>GrossAmount:</dt><dd><?php echo $BookedSegments['GrossAmount'] ?></dd>
                                                <?php } ?>
                                            <?php } ?>
                                            <dt>&nbsp;</dt><dd>&nbsp;</dd>  
                                        <?php } ?>                             
                                    </dl>
                                </div>
                                <hr />
                            <?php } ?>
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
            <hr/>
            <h2>View Booking Details</h2>
            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec
                lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi
                adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum
                quis.</p>
            -->
        </div>
    </div>
    <div class="gap"></div>
</div>
<?php $this->load->view('blocks/header'); ?>
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
                    <a class="text-center btn btn-primary-invert btn-block" style="color: #FFFFFF !important; font-weight: bolder" target="_blank" href="<?php echo base_url('index.php/flight/print_ticket/' . $data['0']['ReprintOutput']['TicketDetails']['HermesPNR'] . '/' . $data['0']['UserTrackId']); ?>">Print Ticket</a>
                    <?php } ?>
                </div>
                <div class="col-md-4"></div>
            </div>
            <hr/>
            
        </div>
    </div>
    <div class="gap"></div>
</div>
<?php $this->load->view('blocks/footer'); ?>
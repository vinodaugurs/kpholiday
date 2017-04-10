<footer id="main-footer">
    <div class="container">
        <div class="row row-wrap">
            <div class="col-md-3">
                <a class="logo" href="<?=site_url();?>">
                    <img src="<?php echo base_url() ?>assets/img/logo-invert.png" alt="Image  augurs" title="kpholidays"/>
                </a>
                <p class="mb20">Booking, reviews and advice on hotels, resorts, flights, vacation rentals, travel packages, and lots more!</p>
                <ul class="list list-horizontal list-space">
                    <li><a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="https://www.facebook.com/holidaykp" target="_blank"></a></li>
                    <li><a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#" target="_blank"></a></li>
                    <li><a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#" target="_blank"></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Newsletter</h4>
                <form>
                    <label>Enter your E-mail Address</label>
                    <input type="text" class="form-control">
                    <p class="mt5">
                        <small>*We Never Send Spam</small>
                    </p>
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </form>
            </div>
            <div class="col-md-2">
                <ul class="list list-footer">
                    <li><a href="<?=site_url('home/aboutus')?>"> About US</a></li>
                    <li><a href="<?=site_url('home/contactuspage')?>">Contact Us</a></li>
                    <li><a href="javascript:void(0);">Travel News</a></li>
                    <li><a href="<?=site_url('home/Jobs')?>">Jobs</a></li>
                    <li><a href="<?=site_url('home/PrivacyPolicy')?>">Privacy Policy</a></li>
                    <li><a href="<?=site_url('home/TermsofService')?>">Terms of Use</a></li>
                    <li><a href="javascript:void(0);">Feedback</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Have Questions?</h4>
                <h4 class="text-color">+91-9956241414</h4>
                <h4><a href="#" class="text-color">namaste@kpholidays.com</a></h4>
                <p>G-115,South City, Raebareli Road Lucknow, U.P., India</p>
            </div>
            <div class=" clearfix"></div>
            <div class="copyright text-center hidden-xs">
                © 2017 All rights reserved .&nbsp;&nbsp; Powered By : <a href="https://www.augurs.in/" target="_blank"> Augurs Technologies </a>
            </div>
            <div class="copyright text-center hidden-lg hidden-md hidden-sm">
                © 2017 All rights reserved.&nbsp;&nbsp;<br/> Powered By : <a href="https://www.augurs.in/" target="_blank"> Augurs Technologies </a>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="progress_bar_box" aria-labelledby="mySmallModalLabel">   
    <div class="modal-dialog modal-sm">   
        <div class="modal-content" style="background-color: transparent; -webkit-box-shadow:none; box-shadow:none; border: none;">
            <div class="spinner-clock">
                <div class="spinner-clock-hour"></div>
                <div class="spinner-clock-minute"></div>
            </div>
        </div>   
    </div>   
</div>
<script>
(function ($) {
    // Simple wrapper around jQuery animate to simplify animating progress from your app
    // Inputs: Progress as a percent, Callback
    // TODO: Add options and jQuery UI support.
    $.fn.animateProgress = function (progress, callback) {
        return this.each(function () {
            $(this).animate({
                width: progress + '%'
            }, {
                duration: 2000, // swing or linear
                easing: 'swing',
                // this gets called every step of the animation, and updates the label
                step: function (progress) {
                    var labelEl = $('.ui-label', this), valueEl = $('.value', labelEl);
                    if (Math.ceil(progress) < 20 && $('.ui-label', this).is(":visible")) {
                        labelEl.hide();
                    } else {
                        if (labelEl.is(":hidden")) {
                            labelEl.fadeIn();
                        }
                    }
                    if (Math.ceil(progress) == 100) {
                        labelEl.text('Done');
                        setTimeout(function () {
                            //labelEl.fadeOut();
                        }, 1000);
                    } else {
                        valueEl.text(Math.ceil(progress) + '%');
                    }
                },
                complete: function (scope, i, elem) {
                    if (callback) {
                        callback.call(this, i, elem);
                    }
                }
            });
        });
    };
})(jQuery);
$(function () {
    // Hide the label at start
    $(".clickme").click(function () {
        $('.bs-example-modal-sm').modal('show');

        $('#progress_bar').show();
        $('#progress_bar .ui-progress .ui-label').hide();
        // Set initial value
        $('#progress_bar .ui-progress').css('width', '7%');
        // Simulate some progress
        $('#progress_bar .ui-progress').animateProgress(43, function () {
            $(this).animateProgress(79, function () {
                setTimeout(function () {
                    $('#progress_bar .ui-progress').animateProgress(100, function () {
                        $('#main_content').slideDown();
                        $('#fork_me').fadeIn();
                    });
                }, 2000);
            });
        });
    });
});
</script>
<script src="<?php echo base_url(); ?>assets/js/slimmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nicescroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dropit.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ionrangeslider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/icheck.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fotorama.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxMgd61Q3EW0Lu_KTg18UokL-RuYHCQ_s&callback=initialize"></script>
<script src="<?php echo base_url(); ?>assets/js/typeahead.js"></script>
<script src="<?php echo base_url(); ?>assets/js/card-payment.js"></script>
<script src="<?php echo base_url(); ?>assets/js/magnific.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fitvids.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tweet.js"></script>
<script src="<?php echo base_url(); ?>assets/js/countdown.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gridrotator.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/switcher.js"></script>
</body>
</html>
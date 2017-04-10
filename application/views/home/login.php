<!DOCTYPE HTML>
<html class="full">
    <head>
        <title>KP Holidays - Login - Register</title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta name="keywords" content=""/>
        <meta name="description" content="">
        <meta name="author" content="Augurs">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicons -->
        <link rel="shortcut icon" href="favi.jpg">
        <?php $this->load->view('blocks/styles'); ?>
    </head>
    <body class="full">
        <!-- FACEBOOK WIDGET -->
        <div id="fb-root"></div>
        <script></script>
        <!-- /FACEBOOK WIDGET -->
        <div class="global-wrap">
            <div class="full-page">
                <div class="bg-holder full">
                    <div class="bg-mask"></div>
                    <div class="bg-img" style="background-image:url(<?php echo base_url('assets'); ?>/img/people_on_the_beach_1280x852.jpg);"></div>
                    <div class="bg-holder-content full text-white">
                        <a class="logo-holder" href="<?php echo site_url(); ?>">
                            <img src="<?php echo base_url('assets'); ?>/img/logo-white.png" alt="Image augurs" title="kpholidays"/>
                        </a>
                        <div class="full-center">
                            <div class="container">
                                <div class="row row-wrap" data-gutter="60">
                                    <div class="col-md-4">
                                        <div class="visible-lg">
                                            <h3 class="mb15">Welcome to Traveler</h3>
                                            <p>Est nisl facilisis consectetur eget fermentum rutrum suscipit penatibus ultrices
                                                eu bibendum mi volutpat mattis cum facilisis nunc platea tincidunt vehicula
                                                laoreet montes parturient urna magnis eu etiam eget integer</p>
                                            <p>Nullam consectetur fames erat scelerisque ac conubia orci mauris facilisi</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                        $error = $this->session->flashdata('error');
                                        if (isset($error)) {
                                            $validation_msg = validation_errors();
                                            if (!empty($error)) {
                                                echo '<p>' . $error . '</p>';
                                            }
                                            if (!empty($validation_msg)) {
                                                echo '<p>' . $validation_msg . '</p>';
                                            }
                                        }
                                        ?>
                                        <h3 class="mb15">Login</h3>
                                        <form method="post" action="<?php echo site_url('login'); ?>">
                                            <div class="form-group form-group-ghost form-group-icon-left">
                                                <i class="fa fa-user input-icon input-icon-show"></i>
                                                <label>E-mail Address</label>
                                                <input name="email" class="form-control" placeholder="e.g. support@augurs.in" type="email"/>
                                            </div>
                                            <div class="form-group form-group-ghost form-group-icon-left">
                                                <i class="fa fa-lock input-icon input-icon-show"></i>
                                                <label>Password</label>
                                                <input name="password" class="form-control" type="password" placeholder="my secret password"/>
                                            </div>
                                            <input class="btn btn-primary" type="submit" value="Sign in"/>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="mb15">New To Traveler?</h3>
                                        <?= validation_errors(); ?>
                                        <form action="<?= site_url("register") ?>" method="post">
                                            <div class="form-group form-group-ghost form-group-icon-left">
                                                <i class="fa fa-user input-icon input-icon-show"></i>
                                                <label for="txtFullName">Full Name</label>
                                                <input name="txtFullName" class="form-control" placeholder="e.g. John Doe" type="text"/>
                                            </div>
                                            <div class="form-group form-group-ghost form-group-icon-left">
                                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                                <label for="txtEmail">Email</label>
                                                <input name="txtEmail" class="form-control" placeholder="e.g. support@augurs.in" type="text"/>
                                            </div>
                                            <div class="form-group form-group-ghost form-group-icon-left">
                                                <i class="fa fa-lock input-icon input-icon-show"></i>
                                                <label for="txtPassword">Password</label>
                                                <input name="txtPassword" class="form-control" type="password" placeholder="my secret password"/>
                                            </div>
                                            <input class="btn btn-primary" type="submit" value="Sign up for Traveler"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Hot Deals</a></li>
                            <li><a href="#">Popular Locations</a></li>
                            <li><a href="#">Cheap Flights</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Advertise</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>








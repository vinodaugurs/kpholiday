<?php $userdata = $this->session->all_userdata(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>:: K P Holidays :: </title>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Travelo | Responsive HTML5 Travel Template">
    <meta name="author" content="SoapTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url('image/favi.jpg'); ?>">
    
    <?php #$this->load->view('blocks/styles'); ?>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome2.css'); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css'); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/mystyles.css'); ?>" type="text/css"/>
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
</head>
<body>
    <header id="main-header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a class="logo hidden-lg hidden-md hidden-sm col-xs-5 col-centered" href="<?=site_url();?>">
                            <img src="<?=base_url()?>assets/img/logo-invert.png" alt="Image  augurs" title="kpholidays"/>
                        </a>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                    </div>
                    <div class="col-md-4">
                        <div class="top-user-area clearfix">
                            <ul class="top-user-area-list list list-horizontal list-border pull-right">
                                <li class="top-user-area-avatar">
                                    <a href="<?= !empty($userdata['user_name']) ? site_url('user/index') : site_url('login') ?>">
                                        <img class="origin round" src="<?=base_url() ?>assets/img/amaze_40x40.jpg" alt="Image augurs" title="AMaze"/>Hi, <?= (!empty($userdata['user_name'])) ? $userdata['user_name'] : 'Guest !'; ?>
                                    </a>
                                </li>
                                <li><a href="<?php echo (!empty($userdata['uid'])) ? site_url('home/logout') : site_url('login') ?>"><?php echo (!empty($userdata['uid'])) ? 'Logout' : 'Sign In' ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-2 col-sm-3 col-xs-3">
                <?php 
                    $basePage = site_url();
                    if(isset($userdata['type'])) {
                        if($userdata['type'] == 'agent') {
                            $basePage .= "/agent";
                        } elseif($userdata['type'] == 'Admin') {
                            $basePage .= "/dashboard/index";
                        }
                    }
                ?>
                <a class="logo hidden-xs" href="<?=$basePage?>">
                    <img src="<?=base_url()?>assets/img/logo-invert.png" alt="Image  augurs" title="kpholidays"/>
                </a>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-12">
                <div class="nav">
                <?php if(isset($userdata['type']) && $userdata['type'] == 'agent') { ?>
                    <ul class="slimmenu" id="slimmenu">
                       
                        <li><a href="#">AIR<i class="arrow-indicator fa fa-angle-down"></i></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>index.php/agent/flight_list">FLIGHT SEARCH</a></li>
                                <li><a href="<?=base_url()?>index.php/agent/airline_ticket_history">TICKET HISTORY</a></li>
                            </ul>
                        </li>
    
                        <li><a href="#">BUS<i class="arrow-indicator fa fa-angle-down"></i></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>index.php/agent/bus_list">SEARCH</a></li>
                                <li><a href="<?=base_url()?>index.php/agent/bus_ticket_history">TICKET HISTORY</a></li>
                            </ul>
                        </li>
                        <li><a href="#">HOTEL<i class="arrow-indicator fa fa-angle-down"></i></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>index.php/agent/hotel_list">Search Hotel</a></li>
                                <li><a href="<?=base_url()?>index.php/agent/hotel_ticket_history">TICKET HISTORY</a></li>
                                <!-- <li><a href="blog-single.html">Blog Single</a></li> -->
                            </ul>
                        </li>
                        <li><a href="<?=base_url()?>index.php/agent/walletReporting">Wallet Report</a></li>
                        <li><a href="<?=base_url()?>index.php/agent/cancelTicket">Cancel Ticket</a></li>
                        <li><a href="<?=base_url()?>index.php/home/DMR_Url" target="Blank">D.M.R </a></li>
                        <li><a href="#">Control Panel<i class="arrow-indicator fa fa-angle-down"></i></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>index.php/agent/setting">Edit Profile</a></li>
                                <li><a href="<?=base_url()?>index.php/agent/edit_markup">Edit MarkUp </a></li>
                            </ul>
                        </li>
                    
                    </ul>
                <?php } else { ?>
                    <ul class="slimmenu" id="slimmenu">
                        <li <?=($this->router->fetch_method() == "index")?'class="active"':'';?>><a href="<?=site_url();?>">Home</a></li>
                        <li <?=($this->router->fetch_method() == "view_all_destinations")?'class="active"':'';?>><a href="<?=site_url("home/view_all_destinations");?>">Destinations</a></li>
                        <li <?=($this->router->fetch_method() == "view_all_packages")?'class="active"':'';?>><a href="<?=site_url("home/view_all_packages");?>">Packages</a></li>
                        <li <?=($this->router->fetch_method() == "aboutus")?'class="active"':'';?>><a href="<?=site_url('home/aboutus')?>"> About US</a></li>
                        <li <?=($this->router->fetch_method() == "contactuspage")?'class="active"':'';?>><a href="<?=site_url('home/contactuspage')?>">Contact Us</a></li>
                    </ul>
                <?php } ?>
                </div>
            </div>
        </div>
    </header>
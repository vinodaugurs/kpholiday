<div id="top">
    <?php
    $uid = $this->session->userdata('uid');
    $admin = $this->user_model->get_all($uid);
    ?>
    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip"
           class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu"
           id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">
            <a href="" class="navbar-brand">
                <span style="color: #000000;"><img src="<?php echo base_url(); ?>assets/img/logo-invert.png" width="160"
                                                   height="50"/></span>
            </a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right">
            <!-- MESSAGES SECTION -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="label label-success"></span>
                    <i class="icon-envelope-alt"></i>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages" style="max-height:400px;overflow-y:scroll">
                    <li>
                        <a href="#">
                            <div>
                                <strong class="label label-danger"></strong>
                                <span class="pull-right text-muted"><em></em></span>
                            </div>
                            <div></div>
                            <br/>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="">
                            <strong>Read All</strong>
                            <i class="icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href=""><i class="icon-user"></i> User Profile </a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('index.php/home/logout'); ?>"><i class="icon-signout"></i>
                            Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<!-- END HEADER SECTION -->
<!-- MENU SECTION -->
<?php #if(!($this->router->fetch_class()=="dashboard" && $this->router->fetch_method()=="index")){ ?>
<div id="left">
    <div class="media user-media well-small">
        <a class="user-link" href=""><br></a>
        <br/>
        <div class="media-body">
            <h5 class="media-heading"></h5>
            <ul class="list-unstyled user-info">
                <li>
                    <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online<br/>
                    <span>&nbsp;&nbsp;&nbsp; <?php echo @$admin[0]['type']; ?></span>
                </li>
            </ul>
        </div>
        <br/>
    </div>
    <ul id="menu" class="collapse">
        <li class="panel active">
            <a href="<?php echo site_url('dashboard/index'); ?>">
                <i class="icon-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="panel"></li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pack-nav">
                <i class="icon-table"></i> Manage Packages <span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="add_package" || $this->router->fetch_method()=="package" || $this->router->fetch_method()=="mypackage" || $this->router->fetch_method()=="book_package"){ ?>
            <ul class="expand" id="pack-nav">
            <?php }else{?>
            <ul class="collapse" id="pack-nav">
            <?php } ?>
                <li class=""><a href="<?php echo base_url(); ?>index.php/admin/add_package"><i class="icon-plus"></i> Create Packages </a></li>
                <li class=""><a href="<?php echo site_url('dashboard/mypackage'); ?>"><i class="icon-pencil"></i> Manage Packages </a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/dashboard/book_package"><i class="icon-book"></i> Booked Packages </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#offer-nav">
                <i class="icon-gift"></i> Offers/ Discounts<span class="pull-right"> <i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="offers" || $this->router->fetch_method()=="myoffers" || $this->router->fetch_method()=="editoffer"){ ?>
            <ul class="expand" id="offer-nav">
            <?php }else{ ?>
            <ul class="collapse" id="offer-nav">
            <?php } ?>
                <li class=""><a href="<?php echo site_url('dashboard/offers'); ?>"><i class="icon-plus"></i> Create Offers/Discounts</a></li>
                <li class=""><a href="<?php echo site_url('dashboard/myoffers'); ?>"><i class="icon-pencil"></i> Manage Offers/Discounts </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#associate-nav">
                <i class="icon-user"> </i> Manage User<span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="agent"){ ?>
            <ul class="expand" id="associate-nav">
            <?php }else{ ?>
            <ul class="collapse" id="associate-nav">
            <?php } ?>
                <?php $aid = 1; $tid = 2; ?>
                <li class=""><a href="<?php echo site_url('dashboard/agent/' . $tid); ?>"><i class="icon-file-text-alt"></i> Traveler List </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#desti-nav">
                <i class="icon-road"> </i> Manage Destination<span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="add_destination" || $this->router->fetch_method()=="destination" || $this->router->fetch_method()=="edit_destination"){ ?>
            <ul class="expand" id="desti-nav">
            <?php }else{ ?>
            <ul class="collapse" id="desti-nav">
            <?php } ?>
                <li><a href="<?php echo site_url('dashboard/add_destination'); ?>"><i class="icon-plus"></i> Add Destination </a></li>
                <li><a href="<?php echo site_url('dashboard/destination'); ?>"><i class="icon-check"></i> Manage Destination </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#email-nav">
                <i class="icon-envelope"> </i> Customize Request<span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="customize"){ ?>
            <ul class="expand" id="email-nav">
            <?php }else{ ?>
            <ul class="collapse" id="email-nav">
            <?php } ?>
                <li class=""><a href="<?php echo site_url('dashboard/customize'); ?>"><i class="icon-mail-forward"></i> Manage Customize form </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#noti-nav">
                <i class="icon-info-sign"> </i> Notifications<span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <?php if($this->router->fetch_method()=="notification"){ ?>
            <ul class="expand" id="noti-nav">
            <?php }else{ ?>
            <ul class="collapse" id="noti-nav">
            <?php } ?>
                <li class=""><a href="<?php echo site_url('dashboard/notification'); ?>"><i class="icon-eye-open"></i> view notification</a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#desti-nav1">
                <i class="icon-road"> </i> Agent<span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <ul class="collapse" id="desti-nav1">
                <li class=""><a href="<?php echo site_url('dashboard/agent_list?commissionType=International+Flight'); ?>"><i class="icon-plus"></i> Add Agent Comission </a></li>
                <li class=""><a href="<?php echo site_url('dashboard/agent_request'); ?>"><i class="glyphicon glyphicon-list-alt"></i> Agent Request </a></li>
                <?php $aid = 1; $tid = 2; ?>
                <li class=""><a href="<?php echo site_url('dashboard/agent/' . $aid); ?>"><i class="icon-table"></i> Agent List</a></li>
                <li class=""><a href="<?php echo site_url('dashboard/addAgent'); ?>"><i class="icon-file-text-alt"></i> Add Agent </a></li>
            </ul>
        </li>
        <li class="panel">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#desti-nav2">
                <i class="icon-plane"> </i> Flight Add <span class="pull-right"><i class="icon-angle-down"></i></span>
            </a>
            <ul class="collapse" id="desti-nav2">
                <li class=""><a href="<?php echo site_url('dashboard/flight_add'); ?>"><i class="icon-plus"></i> Flight</a></li>
            </ul>
        </li>
    </ul>
</div>
<?php #} ?>
<!--END MENU SECTION -->



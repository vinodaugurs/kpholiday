<?php include(APPPATH . 'views/home/header.php'); ?>
    <div id="page-wrapper">
        <section id="content">
            <div class="page-title-container">
                <div class="container">
                    <div class="page-title pull-left">
                        <h2 class="entry-title">User Agreement</h2>
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
                                        <li class="active"><a href="#first-tab" data-toggle="tab"><i
                                                    class="fa fa-calendar-o"></i> All Trips</a></li>
                                        <li><a href="#second-tab" data-toggle="tab"><i
                                                    class="fa fa-user"></i>Profile</a></li>
                                        <li><a href="#third-tab" data-toggle="tab"><i class="fa fa-users"></i>Travellers</a>
                                        </li>
                                        <li><a href="#four-tab" data-toggle="tab"><i class="fa fa-credit-card"></i>QuickBook
                                            </a></li>
                                        <li><a href="#five-tab" data-toggle="tab"><i class="fa fa-money"></i>eCash</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="first-tab">
                                            <h2 class="tab-content-title">Welcome <?php echo $user ?></h2>

                                            <div>
                                                <div class="tab-container trans-style box">
                                                    <ul class="tabs full-width">
                                                        <li class=""><a href="#family1" data-toggle="tab">
                                                                <button class="" id="upcoming"><i
                                                                        class="hidden-xs fa fa-upcoming"></i>Upcoming
                                                                </button>
                                                            </a></li>
                                                        <li class=""><a href="#honeymoon1" data-toggle="tab">
                                                                <button class="" id="completed"><i
                                                                        class="hidden-xs fa fa-completed"></i>Completed
                                                                </button>
                                                            </a></li>
                                                        <li class=""><a href="#weekends1" data-toggle="tab">
                                                                <button class="" id="cancelled"><i
                                                                        class="hidden-xs fa fa-cancelled"></i>Cancelled
                                                                </button>
                                                            </a></li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade" id="family1">
                                                            <h4>Family</h4>
                                                        </div>
                                                        <div class="tab-pane fade" id="honeymoon1">
                                                            <h4>Honey Moon</h4>
                                                            <p>
                                                                Proin eget libero vel nunc cursus mollis ac eget sapien.
                                                                Aenean porttitor euismod leo sed ultrices. Ut porta
                                                                iaculis lorem ut placerat. Morbi non vulputate turpis.
                                                                Aenean a tempor nulla. Maecenas nec pharetra felis, eget
                                                                varius orci. Mauris vehicula, elit nec tincidunt mattis,
                                                                nisi velit dignissim libero vel commodo eros lectus vel
                                                                leo.
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="weekends1">
                                                            <h4>Weekends</h4>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="second-tab">
                                            <h2 class="tab-content-title">Second Tab</h2>
                                        </div>
                                        <div class="tab-pane fade" id="third-tab">
                                            <h2 class="tab-content-title">Third Tab</h2>
                                        </div>

                                        <div class="tab-pane fade" id="four-tab">
                                            <h2 class="tab-content-title">Third Tab</h2>
                                        </div>

                                        <div class="tab-pane fade" id="five-tab">
                                            <h2 class="tab-content-title">Third Tab</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="clearfix"></div><!--clearfix-->


                        </div><!--Register-Page-->


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

<?php include APPPATH . 'views/home/footer.php'; ?>
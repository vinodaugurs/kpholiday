<div id="wrap">
    <?php require_once 'nav.php'; ?> <!--PAGE CONTENT -->
    <div id="content" style="width:81%;padding-left:14px ;padding-top:25px;">
        <div class="inner" style="min-height:1200px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php $id = 1; $tid = 2; ?>
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/agent/' . $id); ?>">
                                <i class="icon-suitcase icon-2x"></i>
                                <span>Agent</span>
                                <span class="label label-success"></span>
                            </a>
                            <?=br(2)?>
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/agent/' . $tid); ?>">
                                <i class="icon-external-link icon-2x"></i>
                                <span>Traveler</span>
                                <span class="label btn-metis-2"></span>
                            </a>
                            <?=br(2)?>
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/destination'); ?>">
                                <i class="icon-user icon-2x"></i>
                                <span>Destination</span>
                                <span class="label btn-metis-4"></span>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/book_flight'); ?>">
                                <i class="icon-suitcase icon-2x"></i>
                                <span>Booked Flight</span>
                                <span class="label label-success"></span>
                            </a>
                            <?=br(2)?>
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/book_buses'); ?>">
                                <i class="icon-external-link icon-2x"></i>
                                <span>Booked Buses</span>
                                <span class="label btn-metis-2"></span>
                            </a>
                            <?=br(2)?>
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/book_hotels'); ?>">
                                <i class="icon-user icon-2x"></i>
                                <span>Booked Hotels</span>
                                <span class="label btn-metis-4"></span>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/mypackage'); ?>">
                                <i class="icon-check icon-2x"></i>
                                <span> Packages</span>
                                <span class="label label-warning"></span>
                            </a>
                            <?=br(2)?>
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/book_package'); ?>">
                                <i class="icon-check icon-2x"></i>
                                <span> Booked Packages</span>
                                <span class="label label-warning"></span>
                            </a>
                            <!--
                            
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/hotel_view'); ?>">
                                <i class="icon-check icon-2x"></i>
                                <span>Hotel</span>
                                <span class="label btn-metis-4"></span>
                            </a>
                            
                            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('dashboard/cab_view'); ?>">
                                <i class="icon-check icon-2x"></i>
                                <span>Cabs</span>
                                <span class="label btn-metis-4"></span>
                            </a>
                            -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <hr/>
        </div>
    </div>
</div>


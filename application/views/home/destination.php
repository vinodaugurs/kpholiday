<div class="container">
    <div class="gap"></div>
    <div class="row">
        <div class="banner-div  col-md-6">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active"> <img src="<?php echo base_url('upload/destination/' . $detail[0]->other_image_1); ?>" alt="" style="width:100%;"/>
                        <div class="carousel-caption"> ... </div>
                    </div>
                    <div class="item"> <img src="<?php echo base_url('upload/destination/' . $detail[0]->other_image_1); ?>" alt="" style="width:100%;"/>
                        <div class="carousel-caption"> ... </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
            </div>
        </div>
        <div class="col-sm-6"> 
            <div class="box-wrp" >
                <div class="col-sm-12 box-wrp-right">
                    <h3>About <?php echo $detail[0]->name; ?></h3>
                    <p> <?php echo $detail[0]->description; ?> </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-sm-12" style="margin-top:30px;"> <!--box-wrp-->
            <div class="Destination_box2">
                <div class="box-wrp ">
                    <div class="col-sm-12 box-wrp-right">
                        <h3>Getting There </h3>
                        <p> <?php echo $detail[0]->getting_there; ?> </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row Destination_Boxarea">
                <div class=" col-sm-4">
                    <div class="Destination_box">
                        <div class="Destination_img col-sm-12 col-center"> <img src="http://kpholidays.com/assets/img/train.jpg" class="img-responsive" alt=""/> </div>
                        <?php if ($detail[0]->train) { ?>
                            <div class="box-wrp ">
                                <div class="col-sm-12 box-wrp-right">
                                    <h3>By Train </h3>
                                    <p> <?php echo $detail[0]->train; ?> </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class=" col-sm-4">
                    <div class="Destination_box">
                        <div class="Destination_img col-sm-12 col-center"> <img src="http://kpholidays.com/assets/img/road.jpg" class="img-responsive" alt=""/> </div>
                        <?php if ($detail[0]->road) { ?>
                            <div class="box-wrp ">
                                <div class="col-sm-12 box-wrp-right">
                                    <h3>By Road </h3>
                                    <p> <?php echo $detail[0]->road; ?> </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class=" col-sm-4">
                    <div class="Destination_box">
                        <div class="Destination_img col-sm-12 col-center"> <img src="http://kpholidays.com/assets/img/air.jpg" class="img-responsive" alt=""/> </div>
                        <?php if ($detail[0]->air) { ?>
                            <div class="box-wrp ">
                                <div class="col-sm-12 box-wrp-right">
                                    <h3>By Air </h3>
                                    <p> <?php echo $detail[0]->air; ?> </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="Destination_box2">
                <div class="Destination_img col-sm-4"> <img src="http://kpholidays.com/assets/img/do.jpg" class="img-responsive" alt=""/> </div>
                <div class="col-sm-8">
                    <?php if ($detail[0]->visit_do) { ?>
                        <div class="box-wrp ">
                            <div class="col-sm-12 box-wrp-right">
                                <h3>Visit and Do </h3>
                                <p> <?php echo $detail[0]->visit_do; ?> </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <div class="Destination_box2">
                <?php if ($detail[0]->acco) { ?>
                    <div class="box-wrp ">
                        <div class="col-sm-4 box-wrp-left" style="margin-left:0; padding-left:0;"> <img src="<?php echo base_url('upload/destination/' . $detail[0]->acco_image_1); ?>" alt="" class="img-responsive" > </div>
                        <div class="col-sm-8 box-wrp-right">
                            <h3>Accommodation </h3>
                            <p> <?php echo $detail[0]->acco; ?> </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php } ?>
            <div class="Destination_box2">
                <?php if ($detail[0]->food) { ?>
                    <div class="box-wrp ">
                        <div class="col-sm-4 box-wrp-left" style="margin-left:0; padding-left:0;"> <img src="<?php echo base_url('upload/destination/' . $detail[0]->food_image_1); ?>" alt="" class="img-responsive" > </div>
                        <div class="col-sm-8 box-wrp-right">
                            <h3>Food </h3>
                            <p> <?php echo $detail[0]->food; ?> </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

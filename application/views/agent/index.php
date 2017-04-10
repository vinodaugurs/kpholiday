<?php $this->load->view('agent/header'); ?>
<section class="bg-light">

    <style type="text/css">
        .package-grid-item{
            width: 100%;

        }
    </style>
    <style type="text/css">
        .heding{
            color: red;

        }
    </style>		
    <div class="container">

        <div class="row">

            <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

                <div class="section-title">

                    <h3>Special Packages</h3>
                    <p>Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured.</p>

                </div>

            </div>

        </div>

        <div class="GridLex-gap-30-wrappper package-grid-item-wrapper">
            <?php
            $destinations = $this->user_model->destinations();
            $packages = $this->pack_model->packeges();
            ?>
            <div class="GridLex-grid-noGutter-equalHeight">
                <div class="thumb-caption">
                    <h3 class="heding">Popular Packages</h3><br>
                </div>

                <div class="row">
                    <?php foreach ($packages as $dest) { ?> 
                        <div class="col-md-3">
                            <div class="thumb">
                                <div class="thumb-header">
                                    <a class="hover-img curved" href="<?= base_url('index.php/home/package_detail/' . $dest['pack_id']) ?>">
                                        <img src="<?= base_url('upload/package/' . $dest['front_image']) ?>" alt="Image  augurs" title="the journey home" width="270" height="160">
                                    </a>
                                    <div class="absolute-in-image">
                                        <div class="duration"><span>Popular Packages</span></div>
                                    </div>
                                </div>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title"><?= $dest['pack_name'] ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><br>
                <h4 class="Btn-Explore"><a href="<?= base_url() ?>index.php/home/view_all_packages"    class="pull-right">View All Packages</a></h4>
                <br><br><div class="thumb-caption">
                    <h3 class="heding">Popular Destinations</h3><br>
                </div>
                <div class="row">
                    <?php foreach ($destinations as $dest) { ?> 
                        <?php //print_r($dest);  ?>
                        <div class="col-md-3">
                            <div class="thumb">
                                <div class="thumb-header">
                                    <a class="hover-img curved" href="<?= base_url('index.php/home/view_detail/' . $dest['id']) ?>">
                                        <img src="<?= base_url('upload/destination/' . $dest['main_image']) ?>" alt="Image  augurs" title="the journey home" width="270" height="160">
                                    </a>
                                    <div class="absolute-in-image">
                                        <div class="duration"><span>Popular Destinations</span></div>
                                    </div>
                                </div>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title"><?= $dest['name'] ?> <small><?= $this->region_model->getCountryValue($dest['country'])[0]['country'] ?></small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <h4 class="Btn-Explore"><a href="<?= base_url() ?>index.php/home/view_all_packages"    class="pull-right">View All Destinations</a></h4><br><br>

            </div>

        </div>

    </div>

</section>

<?php $this->load->view('agent/footer'); ?>
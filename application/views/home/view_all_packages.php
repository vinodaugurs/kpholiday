<div class="container">
    <h2 class="page-title">Popular Packages <a style="color:#FFFFFF; float: right;" class="btn btn-primary" href="<?= base_url()?>index.php/user_package/make_package">Make Your Own Package</a><div class="gap"></div></h2>
</div>
<div class="container">
    <div class="row image-box style1 add-clearfix">	
        <?php $i = 1;
        foreach ($packages as $pack) { ?>   
            <div class="col-sms-6 col-sm-6 col-md-3">
                <?php
                $ac_image = "No_Image.jpg";
                if (file_exists(FCPATH . "upload/package/" . $pack['front_image'])) {
                    $ac_image = $pack['front_image'];
                }
                $ac_image = ($ac_image != '') ? $ac_image : "No_Image.jpg";
                ?>
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="<?php echo site_url('home/package_detail/' . $pack['pack_id']); ?>">
                            <img width="270" height="160" src="<?php echo base_url('upload/package/' . $ac_image); ?>" alt="Package Image" title="the journey home"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                        </a>
                    </header>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><?= character_limiter($pack["pack_name"], 10); ?>
                            <small>
                                <?php
                                $countryobj = $this->region_model->getCountryValue($pack['country']);
                                echo $countryobj[0]['country'];
                                ?>
                            </small>
                        </h4>
                        <p class="thumb-desc"><?= character_limiter($pack["details"], 70); ?></p>
                    </div>
                </div>
            </div>
            <?php if ($i % 4 == 0) { ?>
                <div class="gap"></div>
            <?php } ?>
    <?php $i++;
} ?>
    </div>
    <div class="clearfix"><hr></div>    
    <div id="pagination">
        <ul class="pagination"><?=$this->pagination->create_links();?></ul>
    </div>
    <div class="gap"></div>
</div>	
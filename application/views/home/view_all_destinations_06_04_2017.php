<div class="container">
    <h2 class="page-title">Popular Destinations</h2>
</div>
<div class="container">        
    <div class="row image-box style1 add-clearfix">
        <?php $i = 1;
        foreach ($destinations as $dest) { ?>   
            <div class="col-sms-6 col-sm-6 col-md-3">
                <?php
                $ac_image = "default.jpg";
                if (file_exists(FCPATH . "upload/destination/" . $dest['main_image'])) {
                    $ac_image = $dest['main_image'];
                }
                ?>
                <div class="thumb">
                    <header class="thumb-header">
                        <a class="hover-img curved" href="<?php echo site_url('home/view_detail/' . $dest['id']); ?>">
                            <img width="270" height="160" src="<?php echo base_url('upload/destination/' . $ac_image); ?>" alt="Destination Image" title="the journey home"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                        </a>
                    </header>
                    <div class="thumb-caption">
                        <h4 class="thumb-title"><?php echo $dest['name']; ?>
                            <small>
                                <?php
                                $countryobj = $this->region_model->getCountryValue($dest['country']);
                                echo $countryobj[0]['country'];
                                ?>
                            </small>
                        </h4>
                        <p class="thumb-desc"><?= character_limiter($dest["description"], 70); ?></p>
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
        <ul class="pagination"><?= $this->pagination->create_links(); ?></ul>
    </div>
    <div class="gap"></div>
</div>	

<!DOCTYPE html>
 <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title></title>
    
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Travelo | Responsive HTML5 Travel Template">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
     
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type='text/css'>
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css');?>" type='text/css'>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/settings.css');?>" 
media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/revolution_slider/css/style.css');?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.css');?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/flexslider/flexslider.css');?>" media="screen" />

<script type="text/javascript" src="<?php echo base_url('assets/js/code.jquery.js');?>"></script> 

<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
<!-- Updated Styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/updates.css');?>">


<!-- Responsive Styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
<link id="main-style" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    
    <!-- Custom Styles -->
   
</head>
<body>
    <?php $cab=$this->cab_model->cab_list();?> 
	 
    <div id="page-wrapper">
        
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Car Search Results</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo base_url('index.php/home/index');?>">HOME</a></li>
                    <li class="active">Car Search Results</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b>627</b> results found.</h4>
                            <div class="toggle-container filters-container">
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                    </h4>
                                    <div id="price-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="price-range"></div>
                                            <br />
                                            <span class="min-price-label pull-left"></span>
                                            <span class="max-price-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#cartype-filter" class="collapsed">Car Type</a>
                                    </h4>
                                    <div id="cartype-filter" class="panel-collapse collapse filters-container">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">Full Size<small>(10)</small></a></li>
                                                <li><a href="#">Compact<small>(82)</small></a></li>
                                                <li class="active"><a href="#">Economy<small>(127)</small></a></li>
                                                <li><a href="#">Luxury / Premium<small>(22)</small></a></li>
                                                <li><a href="#">Mini Car<small>(38)</small></a></li>
                                                <li><a href="#">Van / Minivan<small>(39)</small></a></li>
                                                <li><a href="#">Exotic / Special<small>(72)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                                    </h4>
                                    <div id="modify-search-panel" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label>pickup from</label>
                                                    <input type="text" class="input-text full-width" placeholder="city, district, or specific airpot" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <label>pick-up date</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>drop-off date</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <br />
                                                <button class="btn-medium icon-check uppercase full-width">search again</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            
                            <div class="car-list">
                                <div class="row image-box car listing-style1">
                            <?php 
							
							foreach($cab as $list){?>                                  
								  <div class="col-sms-6 col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a title="" href="#"><img alt="" src="<?php echo base_url('upload/cabs/'.$list['image']);?>"></a>
                                            </figure>
                                            <div class="details">
                                                <span class="price"><small></small><?php echo $list['price'];?></span>
                                                <h4 class="box-title"><?php echo $list['cab'];?><small></small></h4>
                                                
                                                
                                                <div class="action">
                                                    <a class="button btn-small full-width" href="<?php echo base_url('index.php/cab/cab_detail/'.$list['cab_id']);?>">SELECT NOW</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
							<?php }?>   
                                    
                                </div>
                            </div>
                            <a href="#" class="button uppercase full-width btn-large">load more listings</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
      <?php include'footer.php';?>
    </div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.noconflict.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/modernizr.2.7.1.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.placeholder.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 

   
<!-- Twitter Bootstrap --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 

<!-- load revolution slider scripts --> 
<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>">
</script> 
<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> 

<!-- load BXSlider scripts --> 
<script type="text/javascript" src="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.min.js');?>"></script> 

<!-- Flex Slider --> 
<script type="text/javascript" src="<?php echo base_url('assets/components/flexslider/jquery.flexslider.js');?>"></script> 

<!-- parallax --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 

<!-- parallax --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.stellar.min.js');?>"></script> 

<!-- waypoint --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/waypoints.min.js');?>"></script> 

<!-- load page Javascript --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> 

 
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#price-range").slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 100, 800 ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
                }
            });
            tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

            function convertTimeToHHMM(t) {
                var minutes = t % 60;
                var hour = (t - minutes) / 60;
                var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
                var date = new Date("2014/01/01 " + timeStr + ":00");
                var hhmm = date.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'});
                return hhmm;
            }
            tjq("#flight-times").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 5,
                values: [ 360, 1200 ],
                slide: function( event, ui ) {
                    
                    tjq(".start-time-label").html( convertTimeToHHMM(ui.values[0]) );
                    tjq(".end-time-label").html( convertTimeToHHMM(ui.values[1]) );
                }
            });
            tjq(".start-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 0 )) );
            tjq(".end-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 1 )) );
        });
    </script>
</body>
</html>


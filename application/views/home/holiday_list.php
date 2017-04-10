<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Travelo | Responsive HTML5 Travel Template">
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    
    <!-- Main Style -->
	
	
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">

<!-- Updated Styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/updates.css');?>">


<!-- Responsive Styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">
<link id="main-style" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    
    <!-- Custom Styles -->
   
</head>
<body>
    
    <div id="page-wrapper">
        
    <?php  include'header.php';?> 
           <div style="display:none;" id="id_div_values">
                        <?php $cty =  $this->user_model->getcitynames();
	 					//echo $this->db->last_query(); die;?>	  					
                        <ul>
						<?php foreach ($cty as $valu) {?>                        
                        <li><?php echo $valu['city']; ?> </li>
						<?php }?>
                        </ul>
        </div>    
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i ></i><b>1,984</b> results found.</h4>
                            <div class="toggle-container filters-container">
                               
                               <div class="panel style1 arrow-right">
                                    
                                    <div id="m1odify-search-panel" class="panel-collapse csollapse">
                                        <div class="panel-content">
                                            <form action="<?php  echo base_url('index.php/package/all_package');?>" method="post">
                                                <div class="form-group">
                                                    <label>destination</label>
                                                    <input type="text" name="destination" required id="destination" class="input-text full-width" placeholder="" value="Paris" />
                                                </div>
                                                <div class="form-group">
                                                    <label>check in</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>check out</label>
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
                                        <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                                    </h4>
                                    <div id="rating-filter" class="panel-collapse collapse filters-container">
                                        <div class="panel-content">
                                            <div id="rating" class="five-stars-container editable-rating"></div>
                                            <br />
                                            <small>2458 REVIEWS</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                                    </h4>
                                    <div id="accomodation-type-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">All<small>(722)</small></a></li>
                                                <li><a href="#">Hotel<small>(982)</small></a></li>
                                                <li><a href="#">Resort<small>(127)</small></a></li>
                                                <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                                <li><a href="#">Condo<small>(158)</small></a></li>
                                                <li><a href="#">Residence<small>(439)</small></a></li>
                                                <li><a href="#">Guest House<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                                    </h4>
                                    <div id="amenities-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">Bathroom<small>(722)</small></a></li>
                                                <li><a href="#">Cable tv<small>(982)</small></a></li>
                                                <li class="active"><a href="#">air conditioning<small>(127)</small></a></li>
                                                <li class="active"><a href="#">mini bar<small>(222)</small></a></li>
                                                <li><a href="#">wi - fi<small>(158)</small></a></li>
                                                <li><a href="#">pets allowed<small>(439)</small></a></li>
                                                <li><a href="#">room service<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>
                                    </h4>
                                    <div id="language-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">English<small>(722)</small></a></li>
                                                <li><a href="#">Español<small>(982)</small></a></li>
                                                <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                                <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                                <li><a href="#">Suomi<small>(158)</small></a></li>
                                                <li><a href="#">Italiano<small>(439)</small></a></li>
                                                <li><a href="#">Sign Language<small>(52)</small></a></li>
                                            </ul>
                                            <a class="button btn-mini">MORE</a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            
                            <div class="hotel-list listing-style3 hotel">
    
	<?php   
    					  foreach($package as $package_detail){?>                               
							   <article class="box">
                                    <figure class="col-sm-5 col-md-4">
                                        <a title="" href="" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="<?php echo base_url('upload/package/'.$package_detail['image_1']);?>"></a>
                                    </figure>
                                    <div class="details col-sm-7 col-md-8">
                                        <div>
                                            <div>
                                                <h4 class="box-title"><?php echo$package_detail['pack_name'];?><small><i class=""></i><?php echo date('y/m/d');?></small></h4>
                                               
                                            </div>
                                            <div>
                                                <div class="five-stars-container">
                                                    <span><img src="<?php echo base_url('image/star.png'); ?>"width="10" height="10"/></span>
                                                </div>
                                                <span class="review">270 reviews</span>
                                            </div>
                                        </div>
                                        <div>
                                             <div class="amenities">
                                                    <i class="soap-icon-wifi circle"></i>
                                                    <i class="soap-icon-fitnessfacility circle"></i>
                                                    <i class="soap-icon-fork circle"></i>
                                                    <i class="soap-icon-television circle"></i>
                                                </div>
                                            <div>
                                                <span class="price"><small><?php echo $package_detail['nights'];?>
												NIGHT &nbsp; &nbsp; <br/><?php echo $package_detail['days'];?>
												&nbsp;&nbsp;DAYS</small>&nbsp;&nbsp;&nbsp;&nbsp;INR
												<?php echo $package_detail['price'];?></span>
                                                <a class="button btn-small full-width text-center" title="" href="<?php echo base_url('index.php/package/package_view/'.$package_detail['pack_id']);?>">VIEW</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
					  <?php }?>         
                            </div>
                            <a href="#" class="uppercase full-width button btn-large">load more listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
    </div>
 <?php  include'footer.php';?> 
    <!-- Javascript -->
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
            
            tjq("#rating").slider({
                range: "min",
                value: 40,
                min: 0,
                max: 50,
                slide: function( event, ui ) {
                    
                }
            });
        });
    </script>
	
	<script>
	$(document).ready(function(){
		//auto search city
		var div_val_arr = [];
			$("#id_div_values li").each(function() {
				div_val_arr.push($(this).text());
			});
			
	$( "#destination" ).autocomplete({
			source: div_val_arr,
			select: function( event, ui ) {
					//$('#abcd1234').css('display','block');
					
				  }
				});
			$('#destination').focusout(function(){myFunction();
			});
</script>
</body>
</html>


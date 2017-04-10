<!DOCTYPE html>
 <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title></title>
    
    <!-- Meta Tags -->
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

  <?php $cab=$this->cab_model->cab_list($id);
	    //print_r($cab);
	 ?>  
<div id="page-wrapper">
        
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Cruise Booking</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo base_url('index.php/home/index');?>">HOME</a></li>
                    <li class="active">Cruise Booking</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            <form class="cruise-booking-form">
                                <div class="person-information">
                                    <h2>Your Personal Information</h2>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>first name</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>last name</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>Verify E-mail Address</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-5">
                                          
                                            <label>City</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        
                                        </div>
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>Phone number</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-md-5">
                                            <label>Home Address</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" />
                                        </div>
										<div class="row">
                                        <div class="form-group col-sm-6 col-md-5">
                                            
                                                
                                                <div class="col-xs-6">
                                                    <label>Zipcode</label>
                                                    <input type="text" class="input-text full-width">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                
                                <hr />
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="image-box cruise listing-style1">
                                <figure class="clearfix">
                                    <a title="" href="cruise-detailed.html" class="hover-effect middle-block"><img class="middle-item" alt="" src="<?php echo base_url('upload/cabs/'.$cab[0]['image']);?>"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title"><small><?php echo $cab[0]['cab'];?></small></h5>
                                        <a href="#" class="button">EDIT</a>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="feedback">
                                        <div data-placement="bottom" data-toggle="tooltip" title="4 stars" class="five-stars-container"><span style="width: 80%;" class="five-stars"></span></div>
                                        <span class="review">270 reviews</span>
                                    </div>
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Departs</label>
                                            <span>FEB 10, 2014<br />10 am</span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span>4 Nights</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Returns</label>
                                            <span>feb 15, 2014<br />2 PM</span>
                                        </div>
                                    </div>
                                    <div class="guest">
                                        <small class="uppercase">1 grand suite for <span class="skin-color">2 Persons</span></small>
                                    </div>
                                </div>
                            </article>
                            
                           
                            
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>Need Travelo Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@travelo.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
    </div>




	
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script> 

   
<!-- Twitter Bootstrap --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 

<!-- load revolution slider scripts --> 
<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.plugins.min.js');?>">
</script> 
<script type="text/javascript" src="<?php echo base_url('assets/components/revolution_slider/js/jquery.themepunch.revolution.min.js');?>"></script> 

<!-- load page Javascript --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/theme-scripts.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script> 

 
</body>
</html>


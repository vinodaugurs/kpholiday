<!DOCTYPE html>

<html>

<!--<![endif]-->

<head>

<!-- Page Title -->

<title>KP Holidays</title>

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



<script type="text/javascript" src="<?php echo base_url('assets/js/code.jquery.js');?>"></script> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.js"></script>
<!-- Main Style -->

<link id="main-style" rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">

<!-- Responsive Styles -->

<link rel="stylesheet" href="<?php echo base_url('assets/css/roundflight.css');?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css');?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/components/jquery.bxslider/jquery.bxslider.css');?>" media="screen" />

 <link rel="stylesheet" href="<?php echo base_url('assets/css/ui.css');?>">

 <link rel="stylesheet" href="<?php echo base_url('assets/css/ui.progress-bar.css');?>">

 <link media="only screen and (max-device-width: 480px)" href="<?php echo base_url('assets/css/ios.css');?>" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>" type='text/css'>

<style>


</style>

 <script type="text/javascript">
		$(document).ready(function(){
		$(".show_hide").css('cursor','pointer');	
		$(".slidingDiv").hide();
		$(".show_hide").show();
		$('.show_hide').click(function(){
		$(this).parents('.details-row2').find(".slidingDiv").slideToggle();
		});
		});
	</script>



	<script>
    function settab(id){
    $('.search-tabs a[href="'+id+'"]>span').click();
    }
    </script>



</head>

<body> 

 <header id="header" class="navbar-static-top">

    <!--Top-Header-->

  	<div class="Top-Header">

      <div class="container">

    	<div class="col-md-6">

        <div class="row">

        	<div class="col-md-4 text-center">

             <div class="row">

			    <a href="<?php echo base_url('index.php/home/index');?>" title="Travelo - home"> 

             	<img src="<?php echo base_url('assets/img/Final-logo.png');?>" alt=""/>

				</a>

             </div>

            

            </div>

            

            <div class="col-md-5 col-sm-12 text-center">

            <div class="row">

             	<div class="dropdown">



        <!-- trigger button -->

        <div class="Btn-Explore"> Explore by Category </div><!--Btn-Explore-->

    

        <!-- dropdown menu -->

        <ul class="dropdown-menu Explore-item">
        
        

            <li><a id="flights1" href="<?php echo base_url('/index.php/home/index/#flights-tab')?>" onclick="settab('#flights-tab');"><span class=""><img src="<?php echo base_url('assets/img/Flights.png');?>" alt=""/>&nbsp;&nbsp;</span>Flights</a></li>

            <li><a id="hotels1" href="<?php echo base_url('/index.php/home/index/#hotels-tab')?>" onclick="settab('#hotels-tab');"><span><img src="<?php echo base_url('assets/img/Hotels.png');?>" alt=""/>&nbsp;&nbsp;</span>Hotels</a></li>

          <!--  <li><a id="flight-and-hotel1" href="<?php echo base_url('/index.php/home/index/#flight-and-hotel-tab')?>" onclick="settab('#flight-and-hotel-tab');"><span><img src="<?php echo base_url('assets/img/Hotels-f.png');?>" alt=""/>&nbsp;&nbsp;</span>Flight + Hotel</a></li>-->
            <li><a id="Holidays1" href="<?php echo base_url('/index.php/home/index/#Holidays')?>" onclick="settab('#Holidays');"><span><img src="<?php echo base_url('assets/img/Holidays.png');?>" alt=""/>&nbsp;&nbsp;</span>Holidays </a></li>
 			<li><a id="Buses1" href="<?php echo base_url('/index.php/home/index/#Buses')?>" onclick="settab('#Buses');" ><span><img src="<?php echo base_url('assets/img/Buses.png');?>" alt=""/>&nbsp;&nbsp;</span>Buses</a></li>
            <!--<li><a id="Cab1" href="<?php echo base_url('/index.php/home/index/#Cab')?>" onclick="settab('#Cab');"><span><img src="<?php echo base_url('assets/img/Cab.png');?>" alt=""/>&nbsp;&nbsp;</span>Cab</a></li>-->
            

           <?php /*?> 

            <li><a href="#"><span><img src="<?php echo base_url('assets/img/Fair-Packages.png');?>" alt=""/>&nbsp;&nbsp;</span>Trade Fair Packages</a></li>

            <li><a href="#"><span><img src="<?php echo base_url('assets/img/Trains.png');?>" alt=""/>&nbsp;&nbsp;</span>Trains</a></li>

          <li><a href="#"><span><img src="<?php echo base_url('assets/img/Cruise.png');?>" alt=""/>&nbsp;&nbsp;</span>Cruise</a></li>

          <li><a href="#"><span><img src="<?php echo base_url('assets/img/Offers.png');?>" alt=""/>&nbsp;&nbsp;</span>Offers</a></li><?php */?>

            

        </ul>

    </div>

            

            

            </div>

            </div>

          </div>

        <div class="clearfix"></div>

        </div>

    	<div class="col-md-4 col-sm-12 pull-right My-Account-header TopRightText2">
      
       	 <!-- <h3 class=" s-title2" style="margin-bottom:0;" > <strong>+91-  9208232323   ,+91-9235181818</strong></h3> -->
            

            <div class="dropdown">



        <!-- trigger button -->

        <div class="Btn-Explore2"> <?php echo ($this->session->userdata('uid')!='' AND $this->session->userdata('type')=='traveler')?strtolower($this->session->userdata('email')):'My Account' ?> </div><!--Btn-Explore-->

          
        <!-- dropdown menu -->

        <ul class="dropdown-menu My-Account">
        	<?php if($this->session->userdata('uid')!='' AND $this->session->userdata('type')=='traveler'){?>
            <li><a href="<?php echo base_url('/index.php/user/index')?>" class="M-A-Login">My Booking</a></li>
             <li><a href="<?php echo base_url('/index.php/user/profile_data')?>" class="M-A-Login">My Profile</a></li>
             <li><a href="<?php echo base_url('/index.php/user/failed_booking')?>" class="M-A-Login">Failed Booking</a></li>
             <!-- <li><a href="#<?php //echo base_url('/index.php/user/failed_booking')?>" class="M-A-Login">D.M.R</a></li> -->
            <li><a href="<?php echo base_url('/index.php/home/logout')?>" class="M-A-Login">Logout</a></li>
            <?php }else{?>
            <li>

            

            <a href="#travelo-login" class="soap-popupbox  M-A-Login">LOGIN</a></li>

			

			

          <li> <a href="#travelo-register " class="soap-popupbox" style=" background-color: #00a3d1 !important;
    border-bottom: 1px solid #fff;
    color: #fff !important;
    float: left !important;
    text-align: center !important;">REGISTER</a>
           
		  <li><a class="M-A-Login"  href="<?php echo base_url('/index.php/home/SignUpPage')?>">My Bookings</a></li>
          <li><a class="M-A-Login"  href="<?php echo base_url('/index.php/home/View_PNR')?>">View PNR</a></li>  
		  <li><a class="M-A-Login"  href="<?php echo base_url('/index.php/home/SignUpPage')?>">My Cancellations</a></li>  
           

            <?php } ?>

        </ul>
		
    </div>
<!-- <?php //if($this->session->userdata('uid')!='' AND $this->session->userdata('type')=='traveler'){
            //$amount = $this->user_model->user_wallet_amout($this->session->userdata('uid'));  ?>
          <div ><a href="<?php// echo base_url('/index.php/home/DMR_Url')?>"><button class="btn" style="background-color: #fdb714">DMR Balance <?php// echo $amount['0']['BALANCE'] ?></button></a></div>

          <?php //} ?> -->
    

        </div>

    	<div class="clearfix"></div>

    

    </div><!--container-->

    

    </div><!--Top-Header-->

  	

    

    

    

  </header>

  

  

  <div id="travelo-login" class="travelo-login-box travelo-box ">

      
	<form class="travelo-box2-login" id="login_data"  action="<?php echo base_url('index.php/home/login');?>" method="post">

        <div class="form-group">

		<label>Email Id</label>

          <input type="text" name="email" id="email" class="input-text full-width" required placeholder="email address">

	   </div>

        <div class="form-group">

		  <label>Password</label>

          <input type="password"  name="password" id="password" class="input-text full-width" required placeholder="password">

        </div>

        <div class="form-group"> 

		  

          <div class="checkbox checkbox-inline">

            <label>

              <input type="checkbox">

              Remember me </label>

              

          </div><br/><br/>

		   <div class="block">

                   <input  type="submit" name="submit" class="btn btn-info" style="width:104px; float:right;" value="Login" >

                   

		  </div>
      <label id="forget"style="margin-left: 197px; margin-top:59px; color:red;">Forget Password</label>
        </div>

      </form>

    </div>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#forget').click(function(){
       $('#forgetModel').modal('show');
    });


    $("#submit").click(function(){

      var email = $('#email').val();
      if(!email==''){
        $.ajax({
          url:"<?php echo base_url('index.php/home/forget'); ?>",
          type:"post",
          data:{email:email},
          success:function(data){
             obj = data;
          $('#alert').text(obj);
            
          },
          error:function(data){

          }
        });
      }else{
        $('#alert').text("Please Fill email Address");
      }
    });

  });
</script>

<div id="forgetModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>


        <label>E-Mail:</label><input type="email" name="email" id="email"/>
        <button id="submit">Submit</button>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- ----------registration form start------------- -->
	<div id="travelo-register" class="travelo-login-box travelo-box  ">
    <div id="form_error"></div>
      <form class="travelo-box2-register" action="javascript:void(0)" method="Post" id="rform">
      
        <div class="form-group">
            <div class="col-sm-6">
			<p>Full name</p>
			<input type="text" class="input-text full-width" placeholder="Full name" name="txtFullName" id="fullName" required>
            </div>
              <input type="hidden" name="btnclass" id="btnclass_2" >

            <div id="email_error" style="color: red;"></div>
			<div class="col-sm-6">
			<p>Email address</p>
			<input type="email"  required class="input-text full-width" placeholder="email address" name="txtEmail" id="txtEmail">
            </div>
        </div>

		<div style=" height:15px;" ></div>

		<div class="form-group">
			<div class="col-sm-6">
			<p>Contact</p>
			<input type="text" class="input-text full-width" placeholder="Contact" name="numContact" pattern="[789][0-9]{9}" id="numPhone" required>
            </div>
			<div class="col-sm-6">
			<p>Password</p>
			<input type="password" class="input-text full-width" placeholder="Password" name="txtpassword" id="txtPassword" required>
            </div>
        </div>

		<div class="form-group">
			<div class="col-xs-6">
			<p>Country</p>
            <?php $country = $this->region_model->getcountry(); ?>
            
			<select class="input-text full-width"  name="country" id="getCountry" required>
            <option value="">-Select Country-</option>
            <?php foreach($country as $value){ ?>
				<option value='<?= $value['id'] ?>'><?= $value['country']?></option>
				<?php }?>
			</select>
			</div>
			<div class="col-xs-6">
			<p>State</p>
 
			<select class="input-text full-width"  name="state" id="getState" required>
            <option value="">-Select State-</option> 
    
			</select>			
        </div>

		</div>

		<div class="form-group">
			<div class="col-xs-6">
			<p>City</p>
             
			<select class="input-text full-width"  name="city" id="getCity" required>
			<option value="">-Select City-</option>
            </select>
			</div>

			<div class="col-xs-6">
			<p>Zip/Pin code</p>
			<input type="text" class="input-text full-width" placeholder="Enter Pin Code" name="numPincode" pattern="[0-9]{6}" id="numPincode"required>
			</div>
        </div>
        
		<div style=" height:15px;" ></div>

	    <div class="form-group">

	      <div class="col-sm-12">

		  <label>
              <input type="checkbox" name="checkBox" id="checkbox" required>
               I would like to be kept informed of special promotions and offers by KP Holidays.
          </label>
          </div>

	   </div>
		<div style=" height:15px;" ></div>
        <div class="form-group">
		   <div class="block1" style="margin-left:25px;">
         <input type="submit" name="submit" id="hsubmit" style="display:none;">
           <input type="button" class="btn btn-info"  value="Register" style="width:204px;margin-left:25px;" id="submit" name="submit">
		  </div>
      <div id="waitMessage" style="color: red;"></div>
        </div>
      </form>
    </div>
    
<script lang="JavaScript" type="text/javascript">
$(document).ready(function() {
    	//get state data
    	$('#getCountry').change(function(){
       var country = $('#getCountry').val();
        $.ajax({
        type:"get",
        url:"<?php echo base_url('index.php/Home/getState/')?>/"+country,
        success: function(dataJson){
          data = JSON.parse(dataJson)
          var optionss = '<option value="">-Select State-</option>';
          $(data).each(function(index, element){                       
          optionss=optionss+'<option value="'+element.id+'">'+element.state+'</option>'
          });
          $('#getState').html(optionss);
          },
        error:function(data){
          }
        });
      });
    		//get city data
        $('#getState').change(function(){
          var state1 = $('#getState').val();
       $.ajax({
         type:"get",
         url:"<?php echo base_url('index.php/Home/getcity')?>/"+state1,
        success: function(dataJson){
          data = JSON.parse(dataJson)
            var optionss = '<option value="">-Select City-</option>';
           $(data).each(function(index, element) {
                 optionss = optionss+'<option value="'+element.id+'">'+element.city+'</option>'
                });
          $('#getCity').html(optionss);
           },
         error: function(data){
           }
         });
        });


//form sending data
          $("#submit").click(function(){
            $("#waitMessage").text('PLEASE WAIT');
            if(!$('#rform')[0].checkValidity()){
                $('#hsubmit').click();
                return false;
            }
            var name = $("#fullName").val();
            var email = $("#txtEmail").val();
            var Phone = $("#numPhone").val();
            var password = $("#txtPassword").val();
            var country = $("#getCountry").val();
            var state = $("#getState").val();
            var city = $("#getCity").val();
            var pincode = $("#numPincode").val();

               $.ajax({
               type:"post",
                    url:"<?php echo base_url('index.php/home/registerNewUser');?>",      
                    data :{txtFullName:name,txtEmail:email,numContact:Phone,txtpassword:password,country:country,state:state,city:city,numPincode:pincode},
                 success:function(data){ 
                 $("#waitMessage").text('');    
                var obj = JSON.parse(data);

                  if(obj.error){
                  console.log(obj.msg);
                  alert(obj.msg);
                  
                  return false;
                  }else{
                    alert(obj.msg);
                    window.location="<?php echo base_url('index.php/user/'); ?>"
                  }
                }
             });
          });      
          
        

 });

</script>

	
<!-- ----------registration form end ------------- -->
	
<script>
   $(document).ready(function(){
      $("#varify_login").click(function(){
	  $.ajax

		({

		  type:"post",

          url:"<?php echo base_url('index.php/home/login');?>",

          data:$("#login_data").serialize(),

           error:function(data) {                

            alert(data);

			},
		  success: function(data)
		  {
			  alert('sdfsdfs');
		  }
    	});
	  });
   });
  </script>
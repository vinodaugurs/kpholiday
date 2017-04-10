<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KP Holidays</title>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>

.Reservation-Wrp{width:1000px; margin:0 auto;}

.Reservation-Top-Part{ 
    text-align:center; 
    font-size:17px; 
    color:#ce2900; 
    font-weight:bold; 
    font-family: 'Raleway', sans-serif;}

.Reservation-Center-Part{ 
    width:80%; 
    margin:0 auto; 
    border:1px solid #66afe9; border-radius:4px; color:#333;}
    
.Reservation-Center-Header{
    background-color:#66afe9; 
    color:#fff; 
    padding:15px; 
    font-size:20px;
    
}

.Reservation-text2{ 
    text-align:center; 
    margin-top:10px; 
    margin-bottom:20px;
    }

.Reservation-text2 p{ margin-bottom:10px;}

.clear{ 
    float:none; 
    clear:both;}
    
.Reservation-two-part{ width:95%; margin:0 auto; padding-bottom:30px;}
.Reservation-one1{ width:50%; float:left;   
}

.DetailsofPassengers{}
.DetailsofPassengers h3{ color:#464646;}

.DetailsofPassengers-text{ font-size:12px;}

.Details-textbox2{}
.Details-textbox2left{ width:300px; float:left; margin-bottom:10px;}
.Details-textbox2right{width:300px; float:left;  margin-bottom:10px;}

.Please-Text-Box{
    color:#ce2900; 
    font-weight:bold; 
    font-family: 'Raleway', sans-serif;}
    
    
.Printbtnbox{ width:350px; margin:30px auto;}
    
    
.Print-btn{ width:100px; float:left; background-color:#66afe9; padding:10px; margin-right:15px; text-align:center;}

.Print-btn a{  color:#fff; text-decoration:none;}

.Print-btn2{ width:180px; float:left; background-color:#66afe9; padding:10px; text-align:center;}

.Print-btn2 a{  color:#fff; text-decoration:none;}

</style>



</head>

<body>
<?php //print_r($user_name); ?>
<div id="print-detail">
<div class="Reservation-Wrp" style="width:1000px; margin:0 auto;">
    <div class="Reservation-Top-Part" style="   text-align:center;  font-size:17px; color:#ce2900; font-weight:bold; font-family: 'Raleway', sans-serif;">
    <!-- <p>Congratulations. You have successfully Signup.Please Find Your Login Credentials </p> -->
    <p>Thank you for using kpholidays.com services.</p>
    
    </div><!--Reservation-Top-Part-->

    <div class="Reservation-Center-Part" style="    width:80%;  margin:0 auto;  border:1px solid #66afe9; border-radius:4px; color:#333;">
    <div class="Reservation-Center-Header" style="background-color:#D9D9D9;  color:#333;  padding:10px 15px 15px 15px;  font-size:20px; margin-bottom:60px;">
            <div class="Ticket-Text3" style="text-align:center; color:#1e92c8;">
            <strong>Ticket Reservation</strong>
            </div>
            <div class="Ticket-Text1" style="width:40%; float:left;">
                <div> 
                    <a href="http://kpholidays.com/" title="Travelo - home"> 
                    <?php 
					//$url = "http://kpholidays.com/assets/img/Final-logo.png";
					//$image_binary= fread(fopen($url, "r"), filesize($url));
								
								?>
                                <?php //$encoded_image =  base64_encode($image_binary);
                    
                    //echo $encoded_image;?>
                    
                    <img src="http://kpholidays.com/assets/img/Final-logo.png" alt=""/>
                    </a>
                </div>
            </div><!--Ticket-Text-->

            <div class="Ticket-Text2" style="width:40%; float:right; text-align:right;">
                <u>kpholidays.com e-Ticketing Service</u>
                <div><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818</div>
            
            
            </div>
            <div style="clear:both; float:none;"></div>

        </div>
          
        
        <div class="Reservation-two-part" style="width:95%; margin:0 auto; padding-bottom:30px;">
        
        <div style="clear:both !important; float:none !important;"></div>
        <div class="Reservation-one1--4" style="paddings:50px; background-color:#ddd; margin-top:100px;" >


                              

	<?php foreach($msgData as $key=>$value){?>
<div style="padding-left:30px;"><strong><?php echo $key." :  "; ?></strong><?php echo $value; ?></div>
<?php }?>





        </div><!--Reservation-one1-->
        <!--Reservation-one1-->
        
        <div style="clear:both; float:none;"></div>
        
        <div style="display: block; margin-top:80px;"><strong>Contact us on:</strong> +91- 9208232323 /+91-9235181818  </div>
        
        
        
        </div><!--Reservation-two-part-->
        
        
    
    
    
    </div><!--Reservation-Center-Part-->








</div><!--Reservation-Wrp-->

</div>
</body>
</html>
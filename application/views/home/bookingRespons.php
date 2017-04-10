<?php echo "<h1>Booking Resopns and Cancle this </h1>"; 



  $goingDetail= $this->session->userdata('goingDetail');

/*

   $Going=json_decode($goingDetail,true);

   echo "<pre>";

   print_r($Going);*/

   

  $returningDetail= $this->session->userdata('bothDetail');



   $Retuning=json_decode($returningDetail,true);

   echo "<pre>";
  print_r($goingDetail);
   print_r($Retuning);

   

    

  ?>

  <html>

  <head>

  </head>

  <body>

  <a href="<?php echo base_url('index.php/flight/CancleBookedTC');?>">

  PARTIAL_Cancle1</a> 

  

  <a href="<?php echo base_url('index.php/flight/FCancleBookedTC');?>">

  Full_Cancle</a> 

  </body>

  </html>

  
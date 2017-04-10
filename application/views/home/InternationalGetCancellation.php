<?php $pcancle=$this->session->userdata('PartialCancellation');

     print_r($pcancle); 
?>
<br/>
<h1>For   Completed Click here </h1><br/>
<a href="<?php echo base_url('index.php/flight/InternationalPCancleBookedTC');?>">PartialCancellation2</a>

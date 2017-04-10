<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8" />
    <title></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
   
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
<link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />
 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>


	<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


 <?php require_once 'nav.php'; ?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-primary">
                        <div class="panel-heading">
                        Edit Cab
                         
                        </div>
                      
                       
<?php
$htdata = $this->associate_model->getcabbyid($hid);
?>
      
       <div id="wrap">



 <?php require_once 'nav.php'; ?>

 <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                         Edit CAB
                        </div>
                   
                 <div class="panel-body">
                     <form action="<?php echo base_url()."index.php/dashboard/update_cab?id=".$hid;?>" method="post" enctype="multipart/form-data">
                     
                     <button class="btn btn-primary" disabled="disabled">Cab Name</button>
                     <p></p>
                     <input class="form-control" type="text" name="cab_name" value="<?php echo $htdata[0]['cab'];    ?>">
                     <p><?php echo form_error('cab_name'); ?></p>
                
                    
                       
        
        
       <div class="form-group">
                        <label class="control-label ">Cab Image</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url()."upload/cabs/".$htdata[0]['image'];  ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="cab_image" value="<?php  echo base_url()."upload/cabs/".$htdata[0]['image'];  ?>" /></span>
									<input type="hidden" name="img" value="<?php  echo base_url()."upload/cabs/".$htdata[0]['image'];  ?>"/>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('cab_image'); ?>
                    </div>  
        
        
                     <p></p>
        
        
                     <button class="btn btn-primary" disabled="disabled">Cab details</button>
                     <p></p>
                     <textarea name="cab_details" class="form-control" rows="5"  ><?php echo $htdata[0]['details'];  ?></textarea>
                     <p><?php echo form_error('cab_details'); ?></p>
                     

<div class="col-md-12">

 <div class="row">
 
  <div class="col-sm-4">
      
       <div class="control-group">
    <label for="title" class="control-label">Price <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="price" maxlength="255" value="<?php echo $htdata[0]['price']; ?>"  />
		 <?php echo form_error('price'); ?>
	</div>
</div>  
  </div>
  <div class="col-sm-4">
       <div class="control-group">
    <label for="title" class="control-label">Rating<span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="rating"placeholder="enter number" maxlength="255" value="<?php  echo $htdata[0]['rating']; ?>"  />
		 <?php echo form_error('rating'); ?>
	</div>
</div>   
 
  <div class="control-group" style="float: right; margin-top: -50px; margin-right: -260px;">
    <label for="title" class="control-label">offer <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text"  class="form-control" name="offer" maxlength="255" value="<?php echo $htdata[0]['offer']; ?>"  />
		 <?php echo form_error('offer'); ?>
	</div>
</div>            
                    
 

 </div>  <br /> <br> <br /> <br><br /> <br><br /> <br>
   <button class="btn btn-primary" disabled="disabled" style="float:left;">Traveler Feedback</button>
                     <p></p>
                     <textarea name="trv_feedback" class="form-control" rows="5" ><?php echo $htdata[0]['trv_feedback']; ?></textarea>
                     <p><?php echo form_error('trv_feedback'); ?></p>                   
 </div>
</div>   

 <div class="control-group">
    <label for="title" class="control-label">Local process<span class="required">*</span></label><span></span>
	<div class='controls' id="repeatDiv">
     <?php if(!empty($htdata[0]['local'])){
			$local=explode('%#%',$htdata[0]['local']);
			$a=count($local);
			for($i=0;$i<$a;$i++){
            echo "<input id='local' type='text' class='form-control' name='local[]' maxlength='500'value='".$local[$i]."'  />";
		    echo "<br/>";
	 }}?>
	</div>
   
</div>

<div class="control-group">
    <label for="title" class="control-label">Out Sattion<span class="required">*</span></label>
	<div class='controls' id="repeatDiv1">
         <?php if(!empty($htdata[0]['out_station'])){
			$out_station=explode('%#%',$htdata[0]['out_station']);
			$a=count($out_station);
			for($i=0;$i<$a;$i++){
            echo "<input id='local' type='text' class='form-control' name='out_station[]' maxlength='500'value='".$out_station[$i]."'  />";
		    echo "<br/>";
	 }}?> 

		 
	</div>
   
</div>

<div class="control-group">
    <label for="title" class="control-label">Transfer<span class="required">*</span></label>
	<div class='controls' id="repeatDiv2">
           <?php if(!empty($htdata[0]['transfer'])){
			$transfer=explode('%#%',$htdata[0]['transfer']);
			$a=count($transfer);
			for($i=0;$i<$a;$i++){
            echo "<input id='local' type='text' class='form-control' name='transfer[]' maxlength='500'value='".$transfer[$i]."'  />";
		    echo "<br/>";
	 }}?> 
			
		
	</div>

</div>
  


                                
                  <p></p>
                      <input type="submit" value="Update" class="btn btn-success"/>
                     </form>
        </div>
</div>
                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>
      </div>

                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>


 
    
  <div id="footer">
   
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    
     <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
     <script src="<?php echo base_url();  ?>assets/js/bootstrap-fileupload.js"></script> 
     
    <script>  
       $( document ).ready(function() {
   $("#showc").hide();
   $("#shows").hide('slow','swing');
        $("#showci").hide('slow','swing');
   $("#checkbox").change(function()
           
        {      
         if ($("#checkbox").is(':checked'))       
         { 
            $("#showc").show('slow','swing');  
            $("#checkbox").val('1'); 
            $("#shows").show('slow','swing');
        $("#showci").show('slow','swing');
         }
         else
         {
              $("#showc").hide('slow','swing');
             $("#shows").hide('slow','swing');
        $("#showci").hide('slow','swing');
         }
                
                
                
    } );
}); 
        
   </script>     
<script>
function showState(sel) {
	var country_id = sel.options[sel.selectedIndex].value; 
        //alert(country_id);
	$("#output1").html( "" );
	$("#output2").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "<?php echo base_url();?>index.php/dashboard/fetchstate",
			data: "country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#output1').html('<img src="<?php echo  base_url();?>assets/img/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#output1").html( html );
			}
		});
	} 
}

function showCity(sel) {
	var state_id = sel.options[sel.selectedIndex].value;  
	if (state_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "<?php echo base_url();?>index.php/dashboard/fetchcity",
			data: "state_id="+state_id,
			cache: false,
			beforeSend: function () { 
				$('#output2').html('<img src="<?php echo  base_url();?>assets/img/loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#output2").html( html );
			}
		});
	} else {
		$("#output2").html( "" );
	}
}
</script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
   
               
	
        

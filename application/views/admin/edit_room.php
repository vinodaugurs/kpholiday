<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
<meta charset="UTF-8" />
<title>Admin Dashboard</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
<link href="<?php echo base_url();  ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">	
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>	
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">
function showimagepreview(input) {
if (input.files && input.files[0]) {
var filerdr = new FileReader();
filerdr.onload = function(e) {
$('#imgprvw').attr('src', e.target.result);
}
filerdr.readAsDataURL(input.files[0]);
}
}
</script>
  
  </head> <body class="padTop53 " >   

  <!-- MAIN WRAPPER -->    <div id="wrap">   

  <?php require_once 'nav.php'; ?>
         <!-- HEADER SECTION -->
        
        <!--PAGE CONTENT -->
        <div id="content" style="padding-top:10px;">
           <div class="inner" style="min-height:1200px;">
           <div class="row">
           <div class="col-lg-12">

		<div class="panel panel-primary">
                        <div class="panel-heading">
                    Edit Room
                        </div>
                        <div class="panel-body">
                                                 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open_multipart('dashboard/update_room', $attributes); ?>

                                 



<div class="control-group">
    <label for="pack_name" class="control-label"><button class="btn btn-primary btn-xs" disabled="disabled">Room Type <span class="required">*</span></button></label>
    <p></p>
	<div class='controls'>
       <input id="room_type"  class="form-control" placeholder="Enter text" type="text" name="room_type" maxlength="255" value="<?php echo $detail[0]['room_type']; ?>"  />
		
	</div>
</div>

<div class="control-group">
    <label for="pack_name" class="control-label"><button class="btn btn-primary btn-xs" disabled="disabled">Room price <span class="required">*</span></button></label>
    <p></p>
	<div class='controls'>
       <input id="room_price"  class="form-control" placeholder="Enter text" type="text" name="room_price" maxlength="255" value="<?php  echo $detail[0]['room_price']; ?>"  />

	</div>
</div>


<div class="control-group">
    <label for="pack_name" class="control-label"><button class="btn btn-primary btn-xs" disabled="disabled">Review  <span class="required">*</span></button></label>
    <p></p>
	<div class='controls'>
	  <textarea name="Review" rows="5" cols="80" class="form-control">
	   <?php echo $detail[0]['Review']; ?>
	  </textarea>
	
	
</div>
</div>

<div class="control-group">
    <label for="details" class="control-label"><button class="btn btn-primary btn-xs" disabled="disabled">Room facility <span class="required">*</span></button></label>
<p></p>
    <div class='controls'>
	 <textarea name="room_facility" rows="5" cols="80" class="form-control">
	   <?php echo $detail[0]['room_facility']; ?>
	  </textarea>
	
</div>
</div>

   <div class="form-group">
       <label><button class="btn btn-danger btn-xs" disabled="disabled">TripAdviser Rating</button></label>
                                             <select class="form-control" name="trav_rating">
                                                  
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                               
                                             </select>
                                        </div>
   

   

<div class="form-group">
      <label class="control-label "><button class="btn btn-primary btn-xs" disabled="disabled">Room  Image</button></label>
                       
      <br/>
<div>
    <input type="file" name="photo" id="filUpload" onchange="showimagepreview(this)" />
</div>
    <img id="imgprvw" alt="Previous image or new Image "   width="200" height="200" />


 </div>



<input type="hidden" name="room_id" value="<?php echo  $detail[0]['room_id']; ?>"/>
<input type="hidden" name="hotel_id" value="<?php echo  $detail[0]['hotel_id']; ?>"/>


  
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit','class="btn btn-success"'); ?>
	</div>
	<div class='controls'>
        <a href="<?php echo site_url('dashboard/delete_room/'.$detail[0]['room_id']);?>" class="btn btn-success">Delete</a>
	</div>
	
	
</div>
<?php echo form_close(); ?></fieldset>    
 
                        </div></div>

 
                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
       
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    
     <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    
    
    
      
</body>
    <!-- END BODY-->
    
</html>


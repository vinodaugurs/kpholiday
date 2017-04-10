<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8" />
    <title></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="Description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />
    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php  echo base_url(); ?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url(); ?>uploadify/uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>


	<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
       
        <!-- END HEADER SECTION -->

 <?php require_once 'nav.php'; ?>

        <!-- MENU SECTION -->
    
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
 <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                         Add Hotel
                        </div>
                   
                 <div class="panel-body">
                     <form action="<?php echo base_url();?>index.php/dashboard/add_hotel" method="post" enctype="multipart/form-data">
                     
                     <button class="btn btn-primary" disabled="disabled">Hotel Name</button>
                     <p></p>
                     <input class="form-control" type="text" name="hotel_name" value="">
                     <p><?php echo form_error('hotel_name'); ?></p>
                
                    
                       
        
        <div class="row">
            <div class="col-md-3">
                  <button class="btn btn-primary" disabled="disabled">Main Image title</button>
                  <p></p>
                    <input id="desti_name" type="text" class="form-control" name="main_image_title" maxlength="255" value="<?php echo set_value('main_image_title'); ?>"  />
       
            </div>
        </div>
        <p><?php echo form_error('main_image_title'); ?></p>
       <div class="form-group">
                        <label class="control-label ">Main Image</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="main_image" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('main_image'); ?>
                    </div>  
        
        
                     <p></p>
        
        
                     <button class="btn btn-primary" disabled="disabled">Description</button>
                     <p></p>
                     <textarea name="description" class="form-control" rows="5" ></textarea>
                     <p><?php echo form_error('description'); ?></p>
                     
                     
<!--                      <div class="control-group">
     <button class="btn btn-primary" disabled="disabled">Tour Name</button>
                       <p></p>
    
<div class="controls"><?php 
//$this->load->model('tour_model');
//$data = $this->tour_model->getalltour();
////$i = 1;
//$options[0]='Please Select';
//foreach($data as $tn)
//{
//    $options[$tn['id']]= $tn['tour_name']; 
//  
//    //$i++;
//}


?>
 
<?php //echo form_dropdown('tour_name', $options,'class="form-control"')?>
    
		<?php //echo form_error('tour_name'); ?>
	</div>
</div> -->


<div class="col-md-12">

 <div class="row">
 
  <div class="col-sm-4">
      
       <div class="control-group">
    <label for="title" class="control-label">Price <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="price" maxlength="255" value="<?php echo set_value('price'); ?>"  />
		 <?php echo form_error('price'); ?>
	</div>
</div> 
      
  <div class="form-group">
                        <label class="control-label ">Image 1</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span>
                                    <span class="fileupload-exists">Change</span><input type="file" name="image_1" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_1'); ?>
                    </div>  
  </div>
  <div class="col-sm-4">
       <div class="control-group">
    <label for="title" class="control-label">Rating<span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="rating" maxlength="255" value="<?php echo set_value('rating'); ?>"  />
		 <?php echo form_error('rating'); ?>
	</div>
</div> 
  <div class="form-group">
                        <label class="control-label ">Image 2</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_2" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_2'); ?>
                    </div>  
  </div>
  <div class="col-sm-4">
       <div class="control-group">
    <label for="title" class="control-label">title <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name"  type="text"readonly class="form-control" name="image_3_title" maxlength="255" value="<?php echo set_value('image_3_title'); ?>"  />
		 <?php echo form_error('image_3_title'); ?>
	</div>
</div> 
  <div class="form-group">
                        <label class="control-label ">Image 3</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_3" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_3'); ?>
                    </div>  
  </div>
 </div>
</div>   




 <div class="col-md-12">
 <div class="row">
  <div class="col-sm-4">
      
     
      
  <div class="form-group">
                        <label class="control-label ">Image 4</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_4" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_4'); ?>
                    </div>  
  </div>
  <div class="col-sm-4">
  
  <div class="form-group">
                        <label class="control-label ">Image 5</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_5" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_5'); ?>
                    </div>  
  </div>
  <div class="col-sm-4">
     
  <div class="form-group">
                        <label class="control-label ">Image 6</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_6" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_6'); ?>
                    </div>  
  </div>
 </div>
</div>  


 <div class="control-group">
    <label for="country" class="control-label">country <span class="required">*</span>
</label>
    
<div class="controls"><?php 
$this->load->model('region_model');
$data = $this->region_model->getcountry();
$i = 1;
$options[0]='Please Select';
foreach($data as $country)
{
    $options[$i]= $country['country']; 
   
    $i++;
}


//$options = array(''  => 'Please Select',$country['country']); 
//print_r($options);
?>
 
<?php echo form_dropdown('country', $options, $this->input->post('country') , 'onChange="showState(this);" class="form-control"')?>
    
    
		<?php echo form_error('country'); ?>
	</div>
</div>                                           
                                         <div >
                                             <label for='state' class='control-label'>state <span class='required'>*</span>
</label> <select name='state' onchange='showCity(this);' class='form-control'id="output1" >
	<option value=''>Please Select</option>
</select>
                                         </div>
 <?php echo form_error('state'); ?>
<!-- This will hold city dropdown -->
<div >
<label for='city' class='control-label'>city <span class='required'>*</span>
</label> <select name='city'  class='form-control'id="output2" >
	<option value=''>Please Select</option>
</select>
                                         </div>
<?php echo form_error('city'); ?>                                 
                                  











                     <p></p>
                     <button class="btn btn-success">Add</button>
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

<script>
function showState(sel) {
	var country_id = sel.options[sel.selectedIndex].value; 
        //alert(country_id);
	$("#output1").html( "" );
	$("#output2").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetchstate",
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
			url: "fetchcity",
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
 
    
  <div id="footer">
        <p>&copy;kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script src="<?php echo base_url();  ?>assets/plugins/jasny/js/bootstrap-fileupload.js"></script> 
     <script>
     $(document).ready(function () {
             $('#dataTables-example').dataTable();
     });
    </script>
 <script type="text/javascript" src="<?php echo base_url();?>chat/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>chat/js/chat.js"></script>

    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>
   
               
	
        

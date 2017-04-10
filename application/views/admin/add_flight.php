<!DOCTYPE html>

<html lang="en">

<!--<![endif]-->

<!-- BEGIN HEAD -->

<head>
<meta charset="UTF-8" />
<title></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!--[if IE]>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <![endif]-->

<!-- GLOBAL STYLES -->

<!-- GLOBAL STYLES -->
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/validationEngine.jquery.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/main.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/theme.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/MoneAdmin.css" />
<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/plugins/Font-Awesome/css/font-awesome.css" />

<!--END GLOBAL STYLES -->

<!-- PAGE LEVEL STYLES -->

<link rel="stylesheet" href="<?php  echo base_url();  ?>assets/css/bootstrap-fileupload.min.css" />

<!-- END PAGE LEVEL  STYLES -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<!--<script src="<?php echo base_url();?>assets/js/jquery-1.3.2.min.js"></script>-->

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style>
body {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 13px;
}
div#container {
	height: 300px;
	position: relative;
	width: 100%;
}
</style>

<!-- END HEAD -->

</head>

<!-- BEGIN BODY -->
<body class="padTop53 " >
<!-- MAIN WRAPPER -->

<div id="wrap">
  <?php require_once 'nav.php'; ?>
  <div id="content" style="width:81% ;padding-top:10px;">
    <div class="row">
      <div class="col-sm-8" style=" margin:20px auto 0 auto; float:none;">
        <div class="panel panel-primary">
          <div class="panel-heading"> ADD Flight Image </div>
          <div class="panel-body">
            <div class=" col-sm-8">
            <div style="color:red;"><?php echo validation_errors(); ?></div>
              <form method="post" action="<?php echo base_url('index.php/dashboard/flight_add')?>" enctype="multipart/form-data">
                <div class="form-group">
                  <div class=" col-sm-6">
                    <input type="text" name="flight_name" class="form-control" placeholder="Enter Flight Name">
                  </div>
                  <div class=" col-sm-6">
                    <input type="text" name="flight_code" class="form-control" placeholder="Enter Flight code">
                  </div>
                  <div class=" clearfix"></div>
                </div>
                <div class="form-group">
                  <div class=" col-sm-6">
                    <input type="file" name="flight_image" class="form-control9" placeholder="put image">
                  </div>
                </div>
                <div class=" clearfix"></div><br/>
                   <div class="form-group">
                   <div class=" col-sm-6">
                <input type="submit" value="Send" class="btn btn-info" name="submit"></div>
                <div class=" clearfix"></div><br/>
                </div>
              </form>
            </div>
          </div>
        </div>
        	
        
      </div>
    </div>
    <div class="container1">
    <div class="row1">
   <table class=" table-condensed table table-striped">
    <tr><td>Img</td><td>Flight Name</td><td>Action</td></tr>
    <?php 
		$data = $this->region_model->get_data_table('flight_image');
	
	foreach($data as $value){
	?>
    
    <tr><td> <img src="<?php echo base_url()."assets/ico/".$value['fimage'];?>" width="50px" height="50px"></td><td><?php echo $value['fligt_name'];?></td><td><button class="btn btn-primary" onClick="delImg(<?php echo $value['id'];?>);" value="<?php echo $value['id'];?>">DELETE</button></td></tr>
    
    
    <?php }?>
    	
    </table>
    </div>
    </div>

    
  </div>
  
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine-en.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validationInit.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script> 

<script  type="text/javascript" src="<?php echo base_url();  ?>assets/js/bootstrap.min.js"></script> 

<!--<script src="<?php // echo base_url();  ?>assets/plugins/jquery-2.0.3.min.js"></script>--> 

<script src="<?php echo base_url();  ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
<script src="<?php echo base_url();  ?>assets/js/bootstrap-fileupload.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

	function delImg(id)

 {

	 url="<?php echo base_url();?>";

	 	  var form_data=
        {
          id:id
        };

			   console.log(id);

	 if(confirm("Are you shure want to delete image"))
	 {
		$.ajax({
            type: 'POST',
            url: url+'index.php/dashboard/delImg',
            data: form_data,
            success: function(data1) 
            {   
			  window.location.reload();
            }
        }); 
	 }
 }
 
</script>


</body>

<!-- END BODY -->

</html>

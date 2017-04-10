<!DOCTYPE HTML>
<html>
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


 <?php require_once 'nav.php'; ?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-primary">
                        <div class="panel-heading">
                        Edit Hotel
                         
                        </div>
                      
                       
<?php
$htdata = $this->associate_model->gethotelbyid($hid);
?>
                 <div class="panel-body">
                     <form action="<?php echo base_url()."index.php/dashboard/update_hotel?id=".$hid;?>" method="post" enctype="multipart/form-data">
                     
                     <button class="btn btn-primary" disabled="disabled">Hotel Name</button>
                     <p></p>
                     <input class="form-control" type="text" name="hotel_name" value="<?php echo $htdata[0]['hotel_name'];    ?>">
        <p><?php echo form_error('hotel_name'); ?></p>
        
        <div class="row">
            <div class="col-md-3">
                  <button class="btn btn-primary" disabled="disabled">Main Image title</button>
                  <p></p>
                    <input id="desti_name" type="text" class="form-control" name="main_image_title" maxlength="255" value="<?php echo $htdata[0]['main_image_title']; ?>"  />
       
            </div>
        </div>
        <p><?php echo form_error('main_image_title'); ?></p>
       <div class="form-group">
                        <label class="control-label ">Main Image</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url()."upload/hotel/".$htdata[0]['main_image'];  ?>" alt="" /></div>
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
                     <textarea name="description" class="form-control" rows="5" ><?php echo $htdata[0]['description'];  ?></textarea>
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
    <label for="title" class="control-label">title <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="price" maxlength="255" value="<?php if ($htdata[0]['price']){ echo $htdata[0]['price']  ; }else{ echo "";} ?>"  />
		 <?php echo form_error('price'); ?>
	</div>
</div> 
      
  <div class="form-group">
                        <label class="control-label ">Image 1</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_1']){ echo base_url()."upload/hotel/".$htdata[0]['image_1']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image_1" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('image_1'); ?>
                    </div>  
  </div>
  <div class="col-sm-4">
       <div class="control-group">
    <label for="title" class="control-label">title <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="rating" maxlength="255" value="<?php if ($htdata[0]['rating']){ echo $htdata[0]['rating']  ; }else{ echo "";} ?>"  />
		 <?php echo form_error('rating'); ?>
	</div>
</div> 



  <div class="form-group">
                        <label class="control-label ">Image 2</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_2']){ echo base_url()."upload/hotel/".$htdata[0]['image_2']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
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
    
  <div class="form-group">
                        <label class="control-label ">Image 3</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_3']){ echo base_url()."upload/hotel/".$htdata[0]['image_3']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
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
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_4']){ echo base_url()."upload/hotel/".$htdata[0]['image_4']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
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
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_5']){ echo base_url()."upload/hotel/".$htdata[0]['image_5']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
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
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php if ($htdata[0]['image_6']){ echo base_url()."upload/hotel/".$htdata[0]['image_6']  ; }else{ echo base_url()."assets/img/demoUpload.jpg";} ?>" alt="" /></div>
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
<?php 
   $ctry = $this->region_model->getcntbyid($htdata[0]['country']);
                                      $state = $this->region_model->getstatebyid($htdata[0]['state']);
                                      $city = $this->region_model->getcitybyid($htdata[0]['city']);
?>
<input class="form-control" disabled="disabled" name="cnt" value="<?php  echo $ctry[0]['country'];    ?>">
<input class="form-control" disabled="disabled" name="st" value="<?php  echo $state[0]['state'];    ?>">
<input class="form-control" disabled="disabled" name="ci" value="<?php  echo $city[0]['city'];    ?>">
<p></p>

          <input type="checkbox" name="place" id="checkbox" value="0"> <label>Wanna Change Location</label>  
 <div class="control-group" id="showc">
    <label for="country" class="control-label">country <span class="required">*</span>
</label>
    
<div class="controls" >
<?php 
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
          <div id="shows" >
                                             <label for='state' class='control-label'>state <span class='required'>*</span>
</label> <select name='state' onchange='showCity(this);' class='form-control'id="output1" >
	<option value=''>Please Select</option>
</select>
                                         </div>
 <?php echo form_error('state'); ?>
<!-- This will hold city dropdown -->
<div id="showci" >
<label for='city' class='control-label'>city <span class='required'>*</span>
</label> <select name='city'  class='form-control'id="output2" >
	<option value=''>Please Select</option>
</select>
                                         </div>
<?php echo form_error('city'); ?>                                 
                                  











                     <p></p>
                     <button class="btn btn-success">Update</button>
                     </form>
        </div></div>

                    </div>
                </div>

                <hr />




            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>


 
    
  <div id="footer">
        <p>&copy;  kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    
     <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script src="<?php echo base_url();  ?>assets/plugins/jasny/js/bootstrap-fileupload.js"></script> 
     
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
   
               
	
        

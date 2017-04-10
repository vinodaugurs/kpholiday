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

       
        <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                         Add CAB
                        </div>
                   
                 <div class="panel-body">
                     <form action="<?php echo base_url();?>index.php/dashboard/add_cab" method="post" enctype="multipart/form-data">
                     
                     <button class="btn btn-primary" disabled="disabled">Cab Type</button>
                     <p></p>
                     <input class="form-control" type="text" name="cab_type" value="<?php echo set_value('cab_type');?>">
                     <p><?php echo form_error('cab_type'); ?></p>
                                    
					<button class="btn btn-primary" disabled="disabled">Cab Name</button>
                     <p></p>
                     <input class="form-control" type="text" name="cab_name" value="<?php echo set_value('cab_name');?>">
                     <p><?php echo form_error('cab_name'); ?></p>
                  
                    
                       
        
        
       <div class="form-group">
                        <label class="control-label ">Cab Image</label>
                       
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php  echo base_url();  ?>assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="cab_image"  value="<?php echo set_value('cab_image');?>" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        <?php echo form_error('cab_image'); ?>
                    </div>  
        
        
                     <p></p>
        
        
                     <button class="btn btn-primary" disabled="disabled">Cab details</button>
                     <p></p>
                     <textarea name="cab_details" class="form-control" rows="5" ></textarea>
                     <p><?php echo form_error('cab_details'); ?></p>
                     
                     



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
  </div>
  <div class="col-sm-4">
       <div class="control-group">
    <label for="title" class="control-label">Rating<span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name" type="text" class="form-control" name="rating"placeholder="enter number" maxlength="255" value="<?php echo set_value('rating'); ?>"  />
		 <?php echo form_error('rating'); ?>
	</div>
</div>   
 
  <div class="control-group" style="float: right; margin-top: -60px; margin-right: -260px;">
    <label for="title" class="control-label">offer <span class="required">*</span></label>
	<div class='controls'>
            <input id="desti_name"  type="text" class="form-control" name="offer" maxlength="255" value="<?php echo set_value('offer'); ?>"  />
		 <?php echo form_error('offer'); ?>
	</div>
</div>            
                    
 

 </div>  <br /> <br> <br /> <br><br /> <br><br /> <br>
   <button class="btn btn-primary" disabled="disabled" style="float:left;">Traveler Feedback</button>
                     <p></p>
                     <textarea name="trv_feedback" class="form-control" rows="5" ></textarea>
                     <p><?php echo form_error('trv_feedback'); ?></p>                   
 </div>
</div>   

 <div class="control-group">
    <label for="title" class="control-label">Local process<span class="required">*</span></label>
	<div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
		<label>don't write all in one </label> <br/><br/><input type='textbox' id='textbox1' name="local[]" >
	</div>
    </div>
	
	<input type='button' value='Add Button' id='addButton'>
</div>

<div class="control-group">
    <label for="title" class="control-label">Out Sattion<span class="required">*</span></label>
	<div id='TextBoxesGroupa'>
	<div id="TextBoxDiv1a">
		<label>don't write all in one</label> <br/><br/><input type='textbox' id='textboxa' name="out_station[]" >
	</div>
    </div>
	
	<input type='button' value='Add Button' id='addbButtona'>
</div>

<div class="control-group">
    <label for="title" class="control-label">Transfer<span class="required">*</span></label>
	<div id='TextBoxesGroupb'>
	<div id="TextBoxDiv1b">
		<label>don't write all in one</label> <br/><br/><input type='textbox' id='textboxb' name="transfer[]">
	</div>
    </div>
	
	<input type='button' value='Add Button' id='addbButtonb'>
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
			url: "<?php echo base_url(); ?>index.php/dashboard/fetchstate",
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
			url: "<?php echo base_url(); ?>index.php/dashboard/fetchcity",
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

<script>
$(document).ready(function(){
    
    $("#txtFromDate").datepicker({
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 2,
         minDate:0,
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
           $("#txtToDate").val('');
            $("#txtToDate").removeAttr("disabled");
        }
    });
    $("#txtToDate").datepicker({ 
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
             
           //$("#txtToDate").attr('disabled','disabled');
        }
    });  
});
</script>            
<script>
function find()
{
  var x=document.getElementById("price").value;
   var y=x*10/100;
   var sum=+y + +x;
   document.getElementById("act_price").value=sum;
  }

</script>

   <script>
        $(function () { formValidation(); });
   </script>

    <script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = 2;
 
    $("#addButton").click(function () {
 
 if(counter>20){
            alert("Only 10 textboxes allow");
            return false;
 }   
 
 var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiv' + counter);
 
 newTextBoxDiv.after().html('<label>'+ counter + ' : </label>' +
       '<input type="text" name="local[]' + counter + 
       '" id="textbox' + counter + '" value="" >');
 
 newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
 counter++;
     });
  
   $("#addbButtona").click(function () {
 
 if(counter>20){
            alert("Only 10 textboxes allow");
            return false;
 }   
 
 var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDiva' + counter);
 
 newTextBoxDiv.after().html('<label>'+ counter + ' : </label>' +
       '<input type="text" name="out_station[]' + counter + 
       '" id="textboxa' + counter + '" value="" >');
 
 newTextBoxDiv.appendTo("#TextBoxesGroupa");
 
 
 counter++;
     });
  
  
     $("#addbButtonb").click(function () {
 
 if(counter>20){
            alert("Only 10 textboxes allow");
            return false;
 }   
 
 var newTextBoxDiv = $(document.createElement('div'))
      .attr("id", 'TextBoxDivb' + counter);
 
 newTextBoxDiv.after().html('<label>'+ counter + ' : </label>' +
       '<input type="text" name="transfer[]' + counter + 
       '" id="textboxb' + counter + '" value="" >');
 
 newTextBoxDiv.appendTo("#TextBoxesGroupb");
 
 
 counter++;
     });
  
  
});  
  </script>
   

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validationEngine-en.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validationInit.js"></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>


<script  type="text/javascript" src="<?php echo base_url();  ?>assets/js/jquery-1.9.1.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();  ?>assets/js/bootstrap.min.js"></script> 
<!--<script src="<?php // echo base_url();  ?>assets/plugins/jquery-2.0.3.min.js"></script>--> 
<script src="<?php echo base_url();  ?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script> 
<script src="<?php echo base_url();  ?>assets/js/bootstrap-fileupload.js"></script> 

</body>
<!-- END BODY -->
</html>
<?php
//include('footer.php');
 
?>
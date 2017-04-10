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

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    
   
                                        
                                      
   
      
    
    
    
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


     <?php require_once 'nav.php';    ?>
         <!-- HEADER SECTION -->
       
        <!--PAGE CONTENT -->
       <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
                        
           <div class="panel panel-primary">
                        <div class="panel-heading">
                         Add Places here!
                        </div>
                        <div class="panel-body">             
                            <div class="col-lg-4">            
                        
<div class="panel panel-default">
                        <div class="panel-heading">
                         Add Country
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="<?php echo base_url();?>index.php/admin/add_place" method="post">
                                    <label> Country</label>
                            <input class="form-control" type="text" name="addcountry" value="" >
                            <input type="hidden" name="co" value="1">
                            <?php echo form_error('addcountry'); ?>
                            <p></p>
                            <button class="btn btn-success"> Add Country </button>
                            </form>
                                </div>
                            
                            </div>
                            
                          
                            </div>
    </div>
                        
                        
       </div>                  
                        
<!--             //state-->
             
             
                            
   <div class="col-lg-4">            
                        
<div class="panel panel-default">
                        <div class="panel-heading">
                         Add State
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <form action="<?php echo base_url();?>index.php/admin/add_place" method="post"> 
                                    
                                    
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
 
<?php echo form_dropdown('country', $options, $this->input->post('country') , 'class="form-control"')?>
    
    
		<?php echo form_error('country'); ?>
	</div>
</div>   
                            <p></p>
                              <input class="form-control" type="text" name="addstate" value="" >
                                <input type="hidden" name="st" value="1">
                              <?php echo form_error('addstate'); ?>
                            <p></p>
                            <button class="btn btn-success"> Add State </button>
                            </form>
                                </div>
                            
                            </div>
                            
                          
                            </div>
    </div>
                        
                        
       </div>                                     
                            
                            
<!--             city               -->
                            
                   <div class="col-lg-4">            
                        
<div class="panel panel-default">
                        <div class="panel-heading">
                         Add City
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="<?php echo base_url();?>index.php/admin/add_place" method="post">
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
                            <p></p>
<!--                              <input class="form-control" type="text" name="state" value="" >-->
                            <div id="output1"></div>
                               <?php echo form_error('state'); ?>
                            <p></p>
                            <input class="form-control" type="text" name="addcity" value="" >
                              <input type="hidden" name="ct" value="1">
                                 <?php echo form_error('addcity'); ?>
                            <p></p>
                            <button class="btn btn-success"> Add city </button>
                            </form>
                                </div>
                            
                            </div>
                            
                          
                            </div>
    </div>
                       
                        
       </div>                   
                            
                                    </div>
    </div>
                                     
                        




                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
        <p>&copy;  kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();  ?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();  ?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
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
    
    
    <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
      
</body>
    <!-- END BODY-->
    
</html>



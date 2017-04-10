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

	<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


      
 <?php require_once 'nav.php'; ?>

      <div id="content" style="width:81%;padding-left:14px;padding-top:25px;">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-primary">
                        
                      
                      

                 <div class="panel-body">
                    
                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cab Name</th>
                                            <th>Description</th>
                                            <th>main image</th>
                                           
                                            <th>country</th>
                                            <th>state</th>
                                             <th>city</th>
                                             <th></th>
                                              
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        $i=1;
                                        $cabdata = $this->associate_model->getcabbyuid();
                                       foreach($cabdata as $trans)
                                       {
                                           
                                      $ctry = $this->region_model->getcntbyid($trans['country']);
                                      $state = $this->region_model->getstatebyid($trans['state']);
                                      $city = $this->region_model->getcitybyid($trans['city'] );
                                        
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="warning"><?php echo $i;  ?></td>
                                            <td class="warning"><button class="btn btn-primary btn-xs " >
											<?php  echo $trans['cab'];?></button></td>
                                            <td class="warning"><?php  echo $trans['details'];    ?></td>
                                            <td class="warning"><img class="img-thumbnail" src="<?php  echo base_url()."upload/cabs/".$trans['image']   ; ?>" width="100" height="100"></td>
                                            <td class="warning"><?php  echo $ctry[0]['country'] ;   ?></td>
                                            <td class="warning"><?php  echo $state[0]['state'] ;   ?></td>
                                            <td class="warning"><?php  echo $city[0]['city']  ;  ?></td>
                                            <td class="warning">
                                            <a class="btn btn-primary btn-circle" href="<?php echo base_url()."index.php/dashboard/edit_cab?id=".$trans['cab_id'];  ?>"><i class="icon-pencil"></i></a>&nbsp;
                                            <form action="<?php echo base_url();?>index.php/dashboard/del_cab" method="post"><input type="hidden" name="delid" value="1">
                                            <input type="hidden" name="hid" value="<?php  echo $trans['cab_id'];   ?>">
                                            <button class="btn btn-danger btn-circle"><i class="icon-remove"></i></button></form></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        
                                        ?>
   </tbody>
                                </table>
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
  	
  $(document).ready(function(){

		//Hide div w/id extra
	   $("#trnsport1").css("display","none");
       $("#hotel1").css("display","none");
        $("#meal1").css("display","none");

		// Add onclick handler to checkbox w/id checkme
	   $("#trnsport").click(function(){

		// If checked
		if ($("#trnsport").is(":checked"))
		{
			//show the hidden div
			$("#trnsport1").show("fast");
		}
   });
   	   $("#hotel").click(function(){
		
		if ($("#hotel").is(":checked"))
		{
			//show the hidden div
			$("#hotel1").show("fast");
			
		}
	});
   $("#meal").click(function(){
	
		if ($("#meal").is(":checked"))
		{
			//show the hidden div
			$("#meal1").show("fast");
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
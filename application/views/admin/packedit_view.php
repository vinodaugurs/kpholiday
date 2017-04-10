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


         <!-- HEADER SECTION -->
       
		<?php require_once 'nav.php';    ?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

<div class="panel panel-primary">
                        <div class="panel-heading">
                           Package update
                        </div>
                        <div class="panel-body">
                            
                            <form method="post" action ="<?php echo base_url();?>index.php/admin/pack_edit?pid=<?php  echo $pid;?>" accept-charset="utf-8" enctype="multipart/form-data" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php 
                                       // $pid = $this->input->get_post('pid');
                                        $apdata = $this->admin_model->getpackbyid($pid);  
                                      
                                        foreach ($apdata as $apval)
                                        {
                                        }   
                                        
                                        for($i = 1 ;$i<8;$i++)
                                        {
                                            if ($apval['image_'.$i.'']=='')
                                            {
                                             $apval['image_'.$i.''] ='no.jpg';
                                            }
                                        }
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                           <td>Uid</td>
                                            <td class="warning"><input type="text" class="form-control" name="uid" value="<?php echo $apval['uid']?>"></td>
                                            
                                              </tr>  
                                              <tr>
                                                  <td>package  name</td>
                                            <td class="warning" ><input type="text" class="form-control" name="pack_name" value="<?php echo $apval['pack_name']?>"></td>
                                             </tr>
                                             
                                              
                                             
                                             
                                             <tr>
                                                 <td>Price</td>
                                             <td class="warning"><input type="text" class="form-control" name="price" value="<?php echo $apval['price']?>"></td>
                                             </tr>
                                              <tr>
                                                   <td>Transport</td>
                                                   <td class="warning"><textarea class="form-control" name="transport"><?php echo $apval['transport']?></textarea></td>
                                             </tr> 
                                             <tr>
                                                  <td>Address</td>
                                                  <td class="warning"><textarea name="details" class ="form-control" ><?php echo $apval['details']?></textarea></td>
                                             </tr>
                                            <tr>
                                                  <td>stay info</td>
                                                  <td class="warning"><textarea name="stay_info" class ="form-control" ><?php echo $apval['stay_info']?></textarea></td>
                                             </tr>
                                             <tr>
                                                 <td> status</td>
                                            <td class="danger"><input type="text" class="form-control" name="status" value="<?php echo $apval['status']?>"></td>
                                            </tr>
                                             <tr>
                                                 <td> Special Places</td>
                                                 <td class="success"><textarea  class="form-control" name="special_places" ><?php echo $apval['special_places']?></textarea></td>
                                            </tr>
                                             <tr>
                                                 <td> Halts</td>
                                                 <td class="success"><textarea  class="form-control" name="halts" ><?php echo $apval['halts']?></textarea></td>
                                            </tr>
                                            
                                            <tr>
                                                 <td> Tour_highlight</td>
                                                 <td class="success"><textarea  class="form-control" name="tour_highlight" ><?php echo $apval['tour_highlight']?></textarea></td>
                                            </tr>
                                             <tr>
                                                 <td> Images</td>
                                                 <td class="success"><img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_1']?>">
                                                 
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_2']?>">
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_3']?>">
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_4']?>">
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_5']?>">
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_6']?>">
                                                 <img class="img-thumbnail" width= "100" height="100" src = "<?php echo base_url()."upload/package/".$apval['image_7']?>">
                                                 </td>
                                            </tr>
                                            
                                            <tr>
                                               <td>Images</td> 
                                              <td>  
                                                
                                                
                                               <div class="control-group">
    <label for="image_1" class="control-label">image_1</label>
    
   
	<div class='controls'>
            <input id="image_1" type="file" name="image_1" />
		<?php echo form_error('image_1'); ?>
	</div>
</div><div class="control-group">
    <label for="image_2" class="control-label">image_2</label>
	<div class='controls'>
        <input id="image_2" type="file" name="image_2" />
		<?php echo form_error('image_2'); ?>
	</div>
</div><div class="control-group">
    <label for="image_3" class="control-label">image_3</label>
	<div class='controls'>
        <input id="image_3" type="file" name="image_3" />
		<?php echo form_error('image_3'); ?>
	</div>
</div><div class="control-group">
    <label for="image_4" class="control-label">image_4</label>
	<div class='controls'>
        <input id="image_4" type="file" name="image_4" />
		<?php echo form_error('image_4'); ?>
	</div>
</div><div class="control-group">
    <label for="image_5" class="control-label">image_5</label>
	<div class='controls'>
        <input id="image_5" type="file" name="image_5" />
		<?php echo form_error('image_5'); ?>
	</div>
</div><div class="control-group">
    <label for="image_6" class="control-label">image_6</label>
	<div class='controls'>
        <input id="image_6" type="file" name="image_6" />
		<?php echo form_error('image_6'); ?>
	</div>
</div><div class="control-group">
    <label for="image_7" class="control-label">image_7</label>
	<div class='controls'>
        <input id="image_7" type="file" name="image_7" />
		<?php echo form_error('image_7'); ?>
	</div>
</div> 
                                                
                                                
                                                
                                               </td> 
                                            </tr>
                                            <tr>
                                                
                                               
                                               <td> Update</td> 
                                            <td> <input type="hidden" name="uppid" value="<?php echo $apval['id'];?>"><button class="btn btn-success btn-xs"  ><i class="icon-ok"> </i>update</button></td>
                                        </tr>
                                        
                                        

                                    </tbody></table></div>
                     
                        </form>
                         <form method="post" action ="edit_asso?id=<?php echo $apval['uid'];?>" onsubmit="return confirm('Do you really want to Delete?');" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <tbody>
                                <tr>
                                    <td>Delete</td>
                                    <td>
                                        
                                     <input type="hidden" name="deluid" value="<?php echo $apval['uid'];?>"><button class="btn btn-danger btn-xs" ><i class="icon-remove"> </i>delete</button>    
                                        
                                    </td> 
                                </tr>
                                
                               
                               </tbody>
                            </table>
                                </div>
                            
                           </form>
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
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
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
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
      
</body>
    <!-- END BODY-->
    
</html>


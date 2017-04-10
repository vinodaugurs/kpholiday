
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
         <!-- HEADER SECTION -->
       
        <!--PAGE CONTENT -->
       <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">

<div class="panel panel-primary">
                        <div class="panel-heading">
                          Document List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Uid</th>
                                            <th>name</th>
                                            <th>type</th>
                                            <th>Document1</th>
                                            <th>Document2</th>
                                            <th>Document3</th>
                                            <th>Status</th>
                                            <th>Date</th>                                            
                                             <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php 
                                       // $this->output->enable_profiler(TRUE);
                                        $docdata = $this->admin_model->getdistdoc();  
                                        //print_r($docdata);
                                        foreach ($docdata as $docval)
                                        {
                                        $docr = $this->admin_model->getdoc($docval['uid']);
                                        $name =  $this->user_model->get($docval['uid']);
                                        ?>
                                       
                                       
                                        <tr class="odd gradeX">
                                            <td class="warning"><?php echo $name[0]['user_name'] ;?></td>
                                            <td class="warning" ><?php  ?></td>
                                            <td class="warning"><?php  ?></td>
                                        <?php
                                            $did = array(                                           
                                               
                                                
                                            );
                                            $i=1;
                                            foreach($docr as $dval)
                                          {
                                             $did[$i]=$dval['id'] ;
                                             $doc[$i]=$dval['document'] ;
                                             $i++;
                                          }
                                          
                                          if( $i===1)
                                          {
                                              $doc[1]="-";
                                             $doc[2]="-";
                                               $doc[3]="-";
                                          }
                                          
                                          
                                          elseif ($i===2)
                                          {
                                              $doc[2]="-";
                                               $doc[3]="-";
                                          }
                                          elseif( $i===3)
                                          {
                                              $doc[3]="-";
                                          }
                                            ?>
                                            <?php
                                            $j=1;
                                            for($j=1;$j<4;$j++)
                                            {                                              
                                           
                                            ?>
                                            <td class="warning"><?php
                                            
                                            switch($j)
                                            {
                                              
                                               case 1 : 
                                                    if ($doc[1]=== '-'){echo "<a href='#'>-</a>";}else{echo "<a href='".base_url()."upload_doc/".$doc[1]."' target='_blank'>Doc1</a>";} 
                                                   break;
                                               case 2 : 
                                                if ($doc[2]=== '-'){echo "<a href='#'>-</a>";}else{echo "<a href='".base_url()."upload_doc/".$doc[2]."' target='_blank'>Doc2</a>";} 
                                                   break;
                                              case 3 : 
                                                   if ($doc[3]=== '-'){echo "<a href='#'>-</a>";}else{echo "<a href='".base_url()."upload_doc/".$doc[3]."'  target='_blank'>Doc3</a>";} 
                                                   break;
                                            }
                                            
                                            ?>
                                            
                                           </td>
                                           <?php
                                            }
                                           ?>
                                           <td class="danger"><?php if ($dval['status'] === '0') { echo "pending";}else{echo "Approve" ;}?></td>
                                            <td class="danger"><?php echo $dval['date'];?></td>
                                            <td class="danger"><?php ?></td>
                                            <td class="success"><?php ?></td>
                                            <td><form method="post" action ="<?php echo base_url(); ?>index.php/admin/doc_check" onsubmit="return confirm('Do you really want to approve/disapprove?');" > <input type="hidden" name="apr" value="1">
                                                    <input type="hidden" name="uid" value="<?php echo $docval['uid'];?>"><button class="btn btn-success btn-xs"><i class="icon-power-off"></i></button></form>
                                                </br>
                                                <form method="post" action="<?php echo base_url(); ?>index.php/admin/doc_check" onsubmit="return confirm('Do you really want to delete?');">
                                                    
                                                    <input type="hidden" name="del" value="1">
                                                    <input type="hidden" name="uid" value="<?php echo $docval['uid'];?>">
                                                    <button class="btn btn-danger btn-xs"><i class="icon-remove"></i></button>
                                                </form></td>
                                        </tr>
<?php
                                         
 }
?>
                                    </tbody></table></div></div></div>



                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
    
      
</body>
    <!-- END BODY-->
    
</html>


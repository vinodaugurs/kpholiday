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
<!--<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />-->
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

<?php require_once 'nav.php'; ?>
         <!-- HEADER SECTION -->
    
        <div id="content" style="padding-top:10px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                            <?php
                            
                            $udata = $this->admin_model->approvalreq('users');
                                            $pkdata = $this->admin_model->approvalreq('pack');
                                           
                                            $docdata = $this->admin_model->approvalreq('doc');
                                               $destidata = $this->admin_model->approvalreq('desti');
                            
                            ?>
                    <div class="col-lg-12">
<div class="panel panel-primary">
                        <div class="panel-heading">
                        Approval Associate Requests                        </div>
                        <div class="panel-body">
                    
                            <div class="col-md-12" >
                                
                                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="asso">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>user name</th>
                                            <th>email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      
                                     if($udata)
                                     {
                                         $i=1;
                                        foreach($udata as $uvl){
                                           
                                            ?>
                                        <tr class="odd gradeX">
                                         <td><?php echo $i;   ?></td>
                                         <td><?php echo $uvl['user_name'];   ?></td>
                                         <td><?php echo $uvl['email'];   ?></td>
                                         <td><?php echo $uvl['phone'];?></td>
                                         <td><a class="btn btn-danger btn-xs" href="<?php  echo base_url();?>index.php/admin/user?id=<?php echo $uvl['id']; ?>">open</a></td>        
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        <?php $all_id['id']="" ;?>  
                             <a class="btn btn-danger btn-xs" href="<?php  echo base_url();?>index.php/admin/user?id=<?php echo $all_id['id'];?>" style="width: 80px; height: 30px; padding: 5px 5 px 5px 5px;margin-left: 750px; margin-top: 0px;">Open all</a>             
                       
             </div>
                               
                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            
                            </div>
                            
                          
                        
                        
                        
                    
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                <hr />




            </div>


   <div class="col-lg-12">
<div class="panel panel-primary">
                        <div class="panel-heading">
                        Approval Package Requests                        </div>
                        <div class="panel-body">
                    
                            <div class="col-md-12" >
                                
                                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="pack">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>user name</th>
                                            <th>Package name</th>
                                            <th>start date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                             
//                                               $darray[1]= array();
//                                               $darray[2]= array();
//                                               $darray[3]= array();
//                                               $darray[4]= array();
//                                               $darray[5]= array();
//                                               $darray[6]= array();
//                                               $darray[7]= array();
//                                            if ($udata)
//                                                {
//                                                  $darray[1] = $udata;
//                                                }
//                                            if($destidata)
//                                                {
//                                                   
//                                                  $darray[2] = $destidata;
//                                                  $darray[5] = array_merge($darray[1], $darray[2]);
//                                                }
//                                             if($docdata)
//                                                {
//                                                  $darray[3]= $docdata; 
//                                                  $darray[6] = array_merge($darray[5], $darray[3]);
//                                                }
//                                             if($pkdata)
//                                                {
//                                                 $darray[4]= $pkdata; 
//                                                     $darray[7] = array_merge($darray[6], $darray[4]);
//                                                }
//                                                $result=array();
//                                                $i=1;
//                                       for($i=1;$i<8;$i++)
//                                       {
//                                         if($darray[$i])
//                                         {
//                                         $result = array_merge($result,$darray[$i]);   
//                                        }
//                                        }
                                     if($pkdata)
                                     {
                                         $ii=1;
                                        foreach($pkdata as $pvl){
                                        
                                           $uname = $this->user_model->get($pvl['uid']);
                                            ?>
                                        <tr class="odd gradeX">
                                         <td><?php echo $ii;  echo	$pvl['uid']; ?></td>
                                         <td><?php  echo $uname[0]['user_name'];   ?></td>
                                         <td><?php echo $pvl['pack_name'];   ?></td>
                                         <td><?php echo $pvl['start_date'];   ?></td>
                                         <td><a class="btn btn-danger btn-xs" href="<?php  echo base_url();?>index.php/admin/package?id=<?php echo $pvl['id'] ;?>">open</a></td>
                                        </tr>
                                        <?php
                                        $ii++;
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
  <a class="btn btn-danger btn-xs" href="<?php  echo base_url()."index.php/admin/package";  ?>" style="width: 80px; height: 30px; padding: 5px 5 px 5px 5px;margin-left: 750px; margin-top: 0px;">Open all</a>                               
                                 </div>
                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            
                            </div>
                            
                          
                        
                        
                        
                    
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                <hr />




            </div>

                    
                    
                    <div class="col-lg-12">
<div class="panel panel-primary">
                        <div class="panel-heading">
                        Approval Destination Requests                        </div>
                        <div class="panel-body">
                    
                            <div class="col-md-12" >
                                
                                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="desti">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>name</th>
                                            <th>location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      
                                     if($destidata)
                                     {
                                         $i=1;
                                        foreach($destidata as $dvl){
                                           $nm = $this->user_model->get($dvl['uid']);
                                           $city= $this->region_model->getcitybyid($dvl['city']);
                                            ?>
                                        <tr class="odd gradeX">
                                         <td><?php echo $i;   ?></td>
                                         <td><?php echo $nm[0]['user_name'];   ?></td>
                                         <td><?php echo $dvl['name'];   ?></td>
                                         <td><?php echo $city[0]['city'];   ?></td>
                                         <td><a class="btn btn-danger btn-xs" href="<?php  echo base_url()."index.php/admin/approve_desti";  ?>">open</a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                 </div>
                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            
                            </div>
                            
                          
                        
                        
                        
                    
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                <hr />




            </div>
                    
                    
                        <div class="col-lg-12">
<div class="panel panel-primary">
                        <div class="panel-heading">
                        Approval Document Requests                        </div>
                        <div class="panel-body">
                    
                            <div class="col-md-12" >
                                
                                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="desti">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>date</th>
                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      
                                     if($docdata)
                                     {
                                         $i=1;
                                        foreach($docdata as $dovl){
                                           $nm = $this->user_model->get($dovl['uid']);
                                      
                                            ?>
                                        <tr class="odd gradeX">
                                         <td><?php echo $i;   ?></td>
                                         <td><?php echo $nm[0]['user_name'];   ?></td>
                                         <td><?php echo $dovl['date'];   ?></td>
                                       
                                         <td><a class="btn btn-danger btn-xs" href="<?php  echo base_url()."index.php/admin/documents";  ?>">open</a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                 </div>
                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            
                            </div>
                            
                          
                        
                        
                        
                    
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>

                <hr />




            </div>
        </div>
       <!--END PAGE CONTENT -->


    </div>
 </div> </div>
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
         $(document).ready(function () {
             $('#asso').dataTable();
             $('#pack').dataTable();
                   $('#doc').dataTable();
                         $('#desti').dataTable();
         });
    </script>

      
</body>
    <!-- END BODY-->
    
</html>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
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
        <link href="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
     <div id="content" style="width:81%;padding-left:14px ;padding-top:25px;">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          My Offers
                        </div>

                 <div class="panel-body">
                           
                 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>offer Name</th>
                                            
                                            <th>offer Details</th>
                                            <th>Discount</th>
                                            <th>package</th>
                                            <th>Date</th>
                                            <th>status</th>
                                            <th></th>
                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $odata = $this->pack_model->getoffers();
                                        
                                      
                                        $i=1;
                                      
                                        foreach($odata as $val)
                                        {
                                         $pname = $this->pack_model->getpackbypid($val['pack_id']);   
                                     
                                        
                                        ?>
                                        <tr class='warning'>
                                            <td><?php echo $i;  ?></td>
                                            <td>
                                              <?php echo $val['offer_name'];?>  
                                            </td>
                                            <td>
                                                  <textarea class ="form-control" disabled ="disabled" rows="5" style="background-color: #faf2cc;
border: 0px;  "    >    <?php echo $val['offer_details'];?> </textarea> 
                                            </td>
                                      
                                            <td>
                                                <?php echo $val['discount'];?>
                                            </td>
                                                  
                                            <td>
                                                <?php if ($pname){echo $pname[0]['pack_name'];}else{echo'-';}?>
                                            </td>
                                                <td>
                                                      <?php echo $val['date'];?>
                                            </td>
                                                 
                                             <td>
                                                     <?php echo $val['status'];?>
                                                
                                            </td>
                                            <td> <a href="editoffer?id=<?php echo $val['id'] ?>"> <i class="icon-edit"></i></a></br>
                                         
                                            
                                            </td>
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


 
    
  <div id="footer">
        <p>&copy; kpholidays.com &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
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

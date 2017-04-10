<?php $this->load->view('admin/header');?>
 

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

                          Agent List

                        </div>

                        <div class="panel-body">

                            <div class="table-responsive" style="overflow:scroll;">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Uid</th>

                                            

                                            

                                            <th>name</th>

                                            <th>Type</th>

                                            <th>Email</th>

                                            <th>Phone</th>

                                            <th>Address</th>

                                            <th>city</th>

                                            

                                            <th>Activate</th>

                                             <th></th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        

                                        

                                        <?php 

                                        

                                          

                                        

                                        

                                        $c=1;

                                        if($apdata){

                                        foreach ($apdata as $apval)

                                        {

                                          $city = $this->region_model->getcitybyid($apval['city']); 

                                          $state = $this->region_model->getstatebyid($apval['state']);  

                                          //$city[0]['city'];

                                        ?>

                                       

                                        <tr class="odd gradeX">

                                              <td class="warning"><?php echo $c;?></td>

                                            <td class="warning" readonly="readonly"><?php echo $apval['uid']?></td>

                                           

                                            <td class="warning" ><?php echo $apval['user_name']?></td>

                                            <td class="warning" ><?php echo $apval['type']?></td>

                                            <td class="warning"><?php echo $apval['email']?></td>

                                            <td class="warning"><?php echo $apval['phone']?></td>

                                            <td class="warning"><textarea class ="form-control" disabled="disabled"><?php echo $apval['address']?></textarea></td>

                                            <td class="warning"><?php echo @$city[0]['city']?></td>

                                            <td class="warning"><?php echo @$state[0]['state']?></td>

                                            

                                            <td class="success"><?php echo $apval['active']?></td>

                                            <td><form method="post" action ="suspend?id=<?php echo $apval['uid']?>" onsubmit="return confirm('Do you really want to proceed?');" > <input type="hidden" name="sus" value="<?php  if ($apval['status']==='suspend')

                                        {

                                        

                                         echo 1;

                                        }else{ echo 0; } ?>"><input type="hidden" name="uid" value="<?php echo $apval['uid'];?>"></form></br>

                                        <form method="post" action="<?php echo base_url(); ?>index.php/admin/edit_asso?id=<?php echo $apval['uid'];?>"><input type="hidden" name="uid" value="<?php echo $apval['uid'];?>"><button class="btn btn-primary btn-xs" id="update"><i class="icon-edit"></i></button></form></td>

                                        </tr>

<?php

$c++;

 }

   }

?>

                                    </tbody></table></div></div></div>



            

                                        

                    </div>

                </div>



                <hr />









            </div>









        </div>

   

    </div>


   
  

    <!--END FOOTER -->

     <!-- GLOBAL SCRIPTS -->

   

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>

      

<?php $this->load->view('admin/footer');?>



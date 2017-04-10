
<?php $this->load->view('admin/header');?>

    <!-- END  HEAD-->

    <!-- BEGIN BODY-->
<!--
<body class="padTop53 " >-->



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

                           Traveler list

                        </div>

                        <div class="panel-body">

                            

                            <form method="post" action ="#" >

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>

                                       

                                    </thead>

                                    <tbody>

                                        

                                        

                                        <?php 

                                        

                                        $apdata = $this->pack_model->getassobyid($assouid);  

                                       		

                                        foreach ($apdata as $apval)

                                        {

                                        }              

                                        ?>

                                        <tr class="odd gradeX">

                                           <td>Uid</td>

                                            <td class="warning"><input type="text" class="form-control" name="uid" value="<?php echo $apval['uid']?>"></td>

                                            

                                              </tr>  

                                              <tr>

                                                  <td>user name</td>

                                            <td class="warning" ><input type="text" class="form-control" name="user_name" value="<?php echo $apval['user_name']?>"></td>

                                             </tr>

                                             

                                              

                                             <tr>

                                                 <td>Type</td>

                                            <td class="warning">                                           

                                            

                                            

                                             <?php 

                                             if($apval['type'] == 'traveler')

                                             {

                                              $type = 'Associate'; 

                                              $type1 = 'Admin';

                                              

                                             }

                                             elseif($apval['type']== 'agent')

                                             {

                                              $type = 'Traveler'; 

                                              $type1 = 'Admin';

                                             }  

                                             elseif($apval['type']== 'Admin')

                                             {

                                              $type = 'Traveler'; 

                                              $type1 = 'Associate';

                                             } 

                                             

                                             $optionst = array(                                                  

                                                  ''.$apval['type']  =>  ''. $apval['type'],

						  ''.$type  => ''.$type,

                                                  ''.$type1  => ''.$type1

                                                ); ?>



      

            <?php                         

            echo form_dropdown('type',$optionst, set_value('type'),'class="form-control"' )

                    ?>                                            

                                            

                                            </td>

                                             </tr>

                                             

                                             <tr>

                                                 <td>Email</td>

                                            <td class="warning"><input type="text" class="form-control" name="email" value="<?php echo $apval['email']?>"></td>

                                             </tr>

                                              <tr>

                                                   <td>Phone</td>

                                            <td class="warning"><input type="text"class="form-control" name="phone" value="<?php echo $apval['phone']?>"></td>

                                             </tr> 

                                             <tr>

                                                  <td>Address</td>

                                                  <td class="warning"><textarea name="address" class ="form-control" ><?php echo $apval['address']?></textarea></td>

                                             </tr>

                                           

                                             <tr>

                                                 <td> status</td>

                                            <td class="danger"><input type="text"class="form-control" name="status" value="<?php echo $apval['status']?>"></td>

                                            </tr>

                                             <tr>

                                                 <td> Active</td>

                                            <td class="success"><input type="text" class="form-control" name="active" value="<?php echo $apval['active']?>"></td>

                                            </tr>

                                              <tr>

                                                 <td> Active code</td>

                                            <td class="success"><input type="text" class="form-control" name="active_code" value="<?php echo $apval['activecode']?>"></td>

                                            </tr>

                                            <tr>

                                                

                                               

                                               <td> Update</td> 

                                            <td> <input type="hidden" name="upuid" value="<?php echo $apval['uid'];?>"><button class="btn btn-success btn-xs"  ><i class="icon-ok"> </i>update</button></td>

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

        <p>;</p>

    </div>

    <!--END FOOTER -->

     <!-- GLOBAL SCRIPTS -->

    

     <script>

         $(document).ready(function () {

             $('#dataTables-example').dataTable();

         });

    </script>

      

<?php $this->load->view('admin/footer');?>




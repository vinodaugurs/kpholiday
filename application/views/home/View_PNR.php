<?php  include'header.php';?> 
    <div id="page-wrapper">

	   <section id="content">
       <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">View PNR/Print Ticket</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li class="active">View PNR/Print Ticket</li>
                </ul>
            </div>
        </div>

            <div class="container">
            
			  <div class="row">

                    <div id="main" class="col-md-12 Runningtext">
                    <?php echo $this->session->flashdata('msg');?>
                    	<div class="Runningtext-Box">
                        
                        
                        <div class="col-md-offset-3 col-md-5 col-xs-12 col-sm-offset-1 col-sm-10">
                         <form class="travelo-box2-login1" id="login_data"  action="<?php echo base_url('index.php/home/View_PNR');?>" method="post">
                            <div class="widget-top">
                                <h3>View PNR/Print Ticket</h3>
                                <div class="stripe-line hidden-xs">
                                </div>
                            </div>
                            <div class="widget-container">
                                <div class="form-group">
                                    <label>Please enter PNR</label>
                                    <input name="ticketpnr" value="<?php echo (set_value('ticketpnr')== true)?set_value('ticketpnr'):"" ?>" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input name="mobilenumber" value="<?php echo (set_value('mobilenumber')== true)?set_value('mobilenumber'):"" ?>" required type="text" maxlength="10" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9">
                                        <input type="submit" name="" value="Submit" class="btn-sm btn btn-info col-xs-12"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                            </div>
                            </form>
                		</div>
                        
                     
                        <div class=" clearfix"></div>
                        </div><!--image-style style1 large-block-->
                    
                    
                    
                    </div> <!--#main-->
               </div><!--row-->
            </div><!--container-->
        </section><!--content-->
     </div><!--page-wrapper-->

    



<?php include'footer.php';?>
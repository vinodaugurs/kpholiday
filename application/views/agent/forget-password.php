<?php  include'header.php';?> 
    <div id="page-wrapper">

	   <section id="content">
       <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">User Profile</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li class="active">Forget Password</li>
                </ul>
            </div>
        </div>

            <div class="container">
            
			  <div class="row">

                    <div id="main" class="col-md-12 Runningtext">
                    	<div class="Runningtext-Box">
                        
                        
                        <div class="col-md-offset-3 col-md-5 col-xs-12 col-sm-offset-1 col-sm-10">
                            <div class="widget-top">
                                <h3>Forget Password</h3>
                                <div class="stripe-line hidden-xs">
                                </div>
                            </div>
                            <form action="<?php echo base_url('index.php/home/password_change/'.$uid); ?>" method="post" id="formCheckPassword">
                            <div class="widget-container">
                                <div class="form-group">
                                    <label>Password
                                    <input name="password" type="password" required id="firstpassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Conform Password</label>
                                    <input name="" type="password" maxlength="10" required id="secoundpassword" class="form-control"><div id="msg"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9">
                                        <input type="submit" name="submit" id="fsubmit" value="Submit" class="btn-sm btn btn-info col-xs-12"></input>
                                    </div>
                                </div>
                            </div>
                            </form>
 
<script type="text/javascript">
    $(document).ready(function(){
		
		$("#secoundpassword").keyup(function(){
            var pass = $('#firstpassword').val();
            var pass2 = $('#secoundpassword').val();
            if(pass!=pass2){
                $('#msg').text('Not match');
				$('#fsubmit').attr('disabled','disabled');
            }else{
				 $('#msg').text('');
				$('#fsubmit').removeAttr('disabled');
			}
        });
		$("#firstpassword").keyup(function(){
            var pass = $('#firstpassword').val();
            var pass2 = $('#secoundpassword').val();
            if(pass!=pass2){
                $('#msg').text('Not match');
				$('#fsubmit').attr('disabled','disabled');
            }else{
				 $('#msg').text('');
				$('#fsubmit').removeAttr('disabled');
			}
        });
        
    });
</script> 

                            <div class="row">
                                <br>
                                <br>
                            </div>
                		</div>
                        
                     
                        <div class=" clearfix"></div>
                        </div><!--image-style style1 large-block-->
                    
                    
                    
                    </div> <!--#main-->
               </div><!--row-->
            </div><!--container-->
        </section><!--content-->
     </div><!--page-wrapper-->

    



<?php include'footer.php';?>
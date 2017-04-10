
<?php  include'header.php';?> 
<style>
.SIGN-Form{
	background: none repeat scroll 0 0 #fff;
    box-shadow: 0 1px 3px 0 #b5b5b5;
    clear: both;
    padding: 25px;
	
	}

</style>


    <div id="page-wrapper">

	   <section id="content">
       <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title"> SIGN IN</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PAGES</a></li>
                    <li class="active"> SIGN IN</li>
                </ul>
            </div>
        </div>

            <div class="container">
            
			  <div class="row">

                    <div id="main" class="col-md-12 Runningtext">
                    	<div class="Runningtext-Box">
                        	<h3 class=" text-center">ALREADY A MEMBER? SIGN IN HERE</h3>
                            <form class="travelo-box2-login1" id="login_data"  action="<?php echo base_url('index.php/home/login');?>" method="post">
                            <div class="col-md-5 col-sm-6 col-centered SIGN-Form">
                                <div class="form-group">
                                <input type="email" name="email" required id="emailinner" class="form-control" placeholder="EMAIL-ID" />
                                </div>
                                
                                <div class="form-group">
                                 <input name="password" type="password" required class="form-control"  placeholder="PASSWORD">
                                </div>
                                
                                <div class="form-group">
                                   <input type="submit" value="Signin" class="btn btn-sm btn-primary col-md-4 col-xs-12 pull-right">
                                   <div class=" clearfix"></div><br/>
                                 <div class=" text-right" > <a href="javascript:;" id="forgetinner"> FORGOT PASSWORD</a></div>
                                </div>
                            
                            <div class=" clearfix"></div>
                            </div><!--SIGN-form-->
                            
                           </form>
                            
                            
                           
                            
                            
                     		
                            

                           
                            
                            
                            
                          
                           
                                                    
                        </div><!--image-style style1 large-block-->
                    
                    
                    
                    </div> <!--#main-->
               </div><!--row-->
            </div><!--container-->
        </section><!--content-->
     </div><!--page-wrapper-->

    
<script type="text/javascript">
  $(document).ready(function(){
    $('#forgetinner').click(function(){
      var email = $('#emailinner').val();
      if(!email==''){
        $.ajax({
          url:"<?php echo base_url('index.php/home/forget'); ?>",
          type:"post",
          data:{email:email},
          success:function(data){
            obj = jQuery.parseJSON(data);
            alert(obj.url);
            
          },
          error:function(data){

          }
        });
      }else{
        alert("Please Fill email Address");
      }
    });
  });
</script>


<?php include'footer.php';?>
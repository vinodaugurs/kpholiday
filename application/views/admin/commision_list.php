<?php $this->load->view('admin/header');?>
<!-- MAIN WRAPPER -->

<div id="wrap" style="padding-top:30px;">
  <?php require_once 'nav.php';    ?>
  
  <!-- HEADER SECTION --> 
  
  <!--PAGE CONTENT -->
  
  <div id="content" style="padding-top:30px;">
    <div class="inner" style="min-height:1200px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading"> Agent List </div>
            <div class="container1">
              <div class="col-lg-12">
                <div class="sorting-header">
                  <h3 class="sorting-title uppercase">Edit Service Charge</h3>
                </div>
                <div class="Service-Search11 col-sm-12">
                  <?php //print_r($data);
		//$_GET['commissionType'] ="";	
		 ?>
                  <div class=" ">
                  
                      <form method="get" id="commissionForm">
                        <div class="form-group"> 
                         <div class="col-sm-4">Type of Travel</div>
                        <div class="col-sm-6">
                        <select name="commissionType" class="form-control" id="markuptype" onchange="$('#commissionForm').submit();">
                          <!--<option value="">-SELECT VALUE-</option>-->
                          <option value="International Flight" <?php if(isset($_GET['commissionType'])=='International Flight'){ echo "selected"; } ?>>International Flight</option>
                          <option value="Domestic Flight" <?php if(isset($_GET['commissionType'])=='Domestic Flight'){ echo "selected"; } ?> >Domestic Flight</option>
                          <option value="International Hotel" <?php if(isset($_GET['commissionType'])=='International Hotel'){ echo "selected"; } ?> >International Hotel</option>
                          <option value="Domestic Hotel" <?php if(isset($_GET['commissionType'])=='Domestic Hotel'){ echo "selected"; } ?> >Domestic Hotel</option>
                          <option value="AC Bus" <?php if(isset($_GET['commissionType'])=='AC Bus'){ echo "selected"; } ?> >AC Bus</option>
                          <option value="Non AC Bus" <?php if(isset($_GET['commissionType'])=='Non AC Bus'){ echo "selected"; } ?> >Non AC Bus</option>
                        </select>
                      </form></div>
                      <div class=" clearfix"></div>
                    </div>
                    <div class=" clearfix"></div>
                    <div class="form-group"> 
                    <div class="col-sm-4">Commission Value</div>
                    <div class="col-sm-6">
                      <input type="text" id="adult_Commission" class="form-control" placeholder="Enter Commission" value="<?php echo isset($data[0]['adult_Commission'])?$data[0]['adult_Commission']:'';?>">
                    </div>
                    <div class=" clearfix"></div>
                    </div>
                    <div class=" clearfix"></div>
                    <button type="button" id="submit" class="btn btn-primary btn-md active"> Add Value</button>
                  </div>
                  <div class=" clearfix"></div>
                  <br/><br/> <br/> 
                </div>
              </div>
              
              <div class=" clearfix"></div>
            </div>
            <!--Service-Search--> 
            
          </div>
          <!--row--> 
          
        </div>
        <!--container--> 
        
      </div>
    </div>
  </div>
</div>
<hr />
</div>
</div>
</div>
<!--END FOOTER --> 

<!-- GLOBAL SCRIPTS --> 
<script type="text/javascript">
    $('#submit').click(function(){
      var markuptype = $('#markuptype').val();
      var adult_Commission = $('#adult_Commission').val();
    

      $.ajax({
        type:'post',
        url:'<?php echo base_url('index.php/Dashboard/add_commission'); ?>',
        data:{markuptype:markuptype,adult_Commission:adult_Commission},
        success:function(data)
               {     
          alert(data);
          
           }
      });
    });

</script>
<?php $this->load->view('admin/footer');?>

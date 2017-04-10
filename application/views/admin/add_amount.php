<?php $this->load->view('admin/header');?>
     <!-- MAIN WRAPPER -->

    <div id="wrap" style="padding-top:30px;">
   <?php require_once 'nav.php';    ?>
   <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

         <!-- HEADER SECTION -->

        <!--PAGE CONTENT -->

       <div id="content" style="padding-top:30px;">

            <div class="inner" style="min-height:1200px;">

                <div class="row">

                    <div class="col-lg-12">
<div class="panel panel-primary">

                        <div class="panel-heading">

                          Agent Amount Add

                        </div>

                        <div class="container">
    <div class="row">
      
      <form method="post">

    Agent E-mail Id: <input type="text" id="email">
    Add Amount : <input type="text" id="amount">
    <input type="submit" name="add">
      </form>
    </div>
      <!--Service-Search-->
      
      

<script type="text/javascript">
  $(document).ready(function(){
    $('#email').keyup(function(){
        var email = $('#email').val();
      $.ajax({
        type:'post',
        url:'<?php echo base_url('index.php/Dashboard/add_amount'); ?>',
        data:{mail:email},
        success:function(data)
               {     
          // alert(data);
          $('#email').autocomplete({source:data});
          
           }
      });
    });
  });  
</script> 

      
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

  $(document).ready(function () {

    $('#dataTables-example').dataTable();
});
</script>

<?php $this->load->view('admin/footer');?>
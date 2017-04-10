<?php $this->load->view('admin/header');?>
     <!-- MAIN WRAPPER -->
<style>
       .panel.panel-primary, .panel.panel-primary  div {
          display: inline-block;
       }
       .panel-heading {
        width: 100%;
       }
     </style>

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

                          Booked Hotels 

                        </div>

  <div class="container1">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              
                 <thead>
                 <tr>
                      <th>#</th>
                      <th>Hotel Name</th>
                       <th>Track Id</th>
                      <th>Mobile Number</th>
                      <th>Hotel Type</th>
                      <th>Search Id</th>
                      <th> Hotel Id</th>
                      <th> CLient Track Id</th>
                      <th>Booking Id</th>
                       <th>Room Information</th>
                      <th>Room Type</th>
                      <th>Address</th>
                      <th>No of Night</th>
                      <th>Booking Amount</th>
                       <th> Status</th>
                      <th>Comment</th>
                        
                  </tr>
              </thead>
               <tbody>
               <?php 
			 	  
			   foreach($display as $value){?>
               
                <tr class="odd gradeX">
                    <td class="warning">1</td>
                    <td class="warning"><?php echo @$value['HotelName'];?></td>
                    <!-- <td class="warning"><a href="<?php echo base_url()."index.php/package/package_view_admin/".$value['package_id']; ?>" target="_blank">Package Full Detail</a></td> -->

                    <td class="warning"><?php echo $value['TrackID'];?></td>
                    <td class="warning"><?php echo $value['MobileNumber'];?></td>
                    <!-- <td class="warning"><a href="<?php echo base_url()."index.php/package/user_detail/".$value['user_id'];?>" target="_blank">User Full Detail</a></td> -->
                     <td class="warning"><?php echo $value['HotelType'];?></td>
                     <td class="warning"><?php echo $value['SearchId'];?></td> 
                    <td class="warning"><?php echo $value['HotelId'];?></td>
                    <td class="warning"><?php echo $value['ClientTrackId'];?></td>
                    <td class="warning"><?php echo $value['BookingID'];?></td>
                     <td class="warning"><?php echo $value['RoomInfo'];?></td>
                    <td class="warning"><?php echo $value['RoomType'];?></td>
                   <td class="warning"><?php echo $value['address1'];?></td>
                    <td class="warning"><?php echo $value['NoOfNight'];?></td>
                    <td class="warning"><?php echo $value['BookingAmount'];?></td>
                    <!-- <td class="warning"><?php echo $value['TicketNumber'];?></td> -->
                    <!-- <td class="warning"><?php echo $value['PassengerName'];?></td> -->
                   <td class="warning"><?php echo $value['Status'];?></td>

                    <td class="warning">
                      <div class="comment-section">
                        <div class="row">
                          <textarea name="" id="" cols="30" rows="3" class="prevComments" readonly="" disabled="" style="resize:none;"><?=$value['remark']?></textarea>
                        </div>
                        <div class="row">
                          <textarea name="" id="" cols="30" rows="2" class="newComment" style="resize:none;"></textarea>
                          <span class="submitComment" data-id="<?=$value['id']?>">Save</span>
                        </div>
                      </div>  
                    </td>
                    
                </tr>
                <?php }?>
                </tbody>
                </table>
                
               
      
    </div>
      <!--Service-Search-->
      <?php echo $this->pagination->create_links();?>
      



      
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

<script>
  $(document).ready(function() {
    $('.submitComment').on('click', function() {
      oldComment = $(this).closest('.comment-section').find('.prevComments');
      newComment = $(this).closest('.comment-section').find('.newComment');
      remarkId = $(this).data('id');

      var datef = '<?=date("Y-m-d")?> By Admin';
      var old_comment = oldComment.val();
      var text = $.trim(newComment.val());
      if(text !== '') {
        if ($.trim(oldComment.val()) !== '') {
          text = '\r\n' + datef + ' :' + text;
          oldComment.val(old_comment + text);
        } else {
          text = datef + ' :' + text;
          oldComment.val(text);
        }
        data = {};
        data['id'] = remarkId;
        data['remark'] = text;
        newComment.val('');
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>index.php/dashboard/addPacComment',
          data: data,
          success: function(d) {
            alert('Data updated successfully');
            // $("#mytextarea").html('');
            // if(showMsg !== false)
            // alert("Updated data successfully");
          }
        });
      }
    })
    $('.newComment').on('keypress', function(e) {
      if(e.ctrlKey && e.which == 13)
        $('.submitComment').trigger('click');
    })
  })
</script>


<?php $this->load->view('admin/footer');?>
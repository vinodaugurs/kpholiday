<?php $this->load->view('agent/header');?>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script>

<div class="container">
  <h2>Cancel Ticket</h2>
  <form class="form-inline" action="<?php echo base_url('index.php/agent/cancelTicket/'); ?>" method="GET">
    <div class="form-group">
      <label for="exampleInputName2">To Date</label>
      <input type="text" class="form-control" id="to-date" placeholder="Enter Date" name="fromDate" value="<?php if(isset($_GET['fromDate'])){ echo $_GET['fromDate']; } ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail2">From Date</label>
      <input type="text" class="form-control" id="from-date" placeholder="Enter Date" value="<?php if(isset($_GET['toDate'])){ echo $_GET['toDate']; } ?>" name="toDate" required>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php if(isset($result)){?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Hermes PNR</th>
        <th>Booking ID/PNR</th>
        <th>For Ticket</th>
        <th> DATE</th>
        <th>Canceled PNR Details</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $key=>$print){?>
      <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $print['HermesPNR']; ?></td>
        <td><?php echo $print['AirlinePNR']; ?></td>
        <td><?php echo $print['ForTicket']; ?></td>
        <td><?php echo $print['created']; ?></td>
        <td><?php if($print['CanceledPNRDetails']!=''){?>
          <button type="button"  class="btn btn-primary ftcancel" >Detail</button>
          <div class="cdetails hidden"><?php echo (trim($print['CanceledPNRDetails']))?></div>
          <?php }else{?>
          No Detail Available
          <?php }?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <!-- <button type="button" class="btn btn-info btn-lg" id="cancel-model" data-toggle="modal" data-target="#myModal">Open Modal</button> --> 
  
  <?php echo $this->pagination->create_links(); ?>
  <?php }else{ echo "DATA NOT PRESENT !";}?>
</div>
<script type="text/javascript">
 var html="";
  $(document).ready(function(){    
	  
	  $('#from-date, #to-date').datepicker({dateFormat: 'yy/mm/dd'});
	  
	  $('.ftcancel').on('click',function(){
		  jdata=jQuery.parseJSON($(this).siblings('.cdetails').html());		 
		  parsingjson(jdata);
		  $('#data').html(html);
		  $('#modelshow').modal('show');
	  });
    });
	
    function parsingjson(jdata){
		$.each(jdata, function (key, data) {
					
			if(typeof data=='object' && data!=null){
				parsingjson(data);
			}else{
				html=html+'<strong>'+key+'</strong> : '+data+' <br>';
			}
		});
	}
</script>
<div class="modal fade" id="modelshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Canceled PNR Details</h4>
        <a href=""></a> </div>
      <div class="modal-body">
        <div  id="data"> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('agent/footer');?>

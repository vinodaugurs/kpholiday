<?php $this->load->view('agent/header');?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.1.10.4.min.js');?>"></script>
<div class="container">
  <h2>Wallet Reporting</h2>

  <form class="form-inline" action="<?php echo base_url('index.php/agent/walletReporting/'); ?>" method="GET">
  <div class="form-group">
    <label for="exampleInputName2">To Date</label>
    <input type="text" class="form-control" id="to-date" placeholder="Enter Date" name="fromDate" value="<?php if(isset($_GET['fromDate'])){ echo $_GET['fromDate']; } ?>" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail2">From Date</label>
    <input type="text" class="form-control" id="from-date" placeholder="Enter Date" value="<?php if(isset($_GET['toDate'])){ echo $_GET['toDate']; } ?>" name="toDate" required>
  </div>

  <div class="form-group">
  &nbsp;&nbsp;&nbsp;
    <select name="onlyDMR" class="form-control">
      <option value="">-SELECT-</option>
      <option value="1" <?php echo (isset($_GET['onlyDMR']) and $_GET['onlyDMR']==1)?'selected="selected"':""; ?>> ONLY DMR</option>
    </select>
  &nbsp;&nbsp;&nbsp;
  </div>

  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>

<?php  if(isset($_GET['toDate'])){?>
<a href="<?php echo base_url('index.php/agent/excelDownload/')."?fromDate=".$_GET['fromDate']."&toDate=".$_GET['toDate']; ?>"><button id="excel-print" class="btn btn-primary" style="float:right;">Download Excel File</button></a>
<?php   }else{ ?>

<a href=""><button disabled="disabled" id="excel-print" class="btn btn-primary" style="float:right;">Download Excel File</button></a>

<?php  } ?>
<br><br><br>

<script type="text/javascript">
  $(document).ready(function(){
    $('#from-date, #to-date').datepicker({dateFormat: 'yy/mm/dd'});
    

   
  });

</script>

 

  <?php if(isset($result)){?>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>AGENT CODE</th>
        <th>GIREF ID / TICKET BOOKING ID</th>
        <th>TOTAL AMOUNT</th>

        <th>CREDIT AMOUNT</th>
        <th>DEBIT AMOUNT</th>
        <th>BALANCE</th>
        <th>REASON</th>
        <th> DATE</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($result as $print){?>
      <tr>
        <td><?php echo $print['AGENTCODE']; ?></td>
        <td><?php echo $print['GIREFID']; ?></td>
        <td>
        <?php echo ($print['METHODID']!=0)?($print['BALANCE']+$print['DEBITAMOUNT']):$print['TOTALAMOUNT']; ?></td>
        <td><?php echo $print['CREDITAMOUNT']; ?></td>
        <td><?php echo $print['DEBITAMOUNT']; ?></td>
        <td><?php echo $print['BALANCE']; ?></td>
        <td><?php echo $print['REASON']; ?></td>
        <td><?php echo $print['created']; ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
   <?php echo $this->pagination->create_links(); ?>
  <?php }else{ echo "DATA NOT PRESENT !";}?>
</div>
<?php $this->load->view('agent/footer');?>


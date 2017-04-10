<?php include(APPPATH.'views/home/header.php');?>
<div id="page-wrapper">
<section id="content">
<div class="page-title-container">
  <div class="container">
    <div class="page-title pull-left">
      <h2 class="entry-title">User Agreement</h2>
    </div>
    <ul class="breadcrumbs pull-right">
      <li><a href="#">HOME</a></li>
      <li><a href="#">PAGES</a></li>
      <li class="active">User Agreement</li>
    </ul>
  </div>
</div>
<div class="container">
    <div class="row">
        <div id="main" class="col-md-12 Runningtext">
        	<div class="Register-Page">
                
                
                
                
                <div class="block">
                   
                    <div class="tab-container full-width-style white-bg">
                        <ul class="tabs">
                            <li class="active"><a href="#first-tab" data-toggle="tab"><i class="fa fa-calendar-o"></i> Airline booking</a></li>
                            <li><a href="#second-tab" data-toggle="tab"><i class="fa fa-user"></i>Airline booking</a></li>
                            <li><a href="#third-tab" data-toggle="tab"><i class="fa fa-users"></i>Travellers</a></li>
                            <li><a href="#four-tab" data-toggle="tab"><i class="fa fa-credit-card"></i>QuickBook </a></li>
                            <li><a href="#five-tab" data-toggle="tab"><i class="fa fa-money"></i>eCash</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="first-tab">
                            <h2 class="tab-content-title">Welcome  <?php echo $this->session->userdata('username');?></h2>
                      
                            <div class="tab-container trans-style box">
                              
                            </div>
                              <?php 
                              
                              if(count($booking) != '0'){ ?>
                              <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Sr. No</th><th>PassengerName</th><th>Transaction Id</th><th>Booking Type</th><th>Travel Type</th><th>UserTrackId</th><th>BaseOrigin</th><th>BaseDestination</th><th>HermesPNR</th><th>Issue DataTime</th><th>AirlineDetails</th><th>Arrivaldatetime</th><th>DepartureDateTime</th><th>ClassCodeDesc</th><th>Cancel</th><th>Detail</th>
                              </tr>
                            </thead>

                              
                            <tbody>
                            <?php foreach ($booking as $flight) { ?>

                              <tr>
                                <td><?= $flight['id'] ?></td>
                                <td><?= $flight['PassengerName'] ?></td>
                                <td><?= $flight['TransactionId'] ?></td>
                                <td><?php 
                                $type = $flight['BookingType'];
                                if($type == 'R'){echo "Roundtrip";}else{ echo "One Way";} ?></td>

                                <td><?php $type = $flight['TravelType'];
                                if($type == 'D'){echo "Domistic"; }else{echo "International";}
                                 ?></td>
                                
                                <td><?= $flight['UserTrackId'] ?></td>
                                <td><?= $flight['BaseOrigin'] ?></td>
                                <td><?= $flight['BaseDestination'] ?></td>
                                <td><?= $flight['HermesPNR']?></td>
                                <td><?= $flight['IssueDatTime']?></td>
                                <td><!--<?php// $jsonData = $flight['AirlineDetails']; 
                                         // $flightDetail = json_decode($jsonData, true);
                                           // foreach($flightDetail as $PassengerDetail){
                                             // echo implode(" ", $PassengerDetail);  
                                            //}
                        ?>-->
                                          </td>
                                <td><?= $flight['Arrivaldatetime'] ?></td>
                                <td><?= $flight['DepartureDateTime'] ?></td>
                                

                                <td><?php  echo wordwrap($flight['ClassCodeDesc'],5,"<br>\n");  ?></td>
                                <td><input type="button" Value="Cancel" /></td>
                                <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalStatus">Open Modal</button></td>
                              </tr>
                            <?php } ?>
                            </tbody>

                          </table>
                          <?php }else{
                              echo "NO DATA IN THIS RECORD";
                              } ?>
                            </div>

                            <div class="tab-pane fade" id="second-tab">
                                <h2 class="tab-content-title">User Profile </h2>
                                
                                secoud tab
                                

                            </div>
                            <div class="tab-pane fade" id="third-tab">
                                <h2 class="tab-content-title">Travellers </h2>
                            </div>
                            
                            <div class="tab-pane fade" id="four-tab">
                                <h2 class="tab-content-title">QuickBook</h2>
                            </div>
                            
                            <div class="tab-pane fade" id="five-tab">
                                <h2 class="tab-content-title">eCash</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            	<div class="clearfix"></div><!--clearfix-->
            
            
            
            </div><!--Register-Page-->
           
              
        
        </div>
    <!--#main-->
    </div>
<!--row-->
</div>
<!--container-->
</section>
<!--content-->
</div>
<!--page-wrapper-->

<?php include APPPATH.'views/home/footer.php';?>




  <div class="modal fade" id="myModalStatus" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail</h4>
        </div>
        <div class="modal-body">

        <?php $jsonData = $flight['AirlineDetails'];
                 $flightDetail = json_decode($jsonData, true);
                 echo "Column No:".count($flightDetail)."<br>";
                 // print_r($flightDetail);
                   foreach($flightDetail as $PassengerDetail){
                     // echo implode(" ", $PassengerDetail);
                     // print_r($PassengerDetail);  
        ?>

          <label>AirlineCode :</label>   <span><?= $PassengerDetail[0]['AirlineCode'] ?></span><br/>
          <label>AirlinePNR :</label>  <span><?= $PassengerDetail[0]['AirlinePNR'] ?> </span><br/>
          <label>AirlineName :</label>  <span> <?= $PassengerDetail[0]['AirlineName'] ?></span><br/>
          <label>Address1 :</label>  <span><?= $PassengerDetail[0]['Address1'] ?></span><br/>
          <label>Address2 :</label>  <span><?= $PassengerDetail[0]['Address2'] ?></span><br/>
          <label>City :</label>  <span><?= $PassengerDetail[0]['City'] ?></span><br/>
          <label>ContactNumber :</label>  <span><?= $PassengerDetail[0]['ContactNumber'] ?></span><br/>
          <label>FaxNumber :</label>  <span><?= $PassengerDetail[0]['FaxNumber'] ?></span><br/>
          <label>EMailId :</label>  <span><?= $PassengerDetail[0]['EMailId'] ?></span><br/>

          <?php } ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



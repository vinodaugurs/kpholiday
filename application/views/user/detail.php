<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div class="container">
<h3>Airline Booking</h3>
<div class="row">
<div class="col-sms-6 col-sm-8 col-md-9">
<div class="table-responsive">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>PassengerName</th>
        <th>Transaction Id</th>
        <th>Booking Type</th>
        <th>Travel Type</th>
        <th>UserTrackId</th>
        <th>BaseOrigin</th>
        <th>BaseDestination</th>
        <th>HermesPNR</th>
        <th>Issue DataTime</th>
        <th>AirlineDetails</th>
        <th>Arrivaldatetime</th>
        <th>DepartureDateTime</th>
        <th>ClassCodeDesc</th>
        <th>Cancel</th>
        <th>Detail</th>
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
  </div>
  </div>
  </div>
</div>


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




<!-- [[{"AirlineCode":"test6E","AirlinePNR":"MYJ1HD","AirlineName":"Indigo","Address1":"Level 1,Tower C","Address2":"Global Business ParkMehrauli-Gurgaon Road","City":"Gurgaon","ContactNumber":"0124-4352500","FaxNumber":"0124-4068536","EMailId":"contacts@indigo.com"}]] -->


<!--
Array ( [0] => Array ( [0] => Array ( [AirlineCode] => 6E [AirlinePNR] => Z6P5VS [AirlineName] => Indigo [Address1] => Level 1,Tower C [Address2] => Global Business ParkMehrauli-Gurgaon Road [City] => Gurgaon [ContactNumber] => 0124-4352500 [FaxNumber] => 0124-4068536 [EMailId] => contacts@indigo.com ) ) )


 Array ( [0] => Array ( [AirlineCode] => 6E [AirlinePNR] => Z6P5VS [AirlineName] => Indigo [Address1] => Level 1,Tower C [Address2] => Global Business ParkMehrauli-Gurgaon Road [City] => Gurgaon [ContactNumber] => 0124-4352500 [FaxNumber] => 0124-4068536 [EMailId] => contacts@indigo.com ) ) -->

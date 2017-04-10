
<div class="container">
<h3>Airline Booking</h3>
<div style="width: 50%">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>PassengerName</th>
        <th>Transaction Id</th>
        <th>BaseOrigin</th>
        <th>BaseDestination</th>
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
        <td><?= $flight['BaseOrigin'] ?></td>
        <td><?= $flight['BaseDestination'] ?></td>
        <td><!--<?php// $jsonData = $flight['AirlineDetails']; 
                 // $flightDetail = json_decode($jsonData, true);
                   // foreach($flightDetail as $PassengerDetail){
                     // echo implode(" ", $PassengerDetail);  
                    //}
?>-->
                  </td>
        <td><?= $flight['Arrivaldatetime'] ?></td>
        <td><?= $flight['DepartureDateTime'] ?></td>
        

        <td><!-- <?php//  echo wordwrap($flight['ClassCodeDesc'],5,"<br>\n");  ?> --></td>
        <td><input type="button" Value="Cancel" /></td>
        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>



  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>















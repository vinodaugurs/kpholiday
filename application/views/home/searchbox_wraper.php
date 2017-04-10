<style>
/*.Select-Origin-Div{ width:140px;
}
.Select-Origin-Div2{ width:103px;
}
*/




</style>

<div class="Header-Banner">

        

      <div class="search-box-wrapper1">

      <div class="search-box1 container" style="position:relative;">

      <div class="search-form">

      

	  

        <ul class="search-tabs clearfix">

        	<li class="active"><a href="#flights-tab" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Flights-f.png');?>" alt=""/></span>&nbsp;&nbsp;FLIGHTS</a></li>

          	<li><a href="#hotels-tab" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Hotels-f-2.png');?>" alt=""/></span>&nbsp;&nbsp;HOTELS</a></li>

          

          	<!--<li><a href="#flight-and-hotel-tab" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Hotels-f-1.png');?>" alt=""/></span>&nbsp;&nbsp;FLIGHT &amp; HOTELS</a></li>&nbsp;-->

            

          	<li><a href="#Holidays" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Holidays-f.png');?>" alt=""/></span>&nbsp;&nbsp;Holidays</a></li>

          	<li><a href="#Buses" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Buses-f.png');?>" alt=""/></span>&nbsp;&nbsp;Buses</a></li>

           <!-- <li><a href="#Cab" data-toggle="tab"><span><img src="<?php echo base_url('assets/img/Cab-f.png');?>" alt=""/></span>&nbsp;&nbsp;Cab</a></li>
-->
        </ul>

        <div class="visible-mobile">

          <ul id="mobile-search-tabs" class="search-tabs clearfix">

          

          	<li class="active"><a href="#flights-tab">FLIGHTS</a></li>

            <li ><a href="#hotels-tab">HOTELS</a></li>

           <!-- <li><a href="#flight-and-hotel-tab">FLIGHT &amp; HOTELS</a></li>-->

            <li><a href="#Holidays">Holidays</a></li>

            <li><a href="#Buses">Buses</a></li>



          </ul>

        </div>

		

        <div class="search-tab-content container-fluid">

          <div class="tab-pane fade" id="hotels-tab">

            <form action="<?php echo base_url('index.php/hotel/hotel_list');?>" method="post">

              <div class="row">
   <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio"  checked="checked" name="hotel_mode"   value="Domestic"  id="hotel_domestic" class="R"/>

                Domestic 

              </label>

			</div>

            

          </div>
          
          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="hotel_mode"    class="way" id="hotel_internationl"  value="International">

                International

              </label>

			</div>

            

          </div>

          <div class=" clearfix"></div>
                <div class="form-group col-sm-6 col-md-3">

               

                  <label>Your Destination</label>

                  <input type="text" id="hotel_city" name="city" required="required" class="search input-text full-width" placeholder="Select City, Area or Hotel..." />
				 <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="HotelDropdownCountry">

                      </ul>
                </div>

                <div class="form-group col-sm-6 col-md-4">

                  

                  <div class="row">

                    <div class="col-xs-6">

                      <label>Check In</label>

                      <div class="datepicker-wrap">

                        <input type="text" name="checkin" required="required" class="input-text full-width" placeholder="mm/dd/yy" />

                      </div>

                    </div>

                    <div class="col-xs-6">

                      <label>Check Out</label>

                      <div class="datepicker-wrap">

                        <input type="text" name="checkout" required="required" class="input-text full-width" placeholder="mm/dd/yy" />

                      </div>

                    </div>

                  </div>

                </div>

                <div class="form-group col-sm-6 col-md-3">

                 

                  <div class="row">

                    <div class="col-xs-4">

                      <label>Rooms</label>

                      <div class="selector">

                        <select name="rooms" required="required" class="full-width">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          

                        </select>

                      </div>

                    </div>

                    <div class="col-xs-4">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select name="adults" required="required" class="full-width">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                    <div class="col-xs-4">

                      <label>Kids(0-11)</label>

                      <div class="selector">

                        <select name="kids" class="full-width">
						<option value="0">00</option>
                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="form-group col-sm-6 col-md-2 fixheigh1t">

                  <label class="hidden-xs">&nbsp;</label>

                  <button name="hotel" value="search" type="submit" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1">SEARCH NOW</button>

                </div>

              </div>

            </form>

          </div>

          <div class="tab-pane fade active in" id="flights-tab">

            <form id="flight"  method="post"   action="<?php echo base_url('index.php/flight/flight_list');?>">

            

           
          

          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" checked="checked" name="flight_mode"   value="Domestic"  id="Domestic2" class="R"/>

                Domestic 

              </label>

			</div>

            

          </div>
          
          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="flight_mode"   class="way" id="International"  value="International">

                International

              </label>

			</div>

            

          </div>

          <div class=" clearfix"></div>
          
           <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" checked="checked" name="way" onclick="$('#arrive').prop('disabled', true);$('#arrive').parent().find('img').addClass('hidden');"  class="way" id="inlineRadio1"  value="O">

                One Way

              </label>

			</div>

            

          </div>


          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="way"  value="R" onclick="$('#arrive').prop('disabled', false);$('#arrive').parent().find('img').removeClass('hidden');"  id="inlineRadio2" class="R"/>

                Round Trip 

              </label>

			</div>

            

          </div>


            <div class=" clearfix"></div>

              <div class="row">

              

              <div class="col-sm-1 Select-Origin-Div2" style="padding-right:0;">

              <div class="form-group">

               <label>Select Origin</label>

                    <input type="text" required="required" class="input-text full-width" placeholder="Select Origin" name="source" id="source" />

                  </div>

              

              </div>

               <div class="col-sm-2 Select-Origin-Div">

               <div class="form-group">

                    <label>Select Destination</label>

                    <input type="text" required="required" class="input-text full-width" placeholder="Select Destination" name="destination" id="destination"  />

                  </div>

               

               

               </div>

		<div class="col-xs-1 Select-Origin-Div2" style="padding-left:0px;">
         <div class="form-group">

                      <label>Class</label>

                      <div class="selector">

                        <select name="ClassType" required="required" class="full-width">

                          <option value="Economy">Economy</option>

                          <option value="Business">Business</option>

                        </select>

                      </div>
	</div>
                    </div>
                <div class="col-md-2 col-sm-2" style="padding-left:0; padding-right:0px;">

                	

                    <div class="col-sm-6 col-xs-6" style=" padding-left:0px; padding-right:0px;">

                    <label>Departing On</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Departing On" required="required" name="departure" id="departure" />

                      </div>

                    </div>

                    

                    <div class="col-sm-6 col-xs-6" style=" padding-right:0px;">

                    <label>Return On</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" disabled="disabled" class="input-text full-width" required="required" placeholder="Return On" name="arrive" id="arrive"/>

                      </div>

                    </div>

                    

                </div>

               

                <div class="col-sm-1 col-xs-4" style="">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select class="full-width" required name="adult">

                          <option value="1">1</option>

                          <option value="2">2</option>

                          <option value="3">3</option>

                          <option value="4">4</option>

						  <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                <div class="col-sm-1 col-xs-4">

                      <label>Kids(2-11)</label>

                      <div class="selector">

                        <select class="full-width"  name="child">

                          <option value="0">0</option>

						  <option value="1">1</option>

                          <option value="2">2</option>

                          <option value="3">3</option>

                          <option value="4">4</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                    

                    <div class="col-sm-1 col-xs-4" style="padding:0px;">

                      <label>Infants(0-2)</label>

                      <div class="selector">

                        <select class="full-width" name="infant">

						   <option value="0">0</option>

                          <option value="1">1</option>

                          <option value="2">2</option>

                          <option value="3">3</option>

                          <option value="4">4</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                

                 <div class="col-md-2 col-sm-1 col-xs-12">

                 	<label>&nbsp;</label>

                 <button class="full-width icon-check" id="clickme" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" >SEARCH NOW</button>



                 </div>



                 

              </div>

            </form>

          </div>

		  

		  

          <div class="tab-pane fade" id="flight-and-hotel-tab">

            

            <form action="flight-list-view.html" method="post">

            

            <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>

                One Way

              </label>

			</div>

            

          </div>

          

          

          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>

                Round Trip 

              </label>

			</div>

            

          </div>

            <div class=" clearfix"></div>

              <div class="row">

              

              <div class="col-sm-2">

              <div class="form-group">

               <label>Select Origin</label>

                    <input type="text" class="input-text full-width" placeholder="Select Origin" />

                  </div>

              

              </div>

               <div class="col-sm-2">

               <div class="form-group">

                    <label>Select Destination</label>

                    <input type="text" class="input-text full-width" placeholder="Select Destination" />

                  </div>

               

               

               </div>

                <div class="col-sm-3">

                	

                    <div class="col-sm-6">

                    <label>Depart Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Depart Date" />

                      </div>

                    </div>

                    

                    <div class="col-sm-6">

                    <label>Return Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Return Date" />

                      </div>

                    </div>

                    

                  

                

                

                </div>

                

                <div class="col-xs-1">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select class="full-width">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                <div class="col-xs-1">

                      <label>Kids(2-11)</label>

                      <div class="selector">

                        <select class="full-width">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                    

                    <div class="col-xs-1">

                      <label>Infants(0-2)</label>

                      <div class="selector">

                        <select class="full-width">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select>

                      </div>

                    </div>

                

                

                

                

                

                 <div class="col-sm-2">

                 	<label>&nbsp;</label>

                 <button class="full-width icon-check">SEARCH NOW</button>

                 

                 

                 </div>



                 

              </div>

            </form>

          </div>

          <div class="tab-pane fade" id="Holidays">

            <form action="<?php  echo base_url('index.php/package/all_package');?>" method="post">

            <div class="row">
                  <div class="col-md-3">
                   <label>DESTINATION</label>

                      <input type="text" id="destination_place" name="destination" class="form-control" placeholder="Mumbai" required>

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>

<script type="text/javascript">
  $(document).ready(function(){

    $("#destination_place").autocomplete( {
    source: function(request,response) {
    console.log($('#Domestic2').is(':checked'));
    var data = $('#destination_place').val();
        $.ajax ( {
          url: "<?php echo base_url('index.php/Dashboard/get_place'); ?>",
          data:{mail:data},
          type:'post',
          dataType: "json",
       crossDomain: true,
          success: function(data) {           
      response( $.map( data.myData, function( item ) {
                return {
                    label: item.city,
                    value: item.CODE
                }
            }));
          } 
    }) }
 });



    // $('#destination_place').keyup(function(){
    //     var data = $('#destination_place').val();
    //   $.ajax({
    //     type:'post',
    //     url:'<?php echo base_url('index.php/Dashboard/get_place'); ?>',
    //     data:{mail:data},
    //     success:function(data)
    //            {     
    //       // alert(data);
          
          
    //        }
    //   });
    // });


  });  
</script> 



                  <div class="col-md-3">
                   <label>BUDGET</label>
						
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></div>
                        <input type="number" name="budget" class="form-control" placeholder="BUDGET" required>
                        
                      </div>
                    </div>
                        
                        
                        
                      

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>


                  <div class="col-md-3">
                   <label>FROM</label>

                      <div class="datepicker-wrap-package">
                      <input type="text" name="checkin" id="txtFromDate" class="form-control datepicker" placeholder="28 FEB 2015 WEDNESDAY"                                required>

                      
                      </div>

                  </div>


                  <div class="col-md-3">
                   <label>To</label>


                      <div class="datepicker-wrap-package">
                      <input type="text"  name="checkout" id="txtToDate" data-format="yyyy-mm-dd" class="form-control datepicker" placeholder="28 FEB 2015 WEDNESDAY" required>

                      
                      </div>

                  </div>


            </div>              

              <div class="row">

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Rooms</label>

                      <div class="selector">

                        <select class="full-width" required="required" name="rooms">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          

                        </select><span class="custom-select full-width">01</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Adults(12+)</label>

                      <div class="selector">

                        <select class="full-width" required="required" name="adults">

                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select><span class="custom-select full-width">01</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>Kids(0-11)</label>

                      <div class="selector">

                        <select class="full-width" name="kids">
            <option value="0">00</option>
                          <option value="1">01</option>

                          <option value="2">02</option>

                          <option value="3">03</option>

                          <option value="4">04</option>
                          <option value="5">05</option>
                          <option value="6">06</option>
                          <option value="7">07</option>
                          <option value="8">08</option>
                          <option value="9">09</option>

                        </select><span class="custom-select full-width">00</span>

                      </div>

                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">

                      <label>&nbsp;</label>

                      <button class="icon-check full-width">SEARCH NOW</button>

                    </div>

              </div>


              <!-- <div class="row">

                  <div class="col-md-4">

                  

                   <label>Leaving from</label>

                      <input type="text" class="input-text full-width"id="country" autocomplete="off" placeholder="Leaving from" name="leaving"/>

                      <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry">

                      </ul>

                  </div>

                  <div class="col-md-4">

                  

                   <label>Going to</label>

                      <input type="text" class="input-text full-width" placeholder="Going to"  id="package_source" name="destination" />

                  

                  

                  </div>

                

                

                <div class="col-md-4">

                  <div class="form-group row">

                    <div class="col-sm-6">

                    <label>Depart Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Depart Date" readonly="true" name="date" />

                      </div>

                    </div>

                    

                    <div class="col-xs-6">

                      <label>&nbsp;</label>

                      <button class="icon-check full-width">SEARCH NOW</button>

                    </div>

                  </div>

                </div>

                <div class="clearfix"></div>

              </div> -->

              

              

              

            </form>

          </div>

          <div class="tab-pane fade" id="Buses">

            <form action="<?php echo base_url('index.php/bus/bus_list');?>" method="post">

              

              <form action="flight-list-view.html" method="post">

            

            <!--<div class=" col-sm-2">

            <div class="radio">

              <label>

                <input type="radio" name="way" id="busoneway" onclick="$('#bus_returnDate').prop('disabled', true);" value="O" checked>

                One Way

              </label>

			</div>

            

          </div>-->

          

          

          <!--<div class=" col-sm-2">

            <div class="radio">

              <label>

                <input type="radio" name="way" id="busround" onclick="$('#bus_returnDate').prop('disabled', false);" value="R" >

                Round Trip 

              </label>

			</div>

            

          </div>-->

            <div class=" clearfix"></div>

              <div class="row">

              

              <div class="col-sm-2">

              <div class="form-group">

               <label>Select Origin</label>

                    <input type="text" name="Origin" id="bus_origin" required="required" class="input-text full-width" placeholder="Select Origin" />
					 <input type="hidden" name="bus_origin_code" id="bus_origin_code" required="required" class="input-text full-width" placeholder="Select Origin" />
                  </div>

              

              </div>

               <div class="col-sm-2">

               <div class="form-group">

                    <label>Select Destination</label>

                    <input type="text" name="Destination" disabled="disabled" id="bus_destination" required="required"  class="input-text full-width" placeholder="First chose  Origin" />
					<input type="hidden" name="bus_destination_code" id="bus_destination_code" required="required"  class="input-text full-width" placeholder="Select Destination" />
                  </div>

               

               

               </div>

                <div class="col-sm-3">

                	

                    <div class="col-sm-12">

                    <label>Depart Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" name="bus_departureDate" id="bus_departureDate" required="required" class="input-text full-width" placeholder="Depart Date" />

                      </div>

                    </div>

                    

                    <!--<div class="col-sm-6">

                    <label>Return Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" required="required" disabled="disabled" name="bus_returnDate" id="bus_returnDate" class="input-text full-width" placeholder="Return Date" />

                      </div>

                    </div>
-->
                    

                </div>

                

            <div class="col-xs-3">

                

             <label>&nbsp;</label>

			<div class="input-group number-spinner">

            

				<span class="input-group-btn data-dwn">

					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;"  id="sub" type="button"><span class="glyphicon glyphicon-minus"></span></button>

				</span>

				<input type="text" title="Seats" name="Seats" class="form-control text-center" placeholder="1 Seats" value="1" min="-1" max="40" id="value">

				<span class="input-group-btn data-up">

					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;"  id="add" type="button"><span class="glyphicon glyphicon-plus"></span></button>

				</span>

			</div>

	

                      

                    </div>

                    

                 <div class="col-sm-2">

                 	<label>&nbsp;</label>

                 <button name="bus" value="search" class="full-width icon-check">SEARCH NOW</button>

                 

                 

                 </div>



                 

              </div>

            </form>

              

              

            </form>

          </div>

          

          

          <div class="tab-pane fade" id="Cab">

            <form action="<?php echo base_url('index.php/Cab/cab_list');?>" method="post">

              

              <form action="flight-list-view.html" method="post">

            

            <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>

                One Way

              </label>

			</div>

            

          </div>

          

          

          <div class=" col-sm-2 col-xs-6">

            <div class="radio">

              <label>

                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>

                Round Trip 

              </label>

			</div>

            

          </div>

            <div class=" clearfix"></div>

              <div class="row">

              

              <div class="col-sm-2">

              <div class="form-group">

               <label>Select Origin</label>

                    <input type="text" class="input-text full-width" placeholder="Select Origin" />

                  </div>

              

              </div>

               <div class="col-sm-2">

               <div class="form-group">

                    <label>Select Destination</label>

                    <input type="text" class="input-text full-width" placeholder="Select Destination" />

                  </div>

               

               

               </div>

                <div class="col-sm-3">

                	

                    <div class="col-sm-6">

                    <label>Depart Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Depart Date" />

                      </div>

                    </div>

                    

                    <div class="col-sm-6">

                    <label>Return Date</label>

                      <div class="datepicker-wrap">

                       

                        <input type="text" class="input-text full-width" placeholder="Return Date" />

                      </div>

                    </div>

                    

                  

                

                

                </div>

                

                

                <div class="col-xs-3">

                

                      <label>&nbsp;</label>

			<div class="input-group number-spinner">

            

				<span class="input-group-btn data-dwn">

					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" ><span class="glyphicon glyphicon-minus"></span></button>

				</span>

				<input type="text" class="form-control text-center" value="1 Seats" min="-10" max="40" id="value">

				<span class="input-group-btn data-up">

					<button class="btn btn-default btn-info" style="background-color:#fdb714; border-color:#fdb714;" ><span class="glyphicon glyphicon-plus"></span></button>

				</span>

			</div>

	

                      

                    </div>

                    

                 <div class="col-sm-2">

                 	<label>&nbsp;</label>

                 <button class="full-width icon-check">SEARCH NOW</button>

                 

                 

                 </div>



                 

              </div>

            </form>

              

              

            </form>

          </div>

          

          

          

          

          <div class="tab-pane fade" id="flight-status-tab">

            <form action="flight-list-view.html" method="post">

              <div class="row">

                <div class="col-md-6">

                  <h4 class="title">Where</h4>

                  <div class="form-group row">

                    <div class="col-xs-6">

                      <label>Leaving From</label>

                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />

                    </div>

                    <div class="col-xs-6">

                      <label>Going To</label>

                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />

                    </div>

                  </div>

                </div>

                <div class="col-xs-6 col-md-2">

                  <h4 class="title">When</h4>

                  <div class="form-group">

                    <label>Departure Date</label>

                    <div class="datepicker-wrap">

                      <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />

                    </div>

                  </div>

                </div>

                <div class="col-xs-6 col-md-2">

                  <h4 class="title">Who</h4>

                  <div class="form-group">

                    <label>Flight Number</label>

                    <input type="text" class="input-text full-width" placeholder="enter flight number" />

                  </div>

                </div>

                <div class="form-group col-md-2 fixheight">

                  <label class="hidden-xs">&nbsp;</label>

                  <button class="icon-check full-width">SEARCH NOW</button>

                </div>

              </div>

            </form>

          </div>

          <div class="tab-pane fade" id="online-checkin-tab">

            <form>

              <div class="row">

                <div class="col-md-6">

                  <h4 class="title">Where</h4>

                  <div class="form-group row">

                    <div class="col-xs-6">

                      <label>Leaving From</label>

                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />

                    </div>

                    <div class="col-xs-6">

                      <label>Going To</label>

                      <input type="text" class="input-text full-width" placeholder="enter a city or place name" />

                    </div>

                  </div>

                </div>

                <div class="col-xs-6 col-md-2">

                  <h4 class="title">When</h4>

                  <div class="form-group">

                    <label>Departure Date</label>

                    <div class="datepicker-wrap">

                      <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />

                    </div>

                  </div>

                </div>

                <div class="col-xs-6 col-md-2">

                  <h4 class="title">Who</h4>

                  <div class="form-group">

                    <label>Full Name</label>

                    <input type="text" class="input-text full-width" placeholder="enter your full name" />

                  </div>

                </div>

                <div class="form-group col-md-2 fixheight">

                  <label class="hidden-xs">&nbsp;</label>

                  <button class="icon-check full-width">SEARCH NOW</button>

                </div>

              </div>

            </form>

          </div>

        </div>

		



      </div>

      </div>

    </div>

        

        

   </div><!--Header-Banner--> 

  

  

  

<script>
var domestic_citys= new Array();
 var international_citys= new Array();
  $(document).ready(function () {
	

$("#add").click(function(){
  var data = parseInt($("#value").val());
  if(data<=9){
  
  var data = data+1;
  $("#value").val(data);

  }else{
    alert("Not More Then 10");
  }

});

$("#sub").click(function(){
  var data = $("#value").val();
  if(data>1){
  
  var data = data-1;
  $("#value").val(data);

  }else{
    alert("Must Greater Then Zero");
  }

});



    $("#country").keyup(function () {

        $.ajax({

            type: "POST",

            url: "<?php echo base_url('index.php/package/city_search');?>",

            data: {

                keyword: $("#country").val()

            },

            dataType: "json",

            success: function (data) {

                if (data.length > 0) {

                    $('#DropdownCountry').empty();

                    $('#country').attr("data-toggle", "dropdown");

                    $('#DropdownCountry').dropdown('toggle');

                }

                else if (data.length == 0) {

                    $('#country').attr("data-toggle", "");

                }

                $.each(data, function (key,value) {

                    if (data.length >= 0)

                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');

                });

            }

        });

    });

    $('ul.txtcountry').on('click', 'li a', function () {

        $('#country').val($(this).text());

    });
	
	
	//add city in hotels 
	
	
 
/* $.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_city');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   domestic_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });*/
 
 /*$.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_cityInternational');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   international_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					 $("#hotel_city").attr("placeholder", "Select City, Area or Hotel...");
					 $("#hotel_city").removeAttr("disabled"); 
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });
*/
setTimeout(function(){
$("#arrive").parent().find('img').addClass('hidden');
},200);
});
var myArr = [];

/*function getInternationcitysHotel(){
	if(international_citys.length > 0) {
		$("#hotel_city").autocomplete({
						 source: international_citys,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
	}else{
	 $("#hotel_city").val('');	
	 $("#hotel_city").attr("placeholder", "Please wait Hotel city loading");
	// $("#hotel_city").attr("disabled", "disabled"); 
	$.ajax({
   type: "GET",
   url: "<?php echo base_url('index.php/hotel/get_cityInternational');?>", // change to full path of file on server   
   success: function (xmlDoc) {
	   			var myArr = [];
				  xml = $( xmlDoc ),
  				  CityDetailsResult = xml.find( "CityNames" );
	   			$(xml).find("CityName").each(function()
				   {
					 myArr.push($(this).text());
				   });
				   international_citys=myArr;
				   if (myArr.length > 0) {
					   $("#hotel_city").autocomplete({
						 source: myArr,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
					 $("#hotel_city").attr("placeholder", "Select City, Area or Hotel...");
					 $("#hotel_city").removeAttr("disabled"); 
					   }
   			},
  
   failure: function(data) {
     alert("XML File could not be found");
   }
 });
	}
}

function getDomesticcityHOtel(){
	$("#hotel_city").autocomplete({
						 source: domestic_citys,
						 minLength: 3,
						 select: function(event, ui) {
						   $("#hotel_city").val(ui.item.value);
						   //$("#searchForm").submit();
						 }
					 });
}*/
$(document).ready(function(e) {
    var x = location.hash;
	settab(x);
});
</script>


  
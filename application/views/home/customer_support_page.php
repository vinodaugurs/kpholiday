<?php  include'header.php';?>
<div id="page-wrapper">
  <section id="content">
    <div class="page-title-container">
      <div class="container">
        <div class="page-title pull-left">
          <h2 class="entry-title">My Booking</h2>
        </div>
        <ul class="breadcrumbs pull-right">
          <li><a href="#">HOME</a></li>
          <li><a href="#">PAGES</a></li>
          <li class="active">My Booking</li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div id="main" class="col-md-12 Runningtext">
          <div class="Register-Page">
            <div class="tab-container style1 box">
              <ul class="tabs">
                <li class="active"><a href="#unlimited-layouts" data-toggle="tab">FAQs</a></li>
                <li class=""><a href="#design-inovation" data-toggle="tab">Contact Us by Email</a></li>
                <li class=""><a href="#best-support" data-toggle="tab">Complaint/Feedback</a></li>
                <li class=""><a href="#8-sliders" data-toggle="tab">Phone Support</a></li>
                <li class=""><a href="#9-sliders" data-toggle="tab">Visit Your Local Store</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="unlimited-layouts">
                  <h4>FAQs</h4>
                  <div>
                    <div class=" col-sm-4 Faqs-Left">
                      <ul>
                        <li><a href="#">How do I cancel my booking?</a></li>
                        <li><a href="#">How can I print my e-tickets?</a></li>
                        <li><a href="#">Do you provide travel insurance?</a></li>
                        <li><a href="#">Do you provide any visa assistance?</a></li>
                        <li><a href="#" target="_blank">What are the various payment options?</a></li>
                        <li><a href="#">How can I track my refund/credit status?</a></li>
                        <li><a href="#">How can I cancel my hotel booking?</a></li>
                      </ul>
                    </div>
                    <!--Faqs-Left-->
                    <div class="col-sm-6">
                      <div class="col-md-6 col-sm-10">
                        <div class="Faqs-Right">
                          <ul>
                            <li><strong>Didn't find your answer?</strong></li>
                            <li><a href="#">View all FAQs</a></li>
                          </ul>
                          <ul class="nobbdr">
                            <li><strong>Or try Searching:</strong></li>
                            <li style="height:10px;"></li>
                            <li>
                              <input  type="text" name="" value="" style="width:100%;" >
                            </li>
                            <li style="height:10px;"></li>
                            <li >
                              <input value="Search" type="button" class="btn btn-primary" style="width:100px; float:right;" >
                            </li>
                          </ul>
                          <div class=" clearfix"></div>
                        </div>
                      </div>
                    </div>
                    <!--Faqs-Right-->
                    
                    <div class=" clearfix"></div>
                  </div>
                </div>
                <div class="tab-pane fade" id="design-inovation">
                  <h4>Contact Us by Email</h4>
                  <form id="form1" name="form1" method="post" action="">
                    <div class="Contact-Row">
                      <div class=" col-sm-6">
                        <div  class=" col-sm-4">Name*</div>
                        <div class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Name*">
                        </div>
                        <div class=" clearfix"></div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Email ID*</div>
                        <div  class=" col-sm-8">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email ID*">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Contact Number*</div>
                        <div  class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Contact Number*">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4"> Yatra Reference Number</div>
                        <div  class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Yatra Reference Number">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Select Travel Product*</div>
                        <div  class=" col-sm-8">
                          <select name="select">
                            <option selected="selected" value="">Select Travel Product*</option>
                            <option value="Domestic flights">Domestic Flights</option>
                            <option value="Domestic Hotels">Domestic Hotel</option>
                            <option value="Domestic Holidays">Domestic Holidays</option>
                            <option value="International Flights">International Flights</option>
                            <option value="International Hotels and Packages">International Holidays &amp; Hotels</option>
                            <option value="Rail">Rail</option>
                            <option value="Bus">Bus</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Choose Feedback Type*</div>
                        <div  class=" col-sm-8">
                          <select name="select2">
                            <option selected="selected" value="">Please Choose Feedback Type*</option>
                            <option value="Amendment">Amendment</option>
                            <option value="Booking Query">Booking Query</option>
                            <option value="Cancellations">Cancellation</option>
                            <option value="Service Quality">Service Quality</option>
                            <option value="E-ticket/vouchers">E-ticket/vouchers</option>
                            <option value="Promotion">Promotions</option>
                            <option value="Refund">Refund</option>
                            <option value="Website Error">Website Error</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <div class="col-sm-4"> Upload a file<br />
                        <input type="file" name="file" onchange=""  size="36">
                      </div>
                    </div>
                    <div  class="Contact-Row">
                      <div class="col-md-2 col-sm-3"> Questions/Comments </div>
                      <div class="col-sm-8">
                        <textarea class="subjectBox" style="width:100%; height:100px;"  name="questions"></textarea>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <input type="button" class="btn btn-primary pull-right" onclick="contactFormValidate()" value="Send">
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="best-support">
                  
                  
                  
                  
                  
                  <div class="tab-container style1 box">
                                    <ul class="tabs">
                                        <li class="active"><a href="#New-Complaint" data-toggle="tab">1. New Complaint</a></li>
                                        <li><a href="#Unresolved-Complaint" data-toggle="tab">2. Unresolved Complaint</a></li>
                                        <li><a href="#WritetoManagement" data-toggle="tab">3. Write to Management</a></li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="New-Complaint">
                                          <form id="form1" name="form1" method="post" action="">
                    <div class="Contact-Row">
                      <div class=" col-sm-6">
                        <div  class=" col-sm-4">Name*</div>
                        <div class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Name*">
                        </div>
                        <div class=" clearfix"></div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Email ID*</div>
                        <div  class=" col-sm-8">
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email ID*">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Contact Number*</div>
                        <div  class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Contact Number*">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4"> Yatra Reference Number</div>
                        <div  class=" col-sm-8">
                          <input type="text" class="form-control" placeholder="Yatra Reference Number">
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Select Travel Product*</div>
                        <div  class=" col-sm-8">
                          <select name="select">
                            <option selected="selected" value="">Select Travel Product*</option>
                            <option value="Domestic flights">Domestic Flights</option>
                            <option value="Domestic Hotels">Domestic Hotel</option>
                            <option value="Domestic Holidays">Domestic Holidays</option>
                            <option value="International Flights">International Flights</option>
                            <option value="International Hotels and Packages">International Holidays &amp; Hotels</option>
                            <option value="Rail">Rail</option>
                            <option value="Bus">Bus</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div  class=" col-sm-4">Choose Feedback Type*</div>
                        <div  class=" col-sm-8">
                          <select name="select2">
                            <option selected="selected" value="">Please Choose Feedback Type*</option>
                            <option value="Amendment">Amendment</option>
                            <option value="Booking Query">Booking Query</option>
                            <option value="Cancellations">Cancellation</option>
                            <option value="Service Quality">Service Quality</option>
                            <option value="E-ticket/vouchers">E-ticket/vouchers</option>
                            <option value="Promotion">Promotions</option>
                            <option value="Refund">Refund</option>
                            <option value="Website Error">Website Error</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <div class="col-sm-4"> Upload a file<br />
                        <input type="file" name="file" onchange=""  size="36">
                      </div>
                    </div>
                    <div  class="Contact-Row">
                      <div class="col-md-2 col-sm-3"> Questions/Comments </div>
                      <div class="col-sm-8">
                        <textarea class="subjectBox" style="width:100%; height:100px;"  name="questions"></textarea>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="Contact-Row">
                      <input type="button" class="btn btn-primary pull-right" onclick="contactFormValidate()" value="Send">
                    </div>
                  </form>
                                        </div>
                                        <div class="tab-pane fade" id="Unresolved-Complaint">
                                            
                                        </div>
                                        <div class="tab-pane fade" id="WritetoManagement">
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                </div>
                <div class="tab-pane fade" id="8-sliders">
                  <h4>Phone Support</h4>
                  <div>
                    <p>Call us on any of the numbers below</p>
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <td class="success"><strong>Travel Product</strong></td>
                          <td class="warning"><strong>Phone Number</strong></td>
                          <td class="danger"><strong>Sales Support Timings</strong></td>
                          <td class="info"><strong>Service Support Timings</strong></td>
                        </tr>
                        <tr>
                          <td class="success">Domestic Flights</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                        <tr>
                          <td class="success">Domestic Hotels</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                         <tr>
                          <td class="success">International Hotels</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                         <tr>
                          <td class="success">Domestic Holidays</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                         <tr>
                          <td class="success">International Holidays</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                         <tr>
                          <td class="success">US to India Flights</td>
                          <td class="warning">91-7388066660 </td>
                          <td class="danger">Book Online</td>
                          <td class="info">06:30-00:30</td>
                        </tr>
                        
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="9-sliders">
                  <h4>Visit Your Local Store</h4>
                  <div class="Contact-Row">
                    <p>Planning an International Holiday? Walk in to your nearest Yatra Holiday Lounge for a customized itinerary planning of your holiday. Located conveniently in the city, the lounge provides a great shopping experience for all your outbound holiday needs.</p>
                    <p>The Holiday Lounges are open from <strong>10:00 am to 7:00 pm, Monday to Saturday.</strong></p>
                  </div>
                  <div class="Contact-Row">
                    <div class="col-md-2 col-sm-4">Please select your city :</div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" placeholder="Location">
                    </div>
                    <div class=" clearfix"></div>
                  </div>
                  <div class="Faqs-Right">
                    <div class="col-sm-4 Location">
                      <h2>Our Location</h2>
                      <div>B-97 Vibhutikhand,</div>
                      <div>Gomti Nagar,</div>
                      <div>Lucknow, UP, India</div>
                      <div>Pin: 226010</div>
                      <div>91-7388066660 </div>
                      <div>info@kpholidays.com</div>
                    </div>
                    <!--Location-->
                    <div class="col-sm-8">
                      <h2>Location on map</h2>
                      <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.2630948490423!2d80.99748000000001!3d26.863380999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2b7efeffe49%3A0x4a44a06475c0300b!2sAugurs+Technologies+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1444139753827" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                      </div>
                    </div>
                    <div class=" clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <!--clearfix--> 
            
          </div>
          <!--Register-Page--> 
          
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

<?php include'footer.php';?>

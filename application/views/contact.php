<?php include "templates/header.php"; ?>
 
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12 adjt_cmn_cls_width">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Contact</li>
                    </ul>

                </div>


               <div class="col-md-12 adjt_cmn_cls_width">


                    <div class="box" id="contact">
                        <h1>Contact</h1>

                        <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                        <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Address</h3>
                                    <p>REGISTERED OFFICE AT
                                    <br />KAMASKHI NURSERY                              
									<br />4,4th floor, Sreshta Anand Apartments,
                                    <br />No.15,16 & 17 Hanumantha Road,
                                    <br />Balaji Nagar, Royapettah,
                                    <br />                                         
                                    <strong>Chennai - 600014.</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call </h3> 
                                <p class="text-muted">Please feel free to call us.</p>                               
                                <p>Phn: 044-28132593, <br />
                                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;98840 32954, <br />
                                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;72000 06273.
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Email Support</h3>
                                <p class="text-muted">Please feel free to write an email to us.</p>
                                <ul>
                                    <li><strong><a href="mailto:">srividhya.anand@gmail.com</a></strong>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <div id="map">
                        </div>
                        <hr>
                        <h2>Contact Form</h2>
                        <form id="contactForm"  method="post" action="<?php echo base_url(); ?>index.php/index/send_contact_mail">
                            <div class="row">
                                <div class="col-sm-12">
                                      <p class="error_test">Please fill all fields</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname"  name="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="message" class="form-control" name="message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary contact_submit_btn" name="contact_submit"><i class="fa fa-envelope-o"></i> Send message</button>

                                </div>
                            </div>
                            <!-- /.row -->
                        </form>


                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->    
    </div>
    <!-- /#all -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLLvqcTSXKbvjj1UDU5phR2u3rpiTfvUw"></script>
            <script type="application/javascript">
                function initialize() {
                    var mapOptions = {
                        zoom: 18,
                        scrollwheel: false,
                        center: new google.maps.LatLng(13.048765, 80.268008)
                    };

                    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                    // var contentString = '<div>' +
                        // '<h1 class="map_data"><b>KAMASKHI NURSERY</b></h1>' +
                        // '<h2 class="map_data">4,4th floor, Sreshta Anand Apartments,No.15,16 & 17 Hanumantha Road, Balaji Nagar, Royapettah, Chennai-600014.</h2>' +
                        // '<h3 class="map_data">info@recruitteachers.com</h3>' +
                        // '<h4 class="map_data">+91 95850 12949</h4>' +
                        // '</div>';
                    var marker = new google.maps.Marker({
                        position: map.getCenter(),
                        animation: google.maps.Animation.BOUNCE,
                        icon: '<?php echo base_url(); ?>assets/img/map-marker.png',
                        map: map,
                        title: 'Kamakshi Nursery'
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map, marker);
                    });
                }

                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
<?php include "templates/footer.php"; ?>
          <!-- *** FOOTER *** -->
        <!-- <div id="footer" data-animate="fadeInUp"> -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/about">About us</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/contact/">Contact us</a>
                            </li>
                            <br />
                            <br />
                        </ul>
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <h4>Top categories</h4>
                        <h5>Gift By categories</h5>
                        <ul>
                            <?php 
                            if(!empty($giftstore_category)): 
                            $result = array_slice($giftstore_category, -3, 3, true);    
                            foreach ($result as $cat):?>
                                <li><a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></a>
                                </li>
                            <?php 
                            endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <!-- /.col-md-3 -->
                   <div class="col-md-3 col-sm-6">
                        <h4>Where to find us</h4>
                        <p class="foo_address"> <strong>KAMASKHI NURSERY</strong>
                            <br />4,4th floor, Sreshta Anand Apartments,
                            <br />No.15,16 & 17 Hanumantha Road, 
                            <br />Balaji Nagar,Royapettah,
                            <br />Chennai - 600014.
                        </p>
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <h4>Get the news</h4>
                        <p class="foo_address">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        <!-- <form>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="button">Subscribe!</button>
                                </span>
                        </div>
                        </form> -->
                    </div>
                   <!-- /.col-md-3 -->
                </div>
               <!-- /.row -->
               <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <hr>
                        <h4>User section</h4>
                        <ul>
                            <li><a data-target="#login-modal" data-toggle="modal" href="#">Login</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/register/">Register</a>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg hidden-sm">
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <hr />
                        <h4>Gift By Recipient</h4>
                        <ul>
                            <?php 
                            if(!empty($recipient_list)): 
                            foreach ($recipient_list as $rec): 
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/recipient_category/<?php echo $rec['recipient_id']; ?>"> <?php echo $rec['recipient_type']; ?></a>
                            </li>
                            <?php
                            endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <!-- /.col-md-3 -->
                   <div class="col-md-3 col-sm-6">
                        <hr />
                       <a href="<?php echo base_url(); ?>index.php/contact/">Go to contact page</a>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <hr>
                        <h4>Stay in touch</h4>
                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                   <!-- /.col-md-3 -->
                </div>
               <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->
        <!-- *** FOOTER END *** -->
        <!-- *** COPYRIGHT *** -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2016 Kamakshi Gifts.</p>
                </div>
                 <div class="col-md-6">
                    <p class="pull-right">Designed and Developed by<a href="http://etekchnoservices.com/"> Etekchno Services</a> Pvt Ltd.
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->
    </div>
    <!-- /#all -->
    <!-- *** SCRIPTS TO INCLUDE *** -->
    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <!-- *** Popular ***-->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.stellar.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajax_call.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/range_picker.js"></script> <!-- price range-->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/addSlider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Obj.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nouislider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/thumbnail-slider.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/custom.js"></script> -->
</body>
</html>
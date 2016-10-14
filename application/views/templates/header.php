<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kamakshi-Giftshop">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <title>
        Kamakshi -Giftshop
    </title>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <!-- styles -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/addSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/nouislider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/thumbs2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/thumbnail-slider.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <link rel="shortcut icon" href="favicon.png">
    <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "dd95200b-4b94-4ef1-a537-c65ad9d21ec8", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
  <!-- *** TOPBAR *** -->
    <!-- Ajax loader added by siva -->
    <div class="loading" style="display: none;">
        <div class="ajax_loader">
            <img src="<?php echo base_url().'assets/img/ajax-loader.gif'; ?>"/>
        </div>
    </div> 
    <!-- Ajax loader ended by siva -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" style="display: none;" data-animate-hover="shake"></a>  <a href="#"></a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <?php if(!empty($this->session->userdata("login_status"))): 
                        $session_data = $this->session->userdata("login_session");
                        // $facebook_session_data = $this->session->userdata("facebook_login_session");
                    ?>
                        <li class="login_menu"> Welcome <?php echo $session_data['user_name']; ?>
                        <!-- <li class="login_menu"> Welcome <?php echo $facebook_session_data['user_name']; ?> -->
                        	<span class="caret dropdown-toggle drpdwn-icon" data-toggle="dropdown"></span>
							    <ul class="dropdown-menu users-dropdown">
							      <li><a href="<?php echo base_url(); ?>index.php/profile/">Profile</a></li>
							      <li class="divider"></li>
							      <li><a href="<?php echo base_url(); ?>index.php/index/logout/">Logout</a></li>
							    </ul>
                        </li>
                        <!-- <li class="login_menu"> <a href="<?php echo base_url(); ?>index.php/profile/"> Profile </a>
                        </li> -->
                        <!-- <li> <a href="<?php echo base_url(); ?>index.php/index/logout"> Logout </a>
                        </li> -->
                    <?php else : ?>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>index.php/register/">Register</a>
                        </li>
                    <?php endif; ?>
                    <!-- <li><a href="<?php //echo base_url(); ?>index.php/customer_orders/">Profile</a>
                    </li> -->
                    <li><a href="<?php echo base_url(); ?>index.php/contact/">Contact</a>
                    </li>
                    <li>
                        <a href="#" class="track_order_status_icon"> Track Order</a>
                        <form method="POST" class="track_order_form" action="<?php echo base_url(); ?>index.php/track_order"> 
                            <div class="input-group">
                                <input type="text" placeholder="Order Id" name="track_order_id" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <!-- <li><a href="#">Recently viewed</a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/ajax_controller/popup_login" id="login" class="front-end_form" method="post">
                            <div class="registeration_status">
                            </div>
                            <div class="form-group"> 
                                <input type="text" class="form-control" id="email-modal" name="popup_email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" name="popup_password" placeholder="Password">
                            </div>
                           <div class="form_actions">
                            <p class="text-center login_button">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                            <a href="#" class="forgot_pwd frgt_pwd"><strong>Forgot Password?</strong></a>
                            <div class="cb"> </div> 
                          </div>
                        </form>
                        <form action="<?php echo base_url(); ?>index.php/ajax_controller/popup_forgot_pwd" id="forget_password" class="front-end_form" method="post">
                            <div class="registeration_status">
                            </div>        
                            <!-- <a href="#" class="forgot_pwd frgt_pwd_2"><strong>Forgot Password?</strong></a> -->                                                  
                            <div class="form-group forgot_pwd-modal"> 
                            	<label class="email_id">Email</label>
                                <input type="text" class="form-control" id="email-modal" name="popup_forgot_email" placeholder="Email" style="top: 3px;">
                               <div class="form2_actions">
                               	<a href="#"><span class="cancel">Cancel</span></a>
                                <p class="text-center">
                                <button class="btn btn-primary retrive_pwd"><i class="fa fa-sign-in"></i>Retrieve Password</button>
                               </p>
                               <div class="cb"> </div> 
                              </div>
                            </div>
                        </form>
                          </div>                 
                           <div id="facebook_login">
							<ul class="social_icons">
								<a href="<?php echo $login_url; ?>">
                                <img class="fb" src="assets/img/fb.png">
                                </a>							
								<a href="<?php echo $authUrl; ?>">
                                <img class="fb" src="assets/img/google.png">
                                </a>							
							</ul>
							</div>  
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted registeration_instructions"><a href="<?php echo base_url(); ?>index.php/register/"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>                                                           
                    </div>                       
            </div>
        </div>
    </div>
    <!-- *** TOP BAR END *** -->
    <!-- *** NAVBAR *** -->
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="<?php echo base_url(); ?>index.php/" data-animate-hover="bounce">
                    <img src="" alt="" class="hidden-xs"><span class="brand_name">Kamakshi <br />Gifts</span>
                    <img src="" alt="" class="visible-xs">
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="<?php echo base_url(); ?>index.php/basket/">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs" > <span class="add_to_cart"> <?php echo $order_count; ?> </span> items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->
            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Gift By Categories<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                    <h5>Category</h5>
                                    <?php foreach ($giftstore_category as $cat):?>
                                        <div class="col-sm-3">                                
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endforeach ?>
                                    </div>
                                </div>                                
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Gift By Recipient<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Recipient</h5>
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
                                        
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    <li class="about-us"><a href="<?php echo base_url(); ?>index.php/">About Us</a>
                    </li>
                    <li class="contact-us"><a href="<?php echo base_url(); ?>index.php/contact/">Contact US</a>
                    </li>
                     </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
            <div class="navbar-buttons">
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"> <span class="add_to_cart"> <?php echo $order_count; ?> </span>  items in cart</span></a>
                </div>
                <!--/.nav-collapse -->
                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                       </span>
                    </div>
                </form>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->
<!-- *** NAVBAR END *** -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kamakshi Gifts Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <!-- Main css for theme -->
    <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/charisma-app.css" rel="stylesheet">
    <!-- Main corousal css for theme -->
    <link href="<?php echo base_url(); ?>assets/admin/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/slick-theme.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/admin/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>assets/admin/css/style.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.ico">
</head>
<body>
<!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <!-- <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/> -->
            <span>Kamakshi Gifts</span></a>
            <?php if (!empty($this->session->userdata('logged_in'))){?>
                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
                        <?php 
                        $session_data = $this->session->userdata('logged_in');
                        echo $session_data['username']; ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()."index.php/admin/users/edit_adminusers/".$session_data['userid'] ?>">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->
            <?php } ?>
            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button> -->
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <!-- <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li> -->
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- topbar ends -->
    <?php 
    //echo $_SERVER['REQUEST_URI']."<br>";
    //echo $this->config->item('admin_base_url')."<br>"; 
    ?>
    <?php if (!empty($this->session->userdata('logged_in'))){?> 
    <!-- left menu starts -->
    <div class="row">
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">My Dashboard</li>
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>index.php/admin/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li> 
                       <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-user"></i><span> Users</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                 <li><a href="<?php echo base_url(); ?>index.php/admin/users/adminusers">Admin Users</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/users/endusers">End users</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-inbox"></i><span> Catalog</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/category">Category </a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/subcategory">Subcategory </a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/recipient">Recipient</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/product_attributes">Product Attributes </a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/giftproduct">Product </a></li>
                            </ul>
                            </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-map-marker"></i><span> Location</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/state">State</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/city">City</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/area">Area </a></li>
                            </ul>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-sort-by-order"></i><span> Order</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/order">Order </a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/orderitem">Order Item</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/admin/adminindex/transaction">Transaction</a></li>
                            </ul>
                        </li>
                      <!--   <li><a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
                        </li>
                        <li><a class="ajax-link" href="form.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Forms</span></a></li>
                        <li><a class="ajax-link" href="chart.php"><i class="glyphicon glyphicon-list-alt"></i><span> Charts</span></a>
                        </li>
                        <li><a class="ajax-link" href="typography.php"><i class="glyphicon glyphicon-font"></i><span> Typography</span></a>
                        </li>
                        <li><a class="ajax-link" href="gallery.php"><i class="glyphicon glyphicon-picture"></i><span> Gallery</span></a>
                        </li>
                        <li class="nav-header hidden-md">Sample Section</li>
                        <li><a class="ajax-link" href="table.php"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Child Menu 1</a></li>
                                <li><a href="#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="calendar.php"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>
                        <li><a class="ajax-link" href="grid.php"><i
                                    class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="tour.php"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a></li>
                        <li><a class="ajax-link" href="icon.php"><i
                                    class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="error.php"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="login.php"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label> -->
                </div>
            </div>
        </div>
        <!--/span-->
<!-- left menu ends -->
<?php } ?>

<?php
// if(!empty($this->session->userdata("login_status"))):
$user_session = $this->session->userdata("login_status");
if (!empty($user_session)):
include "templates/header.php"; 
?>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU *** -->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="<?php echo base_url(); ?>index.php/profile/"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/my_orders/"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <!--  <li>
                                    <a href="<?php echo base_url(); ?>index.php/customer_wishlist/"><i class="fa fa-heart"></i> My wishlist</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/index/logout"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- *** CUSTOMER MENU END *** -->
                </div>
                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                        <p class="change_password"> Click here to change password </p>
                        <form class="change_password_form front-end_form" action="<?php echo base_url(); ?>index.php/ajax_controller/profile_password_form">
                            <div class="registeration_status">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                      <p class="password_error_msg"></p>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" class="form-control" id="password_old" name="profile_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" id="password_1" name="profile_new">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" id="password_2" name="profile_renew">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>
                        <hr>
                        <h3>Personal details</h3>
                        <form id="profile_form" class="front-end_form" action="<?php echo base_url(); ?>/index.php/ajax_controller/profile_details_form">
                            <div class="registeration_status">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" name="profile_firstname" id="firstname" value="<?php if(!empty($user_profile_details['first_name'])) echo $user_profile_details['first_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" name="profile_lastname" class="form-control" id="lastname" value="<?php  if(!empty($user_profile_details['last_name'])) echo $user_profile_details['last_name']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Address Line1</label>
                                        <input type="text" class="form-control" name="profile_address1" id="company" value="<?php if(!empty($user_profile_details['shipping_default_addr1'])) echo $user_profile_details['shipping_default_addr1']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Address Line2</label>
                                        <input type="text" class="form-control" name="profile_address2" id="street" value="<?php if(!empty($user_profile_details['shipping_default_addr2'])) echo $user_profile_details['shipping_default_addr2']; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" id="che_state" name="profile_state">
                                            <option value=""> Plese select state </option>
                                        <?php 
                                            if(!empty($profile_get_state)) :
                                            foreach ($profile_get_state as $pro_sta) :
                                            if(!empty($user_profile_details['user_state_id'])) :
                                                if($user_profile_details['user_state_id']==$pro_sta['state_id']) {
                                                    echo '<option value="'.$pro_sta['state_id'].'" selected> '.$pro_sta['state_name'].' </option>';
                                                }
                                                else {
                                                    echo '<option value="'.$pro_sta['state_id'].'"> '.$pro_sta['state_name'].' </option>';
                                                }
                                            else:
                                                echo '<option value="'.$pro_sta['state_id'].'"> '.$pro_sta['state_name'].' </option>';
                                            endif;
                                            endforeach;
                                            endif;
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">City</label>
                                        <select class="form-control" id="che_city" name="profile_city">
                                            <?php 
                                            if(!empty($profile_get_city)) :
                                            foreach ($profile_get_city as $pro_city) :
                                            if(!empty($user_profile_details['user_city_id'])) :
                                                if($user_profile_details['user_city_id']==$pro_city['city_id']) {
                                                    echo '<option value="'.$pro_city['city_id'].'" selected> '.$pro_city['city_name'].' </option>';
                                                }
                                                else {
                                                    echo '<option value="'.$pro_city['city_id'].'"> '.$pro_city['city_name'].' </option>';
                                                }
                                            else:
                                                echo '<option value="'.$pro_city['city_id'].'"> '.$pro_city['city_name'].' </option>';
                                            endif;
                                            endforeach;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Area</label>
                                        <select class="form-control" id="che_area" name="profile_area">
                                            <?php 
                                            if(!empty($profile_get_area)) :
                                            foreach ($profile_get_area as $pro_area) :
                                            if(!empty($user_profile_details['user_area_id'])) :
                                                if($user_profile_details['user_area_id']==$pro_area['area_id']) {
                                                    echo '<option value="'.$pro_area['area_id'].'" selected> '.$pro_area['area_name'].' </option>';
                                                }
                                                else {
                                                    echo '<option value="'.$pro_area['area_id'].'"> '.$pro_area['area_name'].' </option>';
                                                }
                                            else:
                                                echo '<option value="'.$pro_area['area_id'].'"> '.$pro_area['area_name'].' </option>';
                                            endif;
                                            endforeach;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" maxlength="6" name="profile_zip" id="zip" value="<?php if(!empty($user_profile_details['user_zip'])) echo $user_profile_details['user_zip']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" maxlength="10" name="profile_mobile" id="phone" value="<?php if(!empty($user_profile_details['user_mobile'])) echo $user_profile_details['user_mobile']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="profile_email" id="profile_email" value="<?php if(!empty($user_profile_details['user_email'])) echo $user_profile_details['user_email']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary profile_submit"><i class="fa fa-save"></i> Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; 
else :
    redirect('index');
endif;
?>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">
              <p class="error_msg">Please fill all mandatory fields</p>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="fname" class="form-control" id="firstname">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lname" class="form-control" id="lastname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" name="cname" class="form-control" id="company">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" name="street" class="form-control" id="street">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <label for="city">Company</label>
                    <input type="text" name="cmname" class="form-control" id="city">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <label for="zip">ZIP</label>
                    <input type="text" name="zip" class="form-control" id="zip">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" name="fname" id="state"></select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" name="country" id="country"></select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone">Telephone</label>
                    <input type="text" name="telephone" class="form-control" id="phone">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
            </div>

        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
        </div>
        <div class="pull-right">
            <button id="checkout_address" class="btn btn-default checkout_button" data-type="order"> Continue <i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
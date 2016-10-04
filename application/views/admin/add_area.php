<?php include "templates/header.php" ?>
        <!--/span-->
        <!-- left menu ends -->
<div class="ch-container">
    <div class="row footer_content"> 
        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Add Area</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Area</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
            <p class="error_msg_reg"><?php if (isset($error_message)) echo $error_message; ?></p>
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_area/" enctype="multipart/form-data" name="add_area_form">
            <div class="control-group">
                        <label for="sel_a">Select State<span class="fill_symbol"> *</span></label>
                    <select name="state_name" id="sel_state" class="form-control state_act">
                   <option value="">
                     Select State 
                    </option>
                    <?php
                    $query = mysql_query("select * from giftstore_state  where state_status='1' order by state_name asc");
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $row['state_id']; ?>"><span><?php echo $row['state_name']; ?></span></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="control-group">
                        <label for="sel_a">Select City<span class="fill_symbol"> *</span></label>
                    <select name="city_name" id="sel_city" class="form-control city_act">
                   <option value="">
                     Select City 
                    </option>
                    <?php
                    $query = mysql_query("select * from giftstore_city  where city_status='1' order by city_name asc");
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $row['city_id']; ?>"><span><?php echo $row['city_name']; ?></span></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="area_name">Area Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control area_act" id="sel_area" placeholder="Enter area Name" name="area_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Delivery charge<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="deliverycharge" placeholder="Enter delivery charge" name="area_delivery_charge">
                    </div>  
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Area status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="area_status" id="sel_a" class="product-type-filter form-control city_act">
                                 <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/span-->
    <script>
// Load area based on city
jQuery(".state_act").on('change',function () {
		 alert('success');
        selected_state = $.trim($('option:selected',this).text());
        selected_state_id = $('option:selected',this).val();
        form_data = {'states_name':selected_state,'states_id':selected_state_id};
        alert(form_data);
        alert(JSON.stringify(form_data));
        if(selected_state != 'Select State'){
        	$.ajax({
               type: "POST",
               url: "kamakshi/index.php/admin/adminindex/ajax_area",
               data: form_data,
               cache: false,
               success: function(data) { 
               	alert(data);             
                var obj = JSON.parse(data);
                var options = '<option value="">Select City</option>';   
                if(obj.length!=0){               
                  $.each(obj, function(i){
                    options += '<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>';
                  });  
                }   
                else{
                    alert('No City added for '+selected_state);    
                }  
                $('.city_act').html(options); 
                // $('.area_act').html('<option value="">Select Area</option>');                 
               }
           });
       }        
    });

	jQuery(".city_act").on('change',function () {
		alert('success');
        selected_city = $.trim($('option:selected',this).text());
        selected_city_id = $('option:selected',this).val();
        form_data = {'city_name':selected_city,'city_id':selected_city_id};
        alert(form_data);
        alert(JSON.stringify(form_data));
        if(selected_state != 'Select City'){
	         $.ajax({
	               type: "POST",
	               url: "kamakshi/index.php/admin/adminindex/ajax_area",
	               data: form_data,
	               cache: false,
	               success: function(data) { 
	               	// alert(data);             
	                var obj = JSON.parse(data);
	                var options = '<option value="">Select Area</option>';   
	                if(obj.length!=0){               
	                  $.each(obj, function(i){
	                    options += '<option value="'+obj[i].area_id+'">'+obj[i].area_name+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No Area added for '+selected_city);    
	                }  
	                $('.area_act').html(options);                  
	               }
	           });
	    }
       });
     </script>

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>



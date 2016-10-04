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
            <a href="#">Edit Area</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Area</h2>

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
             	<?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_area/<?php echo $area_edit['area_id']; ?>" enctype="multipart/form-data" name="edit_area_form">
                 <div class="form-errors"></div>
                  <div class="control-group">
                        <label for="sel_a">State</label>
                    <select name="state_name" id="sel_city" class="product-type-filter form-control city_act">
                   <option value="" >Select State</option>
                    <?php foreach ($state_list as $state_row): ?>
                         <?php   
                            if($area_edit['area_state_id'] == $state_row['state_id'])  echo "<option selected value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                            else
                                echo "<option value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="control-group">
                        <label for="sel_a">City</label>
                    <select name="city_name" id="sel_city" class="product-type-filter form-control city_act">
                   <option value="" >Select City</option>
                    <?php foreach ($city_list as $city_row): ?>
                         <?php   
                            if($area_edit['area_city_id'] == $city_row['city_id'])  echo "<option selected value='".$city_row['city_id']."'>".$city_row['city_name']."</option>";
                            else
                                echo "<option value='".$city_row['city_id']."'>".$city_row['city_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="area_name">Area Name</label>
                        <input type="text" class="form-control" id="area_name" placeholder="Enter Ara Name" value="<?php if(!empty($area_edit['area_name'])) echo $area_edit['area_name']; ?>" name="area_name">
                    </div>
                    <div class="form-group">
                        <label for="area_name">Delivery charge</label>
                        <input type="text" class="form-control" id="deliverycharge" placeholder="Enter delivery charge" value="<?php if(!empty($area_edit['area_delivery_charge'])) echo $area_edit['area_delivery_charge']; ?>" name="area_delivery_charge">
                    </div>  
                        <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="area_status" id="sel_c" class="product-type-filter form-control area_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($area_edit['area_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($area_edit['area_status'] == 0) echo "selected"; ?>>
                                    <span>Inactive</span>
                                </option>
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
    <!-- <script>
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
               url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/get_area",
               data: form_data,
               cache: false,
               success: function(data) { 
               	// alert(data);             
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
	               url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/get_area",
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
     </script> -->

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>

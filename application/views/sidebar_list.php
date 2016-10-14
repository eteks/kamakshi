<div class="col-md-3">
    <!-- *** MENUS AND FILTERS *** -->
    <div class="panel panel-default sidebar-menu">                       
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat_name->category_id; ?>"><?php echo $cat_name->category_name; ?> <span class="badge pull-right"> <?php echo $cat_pro_count; ?></span></a>
                    <ul class="menu_category">
                        <?php foreach ($gift_subcategory as $subcat):?>
                        <li>
                            <a  class="subcategories" data-id="<?php echo $subcat['subcategory_id'] ?>"><?php echo $subcat['subcategory_name'] ?></a>
                        </li>
                        <?php endforeach; ?> 
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Price</h3>
        </div>
        <input data-addui='slider' data-min='0' data-max='1000' data-range='true' value='0,1000'/>
    </div>
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title">Recipient</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
                <li>
                    <a class="recipients" data-id="0"> All </a> 
                </li>
                <?php foreach ($gift_recipient as $recipient) : ?>
                    <li>
                        <a class="recipients" data-id="<?php echo $recipient['recipient_id']; ?>"><?php echo $recipient['recipient_type']; ?></a> 
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div> 
</div>
<input type="hidden" id="category_id" value="<?php echo $cat_name->category_id; ?>">



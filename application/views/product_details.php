<div class="col-md-5 modal_body_left">
    <img src="<?php echo base_url().$product_details->product_image_0; ?>" alt="Product Image" class="img-responsive" />
</div>
<div class="col-md-7 modal_body_right">
    <h4><?php echo $product_details->product_name; ?></h4>
    <p><?php echo $product_details->product_description; ?></p>
    <div class="modal_body_right_cart simpleCart_shelfItem">
        <p><span><?php echo $product_details->product_old_price; ?></span> <i class="item_price"><?php echo $product_details->product_price; ?></i></p>
    </div>
</div>
<div class="clearfix"></div>
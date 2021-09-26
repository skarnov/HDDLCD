<script>
    // Start Category Issue
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    function selectSubcategory(categoryId)
    {
        if (categoryId) {
            serverPage = '<?php echo base_url(); ?>ecommerce/show_subcategory/' + categoryId + '/';
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                document.getElementById('subcategories').innerHTML = xmlhttp.responseText;
            };
            xmlhttp.send(null);
        }
    }
    // End Category Issue
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_product"> Manage Product</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>ecommerce/update_product" method="POST" name="product">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Category <span style="color: red">(Required)</span></label>
                                        <select name="category_id" onclick="selectSubcategory(this.value);" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($all_category as $v_category) {
                                                ?>
                                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Subcategory <span style="color: red">(Required)</span></label>
                                        <select name="subcategory_id" id="subcategories" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_subcategory as $v_subcategory) {
                                                ?>
                                                <option value="<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Item <span style="color: red">(Required)</span></label>
                                        <select name="item_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Item</option>
                                            <?php
                                            foreach ($all_item as $v_item) {
                                                ?>
                                                <option value="<?php echo $v_item->item_id; ?>"><?php echo $v_item->item_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Brand</label>
                                        <select name="brand_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Brand</option>
                                            <?php
                                            foreach ($all_brand as $v_brand) {
                                                ?>
                                                <option value="<?php echo $v_brand->brand_id; ?>"><?php echo $v_brand->brand_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Size</label>
                                        <?php
                                        foreach ($all_size as $v_size) {
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="size_name[]" value="<?php echo $v_size->size_name; ?>"><?php echo $v_size->size_name; ?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Color</label>
                                        <?php
                                        foreach ($all_color as $v_color) {
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="color_name[]" value="<?php echo $v_color->color_name; ?>"><?php echo $v_color->color_name; ?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" value="<?php echo $product_info->product_name; ?>" class="form-control">
                                    <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" name="product_code" value="<?php echo $product_info->product_code; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Mention Special Product</label>
                                        <div class="radio">
                                            <label><input type="radio" name="special_product" value="0">Normal Product</label>
                                            <label><input type="radio" name="special_product" value="1">Special Product</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Delivery Time</label>
                                        <textarea name="delivery_time" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->delivery_time; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Delivery Area</label>
                                    <textarea name="delivery_area" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->delivery_area; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Delivery Charge For Dhaka <span style="color: red">(Required)</span></label>
                                    <input type="number" name="delivery_charge_inside" value="<?php echo $product_info->delivery_charge_inside; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Delivery Charge For Outside Dhaka <span style="color: red">(Required)</span></label>
                                    <input type="number" name="delivery_charge_outside" value="<?php echo $product_info->delivery_charge_outside; ?>" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="product_quantity" value="<?php echo $product_info->product_quantity; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Old Price</label>
                                    <input type="number" name="product_old_price" value="<?php echo $product_info->product_old_price; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Current Price</label>
                                    <input type="number" name="product_price" value="<?php echo $product_info->product_price; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="product_description" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->product_description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Extra Information</label>
                                    <textarea name="extra_information" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->extra_information; ?></textarea>
                                </div>             
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </form>
                    <hr/>
                    <br/><br/>
                    <div class="col-xs-6">
                        <div class="box-body">
                            <form action="<?php echo base_url(); ?>ecommerce/edit_image_one" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_0; ?>" style="max-height:200px; max-width:200px;" />
                                    <div class = "caption">
                                        <div class="form-group">
                                            <label>Product Main Image </label>
                                            <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                                            <input type="file" name="product_image_0" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="<?php echo base_url(); ?>ecommerce/edit_image_two" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_1; ?>" style="max-height:200px; max-width:200px;" />
                                    <div class = "caption">
                                        <div class="form-group">
                                            <label>Product Additional Image - 1</label>
                                            <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                                            <input type="file" name="product_image_1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="<?php echo base_url(); ?>ecommerce/edit_image_three" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_2; ?>" style="max-height:200px; max-width:200px;" />
                                    <div class = "caption">
                                        <div class="form-group">
                                            <label>Product Additional Image - 2</label>
                                            <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                                            <input type="file" name="product_image_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="box-body">
                            <form action="<?php echo base_url(); ?>ecommerce/edit_image_four" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_3; ?>" style="max-height:200px; max-width:200px;" />
                                    <div class = "caption">
                                        <div class="form-group">
                                            <label>Product Additional Image - 3</label>
                                            <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                                            <input type="file" name="product_image_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="<?php echo base_url(); ?>ecommerce/edit_image_five" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_4; ?>" style="max-height:200px; max-width:200px;" />
                                    <div class = "caption">
                                        <div class="form-group">
                                            <label>Product Additional Image - 4</label>
                                            <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                                            <input type="file" name="product_image_4" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script>
    document.forms['product'].elements['category_id'].value = '<?php echo $product_info->category_id; ?>';
    document.forms['product'].elements['subcategory_id'].value = '<?php echo $product_info->subcategory_id; ?>';
    document.forms['product'].elements['item_id'].value = '<?php echo $product_info->item_id; ?>';
    document.forms['product'].elements['brand_id'].value = '<?php echo $product_info->brand_id; ?>';
    document.forms['product'].elements['special_product'].value = '<?php echo $product_info->special_product; ?>';
</script>
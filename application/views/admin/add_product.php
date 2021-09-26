<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_product"> Manage Product</a></li>
            <li class="active">Add New Product</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>ecommerce/save_product" method="POST" name="product" enctype="multipart/form-data" novalidate>
                        <div style="background-color:red; color:white;"><?php echo validation_errors(); ?></div>
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_product');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_product');
                            }
                            ?>
                        </h3>
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
                                        <select name="subcategory_id" class="form-control select2" style="width: 100%;">
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
                                    <label>Product Name <span style="color: red">(Required)</span></label>
                                    <input type="text" name="product_name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" name="product_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Main Image <span style="color: red">(Required)</span></label>
                                    <input type="file" name="product_image_0" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 1</label>
                                    <input type="file" name="product_image_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 2</label>
                                    <input type="file" name="product_image_2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 3</label>
                                    <input type="file" name="product_image_3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 4</label>
                                    <input type="file" name="product_image_4" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Old Price</label>
                                    <input type="number" name="product_old_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Current Price <span style="color: red">(Required)</span></label>
                                    <input type="number" name="product_price" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Description <span style="color: red">(Required)</span></label>
                                    <textarea name="product_description" required class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

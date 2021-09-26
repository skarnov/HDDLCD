<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Subcategory
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_subcategory"> Manage Subcategory</a></li>
            <li class="active">Edit Subcategory</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>ecommerce/update_subcategory" name="subcategory" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control select2" style="width: 100%;">
                                        <?php
                                        foreach ($all_category as $v_category) {
                                            ?>
                                            <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subategory Name</label>
                                    <input type="text" name="subcategory_name" value="<?php echo $subcategory_info->subcategory_name; ?>" class="form-control">
                                    <input type="hidden" name="subcategory_id" value="<?php echo $subcategory_info->subcategory_id; ?>" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['subcategory'].elements['category_id'].value = '<?php echo $subcategory_info->category_id; ?>';
</script>
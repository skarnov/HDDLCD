<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Subcategory
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/add_subcategory">Add New Subcategory</a></li>
            <li class="active">Manage Subcategory</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_subcategory');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_subcategory');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <?php
                            $admin_type = $this->session->userdata('admin_type');
                            if ($admin_type == '1') {
                                ?>
                                <th>Action</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_subcategory as $v_subcategory) {
                            ?>
                            <tr>
                                <td><?php echo $v_subcategory->category_name; ?></td>
                                <td><?php echo $v_subcategory->subcategory_name; ?></td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/edit_subcategory/<?php echo $v_subcategory->subcategory_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Subcategory"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_subcategory/<?php echo $v_subcategory->subcategory_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Subcategory" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
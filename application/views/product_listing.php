<script>
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
    function selectProduct(productId)
    {
        if (productId) {
            serverPage = '<?php echo base_url(); ?>store/product_details/' + productId + '/';
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                document.getElementById('product').innerHTML = xmlhttp.responseText;
            };
            xmlhttp.send(null);
        }
    }
</script>

<script src="<?php echo base_url(); ?>asset/public/js/jquery.magnific-popup.js" type="text/javascript"></script>
<!-- Modal Product -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
            </div>
            <section>
                <div class="modal-body" id="product">
                    
                </div>
            </section>
        </div>
    </div>
</div>
<!-- End of Modal Product -->
<!-- New Products -->
<div class="new-products">
    <div class="container">
        <h3>Products</h3>
        <div class="agileinfo_new_products_grids">
            <?php
            foreach ($product_listing as $v_product) {
                ?>
                <div class="col-md-3 agileinfo_new_products_grid">
                    <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                        <div class="hs-wrapper hs-wrapper1">
                            <img src="<?php echo base_url() . $v_product->product_image_0; ?>" alt=" " class="img-responsive" />
                            <img src="<?php echo base_url() . $v_product->product_image_1; ?>" alt=" " class="img-responsive" />
                            <img src="<?php echo base_url() . $v_product->product_image_2; ?>" alt=" " class="img-responsive" />
                            <img src="<?php echo base_url() . $v_product->product_image_3; ?>" alt=" " class="img-responsive" />
                            <img src="<?php echo base_url() . $v_product->product_image_4; ?>" alt=" " class="img-responsive" />
                            <div class="w3_hs_bottom w3_hs_bottom_sub">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#myModal" onclick="selectProduct(<?php echo $v_product->product_id; ?>);"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h5><a href="single.html"><?php echo $v_product->product_name; ?></a></h5>
                        <div class="simpleCart_shelfItem">
                            <p><span><?php echo $v_product->product_old_price; ?></span> <i class="item_price"><?php echo $v_product->product_price; ?></i></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                <div class="col-xs-12" style="padding:3%;">

            <form name="pagination">
<?php
$number_of_pages = ceil($total_product / $limit);
?>
                <div class="col-xs-2">
<?php if (($start - $limit) >= 0) { ?>
                            <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>" class='btn btn-sm btn-success'><</a>
                            <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start - $limit); ?>" class='btn btn-sm btn-success'><<</a>
<?php } ?>
                </div>
                <div class='col-xs-8'>
<?php for ($i = 0; $i < $number_of_pages;) { ?>
                            <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($i * $limit); ?>" class='btn btn-sm btn-warning <?php
    if ($start == ($i * $limit)) {
        echo "btn-danger";
    }
    ?>'><?php echo ++$i; ?> </a>
<?php } ?>
                </div>
                <div class="col-xs-2">
<?php if ($start + $limit < $total_product) { ?>
                            <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start + $limit); ?>" class='btn btn-sm btn-default'>></a>
                            <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . (($number_of_pages - 1) * $limit); ?>" class='btn btn-sm btn-success'>>></a>
<?php } ?>
                </div>
                <script type="text/javascript">
                    document.forms['pagination'].elements['per_page'].value = '<?php echo $limit ?>';
                </script>
            </form>

        </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>



    

    </div>
</div>
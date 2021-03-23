<script src="<?php echo base_url(); ?>assets_admin/js/plugins/masonry/jquery.masonry.min.js"></script>
<script>
    $(function () {
        $('.publish_status a').click(function () {

            var _id = $(this).attr('id');
            var _status = $(this).text();
//            alert(_id);
            $('a#' + _id + '').removeClass(_status);
            $(this).html('<img src="<?php echo base_url(); ?>assets_admin/img/ajax-loader.gif"/>');
            var _this = $(this);

            $.get('<?php echo admin_url("product/update_product_status"); ?>', {id: _id, status: _status},
            //alert(data);
                    function (data) {
                        _this.text(data);
                        $('a#' + _id + '').addClass(data);
                        //$('.cross').hide();
                    });
        });
    });
</script>
<!-- dataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/plugins/datatable/TableTools.css">
<!-- New DataTables -->
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/momentjs/jquery.moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/momentjs/moment-range.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/extensions/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/extensions/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/extensions/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/plugins/datatables/extensions/dataTables.scroller.min.js"></script>
<?php
if ($this->session->flashdata('display_message') != "") {
    $display = '';
} else {
    $display = 'none';
}
?>

<div class="container-fluid">
    <div class="page-header">
        <div class="pull-left">
            <h1><?php echo @$page_title; ?></h1>
        </div>
        <div class="pull-right">

            <div class="btn-group">
                <a class="btn btn-success" href="<?php echo base_url("admin/product/add_product"); ?>"><i class="fa fa-plus"></i> Create/Add New Product</a>

            </div>
        </div>
    </div>
    <style>.messages{margin-left:50%;}</style>
    <div class="message" id="message" style="display:<?php echo $display ?>">
        <div class="messages">
            <div class="icon-messages icon-success"></div>
            <div id="displayMsg"><?php echo @$this->session->flashdata('display_message') ?></div>
            <a href="#" onclick="javascript:getElementById('message').style.display = 'none'" class="close-msg" title="close">Close</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-table"></i>
                        <?php echo ucfirst(@$page_title); ?>
                    </h3>
                </div>
                <div class="box-content nopadding">
                    <table class="table table-hover table-nomargin table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Product Images</th>
                                <th>Product Title</th>
                                <!-- <th>Display To</th> -->
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($product_details)) {
                                $count = 1;
                                foreach ($product_details as $productData) {
                                    $productId = $productData->product_id;
                                    $productTitle = $productData->product_title;
                                    $productSlug = $productData->product_slug;
                                    // $productDisplay = $productData->display_type;
                                    $productImg = $productData->product_image;
                                    $productStatus = $productData->status;
                                    $productOrder = $productData->order;
                                    ?>

                                    <tr>

                                        <td align="center"> <ul class="gallery">
                                                <li>
                                                    <a href="#">
                                                        <img src="<?php echo base_url() ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/product/<?php echo $productImg; ?>&w=80&h=80" alt="" />
                                                    </a>
                                                    <div class="extras">
                                                        <div class="extras-inner">
                                                            <a href="<?php echo base_url(); ?>uploads/product/<?php echo $productImg; ?>" class='colorbox-image' rel="group-1">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul></td>
                                        <td align="center"><?php echo $productTitle; ?></td>
                                         <!-- <td align="center"><?php echo str_replace(",", " || ", ucfirst($productDisplay)); ?></td> -->
                                        <td class="publish_status">
                                            <a href="javascript:;" id="<?php echo $productId; ?>"  style="margin:5px; padding:5px 10px;">
                                                <?php echo @$productStatus; ?>
                                            </a>
                                        </td>

                                        <td align="center">
                                            <a class="edit" href="<?php echo base_url("admin/product/edit_product/$productId") ?>"><button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
                                            <a href="#modal-<?php echo $count; ?>" role="button" data-toggle="modal"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></a>
                                            <!-- Modal -->
                                            <div id="modal-<?php echo $count; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">ATTENTION!!!</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete <strong><?php echo $productTitle; ?></strong>. </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="<?php echo base_url("admin/product/delete_product/$productId"); ?>" class="btn btn-danger">Delete</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>










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

            $.get('<?php echo admin_url("pages/update_tab_status"); ?>', {id: _id, status: _status},
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
<link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/plugins/datatable/TableTools.css">
<!-- New DataTables -->
<script src="<?php echo base_url();?>assets_admin/js/plugins/momentjs/jquery.moment.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/momentjs/moment-range.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/datatables/extensions/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/datatables/extensions/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/datatables/extensions/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/js/plugins/datatables/extensions/dataTables.scroller.min.js"></script>
<?php
if($this->session->flashdata('display_message')!=""){
    $display = '';
}else{
    $display = 'none';
}
?>
<div class="container-fluid">
    <div class="page-header">
        <div class="pull-left">
            <h1><?php echo @$page_title;?></h1>
        </div>
        <div class="pull-right">

            <div class="btn-group">
               <a class="btn btn-success" href="<?php echo base_url("admin/pages/add_tab");?>"><i class="fa fa-plus"></i> Create/add new Tab Content</a>

            </div>
        </div>
    </div>
    <style>.messages{margin-left:50%;}</style>
    <div class="message" id="message" style="display:<?php echo $display?>">
        <div class="messages">
            <div class="icon-messages icon-success"></div>
            <div id="displayMsg"><?php echo @$this->session->flashdata('display_message')?></div>
            <a href="#" onclick="javascript:getElementById('message').style.display='none'" class="close-msg" title="close">Close</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-table"></i>
                        <?php echo ucfirst(@$page_title);?>
                    </h3>
                </div>
                <div class="box-content nopadding">
                    <table class="table table-hover table-nomargin table-bordered dataTable">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Status</th> 
                            <!-- <th>Sub Content Page</th>  -->
                            <!-- <th>Display To</th> -->
                            <!-- <th>Order</th> -->
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($tab_details)){
                            $count=1;
                            foreach($tab_details as $allpage){
                                $edit_id = $allpage->page_id;
                                $pageTitle = $allpage->page_title;
                                $pageType = $allpage->page_type;
                                $pageContent = $allpage->sub_content_page;
                                $Order = $allpage->order;
                                $status = $allpage->status;
                                $displayType = $allpage->display_type;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><strong><?php echo $pageTitle;?></strong></td>
                                    <!-- <td><?php echo $pageType;?></td>  -->
                                    <!-- <td><?php echo $pageContent;?></td>  -->
                                    <!-- <td align="center"><?php echo str_replace("_", " ", ucfirst($displayType));?></td> -->
                                    <td class="publish_status">
                                            <a href="javascript:;" id="<?php echo $edit_id; ?>"  style="margin:5px; padding:5px 10px;">
                                                <?php echo @$status; ?>
                                            </a>
                                        </td>
                                    <td>
                                        <a class="edit" href="<?php echo base_url("admin/pages/edit_tab/$edit_id")?>"><button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        
                                        <a href="#modal<?php echo $count;?>" role="button" data-toggle="modal"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></a>

                                        <div id="modal<?php echo $count;?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                    </div>
                                                    <!-- /.modal-header -->
                                                   <div class="modal-body">
                                                        <p>
                                                           Are you sure to delete (<strong><?php echo $pageTitle;?></strong>).
                                                        </p>
                                                    </div>
                                                    <!-- /.modal-body -->
                                                    <div class="modal-footer">
                                                        <a href="<?php echo base_url("admin/pages/delete_tab/$edit_id");?>" class="btn btn-danger">Delete</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                    <!-- /.modal-footer -->
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                </tr>
                                <?php $count++;}}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>










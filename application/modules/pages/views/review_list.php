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

            $.get('<?php echo admin_url("pages/update_testi_status"); ?>', {id: _id, status: _status},
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
               <a class="btn btn-success" href="<?php echo base_url("admin/pages/add_testimonial");?>"><i class="fa fa-plus"></i> Create/add new page</a>

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
                            <th>Author</th>
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($page_details)){
                            $count=1;
                            foreach($page_details as $allpage){
                                $edit_id = $allpage->review_id;
                                $package_id = $allpage->package_id;
                                $activity_id = $allpage->activity_id;
                                $Name = $allpage->name;
                                $pageTitle = $allpage->review_title;
                                // $pageType = $allpage->review_type;
                                $pageStatus = $allpage->status;
                                $pageDisplay = $allpage->display_type;
                                $Order = $allpage->order;
                                                                
//                                    $this->db->select('*');
//                                    $this->db->where('package_id', $package_id);
//                                    $queryPack = $this->db->get('package');
//                                    $packageTITLE = $queryPack->row();
                                    
//                                    $this->db->select('*');
//                                    $this->db->where('activity_id', $activity_id);
//                                    $queryPack = $this->db->get('activity');
//                                    $activityTITLE = $queryPack->row();
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><strong><?php echo $pageTitle;?></strong></td>
                                    <td><?php echo $Name;?></td>
                                    <td class="publish_status">
                                            <a href="javascript:;" id="<?php echo $edit_id; ?>"  style="margin:5px; padding:5px 10px;">
                                                <?php echo @$pageStatus; ?>
                                            </a>
                                        </td>
                                    
                                    <td>
                                        <a class="edit" href="<?php echo base_url("admin/pages/edit_testimonial/$edit_id")?>"><button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        
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
                                                           Are you sure to delete this Testimonial (<strong><?php echo $pageTitle;?></strong>).
                                                        </p>
                                                    </div>
                                                    <!-- /.modal-body -->
                                                    <div class="modal-footer">
                                                        <a href="<?php echo base_url("admin/pages/delete_testimonial/$edit_id");?>" class="btn btn-danger">Delete</a>
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










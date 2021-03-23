<script src="<?php echo base_url(); ?>assets_admin/js/plugins/masonry/jquery.masonry.min.js"></script>
<script>
    $(function(){
        $('.publish_status a').click(function(){

            var _id = $(this).attr('id');
            var _status = $(this).text();
            $('a#'+_id+'').removeClass(_status);
            $(this).html('<img src="<?php echo config_item('admin_images');?>ajax-loader.gif" />');
            var _this = $(this);//alert(_id);
            $.get('<?php echo admin_url('admin/update_status');?>', {id : _id, status : _status},
                //alert(data);
                function(data){
                    _this.text(data);
                    $('a#'+_id+'').addClass(data);
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
                            <th>Company Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($contact_details)){
                            $count=1;
                            foreach($contact_details as $allcontact){
                                $edit_id = $allcontact->contact_id;
                                $contactName = $allcontact->company_name;
                                $contactADD = $allcontact->address;
                                $contactEmail = $allcontact->email;
                                $contactPH = $allcontact->contact_no_ph;


                                ?>

                                <tr>

                                    <td><?php echo $count;?></td>
                                    <td><strong><?php echo $contactName;?></strong></td>
                                    <!-- <td><strong><?php echo $contactEmail;?></strong></td>
                                    <td><strong><?php echo $contactPH;?></strong></td> -->
                                    <td>
                                        <a class="edit" href="<?php echo base_url("admin/pages/edit_contact/$edit_id")?>"><button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
   
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










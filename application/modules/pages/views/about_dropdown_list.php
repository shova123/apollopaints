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
             <h1><?php echo @$page_title;?> List</h1>
         </div>
         <div class="pull-right">
            
            <div class="btn-group">
               <a class="btn btn-success" href="<?php echo base_url("admin/pages/about_dropdown_add")?>">Create/add new Page<i class="fa fa-plus"></i></a>

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
                               <th>Image</th>
                               <th>Page Title</th>
                               <th>Page Slug</th>
                               <th class="hidden-phone">Order</th>

                               <th class="hidden-phone">Operation</th>

                             </tr>
                         </thead>
                         <tbody>
                                <?php if(!empty($dropdown_list)){
                                    $count = 1;
                                        foreach($dropdown_list as $row){
                                            $edit_id = $row->id;
                                ?>

                                 <tr><!--gradeA, gradeC, gradeX, gradeU -->
                                    <td class='center'>
                                        <ul class="gallery">
                                            <li>
                                                <a href="#">
                                                    <img src="<?php echo base_url() ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/banners/<?php echo $row->home_image;?>&w=80&h=80" alt="<?php echo $row->dropdown_title;?>" />
                                                </a>
                                                <div class="extras">
                                                    <div class="extras-inner">
                                                        <a href="<?php echo base_url() ?>uploads/banners/<?php echo $row->home_image;?>" class='colorbox-image' rel="group-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td> 
                                    <td><?php echo $row->dropdown_title;?></td>
                                    <td><?php echo $row->dropdown_slug;?></td>
                                    <td class="center hidden-phone"><?php echo $row->order;?></td>

<!--                    <td class="center hidden-phone"><a href="javascript:void();" id="<1?php echo $catTrek->id?>"><1?php echo $catTrek->status?></a></td>-->
                                    <td>
                                        <a class="edit" href="<?php echo base_url("admin/pages/about_dropdown_edit/$edit_id")?>"><button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        <!--<a class="delete" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $count;?>"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></a>-->
                                        <a href="#modal-<?php echo $count;?>" role="button" data-toggle="modal">
                                            <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                        </a>
                                        
                                                <div id="modal-<?php echo $count;?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Are you sure to delete the Page <strong><?php echo $row->dropdown_title;?></strong>.<br/>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="<?php echo base_url("admin/pages/about_dropdown_delete/$edit_id");?>" class="btn btn-danger">Delete</a>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
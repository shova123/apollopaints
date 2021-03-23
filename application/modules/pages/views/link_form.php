<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>
<script>

    $(function() {
        $('#link_title').slugIt({
            output: '#link_slug',
            separator: '_'
        });
    });
</script>
<?php $isEdit = isset($details) ? true : false; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-edit"></i><?php echo $page_title ?></h3>
                </div>
                <div class="box-content nopadding">
                    <form action="" method="POST" class="form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                         <!-- <input type="hidden" id="page_category" name="page_category" value="page_category" /> -->
                          <!-- <input type="hidden" id="fileList" name="fileList" value="<?php if(!empty($isEdit)){ echo $details->image;}?>" /> -->

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Link Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="link_title" id="link_title" value="<?php if (@$isEdit) echo $details->link_title; ?>" class="form-control">
                                <span class="help-block">Enter The page Title</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Link Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="link_slug" id="link_slug" value="<?php if (@$isEdit) echo $details->link_slug; ?>" class="form-control slug" readonly>
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTTP Link</label>
                            <div class="col-sm-10">
                                <input type="text" name="link" id="link" value="<?php if (@$isEdit) echo $details->link; ?>" class="form-control">
                                <!-- <span class="help-block">This is page slug recognization</span> -->
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="numberfield" class="control-label col-sm-2">Order</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Only numbers" name="order" value="<?php if (@$isEdit) echo $details->order; ?>" id="numberfield" data-rule-number="true" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Status</label>
                            <div class="col-sm-2">
                                <select name="status" id="select" class='form-control'>
                                    <option value="Publish" <?php if (($isEdit) && ($details->status == 'Publish')){echo "selected";}?>> Publish </option>
                                    <option value="Unpublish" <?php if (($isEdit) && ($details->status == 'Unpublish')){echo "selected";}?>> Unpublish </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="linkSubmit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/quick_links");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
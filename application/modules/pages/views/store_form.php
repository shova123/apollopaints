
<script type="text/javascript" src="<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false
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

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Store title</label>
                            <div class="col-sm-10">
                                <input type="text" name="store_title" id="store_title" class="form-control" value="<?php if (@$isEdit) echo $details->store_title; ?>" data-rule-required="true" data-rule-minlength="2">
                                <!-- <span class="help-block">Enter The store Title</span> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Store Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="store_description" id="store_description" class="form-control"><?php if (@$isEdit) echo $details->store_description; ?></textarea>
                                <!-- <span class="help-block">This is Store Description</span> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numberfield" class="control-label col-sm-2">Order</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="Enter Positive numbers" name="order" value="<?php if (@$isEdit) echo $details->order; ?>"data-rule-number="true" class="form-control" data-rule-digits="true" data-rule-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Status</label>
                            <div class="col-sm-3">
                                <select name="status" id="select" class='chosen-select form-control'>
                                    <option value="Publish" <?php if (($isEdit) && ($details->status == 'Publish')){echo "selected";}?>> Publish </option>
                                    <option value="0" <?php if (($isEdit) && ($details->status == '0')){echo "selected";}?>> Unpublish </option>
                                </select>
                                <!-- <span class="help-block">Publish for publish 0 for unpublish</span> -->
                            </div>
                        </div>

                        </div>
                        <div class="form-actions">
                            <input type="submit" name="storeSubmit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/store");?>"<button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
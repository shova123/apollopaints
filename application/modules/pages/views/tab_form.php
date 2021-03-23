
<!-- TinyMCE Start-->
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

<!-- TinyMCE End-->

 <!--<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>

<script>
    $(function() {
        $('#page_title').slugIt({
            output: '#page_slug',
            separator: '_'
        });

    });
</script>-->


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
                    <form action="" method="POST" name="addEditform" id="addEditform" class="addEditform form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                        <input type="hidden" id="fileList" name="fileList" value="<?php if(!empty($isEdit)){ echo $details->image;}?>" />
                     

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="page_title" id="page_title" value="<?php if (@$isEdit) echo $details->page_title; ?>" class="form-control">
                                <span class="help-block">Enter The page Title</span>
                            </div>
                       </div>

                        <!-- <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Page Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="page_slug" id="page_slug" value="<?php if (@$isEdit) echo $details->page_slug; ?>" class="form-control slug" readonly>
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Content</label>
                            <div class="col-sm-10">
                                <textarea name="page_content" id="page_content" class="form-control"><?php if (@$isEdit) echo $details->content; ?></textarea>
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div>

<!--                         <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="html_title" id="html_title" value="<?php if (@$isEdit) echo $details->html_title; ?>" class="form-control">
                                <span class="help-block">This is HTML title for SEO</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Keyword</label>
                            <div class="col-sm-10">
                                <input type="text" name="html_keyword" value="<?php if (@$isEdit) echo $details->html_keyword; ?>" id="html_keyword" class="form-control">
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Description</label>
                            <div class="col-sm-10">
                                <textarea name="html_description" id="html_description" class="form-control"><?php if (@$isEdit) echo $details->html_description; ?></textarea>
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div> -->
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
                            <input type="submit" name="tabSubmit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/page_list");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
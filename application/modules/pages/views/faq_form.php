<script src='<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#faq_description',
        height: 170,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
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
                            <label for="textfield" class="control-label col-sm-2">FAQ Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="faq_title" id="faq_title" value="<?php if (@$isEdit) echo $details->faq_title; ?>" class="form-control">
                                <span class="help-block">Enter The page Title</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">FAQ Description</label>
                            <div class="col-sm-10">
                                <textarea name="faq_description" id="faq_description" class="form-control"><?php if (@$isEdit) echo $details->faq_description; ?></textarea>
                                <span class="help-block">This is page slug recognization</span>
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
                                <select name="status" id="select" class='chosen-select form-control'>
                                    <option value="1" <?php if (($isEdit) && ($details->status == '1')){echo "selected";}?>> Publish </option>
                                    <option value="0" <?php if (($isEdit) && ($details->status == '0')){echo "selected";}?>> Unpublish </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/faq_list");?>"<button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.css"/>
<script src="<?php echo base_url(); ?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<!--  Uploadifive  -->
<script type="text/javascript">
<?php $timestamp = time(); ?>
    $(function () {
        $('#blog_image').uploadifive({
            'auto': true, // Automatically upload a file when it's added to the queue
            'buttonClass': false, // A class to add to the UploadiFive button
            'buttonText': 'Upload Image', // The text that appears on the UploadiFive button
            'checkScript': '<?php echo base_url(); ?>assets_admin/uploadifive/check-exists.php', // Path to the script that checks for existing file names
            'dnd': true, // Allow drag and drop into the queue
            'dropTarget': false, // Selector for the drop target
            'fileSizeLimit': '153600', // Maximum allowed size of files to upload
            'fileType': false, // Type of files allowed (image, etc)
            'width': 180,
            'height': 30,
            'formData': {
                'timestamp': '<?php echo $timestamp; ?>',
                'targetFolder': '/appolo/uploads/blogs/',
                'token': '<?php echo @md5('unique_salt' . $timestamp); ?>'
            },
            'method': 'post', // The method to use when submitting the upload
            'multi': true, // Set to true to allow multiple file selections
            'queueID': 'queueImage', // The ID of the file queue
            'queueSizeLimit': 10, // The maximum number of files that can be in the queue
            'removeCompleted': true, // Set to true to remove files that have completed uploading
            'simUploadLimit': 0, // The maximum number of files to upload at once
            'truncateLength': 0, // The length to truncate the file names to
            'uploadLimit': 10, // The maximum number of files you can upload
            'uploadScript': '<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.php',
            onUploadComplete: function (file, data, response) {
                if ($('#fileList').val() != '') {
                    $('#fileList').val($('#fileList').val() + ':' + data);
                } else {//alert('blank');
                    $('#fileList').val(data);
                }
                imagePath = "<?php echo str_replace("\\", "/", ROOT); ?>";
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="' + data + '" class="img-wrap"><img src="' + "<?php echo base_url(); ?>" + 'assets_admin/createThumb/create_thumb.php?src=' + imagePath + 'uploads/blogs/' + data + '&w=150&h=150" alt="' + data + '" /></a></div>');
                //alert($('#fileList').val());
//                $('#submit').removeAttr('disabled');
//                $('#submit').val('SUBMIT');

                //console.log(data);
//                if ($('#fileList').val() !== '') {//alert('full');
//                    $('#fileList').val($('#fileList').val() + ':' + data);
//                } else {//alert('blank');
//                    $('#fileList').val(data);
//                }
                //                                        $('#submitDetails').val('Submit');
            }
        });
    });

//THIS FUNCTION IS TRIGGERED WHILE UPLOADED IMAGE, IS REQUIRED TO DELETE:
    $(function () {
        //$('a#deleteImg').live('click',function(){
        //$('a#deleteImg').on('click',function(){
        $(document).on('click', '#deleteImg', function () {
            var _img = $(this).next().attr("title");//alert(_img);
            var _this = $(this).parent();
            delete_image(_img);
            $.post("<?php echo admin_url("pages/delete_blog_image"); ?>", {imgName: _img},
                    function (data) {
                        $("i.info").text(data).fadeOut(1000);
                        _this.fadeOut(1000, function () {
                            _this.remove();
                            $("i.info").text('');
                            $("i.info").removeAttr('style');
                        });
                    });
            //$(this).parent().fadeOut(2500);
            //alert($('#fileList').val());
        });
    });

//THIS IS COMMON FUNCTION FOR DELETING FILE FORM THE LIST:
    function delete_image(name) {
        var filelist = $('#fileList').val();
        var filenames = filelist.split(':'); //alert(filenames.length);
        $('#fileList').val('');
        for (var i = 0; i < filenames.length; i++)
        {
            if (filenames[i] != name)
            {
                if ($('#fileList').val() == '')
                    $('#fileList').val(filenames[i]);
                else
                    $('#fileList').val($('#fileList').val() + ':' + filenames[i]);
            }
        }
    }

</script>
<script src='<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#blog_details',
        height: 170,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print pblog hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print pblog media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
<script>
    tinymce.init({
        selector: '#html_description',
        height: 170,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print pblog hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print pblog media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>

<script>
    $(function() {
        $('#blog_title').slugIt({
            output: '#blog_slug',
            separator: '_'
        });

    });
</script>


<?php $isEdit = isset($details) ? true : false;?>
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
                        <input type="hidden" id="fileList" name="fileList" value="<?php if(!empty($isEdit)){ echo $details->blog_image;}?>" />
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Blog Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="blog_title" id="blog_title" value="<?php if (@$isEdit) echo $details->blog_title; ?>" class="form-control">
                                <!--<span class="help-block">Enter The Blog Title</span>-->
                            </div>
                        </div>
                        

                        

                       <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Page Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="blog_slug" id="blog_slug" value="<?php if (@$isEdit) echo $details->blog_slug; ?>" class="form-control slug" readonly>
                                    <span class="help-block">This is page slug recognization</span>
                                </div>
                        </div>
<!--                        <div class="form-group">
                                <label class="col-sm-2 control-label">Display Type</label>
                                <div class="col-sm-10">
                                    <?php
                                    if (!empty($isEdit)) {
                                        $checkboxd = explode(",", $details->display_type);
                                    }
                                    ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="home" id="inlinecheckbox1" class='icheck-me' data-skin="square" data-color="red" name="display_type[]" <?php
                                        if (@$isEdit) {
                                            foreach ($checkboxd as $chkd) {
                                                if ($chkd == 'home') {
                                                    ?> checked<?php
                                                       }
                                                   }
                                               }
                                               ?>>
                                        <span class="custom-checkbox"></span> Home
                                    </label>
                                </div>
                        </div>-->

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Blog Content</label>
                            <div class="col-sm-10">
                                <textarea name="blog_details" id="blog_details" class="form-control"><?php if (@$isEdit) echo $details->blog_details; ?></textarea>
                                <!--<span class="help-block">This is Blog slug recognization</span>-->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="html_title" id="html_title" value="<?php if (@$isEdit) echo $details->html_title; ?>" class="form-control">
                                <span class="help-block">This is HTML title for SEO</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Keyword</label>
                            <div class="col-sm-10">
                                <input type="text" name="html_keywords" value="<?php if (@$isEdit) echo $details->html_keywords; ?>" id="html_keywords" class="form-control">
                                <!--<span class="help-block">This is page slug recognization</span>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Description</label>
                            <div class="col-sm-10">
                                <textarea name="html_description" id="html_description" class="form-control"><?php if (@$isEdit) echo $details->html_description; ?></textarea>
                                <!--<span class="help-block">This is page slug recognization</span>-->
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="numberfield" class="control-label col-sm-2">Date</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="valid date" name="date" value="<?php if (@$isEdit) echo $details->date; ?>" id="date"  class="form-control datepick">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Status</label>
                            <div class="col-sm-3">
                                <select name="status" id="select" class='form-control'>
                                    <option value="publish" <?php
                                    if (($isEdit) && ($details->status == 'publish')) {
                                        echo "selected";
                                    }
                                    ?>> Publish </option>
                                    <option value="unpublish" <?php
                                    if (($isEdit) && ($details->status == 'unpublish')) {
                                        echo "selected";
                                    }
                                    ?>> Unpublish </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Blog Image</label>
                            <div class="col-sm-10">
                                <div id="queueImage"></div>
                                <input type="file" name="blog_image" id="blog_image" />
                                <div class="imagethumbs-form">
                                    <?php
                                    if ($isEdit) {
                                        $imgname = $details->blog_image;
                                        $img = explode(':', $imgname);
                                        //dumparray($img);
                                        if (!empty($imgname)) {
                                            echo '';
                                            foreach ($img as $i) {
                                                ?>
                                                <div class="imagethumb-form additional-file-input" id="add-image1">
                                                    <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                    <a href="#" title="<?php echo $i; ?>" class="img-wrap">
                                                        <img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/blogs/<?php echo $i; ?>&w=150&h=150" />
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div> 
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/blog_list"); ?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
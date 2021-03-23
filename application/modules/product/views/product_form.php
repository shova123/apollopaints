<link rel="stylesheet" href="<?php echo base_url();?>assets_admin/css/plugins/tagsinput/jquery.tagsinput.css"/>
<script src="<?php echo base_url();?>assets_admin/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.css">

<!-- UPLOADIFIVE Start-->
<script type="text/javascript">
<?php $timestamp = time(); ?>
$(function() {
  $('#product_image').uploadifive({
                      'auto'            : true,               // Automatically upload a file when it's added to the queue
                      'buttonClass'     : false,              // A class to add to the UploadiFive button
                      'buttonText'      : 'Upload Image',     // The text that appears on the UploadiFive button
                      'checkScript'     : '<?php echo base_url(); ?>assets_admin/uploadifive/check-exists.php',// Path to the script that checks for existing file names 
                      'dnd'             : true,               // Allow drag and drop into the queue
            'dropTarget': false, // Selector for the drop target
            'fileSizeLimit': '153600', // Maximum allowed size of files to upload
            'fileType': false, // Type of files allowed (image, etc)
            'width': 180,
            'height': 30,
            'formData': {
                'timestamp': '<?php echo $timestamp; ?>',
                'targetFolder': '/appolo/uploads/product/',
                'token': '<?php echo @md5('unique_salt' . $timestamp); ?>'
            },
            'method': 'post', // The method to use when submitting the upload
            'multi': true, // Set to true to allow multiple file selections
            'queueID': 'queueImage', // The ID of the file queue
            'queueSizeLimit': 1, // The maximum number of files that can be in the queue
            'removeCompleted': true, // Set to true to remove files that have completed uploading
            'simUploadLimit': 0, // The maximum number of files to upload at once
            'truncateLength': 0, // The length to truncate the file names to
            'uploadLimit': 1, // The maximum number of files you can upload
            'uploadScript': '<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.php',
            onUploadComplete: function (file, data, response) {
                if($('#fileList').val()!=''){
                    $('#fileList').val($('#fileList').val()+':'+data);}
                else{//alert('blank');
                $('#fileList').val(data);}
                imagePath = "<?php echo str_replace("\\", "/", ROOT); ?>";
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url(); ?>"+'assets_admin/createThumb/create_thumb.php?src='+imagePath+'uploads/product/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
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
$(function(){
    //$('a#deleteImg').live('click',function(){
        //$('a#deleteImg').on('click',function(){
            $(document).on('click', '#deleteImg', function () {
        var _img = $(this).next().attr("title");//alert(_img);
        var _this = $(this).parent();
        delete_image(_img);
        $.post("<?php echo admin_url("product/delete_product_image");?>",{imgName:_img},
            function(data){
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
function delete_image(name){
    var filelist = $('#fileList').val();
    var filenames = filelist.split(':'); //alert(filenames.length);
    $('#fileList').val('');
    for(var i=0;i<filenames.length;i++)
    {
        if(filenames[i] != name)
        {   
            if($('#fileList').val()=='')
                $('#fileList').val(filenames[i]);
            else        
                $('#fileList').val($('#fileList').val()+':'+filenames[i]);
        }   
    }
}

</script>
<!-- UPLOADIFIVE End-->

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

<!-- SlugIT Start-->
<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>
<script>
$(function() 
{
    $('#product_title').slugIt({
        output: '#product_slug',
        separator: '_'

    });

});
</script>

<?php $isEdit = isset($product_details) ? true : false;?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-edit"></i><?php echo $page_title ?></h3>
                    </div>
                    <div class="box-content nopadding">
                        <form action="" method="post" id="addEditform" name="addEditform" class="addEditform form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                            <input type="hidden" id="fileList" name="fileList" value="<?php if ($isEdit) {echo $product_details->product_image;}?>" />

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Product Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter Product Title" value='<?php
                                    if ($isEdit) {
                                        echo $product_details->product_title;
                                    }
                                    ?>'data-rule-required="true" data-rule-minlength="2">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Product Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control slug" id="product_slug" name="product_slug" placeholder="Slug Recognition"  value="<?php
                                    if ($isEdit) {
                                        echo $product_details->product_slug;
                                    }
                                    ?>" readonly="">
                                </div>   
                            </div>
<!--                             <div class="form-group">
                                <label class="col-sm-2 control-label">Display Type</label>
                                <div class="col-sm-10">
                                    <?php
                                    if (!empty($isEdit)) {
                                        $checkboxd = explode(",", $product_details->display_type);
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
                                        <span class="custom-checkbox"></span> HOME(Featured)
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="footer" id="inlinecheckbox1" class='icheck-me' data-skin="square" data-color="red" name="display_type[]" <?php
                                        if (@$isEdit) {
                                            foreach ($checkboxd as $chkd2) {
                                                if ($chkd2 == 'footer') {
                                                    ?> checked<?php
                                                }
                                            }
                                        }
                                        ?>>
                                        <span class="custom-checkbox"></span> FOOTER
                                    </label>
                                </div>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Short Notes</label>
                                <div class="col-sm-10">
                                    <input type="text" name="short_note" id="short_note" placeholder="Short Description For Home Page" class="form-control" value="<?php if (@$isEdit) echo $product_details->short_note; ?>"> 
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Product Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id='product_description' rows="3" name="product_description" placeholder="Enter ..." ><?php
                                    if ($isEdit) {
                                        echo $product_details->product_description;
                                    }
                                    ?></textarea>
                                </div>
                            </div>
<!--                             <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Featured</label>
                            <div class="col-sm-10">
                                <input type="text" name="featured" id="featured" class="tagsinput form-control" value="<?php if (@$isEdit) echo $product_details->featured; ?>">
                            </div>
                           </div> -->
                            <div class="form-group">
                                <div>
                                    <label for="textfield" class="control-label col-sm-2">Order</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="order" placeholder="Enter Positive Number" value='<?php
                                        if ($isEdit) {
                                            echo $product_details->order;
                                        }
                                        ?>'data-rule-number="true" class="form-control" data-rule-digits="true" data-rule-required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group"   
                            <div class="col-sm-3">
                                <label for="textfield" class="control-label col-sm-2">Status</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="status">
                                        <option value="Publish" <?php
                                        if ($isEdit) {
                                            if ($product_details->status == 'Publish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Publish</option>
                                        <option value='Unpublish' <?php
                                        if ($isEdit) {
                                            if ($product_details->status == 'Unpublish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Unpublish</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Product Image</label>
                                <div class="col-sm-10">

                                    <div id="queueImage"></div>
                                    <input type="file" name='product_image' id="product_image"/>
                                    <div class="imagethumbs-form">
                                        <?php
                                        if ($isEdit) {
                                            $imgname = $product_details->product_image;
                                            $img = explode(':', $imgname);
                                                //dumparray($img);
                                            if (!empty($imgname)) {
                                                echo '';
                                                foreach ($img as $i) {
                                                    ?>
                                                    <div class="imagethumb-form additional-file-input" id="add-image1">
                                                        <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                        <a href="#" title="<?php echo $i; ?>" class="img-wrap">
                                                            <img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/product/<?php echo $i; ?>&w=150&h=150" />
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

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">HTML Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="html_title" name="html_title" placeholder="HTML Title for SEO" value='<?php
                                    if ($isEdit) {
                                        echo $product_details->html_title;
                                    }
                                    ?>'>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">HTML Keywords</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="html_title" name="html_keyword" placeholder="HTML Keywords for SEO" value='<?php
                                    if ($isEdit) {
                                        echo $product_details->html_keyword;
                                    }
                                    ?>'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">HTML Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="html_description" id="html_description" placeholder="Enter ..." ><?php
                                    if ($isEdit) {
                                        echo $product_details->html_description;
                                    }
                                    ?></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                                <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                                <a href="<?php echo base_url("admin/product/product_list");?>"><button type="button" class="btn">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
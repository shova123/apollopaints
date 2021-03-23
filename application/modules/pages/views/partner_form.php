<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.css"/>
<script src="<?php echo base_url(); ?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>

<!--  Uploadifive  -->
<script type="text/javascript">
<?php $timestamp = time(); ?>
      $(function() {
              $('#partner_image').uploadifive({
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
                'targetFolder': '/appolo/uploads/partner/',
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
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url(); ?>"+'assets_admin/createThumb/create_thumb.php?src='+imagePath+'uploads/partner/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
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
        $.post("<?php echo admin_url("pages/delete_partner_image");?>",{imgName:_img},
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
                        <input type="hidden" id="fileList" name="fileList" value="<?php if ($isEdit) echo $details->partner_image; ?>" />

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Partner Name</label>
                                <div class="col-sm-10">
                                    <input data-rule-required="true" data-rule-minlength="2" type="text" name="partner_name" id="partner_name" value="<?php if (@$isEdit) echo $details->partner_title; ?>" class="form-control">
                                    <!--<span class="help-block">Enter The page Title</span>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="numberfield" class="control-label col-sm-2">Link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" data-rule-required="true" type="text" placeholder="Only numbers" name="partner_link" value="<?php if (@$isEdit) echo $details->partner_link; ?>">
                                    <span class="help-block">example : http://www.example.com</span>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Status</label>
                                <div class="col-sm-3">
                                    <select name="status" id="select" class='chosen-select form-control'>
                                        <option value="Publish" <?php
                                        if (($isEdit) && ($details->status == 'Publish')) {
                                            echo "selected";
                                        }
                                        ?>> Publish </option>
                                        <option value="Unpublish" <?php
                                        if (($isEdit) && ($details->status == 'Unpublish')) {
                                            echo "selected";
                                        }
                                        ?>> Unpublish </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Image</label>
                                <div class="col-sm-10">
                                    <div id="queueImage"></div>
                                    <input type="file" name="partner_image" id="partner_image" /><!--class="form-control"-->
                                    <div class="imagethumbs-form">
                                        <?php
                                        if ($isEdit) {
                                            $imgname = $details->partner_image;
                                            $img = explode(':', $imgname);
                                            //dumparray($img);
                                            if (!empty($imgname)) {
                                                echo '';
                                                foreach ($img as $i) {
                                                    ?>
                                                    <div class="imagethumb-form additional-file-input" id="add-image1">
                                                        <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                        <a href="#" title="<?php echo $i; ?>" class="img-wrap">
                                                            <img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/partner/<?php echo $i; ?>&w=150&h=150" />
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
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="PartnerSubmit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/partner_list");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
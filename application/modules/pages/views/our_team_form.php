<script src="<?php echo base_url();?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/uploadifive/uploadifive.css"/>

<script type="text/javascript">
<?php $timestamp = time(); ?>
      $(function() {
              $('#home_image').uploadifive({
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
                'targetFolder': '/appolo/uploads/our_team/',
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
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url(); ?>"+'assets_admin/createThumb/create_thumb.php?src='+imagePath+'uploads/our_team/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
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
        $.post("<?php echo admin_url("pages/delete_our_team_image");?>",{imgName:_img},
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
<script src='<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#contents',
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
                        <i class="fa fa-edit"></i><?php echo $page_title;?></h3>
                </div>
                <div class="box-content nopadding">
                    <form action="" method="post" class="form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                        <input type="hidden" id="fileList" name="fileList" value="<?php if($isEdit) echo $details->home_image;?>" />

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">About Dropdown</label>
                            <div class="col-sm-2">
                                <select name="dropdown_id" id="select" class='chosen-select form-control'>
                                    <option value="" <?php if (($isEdit) && ($details->link == '')) echo "selected"; ?>> Select Dropdown</option>
                                        <?php
                                            if(!empty($dropdown_list)){
                                                foreach($dropdown_list as $drop){
                                                    $dropdown_id = $drop->id;
                                                    $dropdown_title = $drop->dropdown_title;
                                        ?>
                                        <option value="<?php echo $dropdown_id;?>" <?php if (($isEdit) && ($details->dropdown_id == $dropdown_id)) echo "selected"; ?> > <?php echo $dropdown_title;?> </option><!--onClick="showMe('div1', this);Hide('div2', this);"-->
                                        <?php }}?>

                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="link" value="<?php if(@$isEdit){echo $details->link;}else{echo @$link;}?>" />

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Member Name</label>
                                <div class="col-sm-10">
                                        <input type="text" name="name" id="name" value="<?php if (@$isEdit) echo $details->name; ?>" class="form-control">
                                        <span class="help-block">This is just a supporting text</span>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Member Designation</label>
                                <div class="col-sm-10">
                                    <input type="text" name="designation" id="designation" value="<?php if (@$isEdit) echo $details->designation; ?>" class="form-control">

                                </div>
                        </div>

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Member Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" value="<?php if (@$isEdit) echo $details->email; ?>" class="form-control">

                                </div>
                        </div>
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Member phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" id="phone" value="<?php if (@$isEdit) echo $details->phone; ?>" class="form-control">

                                </div>
                        </div>

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Content</label>
                                <div class="col-sm-10">
                                        <textarea name="contents" id="contents" class="form-control ckeditor"><?php if (@$isEdit) echo $details->contents; ?></textarea>
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
                                   <option value="Publish" <?php if (($isEdit) && ($details->status == 'Publish')){echo "selected";}?>> Publish </option>
                                    <option value="Unpublish" <?php if (($isEdit) && ($details->status == 'Unpublish')){echo "selected";}?>> Unpublish </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="textfield" class="control-label col-sm-2">Member Images</label>
                            <div class="col-sm-10">
                                <div id="queueImage"></div>
                                    <input id="home_image" name="home_image" type="file" multiple="true">
                                <div class="imagethumbs-form">
                                    <?php
                                        if($isEdit){
                                            $imgname = $details->home_image;
                                            $img = explode(':',$imgname);
                                            //dumparray($img);
                                                if(!empty($imgname)){
                                                    echo '';
                                                        foreach($img as $i){
                                    ?>
                                <div class="imagethumb-form additional-file-input" id="add-image1">
                                    <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                    <a href="#" title="<?php echo $i;?>" class="img-wrap">
                                    <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/our_team/<?php echo $i;?>&w=150&h=150" />
                                    </a>
                                    </div>
                                    <?php }}} ?>
                                </div>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Member Images</label>
                            <div class="col-sm-10">
                                <span class="help-block">Image extension ( .jpg, .jpeg,.gif,.png)</span>
                                <div id="queueImage"></div>
                                <input id="home_image" name="home_image" type="file" multiple="true">
                                <div class="imagethumbs-form">
                                <?php
                                if($isEdit){
                                        $imgname = $details->home_image;
                                        $img = explode(':',$imgname);
                                        //dumparray($img);
                                        if(!empty($imgname)){
                                            echo '';
                                            foreach($img as $i){
                                ?>
                                    <div class="imagethumb-form additional-file-input" id="add-image1">
                                        <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                        <a href="#" title="<?php echo $i;?>" class="img-wrap">
                                            <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/our_team/<?php echo $i;?>&w=150&h=150" />
                                        </a>
                                    </div>
                                <?php
                                            }
                                        }
                                }
                                ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-actions">
                            <input type="submit" name="submitDetail" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url('admin/pages/our_team');?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

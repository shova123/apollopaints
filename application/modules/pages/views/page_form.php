<script src="<?php echo base_url(); ?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.css">

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
                'targetFolder': '/appolo/uploads/banners/',
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
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url(); ?>"+'assets_admin/createThumb/create_thumb.php?src='+imagePath+'uploads/banners/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
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
        $.post("<?php echo admin_url("pages/delete_page_image");?>",{imgName:_img},
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

<script type="text/javascript" src="<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugin: 'a_tinymce_plugin',
        a_plugin_option: true,
        a_configuration_option: 400,
        extended_valid_elements : 'span',
        extended_valid_elements : 'i',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste jbimages"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        relative_urls: false
    });
</script>

<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>

<script>
    $(function() {
        $('#page_title').slugIt({
            output: '#page_slug',
            separator: '_'
        });

    });
</script>

<script type="text/javascript">
    function setOptions(chosen) {
        var selbox = document.addEditform.sub_content_page;
    
        selbox.options.length = 0;
        if (chosen == "content") {
            
            selbox.options[selbox.options.length] =
                new Option('--Select Page--');

        }else{

            <?php
            $this->db->select('*');
            $this->db->where('page_type','content');
            $queryPages = $this->db->get('pages');
            $page_details = $queryPages->result();
            if (!empty($page_details)) {
            foreach ($page_details as $page) {
            $pageID = $page->page_id;
            $pageTitle = $page->page_title;
            $pageSlug = $page->page_slug;
            ?>
            if(chosen == "subcontent"){
            
               selbox.options[selbox.options.length] = new Option('<?php echo $pageTitle; ?>', '<?php echo $pageSlug; ?>');//fetching and displaying sub category in option after selected category
                }
            <?php

            }
        }
            ?>
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
                        <input type="hidden" id="fileList" name="fileList" value="<?php if($isEdit) echo $details->home_image;?>" />
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Page Type</label>
                            <div class="col-sm-5">
                                <select data-rule-required="true" class="form-control" name="page_type" id="page_type" onchange="setOptions(document.addEditform.page_type.options[ document.addEditform.page_type.selectedIndex].value);">
                                    <option value="content" <?php if (($isEdit) && ($details->page_type == 'content')){echo "selected";}?>> Content </option>
                                    <option value="subcontent" <?php if (($isEdit)&& ($details->page_type == 'subcontent')){echo "selected";}?>> Sub Content </option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Select Page</label>
                                 <div class="col-sm-5">
                                <select class="form-control" name="sub_content_page" id="sub_content_page">
                                    <!-- <option value="" selected="selected"> Select Page</option> -->
                                     <option value="" <?php
                                    if ($isEdit) {
                                        if ($details->page_id == '') {?>selected<?php
                                        }
                                    }
                                    ?>>Select Page</option>
                                            <?php
                                                $this->db->select('*');
                                                $this->db->where('status','Publish');
                                                $this->db->where('page_type','content');
                                                $queryContentpage = $this->db->get('pages');
                                                $contentPage = $queryContentpage->result();
                                                
                                            if (!empty($contentPage)) {
                                                foreach($contentPage as $page){
                                             ?>
                                            <option value="<?php echo $page->page_slug; ?>" <?php
                                                    if ($isEdit){if($details->sub_content_page == $page->page_slug){?>
                                                            selected
                                                    <?php }}?>>
                                                    <?php echo ucfirst($page->page_title); ?></option>
                                            <?php } }?>

                                    </select>
                             </div>
                            </div>
                        

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Page Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="page_title" id="page_title" value="<?php if (@$isEdit) echo $details->page_title; ?>" class="form-control">
                                <span class="help-block">Enter The page Title</span>
                            </div>
                       </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Page Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="page_slug" id="page_slug" value="<?php if (@$isEdit) echo $details->page_slug; ?>" class="form-control slug" readonly>
                                <span class="help-block">This is page slug recognization</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Page Content</label>
                            <div class="col-sm-10">
                                <textarea name="page_content" id="page_content" class="form-control"><?php if (@$isEdit) echo $details->content; ?></textarea>
                                <span class="help-block">This is page slug recognization</span>
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

<!--                         <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Banner Image</label>
                            <div class="col-sm-10">
                                <div id="queueImage"></div>
                                <input type="file" name="home_image" id="home_image" />
                                <div class="imagethumbs-form">
                                    <?php
                                    if($isEdit){
                                        $imgname = $details->home_image;
                                        $img = explode(':',$imgname);
                                        if(!empty($imgname)){
                                            echo '';
                                            foreach($img as $i){
                                                ?>
                                                <div class="imagethumb-form additional-file-input" id="add-image1">
                                                    <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                    <a href="#" title="<?php echo $i;?>" class="img-wrap">
                                                        <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/banners/<?php echo $i;?>&w=150&h=150" />
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
                            <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/page_list");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
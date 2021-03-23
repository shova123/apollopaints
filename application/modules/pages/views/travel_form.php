<!--<script type="text/javascript" src="<?php echo base_url();?>assets_admin/js/jquery.stringToSlug.js"></script>
<script>
    $(document).ready(function () {
        $("#page_title").stringToSlug();
    });
</script>-->
<script type='text/javascript' src='<?php echo base_url(); ?>assets_admin/js/jquery.slugit.js'></script>
<script>
    $(function() {
        $('#page_title').slugIt({
            output: '#page_slug',
            separator: '_'
        });
    });
</script>
<!--<script src="<?php echo base_url();?>assets_admin/uploadifive/jquery.uploadifive-v1.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/uploadifive/uploadifive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/css/dim.css">-->

<script src="<?php echo base_url();?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_admin/uploadifive/uploadifive.css"/>

<!--  Uploadifive  -->
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
                'targetFolder': '/pure/uploads/travel_info/',
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
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="'+data+'" class="img-wrap"><img src="'+"<?php echo base_url(); ?>"+'assets_admin/createThumb/create_thumb.php?src='+imagePath+'uploads/travel_info/'+data+'&w=150&h=150" alt="'+data+'" /></a></div>');
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
    $.post("<?php echo admin_url("pages/travel_info_delete_image");?>",{imgName:_img},
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
        selector: '#travel-content',
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
                        <input type="hidden" name="link" value="<?php if($isEdit){echo $details->link;}else{echo $link;}?>" />
                        
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Country</label>
                            <div class="col-sm-2">
                                <select name="country" id="select" class='chosen-select form-control'>
                                  <option>Select Country</option>
                                    <?php
                                      $this->db->select('*');
                                      $this->db->order_by('order', 'ASC');
                                      $queryCountry = $this->db->get('country');
                                      $countryDetails = $queryCountry->result();
                                      if(!empty($countryDetails)){
                                          foreach($countryDetails as $countryResults){
                                              $countryID = $countryResults->country_id;
                                              $countryLink = $countryResults->link;
                                              $countryTitle = $countryResults->country_title;
                                              $countrySlug = $countryResults->country_slug;

                                    ?>
                                   <option value="<?php echo $countryLink;?>" <?php if (($isEdit) && ($details->country == $countryLink)){echo "selected";}?>><?php echo ucfirst($countryTitle);?></option>
                                   <?php }}?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Travel <?php echo $link;?> Title</label>
                                <div class="col-sm-10">
                                        <input type="text" name="page_title" id="page_title" value="<?php if (@$isEdit) echo $details->page_title; ?>" class="form-control">
                                        <span class="help-block">This is just a supporting text</span>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Travel <?php echo $link;?> Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" name="page_slug" id="page_slug" value="<?php if (@$isEdit) echo $details->page_slug; ?>" class="form-control slug" readonly>
                                    <span class="help-block">This is page slug recognization</span>
                                </div>
                        </div>
                            
                        
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Html Keywords</label>
                                <div class="col-sm-10">
                                        <input type="text" name="html_keyword" value="<?php if (@$isEdit) echo $details->html_keyword; ?>" id="textfield" class="form-control">
                                        <span class="help-block">This is page slug recognization</span>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Html Description</label>
                                <div class="col-sm-10">
                                        <textarea name="html_describe" id="textarea" class="form-control"><?php if (@$isEdit) echo $details->html_describe; ?></textarea>
                                        <span class="help-block">This is page slug recognization</span>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Page Content</label>
                                <div class="col-sm-10">
                                        <textarea name="content" id="travel-content" class="form-control"><?php if (@$isEdit) echo $details->content; ?></textarea>
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
                            <label for="textfield" class="control-label col-sm-2">Banner Images</label>
                            <div class="col-sm-10">
                                <div id="queueImage"></div>
                                <input id="home_image" name="home_image" type="file">
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
                                            <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/travel_info/<?php echo $i;?>&w=150&h=150" />
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
                            <input type="submit" name="submitDetail" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/travel_info");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
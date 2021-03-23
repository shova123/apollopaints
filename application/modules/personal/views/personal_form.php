<script src="<?php echo base_url(); ?>assets_admin/uploadifive/jquery.uploadifive.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/uploadifive/uploadifive.css">

<!-- UPLOADIFIVE Start-->
<script type="text/javascript">
<?php $timestamp = time(); ?>
$(function() {
  $('#user_image').uploadifive({
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
        $.post("<?php echo admin_url("personal/delete_image");?>",{imgName:_img},
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
<div class="container-fluid">
    <div class="page-header">
        <div class="pull-left">
            <h1>User profile</h1>
        </div>
    </div>
    <br/>


    <div class="row">
        <div class="col-sm-12">
            <div class="box box-color box-bordered">
                <div class="box-title">
                    <h3>
                        <i class="fa fa-user"></i>
                        Edit user profile
                    </h3>
                </div>
                <div class="box-content nopadding">
                    <ul class="tabs tabs-inline tabs-top">
                        <!-- <li class='active'>
                            <a href="#profile" data-toggle='tab'>
                                <i class="fa fa-bullhorn"></i>Profile</a>
                            </li> -->
<!--                        <li>
                            <a href="#settings" data-toggle='tab'>
                                <i class="fa fa-user"></i>Settings</a>
                            </li>-->

                        </ul>
                        <div class="tab-content padding tab-content-inline tab-content-bottom">
                            <div class="tab-pane active" id="settings">
                                <form action="<?php echo base_url("admin/personal");?>" method="post" class="form-horizontal form-validate" id="bb">
                                    <input type="hidden" id="fileList" name="fileList" value="<?php echo $details->user_image;?>" />
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="name" class="control-label col-sm-2 right">Admin Name:</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                //$full_name = set_value('adminname');
                                                    if (isset($details->admin_name)) {
                                                        $full_name = $details->admin_name;
                                                    }?>
                                                    <input type="text" name="adminname" value="<?php echo $full_name;?>" id="FullName" class="form-control">
                                                </div>
                                            </div>
<!--                                             <div class="form-group">
                                                <label for="name" class="control-label col-sm-2 right">Company Name:</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                //$full_name = set_value('adminname');
                                                    if (isset($details->message)) {
                                                        $message = $details->message;
                                                    }?>
                                                    <input type="text" name="message" value="<?php echo $message;?>" id="message" class="form-control">
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="t" class="control-label col-sm-2 right">Email:</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                //$emails = set_value('email');
                                                    if (isset($details->email)) {
                                                        $emails = $details->email;
                                                    }?>
                                                    <input type="text" name="email" value="<?php echo $emails;?>" id="Email" class="form-control"/><!-- data-rule-email="true" data-rule-required="true"/>-->
<!--                                                <div class="form-button">
                                                    <a href="#" class="btn btn-grey-4 change-input">Change</a>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-2 right">User Name:</label>
                                            <div class="col-sm-10">
                                                <?php
                                                //$username = set_value('username');
                                                if (isset($details->username)) {
                                                    $username = $details->username;
                                                }?>
                                                <input type="text" name="username" value="<?php echo $username;?>" id="Username" class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pw" class="control-label col-sm-2 right">Old Password:</label>
                                            <div class="col-sm-10">
                                                <?php
                                                // $password = set_value('password');
                                                if (isset($details->password)) {
                                                    $password = $details->password;
                                                }?>
                                                <input type="password" name="oldpassword" value="<?php echo $password;?>" placeholder="6 - 15 Characters" id="oldPassword" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pwfield" class="control-label col-sm-2 right">New Password:</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="newpassword" id="pwfield" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmfield" class="control-label col-sm-2 right">Confirm password:</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="confirmpassword" id="confirmfield" class="form-control" data-rule-equalTo="#pwfield">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Logo</label>
                                            <div class="col-sm-10">

                                                <div id="queueImage"></div>
                                                <input type="file" name='user_image' id="user_image"/>
                                                <div class="imagethumbs-form">
                                                    <?php
                                                            // $Image = set_value('user_image');
                                                    if (isset($details->user_image)) {
                                                        $Image = $details->user_image;
                                                    }if(!empty($Image)){?>
                                                    <div class="imagethumb-form additional-file-input" id="add-image1">
                                                        <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                        <a href="#" title="<?php echo $Image;?>" class="img-wrap">
                                                            <img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/banners/<?php echo $Image;?>&w=150&h=150" />
                                                        </a>  
                                                    </div>
                                                    <?php
                                                }
                                                
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit_detail" value="Update" class="btn btn-primary" />
                                        <!--<input type="submit" class='btn btn-primary' value="Save">-->
                                        <input type="reset" class='btn' value="Discard changes">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        <!-- <div class="tab-pane" id="profile">
                                        <form action="<?php echo base_url("admin/personal");?>" method="post" class="form-horizontal form-validate" class="form-horizontal">
                                            <input type="hidden" id="fileList" name="fileList" value="<?php echo $details->user_image;?>" />
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group"> -->
                                                    <!-- <label for="textfield" class="control-label col-sm-2">User Image</label> -->
                                                    <!-- <div class="fileinput fileinput-new" data-provides="fileinput"> -->
                                                       <!--  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 84px; height: 84px;">
                                                            <?php
                                                            // $image = set_value('user_image');
                                                            //if (isset($details->user_image)) {
                                                                // $image = $details->user_image;
                                                            //}?>
                                                            <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb?src=<?php echo ROOT;?>uploads/our_team/<?php echo $image;?>" alt="No-Image">
                                                        </div>
                                                        <div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select image</span> -->
                                                            <!-- <span class="fileinput-exists">Change</span> -->
                                                            <!-- <input name="user_image" id="user_image" type="file" name="...">
                                                            </span>
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div> -->
                                                        <!-- <div class="col-sm-10">
                                                        <div id="queueImage"></div>
                                                        <input type="file" name="user_image" id="user_image" /><!--class="form-control"--> 
                                                        <!-- <div class="imagethumbs-form">
                                                           <?php
                                                            // $Image = set_value('user_image');
                                                            if (isset($details->user_image)) {
                                                                $Image = $details->user_image;
                                                            }if(!empty($Image)){?>
                                                            <div class="imagethumb-form additional-file-input" id="add-image1">
                                                                <a class="close-msg" title="Delete" id="deleteImg">Delete</a>
                                                                <a href="#" title="<?php echo $Image;?>" class="img-wrap">
                                                                    <img src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/our_team/<?php echo $Image;?>&w=150&h=150" />
                                                                </a>
                                                            </div>
                                                            <?php }?>
                                                        </div> -->
                                                    <!-- </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                <div class="form-group">
                                                <label for="message" class="control-label col-sm-2 right">Message</label>
                                                <div class="col-sm-10"> -->
                                                    <?php
                                                // $message = set_value('message');
                                              //  if (isset($details->message)) {
                                                  //  $message = $details->message;
                                              //  }?>
                                              <!-- <textarea type="text" name="message" id="message" class="form-control"><?php echo $message;?></textarea> -->
                                              <!-- </div> -->
                                              <!-- </div> -->
                                              <!--  -->
                                              <!-- </div> -->

                                              <!-- </div> -->
                                              <!-- <div class="form-actions"> -->
                                              <!-- <input type="submit" name="submit_detail" class='btn btn-primary' value="Save Changes"> -->
                                              <!-- <input type="reset" class='btn' value="Discard changes"> -->
                                              <!-- </div> -->
                                              <!-- </form> -->
                                              <!-- </div> -->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

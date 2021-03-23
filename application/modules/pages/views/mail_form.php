<script src='<?php echo base_url();?>assets_admin/tinymce/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: 'textarea.mail_content',
    plugin: 'a_tinymce_plugin',
    a_plugin_option: true,
    a_configuration_option: 400,
    toolbar: [
        'newdocument | bold italic underline | strikethrough alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect',
        'link image specialchar jbimages media | cut copy paste | bullist numlist outdent indent | blockquote | insertfile undo redo | removeformat subscript superscript | print preview media fullpage | forecolor backcolor emoticons'
    ],
    //content_css: 'css/content.css',
//    menubar: {  file:{}, 
//                edit:{},
//                view: {title: 'Edit', items: 'cut, copy, paste, code'}
//            },
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor',
      
    ],
    templates : [
                    <?php
                    if (!empty($folder)) {
                        foreach ($folder as $k => $v) {
                            if (!empty($v)) {
                                foreach ($v as $value => $l) {
                                    $templateTitle = "$k/$value";
                                    $templateSrc = base_url()."resources/email_templates/$templateTitle/index.php";
                                    $templateFullDescription = "$k $value";
                    ?>
                        {
                            title : "<?php echo $templateTitle;?>",
                            url : "<?php echo $templateSrc;?>",
                            description : "<?php echo $templateFullDescription;?>"
                        },

                    <?php       }
                            }
                        }
                    }
                    ?>
                ],
    advlist_bullet_styles: 'square,circle',
    advlist_number_styles: 'lower-alpha,lower-roman,upper-alpha,upper-roman',
    //image_advtab: true,
     //elements : 'filemanager',
       //file_browser_callback : 'filemanager',
 //      Responsive Filemanager
       // relative_urls:true,
        //external_filemanager_path:"<?php echo base_url(); ?>tinymce/js/tinymce/plugins/filemanager/",
        //filemanager_title:"Responsive Filemanager" ,
       //external_plugins: { "filemanager" : "<?php echo base_url(); ?>tinymce/js/tinymce/plugins/filemanager/plugin.min.js"}
  });
 </script>
<script>
//     $(function () {
//         var documentPath='<?php echo base_url();?>';
//          tinymce.init({
//                selector: "textarea",  // change this value according to your HTML
//                plugins: "template",
//                menubar: "insert",
//                toolbar: "template",
//                templates:documentPath+ "resources/email_templates/Acrylic/FullWidth/index.php"
//              });


//        $('#TemplateID').on('change',function () {
////            alert("hello");
//            var name = $('#TemplateID').val();
////            alert(name);
//            var path = "<?php echo base_url();?>resources/email_templates/" + name + "index.php";
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo base_url('pages/admin/ajax') ?>',
//                data: {val: path},
//                success: function (response) {
//                    $("#mail_content").val(response);
//                   
//                }
//            });
                
                
                
//                tinymce.init({
//                    selector: '#mail_content',
//                    height: 170,
//                    theme: 'modern',
//                    plugins: [
//                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//                        'searchreplace wordcount visualblocks visualchars code fullscreen',
//                        'insertdatetime media nonbreaking save table contextmenu directionality',
//                        'emoticons template paste textcolor colorpicker textpattern imagetools',
//                         
//                    ],
//                    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//                    toolbar2: 'print preview media | forecolor backcolor emoticons',
//                    image_advtab: true,
// templates : [
//                    <?php
                    if (!empty($folder)) {
                        foreach ($folder as $k => $v) {
                            if (!empty($v)) {
                                foreach ($v as $value => $l) {
                                    $templateTITLE = "$k/$value";
                                    $templateSRC = base_url()."resources/email_templates/$templateTITLE/index.php";
                                    $templateFullDescription = "$k $value";
                    ?>//
//                        {
//                            title : "<?php echo $templateTITLE;?>",
//                            url : "<?php echo $templateSRC;?>",
//                            description : "<?php echo $templateFullDescription;?>"
//                        },
//
//                    <?php       }
                            }
                        }
                    }
                    ?>//
//                ],
//                    content_css: [
//                        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
//                        '//www.tinymce.com/css/codepen.min.css'
//                    ]
//                });
//            });
//        });
    
</script>
<?php
//echo "<pre>";
//print_r($email);die;
//                                if (!empty($folder)) {
//                                    foreach ($folder as $key => $val) {
//                                        echo "<pre>"; print_r($val);die;
//                                }}
//                                        
?>
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
                        <input type="hidden" id="mailto" name="mailto" value="<?php if(!empty($email)){ echo $email;}?>" />
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" name="subject" id="subject" value="" class="form-control">
                                <!--<span class="help-block">Enter The Blog Title</span>-->
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Email Template</label>
                            <div class="col-sm-5">
                                <select  class="form-control" name="TemplateID" id="TemplateID">
                                    <option value=""> Select Template</option>
                                    <?php
                                    if (!empty($folder)) {
                                        foreach ($folder as $key => $val) {
                                            ?>
                                            <optgroup id="templategroup" label="<?php echo $key; ?>">
                                                <?php
                                                if ($val) {

                                                    foreach ($val as $value => $l) {
                                                        $temp = $key . $value;
                                                        ?>
                                                        <option value="<?php echo $temp; ?>"><?php echo $value; ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </optgroup>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>  
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Mail Content</label>
                            <div class="col-sm-10">
                                <textarea name="mail_content" id="mail_content" class="mail_content form-control"></textarea>
                                <!--<span class="help-block">This is Blog slug recognization</span>-->
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" name="mailSubmit" class="btn btn-primary" value="Send">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/newsletter"); ?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
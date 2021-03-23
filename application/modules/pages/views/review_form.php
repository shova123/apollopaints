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
                            
                            <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Reviewer's Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" value="<?php if (@$isEdit) echo $details->name; ?>" class="form-control">
                                <!--<span class="help-block">Enter The Review Title</span>-->
                            </div>
                       </div>
                            <!-- <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Reviewer's Nationality</label>
                            <div class="col-sm-10">
                                <input type="text" name="nationality" id="nationality" value="<?php if (@$isEdit) echo $details->nationality; ?>" class="form-control">
                                <span class="help-block">Enter The Review Title</span>
                            </div>
                       </div> -->

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Review Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="review_title" id="review_title" value="<?php if (@$isEdit) echo $details->review_title; ?>" class="form-control">
                                <span class="help-block">Enter The Review Title</span>
                            </div>
                       </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Review Content</label>
                            <div class="col-sm-10">
                                <textarea name="review_content" id="review_content" class="form-control"><?php if (@$isEdit) echo $details->review_content; ?></textarea>
                                <!-- <span class="help-block">This is Review slug recognization</span> -->
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
                                        <input type="checkbox" value="default" id="inlinecheckbox1" class='icheck-me' data-skin="square" data-color="red" name="display_type[]" <?php
                                        if (@$isEdit) {
                                            foreach ($checkboxd as $chkd) {
                                                if ($chkd == 'default') {
                                                    ?> checked<?php
                                                       }
                                                   }
                                               }
                                               ?>>
                                        <span class="custom-checkbox"></span> Default
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="clients" id="inlinecheckbox1" class='icheck-me' data-skin="square" data-color="red" name="display_type[]" <?php
                                        if (@$isEdit) {
                                            foreach ($checkboxd as $chkd2) {
                                                if ($chkd2 == 'clients') {
                                                    ?> checked<?php
                                                       }
                                                   }
                                               }
                                               ?>>
                                        <span class="custom-checkbox"></span> Our Happy Clients
                                    </label>
                                </div>
                            </div> -->
                       
                       <!-- <div class="form-group">
                            <label for="rating" class="control-label col-sm-2">Rating</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="rating">
                                    <option value="1" <?php if ($isEdit) {if ($details->rating == 1) {echo 'selected';}}?>>1</option>
                                    <option value='2' <?php if ($isEdit) {if ($details->rating == 2) {echo 'selected';}}?>>2</option>
                                    <option value="3" <?php if ($isEdit) {if ($details->rating == 3) {echo 'selected';}}?>>3</option>
                                    <option value='4' <?php if ($isEdit) {if ($details->rating == 4) {echo 'selected';}}?>>4</option>
                                    <option value="5" <?php if ($isEdit) {if ($details->rating == 5) {echo 'selected';}}?>>5</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
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
                                <span class="help-block">This is Review slug recognization</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">HTML Description</label>
                            <div class="col-sm-10">
                                <textarea name="html_description" id="html_description" class="form-control"><?php if (@$isEdit) echo $details->html_description; ?></textarea>
                                <span class="help-block">This is Review slug recognization</span>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="numberfield" class="control-label col-sm-2">Order</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="Only numbers" name="order" value="<?php if (@$isEdit) echo $details->order; ?>" id="numberfield" data-rule-number="true" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Status</label>
                            <div class="col-sm-2">
                                <select name="status" id="select" class='form-control'>
                                    <option value="publish" <?php if (($isEdit) && ($details->status == 'publish')){echo "selected";}?>> Publish </option>
                                    <option value="unpublish" <?php if (($isEdit) && ($details->status == 'unpublish')){echo "selected";}?>> Unpublish </option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="textfield" class="control-label col-sm-2">Review Image</label>
                            <div class="col-sm-10">
                                <div id="queueImage"></div>
                                <input type="file" name="image" id="image" />class="form-control"
                                <div class="imagethumbs-form">
                                    <?php
                                    if($isEdit){
                                        $imgname = $details->image;
                                        $img = explode(':',$imgname);
                                        //dumparray($img);
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
                            <input type="submit" name="testiSubmit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/testimonial");?>"><button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
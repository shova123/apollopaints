<script src="<?php echo base_url();?>assets_admin/js/jscolor.js"></script>
<script type="text/javascript">
     $('.color').colorPicker();
</script>
<?php $isEdit = isset($color_details) ? true : false;?>
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

                            <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Color Code</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control jscolor" id="color_code" name="color_code" placeholder="Enter Color Title" value='<?php
                                    if ($isEdit) {
                                        echo $color_details->color_code;
                                    }
                                    ?>'data-rule-required="true" data-rule-minlength="2">

                                </div>
                            </div>



                            <div class="form-group">
                                <div>
                                    <label for="textfield" class="control-label col-sm-2">Order</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="order" placeholder="Enter Positive Number" value='<?php
                                        if ($isEdit) {
                                            echo $color_details->order;
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
                                            if ($color_details->status == 'Publish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Publish</option>
                                        <option value='Unpublish' <?php
                                        if ($isEdit) {
                                            if ($color_details->status == 'Unpublish') {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Unpublish</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-actions">
                                <input type="submit" name="ColorSubmit" class="btn btn-primary" value="SUBMIT">
                                <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                                <a href="<?php echo base_url("admin/color_visualizer/color_list/$slug");?>"><button type="button" class="btn">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
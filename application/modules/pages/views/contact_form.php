
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
                    <form action="" method="POST" class="form-horizontal form-bordered form-validate" enctype='multipart/form-data' >
                       <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Company Name</label>
                                <div class="col-sm-10">
                                        <input type="text" name="company_name" id="company_name" value="<?php if (@$isEdit) echo $details->company_name; ?>" class="form-control">
                                        <span class="help-block">This is Company Name</span>
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Google Map</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="google_map"><?php echo $details->google_map;?></textarea>
                                    <span class="help-block">link to Google Map</span>
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Contact No.</label>
                                <div class="col-sm-10">
                                        <input type="text" name="contact_no_ph" id="contact_no_ph" value="<?php if (@$isEdit) echo $details->contact_no_ph; ?>" class="form-control">
                                        <!-- <span class="help-block">This is Company Name</span> -->
                                </div>
                        </div>
<!--                                                 <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Contact No.</label>
                                <div class="col-sm-10">
                                        <input type="text" name="contact_no_mb" id="contact_no_mb" value="<?php if (@$isEdit) echo $details->contact_no_mb; ?>" class="form-control">
                                        <!-- <span class="help-block">This is Company Name</span> -->
                                </div>
                        </div> -->
                                                <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                        <input type="text" name="address" id="address" value="<?php if (@$isEdit) echo $details->address; ?>" class="form-control">
                                        <!-- <span class="help-block">This is Company Name</span> -->
                                </div>
                        </div>
                                                <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                        <input type="text" name="email" id="email" value="<?php if (@$isEdit) echo $details->email; ?>" class="form-control">
                                        <!-- <span class="help-block">This is Company Name</span> -->
                                </div>
                        </div>
                                                <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Working Hours</label>
                                <div class="col-sm-10">
                                        <input type="text" name="working" id="working" value="<?php if (@$isEdit) echo $details->working; ?>" class="form-control">
                                        <!-- <span class="help-block">This is Company Name</span> -->
                                </div>
                        </div>
<!--                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">PAN No.</label>
                                <div class="col-sm-10">
                                        <input type="text" name="pri_address" id="pri_address" value="<?php if (@$isEdit) echo $details->pri_address; ?>" class="form-control">
                                         <span class="help-block">This is Company Name</span> 
                                </div>
                        </div>-->
<!--                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Company Email</label>
                                <div class="col-sm-10">
                                        <input type="text" name="email" id="email" value="<?php if (@$isEdit) echo $details->email; ?>" class="form-control">
                                         <span class="help-block">This is Company Name</span> 
                                </div>
                        </div>-->

<!--                        <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Company Address</label>
                                <div class="col-sm-10">
                                        <input type="text" name="address" id="address" value="<?php if (@$isEdit) echo $details->address; ?>" class="form-control">
                                         <span class="help-block">This is Company Name</span> 
                                </div>
                        </div>-->
                        <!-- <div class="form-group">
                                <label for="textfield" class="control-label col-sm-2">Company Info</label>
                                <div class="col-sm-10">
                                        <textarea name="contact_info" id="contact_info" class="form-control"><?php if (@$isEdit) echo $details->contact_info; ?></textarea>
                                        <span class="help-block">All the Information</span>
                                </div>
                        </div> -->
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
                            <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                            <a href="<?php echo base_url("admin/pages/contact_list");?>"<button type="button" class="btn">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
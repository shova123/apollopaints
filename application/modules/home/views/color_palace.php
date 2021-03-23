        <div class="abouts">
        	<div class="container">
               <div class="row">
                   <div class="col-sm-12">
                       <div class="about-lt">
                          <h1>Color Palace</h1>
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <?php if(!empty($gallery)){

                               ?>
                               <div class="ColorBox">
                                <ul>
                                    <?php foreach($gallery as $img){ ?>
                                    <li><img alt="<?php echo $img->image_title; ?>" class="img-responsive" src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/gallery/<?php echo $img->image_name; ?>&w=120&h=50"></li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <?php } ?>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

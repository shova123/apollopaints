<?php  if(!empty($slider_details)){ ?>
<!--banner start--> 
<div class="banner">
	<div class="container1">
    	<div class="slider flexslider">
        	<ul class="slides">
                <?php foreach($slider_details as $slides){?>
            	<li><img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT;?>uploads/slide/<?php echo $slides->slide_img;?>&w=1305&h=515" alt="#" class="img-responsive">
                	<div class="container">
                    	<div class="caption">
                    	<h2><?php echo $slides->slide_title; ?></h2>
                        <!-- <h3>choose wide range of colors</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a </p> -->
                        <?php echo $slides->slide_description; ?>
                        <div class="choose-color-btn">
                        	<a href="#">choose color</a>
                        </div>
                    </div>
                    </div>
                </li>
                <?php } ?>
<!--                 <li><img src="<?php echo base_url();?>assets_front/images/slider.jpg" alt="#" class="img-responsive">
                	<div class="container">
                    	<div class="caption">
                    	<h2>color <br>visualizer</h2>
                        <h3>choose wide range of colors</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a </p>
                        <div class="choose-color-btn">
                        	<a href="#">choose color</a>
                        </div>
                    </div>
                    </div>
                </li>
                
                <li><img src="<?php echo base_url();?>assets_front/images/slider.jpg" alt="#" class="img-responsive">
                	<div class="container">
                    	<div class="caption">
                    	<h2>color <br>visualizer</h2>
                        <h3>choose wide range of colors</h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a </p>
                        <div class="choose-color-btn">
                        	<a href="#">choose color</a>
                        </div>
                    </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<?php } ?>
<!--banner end-->
<div class="better-quality">
<?php if(!empty($homeContent)){ ?>
	<div class="container">
    	<div class="quality-title text-center">
        	<?php echo $homeContent->content; ?>
        <div class="text-center visualizer-more">
        	<a href="<?php echo base_url('about'); ?>">read more</a>
        </div>
    </div>
</div>
</div>
<?php } if(!empty($homeSubContent)){ 
    // for($i=0;$i<count($homeSubContent);$i++){
        
    ?>
<div class="color-visualizer">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
                <div class="main-title">
                    <h2><?php echo @$homeSubContent[0]->page_title;?></h2>
                	<!-- <h2>color <br>visualizer</h2>
                    <h3>wide range of your colors</h3>
                    <p>The best work is that which inspires<span> inspires us, interests us,</span> or motivates us. </p> -->
                    <?php echo @$homeSubContent[0]->content; ?>
                </div>
                <div class="view-more">
                    <a class="text-left" href="#">choose color </a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="visualizer-image"></div>
            </div>
        </div>
    </div>

</div>
<div class="ask-expert">
	<div class="container">
    	<div class="col-sm-5">
        	<div class="ask-expert-image">
                <!-- <img src="<?php echo base_url(); ?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/banners/<?php echo $homeSubContent[1]->home_image; ?>&w=367&h=285" class="img-responsive" alt="ask-expert"> -->
                <img src="<?php echo base_url(); ?>assets_front/images/asl-expert.png" class="img-responsive" alt="ask-expert">
            </div>
        </div>
        <div class="col-sm-7 text-right">
        	<div class="main-title">
                <h2><?php echo @$homeSubContent[1]->page_title;?></h2>
                	<!-- <h2>expert <br>advise at home</h2>
                    <h3>wide range of your colors</h3>
                    <p>The best work is that which inspires<span> inspires us, interests us,</span> or motivates us. </p> -->
                    <?php echo @$homeSubContent[1]->content; ?>
                </div>
            <div class="view-more">
                <a class="text-left" href="<?php echo base_url('contact'); ?>">contact us </a>
            </div>
        </div>
    </div>
</div>
<!--color palace-->
<div class="color-palace">
	<div class="container">
    	<div class="row">
        	<div class="col-md-5 col-sm-6">
            	<div class="main-title">
                    <h2><?php echo @$homeSubContent[2]->page_title;?></h2>
                	<!-- <h2>color palace</h2>
                    <h3>wide range of your colors</h3>
                    <p>The best work is that which inspires<span> inspires us, interests us,</span> or motivates us. </p> -->
                    <?php echo @$homeSubContent[2]->content; ?>
                </div>
                <div class="view-more">
                	<a href="<?php echo base_url("color_palace"); ?>">view more</a>
                </div>
            </div>
            <div class="col-md-7 col-sm-6">
            	<div class="color-palace-image">
                	<img src="<?php echo base_url(); ?>assets_front/images/color-palace.png" alt="color palace" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<!--testimonials-->
<div class="testimonial">
	<div class="container">
        <?php if(!empty($testimonials)){ ?>
    	<div class="testimonial-section flexslider">
            <ul class="slides">
                <?php foreach($testimonials as $testimonial){ ?>
                <li>
                    <div class="more-text text-center">
                        <h4><?php echo $testimonial->review_title; ?></h4>
                        <!-- <p>We are knowledge-seekers. If we don’t know something, we search for answers.</p> -->
                        <?php echo $testimonial->review_content; ?>
                        <div class="name"><?php echo $testimonial->name; ?></div>
                    </div>
                   
                </li>
                <?php } ?>
               <!--  <li>
                    <div class="more-text text-center">
                        <p>The best talent are people wholeheartedly dedicated to their craft.</p>
                        <div class="name">sam markon</div>
                    </div>
                   
                </li>
                
                <li>
                    <div class="more-text text-center">
                        <p>The best work is that which inspires inspires us, interests us, or motivates us. </p>
                        <div class="name">sam markon</div>
                    </div>
                   
                </li> -->
            </ul>
        </div>
        <?php } ?>
    </div>
</div>

<div class="map">
	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.924577444956!2d85.33106357327314!3d27.69470332426132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew+Baneshwor%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1467561474940"  height="285" frameborder="0" style="border:0" allowfullscreen></iframe> -->
    <?php
    $map = $this->general_db_model->get_row("contacts","*");
     echo $map->google_map; ?>
</div>


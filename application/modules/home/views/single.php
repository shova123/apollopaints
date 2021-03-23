        <div class="abouts">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                    	<div class="about-lt">
                    		<h1><?php echo $singleContent->page_title; ?></h1>
                            <?php echo $singleContent->content; ?>
                        </div>

                    </div>

                </div>
                
            </div>
        </div>
        <?php if(!empty($SubContent)){
        		for($i=0; $i<count($SubContent);$i++){
         ?>
                <div class="bg-image">
        	<img alt="color" class="img-responsive" src="<?php echo base_url();?>assets_front/images/top-bg.png">
        </div>
                <div class="about-working">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                    	<div class="work-about">
                        	<!-- <h3><span>READY TO WORK WITH PASSION</span>BEST IN CLASS SUPPORT</h3>
                            <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis is the fades energy.</p> -->
                            <h3><?php echo $SubContent[$i]->page_title; ?></h3>
                            <?php echo $SubContent[$i]->content; ?>
                        </div>
                       <!--  <div class="contact-link">
                        	<a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
        <?php }} ?>
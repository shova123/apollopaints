
        <!--BUDGET CALCULATION-->
        
        <div class="expert_advice">
        	<div class="container">
            	<div class="budget-title">
                	<h2 class="heading-2"><?php echo $Content->page_title; ?></h2>
                	<!-- <p>Take our expert's advice to decorate your home.</p> -->
                </div>
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                    <?php echo $Content->content; ?>
                        <!-- <div class="expert-image">
                        	<img alt="expert advice" class="img-responsive" src="<?php echo base_url();?>assets_front/images/expert-advice/expertadvice.jpg">
                        </div> -->
                        <!-- <div class="expert-info">
                        	<p>Looking for the perfect color combination? To help you, we have our experts who will be at your doorstep.</p>
                            <p>Register with us and experience professional services to make your home look special.</p>
                            <p><i class="fa fa-envelope"></i><em> SMS 'FS' to 36677. </em></p>
                        </div> -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                    	<!-- <div class="expert-image sample-images">
                        	<a href="expert-advice-sample-images.php"><img alt="sample image" class="img-responsive" src="<?php echo base_url();?>assets_front/images/expert-advice/sample1.jpg"></a>
                        </div>
                        <div class="sample-links">
                        	<ul>
                            	<li class="sampleimg"><a href="<?php echo base_url("expert/sample"); ?>">Select Sample</a></li>
                                <li class="terms-condin"><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div> -->
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
        </div>
 
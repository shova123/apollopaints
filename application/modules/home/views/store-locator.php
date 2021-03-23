
        
        <div class="parallax-window back-bg" data-parallax="scroll" data-image-src="<?php echo base_url();?>assets_front/images/locator.jpg"></div>
        	
<!--         <div class="location-details">
        	<div class="container">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="exampleInputName2">Name</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div> -->
        
        <div class="location-content">
        	<div class="container">
            	<div class="row">
                    <?php if(!empty($storeContent)){ 
                            foreach($storeContent as $content){
                        ?>
                	<div class="col-sm-3">
                    	<!-- <div class="content-loc-lt"> -->
                        	<div class="loc-info">
                            	<h4><?php echo $content->store_title; ?></h4>
                                <?php echo $content->store_description; ?>
                                <!-- <ul>
                                	<li>62 Main Road</li>
                                    <li>Mettupalayam</li>
                                    <li>Coimbatore </li>
                                    <li>India</li>
                                    <li>5.4 km </li>
                                </ul> -->
                                    <!-- <li><a href="#">Directions</a></li> -->
                            </div>
                        </div>
                        <?php }} ?>
<!--                         <div class="col-sm-3">
                            <div class="loc-info">
                            	<h4>BENNETTS OF LOGAN</h4>
                                <ul>
                                	<li>62 Main Road</li>
                                    <li>Mettupalayam</li>
                                    <li>Coimbatore </li>
                                    <li>India</li>
                                    <li>5.4 km </li>
                                    <li><a href="#">Directions</a></li>
                                </ul>
                            </div>
                             </div> -->
<!--                              <div class="col-sm-3">
                            <div class="loc-info">
                            	<h4>BENNETTS OF LOGAN</h4>
                                <ul>
                                	<li>62 Main Road</li>
                                    <li>Mettupalayam</li>
                                    <li>Coimbatore </li>
                                    <li>India</li>
                                    <li>5.4 km </li>
                                    <li><a href="#">Directions</a></li>
                                </ul>
                            </div>
                            </div> -->
<!--                             <div class="col-sm-3">
                            <div class="loc-info">
                            	<h4>BENNETTS OF LOGAN</h4>
                                <ul>
                                	<li>62 Main Road</li>
                                    <li>Mettupalayam</li>
                                    <li>Coimbatore </li>
                                    <li>India</li>
                                    <li>5.4 km </li>
                                    <li><a href="#">Directions</a></li>
                                </ul>
                            </div>
                            </div> -->
                        </div>
                    </div>
<!--                     <div class="col-sm-8">
                    	<div class="location-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.924577444956!2d85.33106357327314!3d27.69470332426132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew+Baneshwor%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1467561474940"  height="285" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

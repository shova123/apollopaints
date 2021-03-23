
        
        <!--CONTACT-->
        
        <div class="contacttts">
        	<div class="container">
            	<h2 class="heading-2">Get in Touch</h2>
                
                <div id="ContactForm" class="margin-tp">
                    
                    <form method="post" name="contactform" action="" data-parsley-validate>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                        	<div class="form-group">
                                <input type="text" placeholder="Full Name" class="form-control"  data-parsley-type="alpha" data-parsley-minlength="3" required />
                            </div>
                            <div class="form-group">
                            	 <input type="text" placeholder="Address" class="form-control"  data-parsley-minlength="3" required />
                            </div>
                            <div class="form-group">
                            	<input type="email"  placeholder="Email" class="form-control" data-parsley-type="email" data-parsley-minlength="5" required />
                            </div>
                            <div class="form-group">
                            	<input type="phone"  placeholder="Phone" class="form-control" data-parsley-type="number" data-parsley-minlength="5" required />
                            </div>
                            <div class="form-group">
                            	<input type="phone"  placeholder="Subject" class="form-control" data-parsley-type="alpha" data-parsley-minlength="3"/>
                            </div>
                            
                             
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <textarea rows="9" class="form-control" placeholder="Message" data-parsley-type="alpha" data-parsley-minlength="3"></textarea>
                            </div>
							<div class="form-group">
                                <button type="submit" name="ContactSubmit" class="btn btn-default">Send</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                
                <div class="row">
            <div class="col-sm-6 no-padding">
                <div class="contact-lt">
                    <h2 class="heading-2">Contacts</h2>
                    <div class="ft-contact">
                        <li><i class="fa fa-map-marker"></i> <?php echo $contact_details->address; ?></li>
                        <li><i class="fa fa-phone"></i> <?php echo $contact_details->contact_no_ph; ?></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $contact_details->email; ?>"> <?php echo $contact_details->email; ?></a></li>
                        <li><i class="fa fa-clock-o"></i> <?php echo $contact_details->working; ?></li>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="welcome-image sect-map">
                    <?php echo $contact_details->google_map; ?>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.924577444956!2d85.33106357327314!3d27.69470332426132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew+Baneshwor%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1467561474940"  height="285" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                </div>
            </div>
        </div>
                                
            </div>
        </div>
        
        


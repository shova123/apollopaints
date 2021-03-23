
        
        <!--BUDGET CALCULATION-->
        
        <div class="budget-calculation">
        	<div class="container">
            	<div class="budget-title">
                	<h2 class="heading-2">Paint Budget Calculator</h2>
                	<p>Calculate your painting budget in easy steps</p>
                </div>
                <div id="content">
                    <ul id="tabs" class="nav nav-tabs nav-justified" data-tabs="tabs">
                        <li class="active"><a href="#condition" data-toggle="tab">Surface &amp; condition</a></li>
                        <li><a href="#dimension" data-toggle="tab">Surface dimensions</a></li>
                        <li><a href="#paint-type" data-toggle="tab">Paint type</a></li>
                        <li><a href="#cost-estimate" data-toggle="tab">Total estimate</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                    	
                        <div class="tab-pane active" id="condition">
                        	<h3 class="heading-3">Choose the surface that you would like to paint</h3>
                            <div class="btn-group" data-toggle="buttons">
                            	<div class="row">
                                	<div class="col-sm-4">
                                    	<div class="budget-selection btn btn-default active">
                                            <label class="">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> <strong>Interior</strong>
                                                <img alt="interior" class="img-responsive" src="<?php echo base_url();?>assets_front/images/budget/interior.jpg">
                                            </label>
                                            <p>An indoor environment has needs very different from an outdoor one.</p>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                    	<div class="budget-selection btn btn-default">
                                            <label class="">
                                                <input type="radio" name="options" id="option2" autocomplete="off"> <strong>Exterior</strong>
                                                <img alt="interior" class="img-responsive" src="<?php echo base_url();?>assets_front/images/budget/exterior.jpg">
                                            </label>
                                            <p>External surfaces exposed to the elements require special treatment.</p>
                                        </div>
                                    
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="budget-selection btn btn-default">
                                            <label class="">
                                                <input type="radio" name="options" id="option3" autocomplete="off"> <strong>Interior + Exterior</strong>
                                                <img alt="interior" class="img-responsive" src="<?php echo base_url();?>assets_front/images/budget/interior-exterior.jpg">
                                            </label>
                                            <p>Address the needs of both indoor and outdoor environments together. </p>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                            	<div class="col-sm-12">
                                	<div class="budget-link align-right">
                                        <ul>
                                            <li><a href="#dimension" data-toggle="tab">Continue</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        	
                        </div>
                        <div class="tab-pane" id="dimension">
                        	<div class="row">
                            	<div class="col-sm-12">
                                    <h3 class="heading-3">Choose the surface that you would like to paint</h3>
                                    <div class="budget-selection surface-dimension btn btn-default active">
                                        <label class="">
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> <strong>I know the approximate square feet area of the painting area.</strong>
                                        </label>
                                    </div>
                                    <div class="budget-selection surface-dimension btn btn-default">
                                        <label class="">
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked><strong>I know the exact dimensions of the painting area.<br><em>Dimensions of rooms, doors, windows and empty spaces</em></strong>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="select-room">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Total no. of room</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="budget-link">
                                        <ul>
                                            <li><a href="#condition" data-toggle="tab">Back</a></li>
                                        </ul>
                                    </div>
                                </div>
                            	<div class="col-sm-6">
                                	<div class="budget-link align-right">
                                        <ul>
                                            <li><a href="#paint-type" data-toggle="tab">Continue</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="paint-type">
                            <div class="tabs">
                                <div class="tabs-header">
                                    <div class="border"></div>
                                    <div class="row">
                                    	<div class="col-sm-3 col-xs-6">
                                        	<div class="paint-type-lt">
                                                <ul>
                                                    <li class="active"><a href="#tab-1" tab-id="1" ripple="ripple" ripple-color="#FFF"><img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/asianpaints.png"></a></li>
                                                    <li><a href="#tab-2" tab-id="2" ripple="ripple" ripple-color="#FFF"><img alt="royale luxury" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/royale-luxury.png"></a></li>
                                                    <li><a href="#tab-3" tab-id="3" ripple="ripple" ripple-color="#FFF"><img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/premium-emulsion.png"></a></li>
                                                    <li><a href="#tab-4" tab-id="4" ripple="ripple" ripple-color="#FFF"><img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/tractor-emulsion.png"></a></li>
                                                    <li><a href="#tab-5" tab-id="5" ripple="ripple" ripple-color="#FFF"><img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/tractor-distemper.png"></a></li>
                                                    <li><a href="#tab-6" tab-id="6" ripple="ripple" ripple-color="#FFF"><img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/utsav-distemper.png"></a></li>
                                                </ul>
                                                <nav class="tabs-nav">
                                                    <i id="prev" ripple="ripple" ripple-color="#FFF" class="material-icons fa fa-angle-left"></i>
                                                    <i id="next" ripple="ripple" ripple-color="#FFF" class="material-icons fa fa-angle-right"></i>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-9">
                                        	<div class="tabs-content">
                                                <div tab-id="1" class="tab active">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/asianpaints.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Royale Shyne</h4>
                                                            <p>A high sheen variant of Royale that offers enhanced radiance for your walls.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tab-id="2" class="tab">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/royale-luxury.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Royale Luxury</h4>
                                                            <p>Royale Luxury Emulsion with Teflon surface protector; a tough, durable and soft sheen paint to create the perfect backdrop of your most prized possession.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tab-id="3" class="tab">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/premium-emulsion.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Premium Emulsion</h4>
                                                            <p>With a medium sheen, Premium Emulsion provides a washable smooth finish, superior anti-fungal and minimal dirt pick-up properties.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tab-id="4" class="tab">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/tractor-emulsion.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Tractor Emulsion</h4>
                                                            <p>It lends a smooth finish to your walls. A perfect buy if you are using only distemper till now.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tab-id="5" class="tab">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/tractor-distemper.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Tractor Acrylic Distemper</h4>
                                                            <p>Tractor Acrylic Distemper is a water-based interior wall paint. It is the best quality acrylic distemper which gives the walls a delightful smooth matt finish that lasts for ages. It also comes in a wide range of 1000+ bright and attractive shades.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div tab-id="6" class="tab">
                                                	<div class="paint-type-rt">
                                                    	<div class="paint-type-main">
                                                        	<img alt="asian paints" class="img-responsive" src="<?php echo base_url();?>assets_front/images/paint-type/utsav-distemper.png">
                                                        </div>
                                                    	<div class="paint-type-info">
                                                        	<h4>Utsav Acrylic Distemper</h4>
                                                            <p>Utsav Acrylic Distemper is an economically priced acrylic distemper.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                            	<div class="col-sm-6">
                                	<div class="budget-link">
                                        <ul>
                                            <li><a href="#dimension" data-toggle="tab">Back</a></li>
                                        </ul>
                                    </div>
                                </div>
                            	<div class="col-sm-6">
                                	<div class="budget-link align-right">
                                        <ul>
                                            <li><a href="#cost-estimate" data-toggle="tab">submit</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="cost-estimate">
                        	<div class="budget-total-extimate">
                            	<table class="responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Total Estimated Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Painting type:</td>
                                            <td>Interior Painting</td>
                                        </tr>
                                        <tr>
                                            <td>The product you selected was:</td>
                                            <td>Interior Paint: <b>Royale Shyne</b></td>
                                        </tr>
                                        <tr>
                                            <td>Total area that needs to be painted:</td>
                                            <td>0 (square feet)</td>
                                        </tr>
                                        <tr>
                                            <td>Material cost:</td>
                                            <td>Rs. 0 (Approx.)</td>
                                        </tr>
                                        <tr>
                                            <td>Labour cost:</td>
                                            <td>Rs. 0 (Approx.)</td>
                                        </tr>
                                        <tr>
                                            <td><b>The approximate cost estimated for your paint job (Without Putty):</b></td>
                                            <td>Rs. 0 (Approx.)</td>
                                        </tr>
                                        <tr>
                                            <td>Asian Paints Putty cost:</td>
                                            <td>Rs. 0 (Approx.)</td>
                                        </tr>
                                        <tr>
                                            <td><b>The approximate cost estimated for your paint job with asian paints wall putty:</b></td>
                                            <td>Rs. 0 (Approx.)</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Disclaimer: putty is not recommended for distemper paints.</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="budget-link">
                                        <ul>
                                            <li><a href="#paint-type" data-toggle="tab">Back</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="find-nearest-dealer">
                            	<h3 class="heading-3">Find YOur nearest dealer</h3>
                            	<div class="row">
                                	<div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Zone</label>
                                            <select class="form-control" >
                                                <option>Select</option>
                                                <option>BAGMATI</option>
                                                <option>BHERI</option>
                                                <option>DHAULAGIRI</option>
                                                <option>GANDAKI</option>
                                                <option>JANAKPUR</option>
                                                <option>KOSHI</option>
                                                <option>LUMBINI</option>
                                                <option>MAHAKALI</option>
                                                <option>MECHI</option>
                                                <option>NARAYANI</option>
                                                <option>RAPTI</option>
                                                <option>SAGARMATHA</option>
                                                <option>SETI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control" >
                                                <option>Select</option>
                                                <option>BAGMATI</option>
                                                <option>BHERI</option>
                                                <option>DHAULAGIRI</option>
                                                <option>GANDAKI</option>
                                                <option>JANAKPUR</option>
                                                <option>KOSHI</option>
                                                <option>LUMBINI</option>
                                                <option>MAHAKALI</option>
                                                <option>MECHI</option>
                                                <option>NARAYANI</option>
                                                <option>RAPTI</option>
                                                <option>SAGARMATHA</option>
                                                <option>SETI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Town</label>
                                            <input type="text" class="form-control" placeholder="Your Town">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" class="form-control" placeholder="Your Location">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


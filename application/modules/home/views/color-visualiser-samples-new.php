<link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/visualizer/jquery-ui.css">
<link href="<?php echo base_url(); ?>assets_front/css/visualizer/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets_front/css/visualizer/print.css" type="text/css" rel="stylesheet" media="print" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/context_blender.js"></script>	

<script type="text/javascript">
    var pixastic_parseonload = true;
</script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/pixastic.custom.js" type="text/javascript"></script>


<div class="overlayImage" style="display:none;"></div>

<div id="wrapper">
    <!-- --> 
    <div id="tabdemo" style="display:none;">
        <h3>Add the effects</h3>
        <div class="actiondemo">
            <span style="margin-left: 20px;">Please use these function if required only.</span>
            <div class="demo-options">

                <div class="sliders_all">



                    <div>Brightness: <input type="text" id="value-brightness" value="0" class="demo-input" style="width:30px;"/></div>
                    <div id='slider-brightness' class='ui-slider' style="width:150px;margin-top:5px;margin-bottom:5px;">
                        <div class="ui-slider-handle"></div><div class="ui-slider-range"></div>
                    </div>

                    <div>Contrast: <input type="text" id="value-contrast" value="0" class="demo-input" style="width:30px;"/></div>
                    <div id='slider-contrast' class='ui-slider' style="width:150px;margin-top:5px;margin-bottom:5px;">
                        <div class="ui-slider-handle"></div><div class="ui-slider-range"></div>
                    </div>
                    <div>Amount: <input type="text" style="width:30px;" class="demo-input" value="0" id="value-amount"></div>
                    <div style="width:150px;margin-top:5px;margin-bottom:5px;" class="ui-slider" id="slider-amount">
                        <a style="outline:none;border:none;" href="#"><div class="ui-slider-handle" style="left: 91px;"></div></a><div class="ui-slider-range" ></div>
                    </div>

<!--<input type="button" onClick="demo();" value="Apply"/> -->
                    <input type="button" onClick="resetDemo();" value="Reset"/>
                    <input type="button" onClick="doneDemo();" value="Done"/>

                </div>


                <div class="image_get">
                    <img src="BASE_IMAGE_hi.jpg" id="demoimage" style="margin-top:5px;" alt=""/>
                </div>
            </div>

        </div>
    </div>

    <!-- -->
    <div class="preview_image_div" style="display:none;">
        <a href="#" class="close_overlay" onClick="javascript:closeOverlay();return false;"><img src="images/close_btn.png"/></a>
        <div id="print_div" class="preview_image">
            <img id='preview_image'/>
        </div>
        <div class="paint_note">
            The shades shown above are for indicative purpose only. Please refer to Asian Paints Color Palette for actual shade reference.	
        </div>
    </div>
    <div class="noShapeAlert" style="display:none;">
        <a href="#" class="close_overlay" onClick="javascript:closeOverlay();return false;"><img src="images/close_btn.png"/></a>
        <div class="">
            <p>Please draw a shape first.</p>
        </div>
    </div>
    <!--img src="images/ajax_loader.gif" class="ajax_loader"/-->
    <!--    	<div class="header">
                    <img src="images/header_logo.jpg" />
            </div>
            <div class="overlay">
            <div class="message">This is a desktop/laptop application only, you must have the latest web browser installed to open. It will not open on smartphone or tablet web browsers.</div>
            </div>-->

    <div class="visualiser-bg">
        <div class="container">

            <div id="fullscreen" class="fullscreen_hide">
                <div id="content">
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#red" data-toggle="tab">Red</a></li>
                        <li><a href="#orange" data-toggle="tab">Orange</a></li>
                        <li><a href="#yellow" data-toggle="tab">Yellow</a></li>
                        <li><a href="#green" data-toggle="tab">Green</a></li>
                        <li><a href="#blue" data-toggle="tab">Blue</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="red">
                            <h1>Red</h1>
                            <p>red red red red red red</p>
                        </div>
                        <div class="tab-pane" id="orange">
                            <h1>Orange</h1>
                            <p>orange orange orange orange orange</p>
                        </div>
                        <div class="tab-pane" id="yellow">
                            <h1>Yellow</h1>
                            <p>yellow yellow yellow yellow yellow</p>
                        </div>
                        <div class="tab-pane" id="green">
                            <h1>Green</h1>
                            <p>green green green green green</p>
                        </div>
                        <div class="tab-pane" id="blue">
                            <h1>Blue</h1>
                            <p>blue blue blue blue blue</p>
                        </div>
                    </div>
                </div>
            </div>

            <!------- sample image ------>

            <div class="container splash_container">
                <div class="hover-section">

                    <div class="main-title">
                        <h2>color visualiser</h2>
                    </div>

                    <div class="box aboutdetails">
                        <ul>
                            <li>Choose a sample image that closely matches your home</li>
                            <li>Choose a color</li>
                            <li>And paint the image</li>
                        </ul>
                    </div>

                    <div class="box contactdetails">
                        <ul>
                            <li>Upload photographs of your home in JPEG/PNG format</li>
                            <li>Adjust the effects</li>
                            <li>Create shape</li>
                            <li>Choose a color</li>
                            <li>And paint your home</li>
                        </ul>
                    </div>
                    <!--            <div class="button_splash">
                                   <a href="#" class="sample_images"><img src="images/Sample-Images.png" /></a>
                                  <input type="file" id="imageLoader" name="imageLoader">
                                               
                                    <a href="#" class="trig_loader btn_myimages"><img src="images/My-Images.png" /></a>
                                                    <a href="#" class="sample_images"><img src="images/My-Images.png" /></a>
                                                    
                                </div>-->
                    <ul id="hover-tab">
                        <li id="about">
                            <span>
                                <a class="sample_images" href="#">simple images</a>
                            </span>
                        </li>
                        <li id="contact">
                            <input type="file" id="imageLoader" name="imageLoader" style="display: none">

                            <span>
                                <a href="#" class="trig_loader btn_myimages">My Images</a>
                               <!--<a href="<?php echo base_url("color_visualizer/image"); ?>">my images</a>-->
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- ---------- Splash screen------------- -->
    <div class="container screen_two" style="display:none;">
<!--        <div class="left_section">
            <div id="categories">
                <h2 class="blue">Use sample images</h2>
                <div class="content" id="menu-active">
                    <ul id="interior">
                        <li class="header_cat">Interior</li>
                        <li><a href="#" class="bedroom">Bedroom</a></li>
                        <li><a href="#">Dinning Room / Kitchen</a></li>
                        <li><a href="#">Living Room</a></li>
                       </ul>
                    <ul id="exterior">
                        <li class="header_cat">Exterior</li>
                       <li><a href="#">Bunglows</a></li>
                    </ul>
                    <img src="images/ad_ap.jpg" />     
                    <a href="app.html"  class="btn_back">HOME</a>  
                    <a id="back_screen" class="btn_back pos2">BACK</a>

                </div>
            </div>
        </div>-->
        <!--visualizer content-->
<div class="visualiser-bg no-bg">
	<div class="container">
        <div id="fullscreen">
            <div class="img-smp">
            	<h3 class="heading-3">Use sample images</h3>
                <div class="row">
                	<div id="content">
                        <div class="col-md-4">
                            <div id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <div class="row">
                                    <?php if(!empty($interiorSample)){ $countTitle=0; ?>
                                    <div class="col-md-6 no-padding">
                                        
                                        <div class="sample-img" id="interior">
                                            <h4>Interior</h4>
                                            <?php foreach($interiors as $interior){ ?>
                                            <span class="<?php if($countTitle == 0){?>active<?php }?>"><a class="<?php echo $interior->sample_title;?>" href="#<?php echo $interior->sample_slug;?>" data-toggle="tab"><?php echo $interior->sample_title; ?></a></span>
                                            <?php $countTitle++;} ?>
                                            <!-- <span><a href="#diningroom" data-toggle="tab">Dining Room / Kitchen</a></span>
                                            <span><a href="#livingroom" data-toggle="tab">Living room</a></span> -->
                                        </div>
                                    </div>
                                     <?php } ?>
                             <?php if(!empty($exteriorSample)){ ?>
                                    <div class="col-md-6 no-padding">
                                        <div class="sample-img" id="interior">
                                            <h4>Exterior</h4>
                                            <?php foreach($exteriors as $exterior){ ?>
                                            <span><a href="#<?php echo $exterior->sample_slug;?>" data-toggle="tab"><?php echo $exterior->sample_title;?></a></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="my-tab-content" class="tab-content sampled-images">
                                <?php if(!empty($interiorSample)){ $count=0;
                    foreach($interiorSample as $insample){
                        $type[$insample->sample_slug]=$insample->sample_image;
                         
                        $explodeInSample = explode(':',$insample->sample_image);
                 ?>
                                <div class=" tab-pane<?php if($count == 0){?> active<?php }?>" id="<?php echo $insample->sample_slug; ?>">
                                    <div class="sample-image-sec list_items">
                                        <div class="row ">
                                            <?php foreach($explodeInSample as $inImages){ ?>
                                            <div class="col-sm-4 col-xs-6 full-width">
                                                <div class="inner-sample-img">
                                                    <a class="list" href="#"><img alt="<?php $insample->sample_slug; ?>" class="img-responsive" src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/samples/<?php echo $inImages; ?>&w=207&h=120"></a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                 <?php $count++; }} ?>

                    <?php if(!empty($exteriorSample)){ 
                    foreach($exteriorSample as $exsample){
                        $explodeExSample = explode(':',$exsample->sample_image);
                 ?>
                                <div class="list_items tab-pane" id="<?php echo $exsample->sample_slug; ?>">
                                    <div class="sample-image-sec list_items">
                                        <div class="row">
                                             <?php foreach($explodeExSample as $exImages){ ?>
                                            <div class="col-sm-4 col-xs-6 full-width">
                                                <div class="inner-sample-img">
                                                    <a class="list" href="color-visualizer-image-editor.php"><img alt="<?php $exsample->sample_slug; ?>" class="img-responsive" src="<?php echo base_url();?>assets_admin/createThumb/create_thumb.php?src=<?php echo ROOT; ?>uploads/samples/<?php echo $exImages; ?>&w=207&h=120"></a>
                                                </div>
                                            </div>
                                            <?php } ?>
             
                                        </div>
                                    </div>
                                </div>
                                <?php  }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="right_section" >

        </div>   
    </div>
    <!-- Container ends here -->
    
    <!-- Edit container starts here -->
    <div class="edit_container">
        <div class="left_section">
            <div class="color_section">
                <h2 class="blue">Explore color</h2>
                <div class="colors_main_menu">
                    <p id="Pastels & Melange">PASTELS & MELANGE</p>
                    <p id="Accent">ACCENT</p>
                   <!-- <p id="Glitter">GLITTER</p>
                    <p id="Ultima Metallics">ULTIMA METALLICS</p>
                    <p id="Special Shade">SPECIAL SHADE</p>-->
                </div>
                <div class="color_menu">
                    <div class="dropdown">
                        <label>Color Collections</label>
                        <select id="color_sel_new">
                        </select>                     
                    </div>
                    <div class="dropdown colorSearch">
                        <label>Search your color</label>
                        <input type="text" id="search-color-input" />
                        <input type="button" id="search-json-submit" value="go" />
                    </div>
                </div>
                <div id="colour_palette">
                    <div id="colours">
                        <div class="slider">
                            <div class="outer">
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="prev"><img src="<?php echo base_url(); ?>assets_front/images/buttons/btn_previous.jpg"></div><div class="next"><img src="images/buttons/btn_next.jpg"></div>
                        </div>
                    </div>

                    <!--div class="recent_colors">
                    <label>Recently viewed colours</label>
                    <div id="recent_viewed">
                    </div>
                    </div-->
                </div>
                <div class="used_color_div">
                    <label>Current Color in the image</label>
                    <div class="used_color">
                    </div>
                    <!--
                    <br>
                    <label>Current color in the Image</label>
                    <div id='last_used_color_footer'></div> 
                    -->

                </div>
            </div>
            <!--------- Color Section ends here -------->
        </div>
        <div class="right_section">
            <div class="home_btn_section">
                <a href="#" class="btn_home">Home</a>
                <a href="#" class="btn_preview" onClick="javascript:previewImage();return false;">Preview</a>
                <a id="downloadExp" download="AsianpaintsnepalCV.jpg">Export</a>
            </div>
            <div class="edit_tools">
                <div class="action">
                    <div class="fill btn_fill">
                        <span class="hover">Paint</span>
                        <span class="button">
                            <button id="b4" class="btn" onClick="fill()">
                                <img src="images/buttons/btn_add_color.png" />
                            </button>
                        </span>
                    </div>
                    <div class="btn_undo_div statechange">
                    </div>
                    <div class="btn_redo_div statechange">
                    </div>
                    <!--div class="btn_select state">
                <button id="b2"  onClick="sel()" class="btn_arrow_select">
                        <img src="images/buttons/btn_arrow_select.png" alt="Select Draw Bazier "/>
                </button>
                </div-->
                    <!--label>add color:</label-->

                    <!--<div class="brush btn_paint">
                     <span class="hover">Paint</span>
                      <span class="button">
                        <button id="b1"  onClick="selectbrushsize();" class="select_brush">
                            <img src="images/buttons/btn_brush.png" alt="Select Brush"/>
                        </button>
                        <span id="sizebuttons" style="display:none;">
                            <button id="paintsize1" class="sizeselector" onclick="selectbrushsize(); brush(6);"><img src="images/brushselect.png" width="6px" /></button>
                            <button id="paintsize2" class="sizeselector" onclick="selectbrushsize(); brush(12);"><img src="images/brushselect.png" width="12px" /></button>
                            <button id="paintsize3" class="sizeselector" onclick="selectbrushsize(); brush(18);"><img src="images/brushselect.png" width="18px" /></button>
                        </span> 
                      </span>
                    </div>-->
                    <div class="btn_brush">
                    </div>


                    <div class="btn_addBezier state" id="create_shape" style="display:none">
                        <span class="hover">Create Shape</span>   
                        <span class="button">                 
                            <button id="b11"  onClick="start()" class="draw_bazier">
                                <img src="images/buttons/btn_draw_bazier.png" alt="Draw Bazier"/>
                            </button>
                        </span>
                    </div>


                    <!--<div class="btn_erase_s">                    
                  <span class="hover">Erase paint</span>
                  <span class="button">
                     <button id="eraser_s" onClick="selecterasersize()">
                         <img src="images/buttons/btn_erase.png" />
                     </button>
                     <span id="erasersizes" style="display:none;">
                        <button id="erasesize1" class="sizeselector" onclick="selecterasersize(); erase(8);"><img src="images/eraserselect.png" width="10px" /></button>
                        <button id="erasesize2" class="sizeselector" onclick="selecterasersize(); erase(14);"><img src="images/eraserselect.png" width="15px" /></button>
                        <button id="erasesize3" class="sizeselector" onclick="selecterasersize(); erase(20);"><img src="images/eraserselect.png" width="20px" /></button>
                    </span>
                  </span>
                </div>-->


                    <div class="btn_removeBezier state" id="remove_shape" style="display:none">
                        <span class="hover">Delete Shape</span>            
                        <span class="button">        
                            <button id="b3" onClick="del()" class="remove_bazier">
                                <img src="images/buttons/btn_deletebezier.png" alt="Remove Bazier"/>
                            </button>
                        </span>
                    </div>


                    <div id="grouping">
                        <button id="grp"></button>		<!--<button id="grp">group</button>-->
                        <button id="ungrp"></button>		<!--<button id="ungrp">ungroup</button>-->
                    </div>

                    <!--select id="color_sel">
                        <option>red</option>
                        <option>blue</option>
                        <option>green</option>
                        <option>#743838</option>
                        <option>#53b19c</option>
                    </select-->  	
                </div>                   
                <div class="zoom">

                    <!--<div class="btn_zoomOut statechange">
                       <span class="hover">Zoom Out</span>
                       <span class="button">
                        <button onClick="javascript:zooming('-');return false;" class="">
                            <img src="images/buttons/btn_zoomOut.png" />
                        </button>
                        </span>
                    </div>-->
                    <!--<div class="btn_zoomIn statechange">
                      <span class="hover">Zoom In</span>
                      <span class="button">
                        <button onClick="javascript:zooming('+');return false;" class="">
                            <img src="images/buttons/btn_zoomIn.png" />
                        </button>
                        </span>
                    </div>-->
                    <!-- <div class="btn_hand">
                      <span class="hover">Pan</span>
                      <span class="button">
                        <button onClick="javascript:pan();return false;" class="">
                            <img src="images/buttons/hand_tool.png" />
                        </button>
                        </span>
                    </div> -->
                    <!-- <div class="btn_fit statechange" style="left:27px;">
                     <span class="hover">Fit</span>
                     <span class="button">
                        <button onClick="javascript:fit();return false;" class="">
                            <img src="images/buttons/btn_fit.png" />
                        </button>
                        </span>
                    </div> -->
                </div>

                <a href="#" id="hrefPrint">Print</a>
                <a id="back2" class="btn_back">BACK</a>
            </div>

            <div class="canvas_wrap">
                <canvas id="dummyCanvas" width="665" height="475"></canvas>
                <canvas id="imageCanvas" width="665" height="475"></canvas>
                <canvas id="eraserCanvas" width="665" height="475"></canvas>
                <canvas id="brushCanvas" width="665" height="475"></canvas>
                <canvas id="myCanvas" width="665" height="475"></canvas>
                <canvas id="myCanvas2" width="665" height="475"></canvas>
            </div>

            <div class="remove-paint-msg">
                <span id="paint_msg"> Click on the Walls to Remove Paint</span>
                <span id="save_msg"> Saving Image, Please wait. It might take a minute... </span>
            </div>
            <div class="footer_buttons">
                      <!--button id="imageLink" href="data-uri-here" download="myFilename.png" onClick="javascript:saveImg();return false;"><img src="images/buttons/btn_save_img.png" /></button-->
                <button id="download" target="_blank" ><img src="images/buttons/btn_save_img.png" /></button>
                <button style="display:none" onClick="javascript:RemovePaint();return false;"><img src="images/buttons/btn_remove_paint.png" /></button>
                <button onClick="javascript:seeOrgImage();return false;" class="seeOrg_btn"><img src="images/buttons/btn_org_img.png" /></button>
                <!--<div id='selected_colour_tooltip' style="display:none; z-index:999999"></div>  New Div Nikhil -->

                <!-- <a href="#" onClick="javascript:bright();return false;">Bright</a> -->



            </div>

        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/jquery-1.7.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets_front/js/visualizer/javascript.js?v=2" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/jquery-1.9.1.js"></script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/jquery-migrate-1.2.1.js"></script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/jquery-ui-1.10.3.custom.js"></script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/external.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/template.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_front/js/visualizer/jQuery.print.js"></script>
<script>

                        $(document).ready(function () {
                            $('#paint_msg').hide();
                            $('#save_msg').hide();

                            $(document).on("mouseover", ".sample_images", function () {
                                $("ul.sample_images_steps").show();
                                $("ul.my_images_steps").hide();
                            });

                            $(document).on("mouseover", ".btn_myimages", function () {
                                $("ul.sample_images_steps").hide();
                                $("ul.my_images_steps").show();
                            });
                            $(document).on("mouseout", ".btn_myimages", function () {
                                $("ul.sample_images_steps").show();
                                $("ul.my_images_steps").hide();
                            });
                            $(document).on("click", ".sample_images", function () {
                                alert("bbhh");
                                $(".container.splash_container").hide();
                                $(".container.screen_two").css('display', 'block');
                                $("ul li a.bedroom").trigger('click');
                                $('.btn_undo_div').hide();
                                $('.btn_redo_div').hide();
                            });
                            $(document).on("click", "#back_screen", function () {
                                $(".container.splash_container").show();
                                $(".container.screen_two").css('display', 'none');
                            });
                            $(document).on("click", ".btn_home", function () {
                                $(".container.screen_two").css('display', 'none');
                            });
                            $("#menu-active a").on("click", function () {
                                $("#menu-active a").removeClass("active");
                                $(this).addClass("active");
                            });
                        });

</script>


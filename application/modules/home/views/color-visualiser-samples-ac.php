<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/context_blender.js"></script>	

<script type="text/javascript">
    var pixastic_parseonload = true;
</script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/pixastic.custom.js" type="text/javascript"></script>
<div class="overlayImage" style="display:none;"></div>
<div id="visualiser-bg">

    <!-- ---------- Splash screen------------- -->
    <div class="container screen_two" >
        <div id="fullscreen" class="left_section">


            <div id="categories" class="img-smp">
                <h2 class="blue">Use sample images</h2>
                <div class="content" id="menu-active">
                    <ul  id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 no-padding">
                                <div class="sample-img interior">
                                    <li class="header_cat">Interior</li>
                                    <!-- <li><a href="#" class="bathroom">Bathroom</a></li> -->
                                    <li class="active"><a href="#" class="bedroom">Bedroom</a></li>
                                    <li><a href="#">Dinning Room / Kitchen</a></li>
                                    <li><a href="#">Living Room</a></li>
                                    <!-- <li><a href="#">Other</a></li> -->
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 no-padding">
                                <div class="sample-img exterior">
                                    <li class="header_cat">Exterior</li>
                                    <!-- <li><a href="#">Buildings</a></li> -->
                                    <li><a href="#">Bunglows</a></li>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <div id="my-tab-content" class="tab-content sampled-images">
                        <div class="right_section" >

                        </div>
                    </div>
                 
                </div>
            </div>

        </div>

    </div>
    <!-- Container ends here -->
    <!-- Edit container starts here -->
    <div class="edit_container container" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <div class="left_section">
                    <div class="color_section">
                        <h2 class="blue">Explore color</h2>
                        <div class="colors_main_menu">
                            <p id="Pastels & Melange">PASTELS & MELANGE</p>
                            <p id="Accent">ACCENT</p>
       
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
                                    <div class="prev"><img src="images/buttons/btn_previous.jpg"></div><div class="next"><img src="images/buttons/btn_next.jpg"></div>
                                </div>
                            </div>

                        </div>
                        <div class="used_color_div">
                            <label>Current Color in the image</label>
                            <div class="used_color">
                            </div>

                        </div>
                    </div>
                    <!--------- Color Section ends here -------->
                </div>
            </div>
            <div class="col-md-8">
                <!--<div class="right_section">-->
                <div class="home_btn_section">
                    <a href="#" class="btn_home">Home</a>
                    <a href="#" class="btn_preview" onClick="javascript:previewImage();return false;">Preview</a>
                    <a id="downloadExp" download="AsianpaintsnepalCV.jpg">Export</a>
                </div>
                <div class="edit_tools">
                    <div class="action">
                        <div class="fill btn_fill">

                            <span class="buttonS">
                                <button id="b4" class="btn" onClick="fill()">
                                    <img src="<?php echo base_url(); ?>assets_front/images/buttons/paint.png" />
                                </button>
                            </span>
                        </div>
                        <div class="btn_undo_div statechange">
                        </div>
                        <div class="btn_redo_div statechange">
                        </div>
                        <div class="btn_brush">
                        </div>


                        <div class="btn_addBezier state" id="create_shape" style="display:none">
                            <span class="hover">Create Shape</span>   
                            <span class="button">                 
                                <button id="b11"  onClick="start()" class="draw_bazier">
                                    <img src="<?php echo base_url(); ?>assets_front/images/buttons/btn_draw_bazier.png" alt="Draw Bazier"/>
                                </button>
                            </span>
                        </div>


                        <div class="btn_removeBezier state" id="remove_shape" style="display:none">
                            <span class="hover">Delete Shape</span>            
                            <span class="button">        
                                <button id="b3" onClick="del()" class="remove_bazier">
                                    <img src="images/buttons/btn_deletebezier.png" alt="Remove Bazier"/>
                                </button>
                            </span>
                        </div>


                        <div id="grouping">
                            <button id="grp"></button>		
                            <button id="ungrp"></button>		
                        </div>
 	
                    </div>                   
                    <div class="zoom">

                    </div>

                    <a href="#" id="hrefPrint">Print</a>
                    <a id="back2" class="btn_back">BACK</a>
                </div>
                <!--</div>-->		
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
                    <button id="download" target="_blank" ><img src="images/buttons/btn_save_img.png" /></button>
                    <button style="display:none" onClick="javascript:RemovePaint();return false;"><img src="images/buttons/btn_remove_paint.png" /></button>
                    <button onClick="javascript:seeOrgImage();return false;" class="seeOrg_btn"><img src="images/buttons/btn_org_img.png" /></button>




                </div>
                

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
                            $(".edit_container").css('display', 'none');
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
                            /*  $("#menu-active a").on("click", function () {
                             $("#menu-active a").removeClass("active");
                             $(this).addClass("active");
                             });*/

                        });

</script>
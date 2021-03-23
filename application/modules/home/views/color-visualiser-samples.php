<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/context_blender.js"></script>	

<script type="text/javascript">
    var pixastic_parseonload = true;
</script>
<script src="<?php echo base_url(); ?>assets_front/js/visualizer/pixastic.custom.js" type="text/javascript"></script>
</head>
<body onLoad="">
    <div class="overlayImage" style="display:none;"></div>

    <div id="wrapper">
        <!-- --> 
<!--        <div id="tabdemo" style="display:none;">
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

<input type="button" onClick="demo();" value="Apply"/> 
                        <input type="button" onClick="resetDemo();" value="Reset"/>
                        <input type="button" onClick="doneDemo();" value="Done"/>

                    </div>


                    <div class="image_get">
                        <img src="BASE_IMAGE_hi.jpg" id="demoimage" style="margin-top:5px;" alt=""/>
                    </div>
                </div>

            </div>
        </div>-->

        <!-- -->
<!--        <div class="preview_image_div" style="display:none;">
            <a href="#" class="close_overlay" onClick="javascript:closeOverlay();return false;"><img src="images/close_btn.png"/></a>
            <div id="print_div" class="preview_image">
                <img id='preview_image'/>
            </div>
            <div class="paint_note">
                The shades shown above are for indicative purpose only. Please refer to Asian Paints Color Palette for actual shade reference.	
            </div>
        </div>-->
<!--        <div class="noShapeAlert" style="display:none;">
            <a href="#" class="close_overlay" onClick="javascript:closeOverlay();return false;"><img src="images/close_btn.png"/></a>
            <div class="">
                <p>Please draw a shape first.</p>
            </div>
        </div>-->
<!--        <div class="header">
            <img src="images/header_logo.jpg" />
        </div>-->
<!--        <div class="overlay">
            <div class="message">This is a desktop/laptop application only, you must have the latest web browser installed to open. It will not open on smartphone or tablet web browsers.</div>
        </div>-->


<!--        <div class="container splash_container">
            <div class="splash_section" >
                <div class="splash_copy">
                     <h2 >Color Visualiser</h2> 
                    <img src="images/Color-Visualiser.png" alt="Color Visualiser" style="padding: 48px;">

                    <div class="copy">
                     <img src="images/sub-heading.png" alt="Options" style="margin-left: 65px;"> 
                        <ul class="sample_images_steps">
                            <li> Choose a sample image that closely matches your home</li>
                            <li> Choose a color</li>
                            <li> And paint the image</li>
                        </ul>
                        <ul class="my_images_steps" style="display:none;">
                            <li> Upload photographs of your home in JPEG/PNG format</li>
                            <li> Adjust the effects</li>
                            <li> Create shape</li>
                            <li> Choose a color</li>
                            <li> And paint your home</li>
                        </ul>
                        <div class="button_splash">
                            <a href="#" class="sample_images"><img src="images/Sample-Images.png" /></a>
                            <input type="file" id="imageLoader" name="imageLoader">

                            <a href="#" class="trig_loader btn_myimages"><img src="images/My-Images.png" /></a>

                        </div>
                    </div>  

                </div>
            </div>
            <div id="disclaimer">
                <div id="disclaimer_content">
                    <span><strong>*Disclaimer:</strong></span>
                    <ol>
                        <li>1. Please install the latest version of your browser for full functionality of this application.</li>
                        <li>2. The shades shown are for indicative purpose only. Please refer to Asian Paints Color Palette for actual shade reference.</li>
                    </ol>
                </div>
            </div>
        </div>-->

        <!-- ---------- Splash screen------------- -->
      
        <div class="container screen_two">
            <div class="left_section">

                <div id="categories">
                    <h2 class="blue">Use sample images</h2>
                    <div class="content" id="menu-active">
                        <ul id="interior">
                            <li class="header_cat">Interior</li>
                            <!-- <li><a href="#" class="bathroom">Bathroom</a></li> -->
                            <li><a href="#" class="bedroom">Bedroom</a></li>
                            <li><a href="#">Dinning Room / Kitchen</a></li>
                            <li><a href="#">Living Room</a></li>
                            <!-- <li><a href="#">Other</a></li> -->
                        </ul>
                        <ul id="exterior">
                            <li class="header_cat">Exterior</li>
                            <!-- <li><a href="#">Buildings</a></li> -->
                            <li><a href="#">Bunglows</a></li>
                        </ul>
                        <!--<img src="images/ad_ap.jpg" />  -->   
                        <a href="app.html"  class="btn_back">HOME</a>  
                        <a id="back_screen" class="btn_back pos2">BACK</a>

                    </div>
                </div>
            </div>
            <div id="my-tab-content" class="tab-content sampled-images">

                <div class="right_section" >

                </div>  
            </div>
        </div>
        <!-- Container ends here -->
        <!-- Edit container starts here -->
        <div class="edit_container">
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
            
            </div>
            <style>
                 h2, h1, h3, p, ul, li, ol, a{	margin:0; 	padding:0;	list-style:none;	font-family:verdana, sans-serif;}
                 p {    padding: 5px 5px;    border-bottom: 1px solid #888;}.colors_main_menu p:hover {    color: #f17128;    cursor: pointer;}#wrapper{max-width:1024px; margin:0 auto; position:relative;}.header{background:#ed1b24; height:145px; text-align:center;}.header img{margin-top:30px;}.container, .edit_container{overflow:hidden; background:#dcdddf;}.edit_container {display:none; overflow:visible;}.left_section{width:359px; float:left; background:#f17128; min-height:590px;}.right_section{width:665px; float:right;min-height:520px;}.right_section .list > img {    height: 100%;    width: 100%;}h2 {	text-align: center;	padding: 10px 0;	font-size:24px;}.splash_section {padding:25px; padding-bottom: 0; background:url(images/app-home.jpg) no-repeat top left; min-height:597px;}.splash_section h2{font-size:45px; color:#fff; font-family: 'Open Sans', sans-serif; font-weight:700; line-height:normal; padding:25px 0 35px;}.copy ul{float:none; width:500px; margin-left:29%; font-size:18px; font-family: 'Open Sans', sans-serif; font-weight:300; color:#fff; min-height:145px; }.copy ul li{list-style-image:url(images/arrow_list_white.png); list-style-position:outside; padding-bottom:18px;}.button_splash {max-width:524px; margin:40px auto 0;}.button_splash a.btn_myimages{margin-left:60px;display:block;float:right;}.edit_container h2 {font-size:16px;}.blue {background:#552988; color:#fff;}.ajax_loader {    bottom: 250px;    display: none;    left: 50%;    margin-left: 150px;    position: absolute;    width: 50px;	z-index: 999999;}div.content {padding:20px; color:#dddddd; font-size:14px;}#upload_image label {padding-bottom:15px; display:block;}#categories div.content {padding:0px 25px;} #categories ul {    background: none repeat scroll 0 0 #DCDDDF;    float: left;    min-height: 159px;    width: 152px;}#categories ul#interior {border-right:1px solid #babbbd;}#categories ul#exterior {border-left:1px solid #d2d3d5;}#categories ul li.header_cat {padding:12px; background-color:#c4c5c7; color:#777779; text-align:center;}#categories ul li {padding:6px 0 0 15px; background-color:#dcdddf; /*text-align:center;*/ font-size:12px;}#categories ul li:last-child {padding-bottom:15px;}#categories ul li a{text-decoration:none; color:#78787a;}.splash_copy {padding:0px 0px 0px 0px; font-size:12px; line-height:18px; color:#767678; text-align: center;}.splash_copy p {padding:0;}p.headline{font-size:40px; color:#552988; padding:75px 0px 75px;}.ap_graphics {float:right; margin-left:15px; } .list {    background: none repeat scroll 0 0 #FFFFFF;    border: 1px solid #d4d4d6;    float: left;    margin: 12px;    padding: 5px;    width: 288px;	height:165px;}.container .list_items {    height: 590px;    overflow-y: scroll;}#imageLoader1, #imageLoader {display:none;}button {background:none; padding:0; border:none; cursor:pointer;}.footer_buttons button {display:inline-block; padding-right: 5px;}.edit_tools, .home_btn_section {	height:35px;	width:100%;	background:url(images/buttons/tool_bg.png) repeat-x left top;	/*padding:0 10px;*/}.edit_tools {width:510px; padding-left:0px; float:left; position:relative;}/*.btn_undo, btn_redo {	padding-top:5px;}*/.canvas_wrap{position:relative; float:left;}#myCanvas, #myCanvas2{		background-color:transparent;		position: absolute;	}	#dummyCanvas, #myCanvas2, #myCanvas, #brushCanvas, #eraserCanvas{		position:absolute;		left: 0;		top: 0;	}#imageCanvas {position:relative;}.color_menu{padding:0 16px; /*width:125px;text-align:center;*/ overflow:hidden;}.dropdown {padding: 5px;background: #dcdddf;font-size: 12px;color: #777779;width: 148px;float: left;/*margin-right: 10px;*/height: 60px;font-weight: bold;}#search-color-input {width:97px;}.dropdown label{padding:5px 0px; display:block;}.dropdown select {width:95%;}#colour_palette {background:#dcdddf; padding:5px 5px 15px; width: 306px;margin-left: 16px;/*margin-top: 10px;*/}#colours {background:#fff; overflow:hidden;}#colours li, .used_color li {width:2.45em; height:1.5em; /*margin:1px; display:table; border-collapse:collapse;*/ border:0.15em solid #fff; float:left; cursor:pointer;}#colours li.selected, .used_color li.selected {border:0.15em solid #333;}.recent_colors > label {    font-size: 11px;}.used_color_div {    background: none repeat scroll 0 0 #DCDDDF;    margin-left: 16px;    margin-top: 10px;    overflow: hidden;    padding: 8px;    width: 300px;}.recent_colors {    border-top: 1px solid #777779;    margin-top: 15px;    padding-top: 5px;	color:#777779;	font-size:11px;}.action{ float:left; position:relative; margin-left:5px; z-index:99999;}.zoom{ float:right; position:relative; width:235px;z-index:99999;}.home_btn_section {float: left;width: 155px;}.action div, .zoom div {position:absolute; top:6px; font-size:9px; /*overflow:hidden; border:1px solid;*/ width:25px; height:25px; color:#6f6f6e;}.action div span.hover, .zoom div span.hover {display:none;}.action div:hover span.hover, .zoom div:hover span.hover{position: absolute;display:block;top: -20px;left: 0;background: #333;color: #FFF;text-transform: uppercase;padding: 2px;}.action div.btn_addBezier span.hover, .action div.btn_removeBezier span.hover {width:75px; left:-25px;}.action div.btn_erase_s span.hover{width:65px; left:-25px;}.zoom div.btn_zoomOut span.hover{width:60px; left:-5px;} .zoom div.btn_zoomIn span.hover{width:46px; left:-10px;} .zoom div.btn_fit span.hover{left:5px;}.action div.fill {top:6px; left:60px; width:45px;}.action div.brush {top:6px; left:90px; width:45px;}.action div span.button, .zoom div span.button {display:block; height:21px; overflow:hidden;}.action div span.button {height:25px;}#grouping {    left: 222px;    text-transform: capitalize;    top: 5px;    width: 64px !important;}#grouping button {    color: #6F6F6E;    width: auto !important;}#grouping button#ungrp {    display: none;}.zoom div {width:21px; height:21px;}.edit_tools label { display: block;    float: left;    padding-top: 6px;    text-transform: uppercase;}.edit_tools button {width:25px; height:25px; display:block; position:relative; text-transform:capitalize;}.edit_tools .zoom button {width:21px; height:21px;}.edit_tools button img {top:0px; position:relative;}.edit_tools button.clicked img, .edit_tools button.selected img {top:-25px;}.edit_tools button.btn_undo.clicked img, .edit_tools button.btn_redo.clicked img, .edit_tools button.draw_bazier.selected img, .edit_tools button.remove_bazier.selected img  {top:-50px;}.edit_tools .zoom button.clicked img, .edit_tools .zoom button.selected img {top:-21px;}/*.edit_tools button.clicked img {top:-42px;}*/.btn_undo_div {left:6px;}.btn_redo_div {left:32px;}.btn_select {left:58px; top:8px; padding-left:6px; background:url(images/buttons/seperator.png) no-repeat;}.btn_select_brush {left:60px; top:8px;}.action div.btn_fill, .action div.btn_paint  { /*width:135px; padding-left:11px; background:url(images/buttons/seperator.png) no-repeat; overflow:visible;*/ z-index:99999;}/*.action div.btn_fill span, .action div.btn_paint span {display: none;float: left;margin-left:5px;width:34px;height:25px; overflow:hidden;}*/.action div.btn_fill button, .action div.btn_paint button{overflow:hidden; margin-left:5px; width:33px; display:block; z-index:999999; float:left;}.action div.btn_fill.selected button.clicked img, .action div.btn_paint.selected button.clicked img {top:-25px;}/*.action div.btn_fill.selected span {background:url(images/buttons/add_color_drop.png) no-repeat 0 -25px;}.action div.btn_fill span {background:url(images/buttons/add_color_drop.png) no-repeat;}.action div.btn_paint span {background:url(images/buttons/add_color_drop.png) no-repeat;}.action div.btn_paint.selected span {background:url(images/buttons/add_color_drop.png) no-repeat 0 -50px;}*/.btn_brush{left:183px;}.action div.btn_addBezier {left:135px; /* width:100px; */}.action div.btn_erase_s {left:155px; width:38px; /*padding-left:11px; background:url(images/buttons/seperator.png) no-repeat;*/ overflow:visible; z-index:9999;}/*.action div.btn_erase_s span, .action div.btn_erase_c span {display: none;float: left;margin-left:5px;width:34px;height:25px; overflow:hidden;}*/.action div.btn_erase_s button, .action div.btn_erase_c button{overflow:hidden; margin-left:5px; width:33px; display:block; float:left;}.action div.btn_erase_s button.clicked img, .action div.btn_erase_c button.clicked img {top:-25px;}/*.action div.btn_erase_s.selected span {background:url(images/buttons/erase_drop.png) no-repeat 0 -25px;}.action div.btn_erase_s span {background:url(images/buttons/erase_drop.png) no-repeat;}.action div.btn_erase_c.selected span {background:url(images/buttons/erase_drop.png) no-repeat 0 -50px;}*//*.btn_removeBezier {left:194px;}*/.btn_removeBezier {left:167px;}.btn_hand {left:2px; }.btn_zoomOut {left:25px; margin-top:1px; /*padding-left:6px; background:url(images/buttons/seperator.png) no-repeat;*/}.btn_zoomIn {left:45px; margin-top:1px;}.btn_fit {left:75px; padding-left:6px; background:url(images/buttons/seperator.png) no-repeat;}.edit_tools #color_sel {left:410px; position:absolute; top:9px;}/*#myCanvas, #brushCanvas {opacity:0.80;}*/.overlay {position:absolute; width:1024px; height:600px; background-color:#333; display:none;}.overlay .message { width:70%; position:absolute; top:40%; left:50%; margin-left:-35%; font-size:18px; font-weight:bold; color:#fff; text-align:center; line-height:normal;}#myCanvas2 {opacity:0.7;}.outer{position:relative; left:0px;}ul {float:left; width:304px;}.slider{width:304px; overflow:hidden}.buttons{overflow:hidden;width:65px;margin:0 auto;}.next, .prev {width: 21px;height: 20px;overflow: hidden;float: left; cursor:pointer; margin:5px;}.prev {margin-right:5px;}.next {margin-left:5px;}.next img, .prev img {position:relative;}.next.disabled img, .prev.disabled img {position:relative; top:-20px; cursor:default;}.pos2{ left:95px!important;}.btn_back { display: none; cursor: pointer; color: #DDDDDD; font-size: 11px; font-weight: bold; text-decoration: none; position: absolute; bottom: 330px; left: 16px; background: #555; padding: 8px 15px; }.edit_tools .btn_back, #hrefPrint{display: none;cursor: pointer;color: #DDDDDD;font-size: 11px;font-weight: bold;text-decoration: none;position: absolute;bottom: 7px;left: 453px;background: #555;padding: 4px 10px;}.container .btn_back {left:25px;}/*g.color_section {padding-top:35px;}*/.btn_home, .btn_preview, #downloadExp { color: #222; display: inline-block; font-size: 12px; font-weight: bold; padding: 6px 0 0 10px; text-decoration: none; margin-top: 3px; }.used_color_div > label {    color: #777779;    display: inline-block;    font-size: 12px;    padding-bottom: 5px;}.overlayImage {	background:url(images/overlay_bg.png) repeat left top;	position:fixed;	left:0;	top:0;	width:100%;	height:100%;	z-index:99999;}.preview_image_div{    left: 50%;    margin-left: -320px;    position: absolute;    top: 60%;    z-index: 999999;	padding:10px;	background:#FFF;	width:665px;}.paint_note {font-size:12px; font-style:italic; padding-top:10px;}.close_overlay {    float: right;    position: absolute;    right: -16px;    top: -18px;}.close_overlay img {width:26px;}.preview_image{float:left;}#hrefPrint {    display: inline-block;    left: 400px;}#download, #downloadExp {cursor:pointer;}#downloadExp{ display:none;}.noShapeAlert {    background: none repeat scroll 0 0 #FFFFFF;    font-weight: bold;    height: 200px;    left: 50%;    margin-left: -120px;    position: absolute;    top: 145px;    width: 300px;    z-index: 999999;}.noShapeAlert .close_overlay {    position: absolute;    right: -18px;    top: -20px;}.noShapeAlert > div {    display: inline-table;    float: left;    height: 200px;    width: 300px;}.noShapeAlert p {    display: table-cell;    padding: 0;    text-align: center;    vertical-align: middle;}/******************************************************************Contrast CSS*/.ui-slider {    background-position: center center;    background-repeat: no-repeat;    height: 23px;    position: relative;    width: 200px;}.ui-slider, .ui-slider-1 {    background: url("images/slider-bg-1.png") no-repeat scroll center center;    border: medium none;    border-radius: 0;}a {    color: #D5DCEA;}.ui-slider .ui-slider-range {    height: 100%;    opacity: 0.3;    position: absolute;    width: 100%;}.ui-slider .ui-slider-handle {    background: url("images/slider-handle.gif") no-repeat scroll 0 0;    border: medium none;    border-radius: 0;    cursor: pointer;    height: 23px;    left: 0px;    position: absolute;    top: 0;    width: 12px;    z-index: 99;}#tabdemo input[type="button"] {    background-color: #C8D7EA;    border: 1px solid #78829B;    font-size: 12px;    margin-right: 5px;    margin-top: 5px;    padding: 3px 3px 4px;}#tabdemo {    background: none repeat scroll 0 0 #999;    color: #FFFFFF;    left: 50%;    margin-left: -512px;    width: 1024px;    min-height: 591px;    position: absolute;    top: 145px;    z-index: 999999;}.actiondemo {    background: none repeat scroll 0 0 #999;}div.demo-options {    margin: 0 auto;    overflow: hidden;    padding: 20px;    width: 900px;}.sliders_all {    float: left;    width: 225px;	padding-top:9px;}.image_get {    float: left;    width: 665px;	height:500px;}#demoimage {    width: 100%;}#tabdemo h3 {    margin: 10px 0;    text-align: center;}.used_color div {overflow:hidden; padding:1px; background-color:#FFF; margin-bottom:1px;}.used_color div.other_value {float:left; padding-left:10px	;}.other_value span {font-size:12px; color:#777779; display:block; padding-top:2px;}.used_color li {    display: block;    float: left;    position: relative;	width:3em;	height:2em;}.used_color li span {    font-size: 13px;    left: 70px;    position: absolute;    top: 2px;    width: 100px;}.used_color li span.hex_code {left:170px;}.used_color {    /*height: 190px;*/    overflow-y: auto;}.preview_image .used_color {    color: #FFFFFF;    height: auto;    overflow: hidden;    padding-top: 10px;}.preview_image .used_color div {float:left; margin-right:10px;}@media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  { img {max-width:100%;}#wrapper {width:100%;} .overlay {position:absolute; width:100%; height:100%; background-color:#333; display:block;} .overlay .message {top:18%;}}@media only screen and (max-device-width : 640px)  { img {max-width:100%;}#wrapper {width:100%;} .overlay {position:absolute; width:100%; height:100%; background-color:#333; display:block;} .overlay .message {top:18%;}}/**********myaddition**********/.sizeselector {    background-color: #888;}.sizeselector:hover {    background-color: #686868;}#disclaimer {    background: white;    float: right;    width: 100%;}#disclaimer_content {    position: absolute;       top: 91%;    font-size: 9pt;    padding-top: 8px;}#disclaimer_content ol li {    padding: 3px;}.colors_main_menu {    background: #dcdddf;    color: #777779;/*    padding: 8px;*/    margin-right: 27px;    margin-left: 16px;    font-size: 14px;}.copy {    text-align: left;}.copy ul li {    font-family: AccordAltMedium;    font-size: 21px;}.active{ color:red!important; font-weight:bold;}#last_used_color_footer{ background:#fff; padding:1px;padding: 3px; overflow: hidden;}.other_value{float: left; margin-left: 12px;}#selected_colour_tooltip{ height: 50px;width: 100px;border: 2px solid;}/** custom by dev **/.custom-tooltip{ background:rgba(255,255,255,.7); padding:3px 5px;}.custom-tooltip2{ background:rgba(0,0,0,.7); padding:3px 5px; color:#fff}.footer_buttons{ width:100%;float:left;margin-top: 7px; margin-left: 20px;}.remove-paint-msg{ width:100%; float:left; padding: 3px 0 0 20px;}.remove-paint-msg span{ color:red;}
            </style>
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


                    </div>                   
                    <div class="zoom">

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
                    <button id="download" target="_blank" ><img src="images/buttons/btn_save_img.png" /></button>
                    <button style="display:none" onClick="javascript:RemovePaint();return false;"><img src="images/buttons/btn_remove_paint.png" /></button>
                    <button onClick="javascript:seeOrgImage();return false;" class="seeOrg_btn"><img src="images/buttons/btn_org_img.png" /></button>



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
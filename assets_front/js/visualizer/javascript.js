           
                
                
                // JavaScript Document 
//Upload image to Canvas

//new function Nikhil
function rgbToHex(r, g, b) {
    if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
    return ((r << 16) | (g << 8) | b).toString(16);
}

function rgb2hex(rgb){
 rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
 return (rgb && rgb.length === 4) ? "#" +
  ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
  ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}
		//select which file uploader is called...
		var curr_img_loader;
		$(document).on("click","#imageLoader", function(){
			curr_img_loader = "imageLoader";
			var imageLoader = document.getElementById('imageLoader');
			imageLoader.addEventListener('change', handleImage, false);
		});
		$(document).on("click","#imageLoader1", function(){
			curr_img_loader = "imageLoader1";
			var imageLoader = document.getElementById('imageLoader1');
			imageLoader.addEventListener('change', handleImage, false);
		});
		$(document).on("click",".trig_loader", function(){
			$("#imageLoader").trigger('click');                                 //Trigger event on upload button on first page
		});
		$(document).on("click",".trig_loader1", function(){                     //Trigger event on upload button after selecting via gallery
			$("#imageLoader1").trigger('click');
		});




var canvas = document.getElementById('imageCanvas');
var ctx = canvas.getContext('2d');
var cPushArray = new Array();
var cStep = -1;
var upload_step = 0;
var img = new Image();
img = document.getElementById("demoimage");
function handleImage(e){
    var reader = new FileReader();
    var rFilter = /^image\/(?:bmp|cis\-cod|gif|ief|jpeg|pipeg|png|svg\+xml|tiff|x\-cmu\-raster|x\-cmx|x\-icon|x\-portable\-anymap|x\-portable\-bitmap|x\-portable\-graymap|x\-portable\-pixmap|x\-rgb|x\-xbitmap|x\-xpixmap|x\-xwindowdump)$/i;
    
    if (document.getElementById(curr_img_loader).files.length === 0) { 
        return;
    }
    
    reader.onload = function(event){
        var oFile = document.getElementById(curr_img_loader).files[0];
        if (!rFilter.test(oFile.type)) { alert("You must select a valid image file!"); return; }
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        clearRect();
        cPushArray = new Array();
        cStep = -1;
        
        img.onload = function(){
            /*canvas.width = img.width;
            canvas.height = img.height;*/
            //Resize Big image Start//
                var img_width = img.width;
                var img_height = img.height;
                if (img.width > canvas.width) {
                    img.width = canvas.width;
                    img.height = canvas.height;
                }
            //Resize big image End//
            
            x = (canvas.width / 2) - (img.width / 2);
            y = (canvas.height / 2) - (img.height / 2);
            ctx.drawImage(img,x,y,img.width,img.height);
            //cPush();
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    $(".container.screen_two").hide();
    $(".container.splash_container").hide();
    $(".edit_container").show();
    upload_step = 4;
    $('.btn_back').show();
    edit_the_image();
}
//Upload end

/****************On load & Draw function******************************/

var brushCanvas = document.getElementById('brushCanvas');
var brush_ctx = brushCanvas.getContext('2d');
/***************See Original Image*****************************/
function seeOrgImage() {
    //cStep = 1;
    //cPushArray.length = 1;
    //cUndo();
    $('.seeOrg_btn').mousedown(function (e) {
        $('#imageCanvas').css('z-index', '999999');
    });
    
    $('.seeOrg_btn').mouseup(function (e) {
        $('#imageCanvas').css('z-index', '0');
    });
}

/************************Save Image***************************************/

function download() {
    //fit();
		$('#save_msg').show();
        var can1 = document.getElementById('imageCanvas');
        var can2 = document.getElementById('myCanvas');
        //var can3 = document.getElementById('myCanvas2');
        var can4 = document.getElementById('brushCanvas');
        var ctx1 = can1.getContext('2d');
        ctx1.drawImage(can2, 0, 0);
        //ctx1.drawImage(can3, 0, 0);
        ctx1.drawImage(can4, 0, 0);
    var dt = can1.toDataURL();
    //$(this).attr("href",dt); 

    $.ajax({
      type: "POST",
      url: "image_generator.php",
      data: {image: dt}
    }).done(function( respond ) {
     console.log("Saved filename: "+respond);
     $('#save_msg').hide();
     window.location.href = "image_downloader.php?file="+respond;
});
}

/* Modernizr 2.8.0 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-a_download
 */
//;window.Modernizr=function(a,b,c){function t(a){i.cssText=a}function u(a,b){return t(prefixes.join(a+";")+(b||""))}function v(a,b){return typeof a===b}function w(a,b){return!!~(""+a).indexOf(b)}function x(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:v(f,"function")?f.bind(d||b):f}return!1}var d="2.8.0",e={},f=b.documentElement,g="modernizr",h=b.createElement(g),i=h.style,j,k={}.toString,l={},m={},n={},o=[],p=o.slice,q,r={}.hasOwnProperty,s;!v(r,"undefined")&&!v(r.call,"undefined")?s=function(a,b){return r.call(a,b)}:s=function(a,b){return b in a&&v(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=p.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(p.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(p.call(arguments)))};return e});for(var y in l)s(l,y)&&(q=y.toLowerCase(),e[q]=l[y](),o.push((e[q]?"":"no-")+q));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)s(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof enableClasses!="undefined"&&enableClasses&&(f.className+=" "+(b?"":"no-")+a),e[a]=b}return e},t(""),h=j=null,e._version=d,e}(this,this.document),Modernizr.addTest("adownload","download"in document.createElement("a"));

document.getElementById('download').addEventListener('click', download, false);
document.getElementById('downloadExp').addEventListener('click', download, false);
/********************************Zoom In & Out*****************************************/




/***************************************Load image from gallery************************************************/
var classOfSelectedImage;
$(function () {
    var data = {
     //    "Bathroom":
     // [
     //     {
     //         "name": "A",
     //         "src": "images/Interior/Bathroom/A/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "B",
     //         "src": "images/Interior/Bathroom/B/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "C",
     //         "src": "images/Interior/Bathroom/C/BASE_IMAGE.jpg"
     //     }
     // ],

       "Bedroom":
     [
         {
             "name": "A",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE1.png"
         },
         {
             "name": "B",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE2.png"
         },
         {
             "name": "C",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE3.png"
         },
         {
             "name": "D",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE4.png"
         },
         {
             "name": "E",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE5.png"
         },
         {
             "name": "F",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE6.png"
         },
         {
             "name": "G",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE7.png"
         },
         {
             "name": "H",
             "src": "http://localhost/appolo/assets_front/images/sample-img/BASE_IMAGE8.png"
         }
     ],

        "Dinning Room / Kitchen":
     [
         {
             "name": "E",
             "src": "images/Interior/Kitchen/A/BASE_IMAGE.jpg"
         },
         {
             "name": "D",
             "src": "images/Interior/Dining Space/D/BASE_IMAGE.jpg"
         },
         {
             "name": "A",
             "src": "images/Interior/Dining Space/A/BASE_IMAGE.jpg"
         },
         {
             "name": "B",
             "src": "images/Interior/Dining Space/B/BASE_IMAGE.jpg"
         },
         {
             "name": "C",
             "src": "images/Interior/Dining Space/C/BASE_IMAGE.jpg"
         },
         {
             "name": "F",
             "src": "images/Interior/Kitchen/B/BASE_IMAGE.jpg"
         },
         // {
         //     "name": "G",
         //     "src": "images/Interior/Kitchen/C/BASE_IMAGE.jpg"
         // },
         {
             "name": "H",
             "src": "images/Interior/Kitchen/D/BASE_IMAGE.jpg"
         },
         {
             "name": "I",
             "src": "images/Interior/Kitchen/E/BASE_IMAGE.jpg"
         }
     ],

        "Living Room":
     [
         {
             "name": "A",
             "src": "images/Interior/Living Room/A/BASE_IMAGE.jpg"
         },
         {
             "name": "B",
             "src": "images/Interior/Living Room/B/BASE_IMAGE.jpg"
         },
         {
             "name": "C",
             "src": "images/Interior/Living Room/C/BASE_IMAGE.jpg"
         },
         {
             "name": "D",
             "src": "images/Interior/Living Room/D/BASE_IMAGE.jpg"
         },
         {
             "name": "E",
             "src": "images/Interior/Living Room/E/BASE_IMAGE.jpg"
         },
         {
             "name": "F",
             "src": "images/Interior/Living Room/F/BASE_IMAGE.jpg"
         },
         {
             "name": "G",
             "src": "images/Interior/Living Room/G/BASE_IMAGE.jpg"
         },
         {
             "name": "H",
             "src": "images/Interior/Living Room/H/BASE_IMAGE.jpg"
         },
         {
             "name": "I",
             "src": "images/Interior/Living Room/I/BASE_IMAGE.jpg"
         },
         {
             "name": "J",
             "src": "images/Interior/Living Room/J/BASE_IMAGE.jpg"
         },
         {
             "name": "K",
             "src": "images/Interior/Living Room/K/BASE_IMAGE.jpg"
         },
         {
             "name": "L",
             "src": "images/Interior/Living Room/L/BASE_IMAGE.jpg"
         },
         {
             "name": "M",
             "src": "images/Interior/Living Room/M/BASE_IMAGE.jpg"
         },
         {
             "name": "N",
             "src": "images/Interior/Living Room/N/BASE_IMAGE.jpg"
         },
         {
             "name": "O",
             "src": "images/Interior/Living Room/O/BASE_IMAGE.jpg"
         },
         {
             "name": "P",
             "src": "images/Interior/Living Room/P/BASE_IMAGE.jpg"
         },
         {
             "name": "Q",
             "src": "images/Interior/Living Room/Q/BASE_IMAGE.jpg"
         },
         {
             "name": "R",
             "src": "images/Interior/Living Room/R/BASE_IMAGE.jpg"
         }
     ],

 //        "Other":
 //     [
 //         {
 //             "name": "A",
 //             "src": "images/Interior/Spaces/A/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "B",
 //             "src": "images/Interior/Spaces/B/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "C",
 //             "src": "images/Interior/Spaces/C/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "D",
 //             "src": "images/Interior/Wall Fashions/A/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "E",
 //             "src": "images/Interior/Wall Fashions/B/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "F",
 //             "src": "images/Interior/Wall Fashions/C/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "G",
 //             "src": "images/Interior/Wall Fashions/D/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "H",
 //             "src": "images/Interior/Wall Fashions/E/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "I",
 //             "src": "images/Interior/Wall Fashions/F/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "J",
 //             "src": "images/Interior/Wall Fashions/G/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "K",
 //             "src": "images/Interior/Wall Fashions/H/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "L",
 //             "src": "images/Interior/Wall Fashions/I/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "M",
 //             "src": "images/Interior/Wall Fashions/J/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "N",
 //             "src": "images/Interior/Wall Fashions/K/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "O",
 //             "src": "images/Interior/Wall Fashions/L/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "P",
 //             "src": "images/Interior/Wall Fashions/M/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "Q",
 //             "src": "images/Interior/Wall Fashions/N/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "R",
 //             "src": "images/Interior/Wall Fashions/O/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "S",
 //             "src": "images/Interior/Wall Fashions/P/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "T",
 //             "src": "images/Interior/Wall Fashions/Q/BASE_IMAGE.jpg"
 //         },
 //         {
 //             "name": "U",
 //             "src": "images/Interior/Wall Fashions/R/BASE_IMAGE.jpg"
 //         }
 // ],
     //    "Buildings":
     // [
     //     {
     //         "name": "A",
     //         "src": "images/Exterior/Buildings/A/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "B",
     //         "src": "images/Exterior/Buildings/B/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "C",
     //         "src": "images/Exterior/Buildings/C/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "D",
     //         "src": "images/Exterior/Buildings/D/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "E",
     //         "src": "images/Exterior/Buildings/E/BASE_IMAGE.jpg"
     //     },
     //     {
     //         "name": "F",
     //         "src": "images/Exterior/Buildings/F/BASE_IMAGE.jpg"
     //     }
     // ],

        "Bunglows":
     [
         {
             "name": "C",
             "src": "images/Exterior/Bunglows/C/BASE_IMAGE.jpg"
         },
         {
             "name": "I",
             "src": "images/Exterior/Bunglows/I/BASE_IMAGE.jpg"
         },
         {
             "name": "N",
             "src": "images/Exterior/Bunglows/N/BASE_IMAGE.jpg"
         },
         {
             "name": "P",
             "src": "images/Exterior/Bunglows/P/BASE_IMAGE.jpg"
         },
         {
             "name": "Q",
             "src": "images/Exterior/Bunglows/Q/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "R",
             "src": "images/Exterior/Bunglows/R/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "S",
             "src": "images/Exterior/Bunglows/S/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "T",
             "src": "images/Exterior/Bunglows/T/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "U",
             "src": "images/Exterior/Bunglows/U/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "V",
             "src": "images/Exterior/Bunglows/V/BASE_IMAGE.jpg"
         },
		 {
			// custom by developer 
             "name": "W",
             "src": "images/Exterior/Bunglows/W/BASE_IMAGE.jpg"
         }         
         // {
         //     "name": "F",
         //     "src": "images/Exterior/Bunglows/F/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "G",
         //     "src": "images/Exterior/Bunglows/G/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "A",
         //     "src": "images/Exterior/Bunglows/A/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "B",
         //     "src": "images/Exterior/Bunglows/B/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "D",
         //     "src": "images/Exterior/Bunglows/D/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "E",
         //     "src": "images/Exterior/Bunglows/E/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "H",
         //     "src": "images/Exterior/Bunglows/H/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "J",
         //     "src": "images/Exterior/Bunglows/J/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "K",
         //     "src": "images/Exterior/Bunglows/K/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "L",
         //     "src": "images/Exterior/Bunglows/L/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "M",
         //     "src": "images/Exterior/Bunglows/M/BASE_IMAGE.jpg"
         // },
         // {
         //     "name": "O",
         //     "src": "images/Exterior/Bunglows/O/BASE_IMAGE.jpg"
         // }
		 ]
    };




    if (!window.console) window.console = {};
    if (!window.console.log) window.console.log = function () { };
    //$.getJSON('category.json',function(data){
    $('ul li a').click(function () {
        $('.container .right_section div, .container .right_section ul').hide();
        var data_pass = $(this).text();
		var addClassOfclick = $(this).text().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
		//addClassOfclick = addClassOfclick.replace(" ", "");
        upload_step = 1;
        $('.btn_back').show();
        testJsonData(data[data_pass]);
        //console.log('success');
        function testJsonData(data_pass) {
            $('.container .right_section').prepend('<div class="list_items"></div>').children().eq(0).addClass(addClassOfclick);
            //var tr;
            for (var i = 0; i < data_pass.length; i++) {
                //console.log(data_pass);
                $('div.list_items').append('<div class="list"><img src="' + data_pass[i].src + '"class="' + data_pass[i].name + '"/>');
            }
        }
		$('.right_section').children().eq(0).css('display', 'block');

    });
	
	
	




    function addCanImg(Cat_img) {
		clearRect();
        img = new Image();

        img.onload = function () {
            var img_width = img.width;
            var img_height = img.height;
            if (img.width > canvas.width) {
                img.width = canvas.width;
                img.height = canvas.height;
            }
            x = (canvas.width / 2) - (img.width / 2);
            y = (canvas.height / 2) - (img.height / 2);
            ctx.drawImage(img, x, y, canvas.width, canvas.height);
            //cPush();

        };
        //console.log(Cat_img);
        img.src = Cat_img;
		templetes();
		initial_bz = drawStack.length;
    }

    $(document).on("click", ".list_items .list img", function () {
		alert("hello");
		$('#create_shape').hide();
		$('#remove_shape').hide();
        
		$('.container').css('display', 'none');
                $('.edit_container').css('display', 'block');
		classOfSelectedImage = $(this).attr('class');
//        var Cat_img = $(this).attr('src').replace(/\.jpg/, '_hi.jpg');
 var Cat_img = $(this).attr('src');
        console.log(Cat_img);
        addCanImg(Cat_img);
        upload_step = 2;
    });

});

//Variables moved from around line 1470 to line 578 by Softronikx - Nikhil
var outputCanvasColors;
var color_data = $.getJSON("http://localhost/appolo/assets_front/js/visualizer/color.js");

///////////////////////////////////////////////////////////Bezier //////////////////////////
		
		//////////////////////////////
function bazier(){		
	$('#brushCanvas').css('z-index', '0');
	$('#eraserCanvas').css('z-index', '0');
	context3.globalCompositeOperation = "source-over";
	activeMode = "bzr"
}
		var flag = 0;
		var state = null;
		var coor_num;
		var bg_col = '#DDFFDD';
		var _max = 0;
		var struct = new Array();
		var struct_num = 1;
		var selected_shapes = new Array();
		var firstX, firstY, beginX, beginY, endX, endY;
		
		var c=document.getElementById("myCanvas");
		var context=c.getContext("2d");
				
		var c2=document.getElementById("myCanvas2");
		var context2=c2.getContext("2d");
		var drawStack = new Array();
		var initial_bz = 0;
		var activeMode;
		var colorBzr = "rgba(161, 164, 163, 0.5)";
		var colorRemove = "rgba(161, 164, 163, 0)";
		var colorPaint = "rgba(161, 164, 163, 0.5)";

		var is_grouping = false;
		var shape_grouped;

		/*var c3=document.getElementById("myCanvas3");
		var context3=c3.getContext("2d");*/
		
		/***********Declaration for Zoom functionality************/
		
		var firstX, firstY, beginX, beginY, endX, endY, acc_firstX, acc_firstY, acc_beginX, acc_beginY, acc_endX, acc_endY;
		var scale = 0;
		var scale_inc = 1.25;
		var scale_dec = .8;
		var scale_factor = .25;
		var zoomFactor;
		var scale_dec_to_null;
		var canvas_x = 665;
		var canvas_y = 500;
		var canInc = 1;
		var canDec = 1;
		var limit = 3; 
		var mouseKey = 'unset';
		var translate_factor_inc = 0;
		var translate_factor_inc_x;
		var translate_factor_inc_y = (canvas_y -(canvas_y * scale_dec))/2 ;
		var translate_factor_dec_x = (canvas_x -(canvas_x * scale_inc))/2 ;
		var translate_factor_dec_y = (canvas_y -(canvas_y * scale_inc))/2 ;
		var translate_factor = 0;
		var mousePos = new Object();
		var newMousePos = new Object();
		var displacement = new Object();
		displacement.x = 0;
		displacement.y = 0;
		
		
		c2.addEventListener('mousedown', function (evt, ui) {
		   if(state != null){
				mouseKey = 'set';
				mousePos.x = evt.pageX - $(this).offset().left;
				mousePos.y = evt.pageY - $(this).offset().top;
				newMousePos.x = mousePos.x;
				newMousePos.y = mousePos.y;
				if(state == 'start'){
					$('button').attr("disabled", "disabled");
				}
				
				//new code by nikhil to get selected colour
				var p = context2.getImageData(newMousePos.x, newMousePos.y, 1, 1).data; 
				var p_hex = "#" + ("000000" + rgbToHex(p[0], p[1], p[2])).slice(-6);
								
				for (var putColor = 0; putColor < canvasColors.length; putColor++) {
					var prev = putColor-1;
					if(canvasColors[prev]!=canvasColors[putColor])
					{  	
						var existing_colors = rgb2hex(canvasColors[putColor]);
						if(p_hex == existing_colors)
						{
							$("#selected_colour_tooltip").css( {position:"absolute", top:evt.pageY - 50, left: evt.pageX - 250, border:"0" });
							$("#selected_colour_tooltip").show();
							$('#selected_colour_tooltip').html('<div class="rec_'+putColor+'"><div class="other_value"></div></div>');
							
							/*<li style="display: block; float: left; position: relative; width: 60px; height: 40px; background-color:'+canvasColors[putColor]+';"class="'+putColor+'"></li> Commented by Softronikx Nikhil*/
							
							
							var y = rgb2hex(canvasColors[putColor]);
							y = y.toUpperCase();
							var count; 
							color_data.done(function(data) {
								count = 0;
								$(data.color).each(function(index, element){
									// var categ = $('input[name=main_categ]:checked', '.colors_main_menu').val();
									// alert(categ);
										var x = element.hex;
									if("\""+x+"\"" == "\""+y+"\""){
										++count;
										console.log(element.name);
										if(count==1)
										{    
											$('#selected_colour_tooltip div.rec_'+putColor+' div.other_value').append("<span class='' style='color:#000; background:rgb(255,255,255); padding:3px 5px;' >"+element.name+"</span>");
											$('#selected_colour_tooltip div.rec_'+putColor+' div.other_value').append("<span class=\"hex_code\" style='color:#000; background:rgb(255,255,255); padding:3px 5px;'>"+element.code+"</span>");
											 // $(".preview_image").append("<span>"+element.name+"</span>");
											 // $(".preview_image").append("<span class=\"hex_code\">"+element.code+"</span>");
										}
										
									}
								});
								
							});	
						}	
						//new updated code
						if(p_hex == '#000000')
						{
							$("#selected_colour_tooltip").css( {position:"absolute", top:evt.pageY - 50, left: evt.pageX - 250, border:"0" });
							$("#selected_colour_tooltip").show();
							$('#selected_colour_tooltip').html('<div class="rec_'+putColor+'"><div class="other_value"></div></div>');
							$('#selected_colour_tooltip div.rec_'+putColor+' div.other_value').append("<span class='custom-tooltip2' >Non Paintable Surface</span>");
							
						}						
					 }
				}			
				//end of new code by nikhil
			}
		});

		c2.addEventListener('mouseup', function (evt) {
		    if (state != null) {
		        context.lineWidth = 1;
		        context2.lineWidth = 1;
		        if (mouseKey == 'set') {
		            displacement.x = displacement.x + newMousePos.x - mousePos.x;
		            displacement.y = displacement.y + newMousePos.y - mousePos.y;
		            mouseKey = 'unset';
		        }
				
				//new code by nikhil to remove tooltip of selected colour
				 $('#selected_colour_tooltip').html('');
				 $("#selected_colour_tooltip").hide();
		    }
			
					
			//NIKHIL -> state is 'fill' only when the fill button is clicked.
		    if (state == 'fill' || state == 'delete') { //|| state == 'delete' is commented by NIKHIL
		        _max = 0; //NIKHIL -> this probably stores the total number of structures
		        //to get which shape os selected
				
				//NIKHIL -> struct[1], struct[2], struct[3] are all structures on the image
				//NIKHIL -> struct[1][1],struct[1][2], struct[1][3],struct[1][4] => these contain the coordinations of structure 1, and so on for structure 2.
		        for (i = 1; i <= struct.length - 1; i++) {
		            context.beginPath();
					context.moveTo(struct[i][1].pos._x, struct[i][1].pos._y);
		            for (j = 2; j < struct[i].length; j++) {
		                context.lineTo(struct[i][j].pos._x, struct[i][j].pos._y);
		            }
		            context.closePath();
		            // If the browser supports the method
		            if (typeof context.isPointInPath == "function") {
		                if (context.isPointInPath(evt.pageX - $(this).offset().left, evt.pageY - $(this).offset().top)) {
		                    if (i > _max) {
		                        _max = i;
		                    }
		                }
		            } else {
		                alert('no');
		            }
		        } //end of outer for loop

		        var is_in_group = false;
		        if (is_grouping && _max) {
		            var i;
		            for (i = 0; i < shape_grouped.length; i++) {
		                if (shape_grouped[i].pos_of_shape.indexOf(_max) != -1) {
		                    is_in_group = true;
		                    break;
		                }
		            }
		            if (is_in_group) {
		                shape_grouped[i].pos_of_shape.sort();
		                shape_grouped[i].pos_of_shape.reverse();
		                for (var k in shape_grouped[i].pos_of_shape) {
		                    if (state == 'fill') {
		                        do_fill(shape_grouped[i].pos_of_shape[k]);
		                    } else {
		                        do_delete(shape_grouped[i].pos_of_shape[k]);
		                    }
		                }
		                do_ungroup();
		                do_group();
		            }
		        } 
                if ( _max && ( !is_grouping || !is_in_group )) {
		            if (state == 'fill') {
		                do_fill(_max);
		            } else {
		                do_delete(_max);
		            }
		        }
				else alert('Sorry! You cannot paint this area.');	// Rayzen
		        context2.clearRect(0, 0, canvas.width, canvas.height);
		        stackLength();
				//alert("Painting");
		    }
		    
		    if (state == 'remove_paint') { //|| state == 'delete' is commented by NIKHIL
		        _max = 0; //NIKHIL -> this probably stores the total number of structures
		        //to get which shape os selected
				
				//NIKHIL -> struct[1], struct[2], struct[3] are all structures on the image
				//NIKHIL -> struct[1][1],struct[1][2], struct[1][3],struct[1][4] => these contain the coordinations of structure 1, and so on for structure 2.
		        for (i = 1; i <= struct.length - 1; i++) {
		            context.beginPath();
					context.moveTo(struct[i][1].pos._x, struct[i][1].pos._y);
		            for (j = 2; j < struct[i].length; j++) {
		                context.lineTo(struct[i][j].pos._x, struct[i][j].pos._y);
		            }
		            context.closePath();
		            // If the browser supports the method
		            if (typeof context.isPointInPath == "function") {
		                if (context.isPointInPath(evt.pageX - $(this).offset().left, evt.pageY - $(this).offset().top)) {
		                    if (i > _max) {
		                        _max = i;
		                    }
		                }
		            } else {
		                alert('no');
		            }
		        } //end of outer for loop

		        var is_in_group = false;
		        if (is_grouping && _max) {
		            var i;
		            for (i = 0; i < shape_grouped.length; i++) {
		                if (shape_grouped[i].pos_of_shape.indexOf(_max) != -1) {
		                    is_in_group = true;
		                    break;
		                }
		            }
		            if (is_in_group) {
		                shape_grouped[i].pos_of_shape.sort();
		                shape_grouped[i].pos_of_shape.reverse();
		                for (var k in shape_grouped[i].pos_of_shape) {
		                    if (state == 'remove_paint') {
		                    	do_remove(shape_grouped[i].pos_of_shape[k]);
		                    } else {
		                        do_delete(shape_grouped[i].pos_of_shape[k]);
		                    }
		                }
		                do_ungroup();
		                do_group();
		            }
		        } 
                if ( _max && ( !is_grouping || !is_in_group )) {
		            if (state == 'remove_paint') {
		            	do_remove(_max);
		            } else {
		                do_delete(_max);
		            }
		        }
		        context2.clearRect(0, 0, canvas.width, canvas.height);
		        stackLength();
				$('#paint_msg').hide();
				//alert("Painting");
		    }

		    if (state == "start") {
		        context.strokeStyle = '#000';
		        if (flag == 0 && evt.pageX - $(this).offset().left == mousePos.x && evt.pageY - $(this).offset().top == mousePos.y) {
		            firstX = beginX = evt.pageX - $(this).offset().left;
		            firstY = beginY = evt.pageY - $(this).offset().top;
		            if (scale == 0) {
		                acc_firstX = firstX - displacement.x;
		                acc_firstY = firstY - displacement.y;
		            }
		            else if (scale > 0) {
		                acc_firstX = firstX + ((canvas_x / 2) - firstX) * zoomFactor / 50 - displacement.x;
		                acc_firstY = firstY + ((canvas_y / 2) - firstY) * zoomFactor / 50 - displacement.y;

		            } else {
		                acc_firstX = firstX - ((canvas_x / 2) - firstX) * zoomFactor / 50 - displacement.x;
		                acc_firstY = firstY - ((canvas_y / 2) - firstY) * zoomFactor / 50 - displacement.y;
		            }
		            if (acc_firstX >= 0 && acc_firstY >= 0 && acc_firstX < canvas_x && acc_firstY < canvas_y) {
                        flag = 1;
		                coor_num = 1;
		                struct[struct_num] = new Array();
		                struct[struct_num].fill_style = "transparent";
		                struct[struct_num][coor_num] = new Object();
		                struct[struct_num][coor_num].pos = new Object();
		                struct[struct_num][coor_num].pos._x = acc_firstX;
		                struct[struct_num][coor_num].pos._y = acc_firstY;

                        console.log("state start - addCoor("+acc_firstX+", "+acc_firstY+");");

		                context2.arc(acc_firstX, acc_firstY, 5, 0, 2 * Math.PI);
		            }

		        } else if (flag == 1 && evt.pageX - $(this).offset().left == mousePos.x && evt.pageY - $(this).offset().top == mousePos.y) {
		            endX = evt.pageX - $(this).offset().left;
		            endY = evt.pageY - $(this).offset().top;
		            if (scale == 0) {
		                acc_endX = endX - displacement.x;
		                acc_endY = endY - displacement.y;
		            }
		            else if (scale > 0) {
		                acc_endX = endX + ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		                acc_endY = endY + ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		            } else {
		                acc_endX = endX - ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		                acc_endY = endY - ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		            }

		            if (acc_endX > 0 && acc_endY > 0 && acc_endX < canvas_x && acc_endY < canvas_y) {
		                if (((Math.abs(firstX - endX) < 10) && (Math.abs(firstY - endY) < 10))) {
		                    context2.clearRect(0, 0, canvas_x, canvas_y);
		                    /*for (j = 1; j < struct[struct_num].length; j++) {
		                    context2.fillRect(struct[struct_num][j].pos._x - 5, struct[struct_num][j].pos._y - 5, 10, 10);
		                    }*/
		                    endX = firstX;
		                    endY = firstY;
		                    flag = 0;
		                    /*_max = struct_num;*/
		                    setTimeout('do_fill(' + struct_num + ')', 10);
		                    struct_num++;
				    $("#b11").trigger("click");// to disable to draw more // Rayzen
				    state = '';
		                    drawStack.push("bz");
		                    deleteBzrContainer.length = 0; //Reset the things for undo redo
		                    deleteBzrStructPos.length = 0;
		                    deleteBzrPos.length = 0;
		                    isDeleteShape = false;
		                    $('button').removeAttr("disabled");
		                    /*do_ungroup();*/
		                } else {
		                    coor_num++;
		                    struct[struct_num][coor_num] = new Object();
		                    struct[struct_num][coor_num].pos = new Object();
		                    struct[struct_num][coor_num].pos._x = acc_endX;
		                    struct[struct_num][coor_num].pos._y = acc_endY;

                            console.log("state start 2 addCoor("+acc_endX+", "+acc_endY+");");

		                    context2.arc(acc_endX, acc_endY, 5, 0, 2 * Math.PI);
		                }
		                context.beginPath();
		                if (scale == 0) {
		                    xxx = beginX - displacement.x;
		                    yyy = beginY - displacement.y;
		                }
		                else if (scale > 0) {
		                    xxx = beginX + ((canvas_x / 2) - beginX) * zoomFactor / 50 - displacement.x;
		                    yyy = beginY + ((canvas_y / 2) - beginY) * zoomFactor / 50 - displacement.y;
		                } else {
		                    xxx = beginX - ((canvas_x / 2) - beginX) * zoomFactor / 50 - displacement.x;
		                    yyy = beginY - ((canvas_y / 2) - beginY) * zoomFactor / 50 - displacement.y;
		                }

		                context.moveTo(xxx, yyy);
		                if (scale == 0) {
		                    xxx = endX - displacement.x;
		                    yyy = endY - displacement.y;
		                }
		                else if (scale > 0) {
		                    xxx = endX + ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		                    yyy = endY + ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		                } else {
		                    xxx = endX - ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		                    yyy = endY - ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		                }
		                context.lineTo(xxx, yyy);
		                context.stroke();
		                beginX = endX;
		                beginY = endY;
		            }
		        }
		    }
		});


		var once = true;
		var store_image = new Image();
		c2.addEventListener('mousemove', function (evt) {
		    h_max = 0;
		    h_paint = 0;
		    //to get which shape is selected
		    for (i = 1; i <= struct.length - 1; i++) {
		        context.beginPath();
		        context.moveTo(struct[i][1].pos._x, struct[i][1].pos._y);
		        for (j = 2; j < struct[i].length; j++) {
		            context.lineTo(struct[i][j].pos._x, struct[i][j].pos._y);
		        }
		        context.closePath();
		        // If the browser supports the method
		        if (typeof context.isPointInPath == "function") {
		            if (context.isPointInPath(evt.pageX - $(this).offset().left, evt.pageY - $(this).offset().top)) {
		                if (i > h_max) {
		                    h_max = i;
		                }
		            }
		        } else {
		            alert('no');
		        }
		    } //end of outer for loop


		    /***Hover Effect on paint***/
		    /*for (i = 0; i < clickX.length; i++) {
		    if (evt.pageX - $(this).offset().left < clickX[i] + 4 && evt.pageX - $(this).offset().left > clickX[i] - 4 && evt.pageY - $(this).offset().top < clickY[i] + 4 && evt.pageY - $(this).offset().top > clickY[i] - 4) {
		    console.log(mouseUpCount);
		    for (j = 0; j < mouseUpCount.length; j++) {
		    if (i < mouseUpCount[j]) {
		    console.log("j----" + j);
		    break;
		    }
		    }
		    }
		    }*/

		    /***Hover Effect on shapes**/
		    if (h_max && flag == 0) {
		        var is_in_group = false;
		        context2.clearRect(0, 0, canvas_x, canvas_y);
		        if (is_grouping) {
		            var i;
		            for (i = 0; i < shape_grouped.length; i++) {
		                if (shape_grouped[i].pos_of_shape.indexOf(h_max) != -1) {
		                    is_in_group = true;
		                    break;
		                }
		            }
		            if (is_in_group) {
		                context2.fillStyle = struct[h_max].fill_style;
		                for (var k in shape_grouped[i].pos_of_shape) {
		                    context2.beginPath();
		                    context2.moveTo(struct[shape_grouped[i].pos_of_shape[k]][1].pos._x, struct[shape_grouped[i].pos_of_shape[k]][1].pos._y);
		                    for (j = 2; j < struct[shape_grouped[i].pos_of_shape[k]].length; j++) {
		                        context2.lineTo(struct[shape_grouped[i].pos_of_shape[k]][j].pos._x, struct[shape_grouped[i].pos_of_shape[k]][j].pos._y);
		                    }
		                    context2.closePath();
		                    context2.fill();
		                }
		                context2.fillStyle = '#000';
		            }
		        }
		        if (!is_in_group || !is_grouping) {
		            context2.beginPath();
		            context2.moveTo(struct[h_max][1].pos._x, struct[h_max][1].pos._y);
		            for (j = 2; j < struct[h_max].length; j++) {
		                context2.lineTo(struct[h_max][j].pos._x, struct[h_max][j].pos._y);
		            }
		            context2.closePath();

		            context2.fillStyle = struct[h_max].fill_style;
		            context2.fill();

		            context2.fillStyle = '#000';
		        }
		    } else {
		        context2.clearRect(0, 0, canvas_x, canvas_y);
		    }
		    /*******Hover effect**********/




		    if (struct.length > 1 && flag == 1) {
		        context2.clearRect(0, 0, canvas_x, canvas_y);
		        for (j = 1; j < struct[struct_num].length; j++) {
		            var xxx = (struct[struct_num][j].pos._x);
		            var yyy = (struct[struct_num][j].pos._y);
		            /*context2.fillRect(xxx - 5, yyy - 5, 10, 10);*/
		            context2.beginPath();
		            context2.arc(xxx, yyy, 5, 0, 2 * Math.PI);
		            context2.fill();
		            context2.stroke();
		        }
		    }
		    if (flag == 1) {
		        endX = evt.pageX - $(this).offset().left;
		        endY = evt.pageY - $(this).offset().top;
		        context2.beginPath();
		        if (scale == 0) {
		            endX = endX - displacement.x;
		            endY = endY - displacement.y;
		        }
		        else if (scale > 0) {
		            endX = endX + ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		            endY = endY + ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		        } else {
		            endX = endX - ((canvas_x / 2) - endX) * zoomFactor / 50 - displacement.x;
		            endY = endY - ((canvas_y / 2) - endY) * zoomFactor / 50 - displacement.y;
		        }

		        context2.moveTo(xxx, yyy);
		        if (endX > 0 && endY > 0 && endX < canvas_x && endY < canvas_y) {
		            context2.lineTo(endX, endY);
		        }
		        context2.stroke();
		    }
		    if (state == 'pan' && mouseKey == 'set' && flag == 0 && scale > 0) {
				if (once == true){
		        	clearRect();
					once = false;
				}
		        if (
		        /*while the cursor is moving on canvas*/
					evt.pageX - $(this).offset().left > 0 &&
					evt.pageX - $(this).offset().left < canvas_x &&
					evt.pageX - $(this).offset().left + displacement.x < mousePos.x + (canvas_x / zoomFactor) * scaleFactor &&
					evt.pageX - $(this).offset().left + displacement.x > mousePos.x - (canvas_x / zoomFactor) * scaleFactor
				) {
		            context.translate((evt.pageX - $(this).offset().left) - newMousePos.x, 0);
		            context2.translate((evt.pageX - $(this).offset().left) - newMousePos.x, 0);
		            ctx.translate((evt.pageX - $(this).offset().left) - newMousePos.x, 0);
		            ctx.drawImage(store_image, x, y, img.width, img.height);
		            brush_ctx.translate((evt.pageX - $(this).offset().left) - newMousePos.x, 0);
		            newMousePos.x = evt.pageX - $(this).offset().left;
		        }
		        if (
					evt.pageY - $(this).offset().top > 0 &&
					evt.pageY - $(this).offset().top < canvas_y &&
					evt.pageY - $(this).offset().top + displacement.y < mousePos.y + (canvas_y / zoomFactor) * scaleFactor &&
					evt.pageY - $(this).offset().top + displacement.y > mousePos.y - (canvas_y / zoomFactor) * scaleFactor
				) {
		            context.translate(0, (evt.pageY - $(this).offset().top) - newMousePos.y);
		            context2.translate(0, (evt.pageY - $(this).offset().top) - newMousePos.y);
		            ctx.translate(0, (evt.pageY - $(this).offset().top) - newMousePos.y);
		            brush_ctx.translate(0, (evt.pageY - $(this).offset().top) - newMousePos.y);
		            ctx.drawImage(store_image, x, y, img.width, img.height);
		            newMousePos.y = evt.pageY - $(this).offset().top;
		        }
		    }
		});

		c2.addEventListener('mouseleave', function (evt) {
		    if (state == "pan" && mouseKey == 'set') {
		        console.log("mouseleave");
		        context.lineWidth = 1;
		        context2.lineWidth = 1;
		        displacement.x = displacement.x + newMousePos.x - mousePos.x;
		        displacement.y = displacement.y + newMousePos.y - mousePos.y;
		        mouseKey = 'unset';
		        state = null;
		    }
		});
		c2.addEventListener('mouseup', function (evt) {
		    if (state == "pan") {
				once = true;
		        clearRect();
		        ctx.drawImage(img, x, y, img.width, img.height);
		        stackLength();
		    }
		});
		
		function start(){
		console.log("Create shape clicked..");
			state = 'start';
			$('#brushCanvas').css('z-index', '0');
			$('#eraserCanvas').css('z-index', '0');
            context3.globalCompositeOperation = "source-over";
            //isGlobalComp[l] = false;
			activeMode = "bzr";
		};
		
        function sel(){
			state = 'select';
			activeMode = "bzr";
			$('#brushCanvas').css('z-index', '0');
			$('#eraserCanvas').css('z-index', '0');
			context2.clearRect(0, 0, 665, 500);
			_max=0;
		};

		function del() {
		console.log("Delete shape clicked..");
		    state = 'delete';
		};

		
		
		/*function fill(){ 
			if(struct.length == 0 || struct.length == 1){
				$('.noShapeAlert').show();
				$('.overlayImage').show();
			}
			state = 'fill';
			$('#brushCanvas').css('z-index', '0');
		};*/

		
		
		function fill(){
			
			
			if(state == 'fill') //for hover effect
			{
				console.log('removing fill state');
				state = 'only_tooltip';
				$('#b4').removeClass('clicked');					
			}
			else
			{
				if(struct.length == 0 || struct.length == 1){
					$('.noShapeAlert').show();
					$('.overlayImage').show();
				}
				state = 'fill';
				$('#brushCanvas').css('z-index', '0');
			}
		};

		
		function do_fill(shape) {
		getClass = $('button#b4').parent().attr("class");
		console.log("Class = "+getClass);
		if(getClass == "button btn_fill selected"){
		$('button#b4').parent().addClass("btn_fill selected");
		/* custom by dev */
			if( getClass.indexOf("selected") > -1){
			$('#brushCanvas').css('z-index', '0');
		   struct[shape].fill_style = colorBzr;
		    
		    var loaderFlag = true;       //Loader for Bazier start		
		    if (loaderFlag == true) {
		        $('.ajax_loader').show();
		        setTimeout(function () {
		            $('.ajax_loader').hide();
		        }, 1000);
		        loaderFlag = false;
		    }                             //Loader for Bazier End
		    stackLength();
		    paint = false;
		    context2.clearRect(0, 0, canvas.width, canvas.height);
			}
			//$('button#b4').parent().removeClass('selected');
			//$('button#b1, button#b4' ).removeClass('clicked');
			}
        };
        
        function do_remove(shape) {
    		getClass = $('button#b4').parent().attr("class");
    		console.log("Class = "+getClass);
    		if(getClass == "button btn_fill selected"){
    		$('button#b4').parent().addClass("btn_fill selected");
    		/* custom by dev */
    			if( getClass.indexOf("selected") > -1){
    			$('#brushCanvas').css('z-index', '0');
    		   struct[shape].fill_style = colorRemove;
    		    
    		    var loaderFlag = true;       //Loader for Bazier start		
    		    if (loaderFlag == true) {
    		        $('.ajax_loader').show();
    		        setTimeout(function () {
    		            $('.ajax_loader').hide();
    		        }, 1000);
    		        loaderFlag = false;
    		    }                             //Loader for Bazier End
    		    stackLength();
    		    paint = false;
    		    context2.clearRect(0, 0, canvas.width, canvas.height);
    			}
    			//$('button#b4').parent().removeClass('selected');
    			//$('button#b1, button#b4' ).removeClass('clicked');
    			}
            };

        var deleteShape;
        var isDeleteShape = false;
        var z_deletePos;
        var undo_redo_structValue = new Array();
        var deleteBzrContainer = new Array();
        var deleteBzrPos = new Array();
        var deleteBzrStructPos = new Array();

        function do_delete(shape) {
            varCompVal = 0;
            z_deletePos = 0;
            
            deleteShape = shape;
            isDeleteShape = true;
            deleteBzrContainer.push(struct[shape]);
            deleteBzrStructPos.push(shape);
            struct.splice(shape, 1);
            /*_max = 0;*/
            struct_num--;
            for (; z_deletePos < drawStack.length; z_deletePos++) {
                if (drawStack[z_deletePos] == "bz") {
                    varCompVal++;
                    if (varCompVal == deleteShape) {
                        break;
                    }
                }
            }
            //var index = drawStack.lastIndexOf("bz");
            deleteBzrPos.push(z_deletePos);
            drawStack.splice(z_deletePos, 1);
            return true;
        };

/********************************Brush Functionality*********************************************/
		
        /********user paint brush size**********/
        var mywidthnew = 0;
        var brushSize = new Array();
        /***************************************/

        /********user eraser size***************/
        //var eraseLength = 0;
        //var eraserLength = new Array();
        // var eraseBreadth = 0;
        /***************************************/

        var brush_c=document.getElementById("myCanvas");
		var context3=brush_c.getContext("2d");
		var clickX = new Array();
		var clickY = new Array();
		var clickDrag = new Array();
		var mouseUpCount = new Array();
		var clickColor = new Array();
		var paint;
		var initBrushX = new Array();
		var initBrushY = new Array();
		initBrushX[0] = 0;
		initBrushY[0] = 0;
		var removePoints = new Array();
		
		var isGlobalComp = new Array();
		var curTool;



function selectbrushsize() {
        $("#sizebuttons").toggle();
}   

function selecterasersize() {
        $("#erasersizes").toggle();
}

function brush(width) {
        $('#brushCanvas').css('z-index', '9999'); //enabling brush layer
        $('#eraserCanvas').css('z-index', '0');
        activeMode = "paint";
        // prevwidth = mywidthnew;
        mywidthnew=width;
    }   
        function addClick(x, y, dragging)
        {
          clickX.push(x);
          clickY.push(y);
          clickDrag.push(dragging);
          brushSize.push(mywidthnew);

          // eraserLength.push(eraseLength);
          //clickColor.push(colorPaint);
          if(activeMode == "eraser"){
            clickColor.push('rgba(0,0,0,0)');
            isGlobalComp.push(true);
          }else{
            clickColor.push(colorPaint);
            isGlobalComp.push(false);
          }
        }


        $('#brushCanvas').mousedown(function (e) {
            context3.globalCompositeOperation = "source-over";

            deleteBzrContainer.length = 0;
            deleteBzrStructPos.length = 0;
            deleteBzrPos.length = 0;
            isDeleteShape = false;

            var mouseX = e.pageX - $(this).offset().left;
            var mouseY = e.pageY - $(this).offset().top;
            if (scale == 0) {
                mouseX = mouseX - displacement.x;
                mouseY = mouseY - displacement.y;
            } else if (scale > 0) {
                mouseX = mouseX + ((canvas_x / 2) - mouseX) * zoomFactor / 50 - displacement.x;
                mouseY = mouseY + ((canvas_y / 2) - mouseY) * zoomFactor / 50 - displacement.y;
            } else {
                mouseX = mouseX - ((canvas_x / 2) - mouseX) * zoomFactor / 50 - displacement.x;
                mouseY = mouseY - ((canvas_y / 2) - mouseY) * zoomFactor / 50 - displacement.y;
            }

            if(mouseX > 0 && mouseY > 0 && mouseX < canvas_x - 5 && mouseY < canvas_y - 5){
                drawStack.push("br");
                paint = true;
                addClick(mouseX, mouseY);
                redraw();
            }
        });
        $('#brushCanvas').mousemove(function(e){
          if(paint){
            mouseX = e.pageX - $(this).offset().left;
            mouseY = e.pageY - $(this).offset().top;
            if(scale == 0){
                mouseX = mouseX - displacement.x;
                mouseY = mouseY - displacement.y;
            }else if(scale > 0){
                mouseX = mouseX + ((canvas_x/2) - mouseX)*zoomFactor/50 - displacement.x;
                mouseY = mouseY + ((canvas_y/2) - mouseY)*zoomFactor/50 - displacement.y;
            }else{
                mouseX = mouseX - ((canvas_x/2) - mouseX)*zoomFactor/50 - displacement.x;
                mouseY = mouseY - ((canvas_y/2) - mouseY)*zoomFactor/50 - displacement.y;
            }
            if(mouseX > 5 && mouseY > 5 && mouseX < canvas_x - 5 && mouseY < canvas_y - 5){
                addClick(mouseX, mouseY, true);
                redraw();
            }
          }
        });
        $('#brushCanvas').mouseup(function(e){
            paint = false;
            mouseUpCount.push(clickX.length);
            removePoints.push(clickX.length);
            initBrushX.push(clickX.length);
            initBrushY.push(clickY.length);
            brush_ctx.clearRect(0, 0, brush_ctx.canvas.width, brush_ctx.canvas.height);
            stackLength();
            redoBkpArray.length=0;
        });
        $('#brushCanvas').mouseleave(function(e){
            paint = false;
        });
        var redraw = function (){
          brush_ctx.clearRect(0, 0, brush_ctx.canvas.width, brush_ctx.canvas.height);
          brush_ctx.lineJoin = "round";
          brush_ctx.lineWidth = mywidthnew;
          
          for(var i=initBrushX[initBrushX.length - 1]; i < clickX.length; i++)
          {     
            brush_ctx.beginPath();
            if(clickDrag[i] && i){
              brush_ctx.moveTo(clickX[i-1], clickY[i-1]);
            }else{
              brush_ctx.moveTo(clickX[i]-1, clickY[i]);
            }
            brush_ctx.lineTo(clickX[i], clickY[i]);
            brush_ctx.closePath();
            if(isGlobalComp[i] == true){
                context3.globalCompositeOperation = "copy";
                // context3.clearRect(clickX[i], clickY[i], 15,15);/***previos code***/
                //context3.clearRect(clickX[i], clickY[i], eraseLength,eraseLength);
                //brush_ctx.strokeStyle = clickColor[i];
                //brush_ctx.arc(clickX[i], clickY[i], 5, 0, Math.PI * 2, false);
                //console.log("eraser");
                //console.log(isGlobalComp[i]);
                brush_ctx.strokeStyle = 'rgba(255,255,255,0.1)';
            } else {
                brush_ctx.strokeStyle = clickColor[i];
                //console.log(isGlobalComp[i]);
                context3.globalCompositeOperation = "source-over";
            }
            brush_ctx.stroke();
          }
        }


        var imagePattern = new Image();
        var pattern;
      imagePattern.onload = function() {
        pattern = brush_ctx.createPattern(imagePattern, 'repeat');
      };
      imagePattern.src = 'images/pattern.png';
/********************************************************Stack Of Drawing***/
var dummyCanvas = document.getElementById('dummyCanvas');
var ctxdummy = dummyCanvas.getContext('2d');
var z;
var l;
var canvasColors = new Array();
var stackLength = function() {
    context3.clearRect(0, 0, canvas.width, canvas.height); //context3=>id="myCanvas", canvas=>"imageCanvas"
    l=0; 
    var e = 0;
    var e_z = 0;
    var i=1;
    var k = 0;
    z = 0;
    canvasColors.length=0;
    if(_max){
        if(state == 'select' || state == 'pan'){
            for (j = 1; j < struct[_max].length; j++) {
                context2.beginPath();
                context2.arc(struct[_max][j].pos._x, struct[_max][j].pos._y, 5, 0, Math.PI);
                context2.fill();
                context2.stroke();
                /*context2.fillRect(struct[_max][j].pos._x - 5, struct[_max][j].pos._y - 5,10,10);*/
            }
        }
    }
    for(; k < drawStack.length; ){
        if (drawStack[k] == "bz") {
            context.beginPath();
            context.strokeStyle = '#000';
            for(;i<struct.length;){
                for(j = 1; j < struct[i].length - 1; j++){
                    context.moveTo(struct[i][j].pos._x, struct[i][j].pos._y);
                    context.lineTo(struct[i][j + 1].pos._x, struct[i][j + 1].pos._y);
                }
                context.moveTo(struct[i][j].pos._x, struct[i][j].pos._y);
                context.lineTo(struct[i][1].pos._x, struct[i][1].pos._y);
                
                context.beginPath();
                context.fillStyle = struct[i].fill_style;
                canvasColors.push(struct[i].fill_style);
                context.moveTo(struct[i][1].pos._x, struct[i][1].pos._y);
                for(j=2; j < struct[i].length;j++)  {
                    context.lineTo(struct[i][j].pos._x, struct[i][j].pos._y);
                }
                context.closePath();
                context3.globalCompositeOperation = "source-over";
                context.fill();
                i++;
                break;
            }
        }
        else if(drawStack[k] == "br") {
            context3.lineJoin = "round";
            for(;l < clickX.length; ) {
                context3.beginPath();
                context3.lineWidth = brushSize[l];
                if(clickDrag[l] && l){  
                  context3.moveTo(clickX[l-1], clickY[l-1]);
                 }else{
                   // context3.lineWidth = mywidthnew;
                   context3.moveTo(clickX[l]-1, clickY[l]);
                 }
                 context3.lineTo(clickX[l], clickY[l]);
                 context3.closePath();
                    if(isGlobalComp[l] == true){
                    context3.globalCompositeOperation = "destination-out";
                    //context3.clearRect(clickX[l], clickY[l], eraserLength[l],eraserLength[l]);
                    context3.strokeStyle = "rgba(0,0,0,1)";
                    context3.stroke();
                    context3.globalCompositeOperation = "source-over";
                    } else {
                        context3.strokeStyle = clickColor[l];
                        context3.globalCompositeOperation = "source-over";
				        context3.stroke();
                    }
                context3.strokeStyle = clickColor[l];
				 l++;
				 if(l == mouseUpCount[z]) {
					if(isGlobalComp[l-1] == false){
						canvasColors.push(clickColor[l-1]);
					}
					z++;
					break;
				 }
			}
		} 
				 	k++;
	}
	grayScale();
	ctxdummy.blendOnto(context3,'multiply', {sourceX:0, sourceY:0});		

	var imgd = context3.getImageData(0, 0, canvas.width, canvas.height),
	pix = imgd.data,
	newColor = {r:1,g:1,b:1, a:0};
	
	for (var i = 0, n = pix.length; i <n; i += 4) {
			var r = pix[i],
				g = pix[i+1],
				b = pix[i+2];
	
			if(pixels[i] == pix[i]){ 
				// Change the white to the new color.
				/*pix[i+3] = newColor.a;
				pix[i] = newColor.r;*/
			}
			if(pixels[i +1] == pix[i+1]){ 
				// Change the white to the new color.
				pix[i+3] = newColor.a;
				pix[i+1] = newColor.g;
			}
			if(pixels[i+2] == pix[i+2]){ 
				// Change the white to the new color.
				pix[i+3] = newColor.a;
				pix[i+2] = newColor.b;
			}
			
	}
	
context3.putImageData(imgd, 0, 0);
removeDups();
}
function grayScale() {
    imgData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        pixels  = imgData.data;
        for (var i = 0, n = pixels.length; i < n; i += 4) {
        var grayscale = pixels[i] * .3 + pixels[i+1] * .59 + pixels[i+2] * .11;
        pixels[i  ] = grayscale;        // red
        pixels[i+1] = grayscale;        // green
        pixels[i+2] = grayscale;        // blue
        //pixels[i+3]              is alpha
    }
    //redraw the image in black & white
    ctxdummy.putImageData(imgData, 0, 0);
  }
  //add the function call in the imageObj.onload

 //Below two commented by softronikx - nikhil, as moved on top, as also used near line 671
//var outputCanvasColors;
var color_data = $.getJSON("http://localhost/appolo/assets_front/js/visualizer/color.js");
function removeDups() {
	/*var i;
	len=canvasColors.length,
	outputCanvasColors=[];
	obj={};
  for (i=0;i<len;i++) {
    obj[canvasColors[i]]=0;
  }
  for (i in obj) {
    outputCanvasColors.push(i);
  }*/




  $('.used_color').html(''); 
  for (var putColor = 0; putColor < canvasColors.length; putColor++) {
    var prev = putColor-1;
    if(canvasColors[prev]!=canvasColors[putColor])
    {  	
        $('.used_color').append('<div class="rec_'+putColor+'"><li style="display: block; float: left; position: relative; width: 60px; height: 40px; background-color:'+canvasColors[putColor]+';"class="'+putColor+'"></li><div class="other_value"></div></div>');		
		
		
		console.log('Here');
		console.log('colorBzr is'+colorBzr);
		console.log('colorPaint is'+colorPaint);
		if(colorBzr == canvasColors[putColor])
		{
			$('#last_used_color_footer').html('<div class="rec_'+putColor+'"><li style="display: block; float: left; position: relative; width: 60px; height: 40px; background-color:'+canvasColors[putColor]+';"class="'+putColor+'"></li><div class="other_value"></div></div>');		
		}
        // $(".preview_image").append('<div style="display: block; float: left; position: relative; width: 60px; height: 40px; background-color:'+canvasColors[putColor]+';"></div>');
    	var y = rgb2hex(canvasColors[putColor]);
    	y = y.toUpperCase();
        var count; 
    	color_data.done(function(data) { console.log(data);
            count = 0;
    		$(data.color).each(function(index, element){
                // var categ = $('input[name=main_categ]:checked', '.colors_main_menu').val();
                // alert(categ);
    				var x = element.hex;
    			if("\""+x+"\"" == "\""+y+"\""){
                    ++count;
    				console.log(element.name);
                    if(count==1)
                    {    
        				$('div.rec_'+putColor+' div.other_value').append("<span>"+element.name+"</span>");
        				$('div.rec_'+putColor+' div.other_value').append("<span class=\"hex_code\">"+element.code+"</span>");
                         // $(".preview_image").append("<span>"+element.name+"</span>");
                         // $(".preview_image").append("<span class=\"hex_code\">"+element.code+"</span>");
                    }
                }
    		});
    	});
      }
    }
}
/**************************Dynamic color selection*****************************************/

$('#colours li, .used_color li').live('click', function () {
    colorBzr = $(this).css('background-color');
    
    if (drawStack.length != 0) {
        $(this).on('mousedown', function () {
            $('#myCanvas2').trigger('mousedown');
        });
    }
    colorPaint = $(this).css('background-color');
	console.log("Color Selected: "+colorPaint);
	//new updated code
	$('button#b4').click();
	$('button#b4').addClass('clicked');
	$('button#b4').parent().addClass('btn_fill selected');	
			
    $('#colours li, .used_color li').removeClass('selected');
    $(this).addClass('selected');
});
/************************Erase function***************************************************/
function erase(size) {
		$('#brushCanvas').css('z-index', '9999'); //enabling brush layer
		$('#eraserCanvas').css('z-index', '0');
		activeMode = "eraser";
        mywidthnew = size;
		context2.clearRect(0, 0, 665, 500);
	}	
/***********************************************************Undo Redo**/
var undo_redo_drawBkp = new Array();
var undo_redo_structBkp = new Array();
var redoBkpArray = new Array();
var mouseUpCountRedo = new Array();
var clickXredo = new Array();
var clickYredo = new Array();
var brushSizeRedo = new Array();
var clickDragredo = new Array();
var clickColorredo = new Array();
function undo() {
	context2.clearRect(0, 0, 665, 500);
	if(isDeleteShape == true && deleteBzrContainer.length != 0){
			structPosition = deleteBzrStructPos[deleteBzrStructPos.length - 1];
			deleteBzrStructPos.pop(deleteBzrStructPos.length-1);
			
			deleteBzrContainerVal = deleteBzrContainer[deleteBzrContainer.length - 1];
			deleteBzrContainer.pop(deleteBzrContainer.length-1);
			
			drawStackPosition = deleteBzrPos[deleteBzrPos.length - 1];
			deleteBzrPos.pop(deleteBzrPos.length -1);
			drawStack.splice(drawStackPosition, 0, "bz");
			struct.splice(structPosition, 0, deleteBzrContainerVal);
			struct_num++;
			stackLength();
		}
	else if (drawStack[drawStack.length - 1] == "br"){
			redoBkpArray.push(drawStack[drawStack.length - 1]);                     //////////For redo sturing the data
		 	mouseUpCountRedo.push(mouseUpCount[mouseUpCount.length - 1]);			//////////For redo sturing the data
			
			drawStack.pop(drawStack.length - 1); 
			var EndPoint = mouseUpCount[mouseUpCount.length - 1];
		 	mouseUpCount.pop(mouseUpCount.length - 1);
			
			var StartPoint;
			if(mouseUpCount.length == 0) 
			{StartPoint = 0;}
			else {StartPoint = mouseUpCount[mouseUpCount.length - 1];}
			
			for(var i=EndPoint-1; i>= StartPoint; i--){
				clickXredo.push(clickX[i]);
				clickYredo.push(clickY[i]);
                brushSizeRedo.push(brushSize[i]);
				clickDragredo.push(clickDrag[i]);
				clickColorredo.push(clickColor[i]);
				clickX.pop(i);
				clickY.pop(i);
                brushSize.pop(i);
				clickDrag.pop(i);
				clickColor.pop(i);
			}
			paint = true;
			//console.log(mouseUpCount);
			stackLength();
		
	} else {
		if(drawStack.length != 0 && drawStack.length>initial_bz){	
			redoBkpArray.push("bz");
			drawStack.pop(drawStack.length - 1); 
			undo_redo_structBkp.push(struct[struct.length - 1]);
			struct.pop(struct.length - 1);
			struct_num--;
			stackLength();
			//do_fill(drawStack.length);
			//alert("Draw Stack: "+drawStack.length);
		}	
	}
		console.log(struct.length);
}

function redo(){
	if (redoBkpArray.length != 0){
		if (redoBkpArray[redoBkpArray.length - 1] == "br"){
			drawStack.push(redoBkpArray[redoBkpArray.length - 1]); 
			redoBkpArray.pop(redoBkpArray.length - 1);
	
			var StartPoint;
			if(mouseUpCount.length == 0){StartPoint = 0;}
			else{StartPoint = mouseUpCount[mouseUpCount.length - 1];}
			var EndPoint = mouseUpCountRedo[mouseUpCountRedo.length - 1];
			
			for(var i=StartPoint; i<EndPoint; i++){
				clickX.push(clickXredo[clickXredo.length - 1]);
                clickY.push(clickYredo[clickYredo.length - 1]);
				brushSize.push(brushSizeRedo[brushSizeRedo.length - 1]);
				clickDrag.push(clickDragredo[clickDragredo.length - 1]);
				clickColor.push(clickColorredo[clickColorredo.length - 1]);
				clickXredo.pop(clickXredo.length - 1);
				clickYredo.pop(clickYredo.length - 1);
                brushSizeRedo.pop(brushSizeRedo.length - 1);
				clickDragredo.pop(clickDragredo.length - 1);
				clickColorredo.pop(clickColorredo.length - 1);
			}
			mouseUpCount.push(mouseUpCountRedo[mouseUpCountRedo.length - 1]);
			mouseUpCountRedo.pop(mouseUpCountRedo.length - 1);
			stackLength();
			
		}else {	
				drawStack.push("bz"); 
				redoBkpArray.pop(redoBkpArray.length - 1);
				struct.push(undo_redo_structBkp[undo_redo_structBkp.length - 1]);
				undo_redo_structBkp.pop(undo_redo_structBkp.length - 1);
				struct_num++;
				stackLength();
		}
	}
}

/****************************Remove paint***********************************************/
function RemovePaint() {
	//brush_ctx.clearRect(0, 0, canvas.width, canvas.height);
	//context.clearRect(0, 0, canvas.width, canvas.height);
	//context2.clearRect(0, 0, canvas.width, canvas.height);
	//ctxdummy.clearRect(0, 0, canvas.width, canvas.height);
	flag = 0;
		state = 'remove_paint';
		$('#paint_msg').show();
		/*coor_num;
		bg_col = '#DDFFDD';
		_max = 0;
		struct = new Array();
		struct_num = 1;
		selected_shapes = new Array();
		firstX, firstY, beginX, beginY, endX, endY;
		drawStack = new Array();
		clickX = new Array();
		clickY = new Array();
        brushSize = new Array();
        //eraserLength = new Array();
		clickDrag = new Array();
		mouseUpCount = new Array();
		clickColor = new Array();
		paint;
		initBrushX = new Array();
		initBrushY = new Array();
		initBrushX[0] = 0;
		initBrushY[0] = 0;
		removePoints = new Array();
		isGlobalComp = new Array();*/
}

/**************************Zooming**************************/
function zooming(action){

	nullScale(scale);
	displacement.x = 0;
	displacement.y = 0;
	
	if(action == '-' && canDec){
		scale--;
	}else if(action == '+' && canInc){
		scale++;
	}
	if(scale < limit){
		canInc = 1;
	}else{
		canInc = 0;
	}
	if(scale > -limit+1){
		canDec = 1;
	}else{
		canDec = 0;
	}
	if(scale == 1){
		zoomFactor = 10;
		scaleFactor = 1;
	}
	else if(scale == 2){
		zoomFactor = 16.8;
		scaleFactor = 2.77;
	}
	else if(scale == 3){
		zoomFactor = 21.5;
		scaleFactor = 4.6;
	}
	else if(scale == -1){
		zoomFactor = 16.5;
	}
	else if(scale == -2){
		zoomFactor = 50;
	}
	context.translate(translate_factor_dec_x * scale,translate_factor_dec_y * scale);
	context2.translate(translate_factor_dec_x * scale,translate_factor_dec_y * scale);
	brush_ctx.translate(translate_factor_dec_x * scale,translate_factor_dec_y * scale);
	ctx.translate(translate_factor_dec_x * scale,translate_factor_dec_y * scale);
	

	context.scale(1 + (scale_factor * scale), 1 + (scale_factor * scale));
	context2.scale(1 + (scale_factor * scale), 1 + (scale_factor * scale));
	brush_ctx.scale(1 + (scale_factor * scale), 1 + (scale_factor * scale));
	ctx.scale(1 + (scale_factor * scale), 1 + (scale_factor * scale));
	
	
	ctx.drawImage(img, x,y, img.width, img.height);
	stackLength();
	if(_max){
	    for (j = 1; j < struct[_max].length; j++) {
	        context2.beginPath();
	        context2.arc(struct[_max][j].pos._x, struct[_max][j].pos._y, 5, 0, 2 * Math.PI);
	        context2.fill();
	        context2.stroke();
			/*context2.fillRect(struct[_max][j].pos._x - 5, struct[_max][j].pos._y - 5,10,10);*/
		}
	}

}

function nullScale(prevScale){
	scale_dec_to_null = 1 - ( (scale_factor * prevScale) / (1 + (scale_factor * prevScale) ) );
	translate_factor_inc_x = (canvas_x -(canvas_x * scale_dec_to_null))/2 ;
	translate_factor_inc_y = (canvas_y -(canvas_y * scale_dec_to_null))/2 ;
	
	clearRect();
	
	context.translate(translate_factor_inc_x - displacement.x,translate_factor_inc_y - displacement.y);
	context2.translate(translate_factor_inc_x - displacement.x,translate_factor_inc_y - displacement.y);
	brush_ctx.translate(translate_factor_inc_x - displacement.x,translate_factor_inc_y - displacement.y);
	ctx.translate(translate_factor_inc_x - displacement.x,translate_factor_inc_y - displacement.y);
	
	context.scale(scale_dec_to_null , scale_dec_to_null);
	context2.scale(scale_dec_to_null , scale_dec_to_null);
	brush_ctx.scale(scale_dec_to_null , scale_dec_to_null);
	ctx.scale(scale_dec_to_null , scale_dec_to_null);
}


function clearRect(){
	context.clearRect(-10,-10, canvas_x + 50, canvas_y + 50);
	context2.clearRect(-10,-10, canvas_x + 50, canvas_y + 50);
	ctx.clearRect(-10,-10, canvas_x + 50, canvas_y + 50);
	brush_ctx.clearRect(-10,-10, canvas_x + 50, canvas_y + 50);
	ctxdummy.clearRect(-10,-10, canvas_x + 50, canvas_y + 50);
}

function fit(){
	nullScale(scale);
	scale = 0;
	scaleFactor = 1;
	displacement.x = 0;
	displacement.y = 0;
	ctx.drawImage(img, x, y, img.width, img.height);
	stackLength();
	state = null;
}
function pan(){
	if(scale > 0) {
		var pan_scale_state = scale;
		fit();
		var can1 = document.getElementById('imageCanvas');
		var can2 = document.getElementById('myCanvas');
		//var can3 = document.getElementById('myCanvas2');
		var can4 = document.getElementById('brushCanvas');
		var ctx1 = can1.getContext('2d');
		ctx1.drawImage(can2, 0, 0);
		//ctx1.drawImage(can3, 0, 0);
		ctx1.drawImage(can4, 0, 0);
		store_image.src = can1.toDataURL();
		if (pan_scale_state == 1){
			zooming('+');
		}else if (pan_scale_state == 2) {
			zooming('+');
			zooming('+');
		} else if (pan_scale_state == 3) {
			zooming('+');
			zooming('+');
			zooming('+');
			zooming('+');
		}
	}
	state = 'pan';
	$('#brushCanvas').css('z-index', '0');
}

var btn_grouping = document.getElementById('grouping');
btn_grouping.addEventListener('click', function () {
    $("#grouping button").toggle();
}, true);


var btn_group = document.getElementById('grp');
btn_group.addEventListener('click', do_group);
function do_group() {
    is_grouping = true;
    $('#grp').hide();
    $('#ungrp').show();
    var color_used = new Array();
    shape_grouped = new Array();
    for (i = 1; i <= struct.length - 1; i++) {
        if (color_used.indexOf(struct[i].fill_style) == -1) {
            color_used.push(struct[i].fill_style);
            var temp = { color_used: struct[i].fill_style };
            temp.pos_of_shape = new Array();
            shape_grouped.push(temp);
        }
    }
    for (i = 1; i <= struct.length - 1; i++) {
        for (j = 0; j < shape_grouped.length; j++) {
            if (struct[i].fill_style == shape_grouped[j].color_used) {
                shape_grouped[j].pos_of_shape.push(i);
            }
        }
    }
};

var btn_ungroup = document.getElementById('ungrp');
btn_ungroup.addEventListener('click', do_ungroup);
function do_ungroup(evt) {
    is_grouping = false;
    $('#grp').show();
    $('#ungrp').hide();
};

$('.btn_back').click(function () {
$('#save_msg').hide();
    if (upload_step == 1) {
    	location.reload();
        $('.btn_back').hide();
        $('.splash_copy').show();
        $('.list_items').remove();
        upload_step = 0;
        clearAll();
    } else if (upload_step == 2) {
        upload_step = 1;
        clearAll();
        $('.edit_container').hide();
        $('.container.splash_container').hide();
        $('.container.screen_two').show();
    } else if (upload_step == 4) {
    	location.reload();
        upload_step = 0;
        clearAll();
        $('.edit_container').hide();
        $('.container.screen_two').hide();
        $('.container.splash_container').show();
        $('.btn_back').hide();
    }
});
$('.btn_home').click(function () {
	location.reload();
	clearAll();
	$('.edit_container').hide();
	$('.container').show();	   
	$('.splash_copy').show();
	$('.list_items').hide();
	$('.btn_back').hide();
	location.reload();
});
function clearAll() {
    context.clearRect(0, 0, canvas_x, canvas_y);
    context2.clearRect(0, 0, canvas_x, canvas_y);
    context3.clearRect(0, 0, canvas_x, canvas_y);
    ctx.clearRect(0, 0, canvas_x, canvas_y);
    brush_ctx.clearRect(0, 0, canvas_x, canvas_y);
    flag = 0;
    classOfSelectedImage = '';
    state = null;
    _max = 0;
    struct = new Array();
    struct_num = 1;
    
    drawStack = new Array();
    
    colorBzr = "rgba(161, 164, 163, 0.5)";
    colorPaint = "rgba(161, 164, 163, 0.5)";



    clickX = new Array();
    clickY = new Array();

    brushSize = new Array();
    clickDrag = new Array();
    mouseUpCount = new Array();
    clickColor = new Array();
    paint = false;
    initBrushX = new Array();
    initBrushY = new Array();


    do_ungroup();
    fit();
};

/***************************PreviewImage***********/
function previewImage () {
	$('.overlayImage').show();
	//fit();
	var can1 = document.getElementById('imageCanvas');
	var can2 = document.getElementById('myCanvas');
	//var can3 = document.getElementById('myCanvas2');
	var can4 = document.getElementById('brushCanvas');
	var ctx1 = can1.getContext('2d');
	ctx1.drawImage(can2, 0, 0);
	//ctx1.drawImage(can3, 0, 0);
	ctx1.drawImage(can4, 0, 0);
	var x = new Image();
	x = can1.toDataURL();
	document.getElementById('preview_image').src = x;
	$('.preview_image_div').show();
	var get_list = $('.used_color_div .used_color').clone();
	$('.preview_image .used_color').remove();
	$('.preview_image').append(get_list);
}

function closeOverlay () {
	$('.overlayImage').hide();
	$('.preview_image_div').hide();
	$('.noShapeAlert').hide();
}

/****************************************************************Print Function*/
$(function() {
    $("#hrefPrint").click(function() {
    previewImage ();    
	//fit();
	/*var can1 = document.getElementById('imageCanvas');
	var can2 = document.getElementById('myCanvas');
	var can4 = document.getElementById('brushCanvas');
	var ctx1 = can1.getContext('2d');
	ctx1.drawImage(can2, 0, 0);
	ctx1.drawImage(can4, 0, 0);
	var x = new Image();
	x = can1.toDataURL();
	document.getElementById('preview_image').src = x;*/
    //$(".preview_image").append("<div class='printable'>this is demo text to test the printing of the element in html.</div>");
		// Print the DIV.
		//$(".preview_image").print();
        PrintDiv();
		return (false);
	});
});

/****************************************************************************/

function demo() {
	//resetDemo();
	Pixastic.process(document.getElementById("demoimage"), "brightness", {
	brightness : $("#value-brightness").val(),
	contrast : $("#value-contrast").val(),
	sharp : $("#value-amount").val()
	});
	Pixastic.process(document.getElementById("demoimage"), "sharpen", {
				amount : $("#value-amount").val()
	});
}

function resetDemo() {
        Pixastic.revert(document.getElementById("demoimage"));
        $("#slider-brightness").slider( "value", 50 );
        $("#slider-contrast").slider( "value", 50 );
        $("#slider-amount").slider( "value", 50 );
        $("#value-brightness").val(0);
        $("#value-contrast").val(0);
        $("#value-amount").val(0);
    }
    
    $(document).ready(function(){
		$("#slider-brightness").slider({
		slide: function() {
		$("#value-brightness").val(Math.round($("#slider-brightness").slider("value") / 100 * 300) - 150);
		demo();
		}, value : 50
		});
		$("#slider-contrast").slider({
		slide: function() {
		$("#value-contrast").val( (($("#slider-contrast").slider("value") / 100 * 4)-1).toFixed(1));
		demo();
		}, value : 50
		});
    	$("#slider-amount").slider({
			slide: function() {
			$("#value-amount").val(($("#slider-amount").slider("value") / 100).toFixed(2));
			demo();
			}, value : 50
		});
    	
    	Pixastic.process(document.getElementById("demoimage"), "brightness", {
    		brightness : $("#value-brightness").val(),
    		contrast : $("#value-contrast").val(),
    		sharp : $("#value-amount").val()
    		});
		
		//new updated code (1-3-2015, Softronikx)
		/*$("#slider-brightness").mouseup(function(){
			demo();
		});
		$("#slider-contrast").mouseup(function(){
			demo();
		});
		$("#slider-amount").mouseup(function(){
			demo();
		});*/
		
    });
	
function edit_the_image() {
	$('.overlayImage').show();
	$('#tabdemo').show();
}

function doneDemo() {
	$('.overlayImage').hide();
	$('#tabdemo').hide();
	//new updated code
	$('#create_shape').show();
	$('#remove_shape').show();
	
	var image_can = document.getElementById('demoimage');
	var image_ctx = image_can.getContext('2d');
	var get_img_ = image_ctx.getImageData(0, 0, canvas.width, canvas.height);
	ctx.putImageData(get_img_, 0, 0);
	var can1 = document.getElementById('imageCanvas');
	img.src = can1.toDataURL();
	resetDemo();
}

$('.ui-slider-range').mousedown(function() {
      return false;
});
$('.ui-slider-handle').mousedown(function() {
      return true;
});

 function PrintDiv() {    
           var divToPrint = document.getElementById('print_div');
           var popupWin = window.open('', '_blank');

           $("#print_div li").each(function(){
            var color = $(this).css("background-color");
            $(this).css({
                "height":"0px",
                "width":"0px",
                "border":"25px solid "+color,
            });
           });
			console.log("print Div was clicked");
           popupWin.document.open();
           popupWin.document.write('<html><head><link href="style.css" type="text/css" rel="stylesheet" /><link href="print.css" type="text/css" rel="stylesheet" media="print" /></head><body onload="window.print()"><div class="header"><img style="margin-top:0;" src="images/header_logo_print.jpg"></div>' + divToPrint.innerHTML + '<div class="footer_text"><p><strong>Note:-</strong> The shades shown are for indicative purpose only. Please refer to Asian Paints Color Palette for actual shade reference.</p><h3>www.asianpaintsnepal.com</h3></div></html>');
            popupWin.document.close();
                }
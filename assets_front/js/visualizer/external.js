// JavaScript Document

$(function(){
		   
	
if (!window.console) window.console = {};
if (!window.console.log) window.console.log = function () { };

/************************** Color change on select *********************
$('.dropdown select#color_sel_new').change(function(){
		$('.outer').html('');
		var color_value = $(this).val();
			function getColor(color_value) {
				$.getJSON( "http://realpixel.in/asian-paintshttp://localhost/appolo/asset_front/js/visualizer/color.js" )
				.done(function(data) {
				
				console.log( 'success' );
				console.log( data[color_value][0].hex );
				for (var i = 0; i < data[color_value].length; i++) {
				$('.outer').append('<li style="background-color:'+data[color_value][i].hex+';"title="'+data[color_value][i].name+'"></li>');
				}
				})
				.fail(function() {
				console.log( "err");
				});
			}
		getColor(color_value);
		
		var divs = $("div.outer > li");
			for(var i = 0; i < divs.length; i+=7) {
			  divs.slice(i, i+7).wrapAll("<ul class='new'></ul>");
			}
		var totalWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
		$('div.outer').width(totalWidth);

});

**/
	var main_cat;

	function appendCategory(main_cat)
	{
            
		$.getJSON( "http://localhost/appolo/assets_front/js/visualizer/color.js" ).done(function(data) {

			$("#color_sel_new").html('');

    		for(var i=0; i < data.color.length; i++)
    		{
    			if(data.color[i].mainCat == main_cat)
    			{
    				if((i < (data.color.length)-1) && data.color[i].subCat != data.color[i+1].subCat ) 
    					$("#color_sel_new").append("<option>"+data.color[i].subCat+"</option>");
    				else if((i == (data.color.length)-1))
    					$("#color_sel_new").append("<option>"+data.color[i].subCat+"</option>");
    			}
    		}

    	setDefaultColor();	

    	}).fail(function(error) {
		console.log( "err"+error);
		});	
	}
	
	$(".colors_main_menu p").click(function() 
	  {
             
		$(".colors_main_menu p").css("color","#777779");
		$(this).css("color","#f17128");
		main_cat = $(this).attr("id");
	
		appendCategory(main_cat);
	
		returnMatchedbook(main_cat);
		
	   });
	  
	  $(".colors_main_menu p:first").trigger("click");

/*************** checking other option for select color**********************/
 //function returnMatchedbook() 
 function returnMatchedbook(main_cat) 
 {
	 
		$.getJSON( "http://localhost/appolo/assets_front/js/visualizer/color.js" ).done(function(data) 
		{
			$('.outer').html('');
  			category_check = $('select#color_sel_new').val();
			console.log( category_check );
         	for(var i = 0; i < data.color.length; i++) 
			{			  
				if(data.color[i].mainCat == main_cat)
				{	
					if(data.color[i].subCat == category_check ) {
						//console.log(data.color[i].name);
						$('.outer').append('<li style="background-color:'+data.color[i].hex+';"title="'+data.color[i].name+'"></li>');
						//return book[i];						
					}
				}
   		 	}
			
			var divs = $("div.outer > li");
			var addId = 1;
			for(var i = 0; i < divs.length; i+=28) {
			  divs.slice(i, i+28).wrapAll("<ul class='new' id="+ addId +"></ul>");
			  addId++;
			}
			
			var totalWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
			console.log(totalWidth);
			$('div.outer').width(totalWidth);
		})
		.fail(function() {
			console.log( "err");
		});
 }
 
 
 
$('.dropdown select#color_sel_new').on('change', function()
{
	//console.log(category_check);
	returnMatchedbook(main_cat);
	$('div.outer').css('left','0');
});
/*************** checking other option for select color ends here**********************/

/************************** Color change on select ends *********************/
/************************** Set default Color ********************/
function setDefaultColor() {
    
		$.getJSON( "http://localhost/appolo/assets_front/js/visualizer/color.js" )
		.done(function(data) {  
			var defaultColor_value = $('.dropdown select#color_sel_new').val();
			for (var i = 0; i < data.color.length; i++) {
				 if(data.color[i].subCat == defaultColor_value ) {
					$('.outer').append('<li style="background-color:'+data.color[i].hex+';"title="'+data.color[i].name+'"></li>');
				 }
			}
			var divs = $(".outer > li");
			var addId = 1;
			for(var i = 0; i < divs.length; i+=28) {
			  divs.slice(i, i+28).wrapAll("<ul class='new' id="+ addId +"></ul>");
			  addId++;
			}
			
			var totalWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
			$('div.outer').width(totalWidth);		
			$('div.outer').css('left','0');
		})
		.fail(function() {
			console.log( "err");
		});
}
//setDefaultColor();
/************************** Set default Color ends *********************/

//"8198" -> Test By Nikhil
$( "#search-color-input" ).autocomplete({
  source: // JavaScript Document
 [ "Orchad Plum-8198",	"Deep Pool-9206",	"Mix Blue-9214",	"Emphais-7357",	"Aqura Young-9207",	"Classic Blue-9190",	"Bing Blue-9205",	"Hidden Springs-7358",	"Blue Edition-9213",	"Twilight Zone-7325",	"Prussian Blue-7341",	"Oriental Blue-1306",	"Blooming Blue-9189",	"Ink Blue Sky-9165",	"Soothing Sapphire-7326",	"Platinum Blue-9141",	"Blue Chase-9149",	"Autumn Shower-7381",	"Carbon Flint-8269",	"Navy Blue-9197",	"Imperial Blue-7245",	"Pluto-7301",	"Stormy Sky-9181",	"Armanda-0U29",	"Monsoon Sky-9157",	"Nautical Code-9173",	"Tranquil Blue-9215",	"Waikiki-7342",	"Ashberry-7366",	"Rare Blue-9166",	"Caspian Sea-7294",	"Mystic Dream-7293",	"Windsor Blue-9198",	"Blue Lake-8262",	"Thunder Cloud-8261",	"Ink Grey-8270",	"Blue Fragrance-9191",	"Mughal Blue-7359",	"Picturesque-9208",	"Lost Blue-9182",	"Pleasant Lake-7302",	"Lucky Sapphire-9150",	"Dusk Blue-7382",	"Ink Blue-7246",	"Dynamic-9158",	"Icy Burgundy-9174",	"Blue Stone-9199",	"Fairy Blue-9142",	"Moody Purple-9175",	"Inkjet-7327",	"Blue Illusion-9167",	"Stormy Sea-7303",	"Blue Clover-1218",	"Rapid Flow-9183",	"Storm Blue-7367",	"Firament-7343",	"Deep Sea Blue-9159",	"Icy Chill-9216",	"Granite-0630",	"Slow Thunder-9184",	"Out Of The Blue-9151",	"Calming Blue-9200",	"Piece Of Sky-7304",	"Greek Vase-7328",	"Window Blue-9143",	"Smoke Grey-6134",	"Picture Perfect-7295",	"Water Jet-9209",	"Cloud Scoop-9177",	"Cloud Scoop-9177",	"Foggy Dash-9176",	"Voltage-8264",	"Wedgerwood-0U42",	"Grape Spread-9160",	"Blue Glory-7247",	"Gentle Eyes-9192",	"Blue Effect-9168",	"Thunder Bay-7368",	"Blue Curacao-7360",	"Blue Pottery-7271",	"Mild Splash-9185",	"Classic Vase-9152",	"Far Horizons-7296",	"Morning Frost-7361",	"River Blue-9161",	"Gauguin Blue-7344",	"Marine Coast-9201",	"Clear Morning-9144",	"Peaceful Blue-9193",	"Blue Horizon-8272",	"Brook View-8265",	"Pristine Blue-9169",	"Blue Bay-7329",	"Corscian Sky-7305",	"Ink Water-9217",	"Dolphin Dance-7384",	"Harbor Fog-7369",	"Washed Indigo-7272",	"Blue Charm-7248",	"Splash-7345",	"Uniform Blue-9162",	"Blue Sway-9153",	"Grand Bay-8273",	"Soft Blue-9210",	"Bali Blue-8266",	"Pale Blue-9202",	"Sea Ridge-7370",	"Blissful Blue-7297",	"Sky Scapes-9145",	"Sky Watch-7362",	"Feather Blue-9186",	"Scuba Blue-7273",	"Brazen Breeze-7385",	"Surf-9194",	"Aqua Fresh-9218",	"Serene Blue-9154",	"Young Boy Blue-7330",	"Morning Sky-7249",	"Quiet Refuge-7306",	"Cloud Blue-9170",	"Summer Sky-7274",	"Fusion Sky-9219",	"Water'S Edge-8274",	"Blue Saint-9178",	"Blank Slate-7386",	"Sail Away-7298",	"Sea Blue-9146",	"Water Rapids-7371",	"Plain Bliss-9163",	"Young Bloom-7346",	"Instant Chill-9187",	"Sensibility-8267",	"Brezzy Blue-9155",	"Winter Sky Light-9203",	"Zephyr-9195",	"Pool Party-7250",	"Light Sky-7331",	"Alliance-1203",	"High Spirits-7363",	"Faint view-9147",	"Blue Dawn-7275",	"Gentle Blue-1276",	"Seagull-9188",	"Classic-1243",	"Blue Blaze-9171",	"Spring Time-9211",	"Soft Stream-9156",	"Clear Sky-8275",	"Tracing Blue-9220",	"Faraway Blue-9179",	"Bird Bath-7347",	"Mountain Spring-9164",	"Cool Crystal-N-0977",	"Blue Smoke-9172",	"Star gaze-7364",	"Phantom Lake-7372",	"Snow Drop-9204",	"Frost Blue-9180",	"Fairytale-7251",	"Spring Thaw-7388",	"Dissappear-9196",	"Surfs Up-7308",	"Spring Dew-7348",	"Brush Stroke-7276",	"Mirage White-8276",	"Indigo Breeze-9148",	"Dew Drop Day-9212",	"Snow Princess-7332",	"Jet Stream-7300",	"Blue Harmony-7252",	"Blue Dome-7405",	"Peacock Blue-N-0161",	"Perennial Glade-7525",	"Elm Grove-7453",	"Deep Turquoise-7501",	"Green Lantern-7549",	"Dream Scapes-7430",	"Jungle Trial-7565",	"Citadel-7406",	"Rustic Turquoise-7438",	"Country Green-7550",	"Emerald Satin-7502",	"Bright Jade-7510",	"Emerald Accent-7509",	"Blade Of Grass-7566",	"Valley Green-7511",	"Teal Biast-7503",	"Deep Teal-7454",	"Thickest-7485",	"Meadow Path-7541",	"Night Edition-7423",	"Twilight Sea-7439",	"Farm Fresh-9269",	"Jade Green-2435",	"Cool Lagoon-7477",	"Cilantro-7581",	"Reef Green-7469",	"Azure Sky-7407",	"Cape Royal-8341",	"Deep Jungle-7557",	"Jade Impact-7526",	"Blue Mountain-9221",	"Blue Ivy-9245",	"Plantation-9285",	"Garnish-9277",	"Deep Sea-7413",	"Lush Green-9270",	"Fresh Fern-9261",	"Teal Magic-7470",	"After Dark-9229",	"Black Sea-9469",	"Night Sky-9237",	"Emerald valley-7542",	"Green Tropics-7486",	"Subtle Green Scape-9246",	"Dense Forest-9253",	"Blue Revive-9222",	"Caress Green-9278",	"Little Creek-7606",	"Abyss-8365",	"Isle of Capri-7414",	"White Wine-7558",	"Aquamarine-2357",	"Monsoon Leaf-9238",	"Maritime Green-7455",	"Classic Cyan-9230",	"Mehendi-N-2361",	"Malabar Hills-7478",	"Patch of Blue-7431",	"Herbal Green-9271",	"Lake Moss-9262",	"Murky Green-9254",	"Deep Blue-9223",	"Ice Cabbage-7551",	"In The Shade-9247",	"Running Stream-7408",	"Serende-9286",	"Lakeside-9231",	"Green Sprouts-7582",	"Green Haven-7527",	"Still Blue-7487",	"Caribbean Green-7512",	"Breeze Up-9279",	"Dark Cloud-8366",	"Blazing Blue-9471",	"Reviving Sea-9239",	"Prairie Green-7471",	"Jade Hut-7543",	"Blueweed-9232",	"Olive Path-7622",	"Terrace Garden-7607",	"Country Walk-9263",	"Swan Song-7440",	"Continental Green-7479",	"Ocean Breeze-7504",	"Conifer-7559",	"Steel Mesh-7415",	"Natural Tease-7583",	"Rustic Twist-9255",	"Farm Wash-9287",	"Green Wave-9272",	"Twilight Blue-9224",	"Coastal Green-9248",	"Light Sabre-7552",	"Green Shadow-8367",	"Blue Vision-7432",	"Sky Dark-9472",	"Aqua Shower-7456",	"Paradise Bay-7409",	"Magic Blue-7441",	"Sea Extract-9280",	"Transclucent Green-7513",	"Surf Green-0266",	"Steel Gleam-8343",	"Vitality-7478",	"Green Meadow-7528",	"Turquoise Treat-7505",	"Opaline Green-2463",	"Still Aqua-7480",	"Elf Green-7544",	"Dusk-9233",	"Peace Park-9273",	"Riverdale-9264",	"Central Sea-9249",	"Laguna Beach-7560",	"Mild Sea-9240",	"Snow Bell-7553",	"Aquarium Blue-9225",	"Winter Grass-9256",	"Pigeon Blue-N-0122",	"Pleasant Blue-7457",	"Forest Canopy-7608",	"Fairytale Green-9281",	"Musical Green-9288",	"Poplar Green-7584",	"Iced Kiwi-7569",	"Mist-9234",	"Tidal Wave-7488",	"Tropical Sea-7416",	"Coastal View-7473",	"Silver Spring-9473",	"Wild Mint-7545",	"Island Green-9265",	"Sea Life-7529",	"Sea Surf-7442",	"Tanned Green Skin-9257",	"Whisper-9241",	"Mint Away-9274",	"Green Pastures-7609",	"Teal Swirl-7481",	"Mystic Lake-8344",	"Fast Breeze-9226",	"Dry Sage-7625",	"lake View-7561",	"New Day-7410",	"Hurricane-8369",	"Spruce Up-9250",	"Manor Blue-N-0195",	"Revival Green-7489",	"Outhouse-9289",	"Marine Green-7514",	"Exotica-9282",	"Aqua Fusion-7506",	"Rhine Blue-1319",	"Mauritius-7458",	"Mint Cocktail-7530",	"Lotus Pond-7554",	"Ivy League-7565",	"Poaddy Field-7570",	"Sea Shades-9474",	"Climbing Fern-7546",	"Ripple Effect-9258",	"Land'S End-7610",	"Sea Dreams-8345",	"Tropical Wave-9235",	"Forest Hike-7625",	"Virgin Blue-9242",	"Soft Hills-9266",	"Sea Nymph-7562",	"Fair Blue-9227",	"Green Dream-9290",	"Sparkling Water-7482",	"City Sky-7418",	"Gulf Of Aden-7490",	"Sweet Whisper-9283",	"Sapphire Ice-7474",	"Rain Mist-8372",	"Icy Cool-9251",	"Mint Blue-7435",	"Mint Crush-7547",	"Folaige Blue-7459",	"Baby Aqua-7507",	"Green Icicle-7515",	"Blue Light-7531",	"Spring Meadow-7586",	"Misty Harbour-8346",	"Nautilus-7411",	"Eternity-9267",	"Inner Peace-7443",	"Teal Twist-7555",	"Shining Blue-9476",	"Scenic Blue-9243",	"Solitude-9228",	"Iced Teal-7483",	"Dew Drop-0299",	"Alluring Sky-9259",	"Spring Shower-9236",	"Ice Pack-7611",	"Green Grove-9291",	"Mystical  Waters-9252",	"Sea Horse-7475",	"Cascade-0210",	"Fresh Mint-7516",	"Ocean Whisper-7436",	"Crystal River-7460",	"Valley Mint-7532",	"Subtle Green-7508",	"Dawn Of Spring-7563",	"Waterfall-0G23",	"Soft Touch-7571",	"Tear Drop-9244",	"Caribbean Sky-7419",	"Silver Crescent-0973",	"Glint Of Green-9260",	"Green Whisper-2425",	"Sweet Shine-9268",	"Spring Well-9284",	"Burst Of Green-9292",	"Mystical Green-9276",	"Ocean Cliffs-8348",	"Mainstream-7491",	"Summer Song-7564",	"Bay Breeze-7476",	"Soft Whisper-9476",	"Alpine Green-7588",	"Whispering Breeze-7412",	"Barrier Reef-7612",	"Sail Boat-7444",	"Alpine-1205",	"Zen Mist-7556",	"Quiet Lake-7572",	"Meadow Mist-7492",	"Cosmic Dust-8348",	"Sky Mimic-7420",	"Spirit Wind-8372",	"Oasis-9275",	"Raven Song-8253",	"Tar Road-8245",	"Mineshaft-8285",	"Midnight Oil-8333",	"Carbon Copy-8293",	"Antimony-8309",	"Watestone-9477",	"Coal Mine-8301",	"Burnt Malt-8229",	"Eclipse-8325",	"Rocky Terrain-9478",	"Charcoal Shadow-8286",	"Silent Night-8254",	"Iron Ore-8310",	"Deep Mine-8246",	"On The Banks-9479",	"Bentonite-8230",	"Moonless Sky-8334",	"Solemn Grey-8302",	"Dark Shadow-8294",	"Moor Lands-8326",	"Dusk Cloud-8287",	"Roman Stone-8311",	"Stone Path-8255",	"Washed Steps-9480",	"Whale Cove-8247",	"Shadow Dance-8303",	"Muted Grey-8231",	"Burnished Grey-8327",	"Flipper-8335",	"Gothic Grey-8312",	"Moon Crater-8248",	"Stone Age-8288",	"Grey Matter-8304",	"Oxford Grey-8328",	"Sleigh Bells-8295",	"Dark Water-8336",	"Raining Grey-9481",	"Elegant Grey-8232",	"Electricity-8256",	"Raw Steel-8313",	"Diamond Blade-8329",	"Cold Flint-8289",	"Metallic Grey-8296",	"Steel Grey-0643",	"Pigeon Grey-8233",	"Pilgrim-6129",	"Smoke-N-0616",	"Silver Glaze-9482",	"Winter Sky-8314",	"Platinum Disc-8297",	"Nimbus Shower-8330",	"Steel-6142",	"Fleecy Coat-8234",	"Silver Grey-0615",	"Armour-N-0686",	"Ash Grey-0603",	"Rhinestone-0740",	"Clear Sky Night-9483",	"Grey Flannel-8331",	"Ocean Cruise-8339",	"Silver Trinket-8298",	"Winter Moon-8258",	"Quicksilver-8307",	"Aluminium-8337",	"Tiara-0978",	"Smooth Flow-9484",	"October Sky-8251",	"December Frost-0956",	"Ice Age-8299",	"Whispering Smoke-8308",	"Silica Dream-8235",	"First Frost-8316",	"Autumn Day-8252",	"Ice Grey-8259",	"Confetti-8300",	"Snowflake-8332",	"White Gold-8292",	"Iced Silver-8263",	"Camphor-8260",	"Jolly Holly-7653",	"Crayon Green-9293",	"Salad Green-9301",	"Fresh Leaf-9309",	"After Rain-9493",	"Gemstone-9333",	"Frost Green-9294",	"Fallen Leaves-9501",	"Enchanted Forest-8389",	"Shade Leaf-9317",	"Garden Party-8381",	"Dark Drama-7677",	"Grassland-9325",	"Cool Green-9302",	"Wild Green-9486",	"Frosty Vale-9494",	"Leafy Shade-9502",	"Tanned Green-9397",	"Peace Meadow-9310",	"Tea Leaf-8421",	"Bamboo Grove-8405",	"Parrot Green-7661",	"Gulf Stream-7669",	"Leaf Stalk-9487",	"Banyan Grove-8413",	"Side Park-9318",	"Ming Jade-7685",	"Celery-9334",	"Rare Herbs-9517",	"Lemon Leaf-9326",	"Winter Outing-9495",	"Hillside Green-8390",	"Natural Mint-9295",	"Seasoning-7654",	"Broccoli-9341",	"Seaside Green-9303",	"Smoked Green-8422",	"Spring'S Eve-8398",	"Spring Delight-8382",	"Green Shadow Play-9488",	"Crystal Green-9496",	"Garland-7781",	"Green Pastures Vale-9518",	"Mossy Bark-8414",	"Willow Song-8477",	"Lime Life-9311",	"Green Dusk-8406",	"Nature'S Rest-9503",	"Camouflage-9389",	"Earthly Green-9319",	"Green Valley-8391",	"Fresh Olive-7725",	"Wet Grass-9349",	"Charteuse-7709",	"Batik Green-7678",	"Green Lawns-7845",	"Deep Dive-9327",	"Misty Hills-8383",	"Autumn Gold-0254",	"Water Cress-9342",	"Rich Olive-9381",	"Courtyard-9519",	"Vivid Green-7717",	"Palm Groove-9335",	"Herbal Spa-8415",	"Scenic View-7686",	"Garden Cress-7670",	"Cozy Cabin-8509",	"Bay Leaf-8478",	"Garden Fresh-9357",	"Lasting Spring-9350",	"Rucksack Green-8392",	"Monsoon Mood-9320",	"Fresh Moss-9390",	"Cool Water-8407",	"Hidden Hills-7662",	"Green Gold-0342",	"Bay View-9489",	"Tender Glow-9304",	"Grey Cloud-8423",	"Precious Stone-9497",	"Amazon Trail-7655",	"Bambi Beige-7790",	"Mist Flower-8399",	"Spinach Soul-7718",	"Pampas-8501",	"Cedar Lake-7687",	"Moody Green-8416",	"Biscuit-9520",	"Turtle Shell-8479",	"Sky Dive-9504",	"Mix Fruit green-9382",	"Green Silence-8384",	"Shrub Green-9391",	"Green Pond-9312",	"Asparagus-7805",	"Lemon Blast-9365",	"Pineview-8400",	"Cascade Green-2370",	"Golf Greens-7765",	"Plum Green-9321",	"Green Salad-7726",	"Vitamin Green-9305",	"Rock Wall-8424",	"River Bank-9343",	"Green Melody-9328",	"Green Light-9351",	"Mellow Green-9297",	"Retro Avocado-7791",	"Lake Placid-7679",	"Green Apple-7710",	"Kitchen Garden-7821",	"Henna-2430",	"Pleasant Grove-9296",	"Jungle Leaf-9336",	"Majestic Mountain-7688",	"Woodlands-8408",	"Svelte Leather-8510",	"Salmon Green-7837",	"Rainy Forest-9845",	"Olive Oil-7846",	"Lemony-9358",	"Aloe Vera-7663",	"Window View-9392",	"Beach Comber-8480",	"Sporting Green-7741",	"Greenery-7806",	"Hidden Ravine-8393",	"Pacific Sea-9313",	"Bottled Olives-8502",	"First Leaf-9373",	"Water Puddle-9490",	"Dense Woos-8385",	"Balcony View-9360",	"Camelot-7792",	"Valley Watch-9505",	"Droplet-9322",	"Apple Tree-9329",	"Gold Mine-7885",	"Spring Grass-7719",	"Diced Olive-7784",	"Clay-9521",	"Sultry-9383",	"Marble Quarry-8425",	"Song Of Nature-8401",	"Dropping Leaves-9366",	"Mint Ice-9337",	"Herb Bouquet-8417",	"Organic Green-7766",	"Lime Accent-7727",	"Silent Sea-9306",	"Forest Whisper-7656",	"Garden Moss-7689",	"Burst Of Lime-7742",	"Exotic Spa-9298",	"Sweet Celery-7807",	"Dream Weaver-8409",	"After Shower-9498",	"Lick Of Lime-7711",	"Barefoot Beach-8503",	"Soft Moccasin-8511",	"Ginger Ale-7847",	"Sunny Pastures-9359",	"Esay Green-9352",	"Fruitful Green-9374",	"Dry Leaf-9393",	"Playful Green-9314",	"Milky Green-9384",	"Gren Mist-9506",	"River Cruise-7680",	"Sound Of Nature-7672",	"Melted Mint-9491",	"Pepper Leaf-8386",	"Open Orange-7853",	"Safari Green-7785",	"Green Beret-7838",	"Young Green-7808",	"Green Riple-9323",	"Ripe Olive-7877",	"Botanica-7886",	"Grazing Land-8394",	"Sage Sensation-7664",	"Almond Sand-8512",	"Jungle Cane-7793",	"Iced Cucumber-7657",	"Wood Fence-8504",	"Sunshine Green-9375",	"Winter Wow-9307",	"Spring Beauty-7822",	"Tender Coconut-9338",	"Citrus-9367",	"Countryside-0G15",	"Fernwood-8402",	"Habitat-7720",	"Inspiring Green-7720",	"River Sand-9522",	"Stone Steps-8426",	"Quiet Hour-8410",	"Forest-8418",	"English Elms-2387",	"Pine Cone-7887",	"Pristine Green-9353",	"Blooming Day-9499",	"Snappy Green-7712",	"Spring Surprise-7728",	"Harvest Season-7767",	"Lemon Souffle-7773",	"Peppy Lime-7743",	"Tender Leaf-9299",	"Sunshine Sand-9394",	"Forest Foliage-7690",	"Placid Green-9347",	"Green Sleeves-N-2420",	"Blooming Season-9376",	"Beach House-8481",	"Crisp Lettuce-7665",	"Sun Shadow-7878",	"Summer Fern-7829",	"Chinese Tea-7809",	"English Scape-9507",	"Cliffside-7786",	"Lasting Freshness-9344",	"Pale Moss-7721",	"Pebble Moss-7879",	"Pista Glimmer-8403",	"Pastel Frog-9346",	"Sea Spray-9315",	"Sea Kelp-7854",	"Windswept-8395",	"Sky Level-9492",	"Minty Ale-8419",	"Pistachio-9385",	"Mountain Stream-8387",	"Misty Spring-7658",	"Ginger Root-7888",	"Beige Accent-8505",	"Musk Melon-7839",	"Italian Olive-7823",	"Sweet Lime-0758",	"Faint Green-9331",	"Tropics-8513",	"Soft Wash-9330",	"Lime Grove-7729",	"Mint Spray-9377",	"Festivity-7774",	"Eternal Green-9324",	"Echo Of Spring-7674",	"Calm Fauna-7768",	"Spring Fields-7682",	"Grey Buck-8482",	"Wonderful View-9508",	"Tech Green-7775",	"Tropical Temptations-9339",	"Spring Green-9308",	"Pearl Cream-9395",	"Cream Drop-9523",	"Garden Frolic-7824",	"Glimpse Of Spring-7722",	"Tree Of life-7691",	"Radium Green-9354",	"Lime Squash-7713",	"Crusade-N-0684",	"Natural Tinge-7879",	"Green Topping-9386",	"Mystical Mist-8411",	"Snowy Green-9361",	"Lime Delight-7744",	"Spring Valley-9300",	"Dry Moss-7810",	"Through The Blinds-9500",	"Neon Light-7776",	"Green Tomato-7730",	"Divine Wine-7840",	"Vigin Mountain-8396",	"Spring Bud-9332",	"Green Cresceno-9369",	"Apple Cream-9378",	"Scarf Green-9362",	"Mint Water-9370",	"Celadon-0W50",	"Fresh Sprout-7777",	"Inca Ruins-7855",	"Banana Cream-7850",	"Spring Frolic-7787",	"Meadow Grass-7825",	"Misty Vale-0946",	"Mild Cream-0358",	"Dusty Trail-8506",	"Sweet Corn-4214",	"Venetian Green-0262",	"Flowing Green-7659",	"Tapestry-0972",	"Dainty Dew-9316",	"Green Glade-7769",	"Grassy Path-7666",	"Cucumber Salad-7745",	"Serene Valley-7675",	"Jade Isle-8404",	"Welcome Spring-9363",	"Nursery Green-9355",	"Alto-N-2353",	"Peace-2467",	"Leisure Walk-9524",	"Breezy Day-9387",	"Rich Vanilla-9396",	"Seasonal View-9379",	"Spring Breeze-7723",	"Fringe  Green-9340",	"Tranquil Grenn-8388",	"Cashmere-N-3119",	"Aquatic Green-9388",	"Springdale-7770",	"Lemonade-7830",	"Touch Of Spring-N-3226",	"Ivory Coast-3165",	"Repose-7684",	"Winter Nip-7660",	"Honey Mustard-7880",	"Limon-7778",	"Green Republic-7676",	"Goldilocks-7856",	"Natural Cream-8483",	"Glacier Ridge-8428",	"Spring Sunshine-9364",	"Mineral Green-9348",	"Wedge Of lime-7746",	"Forest Musk-7667",	"Sisal Mat-7890",	"Brazen Gold-7831",	"Pale Coast-9372",	"Soft Spring-9380",	"New Green-7724",	"Luminous-7715",	"Hermit Shack-7826",	"Falling Mist-9371",	"Fresh Start-9356",	"Avalanche-8412",	"Pine Nut-3196",	"White Marsh-7812",	"Lakeshore-7779",	"Hushed Hue-7771",	"Moon Beam-0949",	"Corn Field-7841",	"Stately Garden-7827",	"Jamine Wisp-N-0943",	"Lemon Twist-7716",	"Lemon Grass-7747",	"Misty Meadow-7668",	"Pinepapple-N-0399",	"Wheat Sprig-7891",	"Golden Apple-7832",	"Daybreak-0942",	"Soft Glance-8484",	"Burst Of Spring-7772",	"Yellow Suds-7857",	"Pale Ivory-7892",	"Touch of Beige-8508",	"Yellow Synergy-7842",	"Margarine-7843",	"Spirit Island-7828",	"Green Wisp-7780",	"Lily Pad-7788",	"Soft Focus-7748",	"Solemon Yellow-7882",	"Lime N' Honey-7858",	"Thick Cream-7860",	"Lemon Pie-7859",	"Mild Yellow-7844",	"Soft Fern-7732",	"Vanilla Ice-7836",	"Cream Caress-7835",	"Golden Gleam-7834",	"Soft Linen-7884",	"Whipped Cream-7883",	"Sunkissed-7833",	"On The Rocks-9453",	"Bravo-8429",	"Moss Land-8469",	"Caffeine-8653",	"Oak Wood-9509",	"Earthen Wave-9541",	"Arctic Shadow-9454",	"Burnt Metal-8437",	"Golden pint-9510",	"Olive Green-8493",	"Stone Creek-8461",	"Rich Chocolate-8645",	"Mocha Mousse-8453",	"Moody Maroon-4181",	"Brick Brown-9533",	"Brown Soil-9525",	"Grey Blast-8438",	"Stoic Grey-8430",	"Choco Fudge-9542",	"Nut Brown-N-0419",	"Frosted Chocolate-8654",	"Riverbed Sand-8462",	"Igneous Rock-8470",	"Mud Brown-9511",	"Cafatte-8549",	"Brown Bread-9526",	"Rolling Stone-8431",	"Face Pack-9534",	"Dull Birch-8454",	"Antique Brass-8581",	"Java Beans-8646",	"Cairo Bazaar-8565",	"Wrought Iron-8439",	"Rock Canyon-8463",	"Digital Grey-8471",	"Stone Castle-9512",	"Muddy Terrain-9543",	"Mochaccino-8573",	"Earth Song-8550",	"Soft Brown-9535",	"Branch Brown-9527",	"Marooned Brown-8669",	"Old Brick-8613",	"Cappuccino-8655",	"Dense Fog-9456",	"Garden Bench-8432",	"Honeycomb-8533",	"Royal Crown-8525",	"African Plain-8494",	"Inner Bark-8638",	"River Silt-8440",	"Brown Sugar-8582",	"Brown Points-9513",	"Antartica-8464",	"Burnished Caramel-8574",	"Spice Variety-8647",	"Tropical Tan-8455",	"Gold Standard-8517",	"Under Ground-9528",	"Truffle Surprise-8605",	"Roast Brown-4198",	"Ethnic Brown-8589",	"Tree Bark-8566",	"Highland Grass-8495",	"Caramel Custard-8534",	"Tawny Sky-8598",	"Mexican Hills-8526",	"Earthly Elegance-9544",	"Brick Tone-8639",	"Sandstone-3211",	"Mohican Trail-8670",	"Brick Red-N-0533",	"Pastel Grey-9457",	"Straw Mat-8575",	"Pharoah-4194",	"Brandy-4115",	"Wild Mushroom-8472",	"Brownstone-4234",	"Smoky Mountain-8433",	"Mud House-8656",	"Earthly Brown-8006",	"African Desert-8558",	"Copper Moon-8013",	"Beautiful Beige-9529",	"Brown Tan-8535",	"Burnt Yellowstone-N-4120",	"Smoky Grey-9458",	"Rustic Charm-8567",	"Sand Clock-8586",	"Dry Acron-8584",	"Butter Rum-8456",	"Crowded Beach-9536",	"Chapel Grey-8441",	"Golden Prairie-8518",	"Country Roads-8576",	"Desert Beige-8465",	"Copper Coast-8615",	"Spice Jar-8671",	"Copper Leaf-0523",	"Ginger Bread-8599",	"Antelope-8527",	"Grey Stone-9455",	"Creamy Crescendo-9545",	"Hidden Vale-8649",	"Sunderbans-8519",	"Amber-N-5103",	"Runway Grey-9459",	"Indian Spice-8568",	"Barren Oak-8536",	"Light Coffee-0470",	"Bush Land-8528",	"Macro Polo-8607",	"Country Beige-8600",	"Dancing Deer-8657",	"Creamy Crust-9514",	"Nickel Grey-6126",	"Lingering Brew-7027",	"Camel Skin-9530",	"Oyster Grey-8473",	"Coral Brown-9537",	"Warmstone-0N02",	"Coastal Wood-9546",	"Earthn Mix-7933",	"Sands of Time-4202",	"Twinkling Star-8466",	"Rich Tan-7965",	"Rustic Pottery-8616",	"Peanut Butter-8559",	"Apricot-N-0501",	"Balsam Brown-8520",	"Quarry Stone-8658",	"Lazy Brown-8591",	"Brown Paper-8577",	"Silk Route-0N13",	"Cinnamon Rose-8672",	"Camel-8650",	"Volcano-0578",	"Red Marble-5226",	"Light Echo-9515",	"Hazel Nut-8569",	"Milk Choclate-8537",	"Pisces-8474",	"Grand Canyon-8015",	"Swiss Coffee-4215",	"Dawn-0469",	"Tropicla Soil-9538",	"Cream Galaxy-9547",	"Soothing Silk-9531",	"Weathered White-8442",	"Warm Sands-8641",	"Peach Nectar-8608",	"Desert Palm-8467",	"Grey Tint-8435",	"Sunbaked Clay-8617",	"Grey Wash-9460",	"Grains Of Sand-7934",	"Sparrow Feather-8659",	"Rocky Cliff-8632",	"Terracotta-N-0427",	"Heritage Hills-8554",	"Light Buff-0362",	"Rose Petal-0R08",	"Fresh Fuel-9516",	"Buttercup-N-0336",	"Snow Fall-8475",	"Calamine-8578",	"Farm Land-9532",	"Silver Mine-8443",	"Walnut Shell-7966",	"Coral Coast-8016",	"Clean Aura-9548",	"Light Biscuit-N-0318",	"Herbal Pack-8602",	"Raw Cotton-8459",	"Brick Clay-8642",	"Basra Pearl-N-0974",	"Fawn Dream-8007",	"Fennel Seed-8538",	"Valley Flower-8530",	"Enlighten-N-4148",	"Pale Sand-9539",	"Blushing Rose-5117",	"Antique White-0940",	"Ancient Inca-8609",	"Talc-0N22",	"Meadow Lark-8499",	"Yellow Charm-7935",	"Baked Biscuit-8579",	"Silver Spree-8460",	"Bonny Peach-8610",	"Timber Ridge-8633",	"Copper-0587",	"Almond Kiss-8643",	"Pinch of Peach-9540",	"Whitener-8476",	"Cedar Path-8673",	"Oak Leaf-8561",	"Dune Walk-8571",	"Spice-0477",	"River Reed-8539",	"White Delight-8436",	"Ivory-0315",	"Bonewhite-0964",	"Twilight Hush-0944",	"Summer Blush-N-0945",	"Coral Teasure-0975",	"Poetry-5219",	"Ceramic-3122",	"Stoneware-8008",	"Warm Glow-7967",	"Hacienda Clay-7936",	"Beach Shack-8603",	"Memories-8580",	"Easter Lily-8532",	"Solitarie-8500",	"Ice Crystal-8444",	"Flushed Brown-8611",	"Barley-0572",	"Vanity-5260",	"Coral Bells-8674",	"Peach Carnation-8017",	"Palace Lights-N-0N17",	"Magnolia-0387",	"Old Lace-0950",	"Macadamia-5184",	"Cane Beige-8563",	"Victorian Wisp-0N68",	"Windsor Cream-0989",	"Garlic Pod-8524",	"Brick Pile-8595",	"Sweet Dreams-8564",	"Orange Essence-8009",	"Exotic Spice-8018",	"Waking Earth-8612",	"White Clay-8620",	"Zen-8676",	"Crystal Beach-8596",	"Cobbled Path-8636",	"Prairie Island-8631",	"Palm Peach-8675",	"Desert Ivory-8020",	"Powder Puff-7972",	"Pale Pearl-7940",	"Milk Toffee-7968",	"Truffle-8635",	"Cold Candy-5132",	"Peach Beach-8010",	"Flawless Peach-8011",	"Coral Rocks-8019",	"Peach Melba-7971",	"Yellow Gleam-7939",	"Yellow Iris-7937",	"Desert Sun-7938",	"Nacho Chesse-7970",	"Milkshake-8012",	"Coral Beach-7969",	"Rich Berry-8213",	"Spice Tree-9445",	"Dark Pomegranate-9437",	"Berry Bloom-9429",	"Hip Purple-8197",	"Majestic Purple-8205",	"Royal Satin-8165",	"Black Grape-9446",	"Mauve Mix-9438",	"Dusky Beauty-9447",	"Plum Island-8214",	"Cardinal-8206",	"Orchad Plum-8198",	"Mix Grapes-9448",	"Maiden Grape-9430",	"Admiration-8199",	"Lavender Rose-8215",	"Evening Pansy-8207",	"Pink Spell-9439",	"Plum Cake-8200",	"Noble Purple-8208",	"Garden Glow-9431",	"Mild Rose-9449",	"Royal Crest-8216",	"Magnetic-9440",	"Violet Scream-8166",	"Tinge Of Pink Life-9441",	"Pink Wash-9432",	"Sensuous Lilac-8217",	"Purple Aura-8201",	"Shell Purple-8209",	"Winter Lily-9450",	"Muted Scarlet-8167",	"Quiet Sky-9451",	"Angel Park-9442",	"Evening Romance-9433",	"Lilac Elegance-8218",	"Lilac Dash-8210",	"Pink Mussing-8202",	"French Rose-8168",	"Canvas Pink-9434",	"Frosted Rose-9443",	"Frost Pink-9452",	"Lavender Hush-8219",	"First Blush-9435",	"Oriental Hush-N-0747",	"Sassy Violet-8203",	"Wash Out-9444",	"Pink Parasol-8169",	"Air Breeze-9436",	"Grape Delight-8220",	"Mystic Sky-8212",	"Autumn Rose-8170",	"Spring Petals-8171",	"Rosy View-8172",	"Twilight Sky-8204",	"Deep Spice-7997",	"Dusky Saffron-7981",	"Sunrise-0526",	"Mecca Gold-7982",	"String of Beads-7998",	"Canyon Sun-7983",	"Orange Silk-7999",	"Mellow Orange-8004",	"Sand Bed-7980",	"Cream Tone-7996",	"Custard Apple-7964",	"Perfect Peach-8000",	"Coral Shell-0951",	"Sombre Moon-7988",	"Honey Dew-7956",	"Pale Dawn-8003",	"Light Chrome-7963",	"Sun-N-Sand-7984",	"Simply Sunset-7995",	"Apricot Illusion-7979",	"Cream Silk-7955",	"Goldfish-7973",	"Kesar Milk-7962",	"Vivid Orange-7990",	"Bashful Beige-8002",	"Marigold-7986",	"Orange Forest-7978",	"Dreamsicle-7954",	"Orange Peel-7957",	"Orange Crown-7974",	"Orange Appeal-7949",	"Autumn Pumpkin-7991",	"Pumpkin Harvest-7958",	"Roasted Sesame-7975",	"Fire Globe-7950",	"Orange Crush-7959",	"Sunset Beach-7992",	"Orange Spark-7951",	"Sunset Cloud-7976",	"Mango Shake-7960",	"Peach Flutter-8001",	"Melon Sorbet-7993",	"Fossil-7985",	"Martian Sky-7952",	"Mango Duet-7977",	"Peaches And Cream-7961",	"Peach Rose-7994",	"Fairy Glitter-7953",	"True Ochre-7925",	"Light Ochre-7926",	"Mustard-7901",	"Casablanca-7927",	"Thar Desert-7917",	"Radiance-7893",	"Cheeky Yellow-7902",	"Blank Canvas-7932",	"Sun Screen-7868",	"Soft Honey-7876",	"Firefly Flicker-7916",	"Empire Yellow-7918",	"Sun Dial-7928",	"Shredded Wheat-7931",	"Dollop-7875",	"Candle Light-7900",	"Evening Moon-7908",	"Sunny Day-7894",	"Maize Stalk-7903",	"Sunny Sands-7874",	"Butter Scotch-7866",	"Candle Wick-7907",	"Crescent-7948",	"Hearth-7930",	"Sunny Side Up-7946",	"Wild Yellow-7865",	"Suble Tint-7899",	"Liquid Light-7915",	"Tons Of Sun-7895",	"Raffia-7929",	"Peping Sun-7905",	"Eager Yellow-7906",	"Moon Year-7924",	"Summer Dew-7867",	"Morning Dream-7904",	"Sundrenched-7914",	"Corn Cob-7947",	"Lemon Sprig-7873",	"Autumn Valley-7898",	"Sunlit Sand-7896",	"Cream Custard-7897",	"Summer Sprinkle-7923",	"Lemon Brust-7864",	"Turmeric-7941",	"Mango-7909",	"Lily Gold-7942",	"Polka-7869",	"Burnished Sun-7919",	"Desert Glow-7910",	"Bright Fire-7943",	"Sunny Yellow-7861",	"Golden Ray-7870",	"Yellow Metal-7920",	"Ski Valley-7911",	"Sunspot-7944",	"Mid-Day-7871",	"Yellow Marigold-7962",	"Summer Harvest-7921",	"Yellow Tulip-7912",	"Yellow Scoop-7945",	"Summer Yellow-7863",	"Saffron Smile-7872",	"Wild Honey-7922",	"Golden Aura-7913",	"Fabric Pink-9421",	"Fine Wine-8109",	"Passion Fruit-8141",	"Berry Bunch-8133",	"Outdoor Pink-9425",	"Pink Silk-9413",	"Pixie Dust-8137",	"Wild Purne-8125",	"Velvet Dream-8117",	"Pink Water-9422",	"Wild Berry-8110",	"Candy Floss-9426",	"Pink Flower-9414",	"Electric Pink-8142",	"Damask Rose-8134",	"Fox Glove Pink-5155",	"Soft Petal-9423",	"Pomegranate-8143",	"Delicate Pink-9427",	"Pink Fluid-9415",	"Rose Water-8111",	"Morning Rays-9424",	"Wild Rose-8112",	"Sky Pink-9428",	"Twilight Pink-9416",	"Valntine-8135",	"Petal Pink-8119",	"Mauve Halo-8144",	"Rose Essence-9417",	"Baby Blush-8138",	"Shocking Pink-8126",	"Quiet Hush-8136",	"Rose Lace-8120",	"Blush Pink-9418",	"Bed of Roses-8113",	"Pink Serenade-9419",	"Pink Eternity-8139",	"Rich Desire-8127",	"Rose Window-8145",	"Smiling Weather-9420",	"Party Pink-8121",	"Princess Spell-8146",	"Merrie Pink-0418",	"Touch Of Fuschia-8140",	"Touch Of Rouge-8128",	"Peach Blossom-8122",	"Spectre Of Pink-8147",	"Pink Plume-0P13",	"Angel Harp-8124",	"Pink Seduction-8148",	"Graceful Pink-8115",	"Soft Breeze-8116",	"Maiden Pink-8129",	"Pale Blush-8132",	"Rose Rhapsody-8130",	"First Dawn-8131",	"Mahogany-0R05",	"Red Wood-9549",	"Cheerful Cherry-8693",	"Milan Red-8101",	"Chocolate Cherry-8686",	"Spring Bliss-8694",	"Rich Tomato-9405",	"Earthly Brown Clay-9550",	"Deep Curant-8687",	"Tree Delights-9551",	"Bottled Grape-8102",	"Vintage Wine-8695",	"Dark Sunset-9552",	"Rose Meadows-9406",	"Geranium-0509",	"Mauve Medley-8103",	"Indian Earth-8688",	"Scarlet-8085",	"Red Earth-8029",	"Melting Pot-9553",	"Pampered Pink-8696",	"Fruit Pink-9407",	"Fresh Carrot-9397",	"Vintage Rose-8104",	"Ginger Pop-8053",	"Jewel Sand-8689",	"May Fair-8078",	"Pure Red-8093",	"Early Bloom-9408",	"Sunset Orange-9398",	"Pink Compact-8697",	"Mountain Retreat-8690",	"In Vogue-8105",	"Pink Accent-8079",	"Tube Rose-9554",	"Salsa-8061",	"Young Wine-8086",	"Coral Cove-8030",	"Pink Embrace-8698",	"Pink Essence-9409",	"Raw Melon-9399",	"Morning Light-8691",	"Centre Stage-8045",	"Raspberry Souffle-8054",	"Melony-9400",	"Pink Juice-9410",	"Graceful-9555",	"Daisy Bunch-8106",	"Lucid Dream-5182",	"Almond White-8692",	"Hot Shot-8021",	"Pink Carnation-8080",	"Wild Pink-8087",	"Icy Pink-9401",	"Strawberry Whip-9411",	"Divine Pink-9556",	"Pearly Pink-9412",	"Rosy Coral-8031",	"Tender Shine-9402",	"Day Fresh-9403",	"Divinity-8700",	"Cupid-8094",	"Rose Mist-8055",	"Vanilla Sky-9404",	"Satin Pink-8062",	"Tinge Of Mauve-8107",	"Button Rose-8108",	"Colar Island-8046",	"Azalea-8095",	"Sugared Peach-8032",	"Dessert Bloom-8081",	"Peach Orangnza-8028",	"Tinge Of Rose-8084",	"Gossamer-8052",	"Willow Creek-8068",	"Winged Angel-8100",	"Tropical Peach-8022",	"Pink Candy-8063",	"Rose Bouquet-8088",	"Pink Linen-8056",	"Jaipur Dreams-8047",	"Soft Chenille-8036",	"Rose Debut-8082",	"Summer Pink-8083",	"Essence-8099",	"Pink Mist-8092",	"Day Lily-8060",	"Ballet Slippers-8089",	"First Crush-8067",	"Crimson Flush-8051",	"Rose Bud-8035",	"Tough Of Paprika-8027",	"Carrot Punch-8023",	"Climbing Rose-8096",	"Pink Crush-8033",	"Garden Pink-8090",	"Pink Bib-8034",	"Day Dream-8091",	"Pink Flamingo-8059",	"Tinker Bell-8064",	"Pale Rose-5206",	"Orange Nectar-8024",	"Pink Chenille-8097",	"Spring Rose-8065",	"Ruddy Pink-8057",	"Rose Glow-8049",	"Popsicle-8025",	"Nursery Pink-8058",	"Pink Dollop-8098",	"Rosette-8050",	"Tinge Of Pink-8066",	"Daylight-8026",	"Aqua Hint-L114",	"White Bisque-L115",	"Sheer Ice-L111",	"Icy Peak-L109",	"Cold Coffee-L129",	"Menthol-L116",	"Seagull Point-L113",	"Sahara Dream-L135",	"Mint Essence-L117",	"Soft Glow-0952",	"Dreamy Night-L159",	"Cream Pudding-L108",	"Iceland-0763",	"White Echo-L112",	"Water Spray-L118",	"White Satin-L119",	"Puppy Love-3203",	"Sesame Seed-L127",	"Lovely Lace-L131",	"Soft Silk-L160",	"Virgin Lace-L107",	"Mint Lustre-L120",	"Cream-0307",	"Natural Linen-L132",	"White Canvas-L157",	"Eggshell-L149",	"Pristine Linen-L153",	"Morning Glory-0765",	"Arabian Sand-L133",	"Pebble White-L136",	"Harmony-L147",	"Silence-L158",	"Double Cream-L134",	"Cotton Wool-L104",	"Moonlight-L121",	"Skimmed Cream-L122",	"Crystal Peak-L105",	"Mica Matte-L142",	"Crushed Ice-L140",	"Angel Cloud-L123",	"Swan Wing-L101",	"Blossom Tint-L148",	"Raw Jute-L151",	"Pearl Star-L103",	"Milky Way-L102",	"Pure Ivory-L124",	"Snow Blush-L138",	"South Pole-L141",	"Almost Ivory-L156",	"Love Song-L144",	"Rain Drop-L143",	"Pipe Dream-L154",	"White Cameo-L145",	"Pressed Linen-L150",	"Sonnet-L146",	"Cream Pie-L152",	"Pale Sisal-L155",	"Blush-L139",	"Sugared nut-L126",	"Silver Comet-L125",	"Colonial Blue-X144",	"Royal Wave-X143",	"Nautical Mile-X142",	"Ocean Force-X146",	"Inky Sea-X145",	"Pigeon Crest-X148",	"Mineral Blue-X147",	"Night At Sea-X152",	"Turquiose Ocean-X151",	"Teal Dream-X150",	"Polished Blue-X149",	"Amazon Moss-X153",	"Pine-N-0757",	"Glowing Rust-X112",	"Glorious Sunset-X111",	"Orange Vision-X110",	"Camp Fire-X114",	"Orange Tango-X113",	"Deep Orange-0506",	"Cherry Brandy-X126",	"Moutin Rouge-X125",	"Deep Pink-X132",	"Raspberry Crush-X130",	"Burgundy Plus-X129",	"Grape Riot-X138",	"Very Fushcia-X137",	"Cider Red-X116",	"Signal Red-0520",	"Sahara Sunset-X115",	"Rodeo-X117",	"Code Red-X120",	"Red Red-X118",	"Red Alert-X124",	"Crimson Depth-X123",	"Rich Rouge-X122",	"Victorian Gold-X103",	"Passion Flower-X107",	"Ochre Shadow-X106",	"Lemon Ole-X105",	"Sporty Yellow-X104",	"Mild Buff-3176",	"Mustard Field-X102",	"Gold Rush-X101",	"Hill And Vale-X156",	"Emrald Lights-X155",	"Chrome Green-X160",	"Loud Lime-X159",	"Forest Glade-X158",	"Green Ebony-X157",	"White Flame-8708",	"Zinnia Bloom-8716",	"Pink Illusion-9564",	"Before Sunrise-9572",	"Diamond Pink-9580",	"Maple Syrup-8747",	"Violet Delight-X131",	"Vibrant Blush-8707",	"Pink Bloom-8714",	"Pastel Perfect-9563",	"Purple Paradise-9571",	"Fairly Pink-9579",	"Mauve Star-8746",	"Dark Cherry-X128",	"Spring Season-8706",	"Shrub Rose-8713",	"Vanilla Pink-9562",	"Scenic Beauty-9570",	"Flower Curtain-9578",	"Misty Rose-8745",	"Raisin Delight-X127",	"Rose Plume-8705",	"Winter Cherry-8712",	"Sober Pink-9561",	"Pink Cruise-9569",	"Purple Plains-9577",	"Mystery-8744",	"Purple Prose-X136",	"Noah'S Ark-8704",	"Sea Shell Rose-8711",	"Flowing Silk-9560",	"Minty Purple-9568",	"Blissful Purple-9576",	"Rave Raisin-8743",	"Cherry Bon Bon-X135",	"Root Bear-8703",	"Cheer Up-8710",	"Lost Lilac-9559",	"Downtown Canopy-9567",	"Fruit Shake-9575",	"Lumber Jack-8742",	"Burnt Violet-X134",	"Grape Punch-8702",	"Vine Yard-8709",	"Period Purple-9558",	"Vintage Purple-9566",	"Tranquil Soils-9574",	"Weathered Oak-8741",	"Regal Purple-X133",	"Very Berry-8701",	"Strawberry-0481",	"Regal Mauve-9557",	"Purple Triple-9565",	"Plum Park-9573",	"Lavender Dew-0941",	"Silver Sky-M108",	"Cirrus Silver-M101",	"Silver Mermaid-M102",	"Seascape Silver-M104",	"Silver Nymph-M106",	"Torrent Silver-M105",	"Silver Shower-M103",	"Silver Mania-M107",	"Royale Gold-M006",	"Antique Gold-M403",	"Indian Copper-M501",	"Chestnut Gold-M405",	"Pairie Gold-M402",	"Wild West Gold-M508",	"Golden Horizon-M510",	"Savannah Gold-M210",	"Emerald Gold-M202",	"Golden Jade-M211",	"Olive Gleam-M209",	"Silver Flourish-M206",	"Champagne Silver-M205",	"Pea Pod Silver-M203",	"Silver Orchard-M204",	"Silver Surf-M213",	"Silver Steppes-M208",	"Ocean Glitter-M109",	"Silver Verse-M605",	"Cherub Silver-M507",	"Peach Shimmer-M404",	"Silver Blush-M502",	"Silver Ranch-M509",	"Moonlit Silver-M005",	"Silver Fawn-M606",	"Silver Escapade-M604",	"Silver Thundercloud-M607",	"Silver Silhouette-M603",	"Silver Orchid-M704",	"Lilac Glitter-M705",	"Silver Shadow-M701",	"Silver Viola-M703",	"Amethyst Silver-M702",	"Silver Martini-M506",	"Silver Plum-M511",	"Treasure Chest Silver-M303",	"Regal Ochre-M305",	"Wildwood Silver-M304",	"Silver Oak-M302",	"Summer Sprinkle-M212",	"Ultima Gold-M007",	"Emerald Gold-M202",	"Antique Gold-M403",	"Golden Jade-M211",	"Indian Copper-M501",	"Chestnut Gold-M405",	"Prarie Gold-M402",	"Wild West Gold-M508",	"Golden Horizon-M510",	"Savannah Gold-M210",	"Ultima Silver-M013",	"Seascape Silver-M104",	"Silver Viola-M703",	"Silver Ranch-M509",	"Pea Pod Silver-M203",	"Silver Fawn-M606",	"Silver Nymph-M106",	"Amethyst Silver-M702",	"Wildwood Silver-M304",	"Silver Orchard-M204",	"Silver Escapade-M604",	"Torrent Silver-M105",	"Silver Martini-M506",	"Regal Ochre-M305",	"Silver Surf-M213",	"Silver Thundercloud-M607",	"Silver Shower-M103",	"Silver Plum-M511",	"Summer Sprinkle-M212",	"Silver Steppes-M208",	"Silver Sky-M108",	"Silver Orchid-M704",	"Cherub Silver-M507",	"Olive Gleam-M209",	"Cirrus Silver-M101",	"Lilac Glitter-M705",	"Peach Shimmer-M404",	"Silver Flourish-M206",	"Silver Mermaid-M102",	"Silver Shadow-M701",	"Silver Blush-M502",	"Champagne Silver-M205",	"Bus Green-0209",	"Dark Green-0212",	"Royal Blue-0123",	"Bottle Green-0205",	"Oxford Blue-0119",	"French Blue-0112",	"Phizori-0121",	"Mint Green-0253",	"Brown-0403",	"Jage Green-0224",	"Satin Brown-4254",	"Walnut Brown-4265",	"Ad Grey-0601",	"Aquamarine-0202",	"Mercedes Red-0514",	"Smoke-N-0616",	"Sky Blue-0125",	"Teak Brown-4244",	"Bay Brown-4255",	"Water Green-0246",	"Blue Clover-0U36",	"Wild Purple-0718",	"Leaf Brown-0415",	"Opaline Green-0231",	"Light Grey-0608",	"Golden Brown-0413",	"Imperial Crimson-0510",	"Timber Brown-4264",	"Brandy-0N45",	"Sandstone-0333",	"Satin Blue-0124",	"Pored-0518",	"Wild Lilac-0712",	"Nickel Grey-0683",	"Mid Buff-0324",	"Pista-0292",	"Signal Red-0520",	"Dawn Glow-0562",	"Mushroom-0422",	"Classic-0U12",	"Ocean Spray-01947",	"Oriental Hush-0747",	"Bluebell White-0J32",	"Suede-0N01",	"Deep Orange-506",	"Dawn-0469",	"Pale Cream-0328",	"Antique White-0940",	"Golden Yellow-0313",	"Pale Rose-0421",	"Lemon Yellow-0317",	"Petal-0P05",	"Royal Ivory-0331",	"Sandalwood-0485",	"Jasmine Wisp-0943",	"Candy-0478",	"Raw Silk-0351",	"Coral Shell-0951",	"Off White-0905",	"Light Cream-0Y02",	"Phizori-0121",	"Ad Grey-0601",	"Sky Blue-0125",	"Blue Clover-0U36",	"Wild Purple-0718",	"Brandy-0N45",	"Satin Blue-0124",	"Wild Lilac-0712",	"Pista-0292",	"Mushroom-0422",	"Bluebell White-0J32",	"Suede-0N01",	"Pale Cream-0328",	"Petal-0P05",	"Royal Ivory-0331",	"Candy-0478",	"Raw Silk-0351",	"Off White-0905",	"Aquamarine-0202",	"Electric Blue-0110",	"Asian Green-0203",	"Coffee-0468",	"Autumn Gold-0254",	"Asian Blue-0144",	"Surf Green-0266",	"Rust-0569",	"Pastel Blue-0156",	"Light Green-0226",	"Surf Blue-0188",	"Satin Blue-0124",	"Manor Blue-N-0195",	"Mint Leaf-0G96",	"Brick Red-N-0533",	"Pastel Green-0234",	"Light Coffee-0470",	"Wild Lilac-0712",	"Venetian Green-0262",	"Pista-0292",	"Dew Drop-0299",	"Bathstone-0301",	"Cascade-0210",	"Misty Vale-0946",	"Cool Grey-6163",	"Daffodil-0308",	"Cool Green-2540",	"Fire Red-0508",	"Suede-0N01",	"Sunrise-0526",	"Broken White-0904",	"Pale Cream-0328",	"Strawberry-0481",	"Lavender Dew-0941",	"Antique White-0940",	"Pale Rose-0421",	"Magnolia-0387",	"Ivory-0315",	"Cool Pink-5335",	"Romance-0P10",	"Promise-0P09",	"Bliss-0170",	"Macrame-0495",	"Cool Cream-3272",	"Sandalwood-0485",	"Candy-0478",	"Beacon-3109",	"Spice-0477",	"Sugarcane-0332"]
 });
/********************************** New search term******************
$('#search-json-submit').click(function() {
    $('#search-output').html('');
    var search_query = $('#search-color-input').val();
	var searchTearm = 0;
	console.log(search_query);
    var search_query_regex = new RegExp(".*"+search_query+".*", "g");
	//var j = 0;
	$.getJSON( "http://realpixel.in/asian-paintshttp://localhost/appolo/asset_front/js/visualizer/color.js" )
		.done(function(data) {
    $.each(data.color, function(k, v) {
        if(v['name'].match(search_query_regex)) {
			   searchTearm = 1;
            //console.log(data.color[i].name);
			
		var searchFor = data.color[i].
			for(var i = 0; i < data.color.length; i++) {
            //return book[i];
			$('.outer').append('<li style="background-color:'+v['hex']+';"title="'+v['name']+'"></li>');
			//$('.dropdown select#color_sel_new').val(v['subCat']);
			$('option[value="'+ v['subCat']+']').attr('selected', 'selected');
			var matchSearched = v['name'];
			   $('.outer li[title^="'+ matchSearched +'"]').addClass('selected');
			   //$('#search-output').append('<li>Search results found in: '+'{ name: "'+v['mainCat']+'", id: "'+v['subCat']+'", location: "'+v['name']+'" } </li>');
			   
			   
            
        }

        }
		});
	if (searchTearm == 1){
				
		console.log('searched');	
				}else{
					
		console.log('No search');	
					}
    });
	
			
		
});
/********************************** oldsearch term******************/
/********************************** New search term******************/
function find() { // Find array element which has a key value of val
    //alert(search_term);
	
	
	var search_term_arr = search_term.split("-"); 
	console.log(search_term_arr);
	
	
	$.getJSON( "http://localhost/appolo/assets_front/js/visualizer/color.js" )
		.done(function(data) {
    for (var j = 0; j < data.color.length; j++) {
    if(data.color[j].name == search_term_arr[0] || data.color[j].code == search_term_arr[1]) {
	//New code Nikhil || data.color[j].hex == '#'+search_term
		$('.outer').html('');
      //console.log(data.color[j].name);
        var post_Cat = data.color[j].subCat;
         post_id = data.color[j].name;
         //console.log(post_Cat);
        for(var k = 0; k < data.color.length; k++) {
            if(data.color[k].subCat == post_Cat ) {
            //console.log(data.color[k].name);
            //return book[i];
            $('.outer').append('<li style="background-color:'+data.color[k].hex+';"title="'+data.color[k].name+'"></li>');
        }
        }
		
    //console.log(post_id);
		$('.outer li[title^="'+ post_id +'"]').addClass('selected');
		var divs = $("div.outer > li");
			var addId = 1;
			for(var i = 0; i < divs.length; i+=28) {
			  divs.slice(i, i+28).wrapAll("<ul class='new' id="+ addId +"></ul>");
			  addId++;
			}
		var totalWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
		$('div.outer').width(totalWidth);
		var parentIndex = $('div.outer li.selected').closest("ul").attr("id");
		var checkOuter = $('.outer ul').outerWidth()
		//console.log(parentIndex);
		
		var setLeft = (parentIndex-1)*checkOuter;
		if (parentIndex != 0){
		$('div.outer').css('left', "-"+setLeft+"px");
			}
    }
}
});
}

$('#search-json-submit').on('click',function (){
    search_term = $('#search-color-input').val();
    find();
    //var list = $('.search_result li').attr('id', post_id)
			

});
/********************************** New search term******************/
/************* detecting browsers ******************/

if ( $.browser.msie ) {
  //alert( $.browser.version );
  if ($.browser.version =='8.0' || $.browser.version =='7.0' || $.browser.version =='6.0'){
	  //alert('hi');
	  $('.overlay').css('display','block');
	  }
}


//var isMobile = false;

if (navigator.userAgent.match(/Android/i) ||
             navigator.userAgent.match(/webOS/i) ||
             navigator.userAgent.match(/iPhone/i) ||
             navigator.userAgent.match(/iPad/i) ||
             navigator.userAgent.match(/iPod/i) ||
             navigator.userAgent.match(/BlackBerry/) || 
             navigator.userAgent.match(/Windows Phone/i) || 
             navigator.userAgent.match(/ZuneWP7/i)
             ) {
                // some code
                //console.log('using mobile');
				 $('.overlay').css('display','block');
				  $('.container').css('display','block');
               }

});




$('.edit_tools div.statechange button').mouseup(function() {
		  $(this).removeClass('clicked');
  }).mousedown(function(){

		//alert('working');
		$('button#b4').removeClass("clicked");
		/*$('button#eraser_c, button#eraser_s').css('display', 'none');*/
		$('.edit_tools div button, .edit_tools div').removeClass('selected');
		$(this).addClass('clicked');
});

$('.edit_tools div.state button').click(function(){

		getClass = $(this).attr('class');
		$('.edit_tools div button, .edit_tools div').removeClass('selected, clicked');		
		$('button#b4').removeClass("clicked");
		/*$('button#b1, button#b4').removeClass('display', 'none');
		$('button#eraser_c, button#eraser_s').css('display', 'none');*/
		$(this).addClass('selected');
		addClass();
});

/************* show the add color buttons *************/
/*$('div.btn_paint span, div.btn_fill span').click(function(){
		//getClass = $(this).attr('class');
		$('div.btn_erase_s, div.btn_erase_c').removeClass('selected');
		$('div.btn_paint button, div.btn_fill button').css('display', 'block');
});*/

$('button#b4').click(function(){ 

		getClass = $(this).parent().attr('class');
		//alert("This is buttn");
		if(getClass.indexOf("selected") > -1){
			$(this).parent().removeClass('selected');
			$('button#b4' ).removeClass('clicked');
		}else{
			$(this).addClass('clicked');
			$(this).parent().addClass('btn_fill selected');	
		}
		
		
		//$('.edit_tools div button').removeClass('selected');
		//$('.edit_tools div button#eraser_s').removeClass('clicked');
});

$('button#b1').click(function(){
		//getClass = $(this).attr('class');
		$(this).parent().removeClass();
		$('button#b1, button#b4' ).removeClass('clicked');
		$(this).addClass('clicked');
		$(this).parent().addClass('btn_paint selected');
		$('.edit_tools div button').removeClass('selected');
		$('.edit_tools div button#eraser_s').removeClass('clicked');
});

/*$('button#b1, button#b4').mouseover(function() {
		$(this).addClass('clicked');
	}).mouseout(function(){
		//alert('working');
		$(this).removeClass('clicked');
});*/

/************** select eraser types*****************/

/*$('div.btn_erase_s span, div.btn_erase_c span').click(function(){
		//getClass = $(this).attr('class');
		$('div.btn_paint, div.btn_fill').removeClass('selected');
		$('div.btn_erase_s button, div.btn_erase_c button').css('display', 'block');
});*/

/*$('button#eraser_s').click(function(){
		//getClass = $(this).attr('class');
		$('button#b1, button#b4').removeClass('clicked');
		$(this).parent().removeClass();
		$(this).addClass("clicked");
		//$('button#eraser_c, button#eraser_s').css('display', 'none');
		$(this).parent().addClass('btn_erase_s selected');
		$('.edit_tools div button').removeClass('selected');
});*/

/*$('button#eraser_c').click(function(){
		//getClass = $(this).attr('class');
		$('button#eraser_c, button#eraser_s' ).css('display', 'none');
		$(this).parent().removeClass();
		$(this).parent().addClass('btn_erase_c selected');
		$('.edit_tools div button').removeClass('selected');
});*/


function addClass(){
		//alert(getClass);
		$('.edit_tools span.button button').removeClass('selected');
		$('.'+getClass).addClass('selected');
		console.log("addClass selected");
}

/******************************* search color*****************/
function prev(){
		//alert (sliderMove);
		$('div.outer').animate({left:sideLeftMove});
		//console.log(sideLeft);
}

function next (){
		//alert (sliderMove);
		$('div.outer').animate({left:"-"+sideLeftMove});
}

$('div.outer').css('left','0');
totalWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
$('div.outer').width(totalWidth);

$('.next').on('click', function() {
sliderMove = $('.outer ul').outerWidth();
var OuterWidth = ($('.outer ul').outerWidth())*($('.outer ul').length);
//var OuterWidth = $('div.outer').width(totalWidth);
var stopSlider = OuterWidth-sliderMove;
var check_slide = -(stopSlider);
//alert (totalWidth);
   sideLeft = parseInt($('div.outer').css('left'));
    sideLeftMove = sliderMove-sideLeft;
    //console.log(OuterWidth);
    //console.log(sideLeft);
	   //console.log(check_slide);
    //alert (sideLeft);
    if(sideLeft != check_slide){
		$(this).removeClass('disabled');
        //alert('no more uls');
      next();
    }
    else{
        //$(this).addClass('disabled');
    }

	
	
     //sliderMove+=sliderMove;
    
  });

$('.prev').on('click', function() {
sliderMove = $('.outer ul').outerWidth();
//var setOuter = $('div.outer').width(totalWidth);
var stopSlider = totalWidth-sliderMove;
//alert (totalWidth);
    //sideLeft = parseInt($('div.outer').css('left'))+sliderMove;
	
   sideLeft = parseInt($('div.outer').css('left'));
    sideLeftMove = parseInt($('div.outer').css('left'))+sliderMove;
    //alert (sideLeft);
    //alert (sideLeft);
    if(sideLeft != 0){
		$(this).removeClass('disabled');
        //alert('no more uls');
      prev();
    }
    else{
        //$(this).addClass('disabled');
    }

	 
     sliderMove-=sliderMove;
    
  });
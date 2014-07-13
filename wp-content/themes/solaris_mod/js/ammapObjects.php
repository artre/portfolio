<?php
/*
 * Template Name: ammap-objects
 * Description: this is template for DC Wallets Page
 */

?>

<script>
// add all your code to this method, as this will ensure that page is loaded
			AmCharts.ready(function() {
			    // create AmMap object
			    var map = new AmCharts.AmMap();
			    // set path to images
			    map.pathToImages = "<?php echo get_stylesheet_directory_uri()?>/images/ammap/";
			    
			    /* create data provider object
			     mapVar tells the map name of the variable of the map data. You have to
			     view source of the map file you included in order to find the name of the 
			     variable - it's the very first line after commented lines.
			     
			     getAreasFromMap indicates that amMap should read all the areas available
			     in the map data and treat them as they are included in your data provider.
			     in case you don't set it to true, all the areas except listed in data
			     provider will be treated as unlisted.
			    */
			   
			    var dataProvider = {
			        mapVar: AmCharts.maps.worldLow,
			        getAreasFromMap:true,
			        areas:[

				        {id:"AE", color:"#CC0000"},
				        {id:"AF", color:"#00CC00"},
				      	{id:"AL", color:"#CC0000"},
				        {id:"AM", color:"#00CC00"},
				        {id:"AO", color:"#CC0000"},
				        {id:"AR", color:"#00CC00"},

				        {id:"AT", color:"#00CC00"},
				        {id:"AU", color:"#99999"},
				        {id:"AZ", color:"#00CC00"},
				        {id:"BA", color:"#00CC00"},
				        {id:"BD", color:"#00CC00"},
				        {id:"BE", color:"#00CC00"},
				        {id:"BF", color:"#00CC00"},
				        {id:"BG", color:"#00CC00"},
				        {id:"BI", color:"#00CC00"},
				        {id:"BJ", color:"#00CC00"},
				        {id:"BN", color:"#00CC00"},
				        {id:"BO", color:"#00CC00"},
				        {id:"BR", color:"#00CC00"},
				        {id:"BS", color:"#00CC00"},
				        {id:"BT", color:"#00CC00"},
				        {id:"BW", color:"#00CC00"},
				        {id:"BY", color:"#00CC00"},
				        {id:"BZ", color:"#00CC00"},
				        {id:"CA", color: "#CC0000", rollOverColor: "#1891CA"},
				        {id:"CD", color:"#00CC00"},
				        {id:"CF", color:"#00CC00"},
				        {id:"CG", color:"#00CC00"},
				        {id:"CH", color:"#00CC00"},
				        {id:"CI", color:"#00CC00"},
				        {id:"CL", color:"#00CC00"},
				        {id:"CM", color:"#00CC00"},
				        {id:"CN", color:"#00CC00"},
				        {id:"CO", color:"#00CC00"},
				        {id:"CR", color:"#00CC00"},
				        {id:"CU", color:"#00CC00"},
				        {id:"CY", color:"#00CC00"},
				        {id:"CZ", color:"#00CC00"},
				        {id:"DE", color:"#00CC00"},
				        {id:"DJ", color:"#00CC00"},
				        {id:"DK", color:"#00CC00"},
				        {id:"DO", color:"#00CC00"},
				        {id:"DZ", color:"#00CC00"},
				        {id:"EC", color:"#00CC00"},
				        {id:"EE", color:"#00CC00"},
				        {id:"EG", color:"#00CC00"},
				        {id:"ER", color:"#00CC00"},
				        {id:"ES", color:"#00CC00"},
				        {id:"ET", color:"#00CC00"},
				        {id:"FK", color:"#00CC00"},
				        {id:"FI", color:"#00CC00"},
				        {id:"FJ", color:"#00CC00"},
				        {id:"FR", color:"#00CC00"},
				        {id:"GA", color:"#00CC00"},
				        {id:"GB", color:"#00CC00"},
				        {id:"GE", color:"#00CC00"},
				        {id:"GF", color:"#00CC00"},
				        {id:"GH", color:"#00CC00"},
				        {id:"GL", color:"#00CC00"},
				        {id:"GM", color:"#00CC00"},
				        {id:"GN", color:"#00CC00"},
				        {id:"GQ", color:"#00CC00"},
				        {id:"GR", color:"#00CC00"},

				        {id:"GT", color:"#00CC00"},
				        {id:"GW", color:"#00CC00"},
				        {id:"GY", color:"#00CC00"},
				        {id:"HN", color:"#00CC00"},
				        {id:"HR", color:"#00CC00"},
				        {id:"HT", color:"#00CC00"},

				        {id:"HU", color:"#00CC00"},
				        {id:"ID", color:"#00CC00"},
				        {id:"IE", color:"#00CC00"},
				        {id:"IL", color:"#00CC00"},
				        {id:"IN", color:"#00CC00"},
				        {id:"IQ", color:"#00CC00"},
				        {id:"IR", color:"#00CC00"},
				        {id:"IS", color:"#00CC00"},
				        {id:"IT", color:"#00CC00"},
				        {id:"JM", color:"#00CC00"},
				        {id:"JO", color:"#00CC00"},
				        {id:"JP", color:"#00CC00"},
				        {id:"KE", color:"#00CC00"},
				        {id:"KG", color:"#00CC00"},
				        {id:"KH", color:"#00CC00"},
				        {id:"KP", color:"#00CC00"},
				        {id:"KR", color:"#00CC00"},
				        {id:"XK", color:"#00CC00"},
				        {id:"KW", color:"#00CC00"},
				        {id:"KZ", color:"#00CC00"},
				        {id:"LA", color:"#00CC00"},
				        {id:"LB", color:"#00CC00"},
				        {id:"LK", color:"#00CC00"},
				        {id:"LR", color:"#00CC00"},
				        {id:"LS", color:"#00CC00"},
				        {id:"LT", color:"#00CC00"},
				        {id:"LU", color:"#00CC00"},
				        {id:"LV", color:"#00CC00"},
				        {id:"LY", color:"#00CC00"},
				        {id:"MA", color:"#00CC00"},
				        {id:"MD", color:"#00CC00"},
				        {id:"ME", color:"#00CC00"},
				        {id:"MG", color:"#00CC00"},
				        {id:"MK", color:"#00CC00"},
				        {id:"ML", color:"#00CC00"},
				        {id:"MM", color:"#00CC00"},
				        {id:"MN", color:"#00CC00"},
				        {id:"MR", color:"#00CC00"},
				        {id:"MW", color:"#00CC00"},
				        {id:"MX", color:"#00CC00"},
				        {id:"MY", color:"#00CC00"},
				        {id:"MZ", color:"#00CC00"},
				        {id:"NA", color:"#00CC00"},
				        {id:"NC", color:"#00CC00"},
				        {id:"NE", color:"#00CC00"},
				        {id:"NG", color:"#00CC00"},
				        {id:"NI", color:"#00CC00"},
				        {id:"NL", color:"#00CC00"},
				        {id:"NO", color:"#00CC00"},
				        {id:"NP", color:"#00CC00"},


				        {id:"NZ", color:"#00CC00"},
				        {id:"OM", color:"#00CC00"},
				        {id:"PA", color:"#00CC00"},
				        {id:"PE", color:"#00CC00"},
				        {id:"PG", color:"#00CC00"},
				        {id:"PH", color:"#00CC00"},
				        {id:"PK", color:"#00CC00"},
				        {id:"PL", color:"#00CC00"},
				        {id:"PR", color:"#00CC00"},
				        {id:"PS", color:"#00CC00"},
				        {id:"PT", color:"#00CC00"},
				        {id:"PY", color:"#00CC00"},
				        {id:"QA", color:"#00CC00"},
				        {id:"RO", color:"#00CC00"},
				        {id:"RS", color:"#00CC00"},
				        {id:"RU", color:"#00CC00"},
				        {id:"RW", color:"#00CC00"},
				        {id:"SA", color:"#00CC00"},
				        {id:"SB", color:"#00CC00"},
				        {id:"SD", color:"#00CC00"},
				        {id:"SE", color:"#00CC00"},
				        {id:"SI", color:"#00CC00"},
				        {id:"SJ", color:"#00CC00"},
				        {id:"SK", color:"#00CC00"},
				        {id:"SL", color:"#00CC00"},
				        {id:"SN", color:"#00CC00"},
				        {id:"SO", color:"#00CC00"},
				        {id:"SR", color:"#00CC00"},
				        {id:"SS", color:"#00CC00"},
				        {id:"SV", color:"#00CC00"},
				        {id:"SY", color:"#00CC00"},
				        {id:"SZ", color:"#00CC00"},
				        {id:"TD", color:"#00CC00"},
				        {id:"TF", color:"#00CC00"},
				        {id:"TG", color:"#00CC00"},
				        {id:"TH", color:"#00CC00"},
				        {id:"TJ", color:"#00CC00"},
				        {id:"TL", color:"#00CC00"},
				        {id:"TM", color:"#00CC00"},
				        {id:"TN", color:"#00CC00"},
				        {id:"TR", color:"#00CC00"},
				        {id:"TT", color:"#00CC00"},
				        {id:"TW", color:"#00CC00"},
				        {id:"TZ", color:"#00CC00"},
				        {id:"UA", color:"#CF0000", zoomLevel: "6"},
				        {id:"UG", color:"#00CC00"},
				        {id:"US", color:"#00CC00"},
				        {id:"UY", color:"#00CC00"},
				        {id:"UZ", color:"#00CC00"},
				        {id:"VE", color:"#00CC00"},
				        {id:"VN", color:"#00CC00"},
				        {id:"VU", color:"#00CC00"},
				        {id:"YE", color:"#00CC00"},
				        {id:"ZA", color:"#00CC00"},
				        {id:"ZM", color:"#00CC00"},
				        {id:"ZW", color:"#00CC00"},
				        
				        

			        	  ]                      
			    }; 
			    // pass data provider to the map object
			    map.dataProvider = dataProvider;
			
			    /* create areas settings
			     * autoZoom set to true means that the map will zoom-in when clicked on the area
			     * selectedColor indicates color of the clicked area.
			     */
			    map.areasSettings = {
			        autoZoom: true,
			        selectedColor: "#6ac6ef"
			    };
				//map.clickMapObject(map.getObjectById("AU"));

			    // let's say we want a small map to be displayed, so let's create and add it to the map
			    map.smallMap = new AmCharts.SmallMap();
			
			    // write the map to container div
			    map.write("mapdiv");               
			    
			});

</script>
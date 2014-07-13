<?php
/*
 * Template Name: ammapObjects
 * Description: this is template for generating map for legal and regulation
 */

	getListOfCountries($wpdb);

	$pageposts = getListOfCountries($wpdb);

	if($pageposts) 
	{
		global $post;

		$results = array();

		foreach($pageposts as $post)
		{
			setup_postdata($post);

	        $isoCode = get_post_meta($post->ID, "legal-countryISOcode", true);
	        $cStatus = get_post_meta($post->ID, "legal-countryStatus", true);
	        $results["$isoCode"] = $cStatus;
		}

		$listOfCountries = json_encode($results);

	} else {
		echo '<h2 class="center">Not Found</h2><p class="center">Sorry, but you are looking for something that isn\'t here.</p>';
	}


?>

<!-- legal and regulation map scripts -->
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/ammap.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri()?>/js/worldLow.js"></script>

<script>



function generateMapAreas()
{
	var data = window.AmCharts.maps.worldLow.svg.defs;
		//console.log(data); //DEBUG

	var countries = window.AmCharts.maps.worldLow.svg.g.path;

	var settings = JSON.parse('<?php echo $listOfCountries; ?>');
		//console.log(settings); //DEBUG

	var favorable = "#2ECC71";
	var unfavorable = "#ff9b2f";
	var nearlyOutlawed = "#ff432f";
	var noData  = "#5D5D5D";

	var areaConfigData = new Array();

	//var countryUrl = '<?php echo get_permalink(); ?>';//artem

	for(var i in countries)
	{
		var countryObj = countries[i];
		var countryCode = countryObj.id;

		var regionObj = new Object;

		regionObj.id = countryCode;
			

		if(settings[countryCode] == 'Nearly Outlawed')
		{					
			regionObj.color = nearlyOutlawed;
		} else if(settings[countryCode] == 'Favorable')
		{
			regionObj.color = favorable;
		} else if(settings[countryCode] == 'Unfavorable')
		{
			regionObj.color = unfavorable;
		} else {
			regionObj.color = noData;
		}

		areaConfigData.push(regionObj);
			//console.log(regionObj);

		regionObj = null; // Reset var
	}

	var areaDataString = JSON.stringify(areaConfigData);
		//console.log(areaConfigData); // DEBUG

	//return areaDataString;
	return areaConfigData; // Return an Array of objects
} // EOF 

function generateMap(mapData) 
{
	// add all your code to this method, as this will ensure that page is loaded
	AmCharts.ready(function() {
		// create AmMap object
		var map = new AmCharts.AmMap();
		// set path to images
		map.pathToImages = "<?php echo get_stylesheet_directory_uri()?>/images/ammap/";

		/* ARTEM: create data provider object
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
			getAreasFromMap: true,
			areas: mapData,
		};


		// pass data provider to the map object
		map.dataProvider = dataProvider;

		/* create areas settings
		 * autoZoom set to true means that the map will zoom-in when clicked on the area
		 * selectedColor indicates color of the clicked area.
		 */
		map.areasSettings = {
			autoZoom: true,
			selectedColor: "#6ac6ef",
			outlineThickness: "1",
			rollOverOutlineColor: "#ffcc00"
		};
		//map.clickMapObject(map.getObjectById("AU"));

		map.zoomControl = {
			buttonRollOverColor: "#4AB6E8",
			buttonFillColor: "#1891CA",
			//buttonSize: "18"
		};

		map.mouseWheelZoomEnabled = 1;


		// let's say we want a small map to be displayed, so let's create and add it to the map
		map.smallMap = new AmCharts.SmallMap();

		var favorable = "#2ECC71";
		var unfavorable = "#ff9b2f";
		var nearlyOutlawed = "#ff432f";
		var noData  = "#5D5D5D";


		 var legend = {
			        width: 450,
			        backgroundAlpha: 0.5,
			        backgroundColor: "#FFFFFF",
			        borderColor: "#FFFFFF",
			        borderAlpha: 1,
			        top: 125,
			        right: 10,
			        horizontalGap: 10,
			        markerSize: 16,
			        //useMarkerColorForLabels: true,
			        spacing: 0,
			        equalWidths: false,
			        color: "#2d2d2d",
			        data: [
			            {
			            title: "Favorable",
			            color: favorable},
			        {
			            title: "Unfavorable",
			            color: unfavorable},
			        {
			            title: "Nearly Outlawed",
			            color: nearlyOutlawed},
			            {
			            title: "No Data",
			            color: noData}
			        ]
			    };
  	
			    map.addLegend(legend);

		// write the map to container div
		map.write("mapdiv");
	});
} // EOF generateMap()

// Instantiates a MAP
generateMap(generateMapAreas());

</script>
<?php
/*

Template name: Sandbox

*/
?>

<?php get_header(); ?>
<div class="center">
   <div class="main_message">
   <h1>Hi, nice to meet you</h1>
   <p>Welcome to my portfolio website</p>
   </div>
</div>
<div class="bottomYellow_oil"> 
	<div class="cube_2oil">		  
		<div class="rhomb_oil"><img src="<?php bloginfo('template_url'); ?>/images/Cubes/rhomb3.png"></div>
	</div>     
	<div class="light_path_oil">
		<img class="angle_path" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path.png">
		<img class="angle_path2" src="<?php bloginfo('template_url'); ?>/images/Cubes/angle_path2.png">
	</div>
</div>
<div class="bottomGreySandbox">
    <h2>Ajax Library</h2>
    <div id="ajaxlib">
        <a id="ajax-lib-link" href="files/ajax.json">Load Ajax JSON file</a>
    </div>
    <h2>Handling JSON Responses</h2>
    <div id="ajaxjson">
        <a id="ajax-json-link" href="files/ajax.json">Load Ajax JSON file</a>
    </div>
    <h2>Handling XML Responses</h2>
    <div id="ajaxxml">

        <a id="ajax-xml-link" href="files/ajax.txt">Load Ajax XML file</a>
    </div>
    <h2>Ajax Handling HTML Responses</h2>
    <div id="ajaxhtml">

        <a id="ajaxlink" href="files/ajax.txt">Load Ajax HTML file</a>
    </div>
	<h2>Timer</h2>
	<div id="timer">
	    <div id="inputArea">
	    	<input type="button" id="timer-pause" value="pause">
	    	<input type="button" id="timer-play" value="play">
	    </div>
	    <h1 id="time">0:00</h1>   
  	</div> 

  	<h2>Image Rotator</h2>
	<div id="custom-image-rotator">
		<img id="image-rotate" src="<?php bloginfo('template_url'); ?>/images/Paintings/blind_feelings.jpg" alt="Oil Paintings by Artem Kovalyk">
	</div>



<script>
	var template_directory = "<?php bloginfo('template_url'); ?>";
</script>






<?php get_footer(); ?>


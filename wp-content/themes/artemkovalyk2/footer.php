<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */
?>
	<div class="view">
		<ul>
			<li><a href="<?php echo site_url();?>/web-design/">view my - <span class="blue">web design</span></a></li>
			<li><a href="<?php echo site_url();?>/graphic-design/">view my - <span class="blue">graphic design</span></a></li>
			<li><a href="<?php echo site_url();?>/oil-painting/">view my - <span class="blue">oil painting</span></a></li>
			<!-- <li><a href="<?php echo site_url();?>/sandbox/"><span class="blue">sandbox</span></a></li> -->
			<li class="see-top"><a>to the top</a></li>
		</ul>
	</div>  <!-- END of .view --> 
</div><!-- End of .BottomGrey -->
	</div><!-- #content -->

	<footer class="footer">
         <div class="icon_contact"><img class="icon_contact1" src="<?php bloginfo('template_url'); ?>/images/Icons/icon_contact.png"></div>
         <div class="get_intouch"><h2>get in touch</h2></div>
         
         <div class="contacts"> <p>(718) 502 54 63<br>artre8@gmail.com</p></div>
         <div class="copy"> <p>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></p></div>
         <div class="tothe_top"><p>to the top</p></div>
      </footer>
</div><!-- end of container -->

<?php wp_footer(); ?>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/cube.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/animate_paintings.js'></script>


<?php if ( is_page_template( "sandbox-page.php" ) ) : ?>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/json.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/ArtemObject.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/sandbox.js'></script>
<?php endif; ?>


</body>
</html>
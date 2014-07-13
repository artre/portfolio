<?php
/**
 * Template Name: Buddypress Page
 * Description: A Page Template to display page content without the sidebar.
 */
	get_header();
?>

<div class="inner-wrap">
    <div id="bp-main-container" class="single-post">

        <?php if (have_posts()) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
                <?php comments_template( '', true ); ?>
            <?php endwhile; // end of the loop. ?>
        <?php endif ?>

    </div><!-- END OF #bp-main-container -->
</div> <!-- END OF .inner-wrap-->

<?php get_footer(); ?>
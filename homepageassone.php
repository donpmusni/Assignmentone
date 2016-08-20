<?php
/**
 * Template Name: Home Page Assignment One
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package assignmentone
 */

get_header(); ?>

<div id="primary" class="home-content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div id="services" class="home-services-area">
		<h1 class="entry-title">Services</h1>
		<p>
			<?php //sets content under Services from the Options Page
                $dpoptions = get_option('dp_options_settings');        
                echo $dpoptions['services']
                    ?>
		</p>
	</div>
	<div id="home-button" class="learn-more-button">
	<a href="<?php //This button links to the page set in Options Page
                $dpoptions = get_option('dp_options_settings');
                echo $dpoptions['butt_link'] 
                         ?>">Experience</a>
	</div>

	<?php
	get_footer();

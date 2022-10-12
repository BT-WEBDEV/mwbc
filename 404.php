<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MWBC
 */

get_header();

?>
<main id="primary" class="site-main">
    <h1 class="outline">Main</h1>

    <!-- Main Slider -->
    <section>
        <h1 class="outline">Slider</h1>
        <?php 
			include get_template_directory() . '/template-parts/empty-slider.php'; 
        ?>
    </section>
    <!-- /// Main Slider -->

    <!-- Main Content -->
	<section class="main-section">
		<div class="container">
			<div class="main-desc">
				<h5 class="text-center">Page not found.</h5>
			</div>
		</div>
	</section>
    <!-- /// Main Content -->

</main>
<?php
get_footer();

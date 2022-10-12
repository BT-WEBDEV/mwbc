<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

$server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]";

get_header();
?>

<main id="primary" class="site-main">
    <h1 class="outline">Main</h1>

    <!-- Main Slider -->
    <section>
        <h1 class="outline">Slider</h1>
        <?php 
            $slider = mwbc_get_gallery(22);
            if($slider) { 
                include get_template_directory() . '/template-parts/main-slider.php'; 
            } else {
				include get_template_directory() . '/template-parts/empty-slider.php'; 
			}
        ?>
    </section>
    <!-- /// Main Slider -->

</main>
<?php
echo tribe( Template_Bootstrap::class )->get_view_html();
get_footer();
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MWBC
 */
get_header();

$server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]";

?>
<main id="primary" class="site-main">
    <h1 class="outline">Main</h1>

    <!-- Main Slider -->
    <section>
        <h1 class="outline">Slider</h1>
        <?php 
            $slider_id = get_field("slider_id", $post->ID);
            if ($slider_id && $slider_id != '')
                $slider = mwbc_get_gallery($slider_id);
            if($slider) { 
                include get_template_directory() . '/template-parts/main-slider.php'; 
            } else {
				include get_template_directory() . '/template-parts/empty-slider.php'; 
			}
        ?>
    </section>
    <!-- /// Main Slider -->

    <!-- Main Content -->
    <?php
    while ( have_posts() ) :
        the_post();
        $content = get_post()->post_content;
        // check if content is empty
        if(!empty($content)) {
    ?>
        <section class="main-section">
            <div class="container">
                <div class="main-desc">
                    <?php
                        
                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        
                ?>
                </div>
            </div>
        </section>
    <?php
    }
    endwhile; // End of the loop.
    ?>
    <!-- /// Main Content -->

    <!-- Widget Area -->
    <?php 
    if ( is_active_sidebar( 'mwbc_widget_after_content' ) ) {
        dynamic_sidebar( 'mwbc_widget_after_content' ); 
    }
    ?>
    <!-- /// Widget Area -->

</main>
<?php
get_footer();

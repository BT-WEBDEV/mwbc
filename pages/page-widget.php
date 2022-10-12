<?php
/**
 * Template Name: Programs Page with widget Template
 *
 * Description: Programs Page with widget Template
 *
 * @package WordPress
 * @subpackage REDI
 * @since REDI 1.0
 */
get_header();

$server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]";

?>
<main id="primary" class="site-main">
    <h1 class="outline">Main</h1>

    <!-- Main Slider -->
    <section>
        <h1 class="outline">Slider</h1>
        <section>
            <div class="container-fluid p-0">
                <!-- Swiper -->
                <div class="swiper-container hero-swiper" aria-label="carousel">
                    <div class="swiper-wrapper" aria-label="carousel">
                        <div class="swiper-slide" aria-label="carousel">
                            <div class="view h-auto">
                                <img src="/wp-content/themes/MWBC/images/Programs-Page-Hero-Image.jpg" alt="Hero Image"
                                    class="img-fluid w-100 image-fit" aria-label="carousel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        
                        get_template_part( '/template-parts/content', 'page' );

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
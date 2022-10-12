<?php
/**
 * Template Name: Media Coverage
 *
 * Description: Media Coverage
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
        <?php 
            $slider_id = get_field("slider_id", $post->ID);
            $slider = mwbc_get_gallery($slider_id);
            if($slider) { 
                include get_template_directory() . '/template-parts/main-slider.php'; 
            } else {
				include get_template_directory() . '/template-parts/empty-slider.php'; 
			}
        ?>
    </section>
    <!-- #Main Slider -->

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
    <!-- #Main Content -->

    <!-- Additional Section -->
    <section>
        <div class="container py-default success-stories text-center">
            <h1 class="mb-1">MWBC SUCCESS STORIES</h1>
            <p class="mb-4">Hearing another entrepreneur’s journey can inspire you to push forward with your own. Listen to stories from our 2018 MWBC Awardees who represent promising businesses in a variety of fields.</p>
            <div class="row justify-content-center">
                <?php
                $args = array(  
                    'post_type' => 'success_stories',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC'
                );
                $success_stories = new WP_Query($args);
                while ( $success_stories->have_posts() ) : $success_stories->the_post();
                ?>
                <div class="col-sm-6 col-lg-4 story-wrapper">
                    <div class="story">
                        <a data-fancybox href="<?php echo get_field('video_url'); ?>">
                            <img class="img-fluid"
                                src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/placeholder.png"; ?>"
                                alt="<?php echo the_title(); ?>">
                        </a>
                        <?php the_content(); ?>
                        <div class="watch-video">
                            <a data-fancybox href="<?php echo get_field('video_url'); ?>">
                                <img src="<?php echo get_template_directory_uri()."/images/icons/arrow-right.svg" ?>"
                                    alt="Arrow Icon">
                                Watch video</a>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
    <!-- #Additional Section -->

    <!-- Widget Area -->
    <?php 
    if ( is_active_sidebar( 'mwbc_widget_after_content' ) ) {
        dynamic_sidebar( 'mwbc_widget_after_content' ); 
    }
    ?>
    <!-- #Widget Area -->

</main>
<?php
get_footer();
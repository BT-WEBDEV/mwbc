<?php
/**
 * Template Name: Press Releases
 *
 * Description: Press Releases
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
            if ($slider_id && $slider_id != '')
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
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2021 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2021',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2020 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2020',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2019 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2019',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2018 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2018',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2017 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2017',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2016 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2016',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container pb-default">
            <h2 class="mb-4 font-weight-medium">2015 Press Release</h2>
            <div class="row">
            <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'press-release-2015',
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/press-release-list.php'; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
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
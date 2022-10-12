<?php
/**
 * Template Name: Testimonials
 *
 * Description: Testimonials
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
        <div class="container py-default">
            <h2 class="mb-4">Testimonials</h2>
            <div class="row">
            <?php
            function pagination_bar( $custom_query ) {

                $total_pages = $custom_query->max_num_pages;
                $big = 999999999; // need an unlikely integer
            
                if ($total_pages > 1){
                    $current_page = max(1, get_query_var('paged'));
            
                    echo paginate_links(array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text' => '<span><img src="'.get_template_directory_uri().'/images/icons/arrow-left.svg" alt="Prev Page"></span>',
                        'next_text' => '<span><img src="'.get_template_directory_uri().'/images/icons/arrow-right.svg" alt="Next Page"></span>'
                    ));
                }
            }
    
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $args = array(  
                'post_type' => 'mwbc_testimonials',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 6,
                'paged' => $paged
            );

            $news = new WP_Query($args);

            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
            <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                <?php include get_template_directory() . '/template-parts/testimonials-list.php'; ?>
            </div>
            <?php
            endwhile;
            wp_reset_postdata(); 
            ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav id="news-pagination" class="pagination justify-content-center">
                        <h1 class="outline">Pagination</h1>
                        <?php pagination_bar( $news ); ?>
                    </nav>
                </div>
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
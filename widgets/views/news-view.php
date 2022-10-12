<div class="container py-default">
    <h2 class="mb-4"><?php echo $instance['title']; ?></h2>
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
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => ($instance['total_news_mwbc']) ? $instance['total_news_mwbc'] : '9',
            'category_name' => ($instance['catergory_news_mwbc']) ? $instance['catergory_news_mwbc'] : 'news',
            'paged' => $paged
        );

        $news = new WP_Query($args);

        if($news->have_posts()) {
            while ( $news->have_posts() ) : $news->the_post(); 
            ?>
                <div class="col-md-6 col-lg-4 pb-3 pb-md-4">
                    <?php include get_template_directory() . '/template-parts/news-list.php'; ?>
                </div>
            <?php
            endwhile;
            wp_reset_postdata(); 
        } else {
            ?>
                <div class="col-12 pb-3 pb-md-4">
                    <p>No current articles available. Please check back later!</p>
                </div>
            <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <nav id="news-pagination" class="pagination justify-content-center">
                <h1 class="outline">Pagination</h1>
                    <?php ($instance['total_news_mwbc'] == "") ? pagination_bar( $news ) : "" ; ?>
            </nav>
        </div>
    </div>
    <?php if($instance['link_news_mwbc']) { ?>
    <!-- <div class="text-center mt-4">
        <a href="<?php echo $instance['link_news_mwbc']; ?>" class="btn custom-btn z-depth-0">More News</a>
    </div> -->
    <?php } ?>
</div>
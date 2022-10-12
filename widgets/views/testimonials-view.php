<div class="background-blue-left testimonials-widget py-default">
    <h2 class="outline">Testimonials</h2>
    <div class="testimonials-swiper container">
        <div class="swiper-wrapper">
            <?php
                $args = array(  
                    'post_type' => 'mwbc_testimonials',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => $instance['total_testimonials_mwbc']
                );
                $testimonials = new WP_Query($args);
                while ( $testimonials->have_posts() ) : $testimonials->the_post();
            ?>
            <div class="swiper-slide">
                <div class="row">
                    <div class="col-md-4 slider-image">
                        <img class="d-block w-100"
                            src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/testimonials.jpg"; ?>"
                            alt="<?php echo the_title(); ?>">
                    </div>
                    <div class="col-md-8 slider-text">
                        <div>
                            <p class="h2">TESTIMONIALS</p>
                            <p><?php echo get_the_content(); ?></p>
                            <h4><?php echo get_the_title(); ?></h4>
                            <h5 class="text-l-blue"><?php echo get_field('position'); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata(); 
            ?>            
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"><img src="/wp-content/themes/MWBC/images/icons/arrow-right.svg" alt="Arrow Icon"></div>
        <div class="swiper-button-prev"><img src="/wp-content/themes/MWBC/images/icons/arrow-left.svg" alt="Arrow Icon"></div>
    </div>
    <div class="text-center">
        <a href="/testimonials" class="btn custom-btn z-depth-0 mt-4">SEE ALL</a>
    </div>    
</div>
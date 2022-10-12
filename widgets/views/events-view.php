<div class="container py-default">
    <h2 class="mb-4"><?php echo $instance['title']; ?></h2>
    <!-- Swiper -->
    <div class="swiper-container news-swiper">
        <div class="swiper-wrapper">
            <?php 
            $args = array(  
                'post_type' => array("tribe_events"),
                'post_status' => 'publish',
                'orderby'=>'_EventStartDate',
                // 'order'=>'DESC',
                'posts_per_page' => $instance['total_events_mwbc'],
                'category_name' => ($instance['catergory_events_mwbc']) ? $instance['catergory_events_mwbc'] : '',
            );

            $events = new WP_Query($args);

            while ( $events->have_posts() ) : $events->the_post(); ?>
            <div class="swiper-slide h-auto">
                <div class="events-list h-100 d-flex flex-column">
                    <div id="date">
                        <div id="day">
                            <?php 
                            if(tribe_get_end_date($events->ID, false, "d") == tribe_get_start_date($events->ID, false, "d")) {
                                echo tribe_get_start_date($events->ID, false, "d"); 
                            } else {
                                echo tribe_get_start_date($events->ID, false, "d"), "-", tribe_get_end_date($events->ID, false, "d");
                            }
                            ?>
                        </div>
                        <div id="month" class="text-uppercase">
                            <?php echo tribe_get_start_date($events->ID, false, "M, Y"); ?></div>
                    </div>
                    <div class="title flex-grow-1">
                        <a href="<?php the_permalink($post->ID); ?>">
                            <h5><?php echo wp_trim_words(get_the_title(), 5); ?></h5>
                        </a>
                    </div>
                    <div class="address mt-0">
                        <p class="mb-0">
                            <?php echo tribe_get_start_date($events->ID, false, "g:ia"), "-", tribe_get_end_date($events->ID, false, "g:ia") ?>
                        </p>
                        <?php if(tribe_get_address()) { ?>
                        <address><?php echo tribe_get_address(); ?></address>
                        <?php } ?>
                        <div class="read-more">
                            <a href="<?php the_permalink($post->ID); ?>">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
    <?php if($instance["link_events_mwbc"] != "") { ?>
    <div class="text-center mt-5">
        <a href="<?php echo $instance["link_events_mwbc"]; ?>" class="btn custom-btn z-depth-0">Learn More</a>
    </div>
    <?php } ?>
</div>
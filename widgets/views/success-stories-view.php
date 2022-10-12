<div class="container py-default success-stories text-center">
    <h1><?php echo $instance['title']; ?></h1>
    <p><?php echo $instance['success_stories_description_mwbc']; ?></p>
    <div class="row justify-content-center">
        <?php
            $args = array(  
                'post_type' => 'success_stories',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => ($instance['total_success_stories_mwbc'] > 0 ? $instance['total_success_stories_mwbc'] : 5)
            );
            $success_stories = new WP_Query($args);
            while ( $success_stories->have_posts() ) : $success_stories->the_post();
        ?>
                <div class="col-sm-6 col-lg-4 story-wrapper">
                    <div class="story">
                        <a data-fancybox href="<?php echo get_field('video_url'); ?>">
                            <img class="img-fluid" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/placeholder.png"; ?>" alt="<?php echo the_title(); ?>">
                        </a>
                        <?php the_content(); ?>
                        <div class="watch-video">
                            <a data-fancybox href="<?php echo get_field('video_url'); ?>">
                                <img src="<?php echo get_template_directory_uri()."/images/icons/arrow-right.svg" ?>" alt="Arrow Icon">
                                Watch video</a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        ?>  
    </div>
</div>
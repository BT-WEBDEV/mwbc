<div class="news-list h-100 d-flex flex-column">
    <div class="image">
        <a href="<?php the_permalink($post->ID); ?>">
            <img src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/placeholder.png"; ?>"
                class="img-fluid image-fit" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="content flex-grow-1">
        <a href="<?php the_permalink($post->ID); ?>">
            <h5 class="text-blue"><?php echo wp_trim_words(get_the_title(), 10); ?></h5>
        </a>
        <p class="m-0"><?php echo wp_trim_words(get_the_excerpt(), 30) ?></p>
    </div>
    <div class="footer d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="<?php echo get_template_directory_uri()."/images/icons/arrow-right.svg" ?>" alt="Arrow Right">
            <a href="<?php the_permalink($post->ID); ?>" class="text-blue">Read More</a>
        </div>
        <div class="d-flex align-items-center">
            <img src="<?php echo get_template_directory_uri()."/images/icons/calendar.svg" ?>" alt="Calendar">
            <p class="mb-0"><?php echo get_the_date('M d, Y'); ?></p>
        </div>
    </div>
</div>
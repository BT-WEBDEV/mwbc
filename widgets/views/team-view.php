<div class="container">
    <h1 class="text-center" id="our-team"><?php echo $instance['title']; ?></h1>
</div>
<?php
    $args = array(  
        'post_type' => 'team',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => ($instance['total_team_mwbc'] > 0 ? $instance['total_team_mwbc'] : 5)
    );
    $team = new WP_Query($args);
    $count = 1;
    while ( $team->have_posts() ) : $team->the_post();
        if($count % 2 != 0) {
            $background = "background-blue-right";
            $order1 = "order-md-1";
            $order2 = "order-md-2";
        } else {
            $background = "background-blue-left";
            $order1 = "order-md-2";
            $order2 = "order-md-1";
        }
?>
    <div class="<?php echo $background; ?>">
        <div class="container team-widget">        
            <div class="row">
                <div class="col-md-6 col-lg-5 image-col <?php echo $order2; ?>">
                    <img class="img-fluid image-fit" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/placeholder.png"; ?>" alt="<?php echo the_title(); ?>">
                </div>
                <div class="col-md-6 col-lg-7 text-col <?php echo $order1; ?>">
                    <div>
                        <h3><?php echo the_title(); ?></h3>
                        <p class="title"><?php echo get_field('position'); ?></p>
                        <?php echo the_content(); ?>
                        <p><img src="<?php echo $server; ?>/wp-content/uploads/2020/10/mail.svg" alt="Mail Icon"><a href="mailto:<?php echo get_field('email'); ?>">SEND A MESSAGE</a></p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
<?php
        $count++;
    endwhile;
    wp_reset_postdata(); 
?>
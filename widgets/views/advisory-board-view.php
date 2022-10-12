<div class="container py-default text-center">
    <h1><?php echo $instance['title']; ?></h1>
    <p><?php echo $instance['advisory_board_description_mwbc']; ?></p>
    <div class="row justify-content-center">
        <?php
            $args = array(  
                'post_type' => 'advisory_board',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => ($instance['total_advisory_board_mwbc'] > 0 ? $instance['total_advisory_board_mwbc'] : 8)
            );
            $advisory_board = new WP_Query($args);
            while ( $advisory_board->have_posts() ) : $advisory_board->the_post();
        ?>
            <div class="col-6 col-md-4 col-lg-3 profile-wrapper">
                <div class="profile">
                    <p class="name"><?php echo the_title(); ?></p>
                    <p class="chair"><?php echo (get_field('position') == '' ? '&nbsp;' : get_field('position')) ?></p>
                    <p><?php echo the_content(); ?></p>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata(); 
        ?>        
    </div>
</div>
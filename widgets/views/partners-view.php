<div class="container py-default partners-widget">
    <?php if($instance['title'] != "" || $instance['partners_description_mwbc'] != "") { ?>
    <div class="row mb-5 text-center">
        <div class="col-12">
            <?php if($instance['title'] != "") { ?>
                <h2 class="mb-5"><?php echo $instance['title']; ?></h2>
            <?php } ?>
            <?php if($instance['partners_description_mwbc'] != "") { ?>
                <p class="w-80 mx-auto"><?php echo $instance['partners_description_mwbc']; ?></p>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3" id="partners-tab" role="tablist">
                <?php
                    $args = array(  
                        'post_type' => 'partner_groups',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'posts_per_page' => ($instance['total_partners_mwbc'] > 0 ? $instance['total_partners_mwbc'] : 4)
                    );
                    $partners = new WP_Query($args);
                    $active = "active";
                    $tab_number = 1;
                    while ( $partners->have_posts() ) : $partners->the_post();
                ?>
                    <li class="nav-item">
                        <img src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri()."/images/placeholder.png"; ?>" alt="<?php echo the_title(); ?>">
                        <a class="nav-link <?php echo $active; ?>" id="<?php echo 'tab'.$tab_number; ?>-tab" data-toggle="pill" href="#<?php echo 'tab'.$tab_number; ?>" role="tab"
                            aria-controls="<?php echo 'tab'.$tab_number; ?>" aria-selected="true"><?php echo the_title(); ?></a>
                    </li>
                <?php
                        $active = "";
                        $tab_number++;
                    endwhile;
                ?>                
            </ul>
            <div class="tab-content" id="partners-tabContent">
                <?php
                    $active = "show active";
                    $tab_number = 1;
                    while ( $partners->have_posts() ) : $partners->the_post();
                ?>
                <div class="tab-pane fade <?php echo $active; ?>" id="<?php echo 'tab'.$tab_number; ?>" role="tabpanel" aria-labelledby="<?php echo 'tab'.$tab_number; ?>-tab">
                    <?php echo the_content(); ?>
                    <div class="row justify-content-center">
                        <?php 
                            $slider_id = get_field("slider_id");
                            if ($slider_id && $slider_id != '')
                                $slider = mwbc_get_gallery($slider_id);
                            if($slider) {
                                foreach ($slider as $key => $image) 
                                {  
                        ?>
                        <div class="col-6 col-sm-4 col-md-3 p-4 d-flex align-items-center">
                            <?php if(substr($image->alttext, 0, 4) == 'http') { ?>
                                <a href="<?php echo $image->alttext; ?>" target="_blank">
                                    <img class="img-fluid" src="<?php echo $image->path, $image->filename; ?>" alt="<?php echo $image->alttext; ?>">
                                </a>
                            <?php } else { ?>
                                <img class="img-fluid" src="<?php echo $image->path, $image->filename; ?>" alt="<?php echo $image->alttext; ?>">
                            <?php } ?>
                        </div>
                        <?php
                                } 
                            }
                        ?>
                    </div>
                </div>
                <?php
                        $active = "";
                        $tab_number++;
                    endwhile;
                    wp_reset_postdata(); 
                ?>
            </div>
            <?php echo do_shortcode('[sc name="social-links"]'); ?>
        </div>        
    </div>
</div>
<?php
    $background = "background-color: #003A70;";
    if ($instance['color_select'] == 'Red') {
        $background = "background-color: #8E1A1D;";
    }
?>
<div class="services-widget py-default" style="<?php echo $background; ?>">
    <div class="container">
        <div class="row justify-content-center">        
            <?php if($instance['title_1_services_mwbc'] != "") { ?>
            <div class="col-md-6 col-lg-4 service-wrapper">
                <div class="service">
                    <img style="<?php echo $background; ?>" src="<?php echo wp_get_attachment_image_src($instance['icon_1_services_mwbc'], 'full')[0]; ?>" alt="<?php echo $instance['title_1_services_mwbc']; ?>">
                    <h5><?php echo $instance['title_1_services_mwbc']; ?></h5>
                    <p><?php echo $instance['description_1_mwbc']; ?></p>
                    <div class="learn-more">
                        <img src="<?php echo $server; ?>/wp-content/themes/MWBC/images/icons/arrow-right-white.svg" alt="Arrow Icon"><a href="<?php echo $instance['link_1_services_mwbc']; ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($instance['title_2_services_mwbc'] != "") { ?>
            <div class="col-md-6 col-lg-4 service-wrapper">
                <div class="service">
                    <img style="<?php echo $background; ?>" src="<?php echo wp_get_attachment_image_src($instance['icon_2_services_mwbc'], 'full')[0]; ?>" alt="<?php echo $instance['title_2_services_mwbc']; ?>">
                    <h5><?php echo $instance['title_2_services_mwbc']; ?></h5>
                    <p><?php echo $instance['description_2_mwbc']; ?></p>
                    <div class="learn-more">
                        <img src="<?php echo $server; ?>/wp-content/themes/MWBC/images/icons/arrow-right-white.svg" alt="Arrow Icon"><a href="<?php echo $instance['link_2_services_mwbc']; ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($instance['title_3_services_mwbc'] != "") { ?>
            <div class="col-md-6 col-lg-4 service-wrapper">
                <div class="service">
                    <img style="<?php echo $background; ?>" src="<?php echo wp_get_attachment_image_src($instance['icon_3_services_mwbc'], 'full')[0]; ?>" alt="<?php echo $instance['title_3_services_mwbc']; ?>">
                    <h5><?php echo $instance['title_3_services_mwbc']; ?></h5>
                    <p><?php echo $instance['description_3_mwbc']; ?></p>
                    <div class="learn-more">
                        <img src="<?php echo $server; ?>/wp-content/themes/MWBC/images/icons/arrow-right-white.svg" alt="Arrow Icon"><a href="<?php echo $instance['link_3_services_mwbc']; ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
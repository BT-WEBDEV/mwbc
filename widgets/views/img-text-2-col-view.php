<?php
    $order1 = " order-md-1";
    $order2 = " order-md-2";
    $margin = "";
    if ($instance['checkbox_image_text_2_col_mwbc'] == 1) {
        $order1 = " order-md-2";
        $order2 = " order-md-1";
        $margin = " ml-auto";
    }; 
?>

<div class="container py-default">
    <div class="row align-items-center img-text-2-col">
        <div class="col-md-6 <?php echo $order2; ?>">
            <div class="image">
                <img src="
                <?php  
                    if(wp_get_attachment_image_src($instance['Image_image_text_2_col_mwbc'], 'full')[0]) {
                        echo wp_get_attachment_image_src($instance['Image_image_text_2_col_mwbc'], 'full')[0];
                    } else {
                        echo get_template_directory_uri()."/images/placeholder.jpg";
                    }              
                ?>" 
                alt="<?php echo $instance['title'] ?>" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 <?php echo $order1; ?>">
            <div class="content <?php echo $margin; ?>">
                <?php if($instance['title'] != "" ) { ?>
                    <h2><?php echo $instance['title']; ?></h2>
                <?php } ?>
                <p><?php echo do_shortcode($instance['Description_image_text_2_col_mwbc']); ?></p>

                <?php if($instance['Link_image_text_2_col_mwbc']) { ?>
                <div class="mt-4">
                    <a href="<?php echo $instance['Link_image_text_2_col_mwbc']; ?>" class="btn custom-btn z-depth-0" <?php echo ($instance['New_window_image_text_2_col_mwbc'] == 1) ? " target='_blank'" : ""; ?> >Learn More</a>
                </div>
                <?php } ?>
            </div>
        </div>        
    </div>
</div>
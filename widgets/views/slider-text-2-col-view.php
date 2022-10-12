<div class="container py-default">
    <div class="row align-items-center slider-img-2-col">
        <div class="col-md-8">
            <!-- Swiper -->
            <div class="swiper-container main-swiper" aria-label="carousel">
                <div class="swiper-wrapper" aria-label="carousel">
                    <?php 
                    $slider = mwbc_get_gallery($instance['Slider_ID_slider_text_2_col']);
                    if($slider) {
                        foreach ($slider as $key => $image) { 
                    ?>
                        <div class="swiper-slide" aria-label="carousel">
                            <div>
                                <img src="<?php echo $image->path, $image->filename; ?>" alt="<?php echo $image->alttext; ?>"
                                    class="img-fluid"  aria-label="carousel">
                            </div>
                        </div>
                    <?php } } ?>
                </div>
                <?php if(count($slider) > 1) { ?>
                    <div class="swiper-pagination"></div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content">
                <h2><?php echo $instance['title'] ?></h2>
                <p><?php echo do_shortcode($instance['Description_slider_text_2_col']); ?></p>

                <?php if($instance['Link_slider_text_2_col']) { ?>
                <div class="mt-4">
                    <a href="<?php echo $instance['Link_slider_text_2_col']; ?>" class="btn custom-btn z-depth-0" <?php echo ($instance['New_window_slider_text_2_col']==1) ? " target='_blank'" : ""; ?>>Learn
                        More</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
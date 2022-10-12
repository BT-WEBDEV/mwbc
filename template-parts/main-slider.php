<?php
/**
 * Template part for displaying Main slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package REDI
 */

?>
<section>
    <div class="container-fluid p-0">
        <!-- Swiper -->
        <div class="swiper-container hero-swiper" aria-label="carousel">
            <div class="swiper-wrapper" aria-label="carousel">
                <?php console_log($slider_id); ?>
                <?php foreach ($slider as $key => $image) { ?>
                <div class="swiper-slide" aria-label="carousel">
                    <div class="view">
                        <img src="<?php echo $image->path, $image->filename; ?>" alt="<?php echo $image->alttext; ?>"
                            class="img-fluid w-100 image-fit" aria-label="carousel">
                        <div class="mask rgba-black-light">
                            <?php if($slider_id == 4) { ?>
                            <img class="w-100 align-self-center mx-auto" src="/wp-content/themes/MWBC/images/programs.svg" alt="<?php echo $image->alttext; ?>">
                            <?php } else { ?>
                                <?php if($image->description || $image->title) { ?>
                                    <div class="content container">
                                        <p><?php echo $image->alttext; ?></p>
                                        <h1><?php echo $image->description; ?></h1>
                                    </div>
                                <?php } ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
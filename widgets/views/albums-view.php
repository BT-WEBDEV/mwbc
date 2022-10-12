<div class="container py-default albums-widget">
    <div class="text-left">
        <h2>FACEBOOK ALBUMS</h2>
    </div>
    <!-- Swiper -->
    <div class="swiper-container albums-swiper">
        <div class="swiper-wrapper">
            <?php for ($i=1; $i <= 12; $i++) { ?>
            <div class="swiper-slide h-auto">
                <div class="image d-flex align-items-center">
                    <a href="<?php echo $server; ?>/wp-content/uploads/2021/01/fbphoto<?php echo $i; ?>.jpg" data-fancybox="ablum">
                        <img class="img-fluid img-fit"
                            src="<?php echo $server; ?>/wp-content/uploads/2021/01/fbphoto<?php echo $i; ?>.jpg"
                            alt="News Title">
                    </a>
                </div>
                <!-- <div class="albums-desc">
                    <span>MEET THE LEGISLATORS</span>
                    <span class="text-l-blue">13 items</span>
                </div> -->
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="albums-desc justify-content-end mt-2">
        <a target="_blank" href="https://www.facebook.com/Marylandwbc/photos/?tab=photos_albums">See Albums <img
                src="<?php echo get_template_directory_uri()."/images/icons/arrow-right.svg" ?>" alt="Arrow Icon"></a>
    </div>
</div>
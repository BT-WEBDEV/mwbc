<div class="background-blue-right py-default keynote-speaker-widget mb-3 mb-lg-5">
    <div class="container">        
        <div class="row">
            <div class="col-md-6 col-lg-7 text-col">
                <div>
                    <h3><?php echo $instance['title']; ?></h3>
                    <p class="title"><?php echo $instance['keynote_speaker_name_mwbc']; ?></p>
                    <p><?php echo $instance['keynote_speaker_description_mwbc']; ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 image-col">
                <img class="img-fluid image-fit" src="
                <?php  
                    if(wp_get_attachment_image_src($instance['keynote_speaker_media_mwbc'], 'full')[0]) {
                        echo wp_get_attachment_image_src($instance['keynote_speaker_media_mwbc'], 'full')[0];
                    } else {
                        echo get_template_directory_uri()."/images/placeholder.jpg";
                    }              
                ?>" 
                alt="<?php echo $instance['keynote_speaker_name_mwbc'] ?>" class="img-fluid">
            </div>                                
        </div>
    </div>
</div>
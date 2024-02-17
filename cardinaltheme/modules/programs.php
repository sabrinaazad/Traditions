<section class="section section--programs full-width" style="background-color: <?php the_sub_field('background_color'); ?>;" id="<?php echo the_sub_field('id')?>">
    <div class="section-wrapper">
        <div class="heading-wrapper">

            <?php $subheading = get_sub_field('subheading');
            if ($subheading) : ?>
                <div class="subheading"><?php echo $subheading; ?></div>
            <?php endif;
            
            $heading = get_sub_field('heading');
            if ($heading) : ?>
                <h2 class="heading alt"><?php echo $heading; ?></h2>
            <?php endif;

            $blurb = get_sub_field('blurb');
            if ($blurb) : ?>
                <p class="blurb"><?php echo $blurb; ?></p>
            <?php endif; ?>
            
        </div>
        <div class="programs-slider">
        
            <?php if (have_rows('programs')) : ?> 
                <?php while (have_rows('programs')) : the_row(); ?>
                    <div class="program">
                        <div class="image-wrapper" style="background-image: url('<?php the_sub_field('featured_image'); ?>')"></div>
                        <div class="content">
                            <h4 class="title"><?php the_sub_field('title'); ?></h4>
                            <div class="blurb"><?php the_sub_field('blurb'); ?></div>
                            <?php $button = get_sub_field('button');
                            if ($button) :
                                $button_url = $button['url'];
                                $button_title = $button['title'];
                                $button_target = $button['target'] ? $button['target'] : '_self';
                            ?>
                            <div class="button-wrapper">
                                <a class="btn btn-primary" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
    
            <?php endif; ?>
        </div>
    </div>
</section>
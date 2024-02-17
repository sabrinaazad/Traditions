<section class="section section--tiles full-width" style="background-color:<?php echo get_sub_field('background_color'); ?>" id="<?php echo the_sub_field('id'); ?>">
    <div class="section-wrapper">
        <?php $subheading = get_sub_field('subheading');
        if( $subheading ): ?>
            <h2 class="subheading left-aligned"><?php echo $subheading; ?></h2>
        <?php endif; ?>

        <?php $heading = get_sub_field('heading');
        if( $heading ): ?>
            <h2 class="heading alt left-aligned"><?php echo $heading; ?></h2>
        <?php endif; ?>

        <?php $blurb = get_sub_field('blurb');
        if( $blurb ): ?>
            <p class="blurb"><?php echo $blurb; ?></p>
        <?php endif; ?>
        <?php if (have_rows('slider')) : ?>
            <div class="tiles-slider">
                <?php while (have_rows('slider')) : the_row(); ?>
                    <?php 
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    ?>  
                    <?php if (get_sub_field('link')) : ?>
                        <a class="tile link" href="<?php the_sub_field('link') ?>">
                            <div class="image-wrapper"> 
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                            </div>
                            <h4 class="title"><?php the_sub_field('title'); ?></h4>
                        </a>
                    <?php else: ?>
                        <div class="tile">
                            <div class="image-wrapper"> 
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                            </div>
                            <h4 class="title"><?php the_sub_field('title'); ?></h4>  
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
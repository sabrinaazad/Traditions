<section class="section section--testimonials-side-by-side full-width" id="<?php echo the_sub_field('id')?>" style="background-color: <?php echo the_sub_field('background_color'); ?>;">
    <div class="section-wrapper">
        <div class="two-col">
            <?php if (have_rows('left')) : while (have_rows('left')) : the_row(); ?>
                <div class="col">

                <?php $subheading = get_sub_field('subheading');
                if( $subheading ): ?>
                    <h2 class="subheading left-aligned"><?php echo $subheading; ?></h2>
                <?php endif; ?>

                <?php $heading = get_sub_field('heading');
                if( $heading ): ?>
                    <h2 class="heading alt left-aligned"><?php echo $heading; ?></h2>
                <?php endif; ?>

                <?php if (have_rows('slider')) : ?> 
                    <div class="testimonials-slider">
                        <?php while (have_rows('slider')) : the_row(); ?>
                            <div class="slide">
                                <?php $blurb = get_sub_field('blurb');
                                if( $blurb ): ?>
                                    <p class="blurb"><?php echo $blurb; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?> 
                    </div>
                 <? endif; ?>
                </div>    
            <?php endwhile; else :  endif; ?>
            
            <?php if (have_rows('right')) : while (have_rows('right')) : the_row(); ?>
                <div class="col">
                    <?php $image = get_sub_field('image');
                    if( ($image) ): ?>
                    <div class="image-wrapper"> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                    <?php endif; ?>
                </div>              
            <?php endwhile; else :  endif; ?>
        </div>
</div>
</section>
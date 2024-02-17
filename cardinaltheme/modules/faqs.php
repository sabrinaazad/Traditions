<section class="section section--faqs full-width" style="background-color: <?php echo the_sub_field('background_color'); ?>;" id="<?php echo the_sub_field('id')?>">
<div class="section-wrapper">
    <div class="two-col">
        <?php if (have_rows('left')) : while (have_rows('left')) : the_row(); ?>
            <div class="col">
                <?php $subheading = get_sub_field('subheading');
                if( $subheading ): ?>
                    <h4 class="subheading"><?php echo $subheading; ?></h4>
                <?php endif; ?>

                <?php $heading = get_sub_field('heading');
                    if( $heading ): ?>
                        <h2 class="heading alt"><?php echo $heading; ?></h2>
                <?php endif; ?>

                <?php $blurb = get_sub_field('blurb');
                    if( $blurb ): ?>
                        <p class="blurb"><?php echo $blurb; ?></p>
                <?php endif; ?>
                
                <?php $image = get_sub_field('image');
                if( ($image) ): ?>
                <div class="image-wrapper"> 
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
                <?php endif; ?>
            </div>          
        <?php endwhile; else :  endif; ?>
        
        <?php if (have_rows('right')) : while (have_rows('right')) : the_row(); ?>
            <div class="col">
                <?php if (have_rows('faq')) : ?>
                    <div class="faqs-wrapper">
                        <?php while (have_rows('faq')) : the_row(); ?>
                            <div class="faq">
                                    <button id="button">
                                        <span></span>
                                    </button>
                                <h4 class="question"><?php the_sub_field("question") ?></h4>
                                <div class="answer"><?php the_sub_field("answer") ?></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : endif; ?> 
            </div>         
        <?php endwhile; else :  endif; ?>
    </div>
    </div>
</section>
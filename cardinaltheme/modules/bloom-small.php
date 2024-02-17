<?php
if (get_sub_field('center')) {
    $center = "align--center";
} else {
    $center = "";
}
?>
<section class="section section--bloom-small full-width" style="background-color:<?php echo the_sub_field('background_color'); ?>;" id="<?php echo the_sub_field('id')?>">
    <div class="section-wrapper">
        <div class="two-col">
            <?php if (have_rows('left')) : while (have_rows('left')) : the_row(); ?>
                <div class="col">
                    <div class="title"><?php echo the_sub_field('title'); ?></div>
                    <?php if (have_rows('bloom_pedals')) : ?> 
                        <div class="bloom-slider">
                        <?php while (have_rows('bloom_pedals')) : the_row(); ?>
                            <div class="pedal">
                                <?php echo the_sub_field('pedal'); ?>
                            </div>  
                        <?php endwhile; ?> 
                        </div>
                    <? endif; ?>
                </div>          
            <?php endwhile; else :  endif; ?>
            
            <?php if (have_rows('right')) : while (have_rows('right')) : the_row(); ?>
                <div class="col">
                    <div class="section-wrapper">

                        <?php $subheading = get_sub_field('subheading');
                        if( $subheading ): ?>
                            <h2 class="subheading"><?php echo $subheading; ?></h2>
                        <?php endif; ?>

                        <?php $heading = get_sub_field('heading');
                        if( $heading ): ?>
                            <h2 class="heading alt"><?php echo $heading; ?></h2>
                        <?php endif; ?>

                        <?php $blurb = get_sub_field('blurb');
                        if( $blurb ): ?>
                            <p class="blurb"><?php echo $blurb; ?></p>
                        <?php endif; ?>
                        
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
            <?php endwhile; else :  endif; ?>
        </div>
</div>
</section>
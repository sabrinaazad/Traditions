<?php
if (get_sub_field('alternate')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
?>
<section class="section section--banner-cta full-width <?php echo $alternate ?>" style="background-image:url(<?php echo the_sub_field('background_image'); ?>)" id="<?php echo the_sub_field('id')?>">
    <div class="section-wrapper">
        
        <?php $subheading = get_sub_field('subheading');
            if( $subheading ): ?>
                <h4 class="subheading"><?php echo $subheading; ?></h4>
        <?php endif; ?>

        <?php $heading = get_sub_field('heading');
            if( $heading ): ?>
                <h2 class="heading"><?php echo $heading; ?></h2>
        <?php endif; ?>

        <?php $blurb = get_sub_field('blurb');
            if( $blurb ): ?>
                <p class="blurb"><?php echo $blurb; ?></p>
        <?php endif; ?>

        <?php if (have_rows('list')) : ?> 
            <ul class="list">
                <?php while (have_rows('list')) : the_row(); ?>
                    <li>
                        <?php the_sub_field('list_item'); ?>
                    </li>  
                <?php endwhile; ?> 
            </ul>
        <? endif; ?>

        <?php $button = get_sub_field('button');
            if( $button ): 
            $button_url = $button['url'];
            $button_title = $button['title'];
            $button_target = $button['target'] ? $button['target'] : '_self';
            ?>
        <div class="button-wrapper">       
            <a class="btn btn-primary" href="<?php echo $button_url ?>" target="<?php echo $button_target ?>"><?php echo $button_title ?></a>     
        </div>  
        <?php endif; ?>

    </div>
</section>
<?php
if (get_sub_field('reverse')) {
    $reverse = "reverse";
} else {
    $reverse = "";
}
if (get_sub_field('center')) {
    $center = "align--center";
} else {
    $center = "";
}
?>
<section class="section section--side-by-side full-width <?php echo $reverse ?>" style="background-image:url(<?php echo the_sub_field('background_image'); ?>); background-color: <?php echo the_sub_field('background_color'); ?>;" id="<?php echo the_sub_field('id')?>">
    <div class="section-wrapper">
        <div class="heading-wrapper align--center">
            
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
        </div>
        <div class="two-col">
            <?php if (have_rows('left')) : while (have_rows('left')) : the_row(); ?>
                <div class="col">
                    <?php $image = get_sub_field('image');
                    if( ($image) ): ?>
                    <div class="image-wrapper"> 
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                    <?php endif; ?>
                    <?php $mapembed = get_sub_field('map_embed');
                    if( ($mapembed) ): ?>
                    <div class="mapembed-wrapper"> 
                        <?php echo $mapembed ?>
                    </div>
                    <?php endif; ?>
                </div>          
            <?php endwhile; else :  endif; ?>
            
            <?php if (have_rows('right')) : while (have_rows('right')) : the_row(); 
                $listType = get_sub_field('list_or_list_with_icons');
                $oneOrTwo = get_sub_field('one_or_two');
                if ( $oneOrTwo == "One Column" ) {
                    $oneOrTwo = "one-column";
                } else {
                    $oneOrTwo = "two-column";
                }
            ?>
                <div class="col">
                    <div class="section-wrapper <?php echo $center ?>">

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

                        <?php if( $listType == "List" ): ?>
                            <?php if (have_rows('list_only')) : ?> 
                                <ul class="list only">
                                    <?php while (have_rows('list_only')) : the_row(); ?>
                                        <li>
                                            <?php the_sub_field('list_item'); ?>
                                        </li>  
                                    <?php endwhile; ?> 
                                </ul>
                            <? endif; ?>
                        <?php else: ?>
                            <?php if (have_rows('list')) : ?> 
                                <ul class="list <?php echo $oneOrTwo; ?>">
                                    <?php while (have_rows('list')) : the_row(); ?>
                                        <li>
                                            <?php $icon = get_sub_field('icon'); ?>
                                            <div class="image-wrapper"> 
                                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                            </div>
                                            <div class="list-item-wrapper"> <?php the_sub_field('list_item'); ?></div>
                                        </li>  
                                    <?php endwhile; ?> 
                                </ul>
                            <? endif; ?>
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
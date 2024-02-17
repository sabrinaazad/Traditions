<?php 
if (get_sub_field('border')) {
    $border = "border";
} else {
    $border = "";
}
?>
<section class="section section--panels full-width" style="background-color:<?php echo get_sub_field('background_color'); ?>" id="<?php echo the_sub_field('id'); ?>">
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
            <div class="panels-slider">
                <?php while (have_rows('slider')) : the_row(); ?>
                    <?php 
                    $title = get_sub_field('title');
                    $icon = get_sub_field('icon');
                    $image = get_sub_field('image');
                    $blurb = get_sub_field('blurb');
                    ?>  
                    <?php if (get_sub_field('link')) : ?>
                        <a class="panel link <?php echo $border; ?>" href="<?php the_sub_field('link') ?>">
                            <div class="content">
                            
                                <div class="hover-image-wrapper" style="background-image: url(<?php echo $image; ?>);"> </div>  
                                <div class="image-wrapper"> 
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                </div>
                                <h4 class="title"><?php the_sub_field('title'); ?></h4>
                                <p class="blurb"><?php echo $blurb; ?></p>
                            </div>
                        </a>
                    <?php else: ?>
                        <div class="panel <?php echo $border; ?>">
                            <div class="content">
                                <div class="image-wrapper"> 
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                </div>
                                <h4 class="title"><?php the_sub_field('title'); ?></h4>
                                <p class="blurb"><?php echo $blurb; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
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
</section>
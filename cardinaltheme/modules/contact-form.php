<?php
if (get_sub_field('alternate')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
if (get_sub_field('gray')) {
    $gray = "gray";
} else {
    $gray = "";
}
?>
<section class="section section--contact-form full-width no-padded-sides <?php echo $alternate ?> <?php echo $gray ?>" id="<?php echo the_sub_field('id')?>">
    <div class="two-col">
        <?php if (have_rows('left')) : ?>
            <?php while (have_rows('left')) : the_row(); ?>
                <div class="col">

                    <?php $image = get_sub_field('image');
                    if (($image)) : ?>
                        <div class="image-wrapper" style="background-image: url(<?php echo $image ?>);">
                        </div>
                    <?php endif; ?>
                    <div class="content-wrapper">
                        <div class="content">
                            <?php $subheading = get_sub_field('subheading');
                            if ($subheading) : ?>
                                <div class="subheading"><?php echo $subheading; ?></div>
                            <?php endif; ?>

                            <?php $heading = get_sub_field('heading');
                            if ($heading) : ?>
                                <h2 class="heading"><?php echo $heading; ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('right')) : ?>
            <?php while (have_rows('right')) : the_row(); ?>
                <div class="col">
                    <div class="section-wrapper">

                        <?php $blurb = get_sub_field('blurb');
                        if ($blurb) : ?>
                            <p class="blurb"><?php echo $blurb; ?></p>
                        <?php endif; ?>
                        
                        <?php echo get_sub_field('form'); ?>

                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
     
                
    </div>
</section>
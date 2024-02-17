<?php
if (get_sub_field('alternate')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
?>
<section class="section section--statistics full-width <?php echo $alternate ?>" style="background-image:url(<?php the_sub_field('background_image'); ?>);" id="<?php echo the_sub_field("id") ?>">
    <div class="section-wrapper">
        <?php if (get_sub_field("subheading")) : ?><div class="subheading"><?php the_sub_field("subheading"); ?></div><?php endif; ?>
        <?php if (get_sub_field("heading")) : ?><h2 class="heading"><?php the_sub_field("heading"); ?></h2><?php endif; ?>
        <?php if (get_sub_field("blurb")) : ?><p class="blurb"><?php the_sub_field("blurb"); ?></p><?php endif; ?>
        <div class="panels">
            <?php if (have_rows('panels')) : $count=0; while (have_rows('panels')) : the_row(); ?>
                    <div id="counter<?php echo $count ?>" class="panel">
                    <?php if (get_sub_field('icon')) : ?><img class="icon" src="<?php the_sub_field('icon'); ?>" alt="icon" /><?php endif; ?>
                    <?php if (get_sub_field('number')) : ?><h3 class="number"><?php the_sub_field('number'); ?><span><?php the_sub_field('symbol'); ?></span></h3><?php endif; ?>
                    <?php if (get_sub_field('title')) : ?><div class="title"><?php the_sub_field('title'); ?></div><?php endif; ?>
                    </div>
            <?php $count++; endwhile; else : endif; ?>
        </div>
        <?php if (get_sub_field("footnote")) : ?><sub class="footnote"><?php the_sub_field("footnote"); ?></sub><?php endif; ?>
    </div>
</section>
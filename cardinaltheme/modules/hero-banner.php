<?php
if (get_sub_field('alternate')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
?>
<section class="section section--hero-banner full-width <?php echo $alternate ?>" style="background-image: url(<?php the_sub_field('background_image'); ?>);" id="<?php echo the_sub_field('id')?>">
	<div class="section-wrapper">
    <div class="heading-wrapper">
        <?php $heading = get_sub_field('heading');
        if ($heading) : ?>
            <h1 class="heading align--center"><?php echo $heading; ?></h1>
        <?php endif; ?>

        <?php $blurb = get_sub_field('blurb');
        if ($blurb) : ?>
            <p class="blurb align--center"><?php echo $blurb; ?></p>
        <?php endif; ?>

        <?php $button = get_sub_field('button');
        if ($button) :
            $link_url = $button['url'];
            $link_title = $button['title'];
            $link_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <div class="button-wrapper align--center">
            <a class="btn btn-primary" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
        </div>
        <?php endif; ?>
    </div>
    </div>
</section>
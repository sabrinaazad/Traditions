<section class="section section--hero-location full-width" style="background-image: url(<?php the_sub_field('background_image'); ?>);" id="<?php echo the_sub_field('id')?>">
	<div class="section-wrapper">
        <?php $heading = get_sub_field('hero_heading');
        if ($heading) : ?>
            <h1 class="heading align--center"><?php echo $heading; ?></h1>
        <?php endif; ?>

        <?php $blurb = get_sub_field('hero_blurb');
        if ($blurb) : ?>
            <p class="blurb"><?php echo $blurb; ?></p>
        <?php endif; ?>

        <?php $button = get_sub_field('hero_button');
        if ($button) :
            $link_url = $button['url'];
            $link_title = $button['title'];
            $link_target = $button['target'] ? $button['target'] : '_self';
        ?>
        <div class="button-wrapper">
            <a class="btn btn-primary" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
        </div>
        <?php endif; ?>
        <div class="panels">
            <div class="panel">
                <?php $image1 = get_sub_field('icon1');
                if( ($image1) ): ?>
                   <div class="image-wrapper"> 
                       <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                   </div>
                <?php endif; ?>
                <div>
                    <?php if(get_sub_field("phone")) : ?><h4>Phone Number:</h4><a href="tel:<?php the_sub_field("phone"); ?>"><?php the_sub_field("phone"); ?></a><?php endif; ?>
                    <?php if(get_sub_field("fax")) : ?><h4>Fax Number:</h4><a href="tel:<?php the_sub_field("fax"); ?>"><?php the_sub_field("fax"); ?></a><?php endif; ?>
                    <?php if(get_sub_field("email")) : ?><h4>Email Address:</h4><a href="mailto:<?php the_sub_field("email"); ?>"><?php the_sub_field("email"); ?></a><?php endif; ?>
                </div>
            </div>
            <div class="panel">
                <?php $image2 = get_sub_field('icon2');
                if( ($image2) ): ?>
                   <div class="image-wrapper"> 
                       <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                   </div>
                <?php endif; ?>
                <?php if(get_sub_field("address")) : ?>
                    <div class="address"><h4>Address:</h4><?php the_sub_field("address"); ?></div>
                <?php endif; ?>
                <?php $button = get_sub_field('directions');
                if ($button) :
                    $link_url = $button['url'];
                    $link_title = $button['title'];
                    $link_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <div class="button-wrapper">
                    <a class="btn btn-primary" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
                </div>
                <?php endif; ?>
            </div>
            <div class="panel">
            <?php $image3 = get_sub_field('icon3');
                if( ($image3) ): ?>
                   <div class="image-wrapper"> 
                       <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
                   </div>
                <?php endif; ?>
                <?php if(get_sub_field("hours")) : ?>
                    <div class="hours"><h4>Hours of Operation:</h4><?php the_sub_field("hours"); ?></div>
                <?php endif; ?> 
            </div>
            <div class="panel">
                <?php $image4 = get_sub_field('icon4');
                if( ($image4) ): ?>
                   <div class="image-wrapper"> 
                       <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" />
                   </div>
                <?php endif; ?>
                <?php if(get_sub_field("blurb")) : ?>
                    <h4>Request Care</h4><?php the_sub_field("blurb"); ?>
                <?php endif; ?> 
                <?php $button = get_sub_field('button');
                if ($button) :
                    $link_url = $button['url'];
                    $link_title = $button['title'];
                    $link_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <div class="button-wrapper">
                    <a class="btn btn-primary" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
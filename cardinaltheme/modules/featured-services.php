<section class="section section--featured-services full-width" id="<?php echo the_sub_field('id') ?>" style="background-color: <?php echo the_sub_field('background_color'); ?>;">
    <div class="section-wrapper">
        <div class="heading-wrapper">
            <?php $subheading = get_sub_field('subheading');
            if ($subheading) : ?>
                <h2 class="subheading"><?php echo $subheading; ?></h2>
            <?php endif; ?>

            <?php $heading = get_sub_field('heading');
            if ($heading) : ?>
                <h2 class="heading alt"><?php echo $heading; ?></h2>
            <?php endif; ?>

            <?php $blurb = get_sub_field('blurb');
            if ($blurb) : ?>
                <p class="blurb"><?php echo $blurb; ?></p>
            <?php endif; ?>
        </div>
        <?php if (have_rows('services')) : ?> 
            <div class="featured-services-slider">
                <?php while (have_rows('services')) : the_row(); ?>
                <?php if (get_sub_field('link')) : ?>
                <a class="service" href="<?php echo the_sub_field('link');  ?>">
                    <div class="image-wrapper"><img src="<?php echo the_sub_field('image');  ?>" alt="image"></div>
                    <div class="content">
                        <div class="icon-wrapper"><img src="<?php echo the_sub_field('icon');  ?>" alt="image"></div>
                        <div class="text-wrapper">
                            <h4 class="heading"><?php echo the_sub_field('title'); ?></h4>
                            <?php $blurb = get_sub_field('blurb');
                            if( $blurb ): ?>
                                <p class="blurb"><?php echo $blurb; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <?php else: ?>
                <div class="service">
                    <div class="image-wrapper"><img src="<?php echo the_sub_field('image');  ?>" alt="image"></div>
                    <div class="content">
                        <div class="icon-wrapper"><img src="<?php echo the_sub_field('icon');  ?>" alt="image"></div>
                        <div class="text-wrapper">
                            <h4 class="heading"><?php echo the_sub_field('title'); ?></h4>
                            <?php $blurb = get_sub_field('blurb');
                            if( $blurb ): ?>
                                <p class="blurb"><?php echo $blurb; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endwhile; ?> 
            </div>
         <? endif; ?>

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
</section>
<section class="section section--anchors" id="<?php echo the_sub_field('id'); ?>">
    <div class="section-wrapper">

        <?php if (have_rows('anchors')) : ?>

            <div class="anchor-slider">

                <?php while (have_rows('anchors')) : the_row(); ?>

                    <a class="anchor-box" href="#<?php echo the_sub_field('id') ?>">
                        <div class="hover-image-wrapper" style="background-image: url(<?php echo the_sub_field('hover_image'); ?>);"></div>  
                        <img src="<?php echo the_sub_field('icon') ?>" alt="icon" />
                        <h4 class="heading alt"><?php echo the_sub_field('title') ?></h4>
                    </a>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>

    </div>

</section>
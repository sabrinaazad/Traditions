<section class="section section--levels full-width" style="background-color:<?php echo the_sub_field('background_color'); ?>;" id="<?php echo the_sub_field('id'); ?>">
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
        <?php if (have_rows('levels')) : ?>

            <div class="levels-slider">

                <?php while (have_rows('levels')) : the_row(); ?>

                    <div class="level-box">
                        <h3 class="number"><?php echo the_sub_field('number') ?></h3>
                        <h4 class="title"><?php echo the_sub_field('title') ?></h4>
                        <p class="blurb"><?php echo the_sub_field('blurb') ?></p>
                        <div class="hover-content">
                            <p class="blurb"><?php echo the_sub_field('hover_content') ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>
    </div>
</section>
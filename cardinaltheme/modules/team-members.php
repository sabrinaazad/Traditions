<section class="section section--team-members full-width" style="background-color: <?php the_sub_field('background_color'); ?>" id="<?php echo the_sub_field('id')?>">
<div class="section-wrapper">    
    <div class="heading-wrapper">

        <?php $subheading = get_sub_field('subheading');
        if ($subheading) : ?>
            <div class="subheading"><?php echo $subheading; ?></div>
        <?php endif;

        $heading = get_sub_field('heading');
        if ($heading) : ?>
            <h2 class="heading alt"><?php echo $heading; ?></h2>
        <?php endif;

        $blurb = get_sub_field('blurb');
        if ($blurb) : ?>
            <p class="blurb"><?php echo $blurb; ?></p>
        <?php endif; ?>

    </div>
    <div class="team-grid">
        <?php
        $args = array(
            'post_type' => 'team-members',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order'   => 'ASC',
            'posts_per_page' => -1
        );

        $loop = new WP_Query($args);
        ?>
        <?php if ($loop->have_posts()) : ?>
            <div class="team-slider-2">

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div class="slide">
                        <div class="image-wrapper"><?php the_post_thumbnail(); ?></div>
                    </div>

                <?php endwhile; ?>

            </div>
        <?php else : ?>

            <p>Sorry, no posts exist.</p>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
        $args = array(
            'post_type' => 'team-members',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order'   => 'ASC',
            'posts_per_page' => -1
        );

        $loop = new WP_Query($args);
        ?>
        <?php if ($loop->have_posts()) : ?>
            <div class="team-slider">
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div class="slide">
                        <div class="image-wrapper"><?php the_post_thumbnail(); ?></div>
                        <div class="content">
                            <h3 class="heading alt uppercase"><?php echo the_title(); ?></h3>
                            <div class="title"><?php echo the_field("title"); ?></div>
                            <?php echo the_excerpt(); ?>
                            <!-- <a class="btn btn-primary" href="<?php the_permalink() ?>">Read Full Bio</a> -->
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        <?php else : ?>

            <p>Sorry, no posts exist.</p>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
</section>
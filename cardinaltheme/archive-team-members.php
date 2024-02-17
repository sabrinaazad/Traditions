<?php get_header();
/* Template Name: Team Members Archive Template */
?>
<?php $args = array(
    'p' => 765,
    'post_type' => 'any'
);
$page_fields = new WP_Query($args);
if ($page_fields->have_posts()) : while ($page_fields->have_posts()) : $page_fields->the_post(); ?>
<?php // Check value exists.
        if (have_rows('modules')) :

            // Loop through rows.
            while (have_rows('modules')) : the_row();
                // Case: hero-banner layout.
                if (get_row_layout() == 'hero_banner') :
                    get_template_part('modules/hero-banner');
                endif;
            // End loop.
            endwhile;

        // No value.
        else :
        // Do something...
        endif;

    endwhile;
endif; ?>

<?php wp_reset_postdata(); ?>

<section class="section section--team-members">
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
                            <a class="btn btn-primary" href="<?php the_permalink() ?>">Read Full Bio</a>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        <?php else : ?>

            <p>Sorry, no posts exist.</p>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>
<?php get_header(); ?>

<section class="section section--hero-banner full-width alternate" style="background-image: url(/wp-content/themes/cardinaltheme/assets/request-care-bg.png);">
	<div class="section-wrapper">
        <div class="heading-wrapper">
            <h1 class="heading align--center">Blog</h1>
        </div>
    </div>
</section>
<main class="main--archive">
    <section class="section section--archive">
        <div class="post-grid">
            <?php
            $temp = $wp_query;
            $wp_query = null;
            $wp_query = new WP_Query();
            $news_id = get_cat_ID( 'news' );
            $args = array(
                'posts_per_page' => 4,
                'paged' => $paged,
                'category__not_in' => array( $news_id )
            );
            $wp_query = new WP_Query($args);
            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="post">
                    <a href="<?php the_permalink(); ?>">
                        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                        <?php if ($url) : ?><div class="image-wrapper" style="background-image: url( <?php echo $url ?> );"></div><?php else: ?><div class="image-wrapper" style="background-image: url(/wp-content/themes/cardinaltheme/assets/blog-placeholder.jpg);"></div><?php endif; ?>
                    </a>
                    <div class="content">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="title"><?php the_title(); ?></h3>
                        </a>
                        <div class="category"><?php echo the_category(); ?></div>
                        <div class="date"><?php echo get_the_date(); ?></div>
                        <?php the_excerpt(); ?>
                        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>

            <?php endwhile; ?>

            <?php if ($paged > 1) { ?>

                <nav id="nav-posts">
                    <div class="next"><?php previous_posts_link('« Newer Posts'); ?></div>
                    <div class="prev"><?php next_posts_link('Older Posts »'); ?></div>
                </nav>

            <?php } else { ?>

                <nav id="nav-posts">
                    <div class="prev"><?php next_posts_link('Older Posts »'); ?></div>
                </nav>

            <?php } ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </section>
    <section class="section section--aside">

        <?php if (is_active_sidebar('blog-sidebar')) : ?>
            <?php dynamic_sidebar('blog-sidebar'); ?>
        <?php else : ?>
            <!-- Time to add some widgets! -->
        <?php endif; ?>

    </section>
</main>

<?php get_footer(); ?>
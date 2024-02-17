<?php get_header(); ?>
<section class="section--team-member">
    <div class="section-wrapper">
        <div class="single">
            <?php while (have_posts()) : the_post(); ?>
                <input class="btn-back desktop-only" type="button" onclick="javascript:history.back();return false;" value="<< Back">
                <div class="image-wrapper"><?php the_post_thumbnail(); ?></div>
                <h1 class="heading alt uppercase"><?php echo the_title(); ?></h1>
                <div class="content">
                    <div class="title"><?php echo the_field("title"); ?></div>
                    <?php echo the_excerpt(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
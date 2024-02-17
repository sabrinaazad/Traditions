<?php
 /* Template Name: Contact Template */
get_header();

?>
<?php
if (get_field('alternate')) {
    $alternate = "alternate";
} else {
    $alternate = "";
}
?>
<section class="section section--hero-banner full-width <?php echo $alternate ?>" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
	<div class="section-wrapper">
        <?php $heading = get_field('hero_heading');
        if ($heading) : ?>
            <h1 class="heading align--center"><?php echo $heading; ?></h1>
        <?php endif; ?>
    </div>
</section>
<main class="main-wrapper">
    <section class="section section--contact-info full-width">
        <div class="section-wrapper">
            <div class="panels">

                <?php if (get_field('title_one')) : ?>
                    <div class="title uppercase"><?php the_field("title_one"); ?></div>
                <?php endif; ?>

                <?php if (get_field('address_one')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/pin.png" alt="location icon" />
                    <div class="content">
                        <?php the_field("address_one"); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (get_field('phone_one')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/phone.png" alt="phone icon" />
                    <div class="content">
                        <a href="tel:<?php the_field("phone_one"); ?>"><?php the_field("phone_one"); ?></a>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (get_field('fax')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/fax.png" alt="fax icon" />
                    <div class="content">
                        <a href="tel:<?php the_field("fax"); ?>"><?php the_field("fax"); ?></a>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (get_field('email')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/email.png" alt="email icon" />
                    <div class="content">
                        <a href="tel:<?php the_field("email"); ?>"><?php the_field("email"); ?></a>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (get_field('title_two')) : ?>
                    <div class="title uppercase"><?php the_field("title_two"); ?></div>
                <?php endif; ?>
                
                <?php if (get_field('address_two')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/pin.png" alt="location icon" />
                    <div class="content">
                        <?php the_field("address_two"); ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (get_field('phone_two')) : ?>
                <div class="panel">
                    <img src="/wp-content/themes/cardinaltheme/assets/phone.png" alt="phone icon" />
                    <div class="content">
                        <a href="tel:<?php the_field("phone_two"); ?>"><?php the_field("phone_two"); ?></a>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if (get_field('title_three')) : ?>
                    <div class="title dark"><?php the_field("title_three"); ?></div>
                <?php endif; ?>

                <?php $button = get_field('button');
                if ($button) :
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <div class="button-wrapper">
                    <a class="btn btn-primary" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                </div>
                <?php endif; ?>

                <div class="panel">
                    <div class="content">
                        <?php if (get_field('title_four')) : ?><span class="title uppercase"><?php the_field("title_four"); ?></span> <?php endif; ?>
                        <?php if (have_rows('general')) : ?>
                        <div class="location-wrapper">
                            <?php while (have_rows('general')) : the_row(); ?>
                                <div class="location">
                                    <?php if (get_sub_field('email')) : ?>
                                        <img src="/wp-content/themes/cardinaltheme/assets/email.png" alt="email icon" />
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (get_sub_field('title')) : ?>
                                            <div class="label"><?php the_sub_field("title"); ?></div>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('email')) : ?>
                                            <a class="email" href="tel:<?php the_sub_field("email"); ?>"><?php the_sub_field("email"); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section section--form">
        <div class="section-wrapper">
            <div class="subheading"><?php the_field("form_subheading"); ?></div>
            <h2 class="heading alt"><?php the_field("form_heading"); ?></h2>
            <p class="blurb"><?php the_field("form_blurb"); ?></p>
            <?php the_field('form'); ?>
        </div>
    </section>
</main>
<?php

get_footer();

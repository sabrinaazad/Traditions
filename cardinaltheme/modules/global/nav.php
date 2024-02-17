<div class="topbar desktop-only">
    <?php if ( get_field('announcement', 'options') ) : ?>
        <div class="top-nav__announcement">    
            <div class="content">
                <div class="announcement">
                    <?php echo the_field('announcement', 'options'); ?>
                    <?php $button = get_field('button', 'options');
                    if ($button) :
                        $link_url = $button['url'];
                        $link_title = $button['title'];
                        $link_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <div class="button-wrapper">
                        <a class="btn btn-secondary" href="<?php echo $link_url ?>" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <? endif; ?>
    <div class="content">
        <div class="left">
            <?php if ( get_field('topbar_phone', 'options') ) : ?>
                <div class="top-nav__phone">
                    <a href="tel:<?php echo the_field('topbar_phone', 'options'); ?>"><?php echo the_field('topbar_phone', 'options'); ?></a>
                </div>
            <? endif; ?>
            <?php if( have_rows('topbar_icons', 'options') ): ?>
                <div class="top-nav__icons">
                    <?php while( have_rows('topbar_icons', 'options') ) : the_row();
                        $link = get_sub_field('link');
                        $icon = get_sub_field('icon');
                        $alt = get_sub_field('alt'); ?>
                        <a class="icon" href="<?php echo $link ?>">
                            <img src="<?php echo $icon?>" alt="<?php echo $alt?>" />
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php else : endif;?>
        </div>
        <div class="right">
            <div class="top-nav__drawer">
                <?php wp_nav_menu(array(
                    'theme_location' => 'top-nav',
                    'container' => '',
                    'items_wrap' => '
                        <div class="top-nav__container">
                        <ul class="top-nav">
                            %3$s
                        </ul></div>'
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<nav class="main-nav full-width" id="mainNav">
    <div class="sticky-wrapper">
        <div class="main-nav__wrapper">

            <div class="main-nav__logo">
                <div class="logo">
                <? if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }?>
                </div>
            </div>


            <div class="phone mobile-only">
                <a href="tel:<?php echo the_field('header_phone', 'options'); ?>">
                <img src="<?php echo the_field('header_phone_icon', 'options'); ?>" alt="phone icon"/>
            </a>
            </div>

            <div class="main-nav__bar mobile-only">
                <button class="hamburger-button" id="hamburgerButton" aria-label="mobile-nav">
                    <div class="hamburger-button__bar--top"></div>
                    <div class="hamburger-button__bar--middle"></div>
                    <div class="hamburger-button__bar--bottom"></div>
                </button>
            </div>

            <div class="main-nav__drawer">

                <?php wp_nav_menu(array(
                    'theme_location' => 'primary-nav',
                    'container' => '',
                    'items_wrap' => '
                        <div class="primary-nav__container">
                        <ul class="primary-nav">
                            %3$s
                        </ul></div>'
                ));
                ?>

            </div>
        </div>
    </div>
</nav>

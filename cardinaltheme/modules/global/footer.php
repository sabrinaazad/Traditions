<footer class="footer full-width" id="footer" style="background-color: <?php echo the_sub_field('footer_bg'); ?>">
    <section class="section section--footer">
        <div class="footer-top-container">
            <div class="left-container">
                <div class="menu-container">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-nav-1',
                        'container' => '',
                        'items_wrap' => '
                            <ul class="footer-nav-1">
                                %3$s
                            </ul>
                            ',
                        'menu_id' => 'footerNav1'
                    )); ?>
                </div>
            </div>
            <div class="main-container">
                <?php if ( get_field('footer_logo', 'options')) : ?>
                    <div class="logo-container">
                        <a href="/"><img src="<?php echo the_field('footer_logo', 'options'); ?>" alt="Logo" class="logo"></a>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('footer_icons', 'options') ): ?>
                    <div class="icons-container">
                        <?php while( have_rows('footer_icons', 'options') ) : the_row();
                            $link = get_sub_field('link');
                            $icon = get_sub_field('icon');
                            $alt = get_sub_field('alt'); ?>
                            <a class="icon" href="<?php echo $link ?>">
                                <img src="<?php echo $icon?>" alt="<?php echo $alt?>" />
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php else : endif;?>
                <div class="menu-container">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-nav-2',
                        'container' => '',
                        'items_wrap' => '
                            <ul class="footer-nav-2">
                                %3$s
                            </ul>
                            ',
                        'menu_id' => 'footerNav2'
                    )); ?>
                </div>
            </div>
            <div class="right-container">
                <?php if(get_field('footer_location_block', 'options')) : ?>
                    <?php echo the_field('footer_location_block', 'options'); ?>
                <?php endif; ?>   
            </div>
        </div>
        <div class="footer-bottom-container">
            <div class="info-container">
                <p>
                    <?php if(get_field('footer_info_block', 'options')) : ?>
                        <?php echo the_field('footer_info_block', 'options'); ?>
                    <?php endif; ?>   
                    <br>Website Design, Development & SEO by <a target="_blank" href="https://www.cardinaldigitalmarketing.com/">Cardinal Digital Marketing</a>
                </p>
            </div>
        </div>
    </section>
</footer>
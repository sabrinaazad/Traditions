<?php if ( get_sub_field('announcement') ) : ?>
    <section class="section__announcement" style="background-color: <?php echo the_sub_field('background_color')?>">    
        <div class="content">
            <div class="announcement" style="color: <?php echo the_sub_field('color')?>">
                <?php echo the_sub_field('announcement'); ?>
                <?php $button = get_sub_field('button');
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
    </section>
<? endif; ?>
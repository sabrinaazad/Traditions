<section class="section section--list" id="<?php echo the_sub_field('id')?>">
    <div class="section-wrapper">
        <div class="heading-wrapper">
            <?php $subheading = get_sub_field('subheading');
                if( $subheading ): ?>
                    <h4 class="subheading"><?php echo $subheading; ?></h4>
            <?php endif; ?>

            <?php $heading = get_sub_field('heading');
                if( $heading ): ?>
                    <h2 class="heading alt"><?php echo $heading; ?></h2>
            <?php endif; ?>

            <?php $blurb = get_sub_field('blurb');
                if( $blurb ): ?>
                    <p class="blurb"><?php echo $blurb; ?></p>
            <?php endif; ?>
        </div>
        <?php $list = get_sub_field('list');
            if( $list ): ?>
               <?php echo $list; ?>
        <?php endif; ?>
    </div>
</section>
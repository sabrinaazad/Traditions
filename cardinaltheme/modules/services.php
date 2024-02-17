<?php
$services = get_sub_field('services');
if( $services ): ?>
    <section class="section section--services" id="<?php echo the_sub_field('id')?>">
        <div class="section-wrapper">
            <div class="services">
            <?php $count = 0;  foreach( $services as $service ):
                $image = get_the_post_thumbnail( $service->ID );
                $title = get_the_title( $service->ID );
                $excerpt = get_the_excerpt( $service->ID )
                ?>
                <div class="service" id="service<?php echo $count ?>">
                    <div class="image-wrapper"><?php echo $image  ?></div>
                    <div class="content">
                        <h4 class="heading alt"><?php echo esc_html( $title ); ?></h4>
                        <p><?php echo esc_html( $excerpt ); ?></p>
                    </div>
                </div>
            <?php ++$count; endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
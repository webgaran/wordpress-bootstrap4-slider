<section id="blog-slider">
      <div class="container">
        <div class="row">
          <div id="main-slider" class="carousel slide mt-4 mx-auto" data-ride="carousel">
             <?php $args = array(
                'posts_per_page' => 4,
                'post__in' => get_option( 'sticky_posts' ),
                // 'tag' => 'slider'
             );
             $slider = new WP_Query($args);
             if($slider->have_posts()):
             $count = $slider->found_posts;
             ?>
                <ol class="carousel-indicators">
                   <?php for($i = 0; $i < $count ;  $i++) { ?>
                          <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''?>"></li>
                    <?php } ?>
                </ol> <!--.carousel-indicators-->
                <div class="carousel-inner" role="listbox">
                   <?php $i = 0; while($slider->have_posts()): $slider->the_post(); ?>
                       <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''?>">
                         <a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"></a>
                         <div class="carousel-caption">
                          <h3><?php the_title() ?></h3>
                          <p><?php echo wp_trim_words( get_the_content(),24, '...' );  ?></p>
                        </div>
                       </div><!--.carousel-item-->
                    <?php $i++; endwhile; ?>
                </div> <!--.carouse-inner-->
                <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#main-slider" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
             <?php endif;  wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
</section>
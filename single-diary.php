<?php get_header();
          $user_id = get_field('user');
          $user_name = get_the_author_meta('display_name', $user_id);
          $user_link = get_author_posts_url($user_id);
          
          ?>


<main>
  <div class="conainer">
    <section class="diary">
      <h2 class="page-title"><?php echo $user_name ;?>の写メ日記</h2>

      <?php while (have_posts()) : the_post(); ?>
      <div class="diary__wrap">
        <div class="slider diary__img">
          <?php for ($i = 1; $i <= 4; $i++): ?>
          <?php if(get_field('image_' . $i)): ?>
          <div class="slider-img">
            <img src="<?php the_field('image_' . $i);?>" alt="">
          </div>
          <?php endif;?>
          <?php endfor ;?>
        </div>

        <div class="diary__right">

          <div class="diary__info">
            <time class="diary__time" datetime="<?php echo esc_attr(get_field('diary_date_japan', get_the_ID())); ?>">
              <?php echo esc_html(get_field('diary_date_japan', get_the_ID())); ?>
            </time>



            <div class="diary__author">
              <?php
              echo ('<a href="'.$user_link.'">'.$user_name.'</a>');
                  ?>
            </div>
          </div>

          <div class="diary__text">
            <?php the_field('text');?>
          </div>
        </div>
      </div>

      <?php endwhile; ?>



      <div class="diary__archive">
        <?php echo ('<a href="'.home_url().'/diary?author='.$user_id.'">'.$user_name.'の写メ日記</a>');?>
      </div>
      <div class=" diary__archive">
        <a href="<?php echo home_url('/diary'); ?>">すべての写メ日記</a>
      </div>

      <div class="diary__archive">
        <a href="<?php echo $user_link;?>" class="expand-link"><?php echo $user_name;?>のプロフィール</a>
      </div>


    </section>
  </div>
</main>

<?php get_footer(); ?>
<?php
/*
Template Name: Archive Author
*/
get_header();
?>

<section id="content" class="authorArchive">
  <div class="container">

    <?php
    // ユーザー別のアーカイブページの場合の処理
    $user_id = get_query_var('author');
    $user_name = get_the_author_meta('display_name', $user_id);
    $archive_title = esc_html($user_name) . 'の写メ日記';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // ページ数の取得
    $user_link = get_author_posts_url($user_id);


    
    $custom_query = new WP_Query(array(
      'post_type'      => 'diary',
      'posts_per_page' => 10,
      'paged'          => $paged,
      'meta_query'     => array(
        array(
          'key'   => 'user',
          'value' => $user_id,
        ),
      ),
    ));
    ?>

    <h2 class="page-title"><?php echo esc_html($archive_title); ?></h2>

    <div class="archive__wrap">
      <?php if ($custom_query->have_posts()) : ?>
      <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
      <div class="diary__wrap">
        <a href="<?php the_permalink(); ?>">
          <!-- ユーザーページ用のデザインやコンテンツをここに追加 -->
          <div class="slider diary__img">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
            <?php if (get_field('image_' . $i)) : ?>
            <div class="slider-img">
              <img src="<?php the_field('image_' . $i); ?>" alt="">
            </div>
            <?php endif; ?>
            <?php endfor; ?>
          </div>

          <div class="diary__right">
            <div class="diary__info">
              <time class="diary__time" datetime="<?php echo esc_attr(get_field('diary_date_japan', get_the_ID())); ?>">
                <?php echo esc_html(get_field('diary_date_japan', get_the_ID())); ?>
              </time>
              <div class="diary__author">
                <?php echo ('<a href="' . $user_link . '">' . $user_name . '</a>'); ?>
              </div>
            </div>

            <div class="diary__text">
              <?php the_field('text'); ?>

            </div>
          </div>
        </a>
      </div>
      <?php endwhile; ?>

      <?php
    // ページネーション
    if ($custom_query->max_num_pages > 1) : ?>
      <div class="pagination">
        <?php
        $args = array(
          'base'     => add_query_arg('paged', '%#%', home_url('/diary/?author=' . $user_id)),
          'format'   => '?paged=%#%',
          'current'  => max(1, get_query_var('paged')),
          'total'    => $custom_query->max_num_pages,
          'prev_text' => '&laquo; 前へ',
          'next_text' => '次へ &raquo;',
        );
        echo paginate_links($args);
        ?>
      </div>
      <?php endif; ?>

      <?php else : ?>
      <p>写メ日記は投稿されていません</p>
      <?php endif; ?>

    </div>

    <div class="diary__archive">
      <a href="<?php echo home_url('/diary'); ?>">すべての写メ日記</a>
    </div>
    <div class="diary__archive">
      <a href="<?php echo $user_link;?>" class="expand-link"><?php echo $user_name;?>のプロフィール</a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
<?php
/*
Template Name: Archive Diary
*/
get_header();
?>

<section id="content" class="archive">
  <div class="container">

    <?php
    // 通常のアーカイブページの場合の処理
    $archive_title = 'すべての写メ日記';
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // ページ数の取得
    $user_link = get_author_posts_url($user_id);
    $custom_query = new WP_Query(array(
      'post_type'      => 'diary',
      'posts_per_page' => 32,
      'paged'          => $paged,
    ));
    ?>

    <h2 class="page-title"><?php echo esc_html($archive_title); ?></h2>

    <div class="archive__wrap">


      <?php  if ($custom_query->have_posts()) :  ?>
      <div class="archive__inner">
        <?php   while ($custom_query->have_posts()) : $custom_query->the_post();?>

        <div class="archive__post">
          <div class="archive__post-img">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo catch_that_image(); ?>" />
            </a>
          </div>

          <div class="archive__post-author">
            <?php
            $user_id = get_field('user');
            $user_name = get_the_author_meta('display_name', $user_id);
            echo '<a href="' . get_author_posts_url($user_id) . '">' . $user_name . '</a>';
            ?>
          </div>

          <div class="archive__post-content">
            <a href="<?php the_permalink(); ?>">
              <?php
              $text = get_field('text');
              $short_text = mb_substr($text, 0, 47);
              $short_text = strip_tags($short_text);
              echo $short_text;
              ?>...
            </a>
          </div>
        </div>

        <?php endwhile;?>
      </div>
      <?php
        // ページネーション
        if ($custom_query->max_num_pages > 1) {
          echo '<div class="pagination">';
          $args = array(
            'base'     => get_pagenum_link(1) . '%_%',
            'format'   => 'page/%#%/',
            'current'  => max(1, get_query_var('paged')),
            'total'    => $custom_query->max_num_pages,
            'prev_text' => '&laquo; 前へ',
            'next_text' => '次へ &raquo;',
          );
          echo paginate_links($args);
          echo '</div>';
        }endif;

      // カスタムクエリのリセット
      wp_reset_postdata();
      ?>
    </div>


  </div>
</section>

<?php get_footer(); ?>
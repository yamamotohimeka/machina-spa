<?php
/****************************************
  Template Name: セラピスト詳細ページ
*****************************************/
;?>
<?php include('load-schedule.php');?>
<?php
  $get_user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
  $uid = $get_user->ID;
  $udata = get_userdata($uid);
	$user_twitter = get_field('twitter_shop','user_1');
  $newfaceDate = get_the_author_meta('newface_date', $get_user->ID);
  $date = DateTime::createFromFormat('Ymd', $newfaceDate);                    
  $option_fee = get_the_author_meta('option_fee', $val->staff_id);

?>
<?php get_header(); ?>
<section class="author">
  <div class="author-contentwrap">
    <h2 class="author-title">プロフィール</h2>
    <div class="author-wrapper">
      <div class="clearfix">
        <div class="author-img-wrap">

          <?php if(!empty($udata->newface_date)) : ?>
          <div class="author-newDate newDate">
            <p><?php echo  $date->format('m月d日')?>入店</p>
          </div>
          <?php endif;?>

          <!--スライダーメイン-->
          <ul class="author-mainimg-wrap">
            <li class="author-img"><?php echo get_avatar( $uid ,420);?></li>
            <?php if(!empty($udata->prof_img1)) : ?>
            <li class="author-img"><img src="<?php the_field('prof_img1'); ?>" alt="セラピストプロフィール画像2"></li>
            <?php else : ?>
            <li class="author-img">
              <img src="<?php echo get_template_directory_uri() ?>/images/noimage.jpg" alt="NO IMAGE">
            </li>
            <?php endif; ?>

            <?php if(!empty($udata->prof_img2)) : ?>
            <li class="author-img"><img src="<?php the_field('prof_img2'); ?>" alt="セラピストプロフィール画像３"></li>
            <?php else : ?>
            <li class="author-img">
              <img src="<?php echo get_template_directory_uri() ?>/images/noimage.jpg" alt="NO IMAGE">
            </li>
            <?php endif; ?>
          </ul>

          <!--スライダーサムネイル-->
          <ul class="author-thumbnail-wrap">
            <li class="author-thumbnail"><?php echo get_avatar( $uid ,420);?></li>
            <?php if(!empty($udata->prof_img1)) : ?>
            <li class="author-thumbnail"><img src="<?php the_field('prof_img1'); ?>" alt="セラピストプロフィール画像２"></li>
            <?php else : ?>
            <li class="author-thumbnail">
              <img src="<?php echo get_template_directory_uri() ?>/images/noimage.jpg" alt="NO IMAGE">
            </li>
            <?php endif ; ?>

            <?php if(!empty($udata->prof_img2)) : ?>
            <li class="author-thumbnail">
              <img src="<?php the_field('prof_img2'); ?>" alt="セラピストプロフィール画像３">
            </li>
            <?php else : ?>
            <li class="author-thumbnail">
              <img src="<?php echo get_template_directory_uri() ?>/images/noimage.jpg" alt="NO IMAGE">
            </li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="author-info-wrap">
          <p class="author-title-sp">プロフィール</p>
          <div class="author-size-wrap">
            <div class="author-name-tall-wrap">
              <div class="flex">
                <p class="author-name"><?php echo $udata->display_name;?><span
                    class="data"><?php if(!empty($udata->fage)) echo "(".$udata->fage.")";?></span></p>
                <p class="author-tall">身長：<?php echo $udata->tall;?><span>cm</span></p>
              </div>

              <div class="options">
                <?php       
                  if($option_fee) {
                      $status = get_the_author_meta('option_fee', $val->staff_id);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      }                    }
                      ?>
              </div>
            </div>
            <?php if($udata->twitter): ?>
            <div class="author-twitter">
              <a href="https://twitter.com/<?php echo $udata->twitter;?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/images/ranking-twitter.png" alt="twitter icon">
              </a>
            </div>
            <?php endif ; ?>


          </div>
          <p class="author-description"><?php echo $udata->description;?></p>
        </div>
      </div>

      <div class="author-schedule">
        <p class="author-schedule-title">出勤予定</p>
        <ol class="attend-list-contentwrap">
          <?php for($i=0; $i<7; $i++):?>
          <li class="attend-list">
            <div class="cell-date" id="cellDate"
              data-date="<?php echo date('Y-m-d', strtotime("+".$i."day", current_time('timestamp'))); ?>">
              <?php echo date("m/d", strtotime("+".$i."day", current_time('timestamp')));?><span></span>
              <?php echo "(".$week[date("w", strtotime("+".$i."day", current_time('timestamp')))].")";?>
            </div>
            <div class="cell-hour">
              <?php
              if($rows) {
                foreach($rows as $val) {
                  if($val->staff_id==$uid && $val->date==date('Y-m-d', strtotime('+'.$i.'day', current_time('timestamp')))) {
                    echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->starttime);
                    echo '<span class="tilde">～</span>';
                    echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->endtime);
                    echo '<p class="therapist-list-realtime">出勤</p>';
                    break;
                  } elseif($val == end($rows)) {
                    echo "-";
                  }
                }
              } else {
                echo "-";
              } ?>
            </div>
          </li>
          <?php endfor;?>
        </ol>

        <div class="gototherapists-wrap-pc">
          <p class="gototherapists-pc"><a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧へ</a></p>
        </div>
      </div>
      <div class="author-diary">
        <h2>写メ日記</h2>
        <div class="author-diary-wrap">

          <?php
        $posts_per_page = 4;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        // ユーザーの写メ日記を取得
        $diary_args = array(
          'post_type'      => 'diary',
          'posts_per_page' => $posts_per_page,
          'paged'          => $paged, // ページ番号を設定
          'meta_query'     => array(
            array(
              'key'   => 'user',
              'value' => $uid,
            ),
          ),
        );

          $diary_query = new WP_Query($diary_args);
          while ($diary_query->have_posts()) : $diary_query->the_post();
          ?>


          <div class="author-diary-inner">
            <a href="<?php the_permalink(); ?>">
              <div class="slider author-diary__img">
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                <?php if (get_field('image_' . $i)) : ?>
                <div class="slider-img">
                  <img src="<?php the_field('image_' . $i); ?>" alt="">
                </div>
                <?php endif; ?>
                <?php endfor; ?>
              </div>


              <time class="diary__time" datetime="<?php echo esc_attr(get_field('diary_date_japan', get_the_ID())); ?>">
                <?php echo esc_html(get_field('diary_date_japan', get_the_ID())); ?>
              </time>


              <div class="author-diary__text">
                <?php the_field('text'); ?>
              </div>
            </a>
          </div>
          <?php endwhile; ?>

          <?php
          // 続きを読むリンクの表示
          if ($diary_query->max_num_pages > 1) { ?>
          <div class="author-diary__archive">
            <?php echo '<a href="' . home_url() . '/diary?author=' . $uid . '">' . $udata->display_name . 'の写メ日記一覧へ</a></div>';
          }?>

            <?php wp_reset_postdata(); // カスタムクエリのリセット ?>
            <?php if(!$diary_query->have_posts()) : ?>
            <p>写メ日記は投稿されていません</p>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="gototherapists-wrap">
        <p class="gototherapists">
          <a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧へ</a>
        </p>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
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
              <p class="author-name"><?php echo $udata->display_name;?><span
                  class="data"><?php if(!empty($udata->fage)) echo "(".$udata->fage.")";?></span></p>
              <p class="author-tall">身長：<?php echo $udata->tall;?><span>cm</span></p>
            </div>

            <div class="options">
              <?php if($udata->option_fee): ?>
              <p class="author-option">指名料+<?php echo $udata->option_fee;?></p>
              <?php else : ?>
              <p class="author-option">指名料+1000</p>
              <?php endif;?>
            </div>
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
      <div class="author-twitter">
        <h2 class="twitter-title"><img src="<?php echo get_template_directory_uri() ?>/images/twitter.png"
            alt="twitterアイコン"></h2>

        <div class="twitter-inner">
          <script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          <?php if($udata->twitter): ?>
          <a class="twitter-timeline" data-chrome=”nofooter” data-chrome=”noheader” data-lang="ja" height="464"
            href="https://twitter.com/<?php echo $udata->twitter;?>?ref_src=twsrc%5Etfw"></a>
          <p class="twitter-link"><a href="https://twitter.com/<?php echo $udata->twitter;?>"
              target="_blank">Twitterで表示<span><img
                  src="<?php echo get_template_directory_uri() ?>/images/arrow-right.png" alt="矢印"></span></a></p>
          <?php elseif($user_twitter) : ?>
          <a class="twitter-timeline" data-chrome=”nofooter” data-chrome=”noheader” data-lang="ja" height="666"
            href="https://twitter.com/<?php echo $user_twitter; ?>">Tweet</a>
          <p class="twitter-link"><a href="https://twitter.com/<?php echo $user_twitter; ?>"
              target="_blank">Twitterで表示<span><img
                  src="<?php echo get_template_directory_uri() ?>/images/arrow-right.png" alt="矢印"></span></a></p>
          <?php endif;?>
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
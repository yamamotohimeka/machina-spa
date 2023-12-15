<?php include('load-schedule.php');?>
<?php $user_twitter = get_field('twitter_shop','user_1'); ?>
<?php get_header(); ?>

<div class="mainvisual">
  <div class="main-img-innerwrap">
    <p class="business-hours">営業時間 12:00-27:00（受付時間 10:00〜25:30）</p>
    <p class="sp-credit"><a href="https://pay2.star-pay.jp/site/pc/shop.php?tel=&payc=A2038&guide=" target="_blank"><img
          src="<?php echo get_template_directory_uri() ?>/images/credit.png" alt=""></a></p>
    <div class="slider">
      <?php $args= array(
        'post_type' => 'banner',
        'posts_per_page' => 5,
        'paged' => get_query_var('paged'),
      );
      $the_query = new WP_Query($args);
      if($the_query->have_posts()):
      ?>
      <?php while($the_query->have_posts()) : $the_query->the_post();?>

      <div class="slider-img">
        <?php
        $image = get_field('banner_img');
        $link = get_field('banner_link');
        if($image && $link) {
          echo '<a href="'.$link.'" rel="noopener" target="_blank">';
          echo wp_get_attachment_image($image, 'full');
          echo '</a>';
        } elseif($image) {
          echo wp_get_attachment_image($image, 'full');
        }
        ?>
      </div>
      <?php endwhile; else: ?>
      <div class="noslide">
        <p>投稿はまだありません。</p>
      </div>
      <?php endif; wp_reset_postdata();?>
    </div>
  </div>
  <ul class="mainvisual-menu">
    <li class="mainvisual-menu-list"><a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧<span>THERPIST</span></a>
    </li>
    <li class="mainvisual-menu-list"><a href="<?php echo home_url('/schedule'); ?>">出勤情報<span>SCHEDULE</span></a>
    </li>
  </ul>
</div>

<main class="main">
  <div class="main-inner">
    <div class="top-therapists-bg">
      <section class="top__diary">
        <h3>写メ日記</h3>
        <div class="archive__post-wrap">
          <?php
          $args = array(
            'post_type' => 'diary', // カスタム投稿タイプのスラッグを指定してください
            'posts_per_page' => 10, // 表示する投稿の数を指定してください。-1を指定するとすべての投稿が表示されます
          );

          $custom_query = new WP_Query($args);

          if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) {
              $custom_query->the_post();
              ?>
          <div class="archive__post">
            <div class="archive__post-img-wrap">
              <div class="archive__post-img">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo catch_that_image(); ?>" />
                  <div class="archive__post-content">
                    <?php
                          $text = get_field('text');
                          $short_text = mb_substr($text, 0, 30);
                          $short_text = strip_tags($short_text);
                          echo $short_text;
                          ?>...
                  </div>
                </a>
              </div>
            </div>
            <div class="archive__post-author">
              <?php
                    $user = get_field('user', $user_id);
                    $user_object = get_userdata($user);
                    $user_name = $user_object->display_name;
                    $user_link = get_author_posts_url($user);
                    echo '<a href="'.$user_link.'">' . $user_name . '</a>'; ?>
            </div>

            <time class="archive__time" datetime="<?php echo esc_attr(get_field('diary_date_japan', get_the_ID())); ?>">
              <?php echo esc_html(get_field('diary_date_japan', get_the_ID())); ?>
            </time>
          </div>
          <?php
            }
          }

            wp_reset_postdata();?>

        </div>
        <div class="top__diary-more">
          <a href="<?php echo home_url('/diary'); ?>">もっと見る</a>
        </div>
      </section>


      <div class="therapists-container top-therapists-container">
        <section class="therapists-wrap">
          <h2 class="therapists-title">本日出勤のセラピスト</h2>
          <?php $currentDatetime = current_datetime(); ?>
          <?php $day = $currentDatetime->format('Y-m-d'); ?>
          <div class="schedule-therapists-wrap  top-schedule-therapist-wrap">
            <div class="box">
              <ul class="therapist-list-wrap">
                <?php     
                if($rows) {
                $count = 0;
                $image = get_field('prof-img1');
                
                foreach($rows as $val) {
                  if($val->date === $day ) {
                    $count += 1;
                    $user_id = get_the_author_meta('ID', $val->staff_id);
                    $newfaceDate = get_the_author_meta('newface_date', $val->staff_id);
                    $date = DateTime::createFromFormat('Ymd', $newfaceDate);
                    $user_link = get_author_posts_url($user_id);
                    $user_name = get_the_author_meta('nicename', $val->staff_id);
                    $c_id = "?cid=".$user_id;
                    $option_fee = get_the_author_meta('option_fee', $val->staff_id);

                    
                    if($user_id) {  // ユーザーIDが存在する場合のみ<li>ブロックを出力
                      print('<li class="therapist-list">');
                      print('<p class="therapist-list-realtime"></p>');
                    }
                    if($newfaceDate && $user_id) {
                      print('<p class="therapist-list-newDate newDate">'. $date->format('m月d日') .'入店</p>');
                    }
                    if($user_id){
                      print('<p class="therapist-list-image">'.'<a href="'.get_author_posts_url($user_id).$c_id.'" class="expand-link">'.get_avatar($val->staff_id, 420).'</a>'.'</p>');
                      print('<p class="therapist-list-name">'.get_the_author_meta('display_name', $val->staff_id).'<span class="age">（'.get_the_author_meta('fage', $val->staff_id).'）</span></p>');
                      print('<p class="therapist-list-tall">'.'身長：'.get_the_author_meta('tall', $val->staff_id).' cm'.'</p>');
                      print('<p class="therapist-list-worktime">');
                      if($val->workplace && strcmp($val->workplace, "未選択")){
                        print($val->workplace.'<br>');
                      }
                      print( preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->starttime).'～'.preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->endtime).'</p>');
                      print('<div class="page-schedule-staff-prof-content">');
                    }
                    if($option_fee && $user_id) {
                      $status = get_the_author_meta('option_fee', $val->staff_id);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      }                    }
                    if($user_id){
                      print('</div></li>');
                    }
                      } elseif($val == end($rows) && $count == 0) {
                      print('<li class="panel-nostaff">現在出勤情報はございません。</li>');
                  }    
                }
              }  
              ?>
              </ul>
            </div>
          </div>
          <p class="therapist-link"><a href="<?php echo home_url('/schedule'); ?>">週間スケジュールはコチラから<span>
                <img src="<?php echo get_template_directory_uri() ?>/images/arrow-right.png" alt="矢印"></span></a></p>
        </section>








      </div>
    </div>
    <div class="about-bg">
      <section class="about">
        <h2 class="about-title"><span>MACHINA SPA</span>とは?</h2>
        <div class="about-contentwrap">


          <div class="about-content">
            <img src="<?php echo get_template_directory_uri() ?>/images/about-img1.png" alt="オイルマッサージへのこだわり">
            <div class="about-content-flexwrap">
              <h3 class="about-content-title">
                オイルマッサージへのこだわり
              </h3>
              <p class="about-content-text">
                当店のオイルは、水溶性の高級マッサージオイルを使用しております。<br>
                無香料で重めのテクスチャーは滑ることなく、しっかりと圧をかけてマッサージすることができます。<br>
                お客様にとっても満足度の高いオイルになっております。</p>
            </div>
          </div>

          <div class="about-content">
            <div class="about-content-flexwrap">
              <h3 class="about-content-title">セラピスト</h3>
              <p class="about-content-text">
                マキナスパでは30代〜50代のセラピストから積極採用しています。<br>
                大人の女性の魅力である上品さ・艶やかさ・優しさで、<br>
                落ち着いた雰囲気に包まれて施術を受けていただくことができます。<br>
                また雰囲気だけではなく、セラピスト個人個人が培ってきた<br>
                高い技術力をぜひ体験して下さい。
              </p>
            </div>
            <img src="<?php echo get_template_directory_uri() ?>/images/about-img2.png" alt="セラピスト">
          </div>

          <div class="about-content">
            <img src="<?php echo get_template_directory_uri() ?>/images/about-img3.png" alt="居心地の良いお部屋の提供">
            <div class="about-content-flexwrap">
              <h3 class="about-content-title">居心地の良いお部屋の提供</h3>
              <p class="about-content-text about-content-text1">
                メンズエステを気持ち良くご利用頂けるように、お部屋をご準備しています。<br>
                シャワー内には、香料or無香料ボディーソープの２つご用意しています。<br>
                そのほかにも、シャンプーやリンス、洗顔料をご用意しています。<br>
                洗面台にはドライヤーを初めに、化粧水、美容液を用意し、身支度に 必要なものが揃う設備も充実しています。
              </p>
            </div>
          </div>

        </div>


      </section>
    </div>
  </div>
</main>
<?php get_footer(); ?>
<?php include('load-schedule.php');?>
<?php $user_twitter = get_field('twitter_shop','user_1'); ?>
<?php get_header(); ?>

<div class="mainvisual">
  <div class="main-img-innerwrap">
    <p class="business-hours">営業時間 12:00-27:00
      <span>（受付時間 10:00〜25:30）</span>
    </p>
    <div class="top-title">
      大阪堺筋本町・南船場 メンズエステ MACHINA SPA（マキナスパ）
    </div>
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
  <div class="mainvisual-payment">
    <img src="<?php echo get_template_directory_uri() ?>/images/card-icon.png" alt="カード会社のアイコン">
    <p><a href="">クレジットカード決済はコチラから</a></p>
  </div>


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
                          $short_text = mb_substr($text, 0, 35);
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
          <h2 class="therapists-title">本日の出勤</h2>
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
                    $ranking = get_the_author_meta('ranking', $val->staff_id);
                    
                    if($user_id) {  // ユーザーIDが存在する場合のみ<li>ブロックを出力
                      print('<li class="therapist-list">');
                      print('<p class="therapist-list-realtime"></p>');
                    }
                    if($newfaceDate && $user_id) {
                      print('<p class="therapist-list-newDate newDate">'. $date->format('m月d日') .'入店</p>');
                    }
                    if($user_id){
                      print('<p class="therapist-list-image">'.'<a href="'.get_author_posts_url($user_id).$c_id.'" class="expand-link">'.get_avatar($val->staff_id, 420).'</a>'.'</p>');
                      
                      if($ranking){
                        print('<div class="rankicon"><p> <span>'. $ranking.'</span>位</p></div>');
                      }

                      if($option_fee && $user_id) {
                      $status = get_the_author_meta('option_fee', $val->staff_id);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      }   
                                      }
                      print('<p class="therapist-list-name">'.get_the_author_meta('display_name', $val->staff_id).'<span class="age">（'.get_the_author_meta('fage', $val->staff_id).'）</span></p>');
                      print('<p class="therapist-list-worktime">');
                      if($val->workplace && strcmp($val->workplace, "未選択")){
                        print($val->workplace.'<br>');
                      }
                      print( preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->starttime).'～'.preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->endtime).'</p>');
                      print('<div class="page-schedule-staff-prof-content">');
                    }
    
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
          <div class="therapist-link-wrap">
            <p class="therapist-link"><a href="<?php echo home_url('/schedule'); ?>">もっと見る</a></p>
          </div>
        </section>
      </div>



    </div>
    <div class="top__newface">
      <h3>新人情報</h3>
      <div class="top__newface-wrap">
        <div class="box">
          <ul class="therapist-list-wrap newface-list-wrap ">
            <?php 
          $users = get_users( array('order'=>'ASC', 'orderby'=>'meta_value_num', 'meta_key'=>'ranking', 'exclude'=>'') );
          foreach($users as $girls):
          $uid =$girls->ID;
          $userData = get_userdata($uid);
          $newfaceDate = get_the_author_meta('newface_date', $girls->ID);
          $date = DateTime::createFromFormat('Ymd', $newfaceDate);
          $user_twitter = get_field('twitter_shop','user_1');
          $user_id = get_the_author_meta('ID', $girls->ID);
          $user_link = get_author_posts_url($user_id);
          if($userData->attmgr_ex_attr_staff && $newfaceDate): ?>


            <li class="therapist-list">
              <p class="therapist-list-newface"><?php echo  $date->format('m月d日')?>入店</p>
              <p class="therapist-list-newDate newDate"><?php echo  $date->format('m月d日')?>入店</p>

              <?php if($girls->ranking): ?>
              <div class="rankicon">
                <p> <span><?php echo $girls->ranking;?></span>位</p>
              </div>
              <?php endif;?>

              <p class="therapist-list-image">
                <a href="<?php echo $user_link;?>" class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
              </p>
              <?php if($girls->option_fee): ?>
              <?php   $status = get_the_author_meta('option_fee', $girls->ID);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      } ?>
              <?php endif;?>

              <div class="page-schedule-staff-prof-content">
                <p class="therapist-list-name">
                  <?php echo $girls->display_name;?><span>（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span>
                </P>
              </div>
            </li>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <div class="newface-link-wrap">
          <p class="newface-link"><a href="<?php echo home_url('/newface'); ?>">もっと見る</a></p>
        </div>
      </div>
    </div>


    <div class="top__recruit">
      <h3>セラピスト求人</h3>
      <div class="top__recruit-img">
        <a href="https://recruit-machinaspa.com/" target="_blank">
          <img src="<?php echo get_template_directory_uri() ?>/images/top-recruit.png" alt="カード会社のアイコン">
        </a>
      </div>

    </div>

    <div class="top__policy">
      <h4>ご利用規約</h4>

      <div class="top__policy-inner">
        <p>
          18歳未満の方、同業者、スカウト目的、暴力団関係者、薬物使用者、泥酔者その他当店がふさわしくないと判断した方の お問い合わせご利用は固くお断り致します。
          当店は風俗系マッサージ店では一切御座いません。法令及び公序良俗に反するような行為も一切行っておりません。<br>
          また医療法が定める病院、診療所、治療院ではございません。<br>
          当店ではリラクゼーションオイルトリートメントを提供するサロンであり、性的サービス等を要求された場合やセラピストが施術不可能と判断した場合は、即退店をお願いしております。<br>
          その際の料金の返金には応じませんのであらかじめ ご了承の程宜しくお願い致します。 <br>
          <br>
          下記に該当される方の施術はお断りするとともに中断又は退店して頂く場合が御座います。 その際返金等は一切応じませんのであらかじめご了承のほど宜しくお願い致します。
        </p>

        <ul>
          <li>18歳未満の方</li>
          <li> 同業者、スカウト及びスカウトに準ずる者のスカウト行為や発言等</li>
          <li> 暴力団関係者またはそれに準ずる方、刺青等のある方</li>
          <li> 泥酔状態の方</li>
          <li>熱がある方</li>
          <li>大麻や覚せい剤、シンナー等薬物を使用している方</li>
          <li>重度の水虫、皮膚炎のある方</li>
          <li>痛風、リウマチの方</li>
        </ul>
      </div>
      <p class="top__link-sp"><a href="#top">TOPへ</a></p>

    </div>



    <div class="top__link">

      <h3>リンク</h3>
      <div class="top__link-flex">
        <div class="top__link-bnr">
          <a href="https://114510.jp/"><img src="https://114510.jp/img/link/114510jp_200_40.gif"
              alt="高収入アルバイト・非風俗求人情報「メンエスバイト」" /></a>
        </div>
        <div class="top__link-bnr">
          <a href="https://114510.jp/"><img src="https://114510.jp/img/link/114510jp_200_40.gif"
              alt="高収入アルバイト・非風俗求人情報「メンエスバイト」" /></a>
        </div>
        <div class="top__link-bnr">
          <a href="https://114510.jp/"><img src="https://114510.jp/img/link/114510jp_200_40.gif"
              alt="高収入アルバイト・非風俗求人情報「メンエスバイト」" /></a>
        </div>
        <div class="top__link-bnr">
          <a href="https://114510.jp/"><img src="https://114510.jp/img/link/114510jp_200_40.gif"
              alt="高収入アルバイト・非風俗求人情報「メンエスバイト」" /></a>
        </div>
        <div class="top__link-bnr">
          <a href="https://kansai.momi-lg.com" target="_blank"><img
              src="https://kansai.momi-lg.com/img/FRONT/pc/200_40.gif" alt="モミろぐ関西" border="0"></a>
        </div>
        <div class="top__link-bnr"> <a href="https://me-navi.com/job/" rel="nofollow noopener" target="_blank"><img
              src="https://me-navi.com/asset/img/j_200_40.gif" alt="メンズエステバイト情報【メンエスナビ求人】"></a>
        </div>
        <div class="top__link-bnr"> <a href="https://me-navi.com" rel="nofollow noopener" target="_blank"><img
              src="https://me-navi.com/asset/img/200_40.gif" alt="男性向けリラクゼーションサロン専門情報サイト そけい部長のメンエスナビ"></a>
        </div>
        <div class="top__link-bnr"> <a href="https://menes-ikitai.co.jp/osaka/sakaisuji-honmachi-ranking/"
            target="_blank"> <img src="https://menes-ikitai.co.jp/wp-content/uploads/2023/03/4-2.png" width="200"
              height="40" border="0" alt="【厳選】堺筋本町メンズエステ_メンエスイキタイ"> </a>
        </div>
        <div class="top__link-bnr"> <a href="https://menesth-job.jp/25/" target="_blank">
            <img alt="大阪府でメンズエステ求人を探すなら「リラクジョブ」にお任せ！" width="200" height="40" border="0"
              src="https://dv6drgre1bci1.cloudfront.net/systemfiles.ranking-deli-kyujin.jp/menesth-job/assets/img/user/link/20040_rj.jpg" /></a>
        </div>
        <div class="top__link-bnr">
          <a href="https://esta-osaka.com" target="_blank" alt="メンズエステの情報や体験談を紹介するエステーションです。"><img
              src="https://esta-osaka.com/img/osaka/esta-200_40.jpg" width="200" height="40" /></a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
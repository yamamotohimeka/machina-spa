<?php /* Template Name: ランキング */ ;?>
<?php include('load-schedule.php');?>
<?php get_header(); ?>
<section class="ranking">
  <h2>ランキング</h2>

  <div class="inner">
    <div class="schedule-therapists-wrap  top-schedule-therapist-wrap">

      <div class="box">
        <?php $users = get_users( array('order'=>'ASC', 'orderby'=>'meta_value_num', 'meta_key'=>'ranking', 'exclude'=>'') );?>


        <ul class="therapist-list-wrap">
          <?php
          foreach($users as $girls):
          $uid =$girls->ID;
          $userData = get_userdata($uid);
          $newfaceDate = get_the_author_meta('newface_date', $girls->ID);
          $date = DateTime::createFromFormat('Ymd', $newfaceDate);
          $user_twitter = get_field('twitter_shop','user_1');
          $user_link = get_author_posts_url($uid);
          $ranking = $girls->ranking;
          ?>


          <?php if($userData->attmgr_ex_attr_staff):?>
          <?php if($girls->ranking): ?>
          <li class="therapist-page-list pc <?php if($ranking >= 6 && $ranking <= 10) echo 'rankinlow'; ?>">
            <div class="therapist-ranking-left">
              <div class="therapist-ranking">
                <img src="<?php echo get_template_directory_uri() ?>/images/ranking-icon.png" alt="ranking icon">
                <p>No<span><?php echo $girls->ranking;?></span></p>
              </div>
              <p class="therapist-name"><?php echo $girls->display_name;?><span
                  class="age">（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span>
              </p>
            </div>


            <div class="therapist-img-wrap">
              <?php if($userData->newface_date): ?>
              <div class="therapist-img-newDate newDate">
                <p>NEW</p>
              </div>
              <?php endif;?>
              <?php if($girls->option_fee): ?>
              <p class="option-fee-pc">
                <?php   $status = get_the_author_meta('option_fee', $girls->ID);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      } ?>
                <?php endif ;?>
              </p>
              <div class="therapist-img">
                <a href="<?php echo $user_link;?>" class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
              </div>
              <div class="rankicon">
                <p>
                  <span><?php echo $girls->ranking;?></span>位
                </p>
              </div>

              <?php if($ranking >= 6 && $ranking <= 10): ?>
              <div class="ranking-author">
                <a href="<?php echo $user_link;?>" class="expand-link">
                  セラピスト詳細へ
                </a>
              </div>
              <?php endif;?>
            </div>

            <div class="therapist-info-flexwrap">


              <div class="ranking-text">
                <div class="title">お店からのコメント</div>
                <p>
                  <?php echo $userData->user_description;?>
                </p>
              </div>

              <div class="ranking-realtime-wrap">
                <?php
                    if ($rows) {
                      foreach ($rows as $val) {
                        if ($val->staff_id == $uid && $val->date == date('Y-m-d', current_time('timestamp'))) {
                          echo '<div class="ranking-realtime">本日出勤</div>';
                          if (strcmp($val->workplace, "未選択")) {
                            echo '<span class="shop">'.$val->workplace.'</span>';
                          }
                          break;
                        } elseif ($val == end($rows)) {
                          echo '<div class="ranking-worktime none"></div>';
                        }
                      }
                    } ?>
                <div class="ranking-author">
                  <a href="<?php echo $user_link;?>" class="expand-link">
                    セラピスト詳細へ
                  </a>
                </div>
              </div>

          </li>



          <li class="therapist-page-list sp <?php if($ranking >= 6 && $ranking <= 10) echo 'rankinlow'; ?>">
            <div class="therapist-ranking-wrap">
              <div class="therapist-ranking-left">
                <div class="therapist-ranking">
                  <img src="<?php echo get_template_directory_uri() ?>/images/ranking-icon.png" alt="ranking icon">
                  <p>No<span><?php echo $girls->ranking;?></span></p>
                </div>
                <p class="therapist-name"><?php echo $girls->display_name;?><span
                    class="age">（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span>
                </p>
              </div>


              <div class="therapist-img-wrap">
                <?php if($userData->newface_date): ?>
                <div class="therapist-img-newDate newDate">
                  <p>NEW</p>
                </div>
                <?php endif;?>
                <?php if($girls->option_fee): ?>
                <p class="option-fee-pc">
                  <?php   $status = get_the_author_meta('option_fee', $girls->ID);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      } ?>
                  <?php endif ;?>
                </p>
                <div class="therapist-img">
                  <a href="<?php echo $user_link;?>" class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
                </div>
                <div class="rankicon">
                  <p>
                    <span><?php echo $girls->ranking;?></span>位
                  </p>
                </div>

                <?php if($ranking >= 6 && $ranking <= 10): ?>
                <div class="ranking-author">
                  <a href="<?php echo $user_link;?>" class="expand-link">
                    セラピスト詳細へ
                  </a>
                </div>
                <?php endif;?>
              </div>
            </div>
            <div class="therapist-info-flexwrap">


              <div class="ranking-text">
                <div class="title">お店からのコメント</div>
                <p>
                  <?php echo $userData->user_description;?>
                </p>
              </div>

              <div class="ranking-realtime-wrap">
                <?php
                    if ($rows) {
                      foreach ($rows as $val) {
                        if ($val->staff_id == $uid && $val->date == date('Y-m-d', current_time('timestamp'))) {
                          echo '<div class="ranking-realtime">本日出勤</div>';
                          if (strcmp($val->workplace, "未選択")) {
                            echo '<span class="shop">'.$val->workplace.'</span>';
                          }
                          break;
                        } elseif ($val == end($rows)) {
                          echo '<div class="ranking-worktime none"></div>';
                        }
                      }
                    } ?>
                <div class="ranking-author">
                  <a href="<?php echo $user_link;?>" class="expand-link">
                    セラピスト詳細へ
                  </a>
                </div>
              </div>

          </li>





          <?php endif; ?>
          <?php endif;?>
          <?php endforeach;?>




        </ul>





      </div>
    </div>
  </div>

  </div>
</section>


<?php get_footer(); ?>
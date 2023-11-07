<?php /* Template Name: ランキング */ ;?>
<?php include('load-schedule.php');?>
<?php get_header(); ?>
<section class="ranking">
  <h2 class="section-title">ランキング</h2>

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
          ?>


          <?php if($userData->attmgr_ex_attr_staff):?>
          <?php if($girls->ranking): ?>
          <li class="therapist-page-list pc">

            <div class="therapist-ranking">
              <img src="<?php echo get_template_directory_uri() ?>/images/ranking-icon.png" alt="ranking icon">
              <p>No.<?php echo $girls->ranking;?></p>
            </div>

            <div class="therapist-img-wrap">
              <?php if($userData->newface_date): ?>
              <div class="therapist-img-newDate newDate">
                <p><?php echo  $date->format('m月d日')?>入店</p>
              </div>
              <?php endif;?>
              <div class="therapist-img">
                <a href="<?php echo home_url().'/?author='.$uid;?>"
                  class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
              </div>
            </div>

            <div class="therapist-info-flexwrap">
              <div class="therapist-infowrap">
                <div class="therapist-contentwrap">
                  <div class="therapist-info">
                    <p class="therapist-name"><?php echo $girls->display_name;?><span
                        class="age">（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span></p>
                    <p class="therapist-tall">身長：<?php echo $girls->tall;?><span>cm</span></p>
                  </div>
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
                </div>

                <div class="ranking-twitter">
                  <?php if($girls->twitter): ?>
                  <a href="https://twitter.com/<?php echo $girls->twitter;?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/images/ranking-twitter.png" alt="twitter icon">
                  </a>
                  <?php endif ; ?>
                </div>
              </div>

              <?php if($girls->option_fee): ?>
              <p class="option-fee-sp">
                <?php   $status = get_the_author_meta('option_fee', $girls->ID);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      } ?>
              </p>
              <?php endif ;?>

              <div class="ranking-text">
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
                          echo '<div class="ranking-worktime">';
                          echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->starttime);
                          echo '<span class="tilde">～</span>';
                          echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->endtime);
                          echo '</div>';
                          if (strcmp($val->workplace, "未選択")) {
                            echo '<span class="shop">'.$val->workplace.'</span>';
                          }
                          break;
                        } elseif ($val == end($rows)) {
                          echo '<div class="ranking-worktime none"></div>';
                        }
                      }
                    } ?>
              </div>

          </li>


          <li class="therapist-page-list sp">
            <div class="therapist-ranking-top">
              <img src="<?php echo get_template_directory_uri() ?>/images/ranking-icon-sp.png" alt="twitter icon">
              <p>No.<?php echo $girls->ranking;?></p>
            </div>

            <div class="therapist-ranking-wrap">
              <div class="therapist-img-wrap">
                <?php if($userData->newface_date): ?>
                <div class="therapist-img-newDate newDate">
                  <p><?php echo  $date->format('m月d日')?>入店</p>
                </div>
                <?php endif ;?>
                <div class="therapist-img">
                  <a href="<?php echo home_url().'/?author='.$uid;?>"
                    class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
                </div>
                <div class="ranking-text">
                  <p><a href="<?php echo home_url().'/?author='.$uid;?>">
                      <?php echo mb_substr($userData->user_description, 0, 54).'...'; ?></a>
                  </p>
                </div>
              </div>

              <div class="therapist-info-flexwrap">

                <div class="therapist-ranking">
                  <a href="https://twitter.com/<?php echo $userData->twitter;?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/images/ranking-icon.png" alt="twitter icon">
                  </a>
                  <p>No.<?php echo $girls->ranking;?></p>
                </div>


                <div class="therapist-infowrap">
                  <div class="therapist-contentwrap">
                    <div class="therapist-info">
                      <p class="therapist-name"><?php echo $girls->display_name;?>
                        <span class="age">（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span>
                      </p>
                      <p class="therapist-tall">身長：<?php echo $girls->tall;?><span>cm</span></p>
                    </div>
                  </div>
                </div>

                <?php if($girls->option_fee): ?>
                <p class="option-fee-sp"> <?php   $status = get_the_author_meta('option_fee', $girls->ID);
                      if($status == 'BRONZE'){ //値（Value）が「landscape」だったら
                      print('<img src="'.get_template_directory_uri().'/images/bronze.jpg" alt="bronze"></span></a></p>');
                      }elseif( $status == 'SILVER'){
                      print('<img src="'.get_template_directory_uri().'/images/silver.jpg" alt="silver"></span></a></p>');
                      }elseif( $status == 'GOLD'){
                      print('<img src="'.get_template_directory_uri().'/images/gold.jpg" alt="gold"></span></a></p>');
                      } ?>
                </p>

                <?php endif ;?>


                <?php 
                    if ($rows) {
                      foreach ($rows as $val) {
                        if ($val->staff_id == $uid && $val->date == date('Y-m-d', current_time('timestamp'))) {
                          echo '<div class="ranking-worktime">';
                          echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->starttime);
                          echo '<span class="tilde">～</span>';
                          echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->endtime);
                          echo '</div>';
                          echo '<div class="ranking-realtime">本日出勤</div>';
                          if (strcmp($val->workplace, "未選択")) {
                            echo '<span class="shop">'.$val->workplace.'</span>';
                          }
                          break;
                        } elseif ($val == end($rows)) {
                          echo '<div class="ranking-worktime none"></div>';
                        }
                      }
                    } 
                ?>

                <div class="ranking-twitter">
                  <a href="https://twitter.com/<?php echo $userData->twitter;?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/images/ranking-twitter-icon.png"
                      alt="twitter icon">
                  </a>
                </div>

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
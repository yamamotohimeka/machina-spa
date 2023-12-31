<?php
/****************************************
  Template Name: 出勤情報
*****************************************/
;?>
<?php include('load-schedule.php');?>
<?php get_header(); ?>
<section class="page-schedule section-bg">
  <div class="page-schedule-border inner">
    <h2 class="page-title">スケジュール</h2>
    <div class="inner">
      <div class="date-tab">
        <?php  
        for($i=0; $i<7; $i++) {
          $day_list = date('Y-m-d', strtotime("+".$i."day"));
          if($i==0) {
            echo '<label class="date-tab-item selected" for="day'.$i.'">';
          } else {
            echo '<label class="date-tab-item" for="day'.$i.'">';
          }
          echo date("n/j", strtotime("+".$i."day", current_time('timestamp')));
          echo '<span class="date-tab-week">('.$week[date('w',strtotime("+".$i."day", current_time('timestamp')))].')</span></label>';
          echo '</label>';
        }
        ?>
      </div>

      <?php for($j=0; $j<7; $j++):?>
      <input type="radio" name="date-select" id="day<?php echo $j;?>" <?php if($j==0) echo 'checked';?> hidden>
      <?php endfor;?>

      <section class="page-schedule-therapists">
        <div class="schedule-therapists-wrap">
          <?php for($k=0; $k<7; $k++):?>
          <?php $day = date('Y-m-d', strtotime('+'.$k.'day', current_time('timestamp'))); ?>
          <div class="box">
            <h2 class="page-schedule-title-day">
              <?php echo date('n/j', strtotime('+'.$k.'day', current_time('timestamp'))).'('.$week[date('w', strtotime('+'.$k.'day', current_time('timestamp')))].')'.'の出勤情報';?>
            </h2>

            <ul class="therapist-list-wrap">
              <?php 
              if($rows) {
                $count = 0;
                foreach($rows as $val) {
                  if($val->date === $day) {
                    $staff = $val->staff_id;
                    $count += 1;
                    $user_id = get_the_author_meta('ID', $val->staff_id);
                    $option_fee = get_the_author_meta('option_fee', $val->staff_id);
                    $newfaceDate = get_the_author_meta('newface_date', $val->staff_id);
                    $date = DateTime::createFromFormat('Ymd', $newfaceDate);
                    $c_id = "?cid=".$user_id;
                    
                    if($user_id) {
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
                      print(preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->starttime).'～'.preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->endtime).'</p>');
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
                      }
                    }
                    if($user_id){
                      print('</div></li>');
                    }
                  } elseif($val==end($rows) && $count==0) {
                    print('<li class="panel-nostaff">現在出勤情報はございません。</li>');
                  }
                }
              }
              ?>
            </ul>
          </div>
          <?php endfor;?>
        </div>
      </section>
    </div>
  </div>
</section>
<?php get_footer(); ?>
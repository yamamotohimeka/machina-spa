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
$current_timestamp = current_time('timestamp');
$week = ['日', '月', '火', '水', '木', '金', '土'];

for ($i = 0; $i < 7; $i++) {
    $timestamp = strtotime("+$i days", $current_timestamp);
    $day_list = date('Y-m-d', $timestamp);
    $class = ($i == 0) ? 'date-tab-item selected' : 'date-tab-item';
    echo '<label class="' . $class . '" for="day' . $i . '">';
    echo date('n', $timestamp) . '/<span class="date-tab-day">' . date('j', $timestamp) . '</span>';
    echo '<span class="date-tab-week">(' . $week[date('w', $timestamp)] . ')</span></label>';
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
            <h4 class="page-schedule-title-day">
              <?php echo date('n/j', strtotime('+'.$k.'day', current_time('timestamp'))).'('.$week[date('w', strtotime('+'.$k.'day', current_time('timestamp')))].')'.'の出勤情報';?>
            </h4>

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
                    $ranking = get_the_author_meta('ranking', $val->staff_id);

                    
                    if($user_id) {
                      print('<li class="therapist-list">');
                      print('<p class="therapist-list-realtime"></p>');
                    }
                    if($newfaceDate && $user_id) {
                      print('<p class="therapist-list-newDate newDate">NEW</p>');
                    }
                    if($user_id){
                      print('<p class="therapist-list-image">'.'<a href="'.get_author_posts_url($user_id).$c_id.'" class="expand-link">'.get_avatar($val->staff_id, 420).'</a>'.'</p>');
                        if($ranking){
                        print('<div class="rankicon"><p> <span>'. $ranking.'</span>位</p></div>');
                      }

                      if($option_fee ) {
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
                      print(preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->starttime).'～'.preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/','$1:$2', $val->endtime).'</p>');
                      print('<div class="page-schedule-staff-prof-content">');
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
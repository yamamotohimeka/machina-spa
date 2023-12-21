<?php
/****************************************
  Template Name: セラピスト一覧
*****************************************/
;?>
<?php include('load-schedule.php');?>
<?php get_header(); ?>
<section class="page-therapists section-bg">
  <h2 class="page-title">セラピスト一覧</h2>
  <?php $users = get_users( array('order'=>'ASC', 'orderby'=>'meta_value_num', 'meta_key'=>'priority', 'exclude'=>'') );?>

  <ul class="therapists-listwrap">
    <?php
    foreach($users as $girls):
    $uid =$girls->ID;
    $userData = get_userdata($uid);
    $newfaceDate = get_the_author_meta('newface_date', $girls->ID);
    $date = DateTime::createFromFormat('Ymd', $newfaceDate);
    $user_link = get_author_posts_url($uid);
    ?>

    <?php if($userData->attmgr_ex_attr_staff): ?>
    <li class="therapist-page-list">

      <div class="therapist-img-wrap">
        <?php if($userData->newface_date): ?>
        <div class="therapist-img-newDate newDate">
          <p><?php echo  $date->format('m月d日')?>入店</p>
        </div>
        <?php endif;?>

        <div class="therapist-img">
          <a href="<?php echo $user_link;?>" class="expand-link"><?php echo get_avatar( $uid ,420);?></a>
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
        </p>
        <?php endif;?>
      </div>

      <div class="therapist-info-flexwrap">
        <div class="therapist-infowrap">
          <div class="therapist-contentwrap">
            <p class="therapist-name"><?php echo $girls->display_name;?><span
                class="age">（<?php if(!empty($girls->fage)) echo $girls->fage;?>）</span></p>
            <p class="therapist-tall">身長：<?php echo $girls->tall;?><span>cm</span></p>
          </div>
          <p class="therapist-more"><a href="<?php echo $user_link;?>">もっとみる</a></p>
        </div>
        <p class="therapist-text">
          <?php echo $userData->user_description;?>
        </p>
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
        <?php endif;?>
      </div>

    </li>

    <?php endif;?>
    <?php endforeach;?>
  </ul>

</section>
<?php get_footer(); ?>
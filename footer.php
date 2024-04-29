<?php $user_twitter = get_field('twitter_shop', 'user_1'); ?>
<footer class="footer">

  <div class="footer-pc-navwrap">
    <ul class="footer-pc-nav">
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/'); ?>">トップ</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/ranking'); ?>">ランキング</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/diary'); ?>">写メ日記</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/schedule'); ?>">出勤情報</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/newface'); ?>">新人情報</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/system'); ?>">システム料金</a></li>
      <li class="footer-pc-nav-list"><a href="<?php echo home_url('/access'); ?>">アクセス</a></li>
      <li class="footer-pc-nav-list"><a href="https://recruit-machinaspa.com/" target="_blank">求人情報</a></li>
    </ul>
  </div>
  <div class="footer-flexdiv">
    <ul class="footer-spnav">
      <li class="footer-spnav-list"><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧</a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/schedule'); ?>">出勤情報</a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/ranking'); ?>">ランキング</a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/newface'); ?>">新人情報</a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/diary'); ?>">写メ日記</a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/system'); ?>">システム料金</a>
      </li>
      <li class="footer-spnav-list"><a href="">クレジットカード決済</a></li>
      <li class="footer-spnav-list"><a href="https://recruit-machinaspa.com/"
          target="_blank">求人情報<span>RECRUIT</span></a>
      </li>
      <li class="footer-spnav-list"><a href="<?php echo home_url('/access'); ?>">アクセス</a></li>
      <li class="footer-spnav-list"><a href="">ブログ</a>
      </li>
      <?php if ($user_twitter) : ?>
      <li class="footer-spnav-list"><a href="">エックス</a></li>
      <?php endif; ?>
    </ul>
    <div class="footer-logo-wrap">
      <h4 class="footer-logo">
        <img src="<?php echo get_template_directory_uri() ?>/images/header-logo.png" alt="MACHINA SPAロゴ画像">
      </h4>
      <ul class="footer-logo-snswrap">
        <li class="footer-logo-snslist">
          <a href="https://machinaspa.blog.jp/" target="_blank"><img
              src="<?php echo get_template_directory_uri() ?>/images/header-blog-icon.png" alt="ブログアイコン"></a>
        </li>
        <?php if ($user_twitter) : ?>
        <li class="footer-logo-snslist">
          <a href="https://twitter.com/machinaspa" target="_blank"><img
              src="<?php echo get_template_directory_uri() ?>/images/header-x-icon.png" alt="twitterアイコン"></a>
        </li>
        <?php endif; ?>
        <li class="footer-logo-snslist">
          <a href="https://line.me/ti/p/bu-oYYu4nf#~"><img
              src="<?php echo get_template_directory_uri() ?>/images/header-line-icon.png" alt="LINEアイコン"></a>
        </li>
      </ul>
    </div>
    <div class="footer-info-wrap">
      <p class="gotop"><a href="#header">
          <img src="<?php echo get_template_directory_uri() ?>/images/gotop.png" alt="矢印"></a></p>
      <p class="footer-logo-hours">営業時間 12:00-27:00<br>
        <span>（受付時間 10:00〜25:30）</span>
      </p>
      <p class="footer-logo-tel">TEL.<span>080-4395-1844</span></p>

    </div>

  </div>
  <div class="footer-pc-copyright-wrap">
    <p class="footer-pc-copyright-wrap-text">©202310 MACHINA SPA（マキナスパ）. All Rights Reserved. </p>
  </div>
</footer>


<ul class="footer-sp-listwrap">
  <li class="footer-sp-list">
    <a href="tel:08043951844">
      <p class="footer-sp-list-img"><img src="<?php echo get_template_directory_uri() ?>/images/tel-icon.png"
          alt="電話アイコン"></p>
    </a>
  </li>
  <li class="footer-sp-list">
    <a href="sms:08043951844">
      <p class="footer-sp-list-img footer-sp-list-img-sms"><img
          src="<?php echo get_template_directory_uri() ?>/images/sms-icon.png" alt="SMSアイコン"></p>
    </a>
  </li>
  <li class="footer-sp-list">
    <a href="https://line.me/ti/p/bu-oYYu4nf#~" target="_blank">
      <p class="footer-sp-list-img"><img src="<?php echo get_template_directory_uri() ?>/images/line-icon.png"
          alt="LINEアイコン"></p>
    </a>
  </li>
</ul>
<?php if(is_front_page()):?>
<div class="top__link">
  <div class="top__link-flex">
    <div class="top__link-bnr">
      <a href="https://114510.jp/"><img src="https://114510.jp/img/link/114510jp_200_40.gif"
          alt="高収入アルバイト・非風俗求人情報「メンエスバイト」" /></a>
    </div>
    <div class="top__link-bnr">
      <a href="https://kansai.momi-lg.com" target="_blank"><img src="https://kansai.momi-lg.com/img/FRONT/pc/200_40.gif"
          alt="モミろぐ関西" border="0"></a>
    </div>
    <div class="top__link-bnr">
      <a href="https://osaka.refle.info/"><img width="200" height="40" border="0"
          src="https://osaka.refle.info/images/area/bunner200_2.gif" alt="大阪でメンズエステ・マッサージ探すならリフナビ"></a>
    </div>
    <div class="top__link-bnr"> <a href="https://me-navi.com/job/" rel="nofollow noopener" target="_blank"><img
          src="https://me-navi.com/asset/img/j_200_40.gif" alt="メンズエステバイト情報【メンエスナビ求人】"></a>
    </div>
    <div class="top__link-bnr"> <a href="https://me-navi.com" rel="nofollow noopener" target="_blank"><img
          src="https://me-navi.com/asset/img/200_40.gif" alt="男性向けリラクゼーションサロン専門情報サイト そけい部長のメンエスナビ"></a>
    </div>
    <div class="top__link-bnr"> <a href="https://menes-ikitai.co.jp/osaka/sakaisuji-honmachi-ranking/" target="_blank">
        <img src="https://menes-ikitai.co.jp/wp-content/uploads/2023/03/4-2.png" width="200" height="40" border="0"
          alt="【厳選】堺筋本町メンズエステ_メンエスイキタイ"> </a>
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
<?php endif;?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/index.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  if ($('.slider').length) {
    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: false,
      centerMode: false,
      dots: true,
    });
  }

});
</script>


<script>
$(function() {
  if ($('.author-mainimg-wrap').length) {
    $('.author-mainimg-wrap').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      autoplay: false,
      asNavFor: '.author-thumbnail-wrap'
    });
  }
  if ($('.author-thumbnail-wrap').length) {
    $('.author-thumbnail-wrap').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.author-mainimg-wrap',
      dots: false,
      centerMode: false,
      focusOnSelect: true,
      autoplay: false,
    });
  }
});

$('.author-mainimg-wrap').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
  if ($('.author-thumbnail-wrap .author-thumbnail').length < 4) {
    $('.author-thumbnail-wrap').slick('slickSetOption', 'centerMode', false, true);
  }
});


$('.author-thumbnail-wrap li').on('mouseover', function(e) {
    var $currTarget = $(e.currentTarget),
      index = $currTarget.data('slick-index'),
      slickObj = $('.author-mainimg-wrap').slick('getSlick');
    slickObj.slickGoTo(index, true); // アニメーション中でも切り替える
    $slide.slick('slickPause'); // 自動切り替え停止
  })
  .on('mouseout', function(e) {
    $slide.slick('slickPlay'); // 自動切り替え再開
  });
</script>





<!--ハンバーガーメニュー -->
<script>
$(function() {
  $('.toggle').click(function() {
    $(this).toggleClass("active none");
    $('.toggle img').toggleClass("active none");
    if ($(this).hasClass('active')) {
      $('.global-nav').addClass('active');
    } else {
      $('.global-nav').removeClass('active');
    }
  });
});
</script>

<script>
var navPos = jQuery('#global-nav').offset().top; // グローバルメニューの位置
var navHeight = jQuery('#global-nav').outerHeight(); // グローバルメニューの高さ
jQuery(window).on('scroll', function() {
  if (jQuery(this).scrollTop() > navPos) {
    jQuery('body').css('padding-top', navHeight);
    jQuery('#global-nav').addClass('m_fixed');
  } else {
    jQuery('body').css('padding-top', 0);
    jQuery('#global-nav').removeClass('m_fixed');
  }
});
</script>


<?php wp_footer(); ?>
</body>

</html>
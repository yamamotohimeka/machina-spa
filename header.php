<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>大阪 南船場・堺筋本町のメンズエステ【MACHINA SPA】マキナスパ</title>
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="description"
    content="大阪長堀橋駅・堺筋本町駅から徒歩1分圏内にある、南船場・堺筋本町のメンズエステ【MACHINA SPA】マキナスパ。当店は、南船場で極上のメンズエステをご提供しております。日頃のストレスを厳選されたセラピストがお客様の疲れ切った全身をアロマオイルで全身マッサージして心も身体も揉みほぐします。">
  <meta name="keywords" content="大阪,南船場,堺筋本町,メンズエステ,MACHINA SPA,マキナスパ">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- /////////////////ogp -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/website#">
    <meta property="og:url" content="https://frog-spa.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="大阪 南船場・堺筋本町のメンズエステ【MACHINA SPA】マキナスパ" />
    <meta property="og:description"
      content="大阪長堀橋駅・堺筋本町駅から徒歩1分圏内にある、南船場・堺筋本町のメンズエステ【MACHINA SPA】マキナスパ。当店は、南船場で極上のメンズエステをご提供しております。日頃のストレスを厳選されたセラピストがお客様の疲れ切った全身をアロマオイルで全身マッサージして心も身体も揉みほぐします。" />
    <meta property="og:site_name" content="大阪 南船場・堺筋本町のメンズエステ【MACHINA SPA】マキナスパ" />
    <meta property="og:image" content="https://machina-spa.com/wp-content/themes/machinaspa/images/machina-ogp.png" />
    <!-- /////////////////ogp -->
    <link rel="shortcut icon" href="https://machina-spa.com/wp-content/themes/machinaspa/images/favicon.png">
    <!--------------------スライダー見た目-------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <!------------------------------------------------------------------------------------->

    <!--------------------jQuery----------------------------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!------------------------------------------------------------------------------------->

    <!--------------------スライダー動かすやつ----------------------------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <!------------------------------------------------------------------------------------->
    <script>
    (function(d) {
      var config = {
          kitId: 'doo0xtb',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
    </script>

    <?php wp_head(); ?>
  </head>

  <?php if(is_page('system')):?>

<body class="system-body">
  <?php elseif(is_page('ranking')):?>

  <body class="ranking-body">
    <?php elseif(is_page('newface')):?>

    <body class="newface-body">
      <?php else:?>

      <body>
        <?php endif;?>
        <?php $user_twitter = get_field('twitter_shop','user_1'); ?>
        <header class="header" id="header">
          <div class="header-innerwrap">
            <div class="header-inner">
              <div class="header-logo-wrap">

                <div class="header-logo-wrap-top">
                  <h1 class="header-logo">
                    <a href="<?php echo home_url('/'); ?>">
                      <img src="<?php echo get_template_directory_uri() ?>/images/header-logo.png"
                        alt="MACHINASPAロゴ画像"></a>
                  </h1>
                  <div class="toggle sp">
                    <span></span>
                  </div>
                </div>

                <div class="header-logo-text-wrap sp">
                  <ul class="header-sns-listwrap">
                    <li class="header-sns-list"><a href="http://frogspa.livedoor.blog/" target="_blank"><img
                          src="<?php echo get_template_directory_uri() ?>/images/header-blog-icon.png"
                          alt="ブログアイコン"></a></li>
                    <?php if($user_twitter) : ?>
                    <li class="header-sns-list"><a href="https://twitter.com/<?php echo $user_twitter; ?>"
                        target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/header-twitter.png"
                          alt="twitterアイコン"></a></li>
                    <?php endif;?>
                    <li class="header-sns-list"><a href="https://line.me/ti/p/71Sadk-PUI" target="_blank"><img
                          src="<?php echo get_template_directory_uri() ?>/images/header-line-icon.png"
                          alt="LNEアイコン"></a></li>
                  </ul>

                  <p class="header-logo-text">南船場・堺筋本町</p>
                  <p class="header-sns-lineid"><a href="https://line.me/ti/p/71Sadk-PUI" target="_blank">LINE
                      ID<span>frogspa</span></a></p>
                </div>
              </div>



              <nav class="global-nav">
                <ul>
                  <li class="nav-li"><a href="<?php echo home_url('/'); ?>">ホーム<span>HOME</span></a>
                  </li>
                  <li class="nav-li"><a href="<?php echo home_url('/therapists'); ?>">セラピスト一覧<span>THERPIST</span></a>
                  </li>
                  <li class="nav-li"><a href="<?php echo home_url('/ranking'); ?>">ランキング<span>RANKING</span></a>
                  </li>
                  <li class="nav-li"><a href="<?php echo home_url('/newface'); ?>">新人情報<span>NEWFACE</span></a></li>
                  <li class="nav-li"><a href="<?php echo home_url('/schedule'); ?>">出勤情報<span>SCHEDULE</span></a>
                  </li>
                  <li class="nav-li"><a href="<?php echo home_url('/system'); ?>">システム料金<span>SYSTEM</span></a></li>
                  <li class="nav-li"><a href="https://pay2.star-pay.jp/site/pc/shop.php?tel=&payc=A2038&guide="
                      target="_blank">クレジットカード決済<span>CREDIT CARD</span></a></li>
                  <li class="nav-li"><a href="<?php echo home_url('/access'); ?>">アクセス<span>ACCESS</span></a></li>
                  <li class="nav-li"><a href="http://frogspa.livedoor.blog/" target="_blank">ブログ<span>BLOG</span></a>
                  </li>
                  <li class="nav-li"><a href="https://recruit-machinaspa.com/"
                      target="_blank">求人情報<span>RECRUIT</span></a>
                  </li>
                </ul>
              </nav>

              <div class="header-sns-wrap pc">
                <ul class="header-sns-listwrap">
                  <li class="header-sns-list"><a href="http://frogspa.livedoor.blog/" target="_blank"><img
                        src="<?php echo get_template_directory_uri() ?>/images/header-blog-icon.png"
                        alt="ブログアイコン"><span>BLOG</span></a></li>
                  <?php if($user_twitter) : ?>
                  <li class="header-sns-list"><a href="https://twitter.com/<?php echo $user_twitter; ?>"
                      target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/header-twitter.png"
                        alt="twitterアイコン"><span>X</span></a></li>
                  <?php endif;?>
                  <li class="header-sns-list"><a href="https://line.me/ti/p/71Sadk-PUI" target="_blank"><img
                        src="<?php echo get_template_directory_uri() ?>/images/header-line-icon.png"
                        alt="LNEアイコン"><span>LINE</span></a></li>
                </ul>
              </div>

              <div class="header-pc-shopinfo">
                <p class="header-pc-shopinfo-time">営業時間 12:00-27:00（受付時間 10:00〜25:30）</p>
                <p class="header-pc-shopinfo-tel">TEL.<span>080-4395-1844</span></p>
                <p class="header-credit"><a href="https://pay2.star-pay.jp/site/pc/shop.php?tel=&payc=A2038&guide="
                    target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/credit.png" alt=""></a>
                </p>
              </div>
            </div>

          </div>
          <div id="global-nav" class="pc-global-navwrap">
            <ul class="pc-header-menu">
              <li class="pc-header-menu-list"><a href="<?php echo home_url('/'); ?>"><span>ホーム</span>HOME</a></li>
              <li class="pc-header-menu-list"><a
                  href="<?php echo home_url('/therapists'); ?>"><span>セラピスト一覧</span>THERPIST</a></li>
              <li class="pc-header-menu-list"><a
                  href="<?php echo home_url('/schedule'); ?>"><span>出勤情報</span>SCHEDULE</a>
              </li>
              <li class="pc-header-menu-list"><a
                  href="<?php echo home_url('/ranking'); ?>"><span>ランキング</span>RANKING</a>
              </li>
              <li class="pc-header-menu-list"><a href="<?php echo home_url('/newface'); ?>"><span>新人情報</span>NEWFACE</a>
              </li>
              <li class="pc-header-menu-list"><a href="<?php echo home_url('/system'); ?>"><span>システム料金</span>SYSTEM</a>
              </li>
              <li class="pc-header-menu-list"><a href="https://pay2.star-pay.jp/site/pc/shop.php?tel=&payc=A2038&guide="
                  target="_blank"><span>クレジットカード決済</span>CREDIT CARD</a></li>
              <li class="pc-header-menu-list"><a href="<?php echo home_url('/access'); ?>"><span>アクセス</span>ACCESS</a>
              </li>
              <li class="pc-header-menu-list"><a href="http://frogspa.livedoor.blog/"
                  target="_blank"><span>ブログ</span>BLOG</a></li>
              <li class="pc-header-menu-list"><a href="https://recruit-machinaspa.com/"
                  target="_blank"><span>求人情報</span>RECRUIT</a>
              </li>
            </ul>
          </div>
        </header>
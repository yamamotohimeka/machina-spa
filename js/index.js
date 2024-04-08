$(document).ready(function () {
  $(".newface-list-wrap").slick({
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: false,
    centerMode: false,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    responsive: [
      {
        breakpoint: 1200, // 399px以下のサイズに適用
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
});

document.addEventListener("DOMContentLoaded", function () {
  //出勤情報の切り替え

  // 日付タブの要素を取得
  var dateTabs = document.querySelectorAll(".date-tab-item");

  // 日付タブの要素にクリックイベントを追加
  dateTabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      // すべての日付タブの背景色をリセット
      dateTabs.forEach(function (tab) {
        tab.classList.remove("selected");
      });
      // クリックされた日付タブに背景色を適用
      this.classList.add("selected");
    });
  });
});

$(function () {
  const pagetop = $("top__link-sp");

  pagetop.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0, //上から0pxの位置に戻る
      },
      800
    ); //800ミリ秒かけて上に戻る
  });
});

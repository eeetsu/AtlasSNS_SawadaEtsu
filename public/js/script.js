//アコーディオンメニュー
jQuery(function ($) {
  // コンテンツを非表示
  $('.accordion-content').hide();
  //コンテンツのタイトルをクリック
  $('.js-accordion-title').on('click', function () {
    //クリックでコンテンツを展開
    $(this).next().slideToggle(200);
    //矢印の向きを変更
    $(this).toggleClass('open', 200);
  }).next().hide();
});

$(function () {
  $('.menu li').hide();
  $('.accordion dl dt').click(function (e) {
    $('.accordion dl dt').toggleClass("open");
    //.slide-barの表示・非表示は不要なので下記削除する
    //$('.slide-bar').toggle();
    $('.slide li').slideToggle('normal');
  })
})


// モーダル部分の表示・非表示を制御
$(function () {
  $('.modalopen').click(function () {
    var target = $(this).data('target');
    var postContent = $(this).prev('input[name="post"]').val(); // クリックした編集ボタンの隣のhidden inputから投稿内容を取得
    $(target).find('textarea').val(postContent); // モーダル内のtextareaに投稿内容を表示
    $(target).fadeIn();
    return false;
  });
});



//$(function () {
//alert('OK!');
//});

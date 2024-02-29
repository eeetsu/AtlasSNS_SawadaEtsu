//アコーディオンメニュー
jQuery(function ($) {
  // コンテンツを非表示
  $('.accordion-menu').hide();
  //コンテンツのタイトルをクリック
  $('.js-accordion-title').on('click', function () {
    //クリックでコンテンツを展開
    $(this).next('.menu-btn').slideToggle(200);
    //矢印の向きを変更
    $(this).toggleClass('open', 200);
    $(function () {
      $('.js-accordion-title').on('click', function () {
      });
    });
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
    var postId = $(this).prev('input[name="post_id"]').val();
    var postContent = $(this).prev('input[name="post"]').val();
    $(target).find('#editForm').attr('action', '/posts/update/' + postId); // フォームのaction属性を正しいURLに更新
    $(target).find('#edited_post').val(postContent); // フォーム内のtextareaに投稿内容を表示
    $(target).fadeIn();
    return false;
  });
});




//$(function () {
//alert('OK!');
//});

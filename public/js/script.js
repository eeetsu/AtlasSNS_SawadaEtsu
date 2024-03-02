// アコーディオンメニュー
$(function () {
  // コンテンツを非表示
  //$('.accordion-menu').hide();
  // コンテンツをクリック
  $('.menu-btn').on('click', function () {
    // クリックでコンテンツを展開
    $(this).next('.accordion-menu').slideToggle(200);
    // 矢印の向きを変更
    $(this).toggleClass('open');
    // 他のコンテンツを閉じる
    $('.accordion-menu').not($(this).next()).slideUp();
  });
});



//$(function () {
//  $('.accordion-menu').click(function () {
//ボタン（'.accordion-menu'）をタップすると、
//    $(this).toggleClass('active');
//タップしたボタン（'.accordion-menu'）に（.active）を追加・削除する。
//    if ($(this).hasClass('active')) {
//もし、ボタン（'.accordion-menu'）に（.active）があれば、
//      $('.nav').addClass('active');
//(.g-navi)にも（.active）を追加する。
//    } else {
//それ以外の場合は、
//      $('.nav').removeClass('active');
//(.g-navi)にある（.active）を削除する。
//    }
//  });
//  $('accordion-title js-accordion-title').click(function () {
//各メニューリンク（.nav-wrapper ul li a）をタップすると、
//    $('accordion-content').removeClass('active');
//ボタン（.menu-trigger）にある（.active）を削除する。
//    $('.nav').removeClass('active');
//(.g-navi)にある（.active）も削除する。
//  });
//});




// モーダル部分の表示・非表示を制御
$(function () {
  $('.modalopen').click(function () {
    var target = $(this).data('target');
    var postId = $(this).prev('input[name="post_id"]').val();
    var postContent = $(this).prev('input[name="post"]').val();
    $(target).find('#editForm').attr('action', '/posts/update/' + postId);
    $(target).find('#edited_post').val(postContent); // フォーム内のtextareaに投稿内容を表示
    $(target).fadeIn();
    return false;
  });
});






//$(function () {
//alert('OK!');
//});

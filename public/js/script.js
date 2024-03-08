$(function () {
  $('.menu-btn').on('click', function () {
    // クリックでコンテンツを展開/閉じる
    $(this).next('.accordion-menu').slideToggle(200);
    $(this).toggleClass('open');
    // 他のコンテンツを閉じる
    $('.menu-btn').not($(this)).removeClass('open');
    $('.accordion-menu').not($(this).next()).slideUp();
  });
});


//$('.parent').click(function(){
//    $('.child').slideToggle();
//});



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







//モーダル

$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});








//$(function () {
//alert('OK!');
//});

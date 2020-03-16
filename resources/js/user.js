
// トップに戻るボタン
function activepageTopBtn() {
    $(window).scroll(function () { 
        if ($(window).scrollTop() > 100) {   
            $('#pageTopBtnBox').fadeIn();
        } else {
            $('#pageTopBtnBox').fadeOut();
        }
    });
    $('#pageTopBtn').on('click',function(){

        $('html, body').stop().animate({
            scrollTop: $('body').offset().top
        }, 300);

    });
}
activepageTopBtn();

$(function(){
    // 同一ページジャンプ
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
    // スクロールの速度
    var speed = 400; // ミリ秒
    // アンカーの値取得
    var href= $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? 'html' : href);
    // 移動先を数値で取得
    var position = target.offset().top;
    // スムーススクロール
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
 });
});
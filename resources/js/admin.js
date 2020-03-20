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

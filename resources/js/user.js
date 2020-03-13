jQuery(function() {
    var appear = false;
    var pagetop = $('#page_top');
    $(window).scroll(function () {
        if ($($this).scrollTop() > 300) {
            if (appear == false) {
                appp = true;
                pagetop.stop().animate({
                    'right': '0px'
                }, 300);
            }
        } else {
            if (appear) {
                apper = false;
                pagetop.stop().animate({
                    'right': '-50px'
                }, 300);
            }
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500);
        return false;
    });
});
   
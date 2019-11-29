// number animation
var class_name, duration_count;
function animate(class_name, duration_count) {
    var show = true;
    var countbox = "#counts";
    $(window).on("scroll load resize", function () {
        if (!show) return false;
        var w_top = $(window).scrollTop();
        var e_top = $(countbox).offset().top;
        var w_height = $(window).height();
        var d_height = $(document).height();
        var e_height = $(countbox).outerHeight();
        if (w_top + 450 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            $(class_name).spincrement({
                thousandSeparator: "",
                duration: duration_count
            });
            show = false;
        }
    });
}
animate('.spincrement1', 2500);
animate('.spincrement2', 2500);
animate('.spincrement3', 2000);
animate('.spincrement4', 2300);

// wow animation
new WOW().init();

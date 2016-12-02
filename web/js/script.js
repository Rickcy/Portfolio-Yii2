$(function () {

    $(".screen-height").height($(window).height()-50);

    $(window).resize(function(){
        $(".screen-height").height($(window).height()-50);
    });

    $(".fancybox").fancybox({
        openEffect	: 'none',
        closeEffect	: 'none'
    });




    $('.skills').waypoint(function(){
        $('.chart').each(function(){
            $(this).easyPieChart({
                size:130,
                animate: 2400,
                lineCap:'butt',
                scaleColor: false,
                barColor: '#FF5252',
                trackColor: 'transparent',
                lineWidth: 10
            });
        });
    },{offset:'80%'});
});
wow = new WOW({
    mobile: false
});
wow.init();

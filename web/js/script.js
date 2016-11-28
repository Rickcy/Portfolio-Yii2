(function () {

    $(".screen-height").height($(window).height());

    $(window).resize(function(){
        $(".screen-height").height($(window).height());
    });



    $('.skills').waypoint(function(){
        $('.chart').each(function(){
            $(this).easyPieChart({
                size:140,
                animate: 2000,
                lineCap:'butt',
                scaleColor: false,
                barColor: '#FF5252',
                trackColor: 'transparent',
                lineWidth: 10
            });
        });
    },{offset:'80%'});
})();
wow = new WOW({
    mobile: false
});
wow.init();
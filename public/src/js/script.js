$(document).ready(function(){
    if($(window).width() <= 991){
        //Открытие и закрытие мобильного меню
        var m = 0;
        $('#mobile-click').on('click', function(){
            if(m == 0){
                menuShow();
                m = 1;
            } else{
                menuHide();
                m = 0;
            }
        });
        function menuShow(){
            $('#mobile-menu').show(300);
        }
        function menuHide(){
            $('#mobile-menu').hide(300);
        }
    }
});
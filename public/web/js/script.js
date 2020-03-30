// JavaScript Document
$('document').ready(function (){
    $('.menu-icon').click(function (){
        jQuery('.mob-nav').animate({'left': '0px'}, 100);
    });

    jQuery('.close-btn').on("click", function(){
        jQuery('.mob-nav').animate({'left': '-100%'}, 100);
    });

    $('.about-menu').hover(function (){
        if($('.sub-ul').is(':hidden')){
            $('.sub-ul').slideDown('slow');
        }else{
            $('.sub-ul').slideUp('slow');
        }
    });

     /*$('.navigation li').hover(function (){
        if($(this).find('.navigation li ul').is(':hidden')){
            $(this).find('.navigation li ul').slideDown('slow');
        }else{
            $(this).find('.navigation li ul').slideUp('slow');
        }
    });*/
});
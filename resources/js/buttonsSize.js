$(document).ready(function(){

buttons();

    $(window).resize(function(){
        buttons();
    });
});

function buttons(){
    $('.menu .col').height($('.menu .col').width());
}

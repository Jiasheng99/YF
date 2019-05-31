$(document).ready(function(){
    $('.fa-bars').click(mostrar);
    $('.fa-times').click(ocultar);
    $('#logo').click(function(){
        window.location.href = "/staff";
    })
});

function mostrar(){
    if($( window ).width() <= "500"){
        $('#sidebar').css('width',"100%").css('display','inline');

    }else{
        $('#sidebar').css('width',300).css('display','inline');
    }
}

function ocultar(){
    $('#sidebar').css('width',0).css('display','none');
    $('body').css('overflow','hidden');
    $('table').css('margin-left',0);
}

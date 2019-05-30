$(document).ready(function(){
    $('#div1').click(Staff);
    $('#div2').click(Cliente);
    $('#div3').click(Empresa);
});

function Staff(){
    window.location.href="staff";
}

function Cliente(){
    window.location.href="client";
}

function Empresa(){
    window.location.href="empresa";
}
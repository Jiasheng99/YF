
window.onload=function(){

    $('#Rpago').hide();
    $("#CancelarP").click(CancelarPago);
    $("#PagarP").click(RealizarPago);

  
    // Pagar
    
    $("#pagar").click(pagar);
 
    //Borrar
   
    // ----------------------------------------
    //Errores de tienda
    var ErroresTienda = {
        width: 500,
        height: 150,
        autoOpen: false,
        modal: true
    };
    $("#ERRORESTIENDA").dialog(ErroresTienda);

    
    var OpcionesP ={
        width: 450,
        height: 600,
        autoOpen: false,
        modal: true,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    }
    $("#Rpago").dialog(OpcionesP);
    // -------------------------------------
    // Errores de agregar
    
    // EDITARJUGADOR


    // pagar
    
}



function CancelarPago(){
    $("#Rpago").dialog("close");
}
function TarjetaV(numero) {
    var TarjetaV = {
      "Visa": /\b4[0-9]{12}(?:[0-9]{3})?\b/
    };
    for(var card in TarjetaV) {
      if (TarjetaV[card].test(numero)) {
        var arr = numero.match(TarjetaV[card]);
        return { type: card, number: arr[0] };
      }
    }
    return undefined;
}
function TarjetaM(numero){
    var TarjetaM = {
        "Mastercard": /\b5[1-5][0-9]{14}\b/
    };
    for(var card in TarjetaM) {
        if (TarjetaM[card].test(numero)) {
        var arr = numero.match(TarjetaM[card]);
        return { type: card, number: arr[0] };
        }
    }
    return undefined;
}
function RealizarPago(){
    Sololetra = /[0-9]/; 
    var hoy= new Date();
    var AnyoFecha = hoy.getFullYear();
    var MesFecha = hoy.getMonth();
    var DiaFecha = hoy.getDate();
    var resultafchahoy=DiaFecha+"/"+(MesFecha+1)+"/"+AnyoFecha;
    var fehcain = document.getElementById("Data").value;
        if($("#V").is(':checked')) {  
            var Numero= $("#NumeroP").val();
            var card = TarjetaV(Numero);
            
            if (card) {
                if (fehcain.length<1) {
                    $('#ErroresTienda').html("Introdusca Su fecha de vencimiento porfavor");
                    $("#ERRORESTIENDA").dialog("open");
                }else{
                    if (validate_fechaMayorQue(resultafchahoy,fehcain)) {
                        window.location.reload(true);
                        // $('#ErroresTienda').html("Compra realizada "+ card.type);
                        $("#ERRORESTIENDA").dialog("open");

                    }else{
                        
                        $('#ErroresTienda').html("Error fecha pasada cambiar fecha");
                        $("#ERRORESTIENDA").dialog("open");
                        
                        
                    }
                }            
            }else{
                $('#ErroresTienda').html("ERROR DE TARJETA O NO ES VISA O FALTA INTRODUCIR");
                $("#ERRORESTIENDA").dialog("open");
               
            } 
        } else if($("#M").is(':checked')) {  
            var Numero= $("#NumeroP").val();
            var card = TarjetaM(Numero);
            if (card) {
                if (fehcain.length<1) {
                    $('#ErroresTienda').html("Introdusca Su fecha de vencimiento porfavor");
                    $("#ERRORESTIENDA").dialog("open");
                }else{
                    if (validate_fechaMayorQue(resultafchahoy,fehcain)) {
                        window.location.reload(true);
                        // $('#ErroresTienda').html("Compra realizada "+ card.type);
                        $("#ERRORESTIENDA").dialog("open");

                    }else{
                        $('#ErroresTienda').html("Error fecha pasada cambiar fecha");
                        $("#ERRORESTIENDA").dialog("open");
                        
                        
                    }
                }
                    
            }else{
                $('#ErroresTienda').html('ERROR DE TARJETA O NO ES MASTERCARD O FALTA INTRODUCIR');
                $("#ERRORESTIENDA").dialog("open");
                
            } 
        }
        else {  
            $('#ErroresTienda').html("SELECIONE VISA O MASTERCARD");
            $("#ERRORESTIENDA").dialog("open");
            
        } 
    }
        

      


function pagar(){
    var Contenido = $("#total").text();

    if (Contenido<=0) {
        $('#ErroresTienda').html('No has seleccionado nada al carrito');
        $("#ERRORESTIENDA").dialog("open");
       
    }else{
        if(!$("#Rpago").dialog("isOpen")) {
            $("#Rpago").dialog("open");
        }
    }
    
}


function validate_fechaMayorQue(fechaInicial,fechaFinal){
    valuesStart=fechaInicial.split("/");
    valuesEnd=fechaFinal.split("/");
    // Verificamos que la fecha no sea posterior a la actual
    var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
    var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
    if(dateStart>=dateEnd)
    {
        return 0;
    }
    return 1;
}
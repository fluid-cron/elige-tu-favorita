function decir(mensaje) {
  $('#mensaje').html( mensaje );
}

jQuery(document).ready(function(jQuery) {
    
  $("#btn-participar").click(function(){
      $("#div-participar").hide();
      $("#div-formulario").show();
  })

  $("#nombre").on("keydown",function( event ) {
     var tecla = event.which;      
      return !( (tecla > 47 && tecla < 58) || (tecla > 95 && tecla < 106) || tecla == 46 );
  });

  $("#telefono,#edad").on("keydown",function(event) {
     var tecla = event.which
     return ( (tecla > 47 && tecla < 58) || (tecla > 95 && tecla < 106) || tecla == 46 || tecla == 8 || tecla == 9 ); 
  });  
  
  $("#btn-enviar").click(function() {      
    jQuery("#datos").submit();
  });  

  $("#datos").validate({
      ignore :[],
      rules:{ 
        'producto'   : { required:true },
        'nombre'     : { required:true , minlength: 3 },
        'edad'       : { required:true , minlength: 2 },
        'email'      : { required:true , email: true , minlength: 5 },
        'telefono'   : { required:true , minlength: 8}
      },     
      errorPlacement: function(error,element) {
        element.addClass('error');
      },
      unhighlight: function(element) {
        $(element).removeClass("error");
      },
      submitHandler:function() {

          $("#enviar").hide();
          
          jQuery.post('app/saveFormulario', jQuery("#datos").serialize(), function(data) {

              if(data==1) {
                decir('Ya estás participando por un super pack del papel que más te gusta.');
                $("#nombre,#producto,#email,#telefono").val("");
                $("#datos").hide();
                //$("#enviar").show();
              }else if(data==2) {
                decir('El email ingresado ya se encuentra registrado.');
                $("#email").val(""); 
                $("#enviar").show();
              }else if(data==0) {
                decir('No se pudieron guardar los datos, por favor intenta más tarde.');
                $("#enviar").show();
              }

          });                    

      }
      
  });

});
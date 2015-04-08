jQuery(document).ready(function(){

  jQuery(".loading").hide();

  $('form').submit(function(e){
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if(validator.checkAll( $(this) ) ){
              showLoading();
              $.post( "core/creatingStructure.php",{ form: $(this).serialize()}, function(data) {
              jQuery("#admin_panel_content").html(data);
          })
            .fail(function() {
              jQuery("#admin_panel_content").html("<span class='error'> - Error in Ajax Connection</span>");
              jQuery(".loading").hide();
          })
            .complete(function(){
              jQuery(".loading").hide();

            })

      }
  });

})

function showLoading(){

  jQuery(".loading").show();

}

//@Author: William Mello
//Colaborador: Cesar Bonfá
//@Created: 21/07/2008
//@Last Update: 21/07/2008
//@Function: Formatar(mascarar) campo
//@parameter: campo = campo que será formatado (só o campo, não o valor Ex: this, formulario.nome_campo)
//@parameter: formato = formato que será mascarado. Os valores são representado por 'X' Ex: 'XX/XX/XX, XXX.XXX.XXX-XX'
//Chamar a função: onKeyUp(this, 'xx/xx/xxxx') or Jquery, ou onKeyPress(formulario.nome_campo, 'xx.xxx.xx.-x')

function mascara(campo, evento, formato){
  if(evento.keyCode !=8){
    if(campo.value.length > formato.length){
      campo.value = campo.value.substring(0,formato.length);
    }else{
      formato = formato.toUpperCase();
      if(formato.charAt(campo.value.length) != 'X'){
        campo.value += formato.charAt(campo.value.length); 
      }
    }
  }                   
}
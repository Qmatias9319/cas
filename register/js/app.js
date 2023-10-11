$(document).ready(() => {
  var totalSteps = $(".steps li").length;

  $("#form_01").submit((e) => {
    e.preventDefault();
    console.log('valores')
  })

  $('#form_01 :input, #form_01 select').on('input change', function() {
    var form = $("#form_01");
    var isFormValid = true;
    form.find(':input[required], #form_01 select[required]').each(function() {
      if ($(this).val() === '') {
        isFormValid = false;
        return false;
      }
    });
    if(form.find('.is-invalid').length > 0){
      isFormValid = false;
    }
    if (isFormValid) {
      $('#btn_form01').prop('disabled', false);
    } else {
      $('#btn_form01').prop('disabled', true);
    }
  });

  $(".submit").on("click", function(){
    return false; 
  });

  $(".steps li:nth-of-type(1)").addClass("active");
  $(".myContainer .form-container:nth-of-type(1)").addClass("active");

  $(".form-container").on("click", ".next", function() { 
    console.log($(this))
    $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active"); 
    $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");   
  });

  $(".form-container").on("click", ".back", function() {  
    $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active"); 
    $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY"); 
  });
})

// Validaciones formulario --1--
$("#celular").on('input', ()=>{
  if($.isNumeric($("#celular").val()) && $("#celular").val().length == 8){
    $("#celular").removeClass('is-invalid');
  }else{
    $("#celular").addClass('is-invalid');
  }
});
$("#fecha_nac").on('change', (e) => {
  const hoy = new Date();
  const fechaNac = new Date(e.target.value);
  var añoNacimiento = fechaNac.getFullYear();
  var mesNacimiento = fechaNac.getMonth();
  var diaNacimiento = fechaNac.getDate() + 1;
  var añoActual = hoy.getFullYear();
  var mesActual = hoy.getMonth();
  var diaActual = hoy.getDate();
  var diff = añoActual - añoNacimiento;
  if (mesActual < mesNacimiento) {
    diff--;
  } else if (mesActual == mesNacimiento && diaActual < diaNacimiento) {
    diff--;
  }
  if(diff < 45 && diff > 23){
    $(e.target).removeClass('is-invalid');
  }else{
    $(e.target).addClass('is-invalid');
  }
});
$("#email").on('input change', () => {
  $('#email').removeClass('is-invalid')
  var regexCorreo = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  if(!regexCorreo.test($('#email').val())){
    $('#email').addClass('is-invalid')
  }
})
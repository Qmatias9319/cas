let data = {};
let tiempo = 0;
$(document).ready(() => {
  var totalSteps = $(".steps li").length;

  $("#form_01").submit(async (e) => {
    e.preventDefault();
    $("#btn_form01").attr('disabled', 'disabled')
    console.log(new Date().getTime())  
    if($('#email').attr('disabled') == undefined){
      //enviar correo $("#email").val()
      const email = $("#email").val()
      const res = await $.ajax({
        url: '../api/tokens/create',
        type: 'POST',
        data: {email},
        dataType: 'json'
      });
      if(res.status === 'success'){
        await Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Correo enviado',
          showConfirmButton: false,
          timer: 1200
        })
        $(".steps li").eq($("#btn_form01").parents(".form-container").index() + 1).addClass("active");
        $("#btn_form01").parents('.form-container').removeClass('active').next().addClass('active flipInX')
      }else{
        console.warn(res)
      }
      tiempo = 120;
      tiempoEnviar();
    }
    $("#correo_destino").html($("#email").val())
    data = {...getDataForm('form_01')}
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


  $("#btn_codigo").click(async () => {
    // hacemos peticion con valor
    const token = $('#codigo_email').val()
    const email = $("#email").val()
    const res = await $.ajax({
      url: '../api/tokens/verify',
      type: 'POST',
      data: {token, email},
      dataType: 'json'
    });
    let data = false;
    if(res.status === 'success'){
      data = res.valid
    }
    if(data){
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Correo confirmado',
        showConfirmButton: false,
        timer: 1200
      })
      $(".steps li").eq($("#btn_codigo").parents(".form-container").index() + 1).addClass("active");
      $("#btn_codigo").parents('.form-container').removeClass('active').next().addClass('active flipInX')
    }else{
      $('#codigo_email').addClass('is-invalid');
    }
  });
  $('#codigo_email').on('focus', () => {
    $('#codigo_email').removeClass('is-invalid');
  });
  $('#btn_volver_enviar').click(() => {
    console.log('volver enviar')
    // hacer peticion
    tiempo = 240;
    $('#btn_volver_enviar').attr('disabled', true)
    tiempoEnviar();
  })


  $("#form_02").submit((e) => {
    e.preventDefault();
    console.log('valores formulario 2')
    data = {...data,...getDataForm('form_02')}
  })
  $('#form_02 :input, #form_02 select').on('input change', function() {
    var form = $("#form_02");
    var isFormValid = true;
    form.find(':input[required], #form_02 select[required]').each(function() {
      if ($(this).val() === '') {
        isFormValid = false;
        return false;
      }
    });
    if(form.find('.is-invalid').length > 0){
      isFormValid = false;
    }
    if (isFormValid) {
      $('#btn_form02').prop('disabled', false);
    } else {
      $('#btn_form02').prop('disabled', true);
    }
  });


  $(".submit").on("click", function(){
    return false; 
  });

  $(".steps li:nth-of-type(1)").addClass("active");
  $(".myContainer .form-container:nth-of-type(1)").addClass("active");

  $(".form-container").on("click", ".next", function() { 
    $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active"); 
    $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");   
  });

  $(".form-container").on("click", ".back", function() {  
    $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active"); 
    $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY"); 
  });
})

// Validaciones formulario -- 1 --
$("#celular").on('input', ()=>{
  if($.isNumeric($("#celular").val()) && ($("#celular").val().startsWith('6') || $("#celular").val().startsWith('7'))){
    if($("#celular").val().length == 8){
      $("#celular").removeClass('is-invalid');
    }else{
      $("#celular").addClass('is-invalid');
    }
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

// Validacio formulario --2--
$("#pass").on('input',()=>{
  var password = $("#pass").val();
  var passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).{8,}$/;
  if (!passwordRegex.test(password)) {
    $("#pass").addClass('is-invalid');
  }else{
    $("#pass").removeClass('is-invalid');
  }
})


function getDataForm(formId, disabled = true){
  const formData = {};
  $('#'+formId).find(':input, #'+formId+' select').each(function() {
    if($(this).attr('name') != undefined && $(this).attr('name') != ''){
      formData[$(this).attr('name')] = $(this).val();
      if(disabled){
        $(this).prop('disabled', disabled);
      }
    }
  })
  return formData;
}

function tiempoEnviar(){
  var intervalo = setInterval(() => {
    $("#volver_enviar").html(tiempo--)
    if(tiempo < 1){
      $("#btn_volver_enviar").attr('disabled',false)
      // terminar el intervalo
      clearInterval(intervalo)
    }
  }, 1000)
}

document.getElementById('fuerza').onchange = () => {
  var id = document.getElementById('fuerza').value;
  const select = document.getElementById('grado');
  const select2 = document.getElementById('armas');
  select.innerHTML = '';
  select2.innerHTML = '';
  
  const option = document.createElement('option');
  option.value = "";
  option.disabled = "true";
  option.selected = "true";
  option.textContent = "- Sel. grado -";

  const option2 = document.createElement('option');
  option2.value = "";
  option2.disabled = "true";
  option2.selected = "true";
  option2.textContent = "- Sel. arma -";
  select2.appendChild(option2);
  select.appendChild(option);
  cargarGrados(id);
  cargarArmas(id);
};

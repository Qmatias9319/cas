const restrict = $("#restrict");
$("#formSoli").submit(async (e)=>{
  e.preventDefault();
  const monto = $("#monto").val();
  const plazo = $("#plazo").val();
  const motivo = $("#motivo").val();
  const nroCta = $("#nroCta").val();
  const tipoPrestamo = $("#tipoPrestamo").val();
  console.log(monto, plazo, motivo, nroCta, tipoPrestamo)
  if($.isNumeric(nroCta)){
    const idg1 = $("#cig1").attr('data-id') != undefined ? $("#cig1").attr('data-id') : null;
    const idg2 = $("#cig2").attr('data-id') != undefined ? $("#cig2").attr('data-id') : null;
    const data = {monto, plazo, motivo, nroCta, tipoPrestamo, idg1, idg2}
    if(idg1 != "0" && idg2 != "0"){
      try {
        const res = await $.ajax({
          url: '../api/prestamo/create',
          method: 'POST',
          data: data,
          dataType: 'json',
        });
        if(res.status === 'success'){
          console.log(res)
          const swalWin = await Swal.fire({
            title: 'OK',
            icon: 'success',
            text: 'Se ha registrado la solicitud de prestamo',
            showConfirmButton: true,
            confirmButtonText: 'Imprimir formulario',
            showCancelButton: true,
            cancelButtonText: 'Cerrar'
          })
          if(swalWin.isConfirmed){
            window.open(`../formsPdf/form.php?nid=${res.id}`, '_blank')
          }
          window.location.href = './';
        }else{
          Swal.fire({
            icon: 'warning',
            title: 'Uups...',
            text: res.message
          })
        }
      } catch (error) {
        console.log(error)
      }
    }else{
      $("#cig1").addClass("is-invalid")
      $("#cig2").addClass("is-invalid")
      Swal.fire({
        icon: 'warning',
        title: 'Uups...',
        text: 'Verifique los números de carnet de los garantes'
      })
    }
  }else{
    Swal.fire({
      icon: 'error',
      title: 'Uups...',
      text: 'Ponga un número de cuenta válida (solo números)'
    })
  }
})

$('.cig').change(async (e) => {
  if($("#cig1").val() != $("#cig2").val()){
    if(Number($(e.target).val().length) >= 3){
      try{
        const res = await $.ajax({
          url: `../api/socio/socioCI/${$(e.target).val()}`,
          method: 'GET',
          dataType: 'json'
        })
        if(res.status === 'success'){
          $(e.target).addClass('is-valid')
          e.target.dataset.id = res.idUser;
        }else{
          $(e.target).addClass('is-invalid');
          e.target.dataset.id = 0;
        }
      }catch(error){
        console.log(error)
      }
    }else{
      $(e.target).addClass('is-invalid')
      e.target.dataset.id = 0;
    }
  }else{
    $("#cig1").val('')
    $("#cig2").val('')
    $("#cig1").addClass("is-invalid")
    $("#cig2").addClass("is-invalid")
    e.target.dataset.id = 0;
  }
});

$(".cig").on('focus', (e)=>{
  $(e.target).removeClass('is-invalid')
  $(e.target).removeClass('is-valid')
})

$("#monto").on('input', (e) => {
  const max = Number(restrict.data('max'));
  if(Number(e.target.value) > max){
    $("#monto").addClass('is-invalid')
  }else{
    $("#monto").removeClass('is-invalid')
  }
});

$("#plazo").on('input', (e) => {
  const mesMin = Number(restrict.data('mesmin'));
  const mesMax = Number(restrict.data('mesmax'));
  if(Number(e.target.value) < mesMin || Number(e.target.value) > mesMax){
    $("#plazo").addClass('is-invalid')
  }else{
    $("#plazo").removeClass('is-invalid');
  }
});

$('#formSoli :input').on('input change', function() {
  var form = $("#formSoli");
  var isFormValid = true;
  form.find(':input[required]').each(function() {
    if ($(this).val() === '') {
      isFormValid = false;
      return false;
    }
  });
  if(form.find('.is-invalid').length > 0){
    isFormValid = false;
  }
  if (isFormValid) {
    $('#btn_soli').prop('disabled', false);
  } else {
    $('#btn_soli').prop('disabled', true);
  }
});


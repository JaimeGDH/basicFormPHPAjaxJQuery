$(document).ready(function() {
  // Obtener las comunas según la región seleccionada
  $('#region').on('change', function() {
    var region = $(this).val();
    $.ajax({
      url: 'comunas.php',
      method: 'POST',
      data: { region: region },
      success: function(data) {
        $('#district').html(data);
      }
    });
  });
  
  function rutValidate() {
    const rutInput = document.getElementById('rut');
    const rutValue = rutInput.value;
    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutValue )) {
            alert("El rut no tiene formato correcto");
            return false;
        }
  
    let tmp 	= rutValue.split('-');
    let digv	= tmp[1]; 
    let rut 	= tmp[0];
    if ( digv == 'K' ) digv = 'k' ;
    
    if (dv(rut) != digv) {
        alert("Revisar dígito verificador");
        return false;
    }

    return true;
  }

  function dv(T) {
    var M=0,S=1;
    for(;T;T=Math.floor(T/10))
      S=(S+T%10*(9-M++%6))%11;
    return S?S-1:'k';
  }

  function aliasValidate() {
    const aliasInput = document.getElementById('alias');
    const aliasValue = aliasInput.value;
    const regex = /^[a-zA-Z0-9]+$/;

    if (aliasValue.length <= 5 || !regex.test(aliasValue)) {
      alert("El Alias debe tener más de 5 caracteres y contener solo letras y números.");
      return false;
    }

    return true;
  }

  function emailValidate() {
    const emailInput = document.getElementById('email');
    const emailValue = emailInput.value;
    const regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (!regex.test(emailValue)) {
      alert("Correo inválido");
      return false;
    }

    return true;
  }

  function contactValidate() {
    // Obtener los checkboxes del grupo
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Contador para contar la cantidad de opciones marcadas
    let optionsChecked = 0;

    // Recorrer los checkboxes y contar las opciones marcadas
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          optionsChecked++;
        }
    }

    // Validar la cantidad mínima de opciones marcadas
    if (optionsChecked < 2) {
      alert("Debe marcar 2 opciones mínimo sobre cómo se enteró de nosotros.");
      return false;
    }

    return true;
  }

  // Enviar el formulario mediante Ajax
  $('#form').on('submit', function(e) {
    e.preventDefault();
    
    if (aliasValidate() && rutValidate() && emailValidate() && contactValidate()) {
      $.ajax({
        url: 'procesar.php',
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          $('#mensaje').text(response);
          $('#form')[0].reset();
        }
      });
    }
  });
});

function check() {
  var kenteken = $('#reparatie_kenteken').val();
  if (kenteken) {
    $.ajax({
      type: 'post',
      url: 'api/fetch.php',
      data: {
        kenteken: kenteken
      },
      dataType: "json",
      success: function(response) {
        $('#kenteken_status').html(response);
        if (response == "bestaatniet") {
          return false;
        } else {
          $('#Reparatie_Modal').modal('show');
          $('#reparatie_modal_kenteken_nr').val(response.rs_car_carplate);
        }
      }
    });
  } else {
    $('#kenteken_status').html("");
    return false;
  }
  }

  $(document).on('click', '#btnja', function(event) {
    var kenteken = $('#reparatie_modal_kenteken_nr').val();
        event.preventDefault();
        $.ajax({
          url: "api/fetch.php",
          method: "POST",
          data: {
            kenteken: kenteken
          },
          dataType: "json",
          success: function(data) {
            $('#reparatie_merk').val(data.rs_car_carmake);
            $('#reparatie_model').val(data.rs_car_carmodel);
            $('#reparatie_bouwjaar').val(data.rs_car_caryear);
            $('#reparatie_chassis').val(data.rs_car_carchas);

            document.getElementById('reparatie_kenteken').parentNode.classList.remove('is-empty');
            document.getElementById('reparatie_merk').parentNode.parentNode.classList.remove('is-empty');
            document.getElementById('reparatie_model').parentNode.parentNode.classList.remove('is-empty');
            document.getElementById('reparatie_bouwjaar').parentNode.classList.remove('is-empty');
            document.getElementById('reparatie_chassis').parentNode.classList.remove('is-empty');

            $('#Reparatie_Modal').modal('hide');
          }
        });
});

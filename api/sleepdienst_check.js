function check() {
  var kenteken = $('#sleepdienst_kenteken').val();
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
          $('#Sleepdienst_Modal').modal('show');
          $('#sleepdienst_modal_kenteken_nr').val(response.rs_car_carplate);
        }
      }
    });
  } else {
    $('#kenteken_status').html("");
    return false;
  }
}

$(document).on('click', '#btnja', function(event) {
  var kenteken = document.getElementById('sleepdienst_modal_kenteken_nr').value;
  event.preventDefault();
  $.ajax({
    url: "api/fetch.php",
    method: "POST",
    data: {
      kenteken: kenteken
    },
    dataType: "json",
    success: function(data) {
      $('#sleepdienst_merk').val(data.rs_car_carmake);
      $('#sleepdienst_model').val(data.rs_car_carmodel);
      $('#sleepdienst_bouwjaar').val(data.rs_car_caryear);
      $('#sleepdienst_chassis').val(data.rs_car_carchas);

      document.getElementById('sleepdienst_kenteken').parentNode.classList.remove('is-empty');
      document.getElementById('sleepdienst_merk').parentNode.classList.remove('is-empty');
      document.getElementById('sleepdienst_model').parentNode.classList.remove('is-empty');
      document.getElementById('sleepdienst_bouwjaar').parentNode.classList.remove('is-empty');
      document.getElementById('sleepdienst_chassis').parentNode.classList.remove('is-empty');

      $('#Sleepdienst_Modal').modal('hide');
    }
  });
});

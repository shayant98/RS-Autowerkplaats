function check() {
  var kenteken = $('#service_kenteken').val();
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
          $('#Service_Modal').modal('show');
          $('#service_modal_kenteken_nr').val(response.rs_car_carplate);
        }
      }
    });
  } else {
    $('#kenteken_status').html("");
    return false;
  }
}

$(document).on('click', '#btnja', function(event) {
  var kenteken = $('#service_modal_kenteken_nr').val();
  event.preventDefault();
  $.ajax({
    url: "api/fetch.php",
    method: "POST",
    data: {
      kenteken: kenteken
    },
    dataType: "json",
    success: function(data) {
      $('#service_merk').val(data.rs_car_carmake);
      $('#service_model').val(data.rs_car_carmodel);
      $('#service_bouwjaar').val(data.rs_car_caryear);
      $('#service_chassis').val(data.rs_car_carchas);

      document.getElementById('service_kenteken').parentNode.classList.remove('is-empty');
      document.getElementById('service_merk').parentNode.classList.remove('is-empty');
      document.getElementById('service_model').parentNode.classList.remove('is-empty');
      document.getElementById('service_bouwjaar').parentNode.classList.remove('is-empty');
      document.getElementById('service_chassis').parentNode.classList.remove('is-empty');

      $('#Service_Modal').modal('hide');
    }
  });
});

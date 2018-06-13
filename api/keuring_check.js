function check() {
  var kenteken = $('#keuring_kenteken').val();

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
          $('#Keuring_Modal').modal('show');
          $('#keuring_modal_kenteken_nr').val(response.rs_car_carplate);
        }
      }
    });
  } else {
    $('#kenteken_status').html("");
    return false;
  }
}

$(document).on('click', '#btnja', function(event) {
  var kenteken = $('#keuring_modal_kenteken_nr').val();
  event.preventDefault();
  $.ajax({
    url: "api/fetch.php",
    method: "POST",
    data: {
      kenteken: kenteken
    },
    dataType: "json",
    success: function(data) {
      $('#keuring_merk').val(data.rs_car_carmake);
      $('#keuring_model').val(data.rs_car_carmodel);
      $('#keuring_bouwjaar').val(data.rs_car_caryear);
      $('#keuring_chassis').val(data.rs_car_carchas);

      document.getElementById('keuring_kenteken').parentNode.classList.remove('is-empty');
      document.getElementById('keuring_merk').parentNode.classList.remove('is-empty');
      document.getElementById('keuring_model').parentNode.classList.remove('is-empty');
      document.getElementById('keuring_bouwjaar').parentNode.classList.remove('is-empty');
      document.getElementById('keuring_chassis').parentNode.classList.remove('is-empty');

      $('#Keuring_Modal').modal('hide');
    }
  });
});

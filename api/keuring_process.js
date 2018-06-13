$(document).ready(function() {
  $('form').on('submit', function(event) {
    event.preventDefault();
    var date = $('#date').val();
    var monteur = $('#keuring_monteur').val();
    var naam = $('#keuring_naam').val();
    var familienaam = $('#keuring_familienaam').val();
    var kenteken = $('#keuring_kenteken').val();
    var merk = $('#keuring_merk').val();
    var model = $('#keuring_model').val();
    var bouwjaar = $('#keuring_bouwjaar').val();
    var chassis = $('#keuring_chassis').val();
    var keuring_info = $('#keuring_info').val();
    var prijs = $('#keuring_prijs').val();


    // error handling
    if ($('#date').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_monteur').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#keuring_naam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#keuring_familienaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_kenteken').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_merk').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_model').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_bouwjaar').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_chassis').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#keuring_prijs').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    }else if ($('#keuring_info').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else {  //if all fields have data
      swal({
  title: "Keuring Status bijwerken",
  text: "U zal de keurinfstatus van auto "+kenteken+" bijwerken!",
  type: "info",
  showCancelButton: true,
  confirmButtonText: "Ja, bijwerken!",
  closeOnConfirm: false
},
function(){
  swal("Success!", "Keuring Bijgewerkt.", "success");
  $.ajax({
    url: "api/keuring_process.php",
    method: "POST",
    data: {
      date: date,
      monteur: monteur,
      naam: naam,
      familienaam: familienaam,
      kenteken: kenteken,
      merk: merk,
      model: model,
      bouwjaar: bouwjaar,
      chassis: chassis,
      prijs: prijs,
      keuring: keuring_info
    },
    success: function(data) {
  $('#keuring_monteur').val("");
  $('#keuring_naam').val("");
  $('#keuring_familienaam').val("");
  $('#keuring_kenteken').val("");
  $('#keuring_merk').val("");
  $('#keuring_model').val('');
  $('#keuring_bouwjaar').val('');
  $('#keuring_chassis').val('');
  $('#keuring_info').val("");
    $('#keuring_prijs').val('');

    }
});
});

};
});
});

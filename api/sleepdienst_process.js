$(document).ready(function() {
$('form').on('submit', function(event) {
    event.preventDefault();
    var date = $('#date').val();
    var monteur = $('#sleepdienst_monteur').val();
    var naam = $('#sleepdienst_naam').val();
    var familienaam = $('#sleepdienst_familienaam').val();
    var kenteken = $('#sleepdienst_kenteken').val();
    var merk = $('#sleepdienst_merk').val();
    var model = $('#sleepdienst_model').val();
    var bouwjaar = $('#sleepdienst_bouwjaar').val();
    var chassis = $('#sleepdienst_chassis').val();
    var sleepdienst_info = $('#sleepdienst_info').val();
    var prijs = $('#sleepdienst_prijs').val();


    // error handling
    if ($('#date').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_monteur').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#sleepdienst_voornaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#sleepdienst_kenteken').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_merk').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_model').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_bouwjaar').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_chassis').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_prijs').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#sleepdienst_info').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else { //if all fields have data
      swal({
          title: "Auto gesleept?",
          text: "Heeft u "+kenteken+" van de"+sleepdienst_info+" ?",
          type: "info",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function() {
          swal("success!", "Gesleepte wagen is geregistreerd.", "success");
          $.ajax({
              url: "api/sleepdienst_process.php",
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
                sleepdienst: sleepdienst_info
              },
              success: function() {

                  $('#sleepdienst_naam').val('');
                  $('#sleepdienst_familienaam').val('');
                  $('#sleepdienst_kenteken').val('');
                  $('#sleepdienst_merk').val('');
                  $('#sleepdienst_model').val('');
                  $('#sleepdienst_bouwjaar').val('');
                  $('#sleepdienst_chassis').val('');
                  $('#sleepdienst_info').val('');
                  $('#sleepdienst_prijs').val('');
              }


          });
    });

};
});
});

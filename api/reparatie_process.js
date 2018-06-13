$(document).ready(function() {
  $('form').on('submit', function(event) {
    event.preventDefault();
    var date = $('#date').val();
    var monteur = $('#reparatie_monteur').val();
    var naam = $('#reparatie_voornaam').val();
    var familienaam = $('#reparatie_familienaam').val();
    var kenteken = $('#reparatie_kenteken').val();
    var merk = $('#reparatie_merk').val();
    var model = $('#reparatie_model').val();
    var bouwjaar = $('#reparatie_bouwjaar').val();
    var chassis = $('#reparatie_chassis').val();
    var reparatie_info = $('#reparatie_info').val();
    var prijs = $('#reparatie_prijs').val();


    // error handling
    if ($('#date').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_monteur').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#reparatie_voornaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#reparatie_familienaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_kenteken').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_merk').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_model').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_bouwjaar').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_chassis').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_prijs').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#reparatie_info').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else {
      swal({
          title: "Reparatie toevoegen?",
          text: "U zal de werkzaamheden van auto "+kenteken+" toevoegen!",
          type: "info",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function() {
          swal("Success!", "Werkzaamheden geregistreerd.", "success");
          $.ajax({
            url: "api/reparatie_process.php",
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
              reparatie: reparatie_info
            },
            success: function(data) {
              $('#date').val('');
              $('#reparatie_monteur').val('');
              $('#reparatie_voornaam').val('');
              $('#reparatie_familienaam').val('');
              $('#reparatie_kenteken').val('');
              $('#reparatie_merk').val('');
              $('#reparatie_model').val('');
              $('#reparatie_bouwjaar').val('');
              $('#reparatie_chassis').val('');
              $('#reparatie_info').val('');
              $('#reparatie_prijs').val('');

            }
          });

        });

    };
  });


});

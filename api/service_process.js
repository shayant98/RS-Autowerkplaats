$(document).ready(function() {
  $('form').on('submit', function(event) {
    event.preventDefault();
    var date = $('#date').val();
    var monteur = $('#service_monteur').val();
    var naam = $('#service_voornaam').val();
    var familienaam = $('#service_familienaam').val();
    var kenteken = $('#service_kenteken').val();
    var merk = $('#service_merk').val();
    var model = $('#service_model').val();
    var bouwjaar = $('#service_bouwjaar').val();
    var chassis = $('#service_chassis').val();
    var prijs = $('#service_prijs').val();
    var checkbox_value = new Array();
    $("input[name='service[]']:checked").each(function(i) {
    checkbox_value.push($(this).val());
  });


    // error handling
    if ($('#date').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_monteur').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#service_voornaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )

    } else if ($('#service_familienaam').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_kenteken').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_merk').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_model').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_bouwjaar').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_chassis').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_prijs').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else if ($('#service_info').val() == "") {
      swal(
        'Oops...',
        'Er zijn nog openstaande velden!',
        'error'
      )
    } else {
      swal({
          title: "Service toevoegen?",
          text: "U zal de service werkzaamheden van auto "+kenteken+" toevoegen !",
          type: "info",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function() {
          swal("Success!", "Werkzaamheden geregistreerd.", "success");
          $.ajax({
            url: "api/service_process.php",
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
              service: checkbox_value
            },
            success: function(data) {
              $('#service_voornaam').val('');
              $('#service_familienaam').val('');
              $('#service_kenteken').val('');
              $('#service_merk').val('');
              $('#service_model').val('');
              $('#service_bouwjaar').val('');
              $('#service_chassis').val('');
              $('#service_info').val('');
              $('#service_prijs').val('');
            }
          });

        });

    };
  });
});

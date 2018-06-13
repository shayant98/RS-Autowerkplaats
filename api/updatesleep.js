$(document).ready(function() {
  var table = $('#sleeptable').DataTable( {
      "paging":   true,
      "bLengthChange": false,
      "ordering": true,
      "info":     true,
      "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
  }
  });
  $('.btn-update').on('click', function(event) {
    // event.preventDefault();
    var data = table.row($(this).parents('tr')).data();
    var id = data[0];
    var kenteken = data[1];
    swal({
  title: "Sleep Status veranderen?",
  text: "U zal de sleep status van "+kenteken+" veranderen!",
  type: "info",
  showCancelButton: true,
  confirmButtonText: "Verwijderen",
  closeOnConfirm: false
},function(){
  $.ajax({
      url: 'api/updatesleep.php',
      type: 'POST',
      data: {
        id : id,
        update: '0'
      }
    })
      swal("Bijgewerkt!", "De Sleepstatus van "+kenteken+" is Bijgewerkt", "success");


      });
  });
    });

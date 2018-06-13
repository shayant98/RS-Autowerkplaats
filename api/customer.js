$(document).ready(function() {
  var table = $('#custtable').DataTable({
    "paging": true,
    "bLengthChange": false,
    "ordering": true,
    "info": true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
    }
  });

  $('.table-delete').click(function(event) {
    var data = table.row($(this).parents('tr')).data();
    var id = data[0];
    swal({
      title: "Bent u Zeker?",
      text: "U zal de gegevns nooit terug krijegn",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Verwijderen",
      closeOnConfirm: false
    }, function(isConfirm) {
      if (isConfirm) {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
          url: 'api/deletecust.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function() {
            setTimeout(function() {
              $('.content').load('api/custtable.php');
            }, 10);
          }
        });

      } else {
        swal("Canceld!", "Your imaginary file has been deleted.", "success");
      }
    });

  });
  // Klant info in Modal
  $('.table-update').click(function(event) {
    var data = table.row($(this).parents('tr')).data();
    var id = data[0];
    $.ajax({
      url: 'api/fetch.php',
      type: 'POST',
      dataType: "json",
      data: {
        id: id
      },
      success: function(data) {
        $('#name').val(data.rs_cust_name);
        $('#surname').val(data.rs_cust_surname);
        $('#customer_id').val(data.id);
        $('#update').val("Update");
        $('#add_data_Modal').modal('show');
      }
    });


  });
  //bijwerken van Klant info
  $('#insert_form').submit(function(event) {
    event.preventDefault();
    var name = $('#name').val();
    var surname = $('#surname').val();
    var id = $('#customer_id').val();
    if ($('#name').val() == "" || $('#surname').val() == "") {
      swal({
        title: "Oops!",
        type:"error",
        text: "Er zijn nog openstaande velden!",
        timer: 2000,
      });
    } else {
      $.ajax({
          url: 'api/updatecust.php',
          type: 'POST',
          data: {
            id: id,
            surname: surname,
            name: name
          },
          beforeSend: function() {
            $('#update').val("Update");
          },
          success: function(data) {
            $('#insert_form')[0].reset();
            setTimeout(function() {
              $('.content').load('api/custtable.php');
            }, 10);
            $('#add_data_Modal').modal('hide');
            $('.table').html(data);
            $('[data-dismiss="modal"]').click();
          }
        })
    }
  });
});

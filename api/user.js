$(document).ready(function() {
  var table = $('#usertable').DataTable({
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
          url: 'api/deleteuser.php',
          type: 'POST',
          data: {
            id: id
          },
          success: function() {
            console.log('hey');
            setTimeout(function() {
              $('.content').load('api/usertable.php');
            }, 10);
          }
        });

      } else {
        swal("Canceled!", "Your imaginary file has been deleted.", "success");
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
        employee_id: id
      },
      success: function(data) {
        $('#name').val(data.rs_name);
        $('#surname').val(data.rs_surname);
        $('#employee_id').val(data.id);
        $('#password').val(data.rs_password);
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
    var password = $('#password').val();
    var id = $('#employee_id').val();
    var level = $('#level').val();
    if ($('#name').val() == "" || $('#surname').val() == "" || $('#password').val() == "") {
      swal({
        title: "Oops!",
        type:"error",
        text: "Er zijn nog openstaande velden!",
        timer: 2000,
      });
    } else {
      $.ajax({
          url: 'api/updateuser.php',
          type: 'POST',
          data: {
            employee_id: id,
            surname: surname,
            name: name,
            password: password,
            level: level
          },
          beforeSend: function() {
            $('#update').val("Update");
          },
          success: function(data) {
            setTimeout(function() {
              $('.content').load('api/usertable.php');
            }, 10);
            $('#insert_form')[0].reset();
            $('#add_data_Modal').modal('hide');
            $('.table').html(data);
            $('[data-dismiss="modal"]').click();
          }
        })
    }
  });
});

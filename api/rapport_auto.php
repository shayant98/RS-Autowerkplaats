<?php
  include 'dbh_link.php';

  if (isset($_POST['auto_update'])) {

    $kenteken = mysqli_real_escape_string($conn,$_POST['kenteken']) ;
    if (isset($_POST['auto_datum'])) { //voor autodatum form

      $date = mysqli_real_escape_string($conn,$_POST['auto_datum']);
      list($date1, $date2) = explode('-', $date);

      $stmt = $conn->prepare('SELECT id,rs_service,rs_carplate,rs_serviceinfo,rs_date FROM rs_service WHERE rs_carplate = ? AND rs_date BETWEEN ? AND ?'); //Prepared Statement For Extra Security
      $stmt->bind_param('sss',$kenteken,$date1,$date2);

      $kenteken = $kenteken;
      $date1 = $date1;
      $date2 = $date2;
      $stmt->execute();
      $result = $stmt->get_result();
      $rows= $result->num_rows;
    }else {
      $stmt = $conn->prepare('SELECT id,rs_service,rs_carplate,rs_serviceinfo,rs_date FROM rs_service WHERE rs_carplate = ?'); //Prepared Statement For Extra Security
      $stmt->bind_param('s',$kenteken);

      $kenteken = $kenteken;
      $stmt->execute();
      $result = $stmt->get_result();
      $rows= $result->num_rows;
    }


  }
   ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>



		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">
  </head>

  <body>
    <div class="container-fluid">

      <a href="../rapportage.php" class="btn btn-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Terug</a>
    <div class="col-md-6 col-md-offset-3">
      <div class="card">
        <div class="card-header" data-background-color="blue">

        </div>
        <div class="card-content table-responsive">
          <div class="toolbar">

          </div>
          <table id="resulttable" class="table">
            <thead class="text-info">
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">type</th>
                <th class="text-center">Kenteken</th>
                <th class="text-center">Info</th>
                <th class="text-center">datum</th>
              </tr>
            </thead>
            <tbody>
              <?php

                   if ($rows > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                       ?>
                <tr>
                  <td class="text-center">
                    <?php echo htmlspecialchars($row['id']); ?>
                  </td>
                  <td class="text-center">
                    <?php echo htmlspecialchars($row['rs_service']) ; ?>
                  </td>
                  <td class="text-center">
                    <?php echo htmlspecialchars($row['rs_carplate']) ; ?>
                  </td>
                  <td class="text-center">
                    <?php echo htmlspecialchars($row['rs_serviceinfo']) ; ?>
                  </td>
                  <td class="text-center">
                    <?php echo htmlspecialchars($row['rs_date']) ; ?>
                  </td>

                </tr>

                <?php
                            }
                          }

                      ?>
            </tbody>
            <tfoot>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">type</th>
                <th class="text-center">Kenteken</th>
                <th class="text-center">Info</th>
                <th class="text-center">datum</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    </div>


    </div>
  </body>
  <script src="../assets/js/jquery-3.1.0.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/material.min.js" type="text/javascript"></script>








  <script src="../assets/js/material-dashboard.js"></script>
  <!-- datatables plugin -->
  <script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="  //cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script src=" //cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>



  <script type="text/javascript">
  var table = $('#resulttable').DataTable({
    dom: 'Bfrtip',
    buttons: [
         {
             extend: 'excelHtml5',
             title: 'Data export',
             className: 'btn btn-m btn-success glyphicon glyphicon-list-alt'
         },
         {
             extend: 'print',
              className: 'btn btn-m btn-info glyphicon glyphicon-print align-right'
         }
       ],
    "bLengthChange": false,
    "ordering": true,
    "info": true,
    "searching": false,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
    },
    initComplete: function () {
        this.api().columns([1,2]).every( function () {
            var column = this;
            var select = $("<select><option></option></select>")
                .appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                } );

            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
        } );
    }
  });
  </script>

  </html>

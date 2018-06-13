<?php
  include 'dbh_link.php';

if (isset($_POST['monteur_update'])) {
  $monteur = mysqli_real_escape_string($conn, $_POST['monteur']);
  $date = mysqli_real_escape_string($conn, $_POST['monteur_datum']);
  list($date1, $date2) = explode('-', $date);

  $stmt = $conn->prepare('SELECT * FROM rs_service WHERE rs_userid = ? AND rs_date BETWEEN ? AND ?'); //Prepared Statement For Extra Security
  $stmt->bind_param('sss',$monteur,$date1,$date2);

  $monteur = $monteur;
  $date1 =$date1;
  $date2 =$date2;
  $stmt->execute();
  $result = $stmt->get_result();
  $rows= $result->num_rows;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/8377c3491f.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css">

  </head>
  <body>
    <div class="container-fluid">

    <a href="../rapportage.php" class="btn btn-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Terug</a>
    <div class="col-md-12">
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
                  <td class="text-center"><?php echo htmlspecialchars($row['id']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($row['rs_service']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($row['rs_carplate']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($row['rs_serviceinfo']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($row['rs_date']); ?></td>

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








  <script src="../assets/js/material-dashboard.js"></script>
  <!-- datatables plugin -->
    <script src="  https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="  https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
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
    "paging": true,
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

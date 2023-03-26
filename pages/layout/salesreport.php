<?php 
include 'config.php';
session_start();
if (isset($_SESSION['email'], $_SESSION['password'])) {
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FINANCIAL</title>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

  <style> 
    #bbutton {
    background-color: lightgray;
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    background: red !important;
  }</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'topNavar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sideNavbar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
     <!-- First Table -->
    <!-- HAHAHHAHAHAHA -->

      <!--Second Table-->
      <section class="content mb-3">
        <div class="container-fluid">
            <div class="shadow w-100 pt-0">
              <h3 class="border-bottom p-3 mb-0 bg-success">SALES REPORT</h3>
              <div class="p-3 table-responsive">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead class="bg-dark">
                        <tr>
                            <th>Date&Time</th>
                            <th>Name</th>
                            <th>Fund Source</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                  $query = "SELECT *, DATE_FORMAT(date_and_time, '%M %d, %Y')as formatted_date, NOW() AS current_time_stamp FROM sales_report";
                  $result = mysqli_query($con, $query);
                  if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $formatted_time = date("H:i", strtotime($row["current_time_stamp"]));
                  ?>
                        <tr>
                            <td><?php echo $row['formatted_date']," - ", $formatted_time;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['fund_source'];?></td>
                            <td>₱ <?php echo $row['total_amount'];?></td>
                            <?php if($row['status'] == "Active"){?>
                            <td class="text-success">Active</td>
                            <?php } elseif($row['status'] == "Inactive"){?>
                                <td class="text-danger">Inactive</td>
                            <?php }?>

                           

                           
                        </tr>
                       <?php }}?>

                    </tbody>
                </table>
              </div>
            </div>
        </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="../../dist/js/demo.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
    $(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script>
     $(document).ready(function() {
        $('.approve_btn_ajax').click(function(e) {
          e.preventDefault();

          var closeid = $(this).closest("tr").find('.approves').val();

          swal({
              title: "Are you sure you approve this?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                    "approve_btn_set": 1,
                    "approve_id": closeid,
                  },
                  success: function(response) {

                    swal("Approved Successfully!", {
                      icon: "success",
                    }).then((result) => {
                      location.reload();
                    });

                  }
                });

              }
            });

        });
      });
</script>

<script>
     $(document).ready(function() {
        $('.denied_btn_ajax').click(function(e) {
          e.preventDefault();

          var closeid = $(this).closest("tr").find('.denied').val();

          swal({
              title: "Are you sure you denied this?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  type: "POST",
                  url: "action.php",
                  data: {
                    "denied_btn_set": 1,
                    "denied_id": closeid,
                  },
                  success: function(response) {

                    swal("Denined Successfully!", {
                      icon: "success",
                    }).then((result) => {
                      location.reload();
                    });

                  }
                });

              }
            });

        });
      });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

</body>
</html>
<?php
} else {
  header("location: index.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>
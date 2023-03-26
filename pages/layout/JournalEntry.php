<?php
session_start();
require 'config.php';

if (isset($_SESSION['email'], $_SESSION['password'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Journal Entry | Financial</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./Calendar.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

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
      <section class="content mb-3">
        <div class="container-fluid">
          <div class="shadow w-100 pt-0">
            <h3 class="border-bottom p-3 mb-0 bg-success">Journal Entry</h3>
            <div class="p-3">
          
              <div class="d-block d-md-flex align-items-center my-0 mb-3 mb-sm-0 my-sm-3 ">
                
                <!-- Calendar -->
               
              </div>
              <div class="table-responsive-md">
                <table class="table table-bordered text-center mb-0 w-100" id="example">

                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Account Name</th>
                      <th scope="col">Journals</th>
                      <th scope="col">Debit</th>
                      <th scope="col">Credit</th>
                    </tr>
                  </thead>
                  <?php
                  $query = "SELECT *, DATE_FORMAT(date, '%M %d, %Y')as formatted_date FROM journalentry_db";
                  $result = mysqli_query($con, $query);
                  if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <tbody id="transactions-tbody">
                        <tr>
                          <td><?php echo $row['formatted_date']; ?></td>
                          <td><?php echo $row['account_name']; ?></td>
                          <td><?php echo $row['journals']; ?></td>
                          <td><?php echo $row['debit']; ?></td>
                          <td><?php echo $row['credit']; ?></td>
                        </tr>
                      </tbody>
                  <?php }
                  } ?>
                </table>
              </div>
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
  <?php include "footer.php"; ?>
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
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
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
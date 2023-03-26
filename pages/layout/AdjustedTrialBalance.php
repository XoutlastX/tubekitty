<?php
session_start();
require "config.php";

if (isset($_POST['addBtn'])) {
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $ref_code = mysqli_real_escape_string($con, $_POST['ref-code']);
  $amount = mysqli_real_escape_string($con, $_POST['amount']);

  if (!empty($description) && !empty($ref_code) && !empty($amount)) {
    $query = "INSERT INTO adjustedtrialbalance_db(description, ref_code, amount) VALUES('$description','$ref_code','$ref_code')";
    $result = mysqli_query($con, $query);

    if ($result) {
      $_SESSION['message'] = "Inserted Successfully";
      header("location: AdjustedTrialBalance.php");
    } else {
      echo "There is an error in adding a data!!!";
      die();
    }
  }
}

if (isset($_SESSION['email'], $_SESSION['password'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Sidebar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./Calendar.css">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
        <?php
        if (isset($_SESSION['message'])) { ?>
          <script>
            Swal.fire({
              icon: 'success',
              title: "<?php echo $_SESSION['message']; ?>",
            })
          </script>
        <?php unset($_SESSION['message']);
        } ?>
        <div class="container-fluid">
          <div class="shadow w-100 pt-0">
            <h3 class="border-bottom p-3 mb-0 bg-success">Adjusted Trial Balance</h3>
            <div class="p-3">
              <div class="d-block d-md-flex align-items-center my-0 mb-3 mb-sm-0 my-sm-3 ">
              <button class="btn btn-primary mr-3 my-2" data-toggle="modal" data-target="#add">Add+</button>
                <!-- Calendar -->
                <div id="date-filter" class="d-block d-md-flex w-100 justify-content-end">
                  <div class="d-flex align-items-center mr-0 mr-sm-3">
                    <label for="start-date" class="mb-0" style="font-size:15px">Start Date:</label>
                    <input type="date" id="start-date" type="text" class="form-control" />
                  </div>
                  <div class="d-flex align-items-center mr-0 mr-sm-3">
                    <label for="end-date" class="mb-0" style="font-size:15px">End Date:</label>
                    <input type="date" id="end-date" type="text" class="form-control" />
                  </div>
                  <div class="d-sm-block d-flex justify-content-end">
                    <button id="filter-button" class="btn btn-primary px-5 px-md-3 my-2">Filter</button>
                  </div>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                        <div class="col-auto">
                          <label for="description">Description</label>
                          <input type="text" name="description" id="description" placeholder="Enter Description" class="form-control" required>
                          <div class="invalid-feedback">
                            This field is required.
                          </div>
                        </div>

                        <div class="col-auto">
                          <label for="ref-code">Reference Code</label>
                          <input type="text" name="ref-code" id="ref-code" placeholder="Enter Reference Code" class="form-control" required>
                          <div class="invalid-feedback">
                            This field is required.
                          </div>
                        </div>

                        <div class="col-auto">
                          <label for="amount">Amount</label>
                          <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control" required>
                          <div class="invalid-feedback">
                            This field is required.
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="addBtn" id="addBtn">Add</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


              
              <div class="table-responsive-md">
                <table class="table table-bordered text-center mb-0 w-100" id="transactions-table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Date</th>
                      <th scope="col">Description</th>
                      <th scope="col">Ref. Code.</th>
                      <th scope="col">Amount</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <?php
                  $query = "SELECT *, DATE_FORMAT(date, '%M %d, %Y')as formatted_date FROM adjustedtrialbalance_db";
                  $result = mysqli_query($con, $query);
                  if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <tbody>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['formatted_date']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['ref_code']; ?></td>
                          <td><?php echo $row['amount']; ?></td>
                          <td>
                            <button class="btn btn-success editBtn">Edit</button>
                          </td>
                          <td>
                            <input type="hidden" name="deleteBtn" class="deleteBtn" id="deleteBtn" value="<?php echo $row['id']; ?>">
                            <a href="javascript:void(0)" class="deleteBtn btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      </tbody>
                  <?php }
                  } ?>

                  <!-- Update Btn ######################################################################################################## -->
                  <div class="modal fade" id="editBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                          <?php
                          $query = "SELECT * FROM adjustedtrialbalance_db";
                          $result = mysqli_query($con, $query);
                          if (mysqli_num_rows($result)) {
                            $row = mysqli_fetch_assoc($result);
                          ?>
                            <form action="action.php" method="post" class="form-group needs-validation" novalidate>
                              <input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>">
                              <div class="col-auto">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description" placeholder="Enter Description" class="form-control" required>
                                <div class="invalid-feedback">
                                  This field is required.
                                </div>
                              </div>

                              <div class="col-auto">
                                <label for="ref-code">Reference Code</label>
                                <input type="text" name="ref-code" id="ref-code" placeholder="Enter Reference Code" class="form-control" required>
                                <div class="invalid-feedback">
                                  This field is required.
                                </div>
                              </div>

                              <div class="col-auto">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Enter Amount" class="form-control" required>
                                <div class="invalid-feedback">
                                  This field is required.
                                </div>
                              </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="edit_btn" class="btn btn-primary" style="box-shadow: none;">Update</button>
                        </div>
                        </form>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                </table>

                <div class="btn-toolbar justify-content-between mt-2" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group" role="group" aria-label="First group">
                    <p>Showing 1 to 10 of 12 entries</p>
                  </div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- // Delete Exams -->
  <script>
    $(document).ready(function() {
      $('.deleteBtn').click(function(e) {
        e.preventDefault();

        var closeid = $(this).closest("tr").find('.deleteBtn').val();

        swal({
            title: "Are you sure you want to delete this?",
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
                  "delete_btn_set": 1,
                  "delete_id": closeid,
                },
                success: function(response) {

                  swal("Successfully Deleted!", {
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
      $('.editBtn').on('click', function() {
        $('#editBtn').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#description').val(data[2]);
        $('#ref-id').val(data[3]);
        $('#amount').val(data[4]);
      });
    });
  </script>


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
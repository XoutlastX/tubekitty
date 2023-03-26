<?php
session_start();
include "config.php";

if (isset($_POST['addBtn'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $account_no = mysqli_real_escape_string($con, $_POST['accountNo']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $particular = mysqli_real_escape_string($con, $_POST['particular']);
  $ref = mysqli_real_escape_string($con, $_POST['ref']);
  $dateofreceived = mysqli_real_escape_string($con, $_POST['dateReceived']);
  $modeofpayment = mysqli_real_escape_string($con, $_POST['modeOfPayment']);

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTempName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileError = $_FILES["file"]["error"];
  $fileType = $_FILES["file"]["type"];
  $folder = "image/" . $fileName;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folder;
        move_uploaded_file($fileTempName, $fileDestination);

        if (!empty($file)) {
          $query = "INSERT INTO collection_db(name, image, account_number, description, particular, ref_number, date_received, mode_of_payment) 
          VALUES('$name','$fileName','$account_no','$description','$particular','$ref','$dateofreceived','$modeofpayment')";

          $result = mysqli_query($con, $query);

          header("location: collectionAddCollection.php");
        } else {
          $_SESSION['errorMessage'] = "Failed to Add Collection";
        }
      } else {
        $_SESSION['errorMessage'] = "You image is too big!";
      }
    } else {
      $_SESSION['errorMessage'] = " There was an error uplading your file!";
    }
  } else {
    $_SESSION['errorMessage'] = "You cannot upload this type of Image";
  }
}




if (isset($_SESSION['email'], $_SESSION['password'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Collection | Financial</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

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


      <!--Second Table-->
      <section class="content mb-3">
        <div class="container-fluid">
          <div class="shadow w-100 pt-0">
            <h3 class="border-bottom p-3 mb-0 bg-success">Collection List</h3>
            <div class="p-3">
              <div class="btn-toolbar justify-content-between mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Add Collection +
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Collection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">

                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="file" id="file" aria-describedby="imageHelp" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="accountNo">Account No.</label>
                            <input type="number" class="form-control" name="accountNo" id="accountNo" aria-describedby="accountNoHelp" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="descriptionHelp" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="particular">Particular</label>
                            <input type="text" class="form-control" name="particular" id="particular" aria-describedby="particularHelp" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="ref">Ref#</label>
                            <input type="number" class="form-control" name="ref" id="ref" aria-describedby="refHelp" required>
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="dateReceived">Date Received</label>
                            <input type="date" class="form-control" name="dateReceived" id="dateReceived" aria-describedby="dateReceived" required />
                            <div class="invalid-feedback">
                              This field is required.
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="dateReceived">Mode of Payment</label>
                            <select class="form-select" name="modeOfPayment" id="modeOfPayment" required>
                              <option value="" selected disabled>Select Mode of Payment</option>
                              <option value="Gcash">Gcash</option>
                              <option value="Paymaya">Paymaya</option>
                            </select>
                          
                          <div class="invalid-feedback">
                            This field is required.
                          </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addBtn" class="btn btn-primary addCollection" data-toggle="modal" data-target="#staticBackdrop">
                          Add Collection +
                        </button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!--  -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Search</div>
                  </div>
                  <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered text-center mb-0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Image Preview</th>
                      <th scope="col">Name</th>
                      <th scope="col">Account No.</th>
                      <th scope="col">Description</th>
                      <th scope="col">Particular</th>
                      <th scope="col">Ref#</th>
                      <th scope="col">Date Received</th>
                      <th scope="col">Mode of Payment</th>
                      <th colspan="2">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT *, DATE_FORMAT(date_received, '%M %d, %Y')as formatted_date FROM collection_db";
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result)) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row['image'];
                    ?>
                        <tr>
                          <td> <img alt="Profile Picture" class="img-circle" width="100%" height="100vh" <?php echo '<img src="image/' . $image . '" />'; ?> <br><br></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['account_number']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['particular']; ?></td>
                          <td><?php echo $row['ref_number']; ?></td>
                          <td><?php echo $row['formatted_date']; ?></td>
                          <td><?php echo $row['mode_of_payment']; ?></td>
                          <th scope="col">
                            <div class="d-block">
                              <form action="updateCollection.php" method="post">
                                <input type="hidden" name="updates" id="updates" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-secondary py-1 " id="update" style="width:70px">Update</button>
                              </form>
                            </div>
                          </th>
                          <th scope="col">
                            <div class="d-block">
                              <input type="hidden" name="deleteBtn" class="deleteBtn" id="deleteBtn" value="<?php echo $row['id']; ?>">
                              <a href="javascript:void(0)" class="deleteBtn btn btn-danger py-1" style="width:70px">Delete</a>
                            </div>
                          </th>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
              <div class="btn-toolbar justify-content-between mt-3" role="toolbar" aria-label="Toolbar with button groups">
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
                  "delete_btn_set2": 1,
                  "delete_id2": closeid,
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
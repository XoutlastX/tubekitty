<?php
session_start();
include "config.php";

if (isset($_POST['updateBtn'])) {
    $id = $_POST['id'];
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
                $query = "UPDATE collection_db SET name = '$name', image = '$fileName', account_number = '$account_no', 
                description = '$description', particular = '$particular', ref_number = '$ref', date_received = '$dateofreceived', mode_of_payment = '$modeofpayment' WHERE id = '$id'";

                    $result = mysqli_query($con, $query);

                    header("location: collectionAddCollection.php");
                } else {
                    $_SESSION['errorMessage'] = "Failed to Add Collection";
                    header("location: footer.php");
                }
            } else {
                $_SESSION['errorMessage'] = "You image is too big!";
                header("location: footer.php");
            }
        } else {
            $_SESSION['errorMessage'] = " There was an error uplading your file!";
            header("location: footer.php");
        }
    } else {
        $_SESSION['errorMessage'] = "You cannot upload this type of Image";
        header("location: footer.php");
    }
}



if (isset($_SESSION['email'], $_SESSION['password'])) {


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Collection | Financial</title>

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
                        <h3 class="border-bottom p-3 mb-0 bg-success">Update Collection List</h3>
                        <div class="p-3">
                        <?php
                        if (isset($_POST['updates'])) {
                            $id = $_POST['updates'];
                            $query = "SELECT * FROM collection_db WHERE id = '$id'";
                            $result = mysqli_query($con, $query);

                            foreach ($result as $row) {
                        ?>
                          
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="file" id="file" aria-describedby="imageHelp" required />
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'];?>" aria-describedby="nameHelp" required />
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="accountNo">Account No.</label>
                                    <input type="number" class="form-control" name="accountNo" id="accountNo" value="<?php echo $row['account_number'];?>" aria-describedby="accountNoHelp" required />
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" value="<?php echo $row['description'];?>" aria-describedby="descriptionHelp" required />
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="particular">Particular</label>
                                    <input type="text" class="form-control" name="particular" id="particular" value="<?php echo $row['particular'];?>" aria-describedby="particularHelp" required />
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ref">Ref#</label>
                                    <input type="number" class="form-control" name="ref" id="ref" value="<?php echo $row['ref_number'];?>" aria-describedby="refHelp" required>
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" id="dateReceived" value="<?php echo $row['date_received'];?>" aria-describedby="dateReceived" required />
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
                                <br><br>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary" name="updateBtn" id="updateBtn">Update Collection</button>
                                    <button type="button" class="btn btn-dark">Back</button>
                                </div>
                            </form>
                            <?php }}?>
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
<?php
include 'config.php';
if (isset($_POST['addBtn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $invoice_date = mysqli_real_escape_string($con, $_POST['invoice-date']);
    $due_date = mysqli_real_escape_string($con, $_POST['due-date']);
    $total_amount = mysqli_real_escape_string($con, $_POST['total-amount']);
    $amount_paid = mysqli_real_escape_string($con, $_POST['amount-paid']);
    $balance_due = $total_amount - $amount_paid;

    if (!empty($name) && !empty($invoice_date) && !empty($due_date) && !empty($total_amount) && !empty($amount_paid)) {
        $query = "INSERT INTO account_receivable(customer_name, invoice_date, due_date, total_amount_due, amount_paid, balance_due) 
        VALUES('$name ', '$invoice_date', '$due_date', '$total_amount', '$amount_paid', '$balance_due')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "Inserted Successfully";
            header("location: accountreceivable.php");
        } else {
            echo "Not Inserted Successfully";
            exit();
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
            /* background: red !important; */
        }
    </style>

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
                        <h3 class="border-bottom p-3 mb-0 bg-success">ACCOUNT RECEIVABLE</h3>

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
                                                <label for="name">Customer Name</label>
                                                <input type="text" name="name" id="name" placeholder="Enter Customer Name" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="invoice-date">Invoice Date</label>
                                                <input type="date" name="invoice-date" id="invoice-date" placeholder="Enter Invoice Date" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="due-date">Due Date</label>
                                                <input type="date" name="due-date" id="due-date" placeholder="Enter Due Date" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="total-amount">Total Amount Due</label>
                                                <input type="text" name="total-amount" id="total-amount" placeholder="Enter Total Amount Due" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="amount-paid">Amount Paid</label>
                                                <input type="text" name="amount-paid" id="amount-paid" placeholder="Enter Amount Paid" class="form-control" required>
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

                        <button type="button" class="btn btn-primary" style="margin: 1rem;" data-toggle="modal" data-target="#add">Add +</button>
                        <div class="p-3 table-responsive">
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Customer name</th>
                                        <th>Invoice number</th>
                                        <th>Invoice date</th>
                                        <th>Due date</th>
                                        <th>Total amount due</th>
                                        <th>Amount paid</th>
                                        <th>Balance due</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM account_receivable";
                                    $result = mysqli_query($con, $query);
                                    if (mysqli_num_rows($result)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['customer_name']; ?></td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['invoice_date']; ?></td>
                                                <td><?php echo $row['due_date']; ?></td>
                                                <td><?php echo $row['total_amount_due']; ?></td>
                                                <td><?php echo $row['amount_paid']; ?></td>
                                                <td><?php echo $row['balance_due']; ?></td>

                                                <td><button class="btn btn-success editBtn">Edit</button></td>
                                                <td>
                                                    <input type="hidden" name="deleteBtn2" class="deleteBtn2" id="deleteBtn2" value="<?php echo $row['id']; ?>">
                                                    <a href="javascript:void(0)" class="deleteBtn2 btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>

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
                                                $query = "SELECT * FROM account_receivable";
                                                $result = mysqli_query($con, $query);
                                                if (mysqli_num_rows($result)) {
                                                    $row = mysqli_fetch_assoc($result);
                                                ?>
                                                    <form action="action.php" method="post" class="form-group needs-validation" novalidate>
                                                        <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                                                        <div class="col-auto">
                                                <label for="name">Customer Name</label>
                                                <input type="text" name="name" id="name" placeholder="Enter Customer Name" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="invoice-date">Invoice Date</label>
                                                <input type="date" name="invoice-date" id="invoice-date" placeholder="Enter Invoice Date" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="due-date">Due Date</label>
                                                <input type="date" name="due-date" id="due-date" placeholder="Enter Due Date" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="total-amount">Total Amount Due</label>
                                                <input type="text" name="total-amount" id="total-amount" placeholder="Enter Total Amount Due" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <label for="amount-paid">Amount Paid</label>
                                                <input type="text" name="amount-paid" id="amount-paid" placeholder="Enter Amount Paid" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_btn2" class="btn btn-primary" style="box-shadow: none;">Update</button>
                                            </div>
                                            </form>
                                        <?php } ?>
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
    <script>
    $(document).ready(function() {
      $('.editBtn').on('click', function() {
        $('#editBtn').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[1]);
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.deleteBtn2').click(function(e) {
        e.preventDefault();

        var closeid = $(this).closest("tr").find('.deleteBtn2').val();

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
                  "delete_btn_set3": 1,
                  "delete_id3": closeid,
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
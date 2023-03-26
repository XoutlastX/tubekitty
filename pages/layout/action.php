<!-- Deleting a Data in Adjusted Trial Balance -->
<?php
session_start();
include 'config.php';

if (isset($_POST['delete_btn_set'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM adjustedtrialbalance_db WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    $_SESSION['success'] = "Successfully Deleted!";
    header("location: AdjustedTrialBalance.php");
}
?>

<!-- Updating a Data in Adjusted Trial Balance -->
<?php
if (isset($_POST['edit_btn'])) {
    $update_id = mysqli_real_escape_string($con, $_POST['id']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $ref_code = mysqli_real_escape_string($con, $_POST['ref-code']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);

    if (!empty($description) && !empty($ref_code) && !empty($amount)) {

        $query = "UPDATE adjustedtrialbalance_db SET description = '$description', ref_code = '$ref_code', amount = '$amount' WHERE id = '$update_id' ";
        $result = mysqli_query($con, $query);

        echo "Yey";
        header("location: AdjustedTrialBalance.php");
    }
}
?>

<!-- Approve Button -->
<?php

if (isset($_POST['approve_btn_set'])) {
    $id = $_POST['approve_id'];
    $status = "approved";

    $query = "UPDATE budget_request SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    $_SESSION['success'] = "Approved Successfully";
    header("location: salesreport.php");
}
?>

<!-- Denied Button -->
<?php

if (isset($_POST['denied_btn_set'])) {
    $id = $_POST['denied_id'];
    $status = "denied";

    $query = "UPDATE budget_request SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    $_SESSION['success'] = "Denied Successfully";
    header("location: salesreport.php");
}
?>

<!-- Deleting a Data in Collection Table -->
<?php
if (isset($_POST['delete_btn_set2'])) {
    $id = $_POST['delete_id2'];

    $query = "DELETE FROM collection_db WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    $_SESSION['success'] = "Successfully Deleted!";
    header("location: collectionAddCollection.php");
}
?>

<!-- Updating a Data in Account Receivable -->
<?php
if (isset($_POST['edit_btn2'])) {
    $update_id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $invoice_date = mysqli_real_escape_string($con, $_POST['invoice-date']);
    $due_date = mysqli_real_escape_string($con, $_POST['due-date']);
    $total_amount = mysqli_real_escape_string($con, $_POST['total-amount']);
    $amount_paid = mysqli_real_escape_string($con, $_POST['amount-paid']);
    $balance_due = $total_amount - $amount_paid;

    if (!empty($name) && !empty($invoice_date) && !empty($due_date) && !empty($total_amount) && !empty($amount_paid)) {

        $query = "UPDATE account_receivable SET customer_name = '$name', invoice_date = '$invoice_date', due_date = '$due_date', total_amount_due = '$total_amount', amount_paid = '$amount_paid', balance_due = '$balance_due' WHERE id = '$update_id' ";
        $result = mysqli_query($con, $query);

        echo "Yey";
        header("location: accountreceivable.php");
    }
}
?>

<!-- Deleting a Data in Account Receivable -->
<?php
if (isset($_POST['delete_btn_set3'])) {
    $id = $_POST['delete_id3'];

    $query = "DELETE FROM account_receivable WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    $_SESSION['success'] = "Successfully Deleted!";
    header("location: accountreceivable.php");
}
?>
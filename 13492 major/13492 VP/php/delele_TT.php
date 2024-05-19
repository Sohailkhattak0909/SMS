<?php
include 'connection.php';

// Retrieve table name and ID from URL parameters
$table = $_GET['table'];
$del_id = $_GET['id'];

// Construct the SQL query to delete data from the specified table
$del_q = "DELETE FROM `$table` WHERE Course_ID='$del_id'";

// Execute the query
$result = mysqli_query($con, $del_q);

// Check if the query was successful
if ($result) {
    echo "<script>alert('Data Deleted Successfully'); window.location='time_table.php';</script>";
} else {
    echo "<script>alert('Data Not Deleted Successfully'); window.location='time_table.php;</script>";
}
?>

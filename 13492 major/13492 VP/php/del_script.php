<?php
include 'connection.php';

$del_id = $_GET['id'];
$del_q = "DELETE FROM `data` WHERE S_No=$del_id";
$result = mysqli_query($con, $del_q);

if ($result) {
    echo "<script>alert('Data Deleted Successfully'); window.location='delete.php';</script>";
} else {
    echo "<script>alert('Data Not Deleted Successfully'); window.location='delete.php';</script>";
}


?>

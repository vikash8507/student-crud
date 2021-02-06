<?php
if (isset($_POST['delete'])) {

    include_once './connection.php';

    $sid = $_POST['sid'];
    echo $sid;
    $q = "DELETE FROM student WHERE sid = '$sid'";
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM student WHERE sid = '$sid'")) > 0) {
        if (mysqli_query($con, $q)) {
            echo "<script> alert('Student deleted successfully.') </script>";
            echo "<script> window.location = '/student_crud' </script>";
        }
    } else {
        echo "<script> alert('Student not found.') </script>";
    }
} 
    mysqli_close($con);

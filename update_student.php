<?php include_once './connection.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Student CRUD</title>
</head>

<body>

    <?php
    $sid = $_GET['sid'];
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM student WHERE sid='$sid'")) > 0) {
        $student = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM student WHERE sid='$sid'"));
    ?>

        <div class="container">
            <div class="col-sm-8 mx-auto">
                <div class="row mt-5" style="background-color: #d2d0d0;">
                    <nav class="nav">
                        <a class="nav-link fs-4 text" href="add_student.php">Add Student</a>
                        <a class="nav-link fs-4 text" href="index.php">Student List</a>
                    </nav>
                </div>
                <div class="row">
                    <h3 class="alert text-center">Update Student Information</h3>
                </div>
                <div class="row mx-5">
                    <form action="" method="POST">
                        <table class="table table-borderless">
                            <tr>
                                <td>sid</td>
                                <td>
                                    <div class="form-grop">
                                        <input type="number" name='sid' value="<?php echo $student['sid']; ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>
                                    <div class="form-grop">
                                        <input type="text" name='name' value="<?php echo $student['name']; ?>" class="form-control" placeholder='Enter Name'>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>semester</td>
                                <td>
                                    <div class="form-grop">
                                        <input type="number" name='semester' value="<?php echo $student['semester']; ?>" class="form-control" placeholder='Enter Semester'>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>branch</td>
                                <td>
                                    <div class="form-grop">
                                        <input type="text" name='branch' value="<?php echo $student['branch']; ?>" class="form-control" placeholder='Enter Branch'>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name='update' value='Submit' class="btn btn-success">
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo "<script> window.alert('Student not found.') </script>";
        echo "<script> window.location = '/student_crud' </script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $semester = $_POST['semester'];
    $branch = $_POST['branch'];

    if (empty($sid) or empty($name) or empty($semester) or empty($branch)) {
        echo "<script> alert('All fields are required'); </script>";
    } else {
        $q = "UPDATE student SET name='$name', semester='$semester', branch='$branch' WHERE sid='$sid'";
        if (mysqli_query($con, $q)) {
            echo "<script> window.alert('Student updated successfully.') </script>";
            echo "<script> window.location = '/student_crud' </script>";
        } else {
            echo "<script> alert('Error: " . mysqli_error($con) . "'); </script>";
        }
    }
    mysqli_close($con);
}

?>
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

    <div class="container">
        <div class="col-sm-8 mx-auto">
            <div class="row mt-5" style="background-color: #d2d0d0;">
                <nav class="nav">
                    <a class="nav-link fs-4 text" href="add_student.php">Add Student</a>
                    <a class="nav-link fs-4 text" href="index.php">Student List</a>
                </nav>
            </div>
            <div class="row">
                <h3 class="alert text-center">Student List</h3>
            </div>
            <div class="row">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>sid</th>
                            <th>name</th>
                            <th>semester</th>
                            <th>branch</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "SELECT * FROM student";
                        $students = mysqli_query($con, $q);

                        if (mysqli_num_rows($students) > 0) {
                            while ($student = mysqli_fetch_array($students)) { ?>
                                <tr>
                                    <td><?php echo $student['sid']; ?></td>
                                    <td><?php echo $student['name']; ?></td>
                                    <td><?php echo $student['semester']; ?></td>
                                    <td><?php echo $student['branch']; ?></td>
                                    <td>
                                        <a href="update_student.php?sid=<?php echo $student['sid']; ?>" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="delete.php" method='POST'>
                                            <input type="number" name='sid' value=<?php echo $student['sid']; ?> hidden>
                                            <input type="submit" name='delete' class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                            mysqli_close($con);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
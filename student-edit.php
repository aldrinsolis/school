<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Binalonan University!</title>
  </head>
  <body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            // Sanitize and validate the student ID
                            $student_id = $_GET['id'];

                            // Ensure the ID is a valid number (integer)
                            if (!filter_var($student_id, FILTER_VALIDATE_INT)) {
                                echo "<h4>Invalid student ID.</h4>";
                                exit;
                            }

                            // Fix the query: Removed the unnecessary '1' at the end
                            $query = "SELECT * FROM students WHERE id='$student_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                               $student = mysqli_fetch_array($query_run);
                               ?>

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= htmlspecialchars($student['id']); ?>">

                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <input type="text" name="name" value="<?= htmlspecialchars($student['name']); ?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <input type="email" name="email" value="<?= htmlspecialchars($student['email']); ?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']); ?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Address</label>
                                        <input type="text" name="address" value="<?= htmlspecialchars($student['address']); ?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Course</label>
                                        <input type="text" name="course" value="<?= htmlspecialchars($student['course']); ?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student_details" class="btn btn-primary">
                                          Update Student
                                        </button>
                                    </div>  
                                </form>

                               <?php
                            }
                            else
                            {
                                echo "<h4>No such student found with the given ID.</h4>";
                            }
                        }
                        ?>          
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>


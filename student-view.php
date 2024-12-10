<?php
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

    <title>University Of Binalonan</title>
  </head>
  <body>

    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details
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

                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <p class="form-control" required>
                                        <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <p class="form-control" required>
                                           <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <p class="form-control" required>
                                        <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Address</label>
                                        <p class="form-control" required>
                                        <?=$student['address'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Course</label>
                                        <p class="form-control" required>
                                        <?=$student['course'];?>
                                        </p>
                                    </div>


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
<?php
    require_once ('db_connection.php');
    $db = new Database();
    $allJob = $db->dropDownJob();
    $allGender = $db->dropdownGender();

    if( $_SERVER['REQUEST_METHOD'] === 'POST'){
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $job = $_POST["job"];

            // add new user to DB
            $db = new Database();
            $addUser = $db->insertUser($last_name,$first_name,$email,$gender,$job);

            header("location: /Midterm/crud/index.php");
            exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
    <h2 align="center">Add New User</h2>
    <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="first_name" required>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="last_name" required>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
            </div>
            <div class="col-sm-6">
                <select class="form-control" name="gender" required>
                    <?php  foreach($allGender as $gender)
                        echo "
                            <option value='$gender[id]'>$gender[gender]</option>
                        ";
                    ?>
                </select>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
            </div>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Occupation</label>
            </div>
            <div class="col-sm-6">
                <select class="form-control" name="job" required>
                    <?php foreach($allJob as $selection)
                        echo "
                        <option value='$selection[id]'>$selection[name]</option>
                        ";
                    ?>
                </select>
            </div>

            <br>
            
            <br>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/Midterm/crud/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
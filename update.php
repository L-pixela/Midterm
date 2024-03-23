<?php
    require_once ('db_connection.php');
    $db = new Database();
    $allJob = $db->dropDownJob();
    $allGender = $db->dropDownGender();
    

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $db = new Database();
        $user = $db->getUserbyId($id);

    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $job = $_POST['job'];

            
            $db = new Database();
            $db->updateUser($id,$last_name,$first_name,$email,$gender,$job);

            header("location: /Midterm/crud/index.php");
            exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br>
    <h2 align="center">Update User</h2>
    <form method="POST">
            <input type="hidden" name="id" value="<?=$user['id'] ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="first_name" value="<?=$user['first_name']; ?>" required >
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="last_name" value="<?=$user['last_name'] ?>" required>
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
                <input type="email" class="form-control" name="email" value="<?=$user['email'] ?>" required>
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
                    <button type="submit" class="btn btn-primary" value="Update User">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/Midterm/crud/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
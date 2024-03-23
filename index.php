<?php
    require('db_connection.php');
    $db = new Database();

    $user = $db->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="container my-5">
            <h2 align="center">DashBoard</h2>
            <br>
            <a href="addUser.php" class="btn btn-primary" role="button">Add User</a>
            <a href="addJob.php" class="btn btn-primary" role="button">Add Occupation</a>
            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>GENDER</th>
                        <th>EMAIL</th>
                        <th>Occupation</th>
                        <th>CREATED_AT</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($user as $row){
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[first_name]</td>
                                <td>$row[last_name]</td>
                                <td>$row[gender]</td>
                                <td>$row[email]</td>
                                <td>$row[job]</td>
                                <td>$row[created_at]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='update.php? id=$row[id]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='remove.php? id=$row[id]'>Remove</a>
                                </td>
                            </tr>
                        ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>
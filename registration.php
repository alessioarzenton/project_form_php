<?php
require_once('config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Registration User | PHP</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-input-cursor"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="registration.php">Form</a>
            </li>      
        </div>
    </div>
</nav>

<div style="background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.9)),url('https://picsum.photos/1920/1080')" class="container-fluid vh-100 vw-100">

    <div class="row h-100 justify-content-center align-items-center">

            <div class="col-11 col-md-6 p-5 shadow rounded bg-white position-relative">
                    <div class="d-flex justify-content-center position-absolute top-0 start-0 mt-1 ms-1">
                        <span class="p-2 bg-danger border border-light rounded-circle"></span>
                        <span class="p-2 bg-warning border border-light rounded-circle"></span>
                        <span class="p-2 bg-success border border-light rounded-circle"></span>
                    </div>
                <h1>Compile the form:</h1>
                <form action="registration.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    <button name="create" type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>

            <?php

            if (isset($_POST['create'])) {
                        
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$name,$email,$password]);

                if ($result) {
                    echo "
                    <div class='row justify-content-center align-items-center'>
                    <div class='col-11 col-md-6'>
                    <div class='alert alert-success py-0 px-3 d-flex justify-content-between align-items-center'><span>Save successfully</span><a href='registration.php' class='btn btn-success my-2'>Refresh</a></div>
                    </div>
                    </div>";
                }
            }

            ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>



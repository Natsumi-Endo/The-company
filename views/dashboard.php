<?php

    session_start();
    include "../classes/user.php";

    

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--fontawsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbar-icon">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a href="../views/dashboard.php" class="nav-link text-white">The Company</a> 
                    </li>                    
                </ul>
                <ul class="navbar-nav ms-auto">    
                    <li class="nav-item">
                    <a href="../views/profile.php" class="nav-link text-white"><?=$_SESSION['username'];?></a>   
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger">Log out</a>   
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-secondary  text-capitalize py-2 px-2">
            User List
        </h1>    
    <!--Table-->
    <table class="table table-striped ">
        <thead class="table-secondary">
            <tr>
                <th class="text-uppercase">#</th>
                <th class="text-uppercase">First Name</th>
                <th class="text-uppercase">Last Name</th>
                <th class="text-uppercase">Username</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
                <?php
                $user = new User();
                $userslist = $user->getAllUsers();

                if ($userslist && $userslist-> num_rows>0) {
                    while ($row = $userslist->fetch_assoc()) { 
                ?>
            <tr>
                <td><?= $row["id"]?></td>
                <td><?= $row["first_name"]?></td>
                <td><?= $row["last_name"]?></td>
                <td><?= $row["username"]?></td>
                <td>
                    <a href="edit-user.php?id=<?= $row["id"]?>" class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                    <a href="../actions/delete-user.php?id=<?= $row["id"]?>" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            <?php 
                        }
                       
                    }
                
            ?>
            </tbody>
        </table>
    </div> 
<!--Don't forget  if you use toggle button-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
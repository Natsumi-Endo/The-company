<?php
session_start();

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
    <title>Profile</title>
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
    <main class="card w-25 mx-auto my-5">
    <img src="../assets/images/<?=$_SESSION['photo']?>" alt="Profile Picture" class="card-img-top">
    <div class="card-body">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" id="photo" class="form-contorol" accept="image/*" required>
            <button type="submit" class="btn btn-outline-success"><i class="fas fa-arrow-circle-up"></i></button>
        </form>
    </div>
    <div class="card-footer border-0 bg-white">
        <p class="lead fw-bold mb-0">First name Last name</p>
        <p class="lead">Username</p>
    </div>

    </main>
    
</body>
</html>
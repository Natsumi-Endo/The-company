<?php

    session_start();
    include "../classes/user.php";  
    $user = new User();
    $id = $_GET['id'];
    $result = $user->getUseringfo($id);
    $user_details = $result->fetch_assoc();
   
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

    <title>Edit User</title>
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
    <main class="container" style="padding-top: 80px">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">EDIT USER</h2>
            </div>
            <div class="card-body">
                <form action="../actions/edit-user.php" method="post">
                    <input type="hidden" name="user_id" value="<?= $user_details['id'] ?>">
                    <!-- copy from REGISTER.PHP -->
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first-name" class="form-control mb-2" value="<?= $user_details['first_name'] ?>" required autofocus>
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last-name" class="form-control mb-2" value="<?= $user_details['last_name'] ?>" required>
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-5 fw-bold" maxlength="15" value="<?= $user_details['username'] ?>" required>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                        <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
<!--Don't forget  if you use toggle button-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
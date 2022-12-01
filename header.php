<?php 

if(!isset($enabled_page)){
    header("location: index.php");
}
session_start();
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

         <?php 
        if(isset($index)){
            echo 'Home';
        }elseif(isset($blog)){
            echo 'Blog';
        }elseif(isset($about)){
            echo 'About';
        }else{
            echo 'Login';
        }
        ?> 
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO HERE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php 
                        if(isset($index)){
                            echo '<a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>';
                        }else{
                            echo '<a class="nav-link" aria-current="page" href="index.php">Home</a>';
                        }
                        
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($blog)){
                            echo '<a class="nav-link active" href="blog.php"><b>Blogs</b></a>';
                        }else{
                            echo '<a class="nav-link" href="blog.php">Blogs</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($about)){
                            echo '<a class="nav-link active" href="about.php"><b>About</b></a>';
                        }else{
                            echo '<a class="nav-link" href="about.php">About</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php if(!isset($_SESSION['logged_in'])){ ?>
                            <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.php" class="nav-link">Signup</a>
                    <?php    }else{ ?>
                        <a href="logout.php" class="nav-link">Logout</a>
                    <?php    }  ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

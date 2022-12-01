<?php
$enabled_page = true;
include 'header.php';
if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $rows = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $rows->execute([$email]);

    foreach($rows as $values){
        if($values['email'] == $email && password_verify($password, $values['password'])){
            
            $_SESSION['logged_in'] = true;
            $_SESSION['u_id'] = $values['user_id'];
            header("location: blog.php");
        }else{
            $warning_msg = "Password Incorrect!";
        }
    }
}
?>
<!-- content start -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 shadow p-4  mt-4">
            <?php 
            if (isset($warning_msg)) {
                echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>' . $warning_msg . '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            }
            ?>
            <form method="POST" action="login.php">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pass" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Sign in</button>
            </form>
        </div>
    </div>
</div>
<!-- content end -->
</body>

</html>
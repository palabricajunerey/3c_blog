<?php
$enabled_page = true;
include 'header.php';
if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

if(isset($_POST['register'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    //binding
    $check->execute([$email]);

    //check email if already excess
    if($check->rowCount() != 0){
        $warning_msg = "Email already in USE!";
    }elseif($pass1 != $pass2){
        $warning_msg = "Password and confirm password do not match!";
    }else{
        $hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
        //query
        $reg = $conn->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)");
        //bind
        $reg->execute([
            $fname,
            $lname,
            $email,
            $hashed_password
        ]);

        $msg = "User has been registered!";
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
            }elseif (isset($msg)) {
                echo '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>' . $msg . '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            }
            ?>
            <form method="POST" action="signup.php">
                <div class="row mb-3">
                    <label for="fname" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fname" name="f_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" name="l_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password1" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pass2" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="pass2" name="password2" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Sign up</button>
            </form>
        </div>
    </div>
</div>
<!-- content end -->
</body>

</html>
<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <form action="" method="POST" class="login-form">
                <h2>Login</h2>
                <input class="name" type="text" name="username" placeholder="Enter Username" required>
                <input class="pass" type="password" name="password" placeholder="Enter Password" required>
                <input class="login-btn" type="submit" name="submit" value="Login">
            </form>
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; 

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>
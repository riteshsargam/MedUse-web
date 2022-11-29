<?php
require_once('function.php');

$db            =    new login_function();

$message    =    "";
$flag                =    0;
$w_username            =   "";
$w_password            =   "";
$password_error        =    0;
$username_error        =    0;

     if (isset($_GET['logout'])) {
     unset($_SESSION['current_login_user']);
     }
     if (isset($_SESSION['current_login_user'])) {
     header("Location:UserLogin.php");
     }


    if (isset($_POST['Login'])) 
    {

    $w_username        =    $_POST['w_username'];
    $w_password        =     $_POST['w_password'];
    
    $db_passwod        =    $db->get_password_from_username($w_username);

    if ($db_passwod == "") {
        $username_error     =  1;
        $flag               =    1;
    }
    if ($flag == 0) {
        if ($db_passwod == $w_password) {
            $_SESSION['current_login_user'] = $w_username;

?>
            <script>
                window.location = "UserLogin.php";
            </script>
<?php
        } else {
            $password_error        =    1;
            $flag                =    2;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med user login Form</title>
    <link rel="stylesheet" href="passwordvalidation1.css">
</head>

<body>
    <div class="container">
        <h1>MEDUSE LOGIN FORM</h1>



        <div class="registration">

            <form action="LoginForm.php" method="POST">
                <?php
                if ($password_error == 1) {
                ?>
                    <div class="alert alert-danger">
                        <span class="alert-link">Please!</span> Enter Correct Password.
                    </div>
                <?php
                }
                ?>
                <?php
                if ($username_error == 1) {
                ?>
                    <div class="alert alert-danger">
                        <span class="alert-link">Please!</span> Enter Correct User ID.
                    </div>
                <?php
                }
                ?>


                <div class="container1">
                    <label for="usrname">Username</label>
                    <input type="type" name="w_username" placeholder="Username" value="<?php echo $w_username; ?>" />

                    <label for="psw">Password</label>
                    <input type="password" name="w_password" placeholder="Password" value="<?php echo $w_password; ?>" />

                </div>

                <br>

                <input type="submit" value="Submit" name="Login">
            </form>
        </div>
    </div>
</body>

</html>
<?php
require_once('function.php');

$db            =    new login_function();

$message    =    "";



if (isset($_POST['Submit'])) {
    $Name    =    $_POST['Name'];
    $EmailId    =    $_POST['EmailId'];
    $Username        =    $_POST['Username'];
    $Password        =    $_POST['Password'];
    $Gender        =    $_POST['Gender'];

    if ($db->add_newUser($Name, $EmailId, $Username, $Password, $Gender)) {
        $message    =    1;
    } else {
        $message    =    2;
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
        <h1>MEDUSE USER FORM</h1>

        <h3>Register</h3>

        <div class="registration">

            <form action="Register.php" method="POST">
                <?php
                
                if ($message == 1) {
                ?>
                    
                    <div class="alert alert-success"><strong>Success...!User has been Registered successfully.</strong></div>
                <?php
                    $EmailId="";
                    $Name="";
                    $Username="";
                    $Password="";
                    $Gender="";

                }
                ?>
                <?php
                if ($message == 2) {
                ?>
                    <div class="alert alert-warning"><strong>Something went wrong</strong></div>
                <?php
                }
                ?>
                <label>Name:</label>
                <input type="text" name="Name" placeholder="Name"> <br><br>

                <label>Email:</label>
                <input type="email" name="EmailId" placeholder="name@email.com" required><br><br>

                <div class="container1">
                    <label for="usrname">Username</label>
                    <input type="text" id="usrname" name="Username" required>

                    <label for="psw">Password</label>
                    <input type="password" id="psw" name="Password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

                </div>






                <br>

                <label>Confirm Password:</label>
                <input type="password" name="password" placeholder="At least 8 letters" required><br><br>


                <label>GENDER</label><br>
                <select name='Gender'>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
                <br><br>



                <input type="submit" value="Submit" name="Submit">
            </form>
        </div>
    </div>
</body>

</html>
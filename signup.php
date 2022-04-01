<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/nevbar.css">
    <link rel="stylesheet" href="css/login&signup.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Signup</title>
</head>
<body>
    
    <!-- nevbar -->
    <!-- <?php include "partials/_dbconnect.php"; ?> -->
    <?php include "partials/_nevbar.php"; ?>
    
    <div class="space"></div>

    <?php
        $showError = 0;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include "partials/_dbconnect.php";
            $user_name = $_POST['name'];
            $user_name = str_replace("<","&lt;",$user_name);
            $user_name = str_replace(">","&gt;",$user_name);
            $user_email = $_POST['email'];
            $user_email = str_replace("<","&lt;",$user_email);
            $user_email = str_replace(">","&gt;",$user_email);
            $pass = $_POST['password'];
            $pass = str_replace("<","&lt;",$pass);
            $pass = str_replace(">","&gt;",$pass);
            $cpass = $_POST['cpassword'];
            $cpass = str_replace("<","&lt;",$cpass);
            $cpass = str_replace(">","&gt;",$cpass);

            // Check whether this user name exists
            $existSql = "select * from `users` where user_name = '$user_name'";
            $result = mysqli_query($conn, $existSql);
            $numRows = mysqli_num_rows($result);

            // Check whether this email exists
            $existSqlone = "select * from `users` where user_email = '$user_email'";
            $resultone = mysqli_query($conn, $existSqlone);
            $numRowsone = mysqli_num_rows($resultone);

            if($numRows>0){
                //user name already in use
                echo '
                    <script>
                        alert("Display name already in use!");
                        window.location="signup.php";
                    </script>
                ';
            }
            else{
                // Check whether this user email exists

                if($numRowsone>0){
                    echo "
                    <script>
                        alert('Email already in use!');
                        window.location='signup.php';
                    </script>
                    ";
                }
                else {

                    if($pass == $cpass){
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `timestamp`) VALUES ('$user_name', '$user_email', '$hash', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        
                        if($result){
                            // account created successfull
                            echo "
                            <script>
                                alert('New Account is created Successfully! you can now login!');
                                window.location='login.php';
                            </script>
                            ";
                        }
                    }
                    else{
                        // password and cpassword do not match!
                        echo "
                        <script>
                            alert('Confirm Password does not match!');
                            window.location='signup.php';
                        </script>
                        ";
                    }
                }
            }

        }       
    ?>
    
    <!-- background image -->
    <div class="backimg"></div>

    <div class="login_container">
        <form action="signup.php" method="POST">
            <label for="name">Display name</label>
            <input type="text" id="name" name="name" maxlength="30" required>

            <label for="Email">Email</label>
            <input type="email" id="Email" name="email" maxlength="40" required>

            <label for="password">Password </label>
            <input type="password" id="password" name="password" required>
            
            <label for="cpassword">Confirm Password </label>
            <input type="password" id="cpassword" name="cpassword" required>

            <label for="tandc"><p><input style="width: auto;" type="checkbox" id="tandc" name="tandc" required> I agree to the StackForum <a href="terms_service.php">Terms of service</a></p></label>

            <button type="submit">Sign up</button>
            <p class="account">Already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>


    <div class="space"></div>

    <!-- --------------------------------------- Footer  ------------------------------ -->
    <?php include "partials/_footer.php"; ?>
</body>
</html>
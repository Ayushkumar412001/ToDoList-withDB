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
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/login&signup.css">
        <title>Login</title>
    </head>
    <body>
        
        <!-- nevbar -->
        <?php include "partials/_dbconnect.php"; ?>
        <?php include "partials/_nevbar.php"; ?>
    
    <!-- background image -->
    <div class="backimg"></div>
    
    <?php
        // $showError = "false";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'partials/_dbconnect.php';
            $email = $_POST['email'];
            $email = str_replace("<","&lt;",$email);
            $email = str_replace(">","&gt;",$email);
            $pass = $_POST['password'];
            $pass = str_replace("<","&lt;",$pass);
            $pass = str_replace(">","&gt;",$pass);
            
            $sql = "SELECT * FROM `users` WHERE user_email='$email'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            // check user email is present or not
            if($numRows == 1) {
                // if user email is present
                $row = mysqli_fetch_assoc($result);
                // varifing password
                if(password_verify($pass, $row['user_pass'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['sno'] = $row['sno'];
                    $username = $row['user_name'];
                    $_SESSION['username'] = $username;
                    $_SESSION['useremail'] = $email;
                    echo '
                    <script>
                    // alert("Login successfull! welcome '.$username.'");
                    window.location="index.php";
                    </script>
                    ';
                }
                else {
                    // if wrong password entered
                    echo '
                    <script>
                    alert("Wrong Password!");
                    </script>
                    ';
                }
                // header("Location: /forum/index.php");
            }
            else {
                echo '
                <script>
                alert("User not found! please signup!");
                </script>
                ';
            }
            // header("Location: /forum/index.php");
            
        }
        ?>   

<div class="space"></div>

<div class="login_container">
    <form action="login.php" method="POST">
        <label for="Email">Email</label>
        <input type="email" id="Email" name="email" required>
        
        <label for="password">Password </label>
        <input type="password" id="password" name="password" required>
        
            <label for="tandc"><p><input style="width: auto;" type="checkbox" id="tandc" name="tandc" required> I agree to the StackForum <a href="terms_service.php">Terms of service</a></p></label>

            <button type="submit">Log in</button>
            <p class="account">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>


    <div class="space"></div>

    <!-- --------------------------------------- Footer  ------------------------------ -->
    <?php include "partials/_footer.php"; ?>

</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nevbar.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>To Do List</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $task = $_POST['task'];
        $task = str_replace("<","&lt;",$task);
        $task = str_replace(">","&gt;",$task);
        $user_id = $_POST['user_id'];
        
        $sql = "INSERT INTO `task` (`task`, `user_id`, `dateandtime`) VALUES ('$task', '$user_id', current_timestamp());";
        $result = mysqli_query($conn, $sql);
    }
    ?>

<div class="contaner">
    <!-- background Image -->
    <div class="backimg"></div>
    
    <!-- To Do List -->
    <div class="todolist">
        
        <?php include "partials/_nevbar.php"; ?>
        <div id="myDIV" class="header">
            <p id="dateinfo">
                <?php
                    $d = date("d");
                    $day = date("l");
                    echo $d . " , " . $day;
                ?>
            </p>
            <h2 style="margin:5px">My To Do List</h2>
            <form action="index.php?" method="POST">
                <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        $usersno = $_SESSION['sno'];
                        echo '
                        <input name="task" type="text" id="myInput" placeholder="Things to do Today...">
                        <input type="hidden" name="user_id" value="'.$usersno.'">
                        <button type="submit" class="addBtn">Add</button>
                        ';
                    }else {
                        echo "<h3 style='font-size:30px;'> Please login to continue</h3>";
                    }
                ?>
            </form>
        </div>

        <ul class="list" id="myUL">
            <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                    $usersno = $_SESSION['sno'];
                    $sql1 = "SELECT * FROM `task` WHERE `user_id` = $usersno ;";
                    $result1 = mysqli_query($conn,$sql1);
                    $i=1;

                    while($row = mysqli_fetch_assoc($result1)){
                        $task = $row['task'];
                        $sno = $row['sno'];
                        echo '
                            <li onclick="myFunction()" id="done">'.$i.'. '.$task.'<a href="close.php?catid='.$sno.'" class="close">x</a></li>
                        ';
                        $i++;
                    }

                }
            ?>
            
            <!-- <LI class="checked">Pay bills</LI>
            <LI>Meet George</LI>
            <LI>Buy eggs</LI>
            <LI>Read a book</LI>
            <LI>Organize office</LI> -->
        </ul>

    </div>

    <!-- footer -->
    <?php include "partials/_footer.php"; ?>

</div>

<script>
    
    var list = document.getElementById("myUL");
    list.addEventListener("click", function(ev) {

        if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
        }

    }, false);

</script>

</body>

</html>
<?php
   session_start();

   include("php/config.php");

   // Redirect to login if not logged in
   if(!isset($_SESSION['valid'])){
       header("Location: index.php");
       exit;
   }

   $id = $_SESSION['id'];
   $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

   if($result = mysqli_fetch_assoc($query)){
       $res_Uname = $result['Username']; // fixed to use Username key correctly
       $res_Email = $result['Email'];
       $res_Age = $result['Age'];
       $res_id = $result['Id'];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">YUNG</a></p>
        </div>
        <div class="right-links">
            <?php
                echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <!-- Display user's username -->
                    <p>Hello <b><?php echo htmlspecialchars($res_Uname); ?></b>, Welcome</p>
                </div>

                <div class="box">
                    <!-- Display user's email -->
                    <p>Your Email is <b><?php echo htmlspecialchars($res_Email); ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <!-- Display user's age -->
                    <p>And you are <b><?php echo htmlspecialchars($res_Age); ?> years old</b>.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

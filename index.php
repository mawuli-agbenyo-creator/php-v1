<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
                include("php/config.php");

                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Use a prepared statement
                    $stmt = $con->prepare("SELECT * FROM users WHERE Email = '$email' AND Password = '$password'");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    
                    if($row && $password === $row['password']){
                        // Password is correct, set session variables
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];
                        
                        header("Location: home.php");
                    } else {
                        echo "<div class='message'>
                                <p>Wrong Email or Password</p>
                              </div><br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                    }

                    $stmt->close();
                } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                   <label for="email">Email</label> 
                   <input type="text" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label> 
                    <input type="password" name="password" id="password" required>
                 </div>

                 <div class="field"> 
                    <input type="submit" class="btn" name="submit" value="Login">
                 </div>
                 <div class="links">
                    Don't have an Account? <a href="register.php">Sign up</a>
                    
                 </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign up</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">


        <?php 
        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

        //verifying email
         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
         if(mysqli_num_rows($verify_query) !=0){
            echo "<div class='message'>
                      <p>This email is used, Try another one please!</p>
                      </div> <br>";
                      echo"<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
         }
          else{

            mysqli_query($con,"INSERT INTO users(username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error occured");

            echo "<div class='message'>
            <p>Registration Successfull!</p>
            </div> <br>";
            echo"<a href='index.php'><button class='btn'>Login</button>";
          
          }
        }else{
        ?>


            <header>Register</header>
            <form action="" method="post">
                <div class="field input">
                   <label for="username">Username</label> 
                   <input type="text" name="Username" autocomplete="off" id="required">
                </div>

                <div class="field input">
                    <label for="email">Email</label> 
                    <input type="email" name="email" autocomplete="off" id="required">
                 </div>

                <div class="field input">
                    <label for="age">Age</label> 
                    <input type="number" name="age" autocomplete="off" id="required">
                 </div>

                <div class="field input">
                    <label for="password">Password</label> 
                    <input type="password" name="password" autocomplete="off" id="required">
                 </div>

                 <div class="field"> 
                    <input type="submit" class="btn" name="submit" value="Register">
                 </div>
                 <div class="links">
                    Already have an Account? <a href="index.php">Sign in</a>
                 </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
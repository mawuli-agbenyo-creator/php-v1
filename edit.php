<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>YUNG</p>
        </div>
        <div class="right-links">
            <a href="#">Change profile</a>
            <a href="logout.php"> <button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <header>Change Profile</header>
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

                 <div class="field"> 
                    <input type="submit" class="btn" name="submit" value="Update">
                 </div>
            </form>
        </div>
    </div>
</body>
</html>
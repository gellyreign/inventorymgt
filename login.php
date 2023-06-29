<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">
         
    <title>Login Form</title> 
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title"><i class="fa-solid fa-prescription"></i> JCBO | Login Form</span>

                <form method="POST" action="login_query.php">
                    <div class="input-field">
                        <input type="text" name="uname" placeholder="Enter your username" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pwd" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                      
                        
                        <a href="forgot_password.php" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>

                
            </div>

           
        </div>
    </div>

     <script src="script.js"></script> 
</body>
</html>
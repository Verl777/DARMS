<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRUG ADDICTS' REHABILITATION MANAGEMENT SYSTEM | Login Page</title>

</head>

<body>


    <div class="login-box">

        <img src="logo.png" alt="Logo" class="avatar">
        <h1>DARMS Login</h1>
        <form action="index.php" method="post">
            <p>Username</p>
            <input type="text" required name="username" placeholder="Enter username here">
            <p>Password</p>
            <input type="password" name="password" required placeholder="Enter Password here">
            <input type="submit" name="submit" value="Login">
            <a href="#">Forgot Password?</a>

            <div class="signup">Don't have an account?
                <label for="flip"><a href="signup.php">Sign Up</a></label>
            </div>
    </div>
    </form>

    </div>


</body>

</html>

</html>
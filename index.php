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
            <?php echo display_error(); ?>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter username here">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password here">
            <select class="select-user" name="user_type" id="select">
                <option>Select System User</option>
                <option value="receptionist">Receptionist</option>
                <!-- <option value="nurse">Nurse</option> -->
                <option value="doctor">Doctor</option>
                <option value="therapist">Therapist</option>
                <option value="admin">Admin</option>
            </select><br />
            <button class="button" name="submit">LOGIN</button>
            <div class="psw">
                <h1 style="margin-top:10px;"><a id="psw" href="#">Forgot Password?</a></h1>
            </div>
            <div class="signup">Don't have an account?
                <h1><a id="signup" href="signup.php">Sign Up</a></h1>
            </div>
        </form>

    </div>


</body>

</html>

</html>
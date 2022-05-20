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
        <form action="login.php" method="POST">
            <p>Username</p>
            <input type="text" required name="username" placeholder="Enter username here">
            <p>Password</p>
            <input type="password" name="password" required placeholder="Enter Password here">
            <select class="select-user" name="user_type" id="select">
                <option>Select System User</option>
                <option value="nurse">Receptionist</option>
                <option value="nurse">Nurse</option>
                <option value="doctor">Doctor</option>
                <option value="therapist">Therapist</option>
                <option value="admin">Admin</option>

            </select>
            <button type="submit" name="submit" value="Login">
                <a href="#">Forgot Password?</a>

                <div class="signup">Don't have an account?
                    <a href="signup.html"><label for="flip">Sign Up</label></a>
                </div>
    </div>
    </form>

    </div>


</body>

</html>

</html>
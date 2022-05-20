<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registration Form</title>
    <link rel="stylesheet" href="style1.css">
    <script src="scripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">DARMS Registration</div>
        <div class="content">
            <form action="signup.php" method="post" onsubmit="return validateControls()">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="fullname" id="fullname" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" id="username" placeholder="Enter your username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter your number">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password_1" id="password_1" placeholder="Enter your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="password_2" id="password_2" placeholder="Confirm your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Userrole :</span>

                        <select class="user_role" name="user_role" id="user_role>
                            <option value="">Role</option>
                            <option value=" receptionist">Receptionist</option>
                            <option value="doctor">Doctor</option>
                            <option value="therapist">Therapist</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                </div>
                <div class="gender-details">
                    <!-- <select class="user_role" name="gender">
                            <option value="">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="nurse">Nurse</option>
                        </select> -->
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="register" value="Register">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
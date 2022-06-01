<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registration Form</title>
    <link rel="stylesheet" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">DARMS Registration</div>
        <div class="content">
            <!-- <form action="signup.php" method="post" onsubmit="return validateform()"> -->
            <form name="myform" method="post" action="signup.php" onsubmit="return validateform()">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" onclick="fullnameValidate()" name="fullname" id="fullname" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" id="username" placeholder="Enter your username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" id="email" placeholder="Enter your email">
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

                        <select class="user_role" name="user_role" id="user_role">
                            <option value="role">Role</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="doctor">Doctor</option>
                            <option value="therapist">Therapist</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                </div>
                <div class="gender-details">
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
                <div class="input-box">
                    <span class="details">Status:</span>

                    <select class="status" name="status" id="user_status">
                        <option value=" status">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateform() {
            //Email validation
            var email = document.getElementById("email");
            var fullname = document.getElementById("fullname");
            var phonenumber = document.getElementById("phonenumber");
            var username = document.getElementById("username");
            var password = document.getElementById("password_1");
            var confirmpassword = document.getElementById("password_2");
            var userrole = document.getElementById("user_role");




            if (fullname.value == "") {
                window.alert("Fullnames cannot be empty");
                document.getElementById("fullname").focus();
                return false;

            }
            //Validating full names
            if (fullname.value == "") {
                window.alert("Fullnames cannot be empty");
                document.getElementById("fullname").focus();
                return false;
            }

            //Username validation
            if (username.value == "") {
                window.alert("Please enter your username");
                document.getElementById("username").focus();
                return false;
            }


            //Email validation
            if (email.value == "") {
                window.alert("Email cannot be empty");
                document.getElementById("email").focus();
                return false;
            }
            if (email.value.length == 0 || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
                alert("Please include an @ and . in  your email address");
                document.getElementById("email").focus();
                return false;
            }
            //Password
            var Chars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            if (password.value == "" || !Chars.test(password.value)) {
                window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
                document.getElementById("password_1").focus();
                return false;
            }
            //Confirmation ofpassword_1
            if (confirmpassword.value !== password_1.value) {
                window.alert("Password details do not match to Password_1.");
                document.getElementById("password_2").focus();
                return false;
            }
            if (confirmpassword.value == '') {
                window.alert("Password cannot be empty");
                document.getElementById("password_2").focus();
                return false;
            }

            // phonenumber
            if (phonenumber.value == "") {
                window.alert("please enter your mobile number");
                document.getElementById("phonenumber").focus();
                return false;
            }
            //validating gender
            if (userrole.value == '') {
                window.alert("Please select userrole");
                document.getElementById("user_role").focus();
                return false;
            }
        }
    </script>
</body>

</html>
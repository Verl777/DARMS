 <?php include "includes/db.php"; ?><!--//takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement. -->
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Registration Form</title>
    <link rel="stylesheet" href="style1.css">
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
                        <input type="text" name="fullname" id="fullname" placeholder="Enter your name">
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
                            <option value="">Role</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="doctor">Doctor</option>
                            <option value="therapist">Therapist</option>
                        </select>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Gender:</span>

                    <select class="gender" name="gender" id="gender" style="width: 47%;height:45px;">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Status:</span>

                    <select class="status" name="status" id="user_status" style="width: 47%;height:45px;">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="button">
                    <button type="submit" name="register" style="height:30px ;width:80px;font-weight:bold;background:#6BC3F9;margin-left:300px;border-radius:8px;">Register</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateform() {
            //Email validation
            var email = document.getElementById("email");// method returns an element with a specified email
            var fullname = document.getElementById("fullname");//method returns an element with a specified fullname
            var phonenumber = document.getElementById("phonenumber");// method returns an element with a specified value phonenumber
            var username = document.getElementById("username");// method returns an element with a specified username
            var password = document.getElementById("password_1");//method returns an element with a specified psddword
            var confirmpassword = document.getElementById("password_2");
            var gender = document.getElementById("gender");
            var userrole = document.getElementById("user_role");
            var userstatus = document.getElementById("user_status");




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
            //indexof () method returns the first index at which a given element can be found in the array, or -1 if it is not present.
            if (email.value.length == 0 || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
                alert("Please include an @ and . in  your email address");
                document.getElementById("email").focus();
                return false;
            }
            //Password
            // ([]-Match anything that’s contained inside the bracket)
            //?! positive lookahead
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
            //validate gender
            if (gender.value == "") {
                window.alert("please enter select your gender");
                document.getElementById("gender").focus();
                return false;
            }
            //validate userrole
            if (userrole.value == "") {
                window.alert("Userrole cannot be empty");
                document.getElementById("user_role").focus();
                return false;
            }
            //validation userstatus
            if (userstatus.value == "") {
                window.alert("please select your status");
                document.getElementById("user_status").focus();
                return false;
            }
        }
    </script>
</body>

</html>
<?php include "../includes/db.php"; ?>
<?php include "../includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registration Form</title>
    <link rel="stylesheet" href="../style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">DARMS Registration</div>
        <div class="content">
            <!-- <form action="signup.php" method="post" onsubmit="return validateform()"> -->
            <form name="myform" method="post" action="edit_users.php" onsubmit="return validateform()">
            <?php
            // session_start();
            if (isset($_GET['edit'])) {
                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                $user_id = $_GET['edit'];
                $query = "SELECT * FROM users WHERE user_id = $user_id ";
                $select_user_id = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($select_user_id)) {
                    $user_id = $row['user_id'];
                    $fullname = $row['fullname'];
                    $user_name = $row['user_name'];
                    $user_mobile = $row['user_mobile'];
                    $user_email = $row['user_email'];
                    $user_password = $row['user_password'];
                    // $createdat = $row['createdat'];
                    $user_role = $row['user_role'];
                    $gender = $row['gender'];
                    $status = $row['status'];
                    $_SESSION['users'] = $user_id;
                   // echo var_dump($_SESSION['patient']);
            ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" value="<?php if (isset($fullname)) {
                                                    echo $fullname;
                                                } ?>" name="fullname" id="fullname" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" value="<?php if (isset($user_name)) {
                                                    echo $user_name;
                                                } ?>" name="username" id="username" placeholder="Enter your username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php if (isset($user_mobile)) {
                                                    echo $user_mobile;
                                                } ?>" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" value="<?php if (isset($user_email)) {
                                                    echo $user_email;
                                                } ?>" name="phonenumber" id="phonenumber" placeholder="Enter your number">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" value="<?php if (isset($user_password)) {
                                                    echo $user_password;
                                                } ?>" name="password_1" id="password_1" placeholder="Enter your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="password_2" id="password_2" placeholder="Confirm your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Userrole :</span>

                        <select class="user_role" value="<?php if (isset($user_role)) {
                                                    echo $user_role;
                                                } ?>" name="user_role" id="user_role">
                            <option value="">Role</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="doctor">Doctor</option>
                            <option value="therapist">Therapist</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                </div>
                <div class="gender-details">
                    <span class="gender-title">Gender:</span>

                    <!-- <div class="category">
                        <label for="gender">
                            <input type="radio" name="gender" id="gender">Male</input>
                        </label>
                        <label for="gender">
                            <input type="radio" name="gender" id="gender">Female</input>
                        </label>
                    </div> -->
                    <select class="gender" value="<?php if (isset($gender)) {
                                                    echo $gender;
                                                } ?>" name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Status:</span>

                    <select class="status" value="<?php if (isset($status)) {
                                                    echo $status;
                                                } ?>" name="status" id="user_status">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <?php }
            } ?>
                <div class="button">
                <button type="submit" name="update_user" class="registerbtn">Update</button>
                </div>
                <?php
            // $cat_id = isset($_GET['edit']) ? $_GET['edit'] : '';
            // if (isset($_SESSION['patient'])) {

            if (isset($_POST['update_user'])) {
                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                $fullname = $_POST['fullname'];
                $user_name = $_POST['username'];
                $user_mobile = $_POST['phonenumber'];
                $user_email = $_POST['email'];
                $user_password = $_POST['password_1'];
                $user_role = $_POST['userrole'];
                $gender = $_POST['gender'];
                $status = $row['status'];
                $query = "UPDATE users SET fullname = '{$fullname}',  user_name = '{$user_name}', user_mobile = '{$user_mobile}',
                             user_email = '{$user_email}', user_password = '{$user_password}', user_role = '{$user_role}', gender = '{$gender}', createdat = now() WHERE user_id = {$_SESSION['users']} ";
                $update_query = mysqli_query($db, $query);
                if (!$update_query) {
                    die("QUERY FAILED" . mysqli_error($db));
                }
                header('location: users.php');
            }
            // }
            ?>
            </form>
        </div>
    </div>
    <script>
        // function validateform() {
        //     //Email validation
        //     var email = document.getElementById("email");
        //     var fullname = document.getElementById("fullname");
        //     var phonenumber = document.getElementById("phonenumber");
        //     var username = document.getElementById("username");
        //     var password = document.getElementById("password_1");
        //     var confirmpassword = document.getElementById("password_2");
        //     var gender = document.getElementById("gender");
        //     var userrole = document.getElementById("user_role");
        //     var userstatus = document.getElementById("user_status");




        //     if (fullname.value == "") {
        //         window.alert("Fullnames cannot be empty");
        //         document.getElementById("fullname").focus();
        //         return false;

        //     }
        //     //Validating full names
        //     if (fullname.value == "") {
        //         window.alert("Fullnames cannot be empty");
        //         document.getElementById("fullname").focus();
        //         return false;
        //     }

        //     //Username validation
        //     if (username.value == "") {
        //         window.alert("Please enter your username");
        //         document.getElementById("username").focus();
        //         return false;
        //     }


        //     //Email validation
        //     if (email.value == "") {
        //         window.alert("Email cannot be empty");
        //         document.getElementById("email").focus();
        //         return false;
        //     }
        //     if (email.value.length == 0 || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
        //         alert("Please include an @ and . in  your email address");
        //         document.getElementById("email").focus();
        //         return false;
        //     }
        //     //Password
        //     var Chars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        //     if (password.value == "" || !Chars.test(password.value)) {
        //         window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        //         document.getElementById("password_1").focus();
        //         return false;
        //     }
        //     //Confirmation ofpassword_1
        //     if (confirmpassword.value !== password_1.value) {
        //         window.alert("Password details do not match to Password_1.");
        //         document.getElementById("password_2").focus();
        //         return false;
        //     }
        //     if (confirmpassword.value == '') {
        //         window.alert("Password cannot be empty");
        //         document.getElementById("password_2").focus();
        //         return false;
        //     }

        //     // phonenumber
        //     if (phonenumber.value == "") {
        //         window.alert("please enter your mobile number");
        //         document.getElementById("phonenumber").focus();
        //         return false;
        //     }
        //     //validate gender
        //     if (gender.value == "") {
        //         window.alert("please enter select your gender");
        //         document.getElementById("gender").focus();
        //         return false;
        //     }
        //     //validate userrole
        //     if (userrole.value == "") {
        //         window.alert("Userrole cannot be empty");
        //         document.getElementById("user_role").focus();
        //         return false;
        //     }
        //     //validation userstatus
        //     if (userstatus.value == "") {
        //         window.alert("please select your status");
        //         document.getElementById("user_status").focus();
        //         return false;
        //     }
        // }
    </script>
</body>

</html>
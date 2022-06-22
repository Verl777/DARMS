<?php

$db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password Reset</title>
    <style>
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;

        }

        button[type=submit] {
            width: 20%;
            margin-left: 4500px;
            background-color: #5F54BA;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;

        }

        button[type=submit]:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
        }
        .back{
            background-color: #A9A1EF;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <form method="post" action="resetpsw.php" onsubmit="return validateform()">
        <button onclick="history.back()" class="back">Go Back to Landing page</button>
        <h1>Password Reset</h1>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" placeholder="Enter new password">
        <label for="confirmpassword">Confirm password</label>
        <input type="text" name="confirm" id="confirm" placeholder="Confirm password">
        <button type="submit" name="submit" value="submit">Submit</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        $hash = md5($password);
        $sql = "SELECT * FROM users WHERE user_email = '$email'"; //select all columns and rows where the column username in the table uders matches with the value stored in $username
        $result = mysqli_query($db, $sql); //execute the query


        if (mysqli_num_rows($result) > 0) { //check if the rows with result of the query executed are greater than 0


            while ($row = mysqli_fetch_assoc($result)) { //fetch the result as an associative array  and store the result in variable $row and loop through the result


                if (mysqli_query($db, "UPDATE users SET `user_password`= '$hash' WHERE `user_email` = '$email' ")) {
                    echo "<script>alert('Password reset successfully!');</script>";
                } else {
                    echo "<script>alert('Password did not reset!');</script>";
                }
            }
        } else {
            echo "<script>alert('Email does not exist!');</script>";
        }
    }
    ?>
    <script>
        function validateform() {
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var confirmpassword = document.getElementById("confirm");


            //Email validation
            if (email.value == "") {
                window.alert("Email cannot be empty");
                document.getElementById("email").focus();
                return false;
            }
        
            //indexof () method returns the first index at which a given element can be found in the array, or -1 if it is not presen
            if (email.value.length == 0 || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
                alert("Please include an @ and . in  your email address");
                document.getElementById("email").focus();
                return false;
            }
            //Password validation
            // ([]-Match anything that’s contained inside the bracket)
            //?! positive lookahead
            if (confirmpassword.value == '') {
                window.alert("Password cannot be empty");
                document.getElementById("password").focus();
                return false;
            }
            var Chars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            if (password.value == "" || !Chars.test(password.value)) {
                window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
                document.getElementById("password").focus();
                return false;
            }
            //Confirmation ofpassword_1
            if (confirmpassword.value !== password_1.value) {
                window.alert("Password details do not match to Password_1.");
                document.getElementById("confirm").focus();
                return false;
            }
            if (confirmpassword.value == '') {
                window.alert(" Confirm Password cannot be empty");
                document.getElementById("confirm").focus();
                return false;
            }

        }
    </script>

</body>

</html>
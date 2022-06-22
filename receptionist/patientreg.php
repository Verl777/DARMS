<?php include "includes/receptionist_functions.php"; ?>
<html>

<head>
    <title>User registration form</title>
    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: #02353B;
            border: 2px solid black;
            border-radius: 10px;
            margin: 50px;
            background-image: url();
        }

        .container {
            padding: 50px;
            background-color: darkcyan;
        }

        input[type=text],
        input[type=password],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus {
            background-color: rgb(0, 255, 255);
            outline: none;
        }

        .registerbtn {
            background-color: #3779f5;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 10%;
            margin-left: 500px;
            font-size: 20px;
            border-radius: 10px;
            display: flex;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
            color: blue;
        }

        .back {
            background: linear-gradient(#202221, #035597);
            border: 2px solid #28cea4;
            color: rgba(240, 229, 229, 0.932);
            padding: 10px;
            font-weight: bold;
            font-size: 15px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <button onclick="history.back()" class="back">Go Back</button>
        <h1 style="text-align:center;">Patient Registration Form</h1>
        <form action="patientreg.php" method="post" onsubmit="return validatepatient()">
            <label> <b>Name</b></label>
            <input type="text" name="name" id="name" placeholder="name" />
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email">
            <label>
                <b>Mobile : </b>
            </label>
            <input type="text" name="phone" placeholder="phone no." id="mobile" />
            <!-- <label> <label for="weight">Weight in KG:</label>
                <input type="text" name="weight"> -->
            <b>Gender : </b>
            </label><br>
            <input type="radio" value="Male" name="gender"> Male
            <input type="radio" value="Female" name="gender"> Female<br>
            <label for="birthday"><b>Date of birth:</b></label>
            <input type="text" id="birthday" name="birthday"><br>
            <b>Guardian Name :</b>
            <input type="text" name="guardian" placeholder="Guardian Name" />
            <b>Current Address :</b>
            <input type="text" name="address" placeholder="Current Address" />
            <button type="submit" name="create_patient" class="registerbtn">Register</button>
        </form>
    </div>
    <script>
        function validatepatient() {
            var email = document.getElementById("email");
            var name = document.getElementById("name");
            var dob = document.getElementById("birthday");
            var mobile = document.getElementById("mobile");




            //validate patient name
            if (name.value == "") {
                window.alert("Patient names cannot be empty");
                document.getElementById("name").focus();
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
            if (dob.value == "") {
                window.alert("DOB cannot be empty");
                document.getElementById("birthday").focus();
                return false;
            }
            var today = new Date(); //Todays Date
            var givendt = new Date(); //variable for getting the entered date
            //The function setFullYear Set the year (optionally also month and day yyyy,mm,dd)
            //Comparing the dates
            //check if the given date is greater than today's date
            if (givendt > today) {
                alert("Date of Birth cannot be greater than today");
                document.getElementById("birthday").focus();
                return false;
            }
            //check if the mobile number is empty
            if (mobile.value == "") {
                window.alert("Mobile number cannot be empty");
                document.getElementById("birthday").focus();
                return false;
            }
            
        }
    </script>
</body>

</html>
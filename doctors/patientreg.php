<?php include "includes/receptionist_functions.php"; ?>
<html>

<head>
    <title>User registration form</title>
    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: rgb(26, 164, 245);
        }

        .container {
            padding: 50px;
            background-color: lightblue;
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

        input[type=text]:focus,
        input[type=password]:focus {
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
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Patient Registration Form</h1>
        <form action="patientreg.php" method="post">
            <label> <b>Name</b></label>
            <input type="text" name="name" placeholder="name" size="15" />
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email">
            <label>
                <b>Mobile : </b>
            </label>
            <input type="text" name="phone" placeholder="phone no." size="10" />
            <label>
                <b>Gender : </b>
            </label><br>
            <input type="radio" value="Male" name="gender" checked> Male
            <input type="radio" value="Female" name="gender"> Female
            <input type="radio" value="Other" name="gender"> Other<br />
            <label for="birthday"><b>Date of birth:</b></label>
            <input type="date" id="birthday" name="birthday"><br>
            <b>Guardian Name :</b>
            <input type="text" name="guardian" placeholder="Current Address" />
            <b>Current Address :</b>
            <input type="text" name="address" placeholder="Current Address" />
            <button type="submit" name="create_patient" class="registerbtn">Register</button>
        </form>
    </div>
</body>

</html>
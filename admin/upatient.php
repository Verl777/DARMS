<?php include "includes/admin_functions.php"; ?>
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
        <h1 style="text-align:center;">Unknown Patient Registration Form</h1>
        <form action="upatient.php" method="post" onsubmit="return isOverTwelve()">
            <label> <b>Name</b></label>
            <input type="text" name="name" placeholder="name" size="15" />
            <b>Gender : </b>
            </label><br>
            <input type="radio" value="Male" name="gender"> Male
            <input type="radio" value="Female" name="gender"> Female<br>
            <label for="date"><b>Date:</b></label>
            <input type="text" id="date" name="regdate" value="<?php $date = date('d/m/y');
                                                                echo $date; ?>"><br>
            <button type="submit" name="create_patient" class="registerbtn">Register</button>
        </form>
    </div>
</body>

</html>
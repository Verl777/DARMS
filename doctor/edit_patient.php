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
        <h1 style="text-align:center;">Patient Update Form</h1>
        <form action="edit_patient.php" method="post">
            <?php
            session_start();
            if (isset($_GET['edit'])) {
                $db = mysqli_connect('localhost', 'root', '', 'darms');
                $patient_id = $_GET['edit'];
                $query = "SELECT * FROM patient WHERE patient_id = $patient_id ";
                $select_patient_id = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($select_patient_id)) {
                    $patient_id = $row['patient_id'];
                    $patient_name = $row['patient_name'];
                    $patient_email = $row['patient_email'];
                    $patient_mobile = $row['patient_mobile'];
                    $patient_gender = $row['patient_gender'];
                    $Date_of_birth = $row['Date_of_birth'];
                    $guardian = $row['guardian'];
                    $patient_address = $row['patient_address'];
                    // $createdat = $row['createdat'];
                    $_SESSION['patient'] = $patient_id;
                   // echo var_dump($_SESSION['patient']);
            ?>
                    <label> <b>Name</b></label>
                    <input type="text" value="<?php if (isset($patient_name)) {
                                                    echo $patient_name;
                                                } ?>" name="name" placeholder="name" size="15" />
                    <label for="email"><b>Email</b></label>
                    <input type="text" value="<?php if (isset($patient_email)) {
                                                    echo $patient_email;
                                                } ?>" placeholder="Enter Email" name="email">
                    <label>
                        <b>Mobile : </b>
                    </label>
                    <input type="text" value="<?php if (isset($patient_mobile)) {
                                                    echo $patient_mobile;
                                                } ?>" name="phone" placeholder="phone no." size="10" />
                    <label>
                        <b>Gender : </b>
                    </label><br>
                    <input type="radio" value="Male" name="gender" checked> Male
                    <input type="radio" value="Female" name="gender"> Female
                    <input type="radio" value="Other" name="gender"> Other<br />
                    <label for="birthday"><b>Date of birth:</b></label>
                    <input type="date" id="birthday" value="<?php if (isset($Date_of_birth)) {
                                                                echo $Date_of_birth;
                                                            } ?>" name="birthday"><br>
                    <b>Guardian Name :</b>
                    <input type="text" value="<?php if (isset($guardian)) {
                                                    echo $guardian;
                                                } ?>" name="guardian" placeholder="Current Address" value="address" />
                    <b>Current Address :</b>
                    <input type="text" value="<?php if (isset($patient_address)) {
                                                    echo $patient_address;
                                                } ?>" name="address" placeholder="Current Address" value="address" />
            <?php }
            } ?>
            <button type="submit" name="update_patient" class="registerbtn">Update</button>
            <?php
            // $cat_id = isset($_GET['edit']) ? $_GET['edit'] : '';
            // if (isset($_SESSION['patient'])) {

            if (isset($_POST['update_patient'])) {
                $db = mysqli_connect('localhost', 'root', '', 'darms');
                $patient_name = $_POST['name'];
                $patient_email = $_POST['email'];
                $patient_mobile = $_POST['phone'];
                $patient_gender = $_POST['gender'];
                $Date_of_birth = $_POST['birthday'];
                $guardian = $_POST['guardian'];
                $patient_address = $_POST['address'];
                $query = "UPDATE patient SET patient_name = '{$patient_name}',  patient_email = '{$patient_email}', patient_mobile = '{$patient_mobile}',
                             patient_gender = '{$patient_gender}', Date_of_birth = '{$Date_of_birth}', guardian = '{$guardian}', patient_address = '{$patient_address}', createdat = now() WHERE patient_id = {$_SESSION['patient']} ";
                $update_query = mysqli_query($db, $query);
                if (!$update_query) {
                    die("QUERY FAILED" . mysqli_error($db));
                }
                header('location: patients.php');
            }
            // }
            ?>
        </form>
    </div>
</body>

</html>
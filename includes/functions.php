<?php

// starting the session
// can be able to store values into session and use them globally
session_start();

// connect to database
$db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');

// variable declaration
$email    = "";
$username = "";
//check functions of arrays in php
$errors   = array();


// call the register() function if register_btn is clicked
//isset function  takes any variable you want to use and checks to see if it has been set. 
if (isset($_POST['register'])) {
    register();
}

// REGISTER USER
function register()
{
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $email, $username;

    // receive all input values from the form
    // defined below to escape form values
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $user_role = $_POST['user_role'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    // form validation: ensure that the form is correctly filled
    if (empty($fullname)) {
        array_push($errors, "Fullname is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($phone_number)) {
        array_push($errors, "Phonenumber is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($user_role)) {
        array_push($errors, "Userrole is required");
    }
    if (empty($gender)) {
        array_push($errors, "Gender is required");
    }
    if (empty($status)) {
        array_push($errors, "Status is required");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        // insert receptionist
        if ($user_role == "receptionist") {
            $query = "INSERT INTO users (fullname,user_name,user_mobile,user_email,user_password,createdat,user_role,gender,status) 
			VALUES('$fullname', '$username','$phone_number','$email','$password',now(),'$user_role','$gender','$status')";
            mysqli_query($db, $query);//performs a query against a database

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);//returns the id  from the last query.

            $_SESSION['user'] = getReceptionistById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You have successfully logged in as a receptionist!";
            header('location: receptionist/dashboard.php');//sends a raw HTTP header to a client.
        }
      
        // insert doctor
        if ($user_role == "doctor") {
            $query = "INSERT INTO users (fullname,user_name,user_mobile,user_email,user_password,createdat,user_role,gender,status) 
			VALUES('$fullname', '$username','$phone_number','$email','$password',now(),'$user_role','$gender','$status')";
            mysqli_query($db, $query);//performs a query against a database

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);//returns the id  from the last query.

            $_SESSION['user'] = getDoctorById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You have successfully logged in as a doctor!";
            header('location: doctor/dashboard.php');//sends a raw HTTP header to a client.
        }
        // inserting the therapist
        if ($user_role == "therapist") {
            $query = "INSERT INTO users (fullname,user_name,user_mobile,user_email,user_password,createdat,user_role,gender,status) 
			VALUES('$fullname', '$username','$phone_number','$email','$password',now(),'$user_role','$gender','$status')";
            mysqli_query($db, $query);//performs a query against a database

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);//returns the id  from the last query.

            $_SESSION['user'] = getTherapistById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You have successfully logged in as a therapist!";
            header('location: therapist/dashboard.php');//sends a raw HTTP header to a client.
        }
    }
}

// return user array from their id
// get userby  id
function getReceptionistById($id)
{
    global $db;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($db, $query);//performs a query against a database

    $user = mysqli_fetch_assoc($result);//fetches a result row as an associative array.
    return $user;
}

//get doctor by id
function getDoctorById($id)
{
    global $db;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($db, $query);//performs a query against a database

    $user = mysqli_fetch_assoc($result);//fetches a result row as an associative array.
    return $user;
}
//get  therapist by id
function getTherapistById($id)
{
    global $db;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($db, $query);//performs a query against a database

    $user = mysqli_fetch_assoc($result);//fetches a result row as an associative array.
    return $user;
}

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error" style="color:#DB1120;font-weight:bold;">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}
// check if user has logged in
// one way to reinforce more security for authentication processes
function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
// logout user function
// log user out if logout button clicked
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: index.php");//sends a raw HTTP header to a client.
}
// call the login() function if register_btn is clicked
if (isset($_POST['submit'])) {
    login();
}

// LOGIN USER
function login()
{
    global $db, $username, $errors;

    // grap form values
    // escape function filters data to be inserted securely inside the db
    $username = e($_POST['username']);
    $password = e($_POST['password']);
    $user_role = e($_POST['user_type']);

    // make sure form is filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($user_role)) {
        array_push($errors, "Role is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);
        // login admin
        if ($user_role == "admin") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in as an Administrator!";
                header('location: admin/dashboard.php');//sends a raw HTTP header to a client.
            } else {
                array_push($errors, "Wrong username/password combination or you may not be a registered user!");
            }
        }
        // login receptionist
        if ($user_role == "receptionist") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "Successfully logged in as a receptionist!";
                header('location: receptionist/dashboard.php');//sends a raw HTTP header to a client.
            } else {
                array_push($errors, "Wrong username/password combination or you may not be a registered user!");
            }
        }
       
        // login doctor
        if ($user_role == "doctor") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are successfully logged in!";
                header('location: doctor/dashboard.php');//sends a raw HTTP header to a client.
            } else {
                array_push($errors, "Wrong username/password combination or you may not be a registered user!");
            }
        }
        // login therapist
        if ($user_role == "therapist") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: therapist/dashboard.php');//sends a raw HTTP header to a client.
            } else {
                array_push($errors, "Wrong username/password combination or you may not be a registered user!");
            }
        }
    }
}
function isReceptionist()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_role'] == 'receptionist') {
        return true;
    } else {
        return false;
    }
}
function isNurse()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_role'] == 'nurse') {
        return true;
    } else {
        return false;
    }
}
function isTherapist()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_role'] == 'therapist') {
        return true;
    } else {
        return false;
    }
}

function isDoctor()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_role'] == 'doctor') {
        return true;
    } else {
        return false;
    }
}
function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_role'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

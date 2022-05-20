<?php
// include('db.php');
$username = "";
$email = "";
$errors = array();


if (isset($_POST['register'])) {
    register();
}
function register()
{
    $connection = mysqli_connect('localhost', 'root', '', 'darms');
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $user_role = $_POST['user_role'];
    $gender = $_POST['gender'];

    // validation 

    if (empty($fullname)) {
        array_push($errors, "Fullname required");
    }

    if (empty($username)) {
        array_push($errors, "Username required");
    }

    if (empty($email)) {
        array_push($errors, "Email required");
    }

    if (empty($phone_number)) {
        array_push($errors, "Mobile required");
    }

    if (empty($password_1)) {
        array_push($errors, "Password required");
    }

    if (empty($password_1 != $password_2)) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($user_role)) {
        array_push($errors, "Role required");
    }
    if (empty($gender)) {
        array_push($errors, "Gender required");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        // global $connection;
        $password = md5($password_1); //encrypt the password before saving in the database
        // insert receptionist
        if ($user_role == "receptionist") {
            $query = "INSERT INTO users (fullname, user_name, user_mobile, user_email, user_password, createdat, user_role, gender) 
        VALUES('$fullname', '$username', '$phone_number', '$email', '$password', now(), '$user_role', '$gender')";
            mysqli_query($connection, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($connection);

            $_SESSION['user'] = getReceptionistById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: receptionist/dashboard.php');
        }
        // insert doctor
        if ($user_role == "doctor") {
            $query = "INSERT INTO users (fullname, user_name, user_mobile, user_email, user_password, createdat, user_role, gender) 
        VALUES('$fullname', '$username', '$phone_number', '$email', '$password', now(), '$user_role', '$gender')";
            mysqli_query($connection, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($connection);

            $_SESSION['user'] = getDoctorById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: doctors/dashboard.php');
        }
        // insert therapist
        if ($user_role == "therapist") {
            $query = "INSERT INTO users (fullname, user_name, user_mobile, user_email, user_password, createdat, user_role, gender) 
        VALUES('$fullname', '$username', '$phone_number', '$email', '$password', now(), '$user_role', '$gender')";
            mysqli_query($connection, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($connection);

            $_SESSION['user'] = getTherapistById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: therapist/dashboard.php');
        }
        if ($user_role == "nurse") {
            $query = "INSERT INTO users (fullname, user_name, user_mobile, user_email, user_password, createdat, user_role, gender) 
            VALUES('$fullname', '$username', '$phone_number', '$email', '$password', now(), '$user_role', '$gender')";
            mysqli_query($connection, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($connection);

            $_SESSION['user'] = getNurseById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: nurse/dashboard.php');
        }
    }
}

// return user array from their id
// get receptionist id
function getReceptionistById($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
// get doctor id
function getDoctorById($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
// get therapist id
function getTherapistById($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}


function getNurseById($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=" . $id;
    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// escape string
function e($val)
{
    global $connection;
    return mysqli_real_escape_string($connection, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
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
    header("location: index.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['submit'])) {
    login();
}

// LOGIN USER
function login()
{
    global $connection, $username, $errors;

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
        // // login admin
        // $query = "SELECT * FROM admin WHERE user_name='$username' AND password='$password' LIMIT 1";
        // $results = mysqli_query($connection, $query);
        // if (mysqli_num_rows($results) == 1) {
        //     $logged_in_user = mysqli_fetch_assoc($results);
        //     $_SESSION['user'] = $logged_in_user;
        //     $_SESSION['success']  = "You are now logged in";
        //     header('location: admin/dashboard.php');
        // } else {
        //     array_push($errors, "Wrong email/password combination");
        // }
        // login receptionist
        if ($user_role == "receptionist") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: receptionist/dashboard.php');
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        }
        // login doctor
        if ($user_role == "doctor") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: doctor/dashboard.php');
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        }
        // login therapist
        if ($user_role == "therapist") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: therapist/dashboard.php');
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        }
        //login nurse
        if ($user_role == "nurse") {
            $query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password' LIMIT 1";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: nurse/dashboard.php');
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        }
    }
}
function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

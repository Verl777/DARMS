<?php
global $db;
// initialize variable array to store form errors
$errors = array();
// instatiate a methode to call add patient function
if (isset($_POST['create_patient'])) {
    addpat();
}
// function to doctor timing details
function addpat()
{
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $date = mysqli_real_escape_string($connection, $_POST['regdate']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
   

    // validation 
    if (empty($name)) {
        array_push($errors, "name id required");
    }

    if (empty($date)) {
        array_push($errors, "date required");
    }

    if (empty($gender)) {
        array_push($errors, "gender required");
    }



    // register timing if there are no errors in the form
    if (count($errors) == 0) {
        //  global $connection;
        // insert into  timing
        $query = "INSERT INTO unknown_patient (pname, udate, gender) 
        VALUES('$name', '$date', '$gender')";
        mysqli_query($connection, $query);

        header('location: upatient.php');
    }
}

// delete user details
if (isset($_GET['delete'])) {
    $user = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$user} ";
    $delete_query = mysqli_query($db, $query);
     header("Location:users.php");
}

// // delete appointment details
if (isset($_GET['delete'])) {
    $appointment = $_GET['delete'];
    $query = "DELETE FROM appointment WHERE appointment_id = {$appointment} ";
    $delete_query = mysqli_query($db, $query);
    header("Location: appointments.php");
}

// // delete patient details
// if (isset($_GET['delete'])) {
//     $prescription = $_GET['delete'];
//     $query = "DELETE FROM prescription WHERE pid = {$prescription} ";
//     $delete_query = mysqli_query($db, $query);
//     // header("Location: prescription.php");
// }

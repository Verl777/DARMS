<?php
// initialize variable array to store form errors
$errors = array();
// instatiate a methode to call add patient function
if (isset($_POST['create_patient'])) {
    addPatient();
}
// function to add patient
function addPatient()
{
    $connection = mysqli_connect('localhost', 'root', '', 'darms');
    $patient_name = $_POST['name'];
    $patient_email = $_POST['email'];
    $patient_mobile = $_POST['phone'];
    $patient_gender = $_POST['gender'];
    $Date_of_birth = $_POST['birthday'];
    $guardian = $_POST['guardian'];
    $patient_address = $_POST['address'];

    // validation 

    if (empty($patient_name)) {
        array_push($errors, "patient_name required");
    }

    if (empty($patient_email)) {
        array_push($errors, "patient_email required");
    }

    if (empty($patient_mobile)) {
        array_push($errors, "patient_mobile required");
    }

    if (empty($patient_gender)) {
        array_push($errors, "patient_gender required");
    }

    if (empty($Date_of_birth)) {
        array_push($errors, "Date_of_birth required");
    }

    if (empty($guardian)) {
        array_push($errors, "guardian required");
    }
    if (empty($patient_address)) {
        array_push($errors, "patient_address required");
    }


    // register patient if there are no errors in the form
    if (count($errors) == 0) {
        // global $connection;
        // insert patient
        $query = "INSERT INTO patient (patient_name, patient_email, patient_mobile, patient_gender, Date_of_birth, guardian, patient_address, createdat) 
        VALUES('$patient_name', '$patient_email', '$patient_mobile', '$patient_gender', '$Date_of_birth', '$guardian', '$patient_address', now())";
        mysqli_query($connection, $query);

        header('location: patients.php');
    }
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
//booking appointments
if (isset($_POST['confirm'])) {
    confirm();
}
function confirm()
{
    $connection = mysqli_connect('localhost', 'root', '', 'darms');
    $nurse_id =mysqli_real_escape_string($connection, $_POST['selectnurse']);
    $patient_id = mysqli_real_escape_string($connection, $_POST['selectpatient']);
    $appointment_date = mysqli_real_escape_string($connection, $_POST['date']);
    $appointment_time = mysqli_real_escape_string($connection, $_POST['time']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);

    // validation 
    if (empty($nurse_id)) {
        array_push($errors, "nurse_id required");
    }

    if (empty($patient_id)) {
        array_push($errors, "patient_id required");
    }

    if (empty($appointment_date)) {
        array_push($errors, "appointment_date required");
    }

    if (empty($appointment_time)) {
        array_push($errors, "appointment_time required");
    }
    if (empty($contact)) {
        array_push($errors, "contact required");
    }


    // book appointment if there are no errors in the form
    
  	$sql = "INSERT INTO appointment (nurse_id,patient_id,contact, appointment_date,appointment_time,createdat) VALUES
       ('$nurse_id', '$patient_id','$contact', '$appointment_date','$appointment_time', now())";

       mysqli_query($connection, $sql);
}

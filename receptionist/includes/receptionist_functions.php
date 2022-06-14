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
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
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
    // validate date
    $todaysDate = (date('Y') - 12) . '/' . date('m/d');
    if (strtotime('/"', '-', $Date_of_birth) > strtotime('/"', '-', $todaysDate)) {
        // echo "$todaysDate, cannot choose from passed dates";
        array_push($errors, "cannot register less than 12 years");
        // $blnValidated = false;
    } else {
        // $date_validate = str_replace('/"', '-', $Date_of_birth);
        // $newDate = date("Y/m/d", strtotime($date_validate));
        // $today = date("Y" - 12);
        // // echo var_dump($today);

        // if ($newDate > $today) {
        //     array_push($errors, "cannot register less than 12 years");
        // }


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
}

function display_error_validate()
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
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $doctorid = mysqli_real_escape_string($connection, $_POST['selectdoctor']);
    $patientid = mysqli_real_escape_string($connection, $_POST['selectpatient']);
    $appointment_date = mysqli_real_escape_string($connection, $_POST['date']);
    $appointment_time = mysqli_real_escape_string($connection, $_POST['time']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);

    // validation 
    if (empty($doctorid)) {
        array_push($errors, "doctorid required");
    }

    if (empty($patientid)) {
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
    if (count($errors) == 0) {
        $sql = "INSERT INTO appointment (doctorid,patientid, appointment_date,appointment_time,createdat) 
    VALUES('$doctorid', '$patientid', '$appointment_date','$appointment_time', now())";
        mysqli_query($connection, $sql);

        header('location: appointments.php');
    }
}

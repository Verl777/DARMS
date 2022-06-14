<?php
// initialize variable array to store form errors
$errors = array();
// instatiate a methode to call add patient function
if (isset($_POST['timingsubmit'])) {
    addtime();
}
// function to doctor timing details
function addtime()
{
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $doctor_id = mysqli_real_escape_string($connection, $_POST['selectdoctor']);
    $start_time = mysqli_real_escape_string($connection, $_POST['starttime']);
    $end_time = mysqli_real_escape_string($connection, $_POST['endtime']);
    $dayavailable = mysqli_real_escape_string($connection, $_POST['day']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);

    // validation 
    if (empty($doctor_id)) {
        array_push($errors, "doctor id required");
    }

    if (empty($start_time)) {
        array_push($errors, "starttime required");
    }

    if (empty($end_time)) {
        array_push($errors, "endtime required");
    }

    if (empty($dayavailable)) {
        array_push($errors, "day required");
    }
    if (empty($status)) {
        array_push($errors, "status required");
    }


    // register timing if there are no errors in the form
    if (count($errors) == 0) {
        //  global $connection;
        // insert into  timing
        $query = "INSERT INTO timings (doctor_id, start_time, end_time, dayavailable,d_status) 
        VALUES('$doctor_id', '$start_time', '$end_time', '$dayavailable', '$status')";
        mysqli_query($connection, $query);

        header('location: timings.php');
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
//generating prescriptions for the patient
if (isset($_POST['prescriptionsubmit'])) {
    prescription();
}
function prescription()
{
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $patient_id = mysqli_real_escape_string($connection, $_POST['selectpatient']);
    $pdate = mysqli_real_escape_string($connection, $_POST['date']);
    $diagnosis = mysqli_real_escape_string($connection, $_POST['diagnosis']);
    $rehab = mysqli_real_escape_string($connection, $_POST['rehab']);
    $instructions = mysqli_real_escape_string($connection, $_POST['instructions']);

    // validation 
    if (empty($patient_id)) {
        array_push($errors, "patient id required");
    }

    if (empty($pdate)) {
        array_push($errors, "Date required");
    }

    if (empty($diagnosis)) {
        array_push($errors, "diagnosis required");
    }

    if (empty($rehab)) {
        array_push($errors, "rehab required");
    }
    if (empty($instructions)) {
        array_push($errors, "instructions required");
    }


    // book appointment if there are no errors in the form
    if (count($errors) == 0) {
        $sql = "INSERT INTO prescription (patient_id,pdate, diagnosis,rehab,instructions) 
    VALUES('$patient_id', '$pdate', '$diagnosis','$rehab', '$instructions')";
        mysqli_query($connection, $sql);

        header('location: prescription.php');
    }
}

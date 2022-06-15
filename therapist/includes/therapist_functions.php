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
    $therapist_id = mysqli_real_escape_string($connection, $_POST['selecttherapist']);
    $start_time = mysqli_real_escape_string($connection, $_POST['starttime']);
    $end_time = mysqli_real_escape_string($connection, $_POST['endtime']);
    $dayavailable = mysqli_real_escape_string($connection, $_POST['day']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);

    // validation 
    if (empty($therapist_id)) {
        array_push($errors, "therapist id required");
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
        $query = "INSERT INTO t_timings (therapist_id, start_time, end_time, dayavailable,status) 
        VALUES('$therapist_id', '$start_time', '$end_time', '$dayavailable', '$status')";
        mysqli_query($connection, $query);

        header('location: t_timings.php');
    }
}

if (isset($_POST['progresssubmit'])) {
    progress();
}
// function to progress details
function progress()
{
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $week = mysqli_real_escape_string($connection, $_POST['selectweek']);
    $fullname = mysqli_real_escape_string($connection, $_POST['selectpatient']);
    $pro_date = mysqli_real_escape_string($connection, $_POST['prodate']);
    $remaarks = mysqli_real_escape_string($connection, $_POST['remarks']);
    $comments = mysqli_real_escape_string($connection, $_POST['instructions']);

    // validation 
    if (empty($week)) {
        array_push($errors, "week id required");
    }
    if (empty($fullname)) {
        array_push($errors, "fullname id required");
    }

    if (empty($pro_date)) {
        array_push($errors, "pro_date required");
    }

    if (empty($end_time)) {
        array_push($errors, "endtime required");
    }

    if (empty($remaarks)) {
        array_push($errors, "remaarks required");
    }
    if (empty($comments)) {
        array_push($errors, "comments required");
    }


    // register progress if there are no errors in the form
    if (count($errors) == 0) {
        //  global $connection;
        // insert into  progress
        $query = "INSERT INTO progress (week,fullname, pro_date, remaarks, comments) 
        VALUES('$week','$fullname', '$pro_date', '$remaarks', '$comments')";
        mysqli_query($connection, $query);

        header('location: progress.php');
    }
}
// instatiate a methode to call add patient function
if (isset($_POST['activitysubmit'])) {
    addactivity();
}
// function to doctor timing details
function addactivity()
{
    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
    $name = mysqli_real_escape_string($connection, $_POST['selectpatient']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $activity = mysqli_real_escape_string($connection, $_POST['activity']);
    $instruct = mysqli_real_escape_string($connection, $_POST['instructions']);

    // validation 
    if (empty($name)) {
        array_push($errors, "name is required");
    }

    if (empty($date)) {
        array_push($errors, "Date is required");
    }

    if (empty($activity)) {
        array_push($errors, "activity is required");
    }

    if (empty($instruct)) {
        array_push($errors, "instructions required");
    }



    // register timing if there are no errors in the form
    if (count($errors) == 0) {
        //  global $connection;
        // insert into  timing
        $query = "INSERT INTO activity (p_name, a_date, activity, remarks) 
        VALUES('$name', '$date', '$activity', '$instruct')";
        mysqli_query($connection, $query);

        header('location: activity.php');
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

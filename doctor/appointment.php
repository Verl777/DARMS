<?php include "includes/receptionist_functions.php"; ?>
<html>

<head>
    <title>Appointment</title>
    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: gray;
        }

        h2 {
            text-align: center;
            font-size: 35px;
        }

        input[type=text],
        input[type=tel],
        input[type=date],
        input[type=time],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .select select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background-color: white;
            color: black;
        }

        .button {
            background-color: #3779f5;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            text-align: center;
        }

        .button:hover {
            opacity: 1;
            color: blue;
        }
    </style>
</head>

<body>
    <h2>Appointment Booking</h2>
    <form>
        <div class="form">
            <!---->
            <div class="select">
                <label>Select Patient</label>
                <select name="selectpatient" class="text-input">
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'darms');
                    $query = "SELECT * FROM patient";
                    $select_all_patients = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_patients)) {

                        $patient_id = $row['patient_id'];

                        $patient_name = $row['patient_name'];
                    ?>
                        <option value="<?php $patient_id; ?>"><?php echo $patient_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="contact">
                <label for="contact">
                    Contact
                </label>
                <div>
                    <input type="tel" id="contact" name="contact" placeholder="123">
                </div>
            </div>
            <!---->
            <div class="date">
                <label for="date">
                    Date
                </label>
                <div>
                    <input type="date" id="date" name="date">
                </div>
            </div>
            <div>
                <label for="appt">Time</label>
                <input type="text" id="appt" name="time">
            </div>
            <!---->
            <!--<div class="time">
                <label class="time">
                    Time
                </label>
                <div>
                    <input type="time" id="appt" name="appt">
                </div>
            </div>-->
            <!---->
            <div class="select">
                <label>Select Nurse</label>
                <select name="selectnurse" class="text-input">
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'darms');
                    $query = "SELECT * FROM users WHERE user_role='nurse' ";
                    $select_all_nurses = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_nurses)) {

                        $user_id = $row['user_id'];

                        $fullname = $row['fullname'];
                    ?>
                        <option value="<?php $user_id; ?>"><?php echo $fullname; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!---->
            <div class="button"><button type="submit" name="confirm" class="confirmbtn">Confirm</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php include "includes/receptionist_functions.php"; ?>
<html>

<head>
    <title>Appointment</title>
    <style>
        body {
            font-family: Calibri, Helvetica, sans-serif;
            background-color: darkcyan;
            margin: 30px;
            overflow-y: hidden;
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

        button {
            background: linear-gradient(#202221, #035597);
            color: white;
            padding: 16px 20px;
            margin: auto;
            border-radius: 10px;
            cursor: pointer;
            opacity: 0.9;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            opacity: 1;
            color: blue;
        }

        button .back {
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
    <button onclick="history.back()" class="back" style="margin-top:25px;">Go Back</button>
    <h2>Appointment Booking</h2>
    <form action="appointment.php" method="post" onsubmit="return checkDate()">
        <div class="form">
            <div class="select">
                <label>Select Patient</label>
                <select name="selectpatient" class="text-input">
                    <?php
                    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                    $query = "SELECT * FROM patient";
                    $select_all_patients = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_patients)) {

                        $patient_id = $row['patient_id'];

                        $patient_name = $row['patient_name'];
                    ?>
                        <option value="<?php echo $patient_id; ?>"><?php echo $patient_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- <div class="contact">
                <label for="contact">
                    Contact
                </label>
                <div>
                    <input type="tel" id="contact" name="contact" placeholder="123">
                </div>
            </div> -->
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
                <input type="time" id="appt" name="time">
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
                <label>Select Doctor</label>
                <select name="selectdoctor" class="text-input">
                    <?php
                    $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                    $query = "SELECT * FROM users WHERE user_role='doctor' ";
                    $select_all_nurses = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_nurses)) {

                        $user_id = $row['user_id'];

                        $fullname = $row['fullname'];
                        echo var_dump($user_id)
                    ?>
                        <option value="<?php echo $user_id; ?>"><?php echo $fullname; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!---->
            <button type="submit" name="confirm" class="confirmbtn">Confirm</button>
        </div>
    </form>
    <script>
        function checkDate() {
            var selectedText = document.getElementById('date').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            if (selectedDate < now) {
                alert("Date must be in the future");
                return false;
            }
        }
    </script>
</body>

</html>
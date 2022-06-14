<?php include "../receptionist/includes/receptionist_functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<?php include "includes/admin_functions.php"; ?>
<!-- content area -->
<div class="article">
    <style>
        #titleoftable {
            text-align: center;
            margin: auto;
        }

        #appointments {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #appointments td,
        #appointments th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #appointments tr:hover {
            background-color: #ddd;
        }

        #appointments th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #899499;
            color: white;
        }

        .edit {
            background: #10AFEF;
            color: #fff;
            padding: 5px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background: #E2031E;
            color: #fff;
            width: 50px;
            padding: 5px;
            text-decoration: none;
            border-radius: 5px;

        }
        button{
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        button a{
            text-decoration: none;
        }
    </style>
    <h1 id="titleoftable">Appointments</h1>
    <button><a href="../receptionist/appointment.php">Add Appointment</a></button>
    <table id="appointments">
        <thead>
            <th>OrderNo</th>
            <th>AppointmentId</th>
            <th>NurseId</th>
            <th>PatientId</th>
            <th>Appdate</th>
            <th>Apptime</th>
            <th>Createdat</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM appointment JOIN patient ON appointment.patientid=patient.patient_id";
            $select_all_appointments = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_appointments)) {
                $appointment_id = $row['appointment_id'];
                $doctorid = $row['doctorid'];
                $patient_id = $row['patient_name'];
                $appointment_date = $row['appointment_date'];
                $appointment_time = $row['appointment_time'];
                $createdat = $row['createdat'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$appointment_id}</td>";
                echo "<td>{$doctorid}</td>";
                echo "<td>{$patient_id}</td>";
                echo "<td>{$appointment_date}</td>";
                echo "<td>{$appointment_time}</td>";
                echo "<td>{$createdat}</td>";
                echo "<td><a class='edit' href='../receptionist/appointment.php?edit={$appointment_id}'>Update</a></td>";
                echo "<td><a class='delete' href='appointments.php?delete={$appointment_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
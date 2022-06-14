<?php include "includes/receptionist_functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
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
    </style>
    <h1 id="titleoftable">Appointments</h1>
    <table id="appointments">
        <thead>
            <th>OrderNo</th>
            <th>Patient Name</th>
            <th>Contact</th>
            <th>Date</th>
            <th>Time</th>
            <th>Nurse</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM appointment";
            $select_all_appointments = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_appointments)) {
                $appointment_id = $row['appointment_id'];
                $nurse_id = $row['nurse_id'];
                $patient_id = $row['patient_id'];
                $appointment_date = $row['appointment_date'];
                $appointment_time = $row['appointment_time'];
                $createdat = $row['createdat'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$appointment_id}</td>";
                echo "<td>{$nurse_id}</td>";
                echo "<td>{$patient_id}</td>";
                echo "<td>{$appointment_date}</td>";
                echo "<td>{$appointment_time}</td>";
                echo "<td>{$createdat}</td>";
                echo "<td><a class='edit' href='edit_patient.php?edit={$appointment_id}'>Edit</a></td>";
                echo "<td><a class='delete' href='patients.php?delete={$appointment_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // delete appointment details
    if (isset($_GET['delete'])) {
        $patient = $_GET['delete'];
        $query = "DELETE FROM appointment WHERE appointment_id = {$appointment} ";
        $delete_query = mysqli_query($db, $query);
        // header("Location: appointments.php");
    }

    ?>
</div>
<?php include "includes/footer.php"; ?>
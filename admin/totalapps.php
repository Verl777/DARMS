<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<?php
        if (isset($_POST['search_detail'])) {
            $data_searched = $_POST['search_data'];
            header("Location: filter_totalapps.php?searching=$data_searched");
        } ?>

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
    </style>
    <h1 id="titleoftable">Appointments Report</h1>
    <form method="post">
        <input type="text" name="search_data" />
        <input type="submit" name="search_detail" value="filter record" />
        <input type="button" onclick="windows.print()" value="print" />
    </form>

    <table id="appointments">
        <thead>
            <th>PatientID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM appointment JOIN patient ON appointment.patientid=patient.patient_id";
            $select_all_appointments = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_appointments)) {
                $patient= $row['patientid'];
                $name= $row['patient_name'];
                $date = $row['appointment_date'];
                $time = $row['appointment_time'];
                echo "<tr>";
                echo "<td>{$patient}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$date}</td>";
                echo "<td>{$time}</td>";
                // echo "<td><a class='edit' href='edit_patient.php?edit={$patient_id}'>Update</a></td>";
                // echo "<td><a class='delete' href='patients.php?delete={$patient_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
<?php include "includes/therapist_functions.php"; ?>
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

        #timings {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #timings td,
        #timings th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #timings tr:hover {
            background-color: #ddd;
        }

        #timings th {
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
    </style>
    <h1 id="titleoftable">Timings Available</h1>
    <table id="timings">
        <thead>
            <th>OrderNo</th>
            <th>ID</th>
            <th>Therapist</th>
            <th>From</th>
            <th>To</th>
            <th>Day</th>
            <th>Status</t>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM t_timings JOIN users ON t_timings.therapist_id=users.user_id";
            $select_all_timings = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_timings)) {
                $timing = $row['timing_id'];
                $therapist_id = $row['therapist_id'];
                $from = $row['start_time'];
                $to = $row['end_time'];
                $day = $row['dayavailable'];
                $status = $row['status'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$timing}</td>";
                echo "<td>{$therapist_id}</td>";
                echo "<td>{$from}</td>";
                echo "<td>{$to}</td>";
                echo "<td>{$day}</td>";
                echo "<td>{$status}</td>";
                echo "<td><a class='edit' href='edit_patient.php?edit={$timing}'>Update</a></td>";
                // echo "<td><a class='delete' href='patients.php?delete={$appointment_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // delete appointment details
    // if (isset($_GET['delete'])) {
    //     $patient = $_GET['delete'];
    //     $query = "DELETE FROM appointment WHERE appointment_id = {$appointment} ";
    //     $delete_query = mysqli_query($db, $query);
    //     header("Location: appointments.php");
    // }

    ?>
</div>
<?php include "includes/footer.php"; ?>
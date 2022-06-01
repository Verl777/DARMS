<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<!-- content area -->
<div class="article">
    <style>
        .schedule{
            background-color: #3498DB ;
            padding: 5px;
            margin-bottom: 5px;
            margin-left: 5px;
            border-radius: 10px;
            
        }
        .schedule a{
            text-decoration: none;
        }
        .schedule:hover{
            background-color: #515A5A ;
            color:#fff;
        }
        
        #titleoftable {
            text-align: center;
            margin: auto;
        }

        #schedules {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #schedules td,
        #schedules th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #schedules tr:hover {
            background-color: #ddd;
        }

        #schedules th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #899499;
            color: white;
        }
    </style>
    <h1 id="titleoftable">Nurse Schedules</h1>
    <button class="schedule"><a href="newschedule.php">New Schedule</a></button>
    <table id="schedules">
        <thead>
            <th>OrderNo</th>
            <th>Nurse_id</th>
            <th>Appointment_date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Date</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'darms');
            $query = "SELECT * FROM nurseschedule";
            $select_all_nurses = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_nurses)) {
                $nurse_id = $row['nurse_id'];
                $app_date = $row['app_date'];
                $app_time = $row['app_time'];
                $nurse_status = $row['nurse_status'];
                $createdat = $row['createdat'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$nurse_id}</td>";
                echo "<td>{$app_date}</td>";
                echo "<td>{$app_time}</td>";
                echo "<td>{$nurse_status}</td>";
                echo "<td>{$createdat}</td>";
                echo "<td><a class='edit' href='appointment.php?edit={$nurse_id}'>Update</a></td>";
                echo "<td><a class='delete' href='appointments.php?delete={$nurse_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // delete appointment details
    if (isset($_GET['delete'])) {
        $patient = $_GET['delete'];
        $query = "DELETE FROM nurseschedule WHERE nurse_id = {$nurseschedule} ";
        $delete_query = mysqli_query($db, $query);
        // header("Location: appointments.php");
    }

    ?>
</div>
<?php include "includes/footer.php"; ?>
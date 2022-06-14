<?php include "includes/doctor_functions.php"; ?>
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

        #patients {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #patients td,
        #patients th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #patients tr:hover {
            background-color: #ddd;
        }

        #patients th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #899499;
            color: white;
        }
        .edit{
            background:#10AFEF ;
            color: #fff;
            padding: 5px;
            text-decoration:none ;
            border-radius: 5px;
        }
    </style>
    <h1 id="titleoftable">Prescriptions</h1>
    <table id="patients">
        <thead>
            <th>OrderNo</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Instructions</th>
            <th>Rehab</th>
            <th>Instructions</th>
            <th colspan="1">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM prescription";
            $select_all_prescriptions = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_prescriptions)) {
                $patient_id = $row['patient_id'];
                $pdate = $row['pdate'];
                $diagnosis = $row['diagnosis'];
                $rehab = $row['rehab'];
                $instructions = $row['instructions'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$patient_id}</td>";
                echo "<td>{$pdate}</td>";
                echo "<td>{$diagnosis}</td>";
                echo "<td>{$rehab}</td>";
                echo "<td>{$instructions}</td>";
                echo "<td><a class='edit' href='editpres.php?edit={$patient_id}'>Update</a></td>";
                //echo "<td><a class='delete' href='patients.php?delete={$patient_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // delete patient details
    if (isset($_GET['delete'])) {
        $patient = $_GET['delete'];
        $query = "DELETE FROM prescription WHERE patient_id = {$patient} ";
        $delete_query = mysqli_query($db, $query);
        // header("Location: patients.php");
    }

    ?>
</div>
<?php include "includes/footer.php"; ?>
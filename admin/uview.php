<?php include "includes/admin_functions.php"; ?>
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
        .delete{
            background:#E3071E ;
            color: #fff;
            padding: 5px;
            text-decoration:none ;
            border-radius: 5px;
        }
    </style>
    <h1 id="titleoftable">Patients</h1>
    <table id="patients">
        <thead>
            <th>OrderNo</th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Date</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM unknown_patient";
            $select_all_patients = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_patients)) {
                $pname = $row['pname'];
                $udate = $row['udate'];
                $gender = $row['gender'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$pname}</td>";
                echo "<td>{$udate}</td>";
                echo "<td>{$gender}</td>";
                echo "<td><a class='edit' href='edit_patient.php?edit={$pname}'>Update</a></td>";
                echo "<td><a class='delete' href='patients.php?delete={$pname}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // // delete patient details
    // if (isset($_GET['delete'])) {
    //     $patient = $_GET['delete'];
    //     $query = "DELETE FROM patient WHERE patient_id = {$patient} ";
    //     $delete_query = mysqli_query($db, $query);
    //     // header("Location: patients.php");
    // }

    ?>
</div>
<?php include "includes/footer.php"; ?>
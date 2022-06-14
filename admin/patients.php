<?php include "../receptionist/includes/receptionist_functions.php"; ?>
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
            background:#E2031E ;
            color: #fff;
            width: 50px;
            padding: 5px;
            text-decoration:none ;
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
    <h1 id="titleoftable">Patients</h1>
    <button><a href="../receptionist/patientreg.php">Add Patient</a></button>
    <table id="patients">
        <thead>
            <th>OrderNo</th>
            <th>Patient Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Gurdian</th>
            <th>Address</th>
            <th>Date Registered</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM patient";
            $select_all_patients = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_patients)) {
                $patient_id = $row['patient_id'];
                $patient_name = $row['patient_name'];
                $patient_email = $row['patient_email'];
                $patient_mobile = $row['patient_mobile'];
                $patient_gender = $row['patient_gender'];
                $Date_of_birth = $row['Date_of_birth'];
                $guardian = $row['guardian'];
                $patient_address = $row['patient_address'];
                $createdat = $row['createdat'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$patient_name}</td>";
                echo "<td>{$patient_email}</td>";
                echo "<td>{$patient_mobile}</td>";
                echo "<td>{$patient_gender}</td>";
                echo "<td>{$Date_of_birth}</td>";
                echo "<td>{$guardian}</td>";
                echo "<td>{$patient_address}</td>";
                echo "<td>{$createdat}</td>";
                echo "<td><a class='edit' href='../receptionist/edit_patient.php?edit={$patient_id}'>Update</a></td>";
                echo "<td><a class='delete' href='../receptionist/patients.php?delete={$patient_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // delete patient details

    if (isset($_GET['delete'])) {
        $patient = $_GET['delete'];
        $query = "DELETE FROM patient WHERE patient_id = {$patient} ";
        $delete_query = mysqli_query($db, $query);
         header("Location: patients.php");
    }

    ?>
</div>
<?php include "includes/footer.php"; ?>

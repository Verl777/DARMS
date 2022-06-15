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
            margin-bottom: 15px;
            margin-top: 0;
        }

        #appointments {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: separate;
            border-spacing: 20px 0;
            width: 100%;
        }

        #thead {
            height: 80px;
        }
        
       

        #appointments td,
        #appointments th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        td a {
            text-decoration: none;
            color: #fff;
        }

        td a:hover {
            color: #800000;
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
        <div><thead><th>Active Doctors<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM users WHERE user_role='doctor' AND status='active'";
                                $select_all_doctors = mysqli_query($db, $query);
                                if ($result = $select_all_doctors) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Total Patients<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM patient";
                                $select_all_patients = mysqli_query($db, $query);
                                if ($result = $select_all_patients) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Total Receptionists<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM users WHERE user_role='receptionist'";
                                $select_all_receptionists = mysqli_query($db, $query);
                                if ($result = $select_all_receptionists) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Total Therapists<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM users WHERE user_role='therapist'";
                                $select_all_therapists = mysqli_query($db, $query);
                                if ($result = $select_all_therapists) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Patients with Age<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM patient WHERE Date_of_birth>='1998-01-01'";
                                $select_all_ages = mysqli_query($db, $query);
                                if ($result = $select_all_ages) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?></thead>
        <tbody><td><a href="activedocs.php">View</a></td>
            <td><a href="totalpatients.php">View</a></td>
            <td><a href="receptionists.php">View</a></td>
            <td><a href="therapists.php">View</a></td>
            <td><a href="patientsage.php">View</a></td></tbody>
    </div>
    <div>
        <thead><th>Patients Reported in a day<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM patient WHERE createdat >= CURDATE() && createdat < (CURDATE() + INTERVAL 1 DAY)";
                                $select_all_reported = mysqli_query($db, $query);
                                if ($result = $select_all_reported) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Appointments<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM appointment JOIN patient ON appointment.patientid=patient.patient_id";
                                $select_all_apps = mysqli_query($db, $query);
                                if ($result = $select_all_apps) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Progress Week<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM progress";
                                $select_all_weeks = mysqli_query($db, $query);
                                if ($result = $select_all_weeks) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Unknown patient<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM unknown_patient";
                                $select_all_unknown = mysqli_query($db, $query);
                                if ($result = $select_all_unknown) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?>
        <th>Activity<?php
                                $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                                $query = "SELECT * FROM activity";
                                $select_all_activities = mysqli_query($db, $query);
                                if ($result = $select_all_activities) {
                                    $rowcount = mysqli_num_rows($result);
                                ?>
                 <h3>Total:<?php echo $rowcount; ?></h3>
            </th>
        <?php } ?></thead>
        <tbody> <td><a href="patientsregistered.php">View</a></td>
            <td><a href="totalapps.php">View</a></td>
            <td><a href="weekpro.php">View</a></td>
            <td><a href="unknownpatient.php">View</a></td>
            <td><a href="pactivity.php">View</a></td></tbody>
    </div>
    
       
</div>

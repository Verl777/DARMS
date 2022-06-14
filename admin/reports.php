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
    <h1 id="titleoftable">Appointments</h1>
    <table id="appointments">
        <thead id="thead">
            <th>Active Doctors<?php
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
        <th>Total Receptionists<h3>Total:</h3>
        </th>
        <th>Total Therapists<h3>Total:</h3>
        </th>
        <th>Patients with Age<h3>Total:</h3>
        </th>
        <th>Patients Reported in a day<h3>Total:</h3>
        </th>
        <th>Appointments<h3>Total:</h3>
        </th>
        </thead>
        <tbody>
            <td><a href="activedocs.php">View</a></td>
            <td><a href="totalpatients.php">View</a></td>
            <td><a href="receptionists.php">View</a></td>
            <td><a href="therapists.php">View</a></td>
            <td><a href="patientsage.php">View</a></td>
            <td><a href="patientsregistered.php">View</a></td>
            <td><a href="totalapps.php">View</a></td>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
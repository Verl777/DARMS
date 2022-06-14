<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<?php
        if (isset($_POST['search_detail'])) {
            $data_searched = $_POST['search_data'];
            header("Location: filter_totalpatients.php?searching=$data_searched");
        } ?>

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
    <h1 id="titleoftable">Total Patients Report</h1>
    <form method="post">
        <input type="text" name="search_data" />
        <input type="submit" name="search_detail" value="filter record" />
        <input type="button" onclick="windows.print()" value="print" />
    </form>

    <table id="patients">
        <thead>
            <th>Fullname</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Createdat</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM patient";
            $select_all_patients = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_patients)) {
                $fullname = $row['patient_name'];
                $birthdate = $row['Date_of_birth'];
                $gender = $row['patient_gender'];
                $email = $row['patient_email'];
                $createdat = $row['createdat'];
                echo "<tr>";
                echo "<td>{$fullname}</td>";
                echo "<td>{$birthdate}</td>";
                echo "<td>{$gender}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$createdat}</td>";
                // echo "<td><a class='edit' href='edit_patient.php?edit={$patient_id}'>Update</a></td>";
                // echo "<td><a class='delete' href='patients.php?delete={$patient_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
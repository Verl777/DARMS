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
            background-color: darkcyan;
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
    </style>
    <h1 id="titleoftable">Sessions</h1>
    <form method="post">
        <input type="text" name="search_data" />
        <input type="submit" name="search_detail" value="filter record" />
        <input type="button" onclick="windows.print()" value="print" />
    </form>
    <table id="patients">
        <thead>
            <th>OrderNo</th>
            <th>Week</th>
            <th>Fullname</th>
            <th>Pro_date</th>
            
        </thead>
        <tbody>
            <?php
            if (isset($_GET['searching'])) {
                $search_week = $_GET['searching'];
            }
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM progress WHERE week LIKE '%$search_week%'";
            $select_all_progress = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_progress)) {
                $week = $row['week'];
                $name = $row['fullname'];
                $date = $row['pro_date'];
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$week}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$date}</td>";
                // echo "<td><a class='edit' href='../receptionist/edit_patient.php?edit={$patient_id}'>Edit</a></td>";
                // echo "<td><a class='delete' href='patients.php?delete={$patient_id}'>Delete</a></td>";
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
        // header("Location: patients.php");
    }

    ?>
</div>

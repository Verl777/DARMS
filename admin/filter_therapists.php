<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php";?>
<?php
        if (isset($_POST['search_detail'])) {
            $data_searched = $_POST['search_data'];
            header("Location: filter_therapists.php?searching=$data_searched");
        } ?>
<div class="article">
    <style>
        #titleoftable {
            text-align: center;
            margin: auto;
        }

        #therapists {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #therapists td,
        #therapists th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #therapists tr:hover {
            background-color: #ddd;
        }

        #therapists th {
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
    <h1 id="titleoftable">Total Receptionists Report</h1>
    <form method="post">
        <input type="text" name="search_data" />
        <input type="submit" name="search_detail" value="filter record" />
        <input type="button" onclick="windows.print()" value="print" />
    </form>

    <table id="therapists">
        <thead>
            <th>Fullname</th>
            <th>Username</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th>Createdat</th>
            <th>Userrole</th>
            <th>Gender</th>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['searching'])) {
                $search_receptionist = $_GET['searching'];
            }
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM users WHERE user_role='therapist' AND user_name LIKE '%$search_receptionist%'";
            $select_all_therapist = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_therapist)) {
                $fullname = $row['fullname'];
                $user_name = $row['user_name'];
                $user_mobile = $row['user_mobile'];
                $user_email = $row['user_email'];
                $createdat = $row['createdat'];
                $user_role = $row['user_role'];
                $gender = $row['gender'];
                echo "<tr>";
                echo "<td>{$fullname}</td>";
                echo "<td>{$user_name}</td>";
                echo "<td>{$user_mobile}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$createdat}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td>{$gender}</td>";
                // echo "<td><a class='edit' href='edit_patient.php?edit={$patient_id}'>Update</a></td>";
                // echo "<td><a class='delete' href='patients.php?delete={$patient_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
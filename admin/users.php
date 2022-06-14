<?php include "../includes/functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<?php include "includes/admin_functions.php"; ?>
<!-- content area -->
<div class="article">
    <style>
        #titleoftable {
            text-align: center;
            margin: auto;
        }

        #users {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #users td,
        #users th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #users tr:hover {
            background-color: #ddd;
        }

        #users th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #899499;
            color: white;
        }
        .edit{
            background:#10AFEF ;
            color: #fff;
            width: 50px;
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
    </style>
    <h1 id="titleoftable">Users</h1>
    <table id="users">
        <thead>
            <th>UserId</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Userole</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $query = "SELECT * FROM users";
            $select_all_users = mysqli_query($db, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($select_all_users)) {
                $user_id = $row['user_id'];
                $user_name = $row['fullname'];
                $user_email = $row['user_email'];
                $user_mobile = $row['user_mobile'];
                $user_role = $row['user_role'];
                // $i++;
                echo "<tr>";
                // echo "<td>{$i}</td>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$user_name}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_mobile}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a class='edit' href='edit_users.php?edit={$user_id}'>Edit</a></td>";
                echo "<td><a class='delete' href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    
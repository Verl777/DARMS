<?php include "includes/therapist_functions.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<!-- content area -->
<div class="article">
    <style>
        #titleoftable {
            text-align: center;
            margin-bottom: 15px;
            margin-top: 0;
        }

        #sessions {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            margin-left: 20px;
            width: 100%;
        }

        #thead {
            height: 20px;
        }

        #sessions td,
        #sessions th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        td a{
            text-decoration: none;
            color: #fff;
        }
        td a:hover{
            color: #800000;
        }

        #sessions tr:hover {
            background-color: #ddd;
        }

        #sessions th {
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
    <h1 id="titleoftable">Sessions</h1>
    <table id="sessions" style="background-color:darkcyan;">
        <thead id="thead">
            <th>Week 1</th>
            <th>Week 2</th>
            <th>Week 3</th>
            <th>Week 4</th>
            <th>Week 5</th>
            <th>Week 6</th>
            <th>Week 7</th>
            <th>Week 8</th>
            <th>Week 9</th>
            <th>Week 10</th>
            <th>Week 11</th>
            <th>Week 12</th>
        </thead>
        <tbody>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
            <td><a href="sess.php">View</a></td>
        </tbody>
    </table>
</div>
<?php include "includes/footer.php"; ?>
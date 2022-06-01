<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/sidebar.php"; ?>
<?php include "../includes/functions.php"; ?>
<?php
session_start();
if (isset($_SESSION['user'])) {
    $nurse = $_SESSION['user'];
}
echo var_dump($nurse);
?>
<html>

<head>
    <title>New Schedule</title>
    <style>
        body {
            background: #78817f;
        }

        h1 {
            text-align: center;
            text-decoration: underline;
        }

        label {
            font-size: 20px;
            font-weight: bold;
            margin-left: 5px;
        }

        input[type=date],
        input[type=timestamp],
        input[type=text] {
            width: 70%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            margin-left: 5px;
        }

        button {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
            border: 2px solid black;
            color: #f1f1f1;
            border-radius: 5px;
            font-size: 21px;
            display: block;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Scheduling</h1>
    <form>
        <label for="nurseid">Nurse_id:</label><br>
        <input type="text" name="nurse_id"><br>
        <label for="date">Appointment Date:</label><br>
        <input type="date" name="date"><br>
        <label for="time">Appointment Time:</label><br>
        <input type="timestamp" name="time">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>
<?php include "includes/footer.php"; ?>
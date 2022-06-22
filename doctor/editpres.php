<?php include "includes/doctor_functions.php"; ?>
<html>

<head>
    <title>Prescription</title>
    <style>
        * {
            background-color: #75A5B4;
        }

        body {
            font-family: Calibri, Helvetica, sans-serif;
        }

        .prescription {
            text-align: center;
        }

        .table-d {
            font-weight: 700;
            width: 20%;
        }

        input[type=text],
        input[type=date],
        select,
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .submit-button {
            background-color: #3779f5;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            text-align: center;
            border-radius: 10px;
            display: inline-block;
        }

        .submit-button:hover {
            opacity: 1;
            background-color: green;
        }

        button {
            background: linear-gradient(#202221, #035597);
            border: 2px solid #28cea4;
            color: rgba(240, 229, 229, 0.932);
            padding: 10px;
            font-weight: bold;
            font-size: 15px;
            border-radius: 8px;
        }
    </style>

</head>

<body>
    <br>

    <br>

    <form method="post" action="editpres.php">
        <button onclick="history.back()" class="back">Go Back</button>
        <?php
        session_start();
        if (isset($_GET['edit'])) {
            $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
            $patient_id = $_GET['edit'];
            $query = "SELECT * FROM prescription WHERE patient_id = $patient_id ";
            $select_p_id = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($select_p_id)) {
                // $pid = $row['pid'];
                $patient_id = $row['patient_id'];
                $pdate = $row['pdate'];
                $rehab = $row['rehab'];
                $diagnosis = $row['diagnosis'];
                $instructions = $row['instructions'];

                $_SESSION['prescription'] = $patient_id;
                // echo var_dump($_SESSION['prescrption']);
        ?>
                <h1 class="prescription">PRESCRIPTION </h1>
                <br>
                <table width:="50%">
                    <tbody>
                        <tr>
                            <td class="table-d">Date : <br>
                            </td>
                            <td><input name="date" type="text" value="<?php $date = date('d/m/y');
                                                                        echo $date; ?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-d">Patient ID : <br>
                            </td>
                            <td>
                                <select name="selectpatient" id="pid" value="<?php if (isset($patient_id)) {
                                                                                    echo $patient_id;
                                                                                } ?>">
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-d">Diagnonis : <br>
                            </td>
                            <td><textarea cols="30" rows="3" name="diagnosis" value="<?php if (isset($diagnosis)) {
                                                                                            echo $diagnosis;
                                                                                        } ?>"></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-d">Prescribed Rehabilitation :<br>
                            </td>
                            <td><textarea cols="30" rows="3" name="rehab" value="<?php if (isset($rehab)) {
                                                                                        echo $rehab;
                                                                                    } ?>"></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-d">Additional Instructions :<br>
                            </td>
                            <td><textarea cols="30" rows="3" name="instructions" value="<?php if (isset($instructions)) {
                                                                                            echo $instructions;
                                                                                        } ?>"></textarea> </td>
                        </tr>
                <?php }
        } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <button name="updatepres" class="submit-button" type="submit">Generate Prescription</button>
                <?php

                if (isset($_POST['updatepres'])) {
                    $db = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                    $patient_id = $_POST['selectpatient'];
                    $pdate = $_POST['date'];
                    $diagnosis = $_POST['diagnosis'];
                    $rehab = $_POST['rehab'];
                    $instructions = $_POST['instructions'];
                    $query = "UPDATE prescription SET patient_id = '{$patient_id}',  pdate = '{$pdate}', diagnosis = '{$diagnosis}',
                             rehab = '{$rehab}', instructions = '{$instructions}' WHERE patient_id = {$_SESSION['prescription']} ";
                    $update_query = mysqli_query($db, $query);
                    if (!$update_query) {
                        die("QUERY FAILED" . mysqli_error($db));
                    }
                    header('location: prescription.php');
                }
                // }
                ?>
    </form>

</body>

</html>
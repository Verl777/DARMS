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

    <form method="post" action="prescription.php">
        <button onclick="history.back()" class="back">Go Back</button>
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
                        <select name="selectpatient" id="pid">
                            <?php
                            $connection = mysqli_connect('localhost', 'Valerian', '#Valeriephyl254', 'darms');
                            $query = "SELECT * FROM patient";
                            $select_all_patients = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_all_patients)) {

                                $patient_id = $row['patient_id'];

                                $patient_name = $row['patient_name'];
                            ?>
                                <option value="<?php echo $patient_id; ?>"><?php echo $patient_name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="table-d">Diagnonis : <br>
                    </td>
                    <td><textarea cols="30" rows="3" name="diagnosis"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="table-d">Prescribed Rehabilitation :<br>
                    </td>
                    <td><textarea cols="30" rows="3" name="rehab"></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td class="table-d">Additional Instructions :<br>
                    </td>
                    <td><textarea cols="30" rows="3" name="instructions"></textarea> </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <button name="prescriptionsubmit" class="submit-button" type="submit">Generate Prescription</button>
        <button name="reset" class="submit-button" type="reset">RESET</button>
        <button name="print" class="submit-button" type="print">PRINT</button>
    </form>

</body>

</html>
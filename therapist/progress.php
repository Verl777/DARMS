<?php include "includes/therapist_functions.php"; ?>
<html>

<head>
    <title>Progress form</title>
    <style>
        * {
            background-color: #08AFB2 ;
        }
        
        body {
            font-family: Calibri, Helvetica, sans-serif;
        }
        
        .progress {
            text-align: center;
        }
        
        .table-d {
            font-weight: 700;
            width: 20%;
        }
        
        input[type=text],
        input[type=date],
        textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        .submit-button {
            background-color: darkcyan;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 15%;
            border-radius: 10px;
            margin-left: 500px;
            opacity: 0.9;
        }
        
        .submit-button:hover {
            opacity: 1;
            background-color: blue;
        }
        button  .back{
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
<button onclick="history.back()" class="back" style="margin-top:25px;">Go Back</button>
    <br>

    <br>

    <form method="post" action="progress.php">
        <h1 class="progress"><b>PATIENT PROGRESS </b></h1>
        <table width:="50%">
            <tbody>
            <tr>
                    <td class="table-d">Select Week : <br>
                    </td>
                    <td>
                    <select name="selectweek" class="text-input">
                    <option value=""><--Select week--></option>
                    <option value="week1">Week 1</option>
                    <option value="week2">Week 2</option>
                    <option value="week3">Week 3</option>
                    <option value="week4">Week 4</option>
                    <option value="week5">Week 5</option>
                    <option value="week6">Week 6</option>
                    <option value="week7">Week 7</option>
                    <option value="week8">Week 8</option>
                    <option value="week9">Week 9</option>
                    <option value="week10">Week 10</option>
                    <option value="week11">Week 11</option>
                    <option value="week12">Week 12</option>
                </select>
                    </td>
                <tr>
                    <td class="table-d">Patient Name : <br>
                    </td>
                    <td>
                    <select name="selectpatient" class="text-input">
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
                    <td class="table-d">Date :<br>
                    </td>
                    <td><input type="date" name="prodate" id="date"><br>
                    </td>
                </tr>
                <tr>
                    <td class="table-d">Progress Remarks :<br>
                    </td>
                    <td><textarea cols="30" rows="3" name="remarks"></textarea> </td>
                </tr>
                <tr>
                    <td class="table-d">Comments :<br>
                    </td>
                    <td><textarea name="instructions" cols="30" rows="3" ></textarea> </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <input name="progresssubmit" class="submit-button" value="Confirm" type="submit">
    </form>

</body>

</html>
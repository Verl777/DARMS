<?php include "../includes/db.php"; ?>
<?php include "includes/therapist_functions.php"; ?>
<html>

<head>
    <title>Activity</title>
    <style>
        * {
            background-color: darkcyan;
        }

        body {
            font-family: Calibri, Helvetica, sans-serif;
        }

        .activity {
            text-align: center;
        }

        .table-d {
            font-weight: 700;
            width: 20%;
        }

        input[type=text],
        select,
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
            background-color: #3779f5;
            color: white;
            padding: 16px 20px;
            margin: 5px 0;
            border: none;
            cursor: pointer;
            width: 10%;
            margin-left: 450px;
            border-radius: 10px;
            opacity: 0.9;
        }

        .submit-button:hover {
            opacity: 1;
            background-color: blue;
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

<body><br><br>
    <form method="post" action="activity.php">
        <button onclick="history.back()" class="back">Go Back</button>
        <h1 class="activity">PATIENT ACTIVITY <br><br></h1>
        <table width:="50%">
            <tbody>
                <tr>
                    <td class="table-d">Patient Name: <br></td>
                    <td><select name="selectpatient" class="text-input">
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
                        </select><br></td>
                </tr>
                <tr>
                    <td class="table-d">Date :<br></td>
                    <td><input name="date" type="text" id="date"><br></td>
                </tr>
                <tr>
                    <td class="table-d">Patient Activity:<br></td>
                    <td><select name="activity">
                            <option value="activity">Activity</option>
                            <option value="Col">Coloring</option>
                            <option value="Journ">Journaling</option>
                            <option value="Paint">Painting</option>
                            <option value="Music">Listening to Music</option>
                            <option value="Collage">Scrapbooking/Collaging</option>
                            <option value="Knit">Knitting</option>
                            <option value="Game">PlayGames</option>
                            <option value="Mandala">Draw a Mandala</option>
                            <option value="walk">Go for a walk</option>
                            <option value="cook">Cooking</option>
                            <option value="Medit">Meditate</option>
                            <option value="puzzle">Crossword puzzle/Sudoku</option option value="write">Write a letter</option>
                            <option value="list">Write a gratitude list</option>
                            <option value="Orgami">Origami</option>
                            <option value="read">Read a book</option>
                            <option value="watch">Watch</option>
                            <option value="games">Boardgames</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="table-d"> Instructions :<br></td>
                    <td><textarea cols="30" rows="3" name="instructions"></textarea></td>
                </tr>
            </tbody>
        </table><br><br><input name="activitysubmit" class="submit-button" value="Confirm" type="submit">
    </form>
</body>

</html>
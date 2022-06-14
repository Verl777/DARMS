<?php include "../includes/db.php"; ?>
<?php include "../includes/functions.php"; ?>
<html>
<head>
    <title>Activity</title>
    <style>
        * {
            background-color: rgb(213, 223, 220);
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
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
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
    <form method="post" action="generateprescription.php">
    <button onclick="history.back()" class="back">Go Back</button>
        <h1 class="activity">PATIENT ACTIVITY :<br><br></h1>
        <table width:="50%">
            <tbody>
                <tr>
                    <td class="table-d">Patient Name: <br></td>
                    <td><input name="doc_name" type="text"><br></td>
                </tr>
                <tr>
                    <td class="table-d">Patient ID: <br></td>
                    <td><input name="id" type="text"><br></td>
                </tr>
                <tr>
                    <td class="table-d">Date :<br></td>
                    <td><input type="date" id="date"><br></td>
                </tr>
                <tr>
                    <td class="table-d">Patient Activity:<br></td>
                    <td><select><option value="activity">Activity</option><option value="Col">Coloring</option><option value="Journ">Journaling</option><option value="Paint">Painting</option><option value="Music">Listening to Music</option><option value="Collage">Scrapbooking/Collaging</option><option value="Knit">Knitting</option><option value="Game">PlayGames</option><option value="Mandala">Draw a Mandala</option><option value="walk">Go for a walk</option><option value="cook">Cooking</option><option value="Medit">Meditate</option><option value="puzzle">Crossword puzzle/Sudoku</option><option value="write">Write a letter</option><option value="list">Write a gratitude list</option><option value="Orgami">Origami</option><option value="read">Read a book</option><option value="watch">Watch</option><option value="games">Boardgames</option></select></td>
                </tr>
                <tr>
                    <td class="table-d"> Remarks :<br></td>
                    <td><textarea cols="30" rows="3" name="instructions"></textarea></td>
                </tr>
            </tbody>
        </table><br><br><input name="submit" class="submit-button" value="Confirm" type="submit">
    </form>
</body>

</html>
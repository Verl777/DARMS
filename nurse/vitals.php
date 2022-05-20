<html>
    <head>
        <title>Patient Viitals</title>
        <style>
            body{
                background: #78817f;
            }
            h1{
                text-align: center;
                text-decoration: underline;
            }
            label{
                font-size: 20px;
                font-weight: bold;
            }
            input[type=text],
            textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            }
            button{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            border: 2px solid black;
            color: #f1f1f1;
            border-radius: 5px;
            font-size: 21px;
            display: block;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
            }

        </style>
    </head>
    <body>
        <h1>Register Patient Vitals</h1>
        <form>
            <label for="weight">Weight in KG:</label>
            <input type="text" name="weight">
            <label for="weight">Height in CM:</label>
            <input type="text" name="height">
            <label for="weight">BMI(kg/m2):</label>
            <input type="text" name="bmi">
            <label for="weight">Blood pressure in mmgh:</label>
            <input type="text" name="bloodpressure">
            <label for="weight">Pulse rate(bpm):</label>
            <input type="text" name="pulserate">
            <label for="weight">Allergies:</label>
            <textarea type="text" name="allergies"></textarea>
            <label for="yes_no_radio" name="medication">Are you on any medications?</label>
            <p><input type="radio" name="yes_no" checked>Yes</input></p>
            <p><input type="radio" name="yes_no">No</input></p><br>
            <button type="submit" name="submit" >Submit</button>
        </form>
    </body>
</html>
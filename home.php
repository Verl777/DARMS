<?php ?>
<html lang="en">

<head>
    <title>Drug Addicts Management System </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .main-division {
            width: 100%;
            background-image: url(home.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh;
        }


        .navigate {
            width: 100%;
            height: 75px;
            margin: auto;
            background: rgb(36, 0, 10);
            background: linear-gradient(90deg, rgba(36, 0, 10, 1) 0%, rgba(102, 102, 113, 1) 35%, rgba(2, 54, 65, 1) 100%);
        }

        .icon {
            /* margin-left: 40%; */
            width: 200px;
            float: left;
            height: 70px;
            padding: 10px;
        }

        .logo-image {
            float: left;
            border-radius: 10px;
            width: 50%;
            height: 90%;
            margin-top: -5px;
        }

        .logo-text {
            width: fit-content;
            padding: 23px;
            float: left;
            margin-right: 200px;
            margin-left: -10%;
        }


        .logo {
            float: left;
            color: #fff;
            font-size: 25px;
        }

        .contentarea {
            width: 1200px;
            height: auto;
            margin: auto;
            color: #fff;
            position: relative;
        }

        .contentarea .par {
            padding-left: 20px;
            padding-bottom: 25px;
            font-family: Arial;
            letter-spacing: 1.2px;
            line-height: 30px;
        }

        .contentarea h1 {
            font-family: 'Times New Roman';
            font-size: 30px;
            padding-left: 20px;
            margin-top: 9%;
            letter-spacing: 2px;
        }

        .contentarea .loginbtn {
            width: 160px;
            height: 40px;
            background:#09bdfb;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: .4s ease;

        }

        .contentarea .loginbtn a {
            text-decoration: none;
            color: #fff;
            transition: .3s ease;
        }

        .loginbtn:hover {
            background-color: #fff;
        }

        .loginbtn:hover a {
            color: #03f1f6;
        }
    </style>
</head>

<body>

    <div class="main-division">
        <div class="navigate">
            <div class="icon">
                <a href="home.php">
                    <img src="logo.png" alt="logo-image" class="logo-image" />
            </div>
            <div class="logo-text">
                <h2 class="logo">DRUG ADDICTS' REHABILITATION MANAGEMENT SYSTEM</h2>
                </a>
            </div>

        </div>
        <div class="contentarea">
            <h1> <br><span>EXPERIENCE TRANQUILITY </span> <br>AND SERENITY</h1>
            <p class="par">We value wellness.</p>

            <button class="loginbtn"><a href="login.php">LOGIN</a></button>


        </div>
    </div>


</body>

</html>
<htm<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body{
            font-family: 'Calibri', sans-serif;
            background:
            linear-gradient(
                    rgba(0, 0, 0, 0.7),
                    rgba(0, 0, 0, 0.7)
            ),
            url("../../res/img2.jpg");
        }
        a{
            color: #5b8fff;
            margin-bottom: 1.5vw;
        }
        a:hover{
            color: #7171ff;
        }
        #container-connexionPension{
            width:400px;
            margin:0 auto;
            padding-top:2vw;
        }

        #container-connexionPension form {
            width:100%;
            padding: 30px;
            border: 3px solid #f1f1f1;
            border-radius: 10%;
            background-color: rgba(0,0,0,0.12);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        #container-connexionPension h1{
            text-align: center;
            margin: 0 auto;
            padding-bottom: 10px;
            color: #cccccc;
        }
        #container-connexionPension label{
            padding-bottom: 10px;
            color: #cccccc;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 10px;
        }


        input[type=submit] {
            background-color: #7396d9;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 10px;
        }
        input[type=submit]:hover {
            background-color: white;
            color: #53a1af;
            border: 1px solid #53a1af;
            border-radius: 10px;
        }
    </style>
    <title>Connexion Pension</title>
</head>
<body>
    <main>
        <section id="container-connexionPension">
            <form action="../../Controller/connexion_pension.php" method="POST">
                <h1>Connexion au Pension</h1>
                <br>
                <label for="username"><b>Nom de pension</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>

                <label for="password"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" id="password" required>

                <input type="checkbox" id="ShowPassword" onclick="showPassword()">
                <label for="ShowPassword">Afficher le mot de passe</label>
                <input type="submit" id='submit' value='Connexion' >
                <div style="color: blue; ">
                    <a href="CreerPension.php" id="create">Créer une pension</a><br>
                    <a href="EspacePension.php">Retournez à la page pension</a>
                </div>

            </form>
        </section>
    </main>
    <script src="../../script.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <title>Mise Au Vert</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../res/logo.png">
    <style>
        body{
            background:
                    linear-gradient(
                            rgba(0, 0, 0, 0.7),
                            rgba(0, 0, 0, 0.7)
                    ),
                    url("../../res/img2.jpg");
            font-family: 'Calibri', sans-serif;
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
            padding-top:5vw;
        }

        #container-connexionPension form {
            width:100%;
            padding: 30px;
            border: 3px solid #f1f1f1;
            border-radius: 40px;
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
</head>
<body>
<div id="container-connexionPension">
    <form action="../../Controller/creerPension.php" method="POST">
        <h1>Créer Pension</h1>
        <br>

        <label><b>Nom de pension</b></label>
        <input type="text" placeholder="Entrez le nom du pension " name="nom_pension" required><br><br>

        <label><b>Responsable de pension</b></label>
        <input type="text" placeholder="Entrez le nom du responsable de pension" name="nom_responsable" required><br><br>

        <label><b>Ville</b></label>
        <input type="text" placeholder="Entrez la ville du pension" name="ville" required><br><br>

        <label><b>Adresse</b></label>
        <input type="text" placeholder="Entrez l'adresse du pension" name="Adresse" required><br><br>

        <label><b>N° Telephone</b></label>
        <input type="text" placeholder="Entrez le numero de télephone" name="Telephone" required><br><br>

        <label><b>Email</b></label>
        <input type="text" placeholder="Entrez l'Email" name="email" required><br><br>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez le mot de passe" name="password" id="password" required>
        <input type="checkbox" id="ShowPassword" onclick="showPassword()">
        <label for="ShowPassword">Afficher le mot de passe</label><br>
        <br>

        <label><b>Saissez à nouveau votre mot de passe</b></label>
        <input type="password" placeholder="Entrez le mot de passe" name="password" id="password2" required>
        <input type="checkbox" id="ShowPassword2" onclick="showPassword2()">
        <label for="ShowPassword2">Afficher le mot de passe</label><br><br>

        <input type="submit" id='submit' value='Créer un compte'>

        <script src="../../script.js"></script>
    </form>
</div>
</body>
</html>

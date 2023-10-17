<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Connexion</title>
    <script src="JQUERY/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>


<div class="container">

    <header class="page-header">
        Page Connexion
    </header>

    <div class="ALL">

        <form action="" method="post">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Votre email" class="form-control" />
            </div>

            <div class="form-group">
                <label for="psw">Password</label>
                <input type="text" name="psw" id="psw" placeholder="Votre pass word" class="form-control" />
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <input type="submit" class="btn btn-default btn-lg btn-block btn-success" name="envoyer" id="envoyer" value="Postuler"/>
                </div>
            </div>

        </form>

    </div>

</div>

</body>
</html>




<?php

	$conn = new mysqli("localhost", "root", "", "INSC");

	if ($conn->connect_error)
	    die("Erreur : " . $conn->connect_error);

	if(isset($_POST['envoyer']))
	{
		$email = $_POST['email'];
		$psw = $_POST['psw'];

		$query = "SELECT id, psw FROM inscript WHERE email = '$email'";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
		    $row = $result->fetch_assoc();
		    $hash = $row['psw'];
		    
		    if (password_verify($psw, $hash)) {
		        header("Location:accueil.php");
		    } else {
		        echo "Mot de passe incorrect.";
		    }
		} else {
		    echo "Adresse e-mail non trouvée.";
		}

		$conn->close();
	}

?>
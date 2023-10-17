<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inscription</title>
    <script src="JQUERY/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>


<div class="container">

    <header class="page-header">
        Page Inscription
    </header>

    <div class="ALL">

        <form action="" method="post">

            <div class="form-group">
                <label for="fullNom">Full Name</label>
                <input type="text" name="fullNom" id="fullNom" placeholder="Votre full name" class="form-control" />
            </div>

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

if($conn->connect_error){
	echo "Error de connexion : " .$conn->connect_error;
}
else
{
	if (isset($_POST['envoyer'])) {
		
		if(!empty($_POST['fullNom']) && !empty($_POST['email']) && !empty($_POST['psw']))
		{
			$fullNom = htmlspecialchars($_POST['fullNom']);
			$email = htmlspecialchars($_POST['email']);
			$psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);


			$lengthFullNom = strlen($fullNom);

			if($lengthFullNom > 10)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					// // Vérification si l'adresse e-mail est déjà utilisée
					$req = "SELECT * FROM inscript WHERE email = '$email'";
					$res = $conn->query($req);
					if($res->num_rows <= 0)
					{
						// Insertion des données dans la base de donné
						$reqInsert = "INSERT INTO inscript (fullName, email, psw) VALUES('$fullNom', '$email', '$psw')";
						if($conn->query($reqInsert) == true)
							echo "Insert reussi en attente de confirmation via email consultez votre email pour valider votre compte";

								$fichier = fopen("inscription.txt", "w");
							    fwrite($fichier, "FULLNOM: $fullNom\nEMAIL: $email\nPASSWORD: $psw");
							    fclose($fichier);

							    header("Location:connexion.php");

					}else{
						echo $email. "existe deja dans la base de donnée";
					}
				}else{
					echo "email invalide";
				}
			}else{
				echo "Un full nom inferieur a 10";
			}

			$conn->close();
		}else{
			echo "Tout les champs ne peuvent pas etre vide";
		}
	}

}
?>
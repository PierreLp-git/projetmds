<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<script type="text/javascript" src="script.js"></script>
		<link rel="stylesheet" type="text/css" href="cv.css">
		
	</head>
	<body>
		<?php 
		if(isset($_POST["envoie"])){
			if ($_POST["message"]=='' || !isset($_POST["message"])) {
				echo "Veuillez remplir le champ message";
			}
			else{
				mail('pierre.lepoutre@my-digital-school.org', 'coucou MDS', $_POST["message"]);
				echo "Message envoyé, merci !";

				if(isset($_POST["autorisation"])){
					if(!isset($_POST['mail'])){
						$_POST['mail']='';
					}
					$adresseMail = $_POST['mail'];
					$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');
					$result = $db-> prepare ('INSERT INTO mailLepoutre (mail) VALUES (:adresseMail)');
					$result-> execute(array('adresseMail' => $adresseMail));
				}

			}
	}

	

		?>
		Contact
		<form method="post" action="#" onsubmit="return test()" name="contact">
			<input type="text" name="nom" placeholder="Nom" autofocus><br><br>
			
			<input type="text" name="mail" placeholder="Adresse mail"><br><br>
			
			<input type="text" name="tel" placeholder="Téléphone"><br><br>
			
			<p>Civilité :</p> Mr<input type="radio" name="civ">Mme<input type="radio" name="civ"><br><br>
			<p>Pays :</p>
			<select>
				<option>FR</option>
				<option>BE</option>
				<option>EN</option>
			</select><br><br>
			<textarea name= message placeholder="Votre message..."></textarea><br>
			<input type="checkbox" name="autorisation">J'autorise à conserver ces données<br><br>
			<input type="submit" value="Envoyer" name="envoie">
			<br>
		</form>
		<a href="index.php">Retour à la page d'accueil</a>
	</body>
</html>
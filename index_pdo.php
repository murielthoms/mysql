<?php
$bdd= new PDO('mysql:host=localhost;dbname=mon_armoire; charset=utf8','root','root');

$reponse=$bdd->prepare(
	'SELECT * FROM mes_chaussettes
	WHERE couleur = :couleur');
$reponse->execute(
	array('couleur'=> $_GET['couleur'])
	);

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<table>
			<tr>
				<th>Id</th>
				<th>Pointure</th>
				<th>température lavage</th>
				<th>Description</th>
				<th>Couleur</th>
				<th>Date de lavage</th>
			</tr>
			<?php while($donnees= $reponse->fetch()):?>
				<tr>
					<td><?=$donnees['id']?></td>
					<td><?=$donnees['pointure']?></td>
					<td><?=$donnees['temp_lavage']?></td>
					<td><?=$donnees['description']?></td>
					<td><?=$donnees['couleur']?></td>
					<td><?=$donnees['date_lavage']?></td>

				</tr>

			<?php endwhile;?>
			<?php $reponse->closeCursor();?>
		</table>

	</body>
	</html>
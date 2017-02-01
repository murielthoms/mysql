<?php
require 'vendor/autoload.php';

ORM::configure('mysql:host=localhost;dbname=mon_armoire');
ORM::configure('username','root');
ORM::configure('password','root');

// $tabId= ORM::for_table('mes_chaussettes')->find_many('id');
// var_dump($id);
// $tabId=ORM::for_table('mes_chaussettes')->select('id')->where('couleur','rouge')->find_many();
$tabId = ORM::for_table('mes_chaussettes')->where('couleur','rouge')->find_many();
$tabId = ORM::for_table('mes_chaussettes')->where_gt('pointure',40)->find_many();

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
		<?php foreach ($tabId as $value):?>
			<tr>
				<td><?=$value['id']?></td>
				<td><?=$value['pointure']?></td>
				<td><?=$value['temp_lavage']?></td>
				<td><?=$value['description']?></td>
				<td><?=$value['couleur'];$value->set('couleur','rose');$value->save();?></td>
				<td><?=$value['date_lavage']?></td>

			</tr>

		<?php endforeach;?>

	</table>



	
</body>
</html>

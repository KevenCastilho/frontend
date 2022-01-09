<!DOCTYPE html>
<html>
	<head>
		<title>Frontend</title>
	<link rel="stylesheet" type="text/css" href="frontend.css">
	</head>
	<body>
	<a href='./login.php' class='login'>Logar</a>
	<div id='main' class='container'>
		<h1 class='logo'>Frontend</h1>
<?php 
include_once("server.php");
/*$jogo = array(
	
		$a = array (
					"nome" => "World of Warcraft",
					"url" => "https://www.blizzard.com",
					"image" => "jogo.png",
				),
		$b = array (
					"nome" => "Battle Field",
					"url" => "https://www.battlefield.com",
					"image" => "jogo.png",
				),
		$c = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"image" => "jogo.png",
				),
		$d = array (
					"nome" => "Novo Jogo",
					"url" => "https://www.linknovo",
					"image" => "jogo.png",
				),
		$e = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"image" => "jogo.png",
				),
		$f = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"image" => "jogo.png",
				),
		$g = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"image" => "jogo.png",
				),
		$h = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"image" => "jogo.png",
				),
);*/
			$sqlGame = "SELECT * FROM games";
			$resGame = mysqli_query($db, $sqlGame);
			while ($rowGame = mysqli_fetch_assoc($resGame)) {
				echo "<a href='".$rowGame["url"]."' class='gamelink' target='_blank'>
					<div id='jogo' class='game'>
						<h1 class='title'>".$rowGame["name"]."</h1>
						<img src='images/".$rowGame["image"]."' class='icon'/>
					</div>
				</a>";
			}
			/*foreach ($jogo as $value) {
				echo "<a href='".$value["url"]."' class='gamelink' target='_blank'>
						<div id='jogo' class='game'>
							<h1 class='title'>".$value["nome"]."</h1>
							<img src='images/".$value["image"]."' class='icon'/>
						</div>
					</a>";

			}*/
?>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Frontend</title>
	<meta name="description" content= "Frontend para jogos web HTML5 JAVA SWF FLASH SHOCKWAVE e muito mais." />
	<meta name="robots" content= "index, follow">
	<meta name="author" content="Keven de Miranda Castilho" />
	<meta name="author" content="Nailton Mauricio de Araujo" />
	<meta http-equiv="content-language" content="pt-br, en-US" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="copyright" content="© 2020 Impact Gamez" />
	<meta name="keywords" content="html, html5, flash, swf, shockwave, java, javascript, emulador, frontend">
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="generator" content="sublime text 2020" />
	<meta name="image" content="http://frontend.42web.io/images/meta.png">
	<meta itemprop="name" content="Frontend">
	<meta itemprop="image" content="http://frontend.42web.io/images/meta.png">
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Frontend">
	<meta name="twitter:site" content="@VenatuAdMortem">
	<meta name="twitter:creator" content="@VenatuAdMortem">
	<meta name="twitter:image:src" content="http://frontend.42web.io/images/meta.png">
	<!-- Open Graph general (Facebook, Pinterest & Google+) -->
	<meta name="og:title" content="Frontend">
	<meta name="og:image" content="http://frontend.42web.io/images/meta.png">
	<meta name="og:url" content="http://frontend.42web.io/">
	<meta name="og:site_name" content="Frontend">
	<meta name="og:type" content="website">
	<link rel="stylesheet" type="text/css" href="./css/frontend.css">
	</head>
	<body>
	<a href='./login.php' class='login'>Logar</a>
	<div id='main' class='container'>
		<h1 class='logo'>Frontend</h1>
<?php 
include_once("./_inc/server.php");
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
						<img src='data:image/jpeg;base64,".  base64_encode($rowGame["image"]) ."' class='icon'/>
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
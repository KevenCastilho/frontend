<?php 
include'jogos.php';
$jogo = array(
	
		$a = array (
					"nome" => "World of Warcraft",
					"url" => "https://www.blizzard.com",
					"trigger" => "erro",
				),
		$b = array (
					"nome" => "Battle Field",
					"url" => "https://www.battlefield.com",
					"trigger" => "success",
				),
		$c = array (
					"nome" => "O Caguea",
					"url" => "https://www.jogosbr.com.br",
					"trigger" => "warning",
				),
		$d = array (
					"nome" => "Novo Jogo",
					"url" => "https://www.linknovo",
					"trigger" => "fatal error",
				)
);
echo "<div id='main'>";
			foreach ($jogo as $value) {
				echo "<div id='jogo'>
						<a href='".$value["url"]."' target='_blank'>
							<h1>".$value["nome"]."</h1>
						</a>
						<img src='images/".$value["image"]."' class='icon'/>";

			}
echo "</div>";
?>
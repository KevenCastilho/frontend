<?php 
$jogo = array(
		$a = array (
					"url" => "linkdojogo.com.br",
					"nome" => "nome do jogo",
					"image" => "images/jogo.png",
				),
		$b = array (
					"url" => "linkdojogo.com.br",
					"nome" => "jogo do nome",
					"image" => "images/jogo.png",
				),
		$c = array (
					"url" => "linkdojogo.com.br",
					"nome" => "do nome jogo",
					"image" => "images/jogo.png",
				)
);


foreach ($jogo as $mostrar) {
	# code...
	foreach ($mostrar as $lista) {
		echo $lista."<br/>";
	}
}
echo "<hr/>";
var_dump($jogo);
echo "<hr/>";
foreach ($jogo as $key => $value) {
	foreach ($value as $teste => $value) {
		echo "<div style='border:1px;border-style:solid;'>".$teste."</div>
			  <div style='border:2px;border-style:solid;'>".$value."</div>";
	}
}
?>
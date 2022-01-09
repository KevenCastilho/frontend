<?php
include_once("./_inc/server.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	var_dump($dados);
$imagem = $_FILES['image']['tmp_name'];
$tamanho = $_FILES['image']['size'];
$tipo = $_FILES['image']['type'];
$nome = $_FILES['image']['name'];
$fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
	
	//fazer suas rotinas para tratar as informações vindas do form
	// $data = base64_encode(file_get_contents( $_FILES['image']['tmp_name'] ));
	$sqlInsert = "INSERT INTO games VALUES (DEFAULT, '".$dados['name']."', '".$dados['url']."', '".$conteudo."', ".$_SESSION["user_id"].")";
	$resInsert = mysqli_query($db, $sqlInsert);

	if(mysqli_insert_id($db)){
		$_SESSION["msg"] = "Game inserido com sucesso";
		header("Location: admin.php");
	} else {
		$_SESSION["msg"] = "Erro ao cadastrar novo game";
		header("Location: admin.php");
	}
}
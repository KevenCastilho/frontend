<?php
include_once("server.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	var_dump($dados);
	$image = $dados["image"];
	
	//fazer suas rotinas para tratar as informações vindas do form

	$sqlInsert = "INSERT INTO games VALUES (DEFAULT, '".$dados['name']."', '".$dados['url']."', '$image', ".$_SESSION["user_id"].")";
	$resInsert = mysqli_query($db, $sqlInsert);

	if(mysqli_insert_id($db)){
		$_SESSION["msg"] = "Game inserido com sucesso";
		header("Location: admin.php");
	} else {
		$_SESSION["msg"] = "Erro ao cadastrar novo game";
		header("Location: admin.php");
	}
}
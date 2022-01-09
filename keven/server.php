<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


#$db = mysqli_connect('sql113.epizy.com', 'epiz_26579273', 'HChLV0bdYXN67hU', 'epiz_26579273_frontend');
$db = mysqli_connect('localhost', 'root', '', 'epiz_26579273_frontend');


if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "O campo usuario deve ser preenchido"); }
  if (empty($email)) { array_push($errors, "O campo e-mail deve ser preenchido"); }
  if (empty($password_1)) { array_push($errors, "O campo senha deve ser preenchido"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Senha e confirmação não batem");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Usuario existente");
    }

    if ($user['email'] === $email) {
      array_push($errors, "e-mail já cadastrado");
    }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Você está logado!";
  	header('location: admin.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "O campo usuario deve ser preenchido");
  }
  if (empty($password)) {
    array_push($errors, "O campo senha deve ser preenchido");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['user_id'] = $row["id"];
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Você está logado!";
      header('location: admin.php');
    }else {
      array_push($errors, "Usuario ou senha incorreto!");
    }
  }
}

?>
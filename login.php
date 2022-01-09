<?php include('./_inc/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Frontend - Login</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Senha</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Não tem um login? <a href="register.php" style="color: #ff0000;">Cadastre-se</a>
  	</p>
  </form>
</body>
</html>
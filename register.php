<?php include('./_inc/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Frontend - Cadastro</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body>
  <div class="header">
  	<h2>Cadastro</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Usuario</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>E-mail</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Senha</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirme sua senha</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Cadastrar</button>
  	</div>
  	<p>
  		Já tem uma conta? <a href="login.php" style="color:#ff0000;">Logar</a>
  	</p>
  </form>
</body>
</html>
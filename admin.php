<?php  
  include_once("./_inc/server.php");
$max_upload = min((int)ini_get('post_max_size'), (int)ini_get('upload_max_filesize'));
$max_upload = $max_upload * 1024;
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Frontend - Painel</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/frontend.css">
</head>
<body>

<div class="header">
	<h2>Frontend - Painel ADM</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);

            if(isset($_SESSION["msg"])){
              echo $_SESSION["msg"];
              unset($_SESSION["msg"]);
            }
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <div class="input-group">
<form name="myuForm" method="POST" action="cadGame.php" enctype="multipart/form-data" class="fgame">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
    <label for="name">Jogo </label>
    <input type="text" name="name" id="name" maxlength="50" placeholder="Nome do Seu Jogo [Max 50 Caracteres]" /><br/>
    <label for="url">Link </label>
    <input type="text" name="url" id="url" maxlength="220" placeholder="Url do Seu Jogo [Max 220 Caracteres]"/><br/>
    <label for="image">Imagem <span class="max_size">Tamanho maximo do arquivo <b><?php echo $max_upload ?> MB</b></span></label>
    <input type="file" name="image" id="image" accept=".png,.jpg,.jpeg,.bmp,.gif,.webm,.svg" /><br/>
    <input type="submit" value="Enviar" class="btn"/>
    <!---<input type="button" value="Enviar" class="btn"/>--->
  </form>
</div>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	Bem Vindo <strong><?php echo $_SESSION['username']; ?></strong> | 
      <a href="login.php?logout='1'" style="color: red;" class="logout">Deslogar</a>
    <?php endif ?>
</div>
<div>
    <?php
      $sqlGames = "SELECT * FROM games WHERE user_id = ".$_SESSION["user_id"];
      $resGames = mysqli_query($db, $sqlGames);

      while($rowGame = mysqli_fetch_assoc($resGames)){
        echo "<a href='".$rowGame["url"]."' class='gamelink' target='_blank'>
          <div id='jogo' class='game'>
            <h1 class='title'>".$rowGame["name"]."</h1>
            <img src='data:image/jpeg;base64,".  base64_encode($rowGame["image"]) ."' class='icon'/>
          </div>
        </a>";
      }
    ?>
</div>	
</body>
</html>
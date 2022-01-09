<?php  
  include_once("server.php");

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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
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

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['user_id']."-". $_SESSION['username']; ?></strong></p>
    	<p> <a href="login.php?logout='1'" style="color: red;">Deslogar</a> </p>
    <?php endif ?>
</div>
<div>
  <form name="myuForm" method="POST" action="cadGame.php" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
    <label for="name">Game Name: </label>
    <input type="text" name="name" id="name"/><br/>
    <label for="url">Url: </label>
    <input type="text" name="url" id="url"/><br/>
    <label for="image">Image: </label>
    <input type="file" name="image" id="image"/><br/>
    <button>Send</button>
  </form>
</div>
<div>
    <?php
      $sqlGames = "SELECT * FROM games WHERE user_id = ".$_SESSION["user_id"];
      $resGames = mysqli_query($db, $sqlGames);

      while($rowGames = mysqli_fetch_assoc($resGames)){
        echo "<div id='jogo'>
            <a href='".$rowGames["url"]."' target='_blank'>
              <h1>".$rowGames["name"]."</h1>
            </a>
            <img src='images/".$rowGames["image"]."' class='icon'/>";
      }
    ?>
</div>	
</body>
</html>
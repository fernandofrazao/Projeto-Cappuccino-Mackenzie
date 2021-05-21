<?php
	include("db.php");

	$login_cookie = $_COOKIE['login'];
	if (!isset($login_cookie)) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive; margin: 0;}
	body{background: #F6F6F6;}
	div#topo{width: 100%; top: 0; background: #FFF; box-shadow: 0 0 10px #000; height: 120px;}
	div#topo img[name="logo"]{float: left; margin-left: 20px; margin-top: 10px;}
	h1{position: absolute;top: 5%;left: 10%;	}
	div#topo img[name="menu"]{float: right; margin-right: 25px;margin-top: -25px;}
	div#topo input[type="text"]{display: block; margin-top: 30px; width: 300px; border: none; border-radius: 3px; background: #F6F6F6; height: 25px; padding-left: 10px; box-shadow: inset 0 0 6px #666;}
	div#topo form{width: 300px; display: block; margin: auto; padding-top: 22px;}
	div#footer{bottom: 0; text-align: center; color: #666;}
	</style>
</head>
<body>
	<div id="topo">
		<a href="index.php"><img src="img/cappuccino.png" width="100" name="logo"></a>
		<h1>Cappuccino</h1>
		<form method="GET" action="pesquisar.php">
		<input type="text" placeholder="Pesquisar" name="query" autocomplete="off"><input type="submit" hidden>
		</form>
		<a href="logout.php"><img src="img/logout.png" width="41" name="menu"></a>
        <a href="inbox.php"><img src="img/chat.png" width="30" name="menu"></a>
		<a href="notificacoes.php"><img src="img/notificacoes.png" width="35" name="menu"></a>
		<a href="myprofile.php"><img src="img/perfil.png" width="30" name="menu"></a>
	
	</div>
</body>
</html>
<?php
	include("db.php");

	if (isset($_POST['entrar'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$verifica = mysql_query("SELECT * FROM users WHERE email = '$email' AND password='$pass'");
		if (mysql_num_rows($verifica)<=0) {
			echo "<h3>Senha ou e-mail incorretos!</h3>";
		}else{
			setcookie("login",$email);
			header("location: ./");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive;}
	img{display: block; margin: auto; margin-top: 20px; width: 200px;}
	form{text-align: center; margin-top: 20px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 80px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
</head>
<body>
<img src="img/cappuccino.png"><br />
	<h2> Cappuccino</h2>
    <div class='container container-fluid'>
      <form method="POST">
          <div id='container1' class="container">
            <input type="email" placeholder="Endereço de email" name="email"><br />
            <br>
			<input type="password" placeholder="Senha" name="pass"><br />
			<br>
			<input type="submit" value="Entrar" name="entrar">  
          </div>
      </form>
      <div id='container2' class="container">
      	<h3>O Cappuccino é uma plataforma para avaliar filmes, series e livros.</h3>
      	<br>
      	<h3>Para acessar os serviços faça o login</h3>
		
        <h3 id='btnEnviar'>Ainda não possui uma conta?<a href="registar.php">Inscreva-se</a></h3>
      </div>
    </div>	
</body>
</html>
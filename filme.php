<?php
	include("header.php");

	$pubs = mysql_query("SELECT
			T.id, 
		    T.user, 
		    T.texto, 
		    T.imagem, 
		    T.data,
		    U.de,
		    U.para, 
		    U.aceite
		 FROM
		    pubs AS T,
		    amizades AS U 
		 WHERE
		    T.user = U.de AND U.para = '$login_cookie' AND U.aceite='sim'
		    OR T.user = U.para AND U.de = '$login_cookie' AND U.aceite='sim'
		    order by T.id DESC;");

	if (isset($_POST['publish'])) {
		if ($_FILES["file"]["error"] > 0) {
			$texto = $_POST["texto"];
			$genero = $_POST['genero'];
			$diretor = $_POST['diretor'];
			$pais = $_POST['pais'];
			$ano = date("Y-m-d");
			$resenha = $_POST['resenha'];
			$nota = $_POST['nota'];
			$hoje = date("Y-m-d");
			if ($texto == "") {
				echo "<h3>Escreva algo antes de publicar!</h3>";
			}else{
				$query = "INSERT INTO pubs (user,data,texto,genero,diretor,pais,ano,resenha,nota) VALUES ('$login_cookie','$hoje','$texto','$genero','$diretor','$pais','$ano','$resenha','$nota')";
				$data = mysql_query($query) or die();
				if ($data) {
					header("Location: ./");
				}else{
					echo "Ocorreu um erro";
				}
			}
		}else{
			$n = rand(0, 1000000);
			$img = $n.$_FILES["file"]["name"];

			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$img);

			$texto = $_POST['texto'];
			$genero = $_POST['genero'];
			$diretor = $_POST['diretor'];
			$pais = $_POST['pais'];
			$ano = date("Y-m-d");
			$resenha = $_POST['resenha'];
			$nota = $_POST['nota'];
			$hoje = date("Y-m-d");

			if ($texto == "") {
				echo "<h3>Escreva algo antes de publicar!</h3>";
			}else{
				$query = "INSERT INTO pubs (user,data,texto,genero,diretor,pais,ano,resenha,nota) VALUES ('$login_cookie','$hoje','$texto','$genero','$diretor','$pais','$ano','$resenha','$nota')";
				$data = mysql_query($query) or die();
				if ($data) {
					header("Location: ./");
				}else{
					echo "Ocorreu um erro";
				}
			}
		}
	}

	if (isset($_GET["love"])) {
		love();
	}

	function love() {
		$login_cookie = $_COOKIE['login'];
		$publicacaoid = $_GET['love'];
		$data = date("Y/m/d");

		$post = mysql_query("SELECT * FROM pubs WHERE id='$publicacaoid'");
		$postinfo = mysql_fetch_assoc($post);
		$userinfo = $postinfo['user'];

		$ins = "INSERT INTO loves (`user`,`pub`,`date`) VALUES ('$login_cookie','$publicacaoid','$data')";
		$conf = mysql_query($ins) or die(mysql_error());
		if ($conf) {
			$not = mysql_query("INSERT INTO notificacoes (`userde`,`userpara`,`tipo`,`post`,`data`) VALUES ('$login_cookie','$userinfo','1','$publicacaoid','$data')");
			header("Location: index.php#".$publicacaoid);
		}else{
			echo "<h3>Erro</h3> ".mysql_error();
		}
	}

	if (isset($_GET["unlove"])) {
		unlove();
	}

	function unlove() {
		$login_cookie = $_COOKIE['login'];
		$publicacaoid = $_GET['unlove'];
		$data = date("Y/m/d");

		$del = "DELETE FROM loves WHERE `user`='$login_cookie' AND `pub`='$publicacaoid'";
		$conf = mysql_query($del) or die(mysql_error());
		if ($conf) {
			header("Location: index.php#".$publicacaoid);
		}else{
			echo "<h3>Erro</h3> ".mysql_error();
		}
	}
?>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	
	form{text-align: center; margin-top: 10px;}
	input[type="text"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="email"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; border-radius: 3px; margin-top: 10px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 120px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 20px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	</style>
</head>
<header>
	<style type="text/css">
	div#publish{width: 400px; height: 210px; display: block; margin: auto; border: none; }
	div#publish textarea{width: 365px; height: 150px; display: block; margin: auto; border-radius: 5px; padding-left: 5px; padding-top: 5px; border-width: 1px;}
	div#publish img{margin-top: 0px; margin-left: 10px; width: 40px; cursor: pointer;}
	div#publish input[type="submit"]{width: 70px; height: 25px; border-radius: 3px; float: right; margin-right: 15px; border: none; margin-top: 5px; background: #4169E1; color: #FFF; cursor: pointer;}
	div#publish input[type="submit"]:hover{background: #001F3F;}

	div.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 360px;}
	div.pub a{color: #666; text-decoration: none;}
	div.pub a:hover{color: #111; text-decoration: none;}
	div.pub p{margin-left: 10px; content: #666; padding-top: 10px;}
	div.pub span{display: block; margin: auto; width: 380px; margin-top: 10px;}
	div.pub img{display: block; margin: auto; width: 100%; margin-top: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}

	div#love{width: 400px; height: 30px; display: block; margin: auto; border: none; border-radius: 5px; background: #007fff; margin-top: 5px;}
	div#love p{color: #FFF; font-size: 12px; padding-top: 5px; padding-left: 5px;}
	div#love a{color: #FFF; font-size: 16px; text-decoration: none;}
	#comentar{
		float: right;
		margin-top: 15px;
		margin-right: 15px;
		cursor: pointer;
		width: 13px;
	}
	</style>
</header>

<body>				
	<div id="publish">
	<h2>Avaliar um Filme</h2>
	<br>
	<form method="POST" enctype="multipart/form-data">
			<br />
			<h5>Escolha o titulo da obra:</h5>
			<textarea placeholder="Escreve o titulo do filme" name="texto"></textarea>
			<label for="file-input">
				<img src="img/imagegrey.png" title="Inserir uma fotografia" />
			</label>

			<input type="file" id="file-input" name="file" hidden />
		
		<br>
		<br>
		
		<h5>Escolha um gênero para a obra:</h5>
		<br>
		<select name="genero">
			<optgroup label="genero" name="genero" placeholder="Escolha um gênero para a obra">
			<option value="acao">Ação e aventura</option>
			<option value="drama">Drama</option>
			<option value="comedia">Romance</option>
			<option value="comedia">Comédia</option>
			<option value="ficcao">Ficção científica</option>
			<option value="terror">Terror</option>
			<option value="outro">Outro</option>
		</optgroup>
		</select>
		<br>
		<br>
		
		<h5>Escreva o nome do diretor da obra:</h5>
		
		<textarea name="diretor" placeholder="Escreva o nome do diretor da obra" rows="1"></textarea>
		<br>
		<br>
		<h5>Escreva o país da obra:</h5>
		
		<textarea name="pais" placeholder="Escreva o país da obra" rows="1"></textarea>
		<br>
		<br>
		<h5>Escreva o ano da obra:</h5>
		<textarea name="ano" placeholder="Escreva o ano da obra" rows="1"></textarea>
		<br>
		<br>
		<h5>Escreva sua resenha:</h5>
		<br>
		<textarea name="resenha" placeholder="Escreva sua resenha" rows="5"></textarea>
		<br>
		<br>
		<h5>Dê uma nota de 1 a 10:</h5>
		<br>
		<select name="nota">
			<optgroup label="nota" name="nota" placeholder="Escolha sua nota">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>

		</optgroup>
		</select><br>
		<br>	
		<input type="submit" value="Publicar" name="publish" a href="index.php">
		<input type="file" id="file-input" name="file" hidden />
	<br>	
	</form>
	<h3>Voltar para a <a href="index.php">Pagina Inicial</a></h3>

	
	</div>
</div>
</body>
</html>
<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Professor</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
	<?php
		
		//requisito estar logado e ser coordenador
		if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 0)){
			header("Location: ../LoginCoordenador/LoginCoordenador.php");
			exit;
		}
	?>	
</head>

<body>
	<?php
		require_once('../NavBarCoordenador.php');
	?>
	<form action="./InserirProfessorBanco.php" method="POST" id="formulario">
		<h1>Cadastro de Professor</h1>

		<div class="section">
			<label for="nomeProfessor" class="FormsItens">Nome Completo:</label>
			<input type="text" id="nomeProfessor" name="nomeProfessor" class="FormsItens"  required>

			<label for="dataNascimento" class="FormsItens">Data de Nascimento:</label>
			<input type="date" id="dataNascimento" name="dataNascimento" class="FormsItens" required>

			<label for="emailInstitucional" class="FormsItens">E-mail Institucional:</label>
			<input type="email" id="emailInstitucional" name="emailInstitucional" class="FormsItens" required>

			<label for="senha" class="FormsItens">Senha:</label>
			<input type="password" id="senha" name="senha" class="FormsItens" required>

		</div>
		<input type="hidden" name="id_coordenador" VALUE='<?= $_SESSION['usuario']['id']?>'>
		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
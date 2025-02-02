<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Aluno</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		require_once('../NavBarAluno.php');
	?>
	<form action="./InserirAlunoBanco.php" method="POST" id="formulario">
		<h1>Cadastro de Aluno</h1>

		<div class="section">
			<label for="nomeAluno" class="FormsItens">Nome Completo:</label>
			<input type="text" id="nomeAluno" name="nomeAluno" class="FormsItens"  required>

			<label for="dataNascimento" class="FormsItens">Data de Nascimento:</label>
			<input type="date" id="dataNascimento" name="dataNascimento" class="FormsItens" required>

			<label for="emailInstitucional" class="FormsItens">E-mail Institucional:</label>
			<input type="email" id="emailInstitucional" name="emailInstitucional" class="FormsItens" required>

			<label for="senha" class="FormsItens">Senha:</label>
			<input type="password" id="senha" name="senha" class="FormsItens" required>

		</div>

		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
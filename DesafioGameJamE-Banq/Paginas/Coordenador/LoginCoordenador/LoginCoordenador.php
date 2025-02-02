<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login de Coordenador</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		require_once('../NavBarCoordenador.php');
	?>
	<form action="./LoginCoordenadorBanco.php" method="POST" id="formulario">
		<h1>Login de Coordenador</h1>

		<div class="section">
			<label for="emailInstitucional" class="FormsItens">Insira seu email institucional</label>
			<input type="email" id="emailInstitucional" name="emailInstitucional" class="FormsItens" required>

			<label for="senha" class="FormsItens">Senha:</label>
			<input type="password" id="senha" name="senha" class="FormsItens" required>

		</div>

		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
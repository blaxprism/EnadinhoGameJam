<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Curso</title>
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
	<form action="./InserirCursoBanco.php" method="POST" id="formulario">
		<h1>Cadastro de Curso</h1>

		<div class="section">
			<h2>Curso</h2>
			<label for="nomeCurso" class="FormsItens">Nome do curso:</label>
			<input type="text" id="nomeCurso" name="nomeCurso" class="FormsItens" maxlength="100" required>

			<label for="objetivoCurso" class="FormsItens">Objetivo do curso:</label>
			<textarea id="texto" name="objetivoCurso" class="FormsItens" rows="5" required></textarea>

			<label for="eixoCurso" class="FormsItens">Eixo do curso:</label>
			<input type="text" id="eixoCurso" name="eixoCurso" class="FormsItens" maxlength="100" required>

		</div>

		<div class="section">
			<h2>Cadastro de Disciplina</h2>
			
			<label for="nomeDisciplina" class="FormsItens">Nome da disciplina:</label>
			<input type="text" id="nomeDisciplina" name="nomeDisciplina" class="FormsItens" maxlength="100" required>
			
			<label for="ementaDisciplina" class="FormsItens">Ementa da disciplina:</label>
			<textarea id="ementaDisciplina" name="ementaDisciplina" class="FormsItens" rows="5"></textarea>

			<label for="objetivosAprendizagem" class="FormsItens">Objetivos de Aprendizagem:</label>
			<textarea id="objetivosAprendizagem" name="objetivosAprendizagem" class="FormsItens" rows="5"></textarea>
			
		</div>


		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
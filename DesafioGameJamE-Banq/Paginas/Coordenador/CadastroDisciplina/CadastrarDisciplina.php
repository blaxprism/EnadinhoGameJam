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
		$id_curso = $_POST['curso'];
	?>
</head>

<body>
	<?php
		require_once('../NavBarCoordenador.php');
	?>
	<form action="./InserirDisciplinaBanco.php" method="POST" id="formulario">
		<h1>Cadastro de Disciplina</h1>

		<div class="section">
			
			<label for="nomeDisciplina" class="FormsItens">Nome da disciplina:</label>
			<input type="text" id="nomeDisciplina" name="nomeDisciplina" class="FormsItens" maxlength="100" required>
			
			<label for="ementaDisciplina" class="FormsItens">Ementa da disciplina:</label>
			<textarea id="ementaDisciplina" name="ementaDisciplina" class="FormsItens" rows="5"></textarea>

			<label for="objetivosAprendizagem" class="FormsItens">Objetivos de Aprendizagem:</label>
			<textarea id="objetivosAprendizagem" name="objetivosAprendizagem" class="FormsItens" rows="5"></textarea>
			
		</div>

		<input type="hidden" name="id_curso" value="<?=$id_curso?>">
		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
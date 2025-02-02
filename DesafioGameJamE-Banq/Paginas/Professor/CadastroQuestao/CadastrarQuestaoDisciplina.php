<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Enunciados e Questões</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
	<?php
		
		if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 1)){
			header("Location: ../LoginCoordenador/LoginCoordenador.php");
			exit;
		}
	?>
</head>

<body>
	<?php
		require_once('../NavBarProfessor.php');
	?>
	<form action="./CadastrarQuestaoEnunciado.php" method="POST" id="formulario">
		<h1>Seleção de Disciplina</h1>

		<div class="section">
			<ul class="lista-botoes">
				<?php
					$id_curso = $_POST['curso'];
					if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true) && ($_SESSION['usuario']['tipo'] == 1)){
						//caso o usuário esteja logado
						require('../../../Codigos/Functions.php');
						$disciplinas = selectDisciplinasAlocadasCurso($_SESSION['usuario']['id'], $id_curso);
						for ($indice = 0; $indice <= max(array_keys($disciplinas)); $indice++) {
							echo "<li><button class='listaBotoes' name='disciplina' value='{$disciplinas[$indice][0]}'><h2>{$disciplinas[$indice][1]}</h2></button></li>";
						}
					}else{
						//caso o usuário não esteja logado
						header("Location: ../LoginProfessor/LoginProfessor.php");
						exit;
					}
					
				?>
			</ul>
		</div>

	</form>

</body>

</html>
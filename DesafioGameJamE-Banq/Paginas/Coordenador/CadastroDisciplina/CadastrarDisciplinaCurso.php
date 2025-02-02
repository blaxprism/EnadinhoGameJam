<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Disciplina</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		require_once('../NavBarCoordenador.php');
	?>
	<form action="./CadastrarDisciplina.php" method="POST" id="formulario">
		<h1>Seleção de Curso</h1>

		<div class="section">
			<?php
			
			//requisito estar logado e ser coordenador
			if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 0)){
			header("Location: ../LoginCoordenador/LoginCoordenador.php");
			exit;
		}
				require('../../../Codigos/SelecionarCurso.php');
			?>
		</div>

	</form>

</body>

</html>
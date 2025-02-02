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

	<form action="./CadastrarQuestao.php" method="POST" id="formulario">
		<h1>Seleção de Enunciado</h1>

		<div class="section">
			<?php
				require('../../../Codigos/SelecionarEnunciado.php');
			?>
		</div>

	</form>

</body>

</html>
<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alocação de Disciplina para Professor</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		require_once('../NavBarCoordenador.php');
	?>
	<form action="./AlocarDisciplinaBanco.php" method="POST" id="formulario">
		<h1>Seleção de Disciplina</h1>

		<div class="section">
			<?php
			
			//requisito estar logado e ser coordenador
			if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 0)){
				header("Location: ../LoginCoordenador/LoginCoordenador.php");
				exit;
			}
				require('../../../Codigos/SelecionarDisciplina.php');
			?>
			<input type="hidden" name="professor" value="<?= $_POST['professor']?>">
		</div>

	</form>

</body>

</html>
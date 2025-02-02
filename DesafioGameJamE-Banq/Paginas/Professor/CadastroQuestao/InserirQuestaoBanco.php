<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Questões</title>
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
		require_once('../../../Codigos/Functions.php');

		$id_enunciado = sanitizarDados($_POST['enunciado']);
		
		$perguntaQuestao = sanitizarDados($_POST['perguntaQuestao']);
		$dificuldade = sanitizarDados($_POST['dificuldade']);

		$altA = sanitizarDados($_POST['alt_a']);
		$altB = sanitizarDados($_POST['alt_b']);
		$altC = sanitizarDados($_POST['alt_c']);
		$altD = sanitizarDados($_POST['alt_d']);
		$altE = sanitizarDados($_POST['alt_e']);
		$altCerta = sanitizarDados($_POST['alt_certa']);

		$feedback = sanitizarDados($_POST['feedback_texto']);

		cadastrarQuestao($id_enunciado, $perguntaQuestao, $dificuldade);

		$questaoInserida = selectUltimaQuestao();
		$id_questao = $questaoInserida[0];
		cadastrarAlternativas($id_questao, $altA, $altB, $altC, $altD, $altE, $altCerta);
		
		cadastrarFeedback($id_questao, $feedback);

	?>
	<h1>Questão Cadastrada com sucesso</h1>
	<h2>Redirecionando...</h2>
	<script>
	// Redireciona após 5 segundos
	setTimeout(function() {
		window.location.href = "../index.php";
		<?php 
				header("Location: ../index.php");
				exit;
			?>
	}, 5000);
	</script>
</body>

</html>
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
</head>

<body>
	<?php
		
		if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 1)){
			header("Location: ../LoginCoordenador/LoginCoordenador.php");
			exit;
		}

		require_once('../../../Codigos/Functions.php');

		// Recebendo e sanitizando os dados do formulário
		$id_disciplina = sanitizarDados($_POST['id_disciplina']);
		$tituloEnunciado = sanitizarDados($_POST['tituloEnunciado']);
		$textoEnunciado = sanitizarDados($_POST['textoEnunciado']);

		$perguntaQuestao = sanitizarDados($_POST['perguntaQuestao']);
		$dificuldade = sanitizarDados($_POST['dificuldade']);

		$altA = sanitizarDados($_POST['alt_a']);
		$altB = sanitizarDados($_POST['alt_b']);
		$altC = sanitizarDados($_POST['alt_c']);
		$altD = sanitizarDados($_POST['alt_d']);
		$altE = sanitizarDados($_POST['alt_e']);
		$altCerta = sanitizarDados($_POST['alt_certa']);

		$feedback = sanitizarDados($_POST['feedback_texto']);

		cadastrarEnunciado($id_disciplina, $tituloEnunciado, $textoEnunciado);

		$enunciadoInserido = selectUltimoEnunciado();
		$id_enunciado = $enunciadoInserido[0];
		cadastrarQuestao($id_enunciado, $perguntaQuestao, $dificuldade);

		//$altA, $altB, $altC, $altD, $altE, $altCerta
		$questaoInserida = selectUltimaQuestao();
		$id_questao = $questaoInserida[0];
		cadastrarAlternativas($id_questao, $altA, $altB, $altC, $altD, $altE, $altCerta);
		
		cadastrarFeedback($id_questao, $feedback);
		
	?>
	<h1>Enunciado e Questão Cadastrados com sucesso</h1>
	<h2>Redirecionando...</h2>
	<script>
		// Redireciona após 5 segundos
		setTimeout(function() {
			window.location.href = "../index.php";
		}, 5000);
	</script>
</body>

</html>
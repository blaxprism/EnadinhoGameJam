<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Curso e Disciplina</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		
		//requisito estar logado e ser coordenador
		if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 0)){
			header("Location: ../LoginCoordenador/LoginCoordenador.php");
			exit;
		}
		require_once('../../../Codigos/Functions.php');

		// Recebendo e sanitizando os dados do formulário
		$nomeCurso = sanitizarDados($_POST['nomeCurso']);
		$objetivoCurso = sanitizarDados($_POST['objetivoCurso']);
		$eixoCurso = sanitizarDados($_POST['eixoCurso']);

		$nomeDisciplina = sanitizarDados($_POST['nomeDisciplina']);
		$ementaDisciplina = sanitizarDados($_POST['ementaDisciplina']);
		$objetivosAprendizagem = sanitizarDados($_POST['objetivosAprendizagem']);

		cadastrarCurso($nomeCurso, $objetivoCurso, $eixoCurso);

		$cursoInserido = selectUltimoCurso();
		$id_curso = $cursoInserido[0];
		cadastrarDisciplina($id_curso, $nomeDisciplina, $ementaDisciplina, $objetivosAprendizagem);

	?>
	<h1>Curso e Disciplina Cadastrados com sucesso</h1>
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
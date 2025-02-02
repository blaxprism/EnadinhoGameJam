<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Aluno</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>

<body>
	<?php
		require_once('../../../Codigos/Functions.php');

		// Recebendo e sanitizando os dados do formulário
		$nomeAluno = sanitizarDados($_POST['nomeAluno']);
		$dataNascimento = sanitizarDados($_POST['dataNascimento']);
		$emailInstitucional = sanitizarDados($_POST['emailInstitucional']);
		$senha = sanitizarDados($_POST['senha']);

		cadastrarAluno($nomeAluno, $dataNascimento, $emailInstitucional, $senha);

	?>
	<h1>Aluno cadastrado com sucesso</h1>
	<h2>Redirecionando...</h2>
	<script>
		// Redireciona após 5 segundos
		setTimeout(function() {
			window.location.href = "../index.php";
		}, 5000);
	</script>
</body>

</html>
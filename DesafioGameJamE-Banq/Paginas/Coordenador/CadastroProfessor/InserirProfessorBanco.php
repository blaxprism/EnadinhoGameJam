<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Professor</title>
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
		$id_coordenador= sanitizarDados($_POST['id_coordenador']);
		$nomeProfessor = sanitizarDados($_POST['nomeProfessor']);
		$dataNascimento = sanitizarDados($_POST['dataNascimento']);
		$email = sanitizarDados($_POST['emailInstitucional']);
		$senha = sanitizarDados($_POST['senha']);

		cadastrarProfessor($id_coordenador, $nomeProfessor, $dataNascimento, $email, $senha);

	?>
	<h1>Professor Cadastrado com sucesso</h1>
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
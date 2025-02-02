<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login de Professor</title>
	<!-- Carrega o CSS local - ATENÇÃO: Caminho absoluto pode causar problemas em outros ambientes -->
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>
<body>
	<?php
		// Inicia/reinicia a sessão para armazenamento de dados de login
		
		session_unset();
		session_destroy();
	?>
	<h1>Sessão encerrada com sucesso</h1>
	<h2>Redirecionando para o painel...</h2>
	<script>
		// Redirecionamento temporário via cliente (ideal: fazer via PHP header)
		setTimeout(function() {
			window.location.href = "../../../index.php";
			<?php 
				header("Location: ../../../index.php");
				exit;
			?>
		}, 5000);
	</script>
</body>
</html>
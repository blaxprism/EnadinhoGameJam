<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login de Aluno</title>
	<!-- Carrega o CSS local - ATENÇÃO: Caminho absoluto pode causar problemas em outros ambientes -->
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>
<body>
	<?php
	// Inicia/reinicia a sessão para armazenamento de dados de login
	// Carrega funções essenciais (sanitização, login, etc.)
	require_once('../../../Codigos/Functions.php');

	// Sanitiza dados de entrada para prevenir ataques básicos XSS/SQL Injection
	// ATENÇÃO: Isso não substitui prepared statements no banco de dados!
	$emailInstitucional = sanitizarDados($_POST['emailInstitucional'] ?? '');
	$senha = sanitizarDados($_POST['senha'] ?? '');

	// Tenta autenticar o Aluno com as credenciais fornecidas
	$Aluno = selectLoginAluno($emailInstitucional, $senha);

	if (is_array($Aluno)) {
		// Verifica se exatamente 1 Aluno foi encontrado
		$_SESSION['logged'] = count($Aluno) == 1;

		if ($_SESSION['logged']) {
			// Armazena dados do Aluno na sessão
			$_SESSION['usuario'] = [
				'id' => $Aluno[0][0],			// ID do Aluno
				'nome' => $Aluno[0][1],		// Nome completo
				'data_nasc' => $Aluno[0][2],	// Data de nascimento
				'email' => $Aluno[0][3],		// E-mail institucional
				'tipo' => 2 // tipo Coordenador, 1 Professor, 2 Aluno
			];
	?>
			<!-- Feedback de sucesso -->
			<h1>Login realizado com sucesso</h1>
			<h2>Redirecionando para o painel...</h2>
			<script>
				// Redirecionamento temporário via cliente (ideal: fazer via PHP header)
				setTimeout(function() {
					window.location.href = "../index.php";	// Painel principal
				}, 5000);
			</script>
	<?php } else { ?>
			<!-- Feedback de falha -->
			<h1>Falha no login</h1>
			<h2>Redirecionando para nova tentativa...</h2>
			<script>
				// Redireciona de volta para a página de login
				setTimeout(function() {
					window.location.href = "./LoginAluno.php";
				}, 5000);
			</script>
	<?php } }else { ?>
		<!-- Feedback de falha -->
		<h1>Falha no login</h1>
		<h2>Redirecionando para nova tentativa...</h2>
		<script>
			// Redireciona de volta para a página de login
			setTimeout(function() {
				window.location.href = "./LoginAluno.php";
			}, 5000);
		</script>
	<?php } ?>
</body>
</html>
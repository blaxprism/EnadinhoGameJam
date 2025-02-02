<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultado - E-banq</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
</head>
<body>
	<h1>Resultado da Prova</h1>
	
	<?php
	// Verifica se os dados foram submetidos
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$totalQuestoes = 0;
		$acertos = 0;
		$resultados = [];

		// Coleta todas as questões respondidas
		foreach ($_POST as $key => $value) {
			if (strpos($key, 'altCerta') === 0) {
				$index = substr($key, 8);
				$totalQuestoes++;
				
				// Recupera dados da questão
				$respostaUsuario = $_POST['alternativa'.$index] ?? null;
				$respostaCorreta = $value;
				
				// Verifica acerto
				$acertou = ($respostaUsuario == $respostaCorreta);
				if ($acertou) $acertos++;
				
				// Armazena resultados
				$resultados[] = [
					'questao' => $index,
					'usuario' => $respostaUsuario,
					'correta' => $respostaCorreta,
					'acerto' => $acertou
				];
			}
		}

		// Calcula porcentagem de acertos
		$percentual = ($totalQuestoes > 0) ? round(($acertos / $totalQuestoes) * 100) : 0;
	?>
	
	<div class="resultado-geral">
		<h2>Desempenho:</h2>
		<p>Acertos: <?= $acertos ?> de <?= $totalQuestoes ?></p>
		<p>Percentual de acertos: <?= $percentual ?>%</p>
		
		<?php if ($percentual == 100): ?>
			<div class="parabens">Parabéns! Perfeito!</div>
		<?php endif; ?>
	</div>

	<h2>Detalhes das Respostas:</h2>
	<?php foreach ($resultados as $resultado): ?>
		<div class="resposta">
			<h3>Questão <?= $resultado['questao'] + 1 ?></h3>
			<p>Sua resposta: 
				<span class="<?= $resultado['acerto'] ? 'correta' : 'incorreta' ?>">
					<?= chr(65 + $resultado['usuario']) ?>
				</span>
			</p>
			<p>Resposta correta: 
				<span class="correta">
					<?= chr(65 + $resultado['correta']) ?>
				</span>
			</p>
		</div>
	<?php endforeach; ?>

	<a href="javascript:history.go(-1)" class="botao">Voltar</a>

	<?php } else { ?>
		<p>Nenhum resultado para exibir. <a href="index.php">Voltar</a></p>
	<?php } ?>

</body>
</html>
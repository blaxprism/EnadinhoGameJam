<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-banq</title>
	<link rel="stylesheet" href='http://localhost/DesafioGameJamE-Banq/Codigos/Style.css'>
	<?php
		
		if ((!isset($_SESSION['logged'])) || ($_SESSION['logged'] != true) || ($_SESSION['usuario']['tipo'] != 2)){
			header("Location: ../LoginAluno/LoginAluno.php");
			exit;
		}
		require_once('../../../Codigos/Functions.php');
		// Gera a prova usando a nova função
		$provaGerada = gerarProvaAleatoria();
	?>
</head>
<body>
	<?php
		require_once('../NavBarAluno.php');
	?>

	<h1>E-banq</h1>
	
	

	<form action="Feedback.php" method="post" id="formulario">
		<?php if ($provaGerada): ?>
			<?php foreach ($provaGerada as $index => $questao): ?>
				<h2><?= htmlspecialchars($questao['enunciado']) ?></h2>
				<div>
					<?= htmlspecialchars($questao['questao']) ?><br><br>
				</div>

				<?php 
				// Encontra o índice da alternativa correta
				$altCertaIndex = null;
				foreach ($questao['alternativas'] as $altIndex => $alternativa) {
					if ($alternativa['correta']) {
						$altCertaIndex = $altIndex;
						break;
					}
				}
				?>

				<?php foreach ($questao['alternativas'] as $altIndex => $alternativa): ?>
					<input type="radio" 
						name="alternativa<?= $index ?>" 
						id="alternativa<?= $index ?>_<?= $altIndex ?>" 
						value="<?= $altIndex ?>" 
						required>
					<label for="alternativa<?= $index ?>_<?= $altIndex ?>">
						<?= chr(65 + $altIndex) ?> - <?= htmlspecialchars($alternativa['texto']) ?>
					</label><br>
				<?php endforeach; ?>

				<input type="hidden" name="altCerta<?= $index ?>" value="<?= $altCertaIndex ?>">
				<br><br>
			<?php endforeach; ?>

			<input type="submit" value="Enviar" class="botao">
		<?php else: ?>
			<p>Erro ao gerar a prova. Tente novamente mais tarde.</p>
		<?php endif; ?>
	</form>

</body>
</html>
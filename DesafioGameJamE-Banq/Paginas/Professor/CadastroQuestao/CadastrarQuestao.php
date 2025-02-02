<?php
	session_start();
?>
<!DOCTYPE html>	
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Questão</title>
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
		require_once('../NavBarProfessor.php');
	?>
	<?php
		require_once('../../../Codigos/Functions.php');
		$id_enunciado = $_POST['enunciado'];
		$enunciado = selectEnunciadoId($id_enunciado)[0];
	?>
	
	<form action="./InserirQuestaoBanco.php" method="POST" id="formulario">
		<h1>Cadastro de Questão</h1>

		<div class="section">
			<h2>Enunciado</h2>
			<h3><?= $enunciado[1] ?></h3>

			<p><?= $enunciado[2] ?></p>
		</div>

		<div class="section">
			<h2>Questão</h2>
			<label for="pergunta" class="FormsItens">Pergunta:</label>
			<textarea id="pergunta" name="perguntaQuestao" class="FormsItens" rows="3" required></textarea>

			<label for="alt_a" class="FormsItens">Alternativa A:</label>
			<textarea id="alt_a" name="alt_a" class="FormsItens" rows="2" required ></textarea>

			<label for="alt_b" class="FormsItens">Alternativa B:</label>
			<textarea id="alt_b" name="alt_b" class="FormsItens" rows="2" required ></textarea>

			<label for="alt_c" class="FormsItens">Alternativa C:</label>
			<textarea id="alt_c" name="alt_c" class="FormsItens" rows="2" required ></textarea>

			<label for="alt_d" class="FormsItens">Alternativa D:</label>
			<textarea id="alt_d" name="alt_d" class="FormsItens" rows="2" required ></textarea>

			<label for="alt_e" class="FormsItens">Alternativa E:</label>
			<textarea id="alt_e" name="alt_e" class="FormsItens" rows="2" required ></textarea>

			<label for="alt_certa" class="FormsItens">Alternativa Correta:</label>
			<select id="alt_certa" name="alt_certa" class="FormsItens" required>
				<option value="0">A</option>
				<option value="1">B</option>
				<option value="2">C</option>
				<option value="3">D</option>
				<option value="4">E</option>
			</select>
			<label for="dificuldade" class="FormsItens">Nível de dificuldade da questão:</label>
			<select id="dificuldade" name="dificuldade" class="FormsItens" required>
				<option value="0">Fácil</option>
				<option value="1">Médio</option>
				<option value="2">Difícil</option>
				<option value="3">Oficial do INEP</option>
			</select>
		</div>

		<div class="section">
			<h2>Feedback da Questão</h2>
			<label for="feedback_texto" class="FormsItens">Feedback Explicativo:</label>
			<textarea id="feedback_texto" name="feedback_texto" class="FormsItens" rows="5" required></textarea>
		</div>
			
		<input type="hidden" name="enunciado" value="<?=$id_enunciado?>">
		<input type="submit" value="Enviar" class="FormsItens"> 
	</form>

</body>

</html>
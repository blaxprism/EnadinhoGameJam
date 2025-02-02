<div class="navbar">
	<a href="http://localhost/DesafioGameJamE-Banq/index.php">Página inicial</a>
	<?php
		if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true) && ($_SESSION['usuario']['tipo'] == 1)){
			//caso o usuário esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Professor/CadastroEnunciado/CadastrarEnunciadoCurso.php">Cadastrar Enunciado</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Professor/CadastroQuestao/CadastrarQuestaoCurso.php">Cadastrar Questão</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Professor/LoginProfessor/Sair.php">Sair</a>
				
			<?php
		}else{
			//caso o usuário não esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Professor/LoginProfessor/LoginProfessor.php">Login</a>
			<?php
		}
	?>	
</div>
<div class="navbar">
	<a href="http://localhost/DesafioGameJamE-Banq/index.php">Página inicial</a>
	<?php
	
		if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true) && ($_SESSION['usuario']['tipo'] == 2)){
			//caso o usuário esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Aluno/Partida/Jogar.php">Partida SinglePlayer</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Aluno/LoginAluno/Sair.php">Sair</a>
				
			<?php
		}else{
			//caso o usuário não esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Aluno/LoginAluno/LoginAluno.php">Login</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Aluno/CadastroAluno/CadastrarAluno.php">Cadastre-se</a>
			<?php
		}
	?>	
</div>
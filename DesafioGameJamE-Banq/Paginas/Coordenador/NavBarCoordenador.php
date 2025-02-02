<div class="navbar">
	<a href="http://localhost/DesafioGameJamE-Banq/index.php">Página inicial</a>
	<?php
		if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true) && ($_SESSION['usuario']['tipo'] == 0)){
			//caso o usuário esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/CadastroCurso/CadastrarCurso.php">Cadastrar Curso</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/CadastroDisciplina/CadastrarDisciplinaCurso.php">Cadastrar Disciplina</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/CadastroProfessor/CadastrarProfessor.php">Cadastrar Professor</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/AlocarDisciplinaProfessor/AlocarDisciplinaProfessor.php"> Alocar disciplina para professor</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/LoginCoordenador/Sair.php">Sair</a>
				
			<?php
		}else{
			//caso o usuário não esteja logado
			?>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/LoginCoordenador/LoginCoordenador.php">Login</a>
				<a href="http://localhost/DesafioGameJamE-Banq/Paginas/Coordenador/CadastroCoordenador/CadastrarCoordenador.php">Cadastre-se</a>
			<?php
		}
	?>	
</div>
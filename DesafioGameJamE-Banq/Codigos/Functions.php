<?php
	
	//Crud genéricos
		function selectDatabase($query, $conn){

			//executa a query inserida
			$result = $conn->query($query);

			// Verificando se há resultados
			if ($result->num_rows > 0) {
				return $result->fetch_all();
			} else {
				return ;
			}
		};

		function insertDatabase($query, $conn){
			// Executa a query e verifica se foi bem-sucedida
			if ($conn->query($query) === TRUE) {
				return true;
			} else {
				// Exibe mensagem de erro no caso de falha (opcional para debug)
				error_log("Erro ao inserir no banco: " . $conn->error);
				return false;
			}
			
		}

	//Select sem where
		function selectEnunciados(){
			require("Conn.php");
			return selectDatabase("SELECT * from `enunciados`", $conn);
		};

		function selectQuestoes(){
			require("Conn.php");
			return selectDatabase("SELECT * from `questoes`", $conn);
		}

		function selectAlternativas(){
			require("Conn.php");
			return selectDatabase("SELECT * from `alternativas`", $conn);
		};

		function selectCursos(){
			require("Conn.php");
			return selectDatabase("SELECT * from `cursos`", $conn);
		}

		function selectDisciplinas(){
			require("Conn.php");
			return selectDatabase("SELECT * from `disciplinas`", $conn);
		}
		
		function selectProfessores(){
			require("Conn.php");
			return selectDatabase("SELECT * from `professores`", $conn);
		}

	//Select com where

		function selectLoginCoordenador($emailInstitucional, $senha){
			require("Conn.php");
			return selectDatabase("SELECT * from `coordenadores` where `email_institucional`='$emailInstitucional' and `senha`='$senha'", $conn);
		}

		function selectLoginProfessor($emailInstitucional, $senha){
			require("Conn.php");
			return selectDatabase("SELECT * from `professores` where `email_institucional`='$emailInstitucional' and `senha`='$senha'", $conn);
		}

		function selectLoginAluno($emailInstitucional, $senha){
			require("Conn.php");
			return selectDatabase("SELECT * from `alunos` where `email_institucional`='$emailInstitucional' and `senha`='$senha'", $conn);
		}

		function selectDisciplinasCurso($id_curso){
			require("Conn.php");
			return selectDatabase("SELECT * from `disciplinas` where `fk_curso`=$id_curso", $conn);
		}

		function selectEnunciadosDisciplina($id_disciplina){
			require("Conn.php");
			return selectDatabase("SELECT * from `enunciados` where `fk_disciplina`=$id_disciplina", $conn);
		}

		function selectQuestoesEnunciado($id_enunciado){
			require("Conn.php");
			return selectDatabase("SELECT * FROM `questoes` WHERE `fk_enunciado` = $id_enunciado", $conn);
		}

		function selectUltimaQuestao(){
			$questoes = selectQuestoes();
			$quantidade_questoes = max(array_keys($questoes));
			return $questoes[$quantidade_questoes];
		}

		function selectUltimoEnunciado(){
			$enunciados = selectEnunciados();
			$quantidade_enunciados = max(array_keys($enunciados));
			return $enunciados[$quantidade_enunciados];
		}

		function selectUltimoCurso(){
			$cursos = selectCursos();
			$quantidade_cursos = max(array_keys($cursos));
			return $cursos[$quantidade_cursos];
		}

		function selectDisciplinasAlocadasCurso($id_professor, $id_curso){
			require("Conn.php");
			// Query que relaciona disciplinas, alocações e cursos
			$query = 
			"SELECT d.* 
			FROM disciplinas d
			INNER JOIN alocacoes a ON d.id_disciplina = a.fk_disciplina
			WHERE a.fk_professor = $id_professor 
			AND d.fk_curso = $id_curso";
			
			// Executa usando a função existente e retorna o resultado
			return selectDatabase($query, $conn);
		}

		function selectCursosProfessor($idProfessor){
			require("Conn.php");
			
			// Query que relaciona cursos, disciplinas e alocações
			$query = 
			"SELECT DISTINCT c.* 
			FROM cursos c
			INNER JOIN disciplinas d ON c.id_curso = d.fk_curso
			INNER JOIN alocacoes a ON d.id_disciplina = a.fk_disciplina
			WHERE a.fk_professor = $idProfessor";
			
			// Executa usando a função existente e retorna o resultado
			return selectDatabase($query, $conn);
		}

		function selectEnunciadoId($id_enunciado){
			require("Conn.php");
			return selectDatabase("SELECT * from `enunciados` where `id_enunciado`=$id_enunciado", $conn);
		}
	//cadastros
		function cadastrarCurso($nomeCurso, $objetivoCurso, $eixoCurso){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `cursos`(
					`nome`, `eixo`, `objetivo`
				) 
				VALUES (
					'$nomeCurso', '$eixoCurso', '$objetivoCurso'
				)", 
				$conn
			);
		}

		function cadastrarDisciplina($id_curso, $nomeDisciplina, $ementaDisciplina, $objetivosAprendizagem){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `disciplinas`(
					`fk_curso`, `nome`, `ementa`, `objetivos_aprendizagem`
				) 
				VALUES (
					$id_curso, '$nomeDisciplina', '$ementaDisciplina', '$objetivosAprendizagem'
				)", 
				$conn
			);
		}
		
		function cadastrarEnunciado($id_disciplina, $titulo, $texto){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `enunciados`(
					`fk_disciplina`, `titulo`, `texto`
				) 
				VALUES (
					$id_disciplina, '$titulo', '$texto'
				)", 
				$conn
			);
		}

		function cadastrarQuestao($id_enunciado, $textoQuestao, $dificuldade){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `questoes`(
					`fk_enunciado`, `pergunta`, `dificuldade`
				) VALUES (
					$id_enunciado,'$textoQuestao', '$dificuldade'
				)", 
				$conn
			);
	
		}

		function cadastrarAlternativas($idQuestao, $alternativaA, $alternativaB, $alternativaC, $alternativaD, $alternativaE, $indiceCorreta) {
			require("Conn.php");
			// Sanitiza o ID da questão (proteção básica contra injeção SQL)
			$idQuestao = intval($idQuestao);
			
			// Array com as alternativas e seus índices
			$alternativas = [
				0 => $alternativaA,
				1 => $alternativaB,
				2 => $alternativaC,
				3 => $alternativaD,
				4 => $alternativaE
			];
			
			// Verifica se o índice da alternativa correta é válido
			if (!isset($alternativas[$indiceCorreta])) {
				throw new Exception("Índice da alternativa correta inválido.");
			}
			// Insere cada alternativa no banco de dados
			foreach ($alternativas as $indice => $textoAlternativa) {
				// Define se a alternativa é a correta
				$isCorreta = ($indice == $indiceCorreta) ? 1 : 0;
				
				// Monta a query de inserção
				$query = sprintf(
					"INSERT INTO alternativas (`fk_questao`, `texto_alternativa`, `is_correta`) 
					 VALUES ($idQuestao, '{$conn->real_escape_string($textoAlternativa)}', $isCorreta)",
					
				);
				
				// Executa a query usando a função insertDatabase
				$resultado = insertDatabase($query, $conn);
				
				// Se houver erro em alguma inserção, retorna false
				if (!$resultado) {
					return false;
				}
			}
			
			// Retorna true se todas as inserções forem bem-sucedidas
			return true;
		}

		function cadastrarFeedback($id_questao, $feedback_texto){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `feedbacks`(
					`fk_questao`, `feedback_texto`
				) VALUES (
					$id_questao, '$feedback_texto'
				)", 
				$conn
			);
		}

		function cadastrarCoordenador($nomeCoordenador, $dataNascimento, $emailInstitucional, $senha){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `coordenadores`(
					`nome`, `data_nascimento`, `email_institucional`, `senha`
				) 
				VALUES (
					'$nomeCoordenador', '$dataNascimento', '$emailInstitucional', '$senha'
				)", 
				$conn
			);
		}

		function cadastrarProfessor($fk_coordenador, $nome, $dataNasc, $emailInstitucional, $senha){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `professores`(
					`fk_coordenador`,`nome`, `data_nascimento`, `email_institucional`, `senha`
				) 
				VALUES (
					$fk_coordenador, '$nome', '$dataNasc', '$emailInstitucional', '$senha'
				)", 
				$conn
			);
		}

		function cadastrarAluno($nomeAluno, $dataNascimento, $emailInstitucional, $senha){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `alunos`(
					`nome`, `data_nascimento`, `email_institucional`, `senha`
				) 
				VALUES (
					'$nomeAluno', '$dataNascimento', '$emailInstitucional', '$senha'
				)", 
				$conn
			);
		}

		function cadastrarAlocarDisciplina($idCoordenador, $idProfessor, $idDisciplina){
			require("Conn.php");
			return insertDatabase(
				"INSERT INTO `alocacoes`(
					`fk_coordenador`,`fk_professor`, `fk_disciplina`
				) 
				VALUES (
					$idCoordenador, $idProfessor, $idDisciplina
				)", 
				$conn
			);
		}

		

		
	//funcionamento do sistema
		function sanitizarDados($data) {
			return htmlspecialchars(trim($data));
		}
	
		function gerarProvaAleatoria() {
			try {
				// Carrega todos os dados usando as funções existentes
				$todosEnunciados = selectEnunciados();
				$todasQuestoes = selectQuestoes();
				$todasAlternativas = selectAlternativas();
		
				// Passo 1: Filtrar enunciados que possuem questões
				$enunciadosComQuestoes = [];
				foreach ($todosEnunciados as $enunciado) {
					foreach ($todasQuestoes as $questao) {
						if ($questao[1] == $enunciado[0]) { // Verifica fk_enunciado
							$enunciadosComQuestoes[] = $enunciado;
							break;
						}
					}
				}
		
				// Verifica se há enunciados suficientes
				if (count($enunciadosComQuestoes) < 5) {
					throw new Exception("Não há enunciados suficientes com questões");
				}
		
				// Embaralha e seleciona 5 enunciados
				shuffle($enunciadosComQuestoes);
				$enunciadosSelecionados = array_slice($enunciadosComQuestoes, 0, 5);
		
				$prova = [];
		
				foreach ($enunciadosSelecionados as $enunciado) {
					// Passo 2: Filtrar questões do enunciado
					$questoesDoEnunciado = array_filter($todasQuestoes, function($questao) use ($enunciado) {
						return $questao[1] == $enunciado[0]; // fk_enunciado
					});
		
					// Seleciona questão aleatória
					shuffle($questoesDoEnunciado);
					$questaoSelecionada = $questoesDoEnunciado[array_rand($questoesDoEnunciado)];
		
					// Passo 3: Filtrar alternativas da questão
					$alternativasDaQuestao = array_filter($todasAlternativas, function($alternativa) use ($questaoSelecionada) {
						return $alternativa[1] == $questaoSelecionada[0]; // fk_questao
					});
		
					// Verifica e embaralha alternativas
					if (count($alternativasDaQuestao) < 5) {
						throw new Exception("Questão não possui 5 alternativas");
					}
					shuffle($alternativasDaQuestao);
		
					// Formata as alternativas
					$alternativasFormatadas = array_map(function($alt) {
						return [
							'texto' => $alt[2], // texto_alternativa
							'correta' => (bool)$alt[3] // is_correta
						];
					}, array_slice($alternativasDaQuestao, 0, 5));
		
					// Adiciona ao array da prova
					$prova[] = [
						'enunciado' => $enunciado[2], // texto do enunciado
						'questao' => $questaoSelecionada[2], // pergunta
						'alternativas' => $alternativasFormatadas
					];
				}
		
				return $prova;
		
			} catch (Exception $e) {
				error_log($e->getMessage());
				return null;
			}
		}

?>
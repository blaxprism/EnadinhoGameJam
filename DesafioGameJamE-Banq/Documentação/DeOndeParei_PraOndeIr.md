# De onde parei e pra onde ir

## Feito

- Terminei a parte de cadastro de enunciado+questão
- Corrigido o problema dos índices de enunciados
- Editar a tabela de enunciados e ligar eles a disciplinas
- Criar a parte de cadastrar Questão a partir de uma lista de enunciados que já foram criados
- Fazer uma partida ter várias questões
- Tela de feedback para várias questões
- Colocado iteração de 5 questões por partida.
- Criada a parte de cadastro de disciplinas e cadastro de cursos
- Editar a tabela de questões e permitir selecionar dificuldade da pergunta no cadastro de questão
- Arquivo de functions mais organizado
- Só permitir que coordenadores acessem páginas de coordenadores
- Criado a alocação de disciplina para professor
- login professor realizado
- refatorar a seleção de cadastro enunciado para que o professor só possa cadastrar enunciados da disciplina dele, o mesmo para questões

## Fazer

colocar o navbar em todas as páginas, depois do session_start, ou colocar o sessionstart em todas antes do código sequer começar

## Objetivos

- Criar telas de confirmação final antes de cadastrar coisas no banco de dados
- Separar 5 questões Enade e salvar um txt ou num insert no BD

### Geral

- Criar um texto para a página inicial
- Criar o design final das páginas

### Coordenador

- edições
- exclusões
- visualizações de dados

### Professor

- corrigir a chave estrangeira de alternativa certa, não está seguindo a forma correta da cardinalidade, o certo é que a fk fique na tabela de questões <!-- fazer isso depois de todo o resto do professor e do aluno-->

- Criar uma coluna fonte na tabela enunciado

### Aluno

- Permitir jogar apenas em caso de ter pelo menos 5 enunciados no banco de dados
- Criar uma função selectEnunciadoCurso para criar a partida a partir da seleção de um curso, da forma que está, a partida mistura os cursos criados e as disciplinas criadas
- Implementar a gamificação das partidas
- Criar um rank de usuários
- Criar "desafios" com conquistas que premiem o jogador com badges
- Pular, eliminar duas alternativas erradas, dica
- Criar Registro de partidas jogadas

### Qualidade de Vida e Funcionamento do Sistema

- Criar perfil para os usuários, para que possam editar seus dados
- criar "esqueci a senha"
- Depois do banco pronto
  - Criar uma função para verificar se:
    - Existem cursos cadastrados
    - Existem disciplinas cadastradas para aquele curso
    - Existem enunciados cadastrados para aquela disciplina
    - Existem questões cadastradas para aquele enunciado
    - Existem feedbacks cadastrados para aquela questão
    - Quantos enunciados existem no banco
    - Quantos enunciados existem no banco para aquela disciplina

- Verificar se os valores inseridos no banco já não existem antes de inserir onde for pertinente, como nas tabelas de usuários, tabelas de cursos, tabelas de enunciados e questões, e tabela de alternativas

- Criar tabelas para registros dos usos do sistema para fins de analise de dados posterior
- regex valores de formulários

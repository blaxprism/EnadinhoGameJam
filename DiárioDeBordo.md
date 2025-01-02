# Diário de bordo - Desafio de programação EnadinhoGameJam

## Explicando o desafio

O desafio é basicamente, desenvolver cinco vezes o mesmo projeto em escopos diferentes e em períodos de tempos diferentes, sendo os seguintes prazos:

1. 10 minutos
2. 1 hora
3. 6 horas
4. 12 horas
5. 24 horas

Porém como esse desafio é pensado para ter apenas o fim em si mesmo, sendo apenas um desafio e eu realmente preciso desenvolver o software de questões para simulados do ENADE para faculdade, resolvi adaptar o desafio, também por normalmente esse desafio ser realizado usando uma game engine e o desenvolvimento nelas é mais prático, resolvi adaptar o desafio para "desenvolvendo esse projeto em 24 horas", onde irei totalizar ao final do desafio 24 horas, os prazos são os seguintes:

1. 30 minutos
2. 1 hora + 30 minutos anteriores
3. 6 horas - 1 hora e meia anteriores
4. 12 horas - 6 horas anteriores
5. 24 horas - 12 horas anteriores

Também estabeleci algumas regras para o desenvolvimento

* Não posso consultar nenhum outro código que eu já desenvolvi
* Posso usar qualquer ferramenta de desenvolvimento, como IA, no-code, Low code, bibliotecas e frameworks, porém caso eu tivesse alguma duvida, ou alguma delas atrasasse meu desenvolvimento, eu deveria lidar com isso durante os prazos do projeto, sem acréscimos de tempo ou tempo que não seria contabilizado.
* Não posso elaborar nenhum planejamento fora do tempo que não possa ser feito de cabeça, como anotar o que falta fazer no projeto, se for fazer isso deve ser durante o prazo
* O diário de bordo não deve ser realizado dentro do tempo para desenvolver o projeto, já que é apenas para fins de documentação do desafio.
* Os prazos para desenvolvimento não precisam ser necessariamente corridos de uma vez, podendo ter pausas no timer que deverá ser anotado para que uma vez que se retorne para o desenvolvimento do projeto, conte corretamente o tempo gasto para desenvolver(resumindo, não é necessário programar por 12 horas direto durante a ultima etapa, ou deixar o timer rolando enquanto almoço ou realizo alguma tarefa não relacionada com desenvolver o projeto)
* A ideia é seguir o principio do desenvolvimento embrionário e ir desenvolvendo conforme as necessidades do projeto e não ter um planejamento muito bem definido de como tudo deve ser feito desde o início visando o produto final

## Meia hora

Durante a primeira meia hora desenvolvendo(que eram pra ser apenas 10 minutos, porém nada estava pronto no site), desenvolvi uma tela que possuía apenas uma questão inserida de forma hard-coded, que o usuário escolhia uma alternativa e ela era validada por uma função JS, retornando se foi a resposta certa ou errada, tive problemas com o retorno das funções js quando tentei usar um for dentro de uma função, já que o for em js utiliza uma closure para ser executado, adicionei também css para não desenvolver numa tela completamente em branco.
Nesse ponto havia apenas um arquivo index.html que poderia facilmente ser dividido para um arquivo index.html, um arquivo style.css e um app.js.

## Uma hora + meia hora

Utilizando tudo que criei nas primeiras meia hora e desenvolvendo por mais uma hora, obtive um resultado interessante de desenvolver porém sem usos práticos, passei a usar PHP ao invés de utilizar JS (pois já tenho mais costume em como a linguagem funciona e não estava com vontade de passar raiva com closures no JS), tornei a página um pouco mais dinâmica, criei um arquivo com um array que possuía dentro dele arrays que continham todas as informações sobre um determinado enunciado, ou seja, em cada posição do array maior eu possuía um array com informações de um enunciado, como seu titulo e seu texto, além disso, criei uma função de chamar o array de enunciados e aleatorizar um enunciado dentre todos e salvar seus valores numa variável.
Também fiz a mesma estrutura com a parte da questão, sendo salvo a qual enunciado ela pertencia, a pergunta feita sobre o enunciado e as alternativas(de A até E) e qual a alternativa correta, usando o valor no padrão de indices de array(começando em 0).
ao fim do tempo, apenas exibia um enunciado e uma questão, porém a questão não necessariamente era correspondente a qual enunciado ela era identificada para conectada.
nesse ponto o código possuía quatro arquivos, sendo eles,

* Index.php -> Tela de questão;
* Feedback.php -> Recebia a alternativa escolhida e qual era a certa;
* Banco.php -> Página onde estavam os arrays de enunciados e questões;
* Functions.php -> Para organizar, todas as funções PHP estavam nesse arquivo.

A seguir um trecho de código de como o array de enunciados e de questões estava estruturado a esse ponto.

```
//Exemplo de array utilizado para armazenar enunciados
[
 [
  0, //ID do enunciado 1(será usado mais pra frente no BD)
  'titulo do enunciado 1',
  'Texto do enunciado 1'
 ],
 [
  1, //ID do enunciado 2(será usado mais pra frente no BD)
  'titulo do enunciado 2',
  'Texto do enunciado 2'
 ],
]

//Exemplo de array utilizado para armazenar questões
[
 [
  0, //ID da questão
  0, //FK do ID do enunciado
  'Pergunta?',
  'RespostaA',
  'RespostaB',
  'RespostaC',
  'RespostaD',
  'RespostaE',
  'RespostaCerta'
 ],
 [
  1, //ID da questão
  1, //FK do ID do enunciado
  'Pergunta?',
  'RespostaA',
  'RespostaB',
  'RespostaC',
  'RespostaD',
  'RespostaE',
  'RespostaCerta'
 ]
]
```

## Seis horas - Uma hora e meia
//Em produção

* Transformar o array em uma tabela em um banco de dados
* Integrar o código a um banco de dados
* Corrigir o problema da aleatoriedade das questões
* Outros objetivos que ainda não foram elaborados e serão apenas durante o desafio

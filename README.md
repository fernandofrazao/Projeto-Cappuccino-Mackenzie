# Projeto-PPADS

---
Proposta de desenvolvimento:
Aplicativo para Recomendação de Filmes, Séries e Livros

---


**Índice**

- [1. Introdução](#1-introdução)
- [2. Objetivos funcionais](#2-informações-sobre-a-empresa)
- [3. Objetivos não-funcionais](#3-escopo-do-projeto)
- [4. Interessados](#4-interessados)
- [5. Objetivos funcionais](#5-objetivos-funcionais)
- [6. Objetivos não-funcionais](#6-objetivos-não-funcionais)
- [7. COTS (Commercial Off-The-Shelf)](#7-cots-commercial-off-the-shelf)
- [8. Casos de uso](#8-casos-de-uso)
  - [8.1. Acessar funções restritas](#81-acessar-funções-restritas)
  - [8.2. Efetuar registro](#82-efetuar-registro)
  - [8.3. Efetuar seu próprio pedido](#83-efetuar-seu-próprio-pedido)
  - [8.4. Efetuar pedido para o cliente](#84-efetuar-pedido-para-o-cliente)
- [9. Wireframes](#9-wireframes)
- [10. Diagrama de classes de domínio](#10-diagrama-de-classes-de-domínio)



# 1. Introdução
A promoção do engajamento de colaboradores é fundamental para o desenvolvimento de bons trabalhos no mundo corporativo. Nesta linha, empresas buscam formas de criar situações de compartilhamento de experiências para que as pessoas envolvidas se conheçam e promovam sinergia entre as pessoas, de modo a promover maior desempenho em grupos multidisciplinares, também conhecidos por Squads.
Considerando que os serviços de streaming nunca estiveram tão em alta graças à pandemia do coronavírus, bem como, escolher entre milhares de filmes, séries ou livros disponíveis pode ser uma tarefa um tanto quanto estressante.
Sendo assim, nossa empresa, optou por criar um aplicativo de recomendação para Filmes, Séries e Livros, capaz de permitir acesso e participação dos nossos colaboradores, de modo a prover interação com contribuições na forma de dicas e recomendações sobre filmes, séries e livros.




# 2. Objetivos funcionais


a.	Qualquer pessoa da empresa pode se registrar nesta rede social.


b.	No momento do registro, o usuário deverá fornecer os seguintes dados: nome completo, username que deseja utilizar, senha que usará para acessar o sistema, data de nascimento, cidade e estado.


c.	Cada membro poderá, a qualquer momento, atualizar os dados do seu perfil.
 
d.	Após acessar o sistema, cada membro poderá avaliar os filmes, séries e livros que desejar.


e.	Para entrar uma avaliação, o membro seleciona o tipo de item (livro, filme ou série), busca pelo nome do item, atribui uma nota de 0 a 10 (somente valores inteiros) e escreve os comentários que julgar relevantes (com limite de 1024 caracteres).


f.	O membro pode cadastrar um novo filme, série ou livro. Este novo item deve ser validado por um administrador de conteúdo antes de disponibilizar aos demais membros. Caso item sugerido já exista, o administrador indica o item e vincula a avaliação ao item já existente.


g.	Ao cadastrar um livro, é necessário fornecer as seguintes informações: título, autor(es), editora, país, ano de lançamento.


h.	Ao cadastrar um filme, é necessário fornecer as seguintes informações: título, diretor, elenco principal, país, ano.


i.	Ao cadastrar uma série, é necessário fornecer as seguintes informações: título, diretor, elenco principal, país, ano, número de temporadas.


j.	Após o sistema ter pelo menos 10 membros cadastrados e cada membro entrar pelo menos 10 avaliações, o sistema passará a apresentar para cada membro recomendações de filmes, séries e livros que podem ser de seu interesse.


k.	O sistema deverá utilizar um algoritmo colaborativo para oferecer as recomendações a um determinado membro. Isto quer dizer que o sistema deverá identificar membros que têm um perfil semelhante com base nas avaliações já realizadas e oferecer recomendações com base no que estes membros avaliaram bem.


l.	Cada membro terá uma página pessoal que listará todas as avaliações que ele já realizou. Os membros logados poderão pesquisar por outros membros pelo nome e acessar as suas páginas pessoais.


m.	Cada membro poderá propor relacionamento de amizade a outro membro. O relacionamento de amizade será estabelecido quando o outro membro aceitar a proposta.
 
n.	Os membros que possuem relacionamento de amizade podem adicionar comentários às avaliações feitas pelo outro.


o.	Um membro poderá dar um "joinha" nas avaliações de outro membro. Em cada avaliação aparecerá o número de "joinhas" que ela já recebeu. O membro que deu o “joinha” para a avaliação poderá retirá-lo posteriormente se assim desejar.


p.	A página pessoal de um membro mostrará, além das avaliações que ele fez, uma lista com os seus amigos e o número de ”joinhas” que já recebeu em suas avaliações.


q.	Quando um membro acessar a página de outro, o sistema deverá mostrar os amigos que eles têm em comum.


r.	Sempre que um membro acessar o sistema, ele deverá receber a sugestão de 3 membros que poderiam ser seus amigos. O critério será sugerir membros que têm preferências semelhantes, com base nas avaliações já realizadas.


s.	Cada filme, série e livro deverá ter uma página no sistema que reunirá todas as avaliações já realizadas daquele item, ordenadas pelo número de "joinhas" recebidos.


t.	O sistema deverá permitir que o gerente do serviço consulte:
a.	O número médio de amigos dos membros da rede social.
b.	Uma lista com os 10 membros mais conectados (com o maior número de amigos).
c.	Um gráfico mostrando a relação entre o número de amigos e o estado onde mora.


# 3. Objetivos não-funcionais

a. O sistema deverá estar completamente operacional pelo menos 99.99% do tempo.

b. O tempo fora do ar após uma falha não deverá exceder 0.5 hora.

c. O vendedor deverá ser capaz de utilizar o sistema em seu trabalho após um treinamento de 2 dias.

d. Um usuário que já sabe qual produto lhe interessa deve ser capaz de localizar e ver a página do produto em 20 segundos.

e. O número de páginas web pelas quais o usuário precisa navegar para acessar a informação do produto a partir da página principal não deve ser maior do que 2.

f. O sistema deverá ser capaz de suportar 1000 usuários simultâneos.

g. O tempo médio para visualizar uma página web em uma conexão de 1Mbps não deverá exceder 5 segundos.

h. O tempo médio para baixar e visualizar um *whitepaper* em uma conexão de 1Mbps não deverá exceder 10 segundos.

i. O sistema deverá oferecer acesso protegido por senha para páginas web que são acessadas somente por funcionários.

j. Os dados de transação devem ser transmitidos de forma criptografada.

k. O sistema deverá ser capaz de acomodar novos produtos e novas linhas de produto sem necessidade de alterações na sua implementação.

l. O site web do sistema deverá ser visível nos navegadores Mozilla Firefox (versão $\ge$ 75.0.0), Google Chrome (versão $\ge$ 81.0.0) e Microsoft Edge (versão $\ge$ 5.0.0).

m. O sistema deverá disponibilizar uma página web que explica como navegar pelo site. A página deverá ser customizada com base nas páginas que o usuário pode acessar. Esta página de ajuda deverá ser acessível a partir de todas as outras páginas.

o. O sistema deverá ter interface com

* Uma base de dados relacional para informações dos produtos e dos pedidos.
* O sistema atual de contabilidade da empresa.
* O sistema atual do departamento de logística.
* O tradutor (a ser adquirido).
* A engine de pesquisa (a ser adquirida).


# 5. Casos de uso

A figura a seguir apresenta o diagrama de casos de uso:
![caso de uso](https://user-images.githubusercontent.com/45408379/117559006-060c1d80-b058-11eb-839a-d03cbd00bcd3.jpeg)


# 9. Wireframes

A figura a seguir apresenta o wireframe de usuário:
![cadastro usuario](https://user-images.githubusercontent.com/45408379/117559097-e1647580-b058-11eb-872a-b8588b5b22c6.jpeg)

A figura a seguir apresenta o wireframe selecionar item para avaliar:
![selecionar item](https://user-images.githubusercontent.com/45408379/117559245-09080d80-b05a-11eb-811f-75d03eceba49.jpeg)

A figura a seguir apresenta o wireframe cadastrar novo item:
![WhatsApp Image 2021-03-19 at 21 45 38](https://user-images.githubusercontent.com/45408379/117559284-62703c80-b05a-11eb-9bc8-7eeb05492ae4.jpeg)

A figura a seguir apresenta o wireframe cadastar novo livro:
![WhatsApp Image 2021-03-19 at 22 10 02](https://user-images.githubusercontent.com/45408379/117559419-75374100-b05b-11eb-93d6-780f4122160b.jpeg)



# 10. Diagrama de classes de domínio

> (em elaboração)

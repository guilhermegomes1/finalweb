drop database if exists web20191filmes;
create database if not exists web20191filmes;

use web20191filmes;

-- UP
create table users (
    id          int primary key auto_increment,
    name        varchar(255),
    email       varchar(255),
    password    varchar(255)
);

create table movies (
    id       int primary key auto_increment,
    name     varchar(255),
    genre    varchar(255),
    year     int,
    duration int,
    synopsis text
);

create table users_movies (
    user_id  int,
    movie_id int,
    watched  boolean,
    grade    int,
    primary key (user_id, movie_id),
    foreign key (user_id) references users(id),
    foreign key (movie_id) references movies(id)
);

-- ENDUP

create user if not exists web20191 identified by 'web20191';
grant all privileges on web20191filmes.* to web20191;

-- SEED
insert into users (name, email, password) values
    ('Tony Stark', 'tony@stark.co', 'pepper'),
    ('Bruce Banner', 'bruce@avengers.com', 'natasha'),
    ('Bruce Wayne', 'bruce@wayne.tech', 'alfred');

insert into movies (name, genre, year, duration, synopsis) values
    ('Iron Man', 'Action', 2008, 126, '...'),
    ('Avengers', 'Action', 2012, 160, '...'),
    ('Batman vs Superman', 'Action', 2016, 183, '...'),
    ('Ant Man', 'Action',  2015, 118, '...');

insert into users_movies (user_id, movie_id, watched, grade) values
    (1, 1, true, 10),
    (1, 2, true, 9),
    (1, 3, false, null),
    (2, 2, true, 8),
    (2, 3, false, null),
    (3, 3, true, 7);
-- ENDSEED


--
-- INSTRUÇÕES
--
-- Este é um sistema rudimentar de cadastro de filmes, onde usuários podem cadastrar os filmes que já assistiram ou que têm intenção de assitir.
--
-- (1,0) Deve ter uma tela inicial que lista todos os filmes já cadastrados na plataforma, ordenados pela quantidade de pessoas que adicionaram (quanto mais pessoas assistiram / querem assistir, melhor a colocação do filme).
-- (1,0) Deve ter uma tela de registro de usuários, onde novos usuários podem se cadastrar. Não deve ser permitido que um usuário se cadastre com um e-mail que já está cadastrado no sistema.
-- (1,0) Deve ter uma tela de login, onde um usuário pode acessar o sistema (voltando para a tela inicial, com mais opções (descritas adiante)), apenas com e-mail e senha corretos.
-- (1,0) A tela inicial para usuários logados deve listar todos os filmes já cadastrados, priorizando os filmes que o usuário tem a intenção de assistir, seguidos pelos que ele já assistiu, seguidos pelos demais.
-- (1,0) Na tela para usuários logados deve ter: (1) um link para adicionar um novo filme, (2) para cada filme, dois links, com a seguinte regra: se o usuário marcou como assistido, ele pode marcar como "para assistir" ou "não assisti"; se o usuário marcou como "para assistir", ele pode marcar como "assistido" ou "não assisti"; se o usuário não marcou o filme, ele pode marcar como "assistido" ou "para assistir".
-- Rota 1:
    -- (2,0) O usuário, após logado, deve ter um link com uma tela onde ele pode atualizar seus dados.
    -- (1,0) Deve ter uma tela onde um usuário pode adicionar um novo filme, com os seus dados
    -- (2,0) Cada filme deve ter um link com uma tela para editar seus dados.
-- Rota 2:
    -- (1,0) O link de "assistido" deve atualizar a coluna "watched" na tabela users_movies caso já tenha um registro para o usuário/filme, ou adicionar um novo registro caso não haja.
    -- (1,0) O link de "para assistir" deve atualizar a coluna "watched" na tabela users_movies caso já tenha um registro para o usuário/filme, ou adicionar um novo registro caso não haja.
    -- (1,0) O link de "não assisti" deve remover o registro para o usuário/filme da tabela users_movies.
    -- (2,0) As ações de "assistido" / "para assitir" / "não assisti" devem ser executadas de forma assíncrona, atualizando naturalmente as linhas na tabela de exibição.
-- Extra:
    -- (1,0) Para filmes marcados como "assistido", adicione um formulário onde o usuário pode dar uma nota ao filme, numa escala de 0 a 10. Esta nota deve ficar na coluna "grade" da tabela "users_movies", e deve ser mostrada naturalmente na tabela (você pode usar um elemento "select" para isso).
    -- (1,0) Faça a submissão desse formulário ser feita de forma assíncrona.
    -- (1,0) Deixe seu sistema seguro contra ataques de SQL injection.
    -- (1,0) Utilize um framework de CSS / JS de forma a melhorar a aparência e usabilidade do sistema.

--
-- Consultas mais complexas =)
--
-- select *, (select count(*) from users_movies where movie_id = movies.id) count_users from movies order by count_users desc, name; -- seleciona os filmes ordenados pela quantidade de pessoas que os adicionaram
-- select movies.*, users_movies.watched watched from movies left join users_movies on users_movies.movie_id = movies.id and users_movies.user_id = 2 order by coalesce(users_movies.watched, 2), movies.name; -- lista todos os filmes, priorizando os que o usuário 2 já assistiu, seguido pelos não assistidos, seguido pelos não marcados

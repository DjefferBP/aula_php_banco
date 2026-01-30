create database senai;
use senai;


create table alunos (
	id int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null
);

select last_insert_id() AS novo_id;

select * from alunos;

create table notas(
	id int primary key auto_increment,
    aluno_id int,
    materia varchar(100) not null,
    nota decimal (5, 2) not null,
    nota2 decimal (5,2) not null,
    nota3 decimal (5,2) not null,
    data_avaliacao datetime,
    
    foreign key (aluno_id) references alunos(id)
    on delete cascade
);

insert into notas (aluno_id, materia, nota, data_avaliacao) VALUES(2, 'Português', 80, '2026-01-30 16:33:25');

select * from notas;

select a.id as id_aluno, a.nome as Nome, a.email as Email, n.materia as Materia, n.data_avaliacao
from notas n
join alunos a on n.aluno_id = a.id;


drop table alunos;
drop table notas;
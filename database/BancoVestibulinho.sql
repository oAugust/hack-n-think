create database db_vestibulinho;

use db_vestibulinho;

create table tb_curso(
	id int not null auto_increment,
    nm_curso varchar(255),
    ds_curso longtext,
    primary key(id)
);

create table tb_user(
	id int not null auto_increment,
    nm_user varchar(255),
    ds_email longtext,
    ds_password varchar(100),
    nr_celular varchar(20),
    id_curso int,
    primary key(id),
    foreign key(id_curso) references tb_curso(id)
);

insert into tb_curso values
(null, "Desenvolvimento de Sistemas", "No curso os alunos aprendem a fazer programa."),
(null, "Administração", "Não tenho ideia do que fazem."),
(null, "Jogos Digitais", "Fazem jogos.");

insert into tb_user values
(null, "Laryssa Pereira da Silva", "laryssa20@gmail.com", "12345", "13996897698", "2"),
(null, "Júlia Lopes Bitencourt", "jbitencourt200@gmail.com", "6789", "13997721315", "1"),
(null, "Pedro Augusto do Nascimento", "pedrorcpla@gmail.com", "98765", "13988121415", "3");

select * from tb_user;
Create database exercicios;

use exercicios;

Create table area_
(
	idArea int primary key
);


Create table livro

(
    codigo int auto_increment primary key,
    nome varchar(45),
    edicao int,
    ano int,
    idArea INT,
    FOREIGN KEY (idArea) REFERENCES area_(idArea)
);



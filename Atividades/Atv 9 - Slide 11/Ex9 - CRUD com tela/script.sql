Create database crud;

use crud;

Create table cliente
(
    codigo int auto_increment primary key,
    nome varchar(45),
    email varchar(45)
);

insert into cliente(nome,email)values('carlos','carlos@gmail.com');
insert into cliente(nome,email)values('joão','joao@gmail.com');

select * from  cliente;

INSERT INTO cargo(descricao)
VALUES ("Preparação"), ("Conferência e Embalagem"), ("Entrega");

INSERT INTO categoria(descricao)
VALUES ("Bebidas"), ("Mercearia"), ("Produto de limpeza"), ("Higiene Pessoal"), ("Frios e Laticinios"), ("Carnes, aves e peixes"), ("Congelados"), ("Hortifruti");

INSERT INTO `status`(descricao)
VALUES ("Em preparação"), ("Em conferência"), ("Esperando entrega"), ("Concluído");

INSERT INTO `marca`(descricao)
VALUES ("Santa Clara"), ("União"), ("Betânia"), ("Kicaldo"), ("Davaca"), ("Seda"), ("Sadia"),("Seara"),("Ceasa"), ("AudaX"), ("Crystal"),("Del Valle"), ("Swift");

INSERT INTO produto(nome, imagem, valor, tipo, embalagem, peso, categoria_idcategoria, marca_idmarca, desconto)
VALUES ("Café Santa Clara Vácuo", "CafeSantaClaraVacuo.jpg", 8.00, "Torrado", "Vacuo", "250g", 2, 1, 0.25),
	   ("Açúcar Refinado União", "AcucarRefinadoUniao.jpg", 5.00, "Refinado", "Pacote", "1kg", 2, 2, 0.25),
       ("Iogurte Morango Betânia", "IogurteMorangoBetania.jpg", 5.50, "Integral", "Pote", "1kg", 5, 3, 0.25),
       ("Feijão Carioca", "FeijaoCarioca.jpg", 7.00, "N/A", "Pacote", "1kg", 2, 4, 0.25),
	   ("Queijo mussarela Davaca", "mussareladavaca.png", 16.00, "N/A", "Vacuo", "300g", 5, 5, 0.1),
	   ("Condicionador Seda Óleo Hidratação", "condicionador.png", 8.50, "N/A", "Garrafa", "325ml", 4, 6, 0.01),
	   ("Brócolis Congelado Sadia", "brocolis.jpg", 18.30, "Congelado", "Saco", "300g", 7, 7, 0.02),
	   ("Tomate", "tomate.png", 5.76, "Fresco", "Kg", "1Kg", 8, 9, 0.03),
	   ("Cenoura", "cenoura.png", 3.57, "Fresco", "Kg", "1Kg", 8, 9, 0.03),
	   ("Suco de Uva", "sucodeuva200ml.png", 2.50, "N/A", "Caixa", "200ml", 1, 12, 0.2),
	   ("Carne Moida", "carnemoida.png", 20.00, "N/A", "Granel", "1Kg", 6, 13, 0.02);




INSERT INTO produto(nome, imagem, valor, tipo, embalagem, peso, categoria_idcategoria, marca_idmarca)
VALUES	   ("Queijo Prato(Lanche) Davaca", "queijoprato.png", 15.00, "Lanche", "Vacuo", "300g", 5, 5 ),
		   ("Queijo Coalho Davaca", "queijocoalho.png", 20.00, "N/A", "Vacuo", "500g", 5, 5 ),
		   ("Shampoo Seda Pretos Luminosos", "shampoo.png", 8.00, "N/A", "Garrafa", "325ml", 4, 6),
		   ("Pizza Mussarela Seara", "pizzacongelada.png", 18.00, "N/A", "caixa", "440g", 7, 8),
		   ("Cloro AudaX Butterfly","cloro.png", 17.20, "N/A", "Garrafa", "5L", 3, 10),
		   ("Água Mineral", "aguaCrystal.png", 2.00, "Sem gás", "Garrafa", "500ml", 1, 11),
		   ("Salmão", "salmao.png", 52.00, "congelado", "N/A", "500g", 6, 9);





       
INSERT INTO funcionario(datacontratacao, cargo_idcargo) 
VALUES ("2023-07-03", 1), ("2023-07-03", 2), ("2023-07-03", 3);

INSERT INTO usuario (nome, email, senha, cpf, funcionario_idfuncionario)
VALUES	("Preparação","prep@gmail.com","12345678","66309184225", 1),
		("Conferência e embalagem","conf@gmail.com","12345678","38902413304", 2),
		("Entrega","entrega@gmail.com","12345678","91552469455", 3);

/*COMANDOS DE TABELA DO USUÁRIO
INSERT INTO usuario (nome, email, senha, cpf, cliente_idcliente)
VALUES	("Dexter Wheeler","sed.sapien@icloud.net","JBP60DVC2UZ","66309184225", 1),
		("Serena Ochoa","cras@outlook.net","ZMI41BIR0IL","38902413304", 2),
		("Demetria Stanley","nunc.mauris@icloud.ca","SLK83GOT1TQ","91552469455", 3),
		("Paloma Oneal","ut.sagittis@icloud.com","VHT32UVC1YX","38518618398", 4),
		("Xyla Avila","aliquam.nisl@google.org","UKZ20WKD8IR","95110571889", 5),
		("Virginia Farrell","neque.et.nunc@icloud.ca","QSY47FIG4OS","64022132039", 6),
		("Jacqueline Gaines","vehicula.et@protonmail.couk","YBP75AAK6JO","71606464846", 7),
		("Maia Talley","mus.donec@outlook.ca","WIT33KJJ7AP","19753168330", 8),
		("Joshua Bell","tincidunt@aol.org","TKB27IJW5WN","54269803859", 9),
		("Elmo Larson","praesent.eu@icloud.edu","JTU32FYG0CL","67935336638", 10),
		("Jolene Kent","mi.aliquam@yahoo.edu","VNQ68EGW2CS","50223979976", 11),
		("Sigourney Yang","egestas.urna@yahoo.ca","NYW36JEW1VP","98639617554", 12),
		("Avram Jefferson","mauris@aol.org","KMK58GAI3FT","87413909314", 13),
		("Garrison Gentry","tincidunt@outlook.org","LGR87OQL5QG","49236912484", 14),
		("Quynn Malone","lectus.a.sollicitudin@google.edu","FKC52RNB2XS","62580213953", 15);

 COMANDOS DE TABELA DO CLIENTE
INSERT INTO cliente (telefone, cep, endereco, numero, complemento)
VALUES  ("58914433375","11172212","5364 Magna. St.","401","P.O. Box 354, 3837 Maecenas Road"),
		("78984711124","11942661","9342 Integer Ave","234","231-381 Velit. Rd."),
		("72946193155","11542317","Ap #380-743 Aliquam Street","767","Ap #409-9054 Blandit Ave"),
		("83968523646","11921798","7554 Ac Avenue","887","P.O. Box 162, 868 Tempor Rd."),
		("22987245526","11625620","Ap #682-1862 Libero. Street","753","P.O. Box 286, 6324 Sodales Rd."),
		("67932131631","11779419","Ap #536-1199 A St.","645","780-4483 Ipsum. St."),
		("03929301056","12012255","P.O. Box 582, 5540 Amet Street","982","Ap #690-5806 Justo Road"),
		("17926553758","11537751","9956 Curabitur Rd.","416","Ap #771-2400 Dui. St."),
		("22935414612","11845445","Ap #788-7962 Iaculis Avenue","192","Ap #297-8974 Tempor Av."),
		("20994265123","11973098","Ap #572-1309 Nullam Rd.","53","Ap #721-1690 Nunc St."),
		("43972417556","11360764","Ap #912-3579 Porttitor Road","386","Ap #389-9515 Donec St."),
		("78941398077","11314394","Ap #497-4855 Diam Ave","539","Ap #337-6970 Netus Ave"),
		("60948247469","11781180","763-9241 Risus. Rd.","773","Ap #427-9898 Augue St."),
		("49925978328","11895646","Ap #548-1559 Et St.","69","5482 Ante Av."),
		("74946314448","11830452","617 Et, St.","32","564-9068 Mauris Rd.");*/
        
/* COMANDOS DE TABELA DO PEDIDO
INSERT INTO pedido (valor, datacompra, cliente_idcliente)
VALUES  (100.00, "2023-07-01", 16);

INSERT INTO pedido_has_produto (pedido_idpedido, produto_idproduto, quantidade, valorreferencia)
VALUES  (1, 1, 2, 15.00),
		(1, 2, 1, 4.00);
        
INSERT INTO pedido (valor, datacompra, cliente_idcliente)
VALUES  (80.00, "2023-07-01", 13);

INSERT INTO pedido (valor, datacompra, cliente_idcliente)
VALUES  (70.00, "2023-07-02", 16);

INSERT INTO pedido (valor, datacompra, cliente_idcliente)
VALUES  (80.00, "2023-07-02", 16);
*/

/*
insert into funcionario(datacontratacao, cargo_idcargo) values
("2023-07-03", 1), ("2023-07-03", 2), ("2023-07-03", 3);

INSERT INTO usuario (nome, email, senha, cpf, funcionario_idfuncionario)
VALUES	("Preparação","prep@gmail.com","12345678","66309184225", 1),
		("Conf e emba","conf@gmail.com","12345678","38902413304", 2),
		("Entrega","entrega@gmail.com","12345678","91552469455", 3);

insert into funcionario_has_pedido(funcionario_idfuncionario, pedido_idpedido, datastatus, status_idstatus)
value (1, 1, "2023-07-03", 1);*/


 
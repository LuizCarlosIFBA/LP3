insert into categoria (nome)
values ("Eletroportáteis"), ("Bebidas"), ("Mercearia"), ("Produtos de Limpeza"), ("Higiene Pessoal e Perfumaria");

insert into situacao (nome)
values ("Em aguardo"), ("Preparado"), ("Checado"), ("Empacotado"), ("Em trânsito"), ("Cancelado"), ("Entregue");

insert into estado (nome, sigla)
values ("Acre", "AC"), ("Alagoas", "AL"), ("Amapá", "AP"), ("Amazonas", "AM"), ("Bahia", "BA"), 
("Ceará", "CE"), ("Espírito Santo", "ES"), ("Goiás", "GO"), ("Maranhão", "MA"), ("Mato Grosso", "MT"), 
("Mato Grosso do Sul", "MS"), ("Minas Gerais", "MG"), ("Pará", "PA"), ("Paraíba", "PB"), ("Paraná", "PR"),
("Pernambuco", "PE"), ("Piauí", "PI"), ("Rio de Janeiro", "RJ"), ("Rio Grande do Norte", "RN"),
("Rio Grande do Sul", "RS"), ("Rondônia", "RO"), ("Roraima", "RR"), ("Santa Catarina", "SC"), 
("São Paulo", "SP"), ("Sergipe", "SE"), ("Tocantins", "TO");

insert into cidade (nome, idestado)
values ("Rio Branco", 1), ("Maceió", 2), ("Macapá", 3), ("Manaus", 4),  ("Salvador", 5), 
("Fortaleza", 6), ("Vitória", 7), ("Goiânia", 8), ("São Luís", 9), ("Cuiabá", 10), ("Campo Grande", 11), 
("Belo Horizonte", 12), ("Belém", 13), ("João Pessoa", 14), ("Curitiba", 15),  ("Recife", 16), 
("Teresina", 17), ("Rio de Janeiro", 18), ("Natal", 19), ("Porto Alegre", 20), ("Porto Velho", 21), 
("Boa Vista", 22), ("Florianópolis", 23), ("São Paulo", 24),  ("Aracaju", 25), ("Palmas", 26), 
("Camaçari", 5), ("Dias d'Ávila", 5), ("Feira de Santana", 5), ("Lauro de Freitas", 5), 
("Simôes Filho", 5), ("Alagoinhas", 5), ("Porto Seguro", 5), ("Lençóis", 5), ("Juazeiro do Norte", 6), 
("Ouro Preto", 12), ("Foz do Iguaçu", 15), ("Guarulhos", 24), ("Campos do Jordão", 24);

insert into bairro (nome, idcidade)
values ("Jardim de Alah", 1), ("Ponta Verde", 2), ("Alvorada", 3), ("Adrianópolis", 4), ("Cabula", 5),
("Aldeota", 6), ("Praia do Canto", 7), ("Setor Bueno", 8), ("São Marcos", 9), ("Goiabeiras", 10), 
("Cidade Jardim", 11), ("Belvedere", 12),
("Nazaré", 13), ("Manaíra", 14), ("Água Verde", 15), ("Boa Viagem", 16), ("Fátima", 17), ("Copacabana", 18), 
("Petrópolis", 19),
("Moinhos de Vento ", 20), ("Caiari", 21), ("Caçari", 22), ("Agronômica", 23), ("Consolação", 24), 
("Atalaia", 25), ("Área Sudeste", 26), 
("Gleba A", 27),  ("Santa Terezinha", 28), 
("Parque Bonsucesso", 1), ("Bosque", 1), 
("Portal da Amazônia", 1), ("Jardim Europa", 1), 
("Pajuçara", 2), ("Jatiúca", 2), ("Cruz das Almas", 2),
("Trem", 3), ("Central", 3), ("Santa Inês", 3), 
("Ponta Negra", 4), ("Novo Aleixo", 4), ("Cidade Nova", 4),
("Cajazeiras", 5), ("Itapuã", 5), ("Barra", 5), 
("Pituba", 5), ("Bonfim", 5),
("Brotas", 5), ("Federação", 5), ("Ondina", 5), 
("Pernambués", 5), ("Imbuí", 5), ("Mussurunga", 5), 
("Canela", 5), ("Retiro", 5), ("Pirajá", 5), 
("Meireles", 6), ("Cocó", 6), ("Mucuripe", 6), 
("Jardim Camburi", 7), ("Parque Moscoso", 7), ("Enseada do Suá", 7),
("Setor Oeste", 8), ("Setor Marista", 8), ("Setor Sul", 8),
("Renascença", 9), ("Araçagy", 9), ("Jardim Eldorado", 9),
("Jardim das Américas", 10), ("Quilombo", 10), ("Araés", 10),
("Tiradentes", 11), ("Itanhangá", 11), ("Vilas Boas", 11),
("Savassi", 12), ("Lourdes", 12), ("Pampulha", 12),
("Umarizal", 13), ("Batista Campos", 13), ("Marco", 13),
("Bessa", 14), ("Tambaú", 14), ("Altiplano ", 14),
("Batel", 15), ("Campina do Siqueira", 15), ("Santa Felicidade", 15),
("Pina", 16), ("Boa Vista", 16), ("Casa Amarela", 16),
("Jóquei", 17), ("São Cristóvão", 17), ("Morada do Sol", 17),
("Barra da Tijuca", 18), ("Ipanema", 18), ("Santa Teresa", 18),
("Lagoa Nova", 19), ("Tirol", 19), ("Ponta Negra", 19),
("Auxiliadora", 20), ("Cidade Baixa", 20), ("Bela Vista ", 20), 
("Olaria", 21), ("Arigolândia", 21), ("Embratel", 21), 
("Mecejana", 22), ("Paraviana", 22), ("São Pedro", 22), 
("Coqueiros", 23), ("Jurerê Internacional", 23), ("Cacupé", 23), 
("Liberdade", 24), ("Tatuapé", 24), ("Vila Mariana", 24), 
("Aruana", 25), ("Jardins", 25), ("13 de Julho", 25),
("Área Sul", 26), ("Área Nordeste", 26), ("Área Noroeste", 26), 
("Gleba B", 27), ("Gleba C", 27), ("Gleba E", 27), 
("Parque Verde", 27), ("Bairro dos 46", 27), ("Jardim Limoeiro", 27), ("Dois de Julho", 27), 
("Nova Dias d'Ávila", 28), ("Imbassay", 28);

insert into produto (nome, marca, preco, estoque, nome_imagem, idcategoria)
values ("Fritadeira Air Fryer Sem Óleo Bella Cuccina BCFR02P 3L, 1300W, 127V, Antiaderente, Preto", "Britânia", 249.99, 12, "Airfryer.png", 1),
("Iogurte Parcialmente Desnatado de Morango Garrafa 1.25Kg", "Danone", 16.99, 10, "Iogurte.png", 2),
("Açúcar Refinado Pacote 1kg", "União", 3.78, 128, "Açucar.png", 3),
("Água Sanitária Frasco 2 Litros", "Qboa", 5.25, 72, "AguaSanitaria.png", 4),
("Papel Higiênico Folha Dupla Pacote 16 unidades de 30m", "Personal Vip", 25.07, 36, "PapelHigienico.png", 5),
("Liquidificador Easy Power L-550 Preto - 2 Velocidades 550W", "Mondial", 88.10, 6, "Liquidificador2.png", 1),
("Energético Energy Drink lata 250ml", "Red Bull", 7.10, 59, "Redbull.png", 2),
("Refresco em Pó sabor Uva sachê 18g", "Tang", 0.89, 318, "SucoUvaTang.png", 2),
("Suco Integral de Uva Pet 1,350Litros", "Campo Largo", 8.15, 24, "SucoIntegralUva.png", 2),
("Café Torrado e Moído Tradicional 500g", "Melitta", 15.98, 44, "Café.png", 3),
("Cereal Infantil Milho Pacote 180g", "Mucilon", 5.90, 167, "MingauMucilon", 3),
("Farinha de Trigo Tradicional Tipo 1 Pacote 1kg", "Dona Benta", 4.93, 62, "FarinhaTrigo.png", 3),
("Óleo de Soja pet 900ml", "Soya", 5.19, 99, "OleoSoja.png", 3),
("Achocolatado em Pó lata 370g", "Nescau", 7.49, 121, "Nescau.png", 3),
("Detergente Líquido Neutro Frasco 500ml", "Ypê", 2.05, 154, "Detergente.png", 4),
("Sabão em Pó Lavagem Perfeita Caixa 1,6kg", "Omo", 22.90, 63, "SabãoPó", 4),
("Creme Dental Máxima Proteção Anticáries (MPA) unidade 90g", "Colgate", 3.59, 214, "PastaDente.png", 5),
("Sabonete em Barra Rosas Brancas e Avelã unidade 85g", "Flor de Ypê", 1.49, 181, "Sabonete.png", 5);

insert into usuario (nome, cpf, telefone, email, senha, permissao, endereco, numero, cep, idbairro)
values ("Washington", 99999999999, 71999999999, "adm@gmail.com", "adm123", 1, "Rua Teste", 10, 99999000, 10),
("Pedro", 99999999998, 71999999998, "usuario@gmail.com", "usuario123", 0, "Rua Teste", 10, 99999000, 10);

insert into funcionario (idfuncionario, cargo, salario, data_contratacao)
values (1, "Preparador", 1000, "2020-06-01");
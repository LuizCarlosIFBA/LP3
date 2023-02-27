<?php
// esse código grava no banco de dados a imagem selecionada no formulário
// também faz uma copia da imagem para a pasta atual do servidor
// esse código foi construído com base no lin a seguir
//https://www.devmedia.com.br/upload-de-imagens-em-php-e-mysql/10041

//recupera a imagem selecionada no formulário
$imagem = $_FILES["imagem"];
//parametros para conexão
$servername = "localhost:3306"; 
$username = "root";
$password = "";
$dbname = "bd_livraria";

//se houver imagem selecioanda
if($imagem != NULL) {
    //defini um novo nome para a imagem, neste caso peda a data e hora atual
	$nomeFinal = time().'.jpg';
    //faz um upload da imagem para a pasta atual já colocando o nome novo criado
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        //configura o tamamnho da imagem para o banco
		$tamanhoImg = filesize($nomeFinal);
        //abre a imagem e coloca em uma variável que será passada para o banco
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

        try {
            //conecta
            $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            //faz o comando de inclusão já passando o parâmetro da imagem
            $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano, preco, imagem) values (:nome, :edicao,:ano,:preco,:imagem)");
            $sql->bindParam("nome",$nome);
            $sql->bindParam("edicao",$edicao);
            $sql->bindParam("ano",$ano);
            $sql->bindParam("preco",$preco);
            //parametro da imagem
            $sql->bindParam("imagem",$mysqlImg);
            $nome = "Dragao 6";
            $edicao = 6;
            $ano = 2026;
            $preco = 110.6;
           
            $sql->execute();
            echo "incluído com sucesso";
            
          }
          catch(PDOException $e) {
            echo "entrou no catch".$e->getmessage();
          }
	
	}
}
else {
	echo"Você não realizou o upload de forma satisfatória.";
}

?>
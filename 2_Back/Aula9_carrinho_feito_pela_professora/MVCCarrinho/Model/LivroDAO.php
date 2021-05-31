<?php
//classe de acesso ao banco de dados para recuperar os dados do livro
require_once "Conexao.php";
class LivroDAO{

    public function listarTodos(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select * from bd_livraria.livro");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaLiv=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $livro = new Livro();
            $livro->setCodigo($linha['codigo']);
            $livro->setTitulo($linha['nome']);
            $livro->setEdicao($linha['edicao']);
            $livro->setAno($linha['ano']);
            $livro->setPreco($linha['preco']);
            $listaLiv[$i] = $livro;
            $i++;
          }
        return $listaLiv;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function pesquisarLivro($liv){
        //vai ao banco de dados e pega todos os livros
        try{
           $minhaConexao = Conexao::getConexao();
           $sql = $minhaConexao->prepare("select * from bd_livraria.livro where codigo=:codigo");
           $sql->bindParam("codigo",$codigo);
           $codigo = $liv->getCodigo();

           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $liv->setTitulo($linha['nome']);
            $liv->setEdicao($linha['edicao']);
            $liv->setAno($linha['ano']);
            $liv->setPreco($linha['preco']);   
           }
           
       }
       catch(PDOException $e){
        //mensagem
       }
    }


    public function incluirLivro($liv){
       try{
           $minhaConexao = Conexao::getConexao();
           $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano, preco) values (:nome, :edicao,:ano,:preco)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("edicao",$edicao);
           $sql->bindParam("ano",$ano);
           $sql->bindParam("preco",$preco);
           $nome = $liv->getTitulo();
           $edicao = $liv->getEdicao();
           $ano = $liv->getAno();
           $preco = $liv->getPreco();
           
           $sql->execute();
        }
        catch(PDOException $e){
            //return "entrou no catch".$e->getmessage();
            return 0;
        }
    }


}

?>
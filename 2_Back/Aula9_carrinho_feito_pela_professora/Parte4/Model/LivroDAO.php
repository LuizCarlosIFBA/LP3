<?php
require "Conexao.php";
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
            $listaLiv[$i] = $livro;
            $i++;
          }
        return $listaLiv;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function incluirLivro($liv){
       try{
           $minhaConexao = Conexao::getConexao();
           $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano) values (:nome, :edicao,:ano)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("edicao",$edicao);
           $sql->bindParam("ano",$ano);
           $nome = $liv->getTitulo();
           $edicao = $liv->getEdicao();
           $ano = $liv->getAno();
           $sql->execute();
           //echo "incluido com sucesso";
           $last_id = $minhaConexao->lastInsertId();
           $liv->setCodigo($last_id);
           //echo "o numero gerado foi ",$last_id;
           return $last_id;
        }
        catch(PDOException $e){
            //return "entrou no catch".$e->getmessage();
            return 0;
        }
    }


}

?>
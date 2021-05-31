<?php
require ("Conexao.php");
class LivroDAO{
     

    public function incluir($meuLivro){
        try{
           $minhaConexao = Conexao::getConexao();
           $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano) values (:nome, :edicao,:ano)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("edicao",$edicao);
           $sql->bindParam("ano",$ano);
           $nome = $meuLivro->getNomeLivro();
           $edicao = $meuLivro->getEdicao();
           $ano = $meuLivro->getAno();
           $sql->execute();
           echo "incluido com sucesso";
           $last_id = $minhaConexao->lastInsertId();
           $meuLivro->setCodigo($last_id);
           echo "o numero gerado foi ",$last_id;
        }
        catch(PDOException $e){
            return "entrou no catch".$e->getmessage();
        }
    }



public function alterar($meuLivro){
      try{
       $minhaConexao = Conexao::getConexao();
       $sql = $minhaConexao->prepare("update bd_livraria.livro set nome=:nome, edicao=:edicao, ano=:ano where codigo=:codigo");
       $sql->bindParam("nome",$nome);
       $sql->bindParam("edicao",$edicao);
       $sql->bindParam("ano",$ano);
       $sql->bindParam("codigo",$codigo);
       $nome = $meuLivro->getNomeLivro();
       $edicao = $meuLivro->getEdicao();
       $ano = $meuLivro->getAno();
       $codigo = $meuLivro->getCodigo();
       $sql->execute();
       echo "alterado com sucesso";
       
      }
      catch(PDOException $e){
          return "entrou no catch".$e->getmessage();
      }
    }
}

?>
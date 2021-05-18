<?php
  
 class Livro{
    private $codigo;
    private $titulo;
    private $edicao;
    private $ano;

    public function getCodigo(){
        return $this->codigo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getEdicao(){
        return $this->edicao;
    }
    public function getAno(){
        return $this->ano;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setEdicao($edicao){
        $this->edicao = $edicao;
    }
    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getConexao(){
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_livraria";

        try {
           $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           // set the PDO error mode to exception
           $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $minhaConexao;
        }
        catch(PDOException $e) {
         echo "entrou no catch".$e->getmessage();
         return null;
       }
    }

    public function listarTodos(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = $this->getConexao();
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

    public function incluirLivro(){
       try{
           $minhaConexao = $this->getConexao();
           $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano) values (:nome, :edicao,:ano)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("edicao",$edicao);
           $sql->bindParam("ano",$ano);
           $nome = $this->getTitulo();
           $edicao = $this->getEdicao();
           $ano = $this->getAno();
           $sql->execute();
           //echo "incluido com sucesso";
           $last_id = $minhaConexao->lastInsertId();
           $this->setCodigo($last_id);
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
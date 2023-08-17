<?php
class Livro{
    private $codigo;
    private $nome;
    private $edicao;
    private $ano;
    private $preco;
    private $listaLivros = array();

    function __construct($nome,$edicao,$ano,$preco){
        $this->nome = $nome;
        $this->edicao = $edicao;
        $this->ano = $ano;
        $this->preco = $preco;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEdicao(){
        return $this->edicao;
    }
    public function getAno(){
        return $this->ano;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getListaLivros(){
        return $this->listaLivros;
    }

    public function incluir(){
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        try
        {
        $conn = new PDO("mysql:host=$servername;dbname=bd_livraria", $username, $password);
      // set the PDO error mode to exception  
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected successfully";

     $sql = $conn->prepare ("insert into bd_livraria.livro (nome, edicao, ano, preco)
     values (:nome, :edicao, :ano, :preco)");
     $sql->bindParam("nome",$nome);
     $sql->bindParam("edicao",$edicao);
     $sql->bindParam("ano",$ano);
     $sql->bindParam("preco",$preco);
     $nome = $this->nome;
     $edicao = $this->edicao;
     $ano = $this->ano;
     $preco  = $this->preco;
     $sql->execute();
     echo "inserido com sucesso";
}
   catch(PDOException $e)
   {
    echo "Connection failed: ". $e->getMessage();
    }

    }

  public function pesqTodos(){
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
   try
   {
    $conn = new PDO("mysql:host=$servername;dbname=bd_livraria", $username, $password);
    // set the PDO error mode to exception  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    $sql = $conn->prepare ("select * from bd_livraria.livro");// where codigo=:codigo");
    //$sql->bindParam("codigo",$codigo);
    //$codigo  =3;
    $sql->execute();

    $result=$sql->setFetchMode(PDO::FETCH_ASSOC);
   
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
     {
      $livro = new Livro($linha['nome'],$linha['edicao'],$linha['ano'],$linha['preco']);
      $livro->setCodigo($linha['codigo']);
      array_push($this->listaLivros,$livro); 
    }

}
   catch(PDOException $e)
   {
    echo "Connection failed: ". $e->getMessage();
    }

  }

}
?>
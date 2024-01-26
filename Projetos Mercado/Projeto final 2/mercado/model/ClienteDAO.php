<?php
require_once "Banco.php";
require_once "Cliente.php";
class ClienteDAO
{
    public function cadastrarCliente($cliente)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare("insert into mercado.cliente (telefone, cep, endereco, numero, complemento)
            values (:telefone, :cep, :endereco, :numero, :complemento)");
            $sql->bindParam("telefone", $telefone);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("endereco", $endereco);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("complemento", $complemento);

            $telefone = $cliente->getTelefone();
            $cep = $cliente->getCep();
            $endereco = $cliente->getEndereco();
            $numero = $cliente->getNumero();
            $complemento = $cliente->getComplemento();

            $sql->execute();

            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function getDados($cliente)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("SELECT u.nome as nomeusuario, u.cpf, u.email, c.cep, c.endereco, c.numero, c.complemento, c.telefone, c.idcliente
            FROM usuario as u
            JOIN cliente as c ON c.idcliente = u.cliente_idcliente
            WHERE idusuario=:idusuario");
    
            $sql->bindParam("idusuario", $idusuario);
            $idusuario = $cliente->getIDUsuario();

            $sql->execute();
    
            $data=$sql->fetch(PDO::FETCH_ASSOC);
            $cliente->setIDCliente($data["idcliente"]);
            $cliente->setNome($data["nomeusuario"]);
            $cliente->setEmail($data["email"]);
            $cliente->setCPF($data["cpf"]);
            $cliente->setTelefone($data["telefone"]);
            $cliente->setCep($data["cep"]);
            $cliente->setEndereco($data["endereco"]);
            $cliente->setNumero($data["numero"]);
            $cliente->setComplemento($data["complemento"]);
            

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function alteraDadosCliente($cliente)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE cliente 
            SET telefone=:telefone
            WHERE idcliente=:idcliente");

            $sql->bindParam("telefone", $telefone);
            $sql->bindParam("idcliente", $idcliente);


            $idcliente = $cliente->getIdcliente();
            $telefone = $cliente->getTelefone();

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function alteraDadosUsuario($cliente)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE cliente 
            SET cpf = :cpf, nome = :nome, email = :email
            WHERE idusuario=:idusuario");
    
            $sql->bindParam("idusuario", $idusuario);
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("email", $email);
            $sql->bindParam("nome", $nome);

            $idusuario = $cliente->getIDUsuario();
            $nome = $cliente->getNome();
            $cpf = $cliente->getCPF();
            $email = $cliente->getEmail();

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function alteraDados($cliente)
    {
        ClienteDAO::alteraDadosCliente($cliente);
        ClienteDAO::alteraDadosUsuario($cliente);
    }

    public function consultaSenha($idusuario, $senhaAtual)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("SELECT count(*) as total
            FROM usuario 
            WHERE senha = :senha
            AND idusuario=:idusuario");
    
            $sql->bindParam("idusuario", $idusuario);
            $sql->bindParam("senha", $senha);

            $idusuario = $idusuario;
            $senha = $senhaAtual;

            $sql->execute();

            $data = $sql->fetch(PDO::FETCH_ASSOC);
            if($data["total"] == 1)
                return 1;
            else
                return 0;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function alteraSenha($idusuario, $novaSenha)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE usuario 
            SET senha = :senha
            WHERE idusuario=:idusuario");
    
            $sql->bindParam("idusuario", $idusuario);
            $sql->bindParam("senha", $senha);

            $idusuario = $idusuario;
            $senha = $novaSenha;

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function alteraEndereco($cliente)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE cliente 
            SET idcliente = :idcliente, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento
            WHERE idcliente=:idcliente");
    
            $sql->bindParam("idcliente", $idcliente);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("endereco", $endereco);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("complemento", $complemento);
            
            $idcliente = $cliente->getIdcliente();
            $cep = $cliente->getCep();
            $endereco = $cliente->getEndereco();
            $numero = $cliente->getNumero();
            $complemento = $cliente->getComplemento();

            $sql->execute();
    
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function excluiConta($idusuario){
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE usuario 
            SET ativo = 0
            WHERE idusuario=:idusuario");
    
            $sql->bindParam("idusuario", $idusuario);

            $sql->execute();
    
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>



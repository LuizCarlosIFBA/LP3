<?php
require_once "Banco.php";
class UsuarioDAO
{
    public function cadastrarUsuario($usuario)
    {
        try
        {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare("insert into mercado.usuario (nome, email, senha, cpf)
            values (:nome, :email, :senha, :cpf)");
            $sql->bindParam("nome", $nome);
            $sql->bindParam("email", $email);
            $sql->bindParam("senha", $senha);
            $sql->bindParam("cpf", $cpf);

            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $cpf = $usuario->getCPF();

            $sql->execute();
            
            $usuario->setIDUsuario($conn->lastInsertId());
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public function verificaUsuario($usuario)
    {
        try
        {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare("select count(*) as total from mercado.usuario where email=:email and senha=:senha");
            $sql->bindParam("email", $email);
            $sql->bindParam("senha", $senha);
            $sql->execute();

            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();

            $data=$sql->fetch(PDO::FETCH_ASSOC);

            if($data['total'] == 1) return 1;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return 0;
    }

    /**
     * Atualiza o IDCliente da tabela do usuário no Banco de dados.
     */ 
    public function setIDCliente($idcliente, $usuario)
    {
        try {
            $conn = Banco::conectarBanco();

            $sql = $conn->prepare("UPDATE mercado.usuario
            SET cliente_idcliente = :id
            WHERE idusuario = :idusuario");

            $sql->bindParam("id", $idcliente);
            $sql->bindParam("idusuario", $idusuario);

            $idusuario = $usuario->getIDUsuario();

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Atualiza o IDFuncionario da tabela do usuário no Banco de dados.
     */ 
    public function setIDFuncionario($id, $usuario)
    {
        try {
            $conn = Banco::conectarBanco();
            
            $sql = $conn->prepare("UPDATE mercado.usuario
            SET funcionario_idfuncionario = :id
            WHERE idusuario = :idusuario");

            $sql->bindParam("id", $id);
            $sql->bindParam("idusuario", $idusuario);

            $idusuario->getIDUsuario();

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * 
     */ 
    public static function getUsuarioInfo($email, $senha)
    {
        $conn = Banco::conectarBanco();
        $sql = $conn->prepare
        ("SELECT u.idusuario, u.nome as nomeusuario
        FROM mercado.usuario as u
        WHERE email=:email AND senha=:senha");

        $sql->bindParam("email", $email);
        $sql->bindParam("senha", $senha);
        
        $sql->execute();

        $data=$sql->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
?>
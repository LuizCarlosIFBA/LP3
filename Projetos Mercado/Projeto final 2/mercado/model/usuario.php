<?php
require_once "UsuarioDAO.php";
abstract class Usuario
{
    #atributos
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $idusuario;
    private $ativo;

    public function getNome(){return $this->nome;}
    public function setNome($nome){$this->nome = $nome;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}

    public function getSenha(){return $this->senha;}
    public function setSenha($senha){$this->senha = $senha;}

    public function getCPF(){return $this->cpf;}
    public function setCPF($cpf){$this->cpf = $cpf;}

    public function getIDUsuario(){return $this->idusuario;}
    public function setIDUsuario($idusuario){$this->idusuario = $idusuario;}

    public function getAtivo(){return $this->ativo;}
    public function setAtivo($ativo){$this->ativo = $ativo;}

    public function cadastrarUsuario()
    {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->cadastrarUsuario($this);
    }

    public static function verificaUsuario($email, $senha)
    {
        try
        {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare("select count(*) as total from mercado.usuario where email=:email and senha=:senha");
            $sql->bindParam("email", $email);
            $sql->bindParam("senha", $senha);
            $sql->execute();

            $data=$sql->fetch(PDO::FETCH_ASSOC);

            if($data['total'] == 1) 
                return 1;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return 0;
    }

    public function setID($opcao, $id)
    {
        $usuarioDAO = new UsuarioDAO();
        switch($opcao)
        {
            case "cliente":
                $usuarioDAO->setIDCliente($id, $this);
                break;
            case "funcionario":
                $usuarioDAO->setIDFuncionario($id, $this);
                break;
        }
    }

    public static function getUsuarioInfo($email, $senha)
    {
        $conn = Banco::conectarBanco();
        $sql = $conn->prepare
        ("SELECT u.idusuario, u.cliente_idcliente, u.funcionario_idfuncionario, u.nome as nomeusuario, u.ativo
        FROM mercado.usuario as u
        WHERE email=:email AND senha=:senha");

        $sql->bindParam("email", $email);
        $sql->bindParam("senha", $senha);
        
        $sql->execute();

        $data=$sql->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public static function getCargoFuncionario($idfuncionario){
        $conn = Banco::conectarBanco();
        $sql = $conn->prepare
        ("SELECT f.cargo_idcargo as idcargo
        FROM funcionario f
        WHERE f.idfuncionario = :idfuncionario");

        $sql->bindParam("idfuncionario", $idfuncionario);
        
        $sql->execute();

        $data=$sql->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
?>


<!-- ("SELECT u.idusuario, nome, cliente_idcliente as idcliente, funcionario_idfuncionario as idfuncionario, f.cargo_idcargo as idcargo, c.descricao as cargo  
        FROM mercado.usuario as u
        LEFT JOIN mercado.funcionario as f ON u.funcionario_idfuncionario = f.idfuncionario
        LEFT JOIN mercado.cargo as c ON f.cargo_idcargo = c.idcargo
        WHERE email=:email AND senha=:senha"); -->
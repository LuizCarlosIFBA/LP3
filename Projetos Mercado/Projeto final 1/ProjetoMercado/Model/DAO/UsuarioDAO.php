<?php
require_once "Banco.php";
require_once "Model/BO/Usuario.php";
class UsuarioDAO{
    public function incluirUsuario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into usuario (nome, cpf, telefone, email, senha, permissao, endereco, numero, cep, idbairro) values (:nome, :cpf, :telefone, :email, :senha, :permissao, :endereco, :numero, :cep, :idbairro)");
            
            $sql->bindParam("nome",$nome);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("telefone",$telefone);
            $sql->bindParam("email",$email);
            $sql->bindParam("senha",$senha);
            $sql->bindParam("permissao",$permissao);
            $sql->bindParam("endereco",$endereco);
            $sql->bindParam("numero",$numero);
            $sql->bindParam("cep",$cep);
            $sql->bindParam("idbairro",$idbairro);        
            $nome = $aux->getNome();
            $cpf = $aux->getCpf();
            $telefone = $aux->getTelefone();
            $email = $aux->getEmail();
            $senha = $aux->getSenha();
            $permissao = $aux->getPermissao();
            $endereco = $aux->getEndereco();
            $numero = $aux->getNumero();
            $cep = $aux->getCep();
            $idbairro = $aux->getBairro()->getIdBairro();         
            
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdUsuario($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
            header("Location: Carrinho");
        }
    }

    public function excluirUsuario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from usuario where idusuario=:idusuario");

            $sql->bindParam("idusuario",$id);
            $id = $aux->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarUsuario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update usuario set nome=:nome, cpf=:cpf, telefone=:telefone, email=:email, senha=:senha, permissao=:permissao, endereco=:endereco, numero=:numero, cep=:cep, idbairro=:idbairro where idusuario=:idusuario");

            $sql->bindParam("idusuario",$id);
            $sql->bindParam("nome",$nome);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("telefone",$telefone);
            $sql->bindParam("email",$email);
            $sql->bindParam("senha",$senha);
            $sql->bindParam("permissao",$permissao);
            $sql->bindParam("endereco",$endereco);
            $sql->bindParam("numero",$numero);
            $sql->bindParam("cep",$cep);
            $sql->bindParam("idbairro",$idbairro);
            $id = $aux->getIdUsuario();
            $nome = $aux->getNome();
            $cpf = $aux->getCpf();
            $telefone = $aux->getTelefone();
            $email = $aux->getEmail();
            $senha = $aux->getSenha();
            $permissao = $aux->getPermissao();
            $endereco = $aux->getEndereco();
            $numero = $aux->getNumero();
            $cep = $aux->getCep();
            $idbairro = $aux->getBairro()->getIdBairro();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarEndereco($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update usuario set endereco=:endereco, numero=:numero, cep=:cep, idbairro=:idbairro where idusuario=:idusuario");

            $sql->bindParam("idusuario",$id);
            $sql->bindParam("endereco",$endereco);
            $sql->bindParam("numero",$numero);
            $sql->bindParam("cep",$cep);
            $sql->bindParam("idbairro",$idbairro);
            $id = $aux->getIdUsuario();
            $endereco = $aux->getEndereco();
            $numero = $aux->getNumero();
            $cep = $aux->getCep();
            $idbairro = $aux->getBairro()->getIdBairro();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarUsuario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from usuario where idusuario=:idusuario");
            
            $sql->bindParam("idusuario",$id);
            $id = $aux->getIdUsuario();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $bairro = new Bairro();

                $aux->setNome($linha["nome"]);
                $aux->setCpf($linha["cpf"]);
                $aux->setTelefone($linha["telefone"]);
                $aux->setEmail($linha["email"]);
                $aux->setSenha($linha["senha"]);
                $aux->setPermissao($linha["permissao"]);
                $aux->setEndereco($linha["endereco"]);
                $aux->setNumero($linha["numero"]);
                $aux->setCep($linha["cep"]);
                $aux->setBairro($bairro);
                $aux->getBairro()->setIdBairro($linha["idbairro"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function verificarLogin($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare ("select * from usuario where email=:email and senha=:senha");
        
            $sql->bindParam("email",$email);
            $sql->bindParam("senha",$senha);
            $email = $aux->getEmail();
            $senha = $aux->getSenha();

            $sql->execute();
            $result=$sql->setFetchMode(PDO::FETCH_ASSOC);

            $login=false;
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $login=true;

                $bairro = new Bairro();
                
                $aux->setIdUsuario($linha["idusuario"]);
                $aux->setNome($linha["nome"]);
                $aux->setCpf($linha["cpf"]);
                $aux->setTelefone($linha["telefone"]);
                $aux->setPermissao($linha["permissao"]);
                $aux->setEndereco($linha["endereco"]);
                $aux->setNumero($linha["numero"]);
                $aux->setCep($linha["cep"]);
                $aux->setBairro($bairro); 
                $aux->getBairro()->setIdBairro($linha["idbairro"]);
            }

            if ($login) {
                return true;
            }
            else {
                return false;
            }  
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from usuario");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaUsuario=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $usuario = new Usuario();
                $bairro = new Bairro();
                
                $usuario->setIdUsuario($linha["idusuario"]);
                $usuario->setNome($linha["nome"]);
                $usuario->setCpf($linha["cpf"]);
                $usuario->setTelefone($linha["telefone"]);
                $usuario->setEmail($linha["email"]);
                $usuario->setSenha($linha["senha"]);
                $usuario->setPermissao($linha["permissao"]);
                $usuario->setEndereco($linha["endereco"]);
                $usuario->setNumero($linha["numero"]);
                $usuario->setCep($linha["cep"]);
                $usuario->setBairro($bairro);
                $usuario->getBairro()->setIdBairro($linha["idbairro"]);
                
                $listaUsuario[$i] = $usuario;
                $i++;
            }
            return $listaUsuario;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>
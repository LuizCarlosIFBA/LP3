<?php
require_once "Model/DAO/UsuarioDAO.php";
require_once "Bairro.php";
class Usuario{
    private $idusuario;
    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;
    private $permissao;
    private $endereco;
    private $numero;
    private $cep;
    private $bairro;
    private $cidade;
    private $estado;

    
    public function setIdUsuario ($id){
        $this->idusuario = $id;
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    public function setCPF ($cpf){
        $this->cpf = $cpf;
    }
    public function setTelefone ($tel){
        $this->telefone = $tel;
    }
    public function setEmail ($email){
        $this->email = $email;
    }
    public function setSenha ($senha){
        $this->senha = $senha;
    }
    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getIdUsuario (){
        return $this->idusuario;
    }
    public function getNome (){
        return $this->nome;
    }
    public function getCPF (){
        return $this->cpf;
    }
    public function getTelefone (){
        return $this->telefone;
    }
    public function getEmail (){
        return $this->email;
    }
    public function getSenha (){
        return $this->senha;
    }
    public function getPermissao(){
        return $this->permissao;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getEstado(){
        return $this->estado;
    }


    public function incluirUsuario(){
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->incluirUsuario($this);
    }

    public function excluirUsuario(){
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->excluirUsuario($this);
    }

    public function alterarUsuario(){
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->alterarUsuario($this);
    }

    public function alterarEndereco(){
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->alterarEndereco($this); 
    }

    public function pesquisarUsuario(){
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->pesquisarUsuario($this);
    }

    public function verificarLogin(){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->verificarLogin($this);
    }

    public function listarTudo(){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->listarTudo();
    }
}

?>

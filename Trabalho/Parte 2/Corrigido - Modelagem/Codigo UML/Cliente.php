<?php


class Cliente {
    private string $nome;
    private string $cpf;
    private string $email;
    private string $usuario;
    private string $senha;
    private string $cep;
    private string $telefone;
    private string $endereco;
    private char $sexo;
    
    public function __construct(string $nome, string $cpf, string $email, string $usuario, string $senha, string $cep, string $telefone, string $endereco, char $sexo) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->cep = $cep;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->sexo = $sexo;
    }
    
    
    public function getNome(): string {
        return $this->nome;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getUsuario(): string {
        return $this->usuario;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getEndereco(): string {
        return $this->endereco;
    }

    public function getSexo(): char {
        return $this->sexo;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function setCep(string $cep): void {
        $this->cep = $cep;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

    public function setSexo(char $sexo): void {
        $this->sexo = $sexo;
    }



}

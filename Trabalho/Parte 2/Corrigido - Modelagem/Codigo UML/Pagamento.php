<?php


class Pagamento {
    private string $cupom;
    private DateTime $validade;
    private string $nomeCartao;
    private string $numeroCartao;
    private string $cvv;
    private string $enderecoEntrega;
    private string $cep;
    
    public function __construct(string $cupom, DateTime $validade, string $nomeCartao, string $numeroCartao, string $cvv, string $enderecoEntrega, string $cep) {
        $this->cupom = $cupom;
        $this->validade = $validade;
        $this->nomeCartao = $nomeCartao;
        $this->numeroCartao = $numeroCartao;
        $this->cvv = $cvv;
        $this->enderecoEntrega = $enderecoEntrega;
        $this->cep = $cep;
    }
    
    public function getCupom(): string {
        return $this->cupom;
    }

    public function getValidade(): DateTime {
        return $this->validade;
    }

    public function getNomeCartao(): string {
        return $this->nomeCartao;
    }

    public function getNumeroCartao(): string {
        return $this->numeroCartao;
    }

    public function getCvv(): string {
        return $this->cvv;
    }

    public function getEnderecoEntrega(): string {
        return $this->enderecoEntrega;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function setCupom(string $cupom): void {
        $this->cupom = $cupom;
    }

    public function setValidade(DateTime $validade): void {
        $this->validade = $validade;
    }

    public function setNomeCartao(string $nomeCartao): void {
        $this->nomeCartao = $nomeCartao;
    }

    public function setNumeroCartao(string $numeroCartao): void {
        $this->numeroCartao = $numeroCartao;
    }

    public function setCvv(string $cvv): void {
        $this->cvv = $cvv;
    }

    public function setEnderecoEntrega(string $enderecoEntrega): void {
        $this->enderecoEntrega = $enderecoEntrega;
    }

    public function setCep(string $cep): void {
        $this->cep = $cep;
    }



}

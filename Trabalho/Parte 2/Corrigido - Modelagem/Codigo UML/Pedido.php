<?php


class Pedido {
   private $produto = array();
   private string $situacao;
   private DateTime $data;
   private string $codigoPedido;
   private string $avaliacao;
   
   public function __construct($produto, string $situacao, DateTime $data, string $codigoPedido, string $avaliacao) {
       $this->produto = $produto;
       $this->situacao = $situacao;
       $this->data = $data;
       $this->codigoPedido = $codigoPedido;
       $this->avaliacao = $avaliacao;
   }
   
   public function getProduto() {
       return $this->produto;
   }

   public function getSituacao(): string {
       return $this->situacao;
   }

   public function getData(): DateTime {
       return $this->data;
   }

   public function getCodigoPedido(): string {
       return $this->codigoPedido;
   }

   public function getAvaliacao(): string {
       return $this->avaliacao;
   }

   public function setProduto($produto): void {
       $this->produto = $produto;
   }

   public function setSituacao(string $situacao): void {
       $this->situacao = $situacao;
   }

   public function setData(DateTime $data): void {
       $this->data = $data;
   }

   public function setCodigoPedido(string $codigoPedido): void {
       $this->codigoPedido = $codigoPedido;
   }

   public function setAvaliacao(string $avaliacao): void {
       $this->avaliacao = $avaliacao;
   }



}

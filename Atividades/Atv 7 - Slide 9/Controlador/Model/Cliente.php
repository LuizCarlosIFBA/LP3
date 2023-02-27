<?php

require "clienteDAO.php";
/**
 * class Cliente
 * 
 */
class Cliente
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $nome;

  /**
   * 
   * @access private
   */
  private $cpf;

  /**
   * 
   * @access private
   */
  private $email;


  public function incluir(){
    $cliente = new clienteDAO();
    return $cliente->incluir($this);
  }

  public function pesquisar(){
    $cliente = new clienteDAO();
    return $cliente->pesquisar($this);
  }

  public function getNome() {
      return $this->nome;
  }

  public function getCpf() {
      return $this->cpf;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setNome($nome): void {
      $this->nome = $nome;
  }

  public function setCpf($cpf): void {
      $this->cpf = $cpf;
  }

  public function setEmail($email): void {
      $this->email = $email;
  }

  public function __construct($cpf,$nome="",$email="") {
      $this->cpf = $cpf;
      $this->nome = $nome;
      $this->email = $email;
  }

  function __destruct(){
    echo "Objeto destruido";
  } 

} // end of Cliente
?>

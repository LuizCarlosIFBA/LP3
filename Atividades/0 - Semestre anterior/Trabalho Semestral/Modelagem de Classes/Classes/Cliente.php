<?php


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

  public function __construct($nome, $cpf, $email) {
      $this->nome = $nome;
      $this->cpf = $cpf;
      $this->email = $email;
  }

  function __destruct(){
    echo "Objeto destruido";
  } 

} // end of Cliente
?>

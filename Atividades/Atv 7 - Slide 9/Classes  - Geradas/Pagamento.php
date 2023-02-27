<?php
require_once 'Produto.php';


/**
 * class Pagamento
 * 
 */
class Pagamento
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $tipo;

  public function getTipo() {
      return $this->tipo;
  }

  public function setTipo($tipo): void {
      $this->tipo = $tipo;
  }
  
  public function __construct($tipo) {
      $this->tipo = $tipo;
  }
  
  function __destruct(){
    echo "Objeto destruido";
  } 

  /**
   * 
   *
   * @param Produto produto 

   * @return Produto
   * @access public
   */
  public function efetuarPagamento( $produto) {
  } // end of member function efetuarPagamento





} // end of Pagamento
?>

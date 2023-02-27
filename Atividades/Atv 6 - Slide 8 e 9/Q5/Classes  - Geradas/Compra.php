<?php
require_once 'SetorSeparacao.php';
require_once 'Cliente.php';
require_once 'Pagamento.php';
require_once 'Produto.php';


/**
 * class Compra
 * 
 */
class Compra
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access public
   */
  private $produto = array();

  public function getProduto() {
      return $this->produto;
  }

  public function setProduto($produto): void {
      $this->produto = $produto;
  }

  
  public function __construct($produto) {
      $this->produto = $produto;
  }

  function __destruct(){
    echo "Objeto destruido";
  } 
  /**
   * 
   *
   * @param Produto produto 

   * @param Cliente cliente 

   * @return int
   * @access public
   */
  public function comprarProduto( $produto,  $cliente) {
  } // end of member function comprarProduto

  /**
   * 
   *
   * @param Pagamento pagamento 

   * @param Produto produto 

   * @return Pagamento
   * @access public
   */
  public function addProduto( $pagamento,  $produto) {
  } // end of member function addProduto





} // end of Compra
?>

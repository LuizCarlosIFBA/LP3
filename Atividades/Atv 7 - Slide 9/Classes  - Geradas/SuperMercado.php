<?php
require_once 'Produto.php';


/**
 * class SuperMercado
 * 
 */
abstract class SuperMercado
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * 
   *
   * @param Produto produto 

   * @return Produto
   * @abstract
   * @access public
   */
  abstract public function _addPromocao( $produto);

  /**
   * 
   *
   * @param Produto produto 

   * @return Produto
   * @abstract
   * @access public
   */
  abstract public function buscarProduto( $produto);





} // end of SuperMercado
?>

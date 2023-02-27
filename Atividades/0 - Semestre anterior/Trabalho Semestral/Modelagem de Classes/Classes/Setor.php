<?php
require_once 'Compra.php';
require_once 'Produto.php';


/**
 * class Setor
 * 
 */
interface Setor
{

  /** Aggregations: */

  /** Compositions: */

  /**
   * 
   *
   * @return date
   * @abstract
   * @access public
   */
  abstract public function registrarSaida();

  /**
   * 
   *
   * @return date
   * @abstract
   * @access public
   */
  abstract public function registroEntrada();

  /**
   * 
   *
   * @return void
   * @abstract
   * @access public
   */
  abstract public function retornarPreparacao();

  /**
   * 
   *
   * @param Produto obj 

   * @return Produto
   * @abstract
   * @access public
   */
  abstract public function buscarProduto( $obj);

  /**
   * 
   *
   * @param list compra 

   * @return list
   * @abstract
   * @access public
   */
  abstract public function listaCarrinho( $compra);





} // end of Setor
?>

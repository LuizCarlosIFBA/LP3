<?php
require_once 'Setor.php';


/**
 * class SetorEmbalagemConferencia
 * 
 */
abstract class SetorEmbalagemConferencia implements Setor{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   *
   * @return date
   * @abstract
   * @access public
   */
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
  /**
   * 
   *
   * @param list compra 

   * @return list
   * @abstract
   * @access public
   */
  abstract public function listaCarrinho( $compra);



} // end of SetorEmbalagemConferencia
?>

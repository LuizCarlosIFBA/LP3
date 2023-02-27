<?php
require_once 'Setor.php';
require_once 'Compra.php';


/**
 * class SetorSeparacao
 * 
 */
abstract class SetorSeparacao implements Setor
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * 
   *
   * @param list compra 

   * @return list
   * @access public
   */
   /**
   * 
   *
   * @param date data 

   * @return date
   * @access public
   */
  public function registrarEntrada( $data) {
  } // end of member function registrarEntrada



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



} // end of SetorSeparacao
?>

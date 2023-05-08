

/**
 * class Pedido
 * 
 */
class Pedido
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  var $produto;
  /**
   * 
   * @access private
   */
  var $situacao;
  /**
   * 
   * @access private
   */
  var $data;
  /**
   * 
   * @access private
   */
  var $codigoPedido;
  /**
   * 
   * @access private
   */
  var $avaliacao;

  /**
   * 
   *
   * @param Produto produto 
   * @param Cliente cliente 
   * @return Produto
   * @access public
   */
  function finalizarCompra( $produto,  $cliente)
  {
    
  } // end of member function finalizarCompra

  /**
   * 
   *
   * @param Pagamento pagamento 
   * @param Produto produto 
   * @return Produto
   * @access public
   */
  function addProduto( $pagamento,  $produto)
  {
    
  } // end of member function addProduto

  /**
   * 
   *
   * @param string estrela 
   * @param string comentario 
   * @return string
   * @access public
   */
  function avaliarProduto( $estrela,  $comentario)
  {
    
  } // end of member function avaliarProduto





} // end of Pedido
?>

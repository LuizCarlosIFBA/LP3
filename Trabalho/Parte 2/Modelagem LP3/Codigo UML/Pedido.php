

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
  var $valorTotal;
  /**
   * 
   * @access private
   */
  var $enderecoEnvio;
  /**
   * 
   * @access private
   */
  var $cep;

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





} // end of Pedido
?>



/**
 * class Setores
 * 
 */
/******************************* Abstract Class ****************************
  Setores does not have any pure virtual methods, but its author
  defined it as an abstract class, so you should not use it directly.
  Inherit from it instead and create only objects from the derived classes
*****************************************************************************/

class Setores
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
  function registrarSaída()
  {
    
  } // end of member function registrarSaída

  /**
   * 
   *
   * @return date
   * @abstract
   * @access public
   */
  function registroEntrada()
  {
    
  } // end of member function registroEntrada

  /**
   * 
   *
   * @return date
   * @abstract
   * @access public
   */
  function retornarPreparacao()
  {
    
  } // end of member function retornarPreparacao

  /**
   * 
   *
   * @param Produto obj 
   * @return Produto
   * @abstract
   * @access public
   */
  function buscarProduto( $obj)
  {
    
  } // end of member function buscarProduto

  /**
   * 
   *
   * @param list compra 
   * @return list
   * @abstract
   * @access public
   */
  function listaCarrinho( $compra)
  {
    
  } // end of member function listaCarrinho





} // end of Setores
?>

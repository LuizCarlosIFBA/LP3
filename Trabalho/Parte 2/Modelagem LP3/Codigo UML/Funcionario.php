

/**
 * class Funcionario
 * 
 */
/******************************* Abstract Class ****************************
  Funcionario does not have any pure virtual methods, but its author
  defined it as an abstract class, so you should not use it directly.
  Inherit from it instead and create only objects from the derived classes
*****************************************************************************/

class Funcionario
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  var $nome;
  /**
   * 
   * @access private
   */
  var $cpf;
  /**
   * 
   * @access private
   */
  var $cargo;

  /**
   * 
   *
   * @return date
   * @access public
   */
  function registrarSaida()
  {
    
  } // end of member function registrarSaida

  /**
   * 
   *
   * @return date
   * @access public
   */
  function registrarEntrada()
  {
    
  } // end of member function registrarEntrada

  /**
   * 
   *
   * @param Produto obj 
   * @return Produto
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
   * @access public
   */
  function listaCarrinho( $compra)
  {
    
  } // end of member function listaCarrinho





} // end of Funcionario
?>

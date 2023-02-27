<?php


/**
 * class Produto
 * 
 */
class Produto
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $categoria;

  /**
   * 
   * @access private
   */
  private $nome;

  /**
   * 
   * @access private
   */
  private $preco;

  public function getCategoria() {
      return $this->categoria;
  }

  public function getNome() {
      return $this->nome;
  }

  public function getPreco() {
      return $this->preco;
  }

  public function setCategoria($categoria): void {
      $this->categoria = $categoria;
  }

  public function setNome($nome): void {
      $this->nome = $nome;
  }

  public function setPreco($preco): void {
      $this->preco = $preco;
  }

  public function __construct($categoria, $nome, $preco) {
      $this->categoria = $categoria;
      $this->nome = $nome;
      $this->preco = $preco;
  }

  function __destruct(){
    echo "Objeto destruido";
  } 
  /**
   * 
   *
   * @param string comentário 

   * @return void
   * @access public
   */
  public function exibirProduto( $comentário) {
  } // end of member function exibirProduto

  /**
   * 
   *
   * @param string comentario 

   * @return string
   * @access public
   */
  public function avaliar( $comentario) {
  } // end of member function avaliar





} // end of Produto
?>

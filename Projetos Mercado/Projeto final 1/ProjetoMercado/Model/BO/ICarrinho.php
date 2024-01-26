<?php
interface ICarrinho{ 
    public function getCarrinhoItens();
    public function getValorTotal();
    public function verificarPresenca($id);
    public function adicionarItem($item);
    public function removerItem($id);
    public function atualizarQuantidade($id);
    public function aplicarCupom($cupom);
}
?>
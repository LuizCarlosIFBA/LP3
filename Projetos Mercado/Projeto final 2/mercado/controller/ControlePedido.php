<?php
    require_once "model/pedidoDAO.php";
    require_once "model/ClienteDAO.php";
    require_once "model/Banco.php";

    class ControlePedido
    {
        public static function listaPedido()
        {
            return PedidoDAO::getListaPedido();
        }

        public static function processa($idpedido)
        {
            $pedido = new Pedido();
            $pedido->setIDPedido($idpedido);
            PedidoDAO::setDadosPedido($pedido);
            return $pedido;
        }

        public static function listaProdutoquantidade($pedido)
        {
            return $produtos = PedidoDAO::getListaItensDoPedido($pedido); 
        }

        public static function realizarPedido($carrinhoSessao, $cliente)
        {
            $itensCarrinho = $carrinhoSessao->getItensCarrinho();

            if (count($itensCarrinho) > 0 && $cliente->getIdcliente() != 0) {
                $pedido = new Pedido();
                if($_POST['yesno'] == "no"){
                    $pedido->setCep($_POST['cep']);
                    $pedido->setEndereco($_POST['endereco']);
                    $pedido->setNumero($_POST['numero']);
                    $pedido->setComplemento($_POST['complemento']);
                }else{
                    $ClienteDAO = new ClienteDAO();
                    $ClienteDAO->getDados($cliente);
                }
                $pedido->setIDPedido(PedidoDAO::InserePedido($cliente, $carrinhoSessao, $pedido));

                if ($pedido->getIDPedido() != 0)
                {
                    foreach ($itensCarrinho as $item)
                    {
                        PedidoDAO::InsereItemNoPedido($pedido, $item);
                        $carrinhoSessao->apagar($item->getProduto()->getIDProduto());
                    }
                    unset($_SESSION["carrinhoSessao"]);
                }
            }
            ?>
                <script type="text/javascript">
                    window.location.href = 'visualizar';
                </script>
            <?php
        }

        public static function inserirAvaliacao()
        {
            $pedido = new Pedido();
            $pedido->setIDPedido($_POST['IDPedido']);
            $pedido->setAvaliacao($_POST['avaliacao']);
            $pedido->setComentarioAvaliacao($_POST['comentario_avaliacao']);
            PedidoDAO::InsereAvaliacao($pedido);
        }
    }
?>
<?php
require_once "model/Pedido.php";
require "model/itemPedido.php";
class PedidoDAO
{
    /**
     * Retorna a lista de itens de um pedido realizado
     */
    public static function getListaItensDoPedido($pedido)
    {
        $arrayItensPedido = array();
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("SELECT pp.produto_idproduto as idproduto, p.nome, pp.quantidade, pp.valorreferencia
            FROM pedido_has_produto as pp
            JOIN produto as p ON p.idproduto = pp.produto_idproduto
            WHERE pp.pedido_idpedido = :idpedido
            ORDER BY p.nome ASC");

            $sql->bindParam("idpedido", $idpedido);

            $idpedido = $pedido->getIDPedido();

            $sql->execute();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $item = new ItemPedido();

                $item->setIdproduto($linha['idproduto']);
                $item->setNome($linha['nome']);
                $item->setQuantidade($linha['quantidade']);
                $item->setValorreferencia($linha['valorreferencia']);
                array_push($arrayItensPedido, $item);
            }
            return $arrayItensPedido;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $arrayItensPedido;
    }

    /**
     * Retorna a lista de pedidos realizados para um $cliente
     */
    public static function getListaPedido()
    {
        $arrayPedido = array();

        $comandoSQL = "SELECT idpedido, valor, datacompra, cliente_idcliente 
        FROM pedido 
        WHERE cliente_idcliente = :idcliente 
        ORDER BY idpedido DESC";

        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare($comandoSQL);
            $sql->bindParam("idcliente", $_SESSION['idcliente']);

            $sql->execute();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pedido = new Pedido();

                $pedido->setIDPedido($linha['idpedido']);
                $pedido->setValor($linha['valor']);
                $pedido->setDatacompra($linha['datacompra']);
                $pedido->setCliente($linha['cliente_idcliente']);

                array_push($arrayPedido, $pedido);
            }

            return $arrayPedido;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $arrayPedido;
    }

    /**
     * Preenche os atributos $valor, $datacompra, $avaliacao, $comentarioAvaliacao, $cep, $endereco, $numero e $complemento do objeto $pedido.
     */
    public static function setDadosPedido($pedido)
    {
        try {
            $conn = Banco::conectarBanco();

            $sql = $conn->prepare
            ("SELECT p.idpedido, p.valor, p.datacompra, p.avaliacao, p.comentario_avaliacao, p.cep, p.endereco, p.numero, p.complemento
                FROM pedido p
                WHERE p.idpedido = :idpedido");
            $sql->bindParam("idpedido", $idpedido);

            $idpedido = $pedido->getIDPedido();

            $sql->execute();

            $result = $sql->fetch(PDO::FETCH_ASSOC);

            $pedido->setValor($result['valor']);
            $pedido->setDatacompra($result['datacompra']);
            $pedido->setAvaliacao($result['avaliacao']);
            $pedido->setComentarioAvaliacao($result['comentario_avaliacao']);
            $pedido->setCep($result['cep']);
            $pedido->setEndereco($result['endereco']);
            $pedido->setNumero($result['numero']);
            $pedido->setComplemento($result['complemento']);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * Insere cada produto do carrinho na lista do pedido.
     */
    public static function InsereItemNoPedido($pedido, $itemCarrinho)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("INSERT INTO mercado.pedido_has_produto (pedido_idpedido, produto_idproduto, quantidade, valorreferencia)
            VALUES (:idpedido, :idproduto, :quantidade, :valorreferencia)");
            $sql->bindParam("idpedido", $idpedido);
            $sql->bindParam("idproduto", $idproduto);
            $sql->bindParam("quantidade", $quantidade);
            $sql->bindParam("valorreferencia", $valorreferencia);

            $idpedido = $pedido->getIDPedido();
            $idproduto = $itemCarrinho->getProduto()->getIDProduto();
            $quantidade = $itemCarrinho->getQuantidade();
            $valorreferencia = $itemCarrinho->getProduto()->getValorDesconto();

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Insere $idcliente, $valor, $datacompra, $cep, $endereco, $numero, $complemento no banco.
     * Retorna o $IDpedido em caso de sucesso.
     * Caso não consiga inserir, retorna 0.
     */
    public static function InserePedido($cliente, $carrinhoSessao, $pedido)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("INSERT INTO mercado.pedido (cliente_idcliente, valor, datacompra, cep, endereco, numero, complemento)
            VALUES (:idcliente, :valor, :datacompra, :cep, :endereco, :numero, :complemento)");
            $sql->bindParam("idcliente", $idcliente);
            $sql->bindParam("valor", $valor);
            $sql->bindParam("datacompra", $datacompra);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("endereco", $endereco);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("complemento", $complemento);

            $idcliente = $cliente->getIdcliente();
            $valor = $carrinhoSessao->getTotal();
            date_default_timezone_set("America/Recife");
            $datacompra = date("Y-m-d");

            if($pedido->getCep() == null){
                $cep = $cliente->getCep();
                $endereco = $cliente->getEndereco();
                $numero = $cliente->getNumero();
                $complemento = $cliente->getComplemento();
            }else{
                $cep = $pedido->getCep();
                $endereco = $pedido->getEndereco();
                $numero = $pedido->getNumero();
                $complemento = $pedido->getComplemento();
            }

            $sql->execute();

            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Insere avaliação do pedido no banco
     */
    public static function InsereAvaliacao($pedido)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE mercado.pedido 
              SET avaliacao = :avaliacao, comentario_avaliacao = :comentario_avaliacao
              WHERE idpedido = :idpedido");

            $sql->bindParam("avaliacao", $avaliacao);
            $sql->bindParam("comentario_avaliacao", $comentario_avaliacao);
            $sql->bindParam("idpedido", $idpedido);

            $avaliacao = $pedido->getAvaliacao();
            $idpedido = $pedido->getIDPedido();
            $comentario_avaliacao = $pedido->getComentarioAvaliacao();

            $sql->execute();

            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }
}
?>
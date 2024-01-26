<?php
require_once "model/ProcessamentoPedidoDAO.php";
class ControleProcessamentoPedido
{
    public static function atribuirDemanda()
    {
        $idfuncionario = $_SESSION["idfuncionario"];
        $idcargo = $_SESSION["idcargo"];
        $idpedido = $_POST["idpedido"];

        if(ProcessamentopedidoDAO::consultaDemandaFuncionario($idfuncionario))
        {
            ?>
            <script type="text/javascript">
                window.location.href = 'paginafuncionario';
            </script>
            <?php
            return;
        }

        $processamentoPedido = new Processamentopedido();
        $processamentoPedido->setIdpedido($idpedido);
        $processamentoPedido->setIdfuncionario($idfuncionario);

        date_default_timezone_set("America/Recife");
        $processamentoPedido->setDataStatus(date("Y-m-d"));

        $ultimoProcessamentoPedido = ProcessamentopedidoDAO::getUltimoStatusValido($idpedido);
        
        if (!empty($ultimoProcessamentoPedido))
            $processamentoPedido->setIDStatus($idcargo);
        else
            $processamentoPedido->setIDStatus(1);

        ProcessamentopedidoDAO::InsereStatusPedido($processamentoPedido);
        ?>
            <script type="text/javascript">
                window.location.href = 'paginafuncionario';
            </script>
        <?php
    }

    public static function finalizarDemanda()
    {
        $idfuncionario = $_POST["idfuncionario"];
        $idcargo = $_SESSION["idcargo"];
        $opcao = $_POST["opcao"];
        if($opcao == "finalizar")
            if($idcargo != 3)
                ProcessamentopedidoDAO::finalizaEtapa($idfuncionario, 1);
            else
            {
                $processamentoPedido = new Processamentopedido();

                date_default_timezone_set("America/Recife");
                $data = date("Y-m-d");
                $idpedido = ProcessamentopedidoDAO::getDemandaFuncionario($idfuncionario);
                
                $processamentoPedido->setIdfuncionario($idfuncionario);
                $processamentoPedido->setIdpedido($idpedido);
                $processamentoPedido->setIDStatus(4);
                $processamentoPedido->setDataStatus(date($data));
                $processamentoPedido->setDataSaida(date($data));
                ProcessamentopedidoDAO::pedidoConcluido($processamentoPedido);
                ProcessamentopedidoDAO::finalizaEtapa($idfuncionario, 1);
            }
        else if ($opcao == "retornar")
        {
            $idpedido = ProcessamentopedidoDAO::getDemandaFuncionario($idfuncionario);
            ProcessamentopedidoDAO::defineFalhaPreparacao($idpedido);
        }
        ?>
            <script type="text/javascript">
                window.location.href = 'paginafuncionario';
            </script>
        <?php
    }

    public static function getStatusPaginaPedido($pedido, $limite){
        return ProcessamentopedidoDAO::getStatusPedido($pedido->getIDPedido(), $limite);
    }
}
?>
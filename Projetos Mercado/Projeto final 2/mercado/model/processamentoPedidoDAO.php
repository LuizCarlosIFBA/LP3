<?php
require_once "model/processamentoPedido.php";
require_once "model/funcionario.php";
require_once "model/pedido.php";

class ProcessamentopedidoDAO
{  
    function __construct() #construct
    {
    }

    /**
     * Retorna 1 registro do pedido mais recente que o $etapafinalizada != 2
    */
    public static function getUltimoStatusValido($idpedido)
    {
        $sqlcommand = 
        "SELECT fp.datastatus, fp.status_idstatus as idstatus, s.descricao as `status`, fp.etapafinalizada, fp.datasaida
        FROM mercado.funcionario_has_pedido as fp
        JOIN `status` as s ON s.idstatus = fp.status_idstatus
        WHERE fp.pedido_idpedido = :idpedido and status_idstatus != 2
        ORDER BY fp.datastatus DESC, fp.status_idstatus DESC
        LIMIT 1";
        
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ($sqlcommand);

            $sql->bindParam("idpedido", $idpedido);

            $sql->execute();

            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $processamentoPedido = new Processamentopedido();
            $processamentoPedido->setDataStatus($data['datastatus']);
            $processamentoPedido->setDataSaida($data['datasaida']);
            $processamentoPedido->setIDStatus($data['idstatus']);
            $processamentoPedido->setStatus($data['status']);
            $processamentoPedido->setEtapaFinalizada($data['etapafinalizada']);
            
            return $processamentoPedido;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return;
    }

    /**
     * Retorna a lista do status de atualização de um pedido
     ** $limite = 0, retorna lista de status
     ** $limite !=0, retorna a quantidade informada
    */
    public static function getStatusPedido($idpedido, $limite)
    {
        $arrayProcessamento = array();
        $sqlcommand = 
        "SELECT fp.datastatus, fp.status_idstatus as idstatus, s.descricao as `status`, fp.etapafinalizada, fp.datasaida
        FROM mercado.funcionario_has_pedido as fp
        JOIN `status` as s ON s.idstatus = fp.status_idstatus
        WHERE fp.pedido_idpedido = :idpedido
        ORDER BY fp.datastatus DESC, fp.status_idstatus DESC ";

        if($limite != 0) $sqlcommand = $sqlcommand . "LIMIT " . $limite;
        
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ($sqlcommand);

            $sql->bindParam("idpedido", $idpedido);

            $idpedido;

            $sql->execute();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $processamentoPedido = new Processamentopedido();
                $processamentoPedido->setDataStatus($linha['datastatus']);
                $processamentoPedido->setDataSaida($linha['datasaida']);
                $processamentoPedido->setIDStatus($linha['idstatus']);
                $processamentoPedido->setStatus($linha['status']);
                $processamentoPedido->setEtapaFinalizada($linha['etapafinalizada']);
                array_push($arrayProcessamento, $processamentoPedido);
            }
            
            return $arrayProcessamento;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $arrayProcessamento;
    }

    /**
     * Insere dados de processamento do pedido a partir dos valores no objeto $processamentoPedido
     */
    public static function InsereStatusPedido($processamentoPedido)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("INSERT INTO mercado.funcionario_has_pedido (pedido_idpedido, funcionario_idfuncionario, datastatus, status_idstatus)
            VALUES (:idpedido, :idfuncionario, :datastatus, :idstatus)");
            $sql->bindParam("idpedido", $idpedido);
            $sql->bindParam("idfuncionario", $idfuncionario);
            $sql->bindParam("datastatus", $datastatus);
            $sql->bindParam("idstatus", $idstatus);

            $idpedido = $processamentoPedido->getIDPedido();
            $idfuncionario = $processamentoPedido->getIdfuncionario();
            $datastatus = $processamentoPedido->getDataStatus();
            $idstatus = $processamentoPedido->getIDStatus();
            
            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Define demanda da preparação como errada, colocando 2 em etapafinalizada nos regisstros de status 1 e $idpedido.
     */
    public static function defineFalhaPreparacao($idpedido)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("DELETE FROM mercado.funcionario_has_pedido
            WHERE pedido_idpedido = :idpedido");

            $sql->bindParam("idpedido", $idpedido);

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Pega o $idfuncionario e define qualquer pedido atribuido a ele como finalizado no banco.
     */
    public static function finalizaEtapa($idfuncionario, $etapafinalizada)
    {
        date_default_timezone_set("America/Recife");
        $datasaida = date("Y-m-d");

        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("UPDATE mercado.funcionario_has_pedido
            SET etapafinalizada = :etapafinalizada, datasaida = :datasaida
            WHERE funcionario_idfuncionario = :idfuncionario and etapafinalizada = 0");

            $sql->bindParam("idfuncionario", $idfuncionario);
            $sql->bindParam("datasaida", $datasaida);
            $sql->bindParam("etapafinalizada", $etapafinalizada);

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    public static function pedidoConcluido($processamentoPedido)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("INSERT INTO mercado.funcionario_has_pedido (pedido_idpedido, funcionario_idfuncionario, datastatus, datasaida, status_idstatus)
            VALUES (:idpedido, :idfuncionario, :datastatus, :datasaida, :idstatus)");
            $sql->bindParam("idpedido", $idpedido);
            $sql->bindParam("idfuncionario", $idfuncionario);
            $sql->bindParam("datastatus", $datastatus);
            $sql->bindParam("datasaida", $datasaida);
            $sql->bindParam("idstatus", $idstatus);

            $idpedido = $processamentoPedido->getIDPedido();
            $idfuncionario = $processamentoPedido->getIdfuncionario();
            $datastatus = $processamentoPedido->getDataStatus();
            $datasaida = $processamentoPedido->getDataSaida();
            $idstatus = $processamentoPedido->getIDStatus();
            
            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Retorna a quantidade de demandas atribuidas ao funcionario
     */
    public static function consultaDemandaFuncionario($idfuncionario)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("SELECT count(*) as total
            FROM mercado.funcionario_has_pedido as fp
            WHERE fp.funcionario_idfuncionario = :idfuncionario && fp.etapafinalizada=0;");

            $sql->bindParam("idfuncionario", $idfuncionario);

            $sql->execute();

            $data = $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $data["total"];
    }

    /**
     * Retorna o $idpedido que o funcionario está vinculado e não está concluido.
     */
    public static function getDemandaFuncionario($idfuncionario)
    {
        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare
            ("SELECT pedido_idpedido as idpedido
            FROM mercado.funcionario_has_pedido as fp
            WHERE fp.funcionario_idfuncionario = :idfuncionario && fp.etapafinalizada=0;");

            $sql->bindParam("idfuncionario", $idfuncionario);

            $sql->execute();

            $data = $sql->fetch(PDO::FETCH_ASSOC);
            if ($data!=false)
                return $data["idpedido"];
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }

    /**
     * Retorna lista de demandas disponíveis para serem atribuidas a funcionarios.
     */
    public static function getListaDemandas()
    {
        $sqlcomando =
        "SELECT subquery.idpedido, subquery.status_idstatus, subquery.etapafinalizada
        FROM (
            SELECT p.idpedido, fhp.status_idstatus, fhp.etapafinalizada
            FROM pedido p
            LEFT JOIN funcionario_has_pedido fhp ON fhp.pedido_idpedido = p.idpedido
            WHERE fhp.status_idstatus = (SELECT MAX(status_idstatus) FROM funcionario_has_pedido WHERE pedido_idpedido = p.idpedido)
                AND fhp.etapafinalizada != 0
                OR fhp.status_idstatus IS NULL
        ) AS subquery
        WHERE subquery.etapafinalizada = (
            SELECT MIN(etapafinalizada)
            FROM (
                SELECT p.idpedido, fhp.status_idstatus, fhp.etapafinalizada
                FROM pedido p
                LEFT JOIN funcionario_has_pedido fhp ON fhp.pedido_idpedido = p.idpedido
                WHERE fhp.status_idstatus = (SELECT MAX(status_idstatus) FROM funcionario_has_pedido WHERE pedido_idpedido = p.idpedido)
                    AND fhp.etapafinalizada != 0
                    OR fhp.status_idstatus IS NULL
            ) AS subquery2
            WHERE subquery2.idpedido = subquery.idpedido
        )";

        $idcargo = $_SESSION["idcargo"];
        
        if($idcargo == 1)
            $sqlcomando = $sqlcomando . 
            "AND subquery.status_idstatus = 2
             AND subquery.etapafinalizada = 2
             OR subquery.status_idstatus is null;";
        else{
            $sqlcomando = $sqlcomando . 
            "AND subquery.etapafinalizada = 1
             AND subquery.status_idstatus = :idcargo";
        }
        $arrayPedido = array();

        try {
            $conn = Banco::conectarBanco();
            $sql = $conn->prepare($sqlcomando);

            $sql->bindParam("idcargo",  $idcargo);
            if($idcargo != 1)
                $idcargo = $idcargo - 1;

            $sql->execute();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pedido = new Pedido();

                $pedido->setIDPedido($linha['idpedido']);

                array_push($arrayPedido, $pedido);
            }
            return $arrayPedido;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return 0;
    }
}
?>

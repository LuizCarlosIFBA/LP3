<?php
function soma($num_1,$operacao,$num_2){
    $total = 0;
    switch ($operacao) {
        case '+':
            $total = $num_1 + $num_2;
            break;
        case '-';
            $total = $num_1 - $num_2;
            break;
        case "*":
            $total = $num_1 * $num_2;;
            break;
        case "/":
            $total = $num_1 / $num_2;;
            break;    
        default:
            echo " ";
    }
 
 
  return $total;

}

//definido os valores para as variáveis

echo soma(5,'*',3);
?>

<?php
/*
    include() Se você importar o arquivo e depois ocorrer de novo, o include não avisa
    require() O mesmo com "include"
    require_once() Garante que o arquivo não seja importado mais de uma vez
    include_once() O mesmo com "require_once"

*/

//Import do arquivo de variaveis e constantes
require_once('vars.php');

//Função responsável por realizar calculos matemáticos 
//(soma, subtração, multiplicação e divisão)
function calculadora($opcaoCalculo, $n1, $n2) 
{
    $result = (double) 0;
    global $chkSubtrair;
    
    switch (strtoupper($opcaoCalculo))
        {
            case ("SOMA"):
                $result = $n1 + $n2;
                break;
            case ("SUBTRACAO"):
                $chkSubtrair = 'checked';
                $result = $n1 - $n2; 
                break;
            case ("MULTIPLICACAO"):
                $result = $n1 * $n2;
                break;
            case ("DIVISAO"):
                if($n2 == 0)
                    echo(ERRO_DIV_ZERO);
                else
                    $result = $n1 / $n2;
                break; 
            default:
                echo("Nenhuma operação selecionada");
        }
    //Defaut - Se não cair em nenhuma das opções do switch você pode colocar um defaut é uma mensagem padrão
    //Exemplo: "Nenhuma operação foi selecionada"
    return $result;
}


?>
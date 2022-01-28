<?php 

    function verificarPar($valor1, $valor2)
    {
        $numeroInicial = (int) $valor1;
        $numeroFinal = (int) $valor2;
        $cont = (int) 0;
        $i = (int) 0;
        $numerosPares = array();
        
        for($cont=$numeroInicial;$cont<=$numeroFinal;$cont++)
        {
            if($cont%2 == 0)
            {
                $numerosPares[$i] = $cont;
                $i++;
            }
            
        }
        
        var_dump($numerosPares);
        
    }


?>
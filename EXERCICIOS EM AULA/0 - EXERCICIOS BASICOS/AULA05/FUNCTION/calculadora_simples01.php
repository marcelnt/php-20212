<?php

//Declaração de variaveis

    /*  = atribuição
        == comparação de igualdade
        === comparação de igualdade + comparação do tipo de dados
    
    Declaração de variaveis com tipos de dados
        Tipos de dados php
        int ou integer - numeros inteiros
        float - numeros reais
        double - numeros reais, com uma maior capacidade de armazenamento
        string - caracteres (Texto de modo geral)
        boolean/bool - Verdadeiro ou falso
        array - matriz de dados
        object - variavel do tipo objeto
        
        gettype() - retorna o tipo de dados atribuido a uma variavel
            echo(gettype($v1));    
        settype() - muda o tipo de dados de uma variavel 
            settype($v1, "float");
        var_dump() - mostra todas as característica de um elemento, toda a estrutura de dados
            var_dump($v1);
        
        strtolower() - converte a entrada dos dados pra minusculo, para não dar problema na comparação
                        ou seja, evitar problemas na escrita na hora de fazer código
    strtoupper() - converte a entrada de dados para maisculo */

//Import do arquivos de variaveis e constantes
require_once('MODULOS/vars.php');

//Import do arquivo de funções para realizar calculos
require_once('MODULOS/calculos.php');

        $valor1 = (double) 0;
        $valor2 = (double) 0;
        $operacao = (string) null;
        $resultado = (double) 0;
        $chkSubtrair = (string) null;

        
        //Verifica se o formulário foi submetido pelo botão
        if(isset($_POST['btnCalc'])) 
        {
            
            //Recebendo o dados que o usuário digita
            //str_replace() permite localizar um caracter e substituir por outro
            $valor1 = str_replace(",", ".",$_POST['valor1']);   
            $valor2 = str_replace(",", ".",$_POST['valor2']); 
            
            if(!isset($_POST['rdooperadores']))
                echo("erro");
            else
            {
                //strtoupper - Converte um conteúdo em MAISCULO
                //strlower - Converte um conteúdo em MINUSCULO
                $operacao = strtoupper($_POST['rdooperadores']);
            
         
                //Tratamento de erro para caixa vazia
                //Podemos verificar a caixa com a igualdade Ex:$valor ==""
                //ou podemos usar a função empty()
            
            
                if(empty($valor1) || empty($valor2))
                echo(ERRO_CAIXA_VAZIA);
                //Tratamento para entrada de caracteres inválidos
                //is_number() permite verificar se o conteudo é um numero
        
                    elseif(!is_numeric($valor1) || !is_numeric($valor2))
                    echo("erro");
                        else {
                        //Convertendo string em numero
                        settype($valor1, "float");
                        settype($valor2, "float");

                        //Processamento dos Calculos
                        //Função para realizar os calculos da calculadora 
                        $resultado = calculadora($operacao, $valor1, $valor2);    
                        
                            
                        }
            }
        }
            
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Aula 04 </title>
        <style>
            #container {
                width: 600px;
                height: 400px;
                border: solid 3px #000000;
                margin-left: auto;
                margin-right: auto;
            }
            
            h1, #containerResultado {
                width: inherit;
                height: 60px;
                background-color: #008080;
                color: white;
                font-size: 40px;
                text-align: center;
                padding: 0;
                margin: 0;
            }
            
            #containerConteudo {
                width: inherit;
                height: 340px;
                background-color: #20B2AA;
                text-align: center;
            }
            
            #containerValor{
                width: inherit;
                height: 90px;
                line-height: 2.5;
                font-family: sans-serif;
                letter-spacing: 1px;
                color: white;
                padding-top: 10px;
            }
            
            #containerOperacoes {
                width: inherit;
                height: 240px;
                float: left;
                line-height: 1.5;
            }
            
            #containerOperador{
                width: 100px;
                height: 140px;
                float: left;
                margin-top: 60px;
                padding-right: 200px;
                padding-top: 40px;
            }
            
             #containerResultado {
                width: 240px;
                height: 140px;
                float: left;
                font-size: 70px;
                padding-top: 35px;
                margin-top: 65px;
                margin-left: 60px;
            }
        </style>
    </head>
    <body>
        
        <div id = "container">
            <h1> CALCULADORA SIMPLES</h1>
            <div id= "containerConteudo">
                <form id = "formulario" action="calculadora_simples01.php" method="post"> 
                    <div id="containerValor">
                        Valor 1 :<input name = "txtvalor1" type="text" value="<?=$valor1?>"><br>
                        Valor 2: <input name = "txtvalor2" type="text" value="<?=$valor2?>"><br>
                    </div>
                    <div id= "containerOperacoes">
<!-- Para manter os operadores marcados assim que calcular a operação, existem 3 formas a que esta em SOMA, SUBTRAÇÃO (deve inicializar lá em cima "chkSubtrair = ('string') null" e no teste lógico de if e else) E MULTIPLICAÇÃO. -->
                        <div id="containerOperador">
                            <input name = "rdooperadores" type="radio" value="soma" <?php if($operacao == 'SOMA') echo('checked')?>>Somar <br> 
                            <input name = "rdooperadores" type="radio" value="subtracao" <?=$chkSubtrair?> > Subtrair <br> 
                            <input name = "rdooperadores" type="radio" value="multiplicacao" <?=$operacao =="MULTIPLICACAO" ? 'checked' : '' ?>> Multiplicar <br> 
                            <input name = "rdooperadores" type="radio" value="divisao" <?php if($operacao == 'DIVISAO') echo('checked')?>> Dividir <br> 
                            <input name = "btncalc" type = "submit" value = "Calcular">
                        </div>
                        <div id= "containerResultado">
<!-- Round () serve para limitar a quantidade de casas decimais   -->
                            <?php echo(round($resultado,2)) ?>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </body>
</html>
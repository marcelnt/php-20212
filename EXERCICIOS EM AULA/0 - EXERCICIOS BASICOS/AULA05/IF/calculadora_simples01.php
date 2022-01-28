<?php

setlocale(LC_ALL,"pt_BR"); 

//setlocale(LC_ALL, "pt_BR") Utilizado para padronizar as normas brasileira 
//Declaração de variaveis

    //Declaração de variaveis com tipo de dados
    //Tipos de dados no php
        /* int ou integer - numeros inteiros
            float - numeros reais
            double - numeros reais, com maior capacidade de armazenamento de dados
            String  - Caracteres (letras)
            boolean/bool - Verdadeirou ou Falso
            Array - Matriz de dados
            object - objeto
            
            gettype(NOME DA VARIAVEL) - RETORNA OS TIPOS DE DADOS ATRIBUIDOS A UMA VARIAVEL 
            settype(NOME DA VARIAVEL) - MUDA O TIPO DE DADOS DE UMA VARIAVEL
            var_dump(NOME DA VARIAVEL ) - RETORNA TODA A ESTRUTURA DE DADOS DE UM ELEMENTO

*/
        $valor1 = (double) 0;
        $valor2 = (double) 0;
        $operacao = (string) null;
        $resultado = (double) 0;
        $chkSubtrair = (string) null;

        //Constantes
        define("ERRO_CAIXA_VAZIA", "<span class='msg'>Por favor inserir dados válidos nas caixas de texto, não é possível realizar cálculos vazio!</span>");

        const ERRO_CARACTER_INVALIDO = "<span class='msg'>Caracter digitado não pode ser texro, por favor inserir apenas números nas caixas!</span>";

        const ERRO_OPERACAO_INVALIDA = "<span class='msg'>Por favor escolha uma operação para ser calculada! </span>";

        //Verifica se o formulário foi submetido pelo botão
        if(isset($_POST['btncalc'])) {
            
            //Recebendo o dados que o usuário digita
            //str_replace() permite localizar um caracter e substituir por outro
            $valor1 = str_replace(",", ".",$_POST['txtvalor1']);   
            $valor2 = str_replace(",", ".",$_POST['txtvalor2']); 
            
            if(!isset($_POST['rdooperadores']))
                echo(ERRO_OPERACAO_INVALIDA);
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
                    echo(ERRO_CARACTER_INVALIDO);
                        else {
                        //Convertendo string em numero
                        settype($valor1, "float");
                        settype($valor2, "float");

                        //Processamento dos Calculos
                        if($operacao == "SOMA")
                            $resultado = $valor1 + $valor2;
                        elseif($operacao == "SUBTRACAO"){
                            $chkSubtrair = 'checked';
                            $resultado = $valor1 - $valor2;
                        }
                        elseif($operacao == "MULTIPLICACAO")
                            $resultado = $valor1 * $valor2;
                        elseif($operacao == "DIVISAO")
                            $resultado = $valor1 / $valor2;
                        else
                            $resultado = 0;
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
        
        <div id= "container">
                <h1> CALCULADORA SIMPLES</h1>
            <div id= "containerConteudo">
                <form id = "formulario" action="calculadora_simples01.php" method="post"> 
                    <div id="containerValor">
                        Valor 1 :<input name = "txtvalor1" type="text" value="<?=$valor1?>"><br>
                        Valor 2: <input name = "txtvalor2" type="text" value="<?=$valor2?>"><br>
                    </div>
                    <div id= "containerOperacoes">
<!-- Para manter os operadores marcados assim que calcular a operação, existem 3 formas a que esta em SOMA, SUBTRAÇÃO (deve inicializar lá em cima "chkSubtrair = ('string') null" e no teste lógico de if e else) E MULTIPLICAÇÃO.  -->
                        <div id="containerOperador">
                            <input name = "rdooperadores" type="radio" value="soma" <?php if($operacao == 'SOMA') echo('checked')?>>Somar <br> 
                            <input name = "rdooperadores" type="radio" value="subtracao" <?=$chkSubtrair?> > Subtrair <br> 
                            <input name = "rdooperadores" type="radio" value="multiplicacao" <?=$operacao =="MULTIPLICACAO" ? 'checked' : '' ?>> Multiplicar <br> 
                            <input name = "rdooperadores" type="radio" value="divisao" <?php if($operacao == 'DIVISAO') echo('checked')?>> Dividir <br> 
                            <input name = "btncalc" type = "submit" value = "Calcular">
                        </div>
                        <div id = "containerResultado">
<!-- Round () serve para limitar a quantidade de casas decimais   -->
                            <?php echo(round($resultado,2)) ?>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </body>
</html>
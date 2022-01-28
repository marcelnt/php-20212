<?php

setlocale(LC_ALL,"pt_BR"); 

//Defaut - Se não cair em nenhuma das opções do switch você pode colocar um defaut é uma mensagem padrão
    //Exemplo: "Nenhuma operação foi selecionada"
        $valor1 = (double) 0;
        $valor2 = (double) 0;
        $operacao = (string) null;
        $resultado = (double) 0;
        $chkSubtrair = (string) null;

        //Constantes
        define("ERRO_CAIXA_VAZIA", "<span class='msg'>Por favor inserir dados válidos nas caixas de texto, não é possível realizar cálculos vazio!</span>");

        const ERRO_CARACTER_INVALIDO = "<span class='msg'>Caracter digitado não pode ser texto, por favor inserir apenas números nas caixas!</span>";

        const ERRO_OPERACAO_INVALIDA = "<span class='msg'>Por favor escolha uma operação para ser calculada! </span>";

        //Verifica se o formulário foi submetido pelo botão
        if(isset($_POST['btncalc'])) 
        {
            
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
                    echo( ERRO_CARACTER_INVALIDO);
                
                    else {
                        //Convertendo string em numero
                        settype($valor1, "float");
                        settype($valor2, "float");

                        //Processamento dos Calculos
                            
                        switch ($operacao)
                        {
                            case ("SOMA"):
                                $resultado = $valor1 + $valor2;
                                break;
                            case ("SUBTRACAO"):
                                $resultado = $valor1 - $valor2; 
                                $chkSubtrair = 'checked';
                                break;
                            case ("MULTIPLICACAO"):
                                $resultado = $valor1 * $valor2;
                                break;
                            case ("DIVISAO"):
                                if($valor2 == 0)
                                    echo(ERRO_DIV_ZERO);
                                else
                                    $resultado = $valor1 / $valor2;
                                break;
                                
                            defaut:
                                echo("Nenhuma operação selecionada");
                        }    
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
                <h1>CALCULADORA SIMPLES</h1>
            <div id="containerConteudo">
                <form id = "formulario" action="calculadora_simples01.php" method="post"> 
                    <div id="containerValor">
                        Valor 1 :<input type="txt" name = "txtvalor1" value="<?=$valor1?>"><br>
                        Valor 2: <input type="txt" name = "txtvalor2" value="<?=$valor2?>"><br>
                    </div>
                    <div id="containerOperacoes">
<!-- Para manter os operadores marcados assim que calcular existem 3 formas a que esta em SOMA, SUBTRAÇÃO (deve inicializar lá em cima "chkSubtrair = ('
null") e no teste lógico de if e else) E MULTIPLICAÇÃO.  -->
                        <div id="containerOperador">
                            <input type="radio" name ="rdooperadores" value="soma" <?php if($operacao == 'SOMA') echo('checked')?>>Somar <br> 
                            <input type="radio" name ="rdooperadores" value="subtracao" <?=$chkSubtrair?> > Subtrair <br> 
                            <input type="radio" name ="rdooperadores"  value="multiplicacao" <?=$operacao =="MULTIPLICACAO" ? 'checked' : '' ?>> Multiplicar <br> 
                            <input type="radio" name ="rdooperadores" value="divisao" <?php if($operacao == 'DIVISAO') echo('checked')?>> Dividir <br> 
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
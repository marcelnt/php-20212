<?php
 //is_numeric()
    /*
        Operadores de comparação
            <
            >
            <=
            >=
            !=
            ==
            === (compara o conteudo e o tipo de dados)
            ==! (compara o conteudo e o tipo de dados)
            
            
             //gettype() permite verificar o tipo de dados de uma variavel ou objeto
    //echo(gettype($media));
    
    */




$media = 0;
$nota1 = null;
$nota2 = null;
$nota3 = null;
$nota4 = null;


//Valida se o botão calcular foi acionado
if (isset($_POST['btncalc']))
{
    //Resgtando dados das caixas de texto
    $nota1 = $_POST['txtn1'];
    $nota2 = $_POST['txtn2'];
    $nota3 = $_POST['txtn3'];
    $nota4 = $_POST['txtn4'];

    //Tratatamento para caixa vazia
    if ($nota1 == "" || $nota2 == "" || $nota3 == "" || $nota4 == "" )
    {
        echo ("<script> alert('Caixas Vazias!'); </script>");
    }
    else
    {
        //Tratamento para valores númericos
        if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && 
           is_numeric($nota4) ) 
        {
            $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
        }
        else
        {
            echo("<script> alert('Não foi possível calcular com dados não númericos'); </script>");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Média</title>
       <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
    </head>
	<body>
        
        <div id="conteudo">
            <header id="titulo">
                Calculo de Médias
            </header>

            <div id="form">
                <form name="frmMedia" method="post" action="">
                    <div>
                        <label>Nota 1:</label>
                        <input type="text" name="txtn1" value="<?=$nota1?>"  > 
                    </div>
                    
                    <div>
                        <label>Nota 2:</label>
                        <input type="text" name="txtn2" value="<?=$nota2?>" > 
                    </div>
                    
                    <div>
                        <label>Nota 3:</label>
                        <input type="text" name="txtn3" value="<?=$nota3?>" > 
                    </div>
                    
                    <div>
                        <label>Nota 4:</label>
                        <input type="text" name="txtn4" value="<?=$nota4?>" >
                    </div>
                    <div>
                        <input type="submit" name="btncalc" value ="Calcular" >
                        <div id="botaoReset">
                            <a href="media.php">
                                Novo Cálculo
                            </a>    
                        </div>
                    </div>
                </form>

            </div>
            <footer id="resultado">
                A média é: <?=$media?>
            </footer>
        </div>
        
		
	</body>

</html>
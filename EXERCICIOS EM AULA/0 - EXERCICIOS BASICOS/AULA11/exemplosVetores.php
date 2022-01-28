<?php 
//Criando um array simples
//Declaração de uma variavel do tipo vetor
$nomes = array("José", "Maria", "João", "André");

//echo($nomes); Não funciona, pois o array é um tipo diferente de variavel (coleção de dados)

//print_r($nomes); //Exibe apenas o conteudo do array

//var_dump($nomes); //Exibe o conteudo e outras informações, como por exemplo (tipos de dados, qtde de digitos, etc)

$nomesClientes = array();

$nomesClientes[0] = "José da Silva";
$nomesClientes[1] = "Maria da Silva";
$nomesClientes[2] = "André da Silva";

//var_dump($nomesClientes);

//Percorrendo um array de dados
//echo($nomes[1]);

//echo($nomesClientes[0]);

//echo(" ----- USANDO O LAÇO WHILE ------ <br>");
//$cont = 0;
//$qtdeItens = count($nomes); //Guardando a qtde de itens do array, atreavés da função count()
//while($cont < $qtdeItens)
//{
//    echo($nomes[$cont]."<br>");
//    $cont +=1;
//}
//
//echo(" ----- USANDO O LAÇO FOR ------ <br>");
//for ($cont=0;$cont<$qtdeItens;$cont++)
//{
//    echo($nomes[$cont]."<br>");
//}
//
//echo(" ----- USANDO O LAÇO FOR EACH ------ <br>");
//foreach ($nomesClientes as $x)
//{
//    echo($x . "<br>");
//}


//Trabalhando com Array ("Chave" - "Valor")

//Array apenas com um indice e duas chaves com valores
$clientes = array(
            "nome" => "Maria da Silva",
            "telefone" => "011-4777-5252"
        );

//Exibindo dados de um array ("Chave" - "Valor")
//var_dump($clientes);
//echo($clientes["nome"]."<br>");
//echo($clientes["telefone"]);

//Array com vários indices e várias chaves com valores
$funcionarios = array(
                    array(  "nome" => "Maria da Silva",
                            "telefone" => "011 999999",
                            "email" => "maria@teste.com",
                            "salario" => 1350.54,
                            "numeroIdent" => 56897
                         ),
                    array(  "nome" => "José da Silva",
                            "telefone" => "011 666666",
                            "email" => "jose@teste.com",
                            "salario" => 1666.06,
                            "numeroIdent" => 5666
                         ),
                    array(  "nome" => "André da Silva",
                            "telefone" => "011 666666",
                            "email" => "andre@teste.com",
                            "salario" => 1226.06,
                            "numeroIdent" => 5236
                         ),
                    array(  "nome" => "Zezinho da Silva",
                            "telefone" => "011 66899966",
                            "email" => "zezinho@teste.com",
                            "salario" => 1586.06,
                            "numeroIdent" => 5796
                         )
);

//for ($cont=0;$cont<count($funcionarios);$cont++)
//{
//    echo($funcionarios[$cont]["nome"]."<br>");
//    echo($funcionarios[$cont]["telefone"]."<br>");
//    echo($funcionarios[$cont]["email"]."<br>");
//}

//Mostrar como fazer uma busca dentro do array
//$PesquisarNumero = 5796;
//
//foreach($funcionarios as $array)
//{
//    if($PesquisarNumero == $array["numeroIdent"])
//    {
//        echo($array["nome"]."<br>");
//        echo($array["telefone"]."<br>");
//        echo($array["email"]."<br>");
//        echo($array["numeroIdent"]."<br>");
//    }
//}

//Permite apagar um elemento (variavel, objeto, array, item de um array)
unset($funcionarios[0]);
unset($funcionarios[2]);

foreach($funcionarios as $array)
{
        echo($array["nome"]."<br>");
        echo($array["telefone"]."<br>");
        echo($array["email"]."<br>");
        echo($array["numeroIdent"]."<br>");
}

echo("<br> Existem " . count($funcionarios). " itens no array")


?>
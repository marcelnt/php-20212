<?php 
/*******************************************
    Objetivo: Buscar ou Listar os dados de Clientes, solictando ao Banco de Dados
    Data: 23/09/2021
    Autor: Marcel
********************************************/
//require_once('../functions/config.php');
//Import do arquivo para inserir no BD
require_once(SRC.'bd/listarClientes.php');


//Função para lista todos os dados do BD (CMS / API)
function exibirClientes ()
{
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = listar();
    
    return $dados;
}

//Função para buscar dados do BD (CMS / API)
function buscarClientes ($id)
{
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = buscar($id);
    
    return $dados;
}

//Função para buscar dados do BD com filtro pelo nome (API)
function buscarNomeClientes($nome)
{
    $dados = buscarNome($nome);
    
    return $dados;
}

//Função para criar um array de dados com base
//no retorno do BD
function criarArray($objeto)
{
    $cont = (int) 0;
    //Estrutura de repetição para pegar um objeto de dados
    //e converter em um array
    while ($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array(
                "id"        => $rsDados['idcliente'],
                "nome"      => $rsDados['nome'],
                "rg"        => $rsDados['rg'],
                "cpf"       => $rsDados['cpf'],
                "telefone"  => $rsDados['telefone'],
                "celular"   => $rsDados['celular'],
                "email"     => $rsDados['email'],
                "obs"       => $rsDados['obs'],
                "foto"      => $rsDados['foto'],
                "sigla"     => $rsDados['uf'],
                "idEstado"  => $rsDados['idEstado']
                
        );
        
        $cont +=1;
    }
    

    //Tratamento para validar se existe dados no BD
    //senão houver o retorno deverá ser false
    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

//Função para gerar um JSON, com base em um array de dados
function criarJSON ($arrayDados)
{
    //Especifica no cabeçalho do PHP que será gerado um JSON
    header("content-type:application/json");
    
    //Converte um array em JSON
    $listJSON = json_encode($arrayDados);
    
    /*
        json_encode() - converte um array em formato JSON
        json_decode() - converte um JSON em formato array
    */
    
    if(isset($listJSON))
        return $listJSON;
    else
        return false;
}










?>
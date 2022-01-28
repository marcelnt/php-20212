<?php 
    /*******************************************************************************
    *   Objetivo: Arquivo responsável por receber dados da API (POST ou PUT)
    *   Data: 24/11/2021
    *   Autor: Marcel
    *********************************************************************************/
    
    //import do arquivo de configuração
    require_once('../functions/config.php');
    


   

    //Função para inserir dados no BD via POST da API
    function inserirClienteAPI($arrayDados)
    {
        //import do arquivo que vai inserir no BD
        require_once(SRC.'bd/inserirCliente.php');
        
        //Fazer Tratamaneto de dados para consistencia
        //...
     
        if (inserir($arrayDados))
            return true;
        else
            return false;
        
    }

    //Função para atualizar dados no BD via PUT da API
    function atualizarClienteAPI($arrayDados, $id)
    {
         require_once(SRC.'bd/atualizarCliente.php');
        
        //Cria um novo array apenas com ID
        $novoItem = array("id" => $id);
        
        //Acrescenta o array do novoItem no arrayDados, 
        //fazendo uma mescla de chaves
        $arrayCliente = $arrayDados + $novoItem;
        
        //Fazer Tratamaneto de dados para consistencia
        //...
        
        if (editar($arrayCliente))
            return true;
        else
            return false;
        
    }

?>
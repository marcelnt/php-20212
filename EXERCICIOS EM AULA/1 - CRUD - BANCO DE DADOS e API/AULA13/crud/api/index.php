<?php 

    /*  
        Permissões e configurações para a API responder
        Em um servidor real 
    */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Header: Content-Type');
    header('Content-Type: application/json');

    //import do arquivo de configuração do sistema
    require_once("../functions/config.php");

    $url = (string) null;
    
    //Cria um array com base na url até a pasta API
    //guarda no indice 0 a primeira palavra após a "/"
    $url = explode('/', $_GET['url']);
    
    //Estrutura condicional para encaminhar a API
    //conforme a escolha [clientes ou estados]
    switch ($url[0])
    {
        case 'clientes':
             //Import do arquivo de API de clientes
            require_once('clientesAPI/index.php');
            break;
        
        case 'estados':
            //Import do arquivo de API de clientes
            require_once('estadosAPI/index.php');
            break;
            
    }


   

?>
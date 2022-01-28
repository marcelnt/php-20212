<?php

    //import para o start do slim php
    require_once("vendor/autoload.php");
    
    //Instancia da classe Slim\App, é realizada
    //para termos acesso aos metodos da classe
    $app = new \Slim\App();

    //EndPoint - É um ponto de parada da API, ou seja
    //serão as formas de requisição que a API irá
    //responder
    
    //$request - será usado para pegar algo que 
    //vai enviado para a API

    //$response - será utilizado para quando a API
    //irá devolver algo, seja uma mensagem, status,
    //body, header, etc

    //args - serão os argumentos que podem ser 
    //encaminhados para a API

    //Endpoint: GET, retorna todos dados de clientes
    $app->get('/clientes', function($request, $response, $args){
        //import do arquivo que solicita das requisições 
        //de busca no BD
        require_once('../controles/exibeDadosClientes.php');
        
        //Valida a existencia da chegada de dados 
        //como parametros. 
        
        //Parametro para filtrar pelo nome
        if (isset($request->getQueryParams()['nome']))
        {
        /***** Recebendo dados pela queryString *****/
            $nome = (string) null;
            $nome = $request->getQueryParams()['nome'];
            if($listDados = buscarNomeClientes($nome))
                if($listDadosArray = criarArray($listDados))
                    $listDadosJSON = criarJSON($listDadosArray);
        /********************************************/
        }else
        {
            //Chama a função (na pasta controles) que vai 
            //requisitar os dados no BD
            if($listDados = exibirClientes())
                if($listDadosArray = criarArray($listDados))
                    $listDadosJSON = criarJSON($listDadosArray);
        }
 
        //Validação para tratar BD sem conteúdo
        if($listDadosArray)
        {
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type', 'application/json')
                                ->write($listDadosJSON);
        }else
        {
            return $response    ->withStatus(204);
                                
                                
        }
    });

    //Endpoint: GET, retorna um cliente pelo ID
    $app->get('/clientes/{id}', function($request, $response, $args){
        //import do arquivo que solicita das requisições 
        //de busca no BD
        require_once('../controles/exibeDadosClientes.php');
        
        //Recebe o ID que será encaminhado na URL
        $id = $args['id'];
       
        //Chama a função (na pasta controles) que vai 
        //requisitar os dados no BD
        if($listDados = buscarClientes($id))
            if($listDadosArray = criarArray($listDados))
                $lisDadosJSON = criarJSON($listDadosArray);
        
        //Validação para tratar BD sem conteúdo
        if($listDadosArray)
        {
            return $response    ->withStatus(200)
                                ->withHeader('Content-Type', 'application/json')
                                ->write($lisDadosJSON);
        }else
        {
            return $response    ->withStatus(204);
                                
                                
        }
    });
    
    //EndPoint: POST, envia um novo cliente para o BD
    $app->post('/clientes', function($request, $response, $args){
        
        //Recebe o Content Type do header, para verificar se o padrão
        //do body será json
        $contentType = $request->getHeaderLine('Content-Type');
        
        //Valida se o tipo de dados é JSON
        if ($contentType == 'application/json')
        {
            //Recebe o conteudo do enviado no body da mensagem
            $dadosBodyJSON = $request->getParsedBody();
            
            //Valida se o corpo do body esta vazio
            if($dadosBodyJSON == "" || $dadosBodyJSON == null)
            {
                return $response    ->withStatus(406)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{"message":"Conteúdo enviado pelo body não contém dados válidos."}');
            }else
            {
                //import no arquivo que vai encaminhar os dados para o BD
                require_once('../controles/recebeDadosClientesAPI.php');
                
                //Envia os dados para o BD e valida se foi inserido com sucesso
                if(inserirClienteAPI($dadosBodyJSON))
                {
                    return $response    ->withStatus(201)
                                        ->withHeader('Content-Type', 'application/json')
                                        ->write('{"message":"Item criado com sucesso"}');
                }else
                {
                    return $response    ->withStatus(400)
                                        ->withHeader('Content-Type', 'application/json')
                                        ->write('{"message":"Não foi possível salvar os dados, favor conferir o body da mensagem"}');
                }
            }
        }else
        {
             return $response   ->withStatus(406)
                                ->withHeader('Content-Type', 'application/json')
                                ->write('{"message":"Formato de dados do Header incompatível com o padrão JSON"}');
        }
            
        
    });

    //EndPoint: PUT, atualiza um cliente no BD
    $app->put('/clientes/{id}', function($request, $response, $args){
        
        //Recebe o Content Type do header, para verificar se o padrão
        //do body será json
        $contentType = $request->getHeaderLine('Content-Type');
        
        //Valida se o tipo de dados é JSON
        if ($contentType == 'application/json')
        {
            //Recebe o conteudo do enviado no body da mensagem
            $dadosBodyJSON = $request->getParsedBody();
            
            
            
            //Valida se o corpo do body esta vazio
            if($dadosBodyJSON == "" || $dadosBodyJSON == null || !isset($args['id']) || !is_numeric($args['id']) )
            {
                return $response    ->withStatus(406)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{"message":"Conteúdo enviado pelo body não contém dados válidos."}');
            }else
            {
                //Recebe o id que será enviado pela URL
                $id = $args['id'];
                
                //import no arquivo que vai encaminhar os dados para o BD
                require_once('../controles/recebeDadosClientesAPI.php');
                
                //Envia os dados para o BD e valida se foi inserido com sucesso
                if(atualizarClienteAPI($dadosBodyJSON, $id))
                {
                    return $response    ->withStatus(200)
                                        ->withHeader('Content-Type', 'application/json')
                                        ->write('{"message":"Item atualizado com sucesso"}');
                }else
                {
                    return $response    ->withStatus(400)
                                        ->withHeader('Content-Type', 'application/json')
                                        ->write('{"message":"Não foi possível salvar os dados, favor conferir o body da mensagem"}');
                }
            }
        }else
        {
             return $response   ->withStatus(406)
                                ->withHeader('Content-Type', 'application/json')
                                ->write('{"message":"Formato de dados do Header incompatível com o padrão JSON"}');
        }
    });

    //EndPoint: DELETE, exclui um cliente do BD
    $app->delete('/clientes/{id}', function($request, $response, $args){
        
        //Valida se o corpo do body esta vazio
        if(!isset($args['id']) || !is_numeric($args['id']))
        {
            return $response    ->withStatus(406)
                                ->withHeader('Content-Type', 'application/json')
                                ->write('{"message":"Não foi encaminhado um ID válido do registro."}');
        }else
        {
            //recebe o id enviado pela URL
            $id = $args['id'];
            
            //Import do arquivo de exclusão do cliente
            require_once('../controles/excluirDadosClientesAPI.php');
            
            if(excluirClienteAPI($id))
            {
                return $response    ->withStatus(200)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{"message":"Item excluido com sucesso"}');
            }else{
                return $response    ->withStatus(400)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{"message":"Não foi possível realizar essa operação."}');
            }
            
        }
    });
    
    //Carrega todos os EndPoint para execução
    $app->run();
    
?>
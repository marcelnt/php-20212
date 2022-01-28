<?php 
/*********************************************
    Objetivo: Arquivo para fazer upload de Imagens
    Data: 03/11/2021
    Autor: Marcel
*********************************************/


//Função para fazer upload de arquivos
function uploadFile ($arrayFile)
{
    $fotoFile = $arrayFile;
    
    $tamanhoOriginal = (int) 0;
    $tamanhoKB = (int) 0;
    $extensao = (string) null;
    $tipoArquivo = (string) null;
    $nomeArquivo = (string) null;
    $nomeArquivoCript = (string) null;
    $arquivoTemp = (string) null;
    $foto = (string) null;
    
    
    //die; //Serve para parar a execução do código do apache

    //Valida se o arquivo existe no array
    if ($fotoFile['size'] > 0 && $fotoFile['type'] != "")
    {
        //recebe o tamanho original do arquivo em byte
        $tamanhoOriginal = $fotoFile['size'];
        
        //Converte o tamanho original em KBytes
        $tamanhoKB = $tamanhoOriginal/1024;
        
        //recebe a tipo original do arquivo
        $tipoArquivo = $fotoFile['type'];
        
        //Valida se o tamanho do arquivo é 
        //menor do que o permitido
        if($tamanhoKB <= TAMANHO_FILE)
        {
            //Validação para percorrer o array de extensões  
            //permitidas buscando a extensão do arquivo atual,  
            //se encontrar retorna true
            if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS)) 
            {
                //Permite extrair apenas o nome de um arquivo sem a extensão
                $nomeArquivo = pathinfo($fotoFile['name'], PATHINFO_FILENAME);
                //Permite extrair apenas a extensão de um arquivo sem o nome
                $extensao = pathinfo($fotoFile['name'], PATHINFO_EXTENSION);
                
                /*
                    Algoritmos de Criptografia no PHP
                        hash('sha256', 'variavel')
                        sha1('variavel')
                        md5('variavel')
                */
                
                //uniqid() - gera uma sequencia numerica com base nas
                //configurações de hardware da maquina
                //time() pega a hora:minuto:segundo atul
                $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
                
                //Monta o novo nome do arquivo com a extensão
                $foto = $nomeArquivoCript.".".$extensao;
                
                //Recebe o nome do arquivo temporario que foi gerado
                //quando o apache recebeu o arquivo do form
                $arquivoTemp = $fotoFile['tmp_name'];
                
                // move_uploaded_file - Move o arquivo da pasta temporaria do apache
                //para a pasta do servidor que foi criada
                if(move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE.$foto))
                    return $foto;
                else
                    echo('Erro no upload do arquivo!');
                
            }else
                echo('Erro Tipo de arquivo');
        }else
            echo('Erro Tamanho do arquivo');
    }
    
}








?>
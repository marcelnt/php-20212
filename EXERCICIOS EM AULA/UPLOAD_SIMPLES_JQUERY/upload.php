<?php 

    /* UPLOAD DE ARQUIVOS */
    if(isset($_POST))
    {
        //$nome = $_POST['txtnome'];
        
        //var_dump($_FILES['flefoto']);
        
        //pegando o nome do arquivo a ser enviado para o servidor
        $arquivo = $_FILES['flefoto']['name'];
        
        //Pega o tamanho do arquivo
        $tamanho_arquivo = $_FILES['flefoto']['size'];
        
        //Transforma de bytes para kbytes (/1024) e arredonda o resultado do calculo tranzendo apenas a parte inteira
        $tamanho_arquivo =round($tamanho_arquivo/1024);
                
        //Pega a extensão do arquivo (strrchr)
        $ext_arquivo = strrchr($arquivo,".");
        
        //Pega apenas o nome do arquivo, sem a extensão 
        $nome_arquivo = pathinfo($arquivo,PATHINFO_FILENAME);
        
        /*
        Criptografa o  nome do arquivo para garantir que não exista dois arquivos com o mesmo nome.
        
            md5() ->realiza a criptografia de uma string

            uniqid() ->gera um numero individual e aleatório baseado em um dado

            time() -> pega a hora, minuto e segundo do servidor
        
        */
        $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
        
        //Guarda o diretório que será feito o upload do arquivo
        $diretorio_arquivo = "arquivos/";
        
        //Vetor de dados contendo todas as extensões válidas para o upload de arquivo
        $arquivos_permitidos = array(".jpg",".png",".jpeg");
        
        //Verifica se a extensão do arquivo é permitida dentro do vetor de extensões válidas
       
        if(in_array($ext_arquivo,$arquivos_permitidos))
        {
           
            //Valida o tamanho do arquivo a ser enviado para o servidor    
           if($tamanho_arquivo<=2000)
           {
               $arquivo_tmp = $_FILES['flefoto']['tmp_name'];
               $foto = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;
               
               
               if (move_uploaded_file($arquivo_tmp,$foto)){
                   
                   /*
                    $sql = "insert into tblfotos (nome,foto)
                            values ('".$nome."','".$foto."')";
                   
                    mysqli_query($conexao, $sql);
                    */
                   
                   //Retorna para a div visualizar a imagem a ser exibida
                   echo("<img src='".$foto."'>");
                   
                   //Coloca na caixa de texto da foto no formulário de cadastro para ser inserido no BD
                   echo("
                        <script>
                            frmCadastro.txtfoto.value = '". $foto ."';
                        </script>
                   
                   ");
                  
                   
                   
               }else{
                   echo("Não foi possível enviar o arquivo para o servidor");
               }
               
               
           }else{
               echo("Tamanho de arquivo inválido!");
           }
            
        }else{
            echo("Extensão Inválida!");
        }

    }
?>
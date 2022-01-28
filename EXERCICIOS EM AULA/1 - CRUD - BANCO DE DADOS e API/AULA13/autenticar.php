<?php

    //import do arquivo de configuração de sistema
    require_once('crud/functions/config.php');

    //import do arquivo de conexão
    require_once('crud/bd/conexaoMysql.php');

    //Declaração de variaveis
    $login = (string) null;
    $senha = (string) null;

    //Recebe os dados via POST do from de login
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($login != "" && $senha != "")
    {
        $sql = "select * from tblUsuario
            where   login = '".$login."' and
                    senha = '".$senha."'"; 
        
        $conexao = conexaoMysql();
        
        $select = mysqli_query($conexao, $sql);
        
        if($rsUsuario = mysqli_fetch_assoc($select))
        {
            //Ativa o uso de variavel de sessão
            session_start();
            
            $_SESSION['nomeUsuario'] = $rsUsuario['nome'];
            $_SESSION['statusLogin'] = true;
            
            //Permite redirecionar para uma página
            header('location: crud/index.php');
        }
            
        else
            echo(LOGIN_MSG_INVALIDO);
            
    }

?>
<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="crud/style/style.css">
    </head>
    <body>
        <div id="login"> 
            <div id="cadastroTitulo"> 
                <h1> Autenticação de Usuários </h1>
            </div>
            <div id="cadastroInformacoes">

                <form  action="autenticar.php" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Login: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" value="" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                         <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtSenha" value="" maxlength="100">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Autenticar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
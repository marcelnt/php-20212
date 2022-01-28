<?php 

    if (isset($_GET['btnSalvar']))
    {

        //Comentário
        #Comentário
        /*
            Comentário em bloco
        */

        //$_GET[] permite resgatar um dado enviado pelo metodo GET
        $nome = $_GET['txtNome'];
        $uf = $_GET['sltUf'];
        $sexo = $_GET['rdosexo'];

        //Tratamento de erro para quando o checkbox não for selecionado
        if(isset($_GET['chkPortugues']))
        {
           $idiomaPortugues = $_GET['chkPortugues']; 
        }else{
            $idiomaPortugues = null;
        }

        //Tratamento de erro para quando o checkbox não for selecionado
        if(isset($_GET['chkIngles']))
        {
            $idiomaIngles = $_GET['chkIngles'];
        }else{
            $idiomaIngles = null;
        }

        //isset() - Verifica se o objeto ou variavel existe ou foi criado na programação (retorna verdadeiro ou falso)
        //Tratamento de erro para quando o checkbox não for selecionado
        if (isset($_GET['chkFrances']))
        {
            $idiomaFrances = $_GET['chkFrances'];
        }else{
            $idiomaFrances = null;
        }
        $senha = $_GET['txtSenha'];
        $obs = $_GET['txtObs'];

        echo("O nome digitado foi: <span class='destaque'>" . $nome . "</span>");
        echo("<br>O UF digitado foi: " . $uf);
        echo("<br>O sexo digitado foi: " . $sexo);
        echo("<br>O idioma escolhido foram: " . $idiomaPortugues . " " .$idiomaIngles . " " . $idiomaFrances);
        echo("<br>A senha digitada foi: " . $senha);
        echo("<br>A Observação digitada foi: " . $obs);

    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>
            Aula de Formulários
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="formContatos">
            <form name="frmContatos" action="" method="get">
                <div>
                    <label>
                        Nome:
                    </label> 
                    <input type="text" name="txtNome" size="50" maxlength="40" value="" placeholder="Insira seu nome">
                </div>
                <div>
                    <label>
                        UF:
                    </label>
                    <select name="sltUf" >
                        <option value="" selected>Selecione um item</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                    </select>
                </div>
                <div>
                    <label>Sexo:</label>
                    <input type="radio" name="rdosexo" value="F" checked> Feminino
                    <input type="radio" name="rdosexo" value="M"> Masculino
                </div>
                <div>
                    <label>Idiomas:</label>
                    <input type="checkbox" name="chkPortugues" value="pt" checked>Português
                    <input type="checkbox" name="chkIngles" value="en">Inglês
                    <input type="checkbox" name="chkFrances" value="fr">Francês
                </div>
                <div>
                    <label>Senha:</label>
                    <input type="password" name="txtSenha" size="20" maxlength="10" value=""> 
                </div>
                <div>
                    <label>Obs:</label>
                    <textarea name="txtObs" cols="50" rows="4"></textarea>
                </div>
                <div>
                    <input type="submit" name="btnSalvar" value="Salvar">
                    <input type="reset" name="btnLimpar" value="Limpar">
                    
                    <!-- 
                        button - será utilizado exclusivamente pelo JS
                        
                        submit - será utilizado em conjunto com o form, para retirar os dados dos formulário
                        
                        reset - permite limpar as caixas do formulário

                    -->
                </div>
            </form>
        </div>
    </body>
</html>
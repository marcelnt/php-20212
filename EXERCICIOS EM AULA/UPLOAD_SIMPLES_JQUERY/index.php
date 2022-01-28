
<html>
<head>
	<title>
		Upload Simples
	</title>
    <style>
        .foto{
            width: 50px;
            height: 50px;
        }
        
        #visualizar, #visualizar img{
            width: 200px;
            height: 300px;
            background-color: aqua;
        }
    </style>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.form.js"></script>

    <script>
        
        $(document).ready(function(){
            //Na ação do live do elemento file, que significa ao ser carregado com um arquivo (foto), será acionado    
           $('#foto').live('change',function(){
               
               //Coloca um gif animado para criar uma interação com o usuário
               $('#visualizar').html("<img src='imagens/ajax-loader.gif'>");
               
               //Cria um temporizador de 2segundos para conseguirmos visualizar o gif, e na sequencia após os 2segundos o processor de upload irá continuar
               setTimeout(function(){
                   
                    //Forçando um submit no formulário do fileUpload, para conseguir realizar o upload da foto sem um click de um botão.
               
                   //O retorno da página upload.php que será submetida pelo formulário deverá ser descarregada na div visualizar.
                   //Para isso usamos o atributo target do ajaxForm (isso é conhecido como CallBack)

                   $('#frmfotos').ajaxForm({
                       target:'#visualizar'

                   }).submit();
               },2000);
           });
        });

    </script>

</head>

<body>
    <div id="visualizar">
    
    </div>
    
    <div>
        <!-- 
            Para o upload de arquivos 
            SÃO OBRIGATÓRIOS: usar o metodo POST e colocar o enctype com a opção multipart/form-data
        -->
        <form name="frmfotos" method="post" action="upload.php" enctype="multipart/form-data" id="frmfotos">
            
            Foto:<input type="file" name="flefoto" id="foto">
            <br><br>
            
        </form>
        
        <!-- 
            Para fazer o upload usando o Jquery, precisamos separar o código de upload em um novo arquivo.

            Precisamos de dois formulários para usaro Jquery, um form será para chamar o upload.php, e outro form será para fazer o insert no BD
        -->
        <form name="frmCadastro" method="post" action="index.php">
            Nome:<input type="text" name="txtnome" value=""><br><br>
                 <input type="text" name="txtfoto"><br><br>
                 <input id="btnSalvar" type="button" name="btnSalvar" value="Salvar">
        </form>
        
    </div>

</body>
</html>
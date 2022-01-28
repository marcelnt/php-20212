<?php
/****************************************************************************************
    Objetivo: Arquivo responsável por receber o id do Cliente e excluir do BD
    Data: 25/11/2021
    Autor: Marcel
*****************************************************************************************/

 //Import do arquivo para exluir no BD
 require_once(SRC.'bd/excluirCliente.php');

function excluirClienteAPI($id)
{
    if(excluir($id))
        return true;
    else
        return false;
}

?>
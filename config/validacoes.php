<?php 

//criando array de erros
$erros = [];

//criando funções de validação
function validaNome($nome){
    global $erros;
    if( strlen($nome) == 0 ){
        array_push($erros, "Insira o nome corretamente");
    }
}

function validaCpf($cpf){
    global $erros;
    if ( strlen($cpf) != 11 ){
        array_push($erros, "Insira o CPF corretamente");
    }
}
?>

<?php
session_start();
$nomeSistema= "Cursos";
$usuario= isset($_SESSION['usuario'])? $_SESSION['usuario']: [];


$nomeArquivo= "produto.json";
//olhar na pagina cadastro outra forma de fazer, mais passo a passo
$produtos= json_decode(file_get_contents($nomeArquivo), true);

/*$usuario= ["nome"=>"Luana"] se está dessa forma, aparece o nome do usuário como cadastrado*/
//$produtos= [
    //["nome"=>"FullStack", "preco"=>"R$ 1.200,00", "duracao"=>"5 meses", "imagem"=>"imagem/fullstack.jpg"],
    //["nome"=>"Marketing Digital", "preco"=>"R$ 1.000,00", "duracao"=>"4 meses", "imagem"=>"imagem/mkDigital.jpg"], /*se a array ta vazia fica tudo em branco, então o ideal seria colocar uma msg */
//];
$categorias =["Cursos", "Palestras", "Artigos", "Produtos"];
?>
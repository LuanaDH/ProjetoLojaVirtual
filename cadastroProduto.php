<?php 

    function cadastrarProduto($nomeProduto, $descProduto, $imgProduto, $precoProduto){
        $nomeArquivo= "produto.json";

        if(file_exists($nomeArquivo)){
            //abrindo e pegando informações do arquivo
            $arquivo= file_get_contents($nomeArquivo);
            //transformar json em array
            //ja temos uma variavel $produtos dentro do else, mas o que acontece em vegas fica em vegas
            $produtos= json_decode($arquivo, true); //colocar true, pq por padrão o decode sempre tranforma em obj
            //add um novo produto na array que estava dentro do arquivo
            $produtos[] = ["nome"=>$nomeProduto, "preco"=>$precoProduto, "desc"=>$descProduto, "imagemProduto"=>$imgProduto];

            $json= json_encode($produtos);
            //salvando o json dentro de um arquivo (colocar a $erro para validar, se deu certo ou não)
            $deuCerto= file_put_contents($nomeArquivo, $json);

            if($deuCerto){
                return "Ufa!!! Deu certo.";
            } else {
                return "Aff!!! não deu.";
            }  


        }else{
            $produtos= []; //já poderia colocar direto, array dentro de array
            //array_push($produtos, ["nome"=>$nomeProduto, "preco"=>$precoProduto, "desc"=>$descProduto, "imagemProduto"=>$imgProduto]); faz a msm coisa que embaixo
            $produtos[] = ["nome"=>$nomeProduto, "preco"=>$precoProduto, "desc"=>$descProduto, "imagemProduto"=>$imgProduto];

            //transformando array em json
            $json= json_encode($produtos);
            //salvando o json dentro de um arquivo (colocar a $erro para validar, se deu certo ou não)
            $deuCerto= file_put_contents($nomeArquivo, $json);

            if($deuCerto){
                return "Ufa!!! Deu certo.";
            } else {
                return "Aff!!! não deu.";
            }   
        }
    }

    if($_POST){ 
        //salvando arquivo
        $nomeImg= $_FILES['imgProduto']['name'];
        $localTmp= $_FILES['imgProduto']['tmp_name'];
        $caminhoSalvo= 'imagem/'.$nomeImg;

        $deuCerto= move_uploaded_file($localTmp, $caminhoSalvo);
        exit;

        //colocar echo na frente pro meu usuário ver se deu certo
        echo cadastrarProduto($_POST['nomeProduto'], $_POST['descProduto'], $_POST['imgProduto'], $_POST['precoProduto']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro Produtos</title>
</head>

<body>
    <?php include_once("header.php"); ?>

    <main class="container">

        <div class="row">
            <div class="col-12">
                <h1>Cadastro de Produto</h1>
            </div>

            <div class="col-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomeProduto" placeholder="Nome do Produto"/>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="descProduto" placeholder="Descrição do Produto"/>
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="imgProduto" placeholder="Imagem do Produto"/>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" name="precoProduto" placeholder="Preço do Produto"/>
                    </div>

                    <button class="btn btn-success">Cadastrar Produto</button>

                </form>
            </div>
        </div>

    </main>

</body>
</html>
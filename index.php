<?php
$nomeSistema= "Cursos";
$usuario= [];
/*$usuario= ["nome"=>"Luana"] se está dessa forma, aparece o nome do usuário como cadastrado*/
$produtos= [
    ["nome"=>"FullStack", "preco"=>"R$ 1.200,00", "duracao"=>"5 meses"],
    ["nome"=>"Marketing Digital", "preco"=>"R$ 1.000,00", "duracao"=>"4 meses"], /*se a array ta vazia fica tudo em branco, então o ideal seria colocar uma msg */
];
$categorias =["Cursos", "Palestras", "Artigos", "Produtos"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center p-3">  <!--poderia substituir todas as utilites pela class navbar-->
        <div id="logo">
        <h1><?php echo $nomeSistema;?></h1>
        </div>  

        <nav>
            <ul class="nav">

            <?php if (isset($usuario) && $usuario!= []) { ?> <!--negação colocar a ! na frente do isset, o que temos tem de retornar True -->
                <li class= "nav-item">
                    <a class="nav-link" href="#">Curso</a>
                </li>
                <li class= "nav-item">
                    <a class="nav-link" href="#">Olá <?php echo $usuario['nome'] ?> </a>
                </li>

            <?php }else { ?>
                
                <li class= "nav-item">
                    <a class="nav-link" href="#">Log In</a>
                </li>
                <li class= "nav-item">
                    <a class="nav-link" href="#">Cadastrar</a>
                </li>
            <?php } ?>

            </ul>
        </nav>
    </header>

    <main>

    <div>
        <nav class= "bg-dark">
            <ul class= "nav d-flex justify-content-between p-3">

            <?php foreach($categorias as $categoria){ ?>
                <li class= "nav-item">
                    <a class="nav-link text-white" href="#"><?php echo $categoria; ?></a>
                </li>
            <?php } ?>    
                <!-- <li class= "nav-item">
                    <a class="nav-link" href="#">Palestras</a>
                </li>
                <li class= "nav-item">
                    <a class="nav-link" href="#">Artigos</a>
                </li> -->
            </ul>
        </nav>
    </div> 

        <section class="container mt-4">
            <div class="row justify-content-between">

            <?php if(isset($produtos) && $produtos != []){ ?>    
            <?php foreach($produtos as $produto){ ?>
                    <div class="col-lg-3 card text-center">
                        <h1><?php echo $produto['nome']; ?></h1>
                        <img src="imagem/fullstack.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-text"><?php echo $produto['preco']; ?></h5>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                    </div>
            <?php } ?> <!--fechando o FOREACH-->
            <?php } else { ?> <!--fechando o IF-->      
                    <h1> Não tem produtos cadastrados nessa sessão ;( </h1>
            <?php } ?> <!--fechando o ELSE-->       
            </div>
        </section>
    </main>
    
</body>
</html>
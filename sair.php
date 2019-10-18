<?php

//sempre colocar o session start
session_start();
//deslogando usuário
session_destroy();
//redirecionando pra home
header('Location:index.php');

?>
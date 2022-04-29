<?php 
include('conection.php');

/*pegar usuario
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    getUser($id);
}

//listar usuários
else{
    listUsers();
}
*/

//cadastrar usuario
if(isset($_POST['nome'])){
    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $celular    = $_POST['celular'];
    $curso      = $_POST['curso'];

    newUser($nome, $email, $senha, $celular, $curso);
}
?>

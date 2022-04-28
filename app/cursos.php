<?php 
include('conection.php');

//coleta curso pelo id
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    getCurso($id);
}
//lista todos os cursos
else{
    listCursos();
}
?>
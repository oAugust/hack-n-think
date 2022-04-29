<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_vestibulinho";
$conn = new mysqli($servidor,$usuario,$senha,$banco);

//--------------------------------------------Criar usuário-----------------------------------------------------------//
function newUser($nome, $email, $senha, $celular, $curso){
    $sql = "insert into tb_user values(null, '$nome', '$email', '$senha', '$celular', '$curso')"; //comando sql para inserir novos usuarios
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		//vamos enviar o email
		//$msg = 'Sua conta no Vestibulinho Etec foi efetuada com sucesso! Se não foi você, entre no site e cancele.';

		/* if(mail($email,"Verificação de Cadastro",$msg)){ //tentativa de envio de email
			$info = array("message" => "Email de verificação enviado com sucesso!");
		}
        else{
			$info = array("message" => "Falha ao enviar email de verificação!");
		} */

        $info = array("message" => "Usuário cadastrado com sucesso!");
	}
    else{
		$info = array("message" => "Falha ao cadastrar usuário!");
	}

    header('Location:../index.html');
}

//----------------------------------------------Coletar usuário pelo id---------------------------------------------------//
function getUser($id){
    $sql = "select * from tb_user where id = $id"; //comando sql para coletar usuario
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		$rows = array();    
        while($row = mysqli_fetch_assoc($comando)) {    
            $idUser         = $row['id'];
            $nomeUser       = $row['nm_user'];
            $emailUser      = $row['ds_email'];
            $senhaUser      = $row['ds_password'];
            $celularUser    = $row['nr_celular'];

            $rows[] = array(
                'id'            =>  $idUser, 
                'nm_user'       =>  $nomeUser, 
                'ds_email'      =>  $emailUser,
                'ds_password'   =>  $senhaUser,
                'nr_celular'    =>  $celularUser
            );

            $info = $rows;
        }
	}
    else{
		$info = array("message" => "Falha ao encontrar usuário!");
	}

    echo json_encode($info);
    return json_encode($info);
}

//----------------------------------------------Listar usuários-----------------------------------------------------------//
function listUsers(){
    $sql = "select * from tb_user"; //comando sql para listar cursos
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		$rows = array();    
        while($row = mysqli_fetch_assoc($comando)) {    
            $idUser         = $row['id'];
            $nomeUser       = $row['nm_user'];
            $emailUser      = $row['ds_email'];
            $senhaUser      = $row['ds_password'];
            $celularUser    = $row['nr_celular'];

            $rows[] = array(
                'id'            =>  $idUser, 
                'nm_user'       =>  $nomeUser, 
                'ds_email'      =>  $emailUser,
                'ds_password'   =>  $senhaUser,
                'nr_celular'    =>  $celularUser
            );

            $info = $rows;
        }
	}
    else{
		$info = array("message" => "Falha ao listar usuario!");
	}

    echo json_encode($info);
    return json_encode($info);
}

//----------------------------------------------Listar cursos-----------------------------------------------------------//
function listCursos(){
    $sql = "select * from tb_curso"; //comando sql para listar cursos
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		$rows = array();    
        while($row = mysqli_fetch_assoc($comando)) {    
            $idCurso      = $row['id'];
            $nomeCurso    = $row['nm_curso'];
            $dsCurso      = $row['ds_curso'];

            $rows[] = array(
                'id'            =>  $idCurso, 
                'nm_curso'      =>  $nomeCurso, 
                'ds_curso'      =>  $dsCurso,
            );

            $info = $rows;
        }
	}
    else{
		$info = array("message" => "Falha ao encontrar curso!");
	}

    echo json_encode($info);
    return json_encode($info);
}

//------------------------------------------Coletar curso pelo id-------------------------------------------------//
function getCurso($id){
    $sql = "select * from tb_curso where id = $id"; //comando sql para listar cursos
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		$rows = array();    
        while($row = mysqli_fetch_assoc($comando)) {    
            $idCurso      = $row['id'];
            $nomeCurso    = $row['nm_curso'];
            $dsCurso      = $row['ds_curso'];

            $rows[] = array(
                'id'            =>  $idCurso, 
                'nm_curso'      =>  $nomeCurso, 
                'ds_curso'      =>  $dsCurso,
            );

            $info = $rows;
        }
	}
    else{
		$info = array("message" => "Falha ao encontrar curso!");
	}

    echo json_encode($info);
    return json_encode($info);
}
?>




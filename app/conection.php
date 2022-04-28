<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_vestibulinho";
$conn = new mysqli($servidor,$usuario,$senha,$banco);

function newUser($nome, $email, $senha, $celular){
    $sql = "insert into tb_user values(null, '$nome', '$email', '$senha', '$celular')"; //comando sql para inserir novos usuarios
    $comando = $GLOBALS['conn']->query($sql); //envio de comando

    if($comando){
		//vamos enviar o email
		$msg = 'Sua conta no Vestibulinho Etec foi efetuada com sucesso! Se não foi você, entre no site e cancele.';

		if(mail($email,"Verificação de Cadastro",$msg)){ //tentativa de envio de email
			$info = array("message" => "Email de verificação enviado com sucesso!");
		}
        else{
			$info = array("message" => "Falha ao enviar email de verificação!");
		}
	}
    else{
		$info = array("message" => "Falha ao cadastrar usuário!");
	}

    return json_encode($info);
}

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

            $rows['tb_user'][] = array(
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
		$info = array("message" => "Falha ao cadastrar usuário!");
	}

    return json_encode($info);
}
?>



<!-- quem ler é gay -->
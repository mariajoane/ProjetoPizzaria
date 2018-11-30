<?php

include_once 'conexao.php';


$cpf = null;
$nome = null;
$email = null;
$telefone = null;
$senha = null;
$c_senha = null;
$verifica_insert= null;

if(empty($_POST['cpf'])){
    $_SESSION['vazio_cpf'] = "Campo CPF é obrigatório";
        $verifica_insert= " ";
}else{
    $_SESSION['value_cpf'] = $_POST['cpf'];
}

if(empty($_POST['nome'])){
    $_SESSION['vazio_nome'] = "Campo Nome é obrigatório";
    $verifica_insert= " ";
}else{
    $_SESSION['value_nome'] = $_POST['nome'];
}

if(empty($_POST['email'])){
    $_SESSION['vazio_email'] = "Campo e-mail é obrigatório";
    $verifica_insert= " ";
}else{
    $_SESSION['value_email'] = $_POST['email'];
}

if(empty($_POST['telefone'])){
    $_SESSION['vazio_telefone'] = "Campo Telefone é obrigatório";
    $verifica_insert= " ";
}else{
    $_SESSION['value_telefone'] = $_POST['telefone'];
}

if(empty($_POST['senha'])){
    $_SESSION['vazio_senha'] = "Campo senha é obrigatório";
    $verifica_insert= " ";
}else{
    $_SESSION['value_senha'] = $_POST['senha'];
}

if(empty($_POST['c_senha'])){
    $_SESSION['vazio_c_senha'] = "Campo c_senha é obrigatório";
    $verifica_insert= " ";
}else{
    $_SESSION['value_c_senha'] = $_POST['c_senha'];
}

if ($verifica_insert != " "){

$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$c_senha = mysqli_real_escape_string($conexao, $_POST['c_senha']);


$result_sql = "INSERT INTO usuarios (cpf,nome,email,telefone,senha,c_senha) VALUES ('$cpf','$nome','$email','$telefone','$senha','$c_senha')";

}else{

    $url='index.php';
    echo("<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>");
    exit();

}

if($conexao->query($result_sql) == TRUE){
    $url='index.php';
    echo("<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>");
    exit();

}else{
    echo "Erro".$result_sql."<br>".$conexao->error;
        }

mysqli_close($conexao);

?>
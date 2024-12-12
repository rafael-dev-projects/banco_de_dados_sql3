<?php

/*aqui vamos conectar 
com o banco 
de dados*/
$servername = "localhost";
//você deu nome ao banco de dados
$database = "func2d"; //func2d ou func2d
$username = "root";
$password = "";

$conexao = mysqli_connect(
    $servername, $username, 
    $password,$database
);

if (!$conexao){
    die("Falha na conexão".mysqli_connect_error());
}
//echo "conectado com sucesso";

$id = $_POST["id"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$botao = $_POST["botao"];

if(empty($botao)){

}else if($botao == "Cadastrar"){
    $sql = "INSERT INTO funcionarios 
    (id, nome, cpf) VALUES('','$nome', '$cpf')";
}

//aqui vou tratar erros nas operações C.E.R.A
if(!empty($sql)){
    if(mysqli_query($conexao, $sql)){
        echo "Operação realizada com sucesso";
    }else{
        echo "Houve um erro na operação: <br />";
        echo  mysqli_error($conexao);
    }
}

//echo $id." ".$nome." ".$cpf." ".$botao;



?>
<html>
    <body>
    <form name = "func" method = "post" >
        <label>ID</label>
        <input type ="text" name = "id" /><br />
        <label>Nome</label>
        <input type ="text" name = "nome" /><br />
        <label>CPF</label>
        <input type ="text" name = "cpf" /><br />
        <input type ="submit" name = "botao" value = "Cadastrar" />
        <input type ="reset" name = "botao" value = "cancelar" />
    </form>
    ,<table>
        <tr><
        <td>-</td>
        <td>ID</td>
        <td>Nome</td>
        <td>CPF</td>
        </tr>
    </table>
    <?php
        $sql_mostra_cad = "SELECT * FROM funcionarios ORDER BY id DESC limit 0,10";

        $resultado = mysqli_query($conexao, $sql_mostra_cad);

        while($linha = mysqli_fetch_assoc($resultado)){
            echo "
            <tr>
            <td>
                <a href='?id=".$linha["id"]."'>Selecionar</a>
            </td>
            <td>".$linha["id"]."</td>
            <td>".$linha["id"]."</td>
            <td>".$linha["id"]."</td>
            </tr>
            ";
        }

?>
    </body>
</html>


<?php
//Iniciando sessão.
session_start();
//Conexão com o banco de dados
require_once 'configBD.php';
function verificar_entrada($entrada)
{
    //Filtrando a entrada
    $saida = htmlspecialchars($entrada);
    $saida = stripslashes($saida);
    $saida = trim($saida);
    return $saida; //retorna a saída limpa
}
//Teste se existe a ação
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'cadastro') {
        //Teste se ação é igual a cadastro
        #echo "\n<p>cadastro</p>";
        #echo "\n<pre>";//Pre-formatar
        #print_r($_POST);
        #echo "\n<\pre>";
        //Pegando dados do formulário.
        $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
        $nomeDoUsuario = verificar_entrada($_POST['nomeDoUsuario']);
        $emailUsuario = verificar_entrada($_POST['emailUsuario']);
        $urlPerfil = verificar_entrada($_POST['urlPerfil']);
        $senhaDoUsuario = verificar_entrada($_POST['senhaDoUsuario']);
        $senhaUsuarioConfirmar = verificar_entrada($_POST['senhaUsuarioConfirmar']);
        $dataCriado = date("Y-m-d"); //Data atual no formato banco de dados.
        //Codificando as senhas.
        $senhaCodificada = sha1($senhaDoUsuario);
        $senhaConfirmarCod = sha1($senhaUsuarioConfirmar);
        //Teste de captura de dados.
        // echo "<p>Nome Completo: $nomeCompleto</p>";
        // echo "<p>Nome do Usuário: $nomeDoUsuario</p>";
        // echo "<p>E-mail: $emailUsuario</p>";
        // echo "<p>Senha codificada: $senhaCodificada</p>";
        // echo "<p>Data de criação: $dataCriado</p>";
        if ($senhaCodificada != $senhaConfirmarCod) {
            echo "<p class='text-danger'>Senhas não conferem.</p>";
            exit();
        } else {
            //As senhas conferem, verificar se o usuário já existe no banco de dados.
            $sql = $connect->prepare("SELECT nomeDoUsuario, emailUsuario FROM usuario WHERE nomeDoUsuario = ? OR emailUsuario = ?");
            $sql->bind_param("ss", $nomeDoUsuario, $emailUsuario);
            $sql->execute();
            $resultado = $sql->get_result();
            $linha = $resultado->fetch_array(MYSQLI_ASSOC);
            //Verificando a existência do usuário no banco de dados.
            if ($linha['nomeDoUsuario'] == $nomeDoUsuario) {
                echo "<p class='text-danger'>Usuário indisponível, tente outro.</p>";
            } elseif ($linha['emailUsuario'] == $emailUsuario) {
                echo "<p class='text-danger'>E-mail indisponível, tente outro.</p>";
            } else {
                //Usuário pode ser cadastrado no banco de dados.
                $sql = $connect->prepare("INSERT into usuario (nomeDoUsuario, nomeCompleto, urlPerfil, emailUsuario, senhaDoUsuario, dataCriado) values(?, ?, ?, ?, ?, ?)");
                $sql->bind_param("ssssss", $nomeDoUsuario, $nomeCompleto, $urlPerfil, $emailUsuario, $senhaCodificada, $dataCriado);
                if ($sql->execute()) {
                    echo "<p class='text-success'>Usuário cadastrado</p>";
                } else {
                    echo "<p class='text-danger'>Usuário não cadastrado</p>";
                    echo "<p class='text-danger'>Algo deu errado</p>";
                }
            }
        }
    } else if ($_POST['action'] == 'login') {
        $nomeUsuario = verificar_entrada($_POST['nomeUsuario']);
        $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
        $senha = sha1($senhaUsuario); //Senha codificada
        $sql = $connect->prepare("SELECT * FROM usuario WHERE senhaDoUsuario = ? AND nomeDoUsuario = ?");
        $sql->bind_param("ss", $senha, $nomeUsuario);
        $sql->execute();
        $busca = $sql->fetch();
        if ($busca != null) {
            $_SESSION['nomeDoUsuario'] = $nomeUsuario;

            if (!empty($_POST['lembrar'])) {
                //Se lembrar não estiver vazio! Ou seja, a pessoa quer ser relembrada.
                setcookie("nomeDoUsuario", $nomeUsuario, time() + (60 * 60 * 24 * 30));
                setcookie("senhaDoUsuario", $senhaUsuario, time() + (60 * 60 * 24 * 30));
            } else {
                //A pessoa não quer ser lembrada.
                //Limpando o cookie.
                setcookie("nomeDoUsuario", "");
                setcookie("senhaDoUsuario", "");
            }
            echo "ok";
        } else {
            echo "<p class='text-danger'>Falhou a entrada no sistema. Nome de usuário ou senha inválidos.</p>";
            exit();
        }
    } else if ($_POST['action'] == 'senha') {
        //Senão, teste se ação é recuperar senha
        $email = verificar_entrada($_POST['emailGerarSenha']);
        $sql = $connect->prepare("SELECT idUsuario FROM usuario WHERE emailUsuario = ?");
        $sql ->bind_param("s", $email);
        $sql-> execute();
        $resposta = $sql ->get_result();
        if ($resposta->num_rows > 0){
                //echo "E-mail encontrado!";
                $frase ="BatataTinha9632587410QuandoNasce3214569870EsparralhamapeloChao0147852369";
                $palavra_secreta = str_shuffle($frase);
                $token = substr($palavra_secreta,0,10);
                //echo "Token: $token";
                $sql = $connect ->prepare("UPDATE  usuario SET token=?,
                tempoDeVida=DATE_ADD(NOW(), INTERVAL 1 MINUTE) WHERE emailUsuario =?");
                $sql->bind_param("ss", $token, $email);
                $sql-> execute();
                //echo "Token no Banco de dados";
                $link = "<a href='gerarsenha.php?email=$email&token=$token'>Clique aqui para gerar Nova Senha</a>";
                echo $link;//Este link deve ser enviaso por e-mail
        }else{
                echo "E-mail não encontrado!";
        }
    } else {
        header("location:index.php");
    }
} else {
    //Redirecionando para index.php, negando o acesso
    //a esse arquivo diretamente.
    header("location:index.php");
}
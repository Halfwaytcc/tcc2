<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha']))
    {

        include_once('config.php');
        $email = $_POST['login'];
        $senha = $_POST['senha'];



        $sql = "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location: login.html');
        }
        else
        {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else
    {

        header('Location: login.html');
    }
?>
<?php
    session_start();
    require 'conf.php';

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = stripslashes($_POST['email']);
        $senha = md5($_POST['senha']);

        $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $query->execute([
            'email' => $email,
            'senha' => $senha
        ]);

        if ($query->rowCount() > 0) {
            $dado = $query->fetch();

            $_SESSION['id'] = $dado['id'];
            # code...
            header("Location: index.php");
        }

        # code...
    } else {
        # code...
    }
    

?>

<form action="" method="post">
    <label for="Email">Email
        <input type="email" name="email" id="">
    </label><br><br>

    <label for="Senha">Senha
        <input type="password" name="senha" id="">
    </label><br><br>

    <input type="submit" value="Entrar">
    
</form>
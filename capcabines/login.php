<?php  
	//session_start(); //incluido em config.php
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<form method="post">
		<input type="text" name="login">
		<input type="password" name="senha">
		<input type="submit" name="submit">
	</form>

</body>
</html>
	


<?php  
	include ('classes.php');

	if (isset($_POST['submit'])) {
	    $login = $_POST['login'];
	    $senha = $_POST['senha'];

	    $sql = MySql::conectar()->prepare("SELECT * FROM `login` WHERE login = ?");
	    $sql->execute(array($login));
	    $result = $sql->fetchAll();

	    if (count($result) == 1) {
	        $info = $result[0];

	        if ($info['senha'] == $senha) {
	            $_SESSION['logado'] = true;

	            // Redireciona via JavaScript após o alerta
	            echo "<script>
	                alert('Funcionando...');
	                window.location.href = 'http://localhost/capcabines/adm.php';
	            </script>";
	        } else {
	            echo "<script>alert('Senha incorreta');</script>";
	        }
	    } else {
	        echo "<script>alert('Usuário não existe');</script>";
	    }
	}
?>



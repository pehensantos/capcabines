<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destrói a sessão

// Redireciona de volta para a página de login (ajuste se necessário)
header("Location: login.php");
exit();
?>
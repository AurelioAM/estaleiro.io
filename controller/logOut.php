
<?php
// Inicie a sessão
session_start();

// Encerre a sessão
session_destroy();

// Redirecione para outra página ou faça qualquer outra ação necessária após o término da sessão
header("Location: ../index.php");
exit;
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("Location: 22-lista-pdo.php?consulta=1");
        exit();
    }
?>
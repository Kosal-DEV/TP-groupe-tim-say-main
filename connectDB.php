<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cities','root',);
} catch (\Throwable $th) {
    die($th->getMessage());
}
?>
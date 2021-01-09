<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<a href="logout.php">Abmelden</a>
</body>
</html>
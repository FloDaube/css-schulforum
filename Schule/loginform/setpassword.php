<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_GET["token"])){
    require("../Domain/Model/DBConnect.php");
    $stmt = $con->prepare("SELECT * FROM users WHERE TOKEN = :token"); //Username überprüfen
    $stmt->bindParam(":token", $_GET["token"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count != 0){
        if(isset($_POST["submit"])){
            if($_POST["pw1"] == $_POST["pw2"]){
                $hash = password_hash($_POST["pw1"], PASSWORD_BCRYPT);
                $stmt = $con->prepare("UPDATE users SET PASSWORD = :pw, TOKEN = null WHERE TOKEN = :token");
                $stmt->bindParam(":pw", $hash);
                $stmt->bindParam(":token", $_GET["token"]);
                $stmt->execute();
                echo 'Das Passwort wurde geändert <br>
                    <a href="index.php"></a>Login</a>';
            } else {
                echo "Die Passwörter stimmen nicht überein";
            }
        }
        ?>
        <h1>Neues Passwort setzen</h1>
        <form action="setpassword.php?token=<?php echo $_GET["token"] ?>" method="POST">
            <input type="password" name="pw1" placeholder="Password" required><br>
            <input type="password" name="pw2" placeholder="Password wiederholen" required><br>
            <button type="submit" name="submit">Passwort setzen</button>
        </form>
        <?php
    } else {
        echo "Der Token ist ungültig";
    }
} else {
    echo "Kein gültiger Token gesendet";
}
?>
</body>
</html>
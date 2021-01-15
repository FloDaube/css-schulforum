<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
</head>
<body>
<?php
if(isset($_POST["submit"])){
    require("../../Domain/Model/DBConnect.php");
    $con = \Schule\Domain\Model\DBConnect::get_Connection();
    $stmt = $con->prepare("SELECT * FROM `css-schulforum`.users WHERE name = '".$_POST["username"]."'"); //Username überprüfen
    //$stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->num_rows();
    if($count == 0){
        //Username ist frei
        $con = \Schule\Domain\Model\DBConnect::get_Connection();
        $stmt = $con->prepare("SELECT * FROM `css-schulforum`.users WHERE email = '".$_POST["email"]."'"); //Username überprüfen

        //$stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->num_rows();
        if($count == 0){
            if($_POST["pw"] == $_POST["pw2"]){
                //User anlegen
                //$hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
                $hash = $_POST["pw"];
                $con = \Schule\Domain\Model\DBConnect::get_Connection();
                $stmt2 = $con->prepare("INSERT INTO `css-schulforum`.users (name, password, email) VALUES ('". $_POST["username"] ."', '".$hash."', '".$_POST["email"]."');");
                //$stmt->bindParam(":user", $_POST["username"]);
                //$hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
                //$stmt->bindParam(":pw", $hash);
                //$stmt->bindParam(":email", $_POST["email"]);
                $stmt2->execute();
                echo "Dein Account wurde angelegt";
            } else {
                echo "Die Passwörter stimmen nicht überein";
            }
        } else {
            echo "Email bereits vergeben";
        }
    } else {
        echo "Der Username ist bereits vergeben";
    }
}
?>
<h1>Account erstellen</h1>
<form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="text" name="email" placeholder="Email" required><br>
    <input type="password" name="pw" placeholder="Passwort" required><br>
    <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
    <button type="submit" name="submit">Erstellen</button>
</form>
<br>
<a href="index.php">Hast du bereits einen Account?</a>
</body>
</html>
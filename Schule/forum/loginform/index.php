<?php
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link type="text/css" href="../themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link type="text/css" href="../themes/default/css/style.css" rel="stylesheet">
    <title>Login</title>
</head>
<div class="headerfixedBar">
    <div class="row">
        <div class="col-lg-12">
            <div class="pullLeft">
                <a class="headerlogoText" href="index.php" title="CSS-Schul-Forum"><img class="headerlogoImage" src="../themes/default/images/150x150_Logo.png"> CSS-Schul-Forum</a>
            </div>
        </div>
    </div>

</div>
<body>
<?php
if(isset($_POST["submit"])){
    require("../../Domain/Model/DBConnect.php");
    $con =new \Schule\Domain\Model\DBConnect();
    $con = \Schule\Domain\Model\DBConnect::get_Connection();
    $stmt = $con->prepare("SELECT * FROM `css-schulforum`.users WHERE name = '".$_POST["username"]."'"); //Username überprüfen
    //$stmt->bindParam(":user", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->fetch();

    //Erstelle SQL Query für User mit Namen der Übergeben wurde.
    $query = "SELECT * FROM `css-schulforum`.users WHERE name = '".$_POST["username"]."'";

    //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
    $con = \Schule\Domain\Model\DBConnect::get_Connection();
    $result = mysqli_query($con, $query);
    $ds = $result->fetch_assoc();

    if($count == 1){
        //Username ist frei

        if($ds['password'] == $_POST['pw']){
            session_start();
            $_SESSION['id'] = $ds['id'];
            header("Location: ../../index.php");
        } else {
            echo "Der Login ist fehlgeschlagen1";
        }
    } else {
        echo "Der Login ist fehlgeschlagen";
    }
}
?>
<h1 style="margin-top: 10%; margin-left: 45%;">Anmelden</h1>
<form style="margin-left: 45%;" action="index.php" method="post">
    <input style="margin-top: 5px;" type="text" name="username" placeholder="Username" required><br>
    <input style="margin-top: 5px;" type="password" name="pw" placeholder="Passwort" required><br>
    <button style="margin-top: 5px;" class="themeButton" type="submit" name="submit">Einloggen</button>
</form>
<br>
<a style="margin-left: 45%;" href="register.php">Noch keinen Account?</a><br>
<a style="margin-left: 45%;" href="passwordreset.php">Hast du dein Passwor vergessen?</a>
</body>
</html>


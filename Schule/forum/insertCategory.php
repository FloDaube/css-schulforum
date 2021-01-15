<html>
<head>

</head>
<body>
<?php
include '../Domain/Model/DBConnect.php';
use Schule\Domain\Model\DBConnect;
if(isset($_POST["submit"])){
    $dbconn = new DBConnect();
    $conn = $dbconn->get_Connection();
    if (!$conn) {
        echo 'Verbindung schlug fehl: ' . mysqli_errno();
    }
    else {
        $con =new \Schule\Domain\Model\DBConnect();
        $con = \Schule\Domain\Model\DBConnect::get_Connection();
        $stmt = $con->prepare("Select * From `css-schulforum`.`category` Where title = '".$_POST['title']."';"); //Username überprüfen
        //$stmt->bindParam(":user", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->fetch();
        if($count == 0){
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "INSERT INTO `css-schulforum`.`category`(`title`)VALUES('". $_POST['title'] . "');";
            echo $query;
            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $dbconn = new DBConnect();
            $conn = $dbconn->get_Connection();
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else{
                header("Location: index.php");
            }
        }
        else{
            header("Location: index.php");
        }
    }
}

?>
</body>
</html>








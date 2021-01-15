<html>
<head>

</head>
<body>
<?php

include '../Domain/Model/DBConnect.php';
use Schule\Domain\Model\DBConnect;
$dbconn = new DBConnect();
$conn = $dbconn->get_Connection();
if (!$conn) {
    echo 'Verbindung schlug fehl: ' . mysqli_errno();
}
else {
    //Erstelle SQL Query für User mit Namen der Übergeben wurde.
    $date = new DateTime();
    $now = $date->format('Y-m-d H:i:s');
    $query = "INSERT INTO `css-schulforum`.`posts`(`user_id`,`cat_id`,`title`,`text`,`timestamp`)VALUES(".$_GET['user_id']."," .$_GET['cat_id'] . ",'" .$_POST['title'] . "','" .$_POST['text'] . "','" . $now . "');";
    echo $query;
    //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo trigger_error('Invalid query: ' . $conn->error);
    }
    else{
        header("Location: index.php");
    }
}

?>
</body>
</html>








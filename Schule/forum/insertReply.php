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
    $date = new DateTime();
    $now = $date->format('Y-m-d H:i:s');
    //Erstelle SQL Query für User mit Namen der Übergeben wurde.
    $query = "INSERT INTO `css-schulforum`.`replys`(`user_id`,`post_id`,`text`,`timestamp`)VALUES(".$_GET['user_id']."," .$_GET['post_id'] . ",'" .$_POST['text'] . "','" . $now . "');";
    echo $query;
    //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo trigger_error('Invalid query: ' . $conn->error);
    }else{
        header("Location: post.php?post=".$_GET['post_id']);
    }
}

?>
</body>
</html>








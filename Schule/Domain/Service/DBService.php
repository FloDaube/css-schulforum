<?php
namespace bll\service;

include '../Model/DBConnect.php';
include '../Model/models.php';

use Schule\Domain\Model\DBConnect;
use Schule\Domain\Model\user;

class DBService
{
    public function getUserByName($name)
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.user WHERE name = '" . $name . "'";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in user Objekt
                $datensatz = $result->fetch_assoc();
                $user = new user();

                $user->id = $datensatz['id'];
                $user->name = $datensatz['name'];
                $user->password = $datensatz['password'];
                $user->email = $datensatz['email'];
                $user->aktiv = $datensatz['aktiv'];
                $user->timestamp = $datensatz['timestamp'];
                return($user);

            }

        }

    }
}
//Test von getUserByName Methode
/*
$test = new DBService();
$user = $test->getUserByName('chris');
print_r($user);*/

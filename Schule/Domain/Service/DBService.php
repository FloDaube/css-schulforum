<?php
namespace bll\service;

include '../Model/DBConnect.php';
include '../Model/models.php';

use Schule\Domain\Model\DBConnect;
use Schule\Domain\Model\post;
use Schule\Domain\Model\user;
use Schule\Domain\Model\reply;

class DBService
{
    //Sucht über Name nach Benutzer
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
            $query = "SELECT * FROM `css-schulforum`.users WHERE name = '" . $name . "'";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in user Objekt
                $dataset = $result->fetch_assoc();
                $user = new user();

                $user->id = $dataset['id'];
                $user->name = $dataset['name'];
                $user->password = $dataset['password'];
                $user->email = $dataset['email'];
                $user->aktiv = $dataset['aktiv'];
                $user->timestamp = $dataset['timestamp'];
                return($user);
            }
        }
    }
    public function getPosts()
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.posts;";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in user Objekt
                $datalist = $result->fetch_all();
                $posts = array();
                foreach ($datalist as $dataset)
                {
                    $post= new post();

                    $post->id = $dataset[0];
                    $post->user_id = $dataset[1];
                    $post->text = $dataset[2];
                    $post->timestamp = $dataset[3];

                    array_push($posts,$post);
                }

                return($posts);
            }
        }
    }
    public function getReplys()
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.replys;";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in user Objekt
                $datalist = $result->fetch_all();
                $replys = array();
                foreach ($datalist as $dataset)
                {
                    $reply= new reply();

                    $reply->id = $dataset[0];
                    $reply->user_id = $dataset[1];
                    $reply->post_id = $dataset[2];
                    $reply->text = $dataset[2];
                    $reply->timestamp = $dataset[3];

                    array_push($replys,$reply);
                }

                return($replys);
            }
        }
    }
}
//Test von getUserByName Methode

$test = new DBService();
$user = $test->getUserByName('fd');
$posts = $test->getPosts();
$replys = $test->getReplys();
print_r($user);
print_r($posts);
print_r($replys);

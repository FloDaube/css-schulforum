<?php
namespace bll\service;

include '../Model/DBConnect.php';
include '../Model/models.php';

use Schule\Domain\Model\DBConnect;
use Schule\Domain\Model\post;
use Schule\Domain\Model\category;
use Schule\Domain\Model\reply;
use Schule\Domain\Model\user;


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

    public function getUserById($id)
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.users WHERE id = '" . $id . "'";

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

    public function getUsers()
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT id,name FROM `css-schulforum`.users;";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in post Objekt
                $datalist = $result->fetch_all();
                $users = array();
                foreach ($datalist as $dataset)
                {
                    $user= new user();

                    $user->id = $dataset[0];
                    $user->name = $dataset[1];

                    array_push($users,$user);
                }

                return($users);
            }
        }
    }

    public function getPosts($cat_id)
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.posts_view Where cat_id = " . $cat_id . ";";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in post Objekt
                $datalist = $result->fetch_all();
                $posts = array();
                foreach ($datalist as $dataset)
                {
                    $post= new post();

                    $post->id = $dataset[0];
                    $post->user_id = $dataset[1];
                    $post->category_id = $dataset[2];
                    $post->title = $dataset[3];
                    $post->text = $dataset[4];
                    $post->timestamp = $dataset[5];
                    $post->countreplys = $dataset[6];

                    array_push($posts,$post);
                }

                return($posts);
            }
        }
    }
    public function getPostById($id)
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.posts Where id = " . $id . ";";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in post Objekt
                $dataset = $result->fetch_assoc();
                $post= new post();

                $post->id = $dataset['id'];
                $post->user_id = $dataset['user_id'];
                $post->category_id = $dataset['cat_id'];
                $post->title = $dataset['title'];
                $post->text = $dataset['text'];
                $post->timestamp = $dataset['timestamp'];

                return($post);
            }
        }
    }

    public function getReplys($post_id)
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.replys Where post_id = " . $post_id . ";";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in reply Objekt
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

    public function getCategorys()
    {
        $dbconn = new DBConnect();
        $conn = $dbconn->get_Connection();
        if (!$conn) {
            echo 'Verbindung schlug fehl: ' . mysqli_errno();
        }
        else
        {
            //Erstelle SQL Query für User mit Namen der Übergeben wurde.
            $query = "SELECT * FROM `css-schulforum`.category_view;";

            //Führe Query aus und überprüfe ob ein fehler aufgetretten ist.
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo trigger_error('Invalid query: ' . $conn->error);
            }
            else
            {
                //Lade Daten in category Objekt
                $datalist = $result->fetch_all();
                $cats = array();
                foreach ($datalist as $dataset)
                {
                    $cat= new category();

                    $cat->id = $dataset[0];
                    $cat->title = $dataset[1];
                    $cat->count = $dataset[2];


                    array_push($cats,$cat);
                }

                return($cats);
            }
        }
    }
}
//Test Methoden

//$test = new DBService();
//$user = $test->getUserByName('fd');
//$posts = $test->getPosts(1);
//$replys = $test->getReplys(1);
//$cats = $test->getCategorys();
//print_r($user);
//print_r($posts);
//print_r($replys);
//print_r($cats);

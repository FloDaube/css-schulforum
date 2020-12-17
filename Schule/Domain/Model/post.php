<?php
use Schule\Domain\Model\DBConnect;
include 'DBConnect.php';
class post extends DBConnect
{
    public function con(){
        $con = new DBConnect();
    }
}

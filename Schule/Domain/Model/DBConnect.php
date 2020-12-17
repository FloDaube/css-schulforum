<?php


namespace Schule\Domain\Model;


class DBConnect
{
    public function Connection()
    {
        $hostname = "server6.febas.net";
        $user= "schule-css";
        $password = "badWyugNoygCiod8";
        $con = mysqli_connect($hostname, $user, $password);
        return $con;
    }
}
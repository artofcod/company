<?php

function db_connect()
{
    $connection = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME );
    conform_db_connect($connection);
    return $connection;
}

function conform_db_connect($connection)
{
    if($connection->connect_errno)
    {
        $msg = "database connection failed .";
        $msg .=  $connection->connect_error  ;
        $msg .= "(". $connection->connect_errno .")" ;
        exit($msg);
    }
}

function db_disconnect($conection)
{
    if(isset($connection))
    {
        $connection->close();
    }
}


?>
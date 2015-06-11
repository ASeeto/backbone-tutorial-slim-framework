<?php
    function connect_db() {
        $server = 'localhost'; // this may be an ip address instead
        $user = '';
        $pass = '';
        $database = 'project';
        $connection = mysqli_connect($server, $user, $pass);
        mysqli_select_db($connection, $database);
        return $connection;
    }
?>
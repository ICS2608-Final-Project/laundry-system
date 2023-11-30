<?php
require_once 'Dbh.php';

class Model extends Dbh 
{
    public static function sanitizeInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
<?php
require_once './config/config.php';

class Dbh 
{
    private $host = $HOST;
    private $port = $PORT;
    private $socket = $SOCKET;
    private $user = $USER;
    private $password = $PASSWORD;
    private $db_name = $DB_NAME;

    protected function connect()
    {
        try {
            $dbh = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db_name}", $this->user, $this->password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    protected function set_host($_host)
    {
        $this->host = $_host;
    }

    protected function set_port($_port)
    {
        $this->port = $_port;
    }

    protected function set_socket($_socket)
    {
        $this->socket = $_socket;
    }

    protected function set_user($_user)
    {
        $this->user = $_user;
    }

    protected function set_password($_password)
    {
        $this->password = $_password;
    }

    protected function set_dbname($_dbname)
    {
        $this->db_name = $_dbname;
    }
}
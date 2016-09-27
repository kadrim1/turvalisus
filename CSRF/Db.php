<?php
date_default_timezone_set('Europe/Tallinn');

//require_once 'config.php';

class Db
{
    private $_connection;
    private static $_instance; //The single instance
    private $_host = DATABASE_HOSTNAME;
    private $_username = DATABASE_USERNAME;
    private $_password = DATABASE_PASSWORD;
    private $_database = DATABASE_DATABASE;

    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    private function __construct()
    {
        try {
            $this->_connection = new PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $q = $this->_connection->prepare("SET time_zone = '+2:00'");
            $q->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }

    // Get mysql pdo connection
    public function getConn()
    {
        return $this->_connection;
    }
}

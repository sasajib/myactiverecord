<?php

/**
 * My Pdo Database is a wrapper class to help mysql query within php
 * 
 * This class require 5.3+ php version. Implemented singleton design pattern
 * 
 * @author Shakil Ahmed <sasajib@gmail.com>
 */
class MyPdoDatabase
{

    protected $_dbUser;
    protected $_dbPass;
    protected $_hostName;
    protected $_port;
    protected $_dbName;

    /**
     * This hold database connection
     * @var resource
     */
    protected $_connection;
    
    /**
     * Database single instance
     * @var resource
     */
    protected static $_instance;

    public function __construct()
    {
        gc_enable();
        require_once ("config.php");

        $dsn = "mysql:host={$database['hostname']}:{$database['port']};dbname={$database['dbname']}";
        $userName = $database['username'];
        $passWord = $database['password'];

        try {
            $this->_connection = new PDO($dsn, $userName, $passWord);
        } catch (PDOException $pdoError) {
            trigger_error('Unable to connect cause: ' . $pdoError->getMessage(),
                    E_USER_ERROR);
        }
    }

    public static function get_instance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __destruct()
    {
        gc_collect_cycles();
    }

}

/* End of file MyPdoDatabase.php */

$db = MyPdoDatabase::get_instance();
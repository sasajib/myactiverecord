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
    protected $dbName;


    /**
     * This hold database connection
     * @var resource
     */
    protected $_dbh;
    
    protected static $_instance;



    public function __construct()
    {
        
        
        gc_enable();
    }
    
    
    public function get_instance()
    {
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    
    

    public function __destruct()
    {
        gc_collect_cycles();
    }

}

/* End of file MyPdoDatabase.php*/


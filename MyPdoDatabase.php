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
    
    

    public function __construct()
    {
        
        
        gc_enable();
    }

    public function __destruct()
    {
        gc_collect_cycles();
    }

}

/* End of file MyPdoDatabase.php*/


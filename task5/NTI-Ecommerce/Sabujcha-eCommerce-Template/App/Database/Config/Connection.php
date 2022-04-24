<?php

namespace App\Database\Config;

use mysqli;

class Connection
{
    protected $DBhostName = 'localhost';
    protected $DBuserName = 'root';
    protected $DBpassword = '';
    protected $DBdatabase = 'nti_ecommerce';
    protected $DBport = 3306;
    public mysqli  $con;
    //Open Connection
    public function __construct()
    {
        $this->con = new mysqli($this->DBhostName, $this->DBuserName, $this->DBpassword, $this->DBdatabase, $this->DBport);

        // check connection
        // if ($this->con->connect_error) {
        //     die("Connection failed: " .  $this->con->connect_error);
        // }
        // echo "Connected successfully";
    }

    #Close connection
    public function __destruct()
    {
        $this->con->close();
    }
}

// new Connection;
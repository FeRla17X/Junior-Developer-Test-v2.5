<?php
  class Dbh{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpwd = '';
    private $dbname = 'product';

    protected function connect(){
      $conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,
                                    $this->dbuser,$this->dbpwd);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
      return $conn;
    }
  }

<?php
class MySQL 
{    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '1234';
    private $_database = 'marwa';
    
    protected $connection;
  
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
    public function getData($query)
    {        
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }
    public function execute($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false) {
            return false;
        } else {
            return true;
        }        
    }
    
    public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id";
        
        $result = $this->connection->query($query);
    
        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

    public function check_empty($data)
    {
        $msg = "";
        foreach ($data as $a => $b) {
            if (empty(trim($b))) {
                $msg .= "le champ de $a est vide <br />";
            }
        } 
        return $msg;
    }
   
    public function is_email_valid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
            return true;  
        }
        return false;
    }
    
    public function isUserExist($username)
    {        
        return $this->connection->query("SELECT * from user where email='".$username."'")->num_rows > 0;
    }

    public function isLoginCorrect($email,$password)
    {        
        return $this->connection->query("SELECT * from user where email='$email' && `password`='$password'")->num_rows > 0;
    }
    public function getAvgRates($id_atelier)
    {        
        return $this->connection->query("SELECT AVG(stars) from avis WHERE idevent = '".$idevent."'")->fetch_row()[0];
    }
    public function getUserId($email)
    {        
        return $this->connection->query("SELECT id_user FROM user WHERE email = '".$email."'")->fetch_row()[0];
    }
    public function getCat($id)
    {        
        return $this->connection->query("SELECT nomcat FROM categorie WHERE idcat = '".$id."'")->fetch_row()[0];
    }
    public function getLieu($id)
    {        
        return $this->connection->query("SELECT nom FROM lieux WHERE idlieux = '".$id."'")->fetch_row()[0];
    }
    public function checkUniqueRate($id_user,$idevent)
    {
		$result = $this->connection->query("SELECT stars from avis where id_user='".$id_user."' AND idevent='".$idevent."'");
        return ($result) ? $result->fetch_row()[0] : $result;
    }
    public function getPlaces($idevent)
    {        
        return $this->connection->query("SELECT nbrplacedispo FROM event WHERE idevent = '".$idevent."'")->fetch_row()[0];
    }
    public function getNomevent($idevent)
    {        
        return $this->connection->query("SELECT nomevent FROM event WHERE idevent = '".$idevent."'")->fetch_row()[0];
    }
    
















}
?>
<?php
class DB{
    protected $dns = DNS;
    protected $dbName = DB_NAME;
    protected $dbUser = DB_USER_NAME;
    protected $dbPass = DB_PASSWORD;
    protected $dbh; 
    protected $stmt;
    
    public function __construct(){
        
        try{
            $this->dbh = new PDO($this->dns, $this->dbUser, $this->dbPass);
        }catch (PDOException $e){
            echo 'Connection failed:' . $e->getMessage();
        }
        
    }  
     
    public function prepareQuery($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                   
            }
        }
        
        $this->stmt->bindValue($param, $value, $type);
    }
    
    function executeQuery(){
         $this->stmt->execute();
    }
    
    function getRecords($tableName, $param, $paramVal){
        
        $query = "SELECT * FROM $tableName WHERE $param=:$param";
        $val = $paramVal; 
        $this->prepareQuery($query);
        $this->bind(":$param", $val);
        $this->executeQuery();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
        
    }
    
    function getAllRecords($tableName){
        
        $query = "SELECT * FROM $tableName";
        $this->prepareQuery($query);
        $this->executeQuery();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        
    }
}
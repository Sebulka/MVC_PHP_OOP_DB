<?php

class User extends Controller{
    protected $data = [];
    protected $param = [];
    
    function serial(){
        echo 'user class';
    }
    
     public function all(){
        
        $db = new DB;
        $TabRows = $db->getAllRecords('users');
       
        $this->data = [
            'title' => 'All Users',
            'text' => 'This is all Users page.',
            'allUsersData' => $TabRows
         
        ]; 
        
        $this->viewAllUsers('all', $this->data);
    } 
    
    public function userData($tableName, $param, $paramVal){
        $db = new DB;
        $userRow = $db->getRecords($tableName, $param, $paramVal);
        $this->data = [
            'title' => 'User data',
            'text' => 'This is user data page.',
            'userData' => $userRow
        ]; 
        
        $this->view('userData', $this->data);
    } 
}
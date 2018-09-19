<?php
class Controller{
    
    function view($view, $data = [], $param = []){
        
        require_once (ROOT.DS.'view'.DS.$view.'.php');
        return $data;
        return $param;
        
    }
    
     function viewAllUsers($view, $data = []){
        
        
        require_once (ROOT.DS.'view'.DS.$view.'.php');
        return $data;
        
        
    }
}
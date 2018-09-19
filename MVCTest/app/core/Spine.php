
<?php

class Init{
    
    protected $model = 'Pages';
    protected $view = 'home'; 
    protected $param = []; 
    
    function __construct(){
        
        $url = $this->getUrl();
        
        if(!empty($url[3])){
            for($x=3; $x<sizeof($url); $x++){
                $url[$x] = filter_var($url[$x], FILTER_SANITIZE_STRING);
                array_push($this->param, $url[$x]);
            }
           
        }
        
        if(!empty($url[1])){
            if(file_exists(ROOT.DS.'model/'.ucwords($url[1]).'.php')){
                $this->model = ucwords($url[1]);
                unset($url[1]);
               
            }
        }
        
        require_once(ROOT.DS.'model/'.$this->model.'.php');
        $this->model = new $this->model;
        
        if(!empty($url[2])){
            if(method_exists($this->model, strtolower($url[2]))){
                $this->view = strtolower($url[2]);
                unset($url[2]);
            }else{
                
                $this->model = 'Pages';
                $this->view = 'home';
                require_once(ROOT.DS.'model/'.$this->model.'.php');
                $this->model = new $this->model; 
            }
        }
       
        call_user_func_array([$this->model, $this->view], $this->param);
    }
    
    protected function getUrl(){
        $url = trim($_SERVER['SCRIPT_URL'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
    
    
}

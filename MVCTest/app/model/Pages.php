
<?php
class Pages extends Controller{
    protected $data = [];
    protected $param = [];
    
    public function home($param1='', $param2='', $param3=''){
        
        $this->param = [$param1, $param2, $param3];
        $this->data = [
            'title' => 'Home',
            'text' => 'This is home page.'
        ]; 
        
        $this->view('home', $this->data, $this->param);
    } 
    
   
}
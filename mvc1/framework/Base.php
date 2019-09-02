<?php
class Base{
    public function  run(){
        $this->loadConfig();
        $this->registerAutoLoad();
        $this->getRequestParams();
        $this->dispatch();
    }
    private function  loadConfig(){
        $GLOBALS['config']=require "./application/config/config.php";
    }

    private function userAutoLoad($className){
        $baseClass=[
          'Model'=>"./framework/Model.php",
            'Db'=>"./framework/Db.php",
        ];
        if(isset($baseClass[$className])){
            require $baseClass[$className];
        }
        else if(substr($className,-5)=='Model'){
            require  "./application/home/model/{$className}.php";
        }
        else if(substr($className,-10)=='Controller'){
            require  "./application/home/controller/{$className}.php";
        }
    }
    private function  registerAutoLoad(){
        spl_autoload_register([$this,'userAutoLoad']);
    }

    private function getRequestParams(){
        $p=$GLOBALS['config']['app']['default_platform'];
        $p=isset($_GET['p'])?$_GET['p']:$p;
        define('PLATFORM',$p);

        $c=$GLOBALS['config'][PLATFORM]['default_controller'];
        $c=isset($_GET['c'])?$_GET['c']:$c;
        define('CONTROLLER',$c);

        $a=$GLOBALS['config'][PLATFORM]['default_action'];
        $a=isset($_GET['a'])?$_GET['a']:$a;
        define('ACTION',$a);
}

    private function dispatch(){
        $controllerName=CONTROLLER."Controller";
        $controller=new $controllerName;
        $action=ACTION;
        $controller->$action();
    }
}
<?php
//echo "router test";

$router = explode("/", $_SERVER['REQUEST_URI']);

$controller_name = "Main";
$action_name = "index";

if(!empty($router[1])){
    $controller_name = $router[1];
}

if(!empty($router[2])){
    $action_name = $router[2];
}

$filename = "controllers/". strtolower($controller_name). ".php";

try{
    if(file_exists($filename)){
        require_once $filename;
    }else{
        throw new Exception("file not found:".$filename ."<br /><b>404</b>");
    }

    $classname = ucfirst($controller_name);

    if(class_exists($classname)){
        $controllers = new $classname;
    }else{
        throw new Exception("Class not found:". $classname);
    }
    if(method_exists($controller_name, $action_name)){
        $controllers->$action_name();
    }else{
        throw new Exception("Class exist but action not found ". $action_name);
    }


}catch (Exception $e){
    echo $e->getMessage();
}




<?php

class Singleton {
    private static $_instance;
    
    protected $param;
    
    private function __construct($param) {
        echo "Exécution du new<br/>";
        $this->param = $param;
    }
    
    public static function getInstance($param) {
        if(is_null(self::$_instance)){
            self::$_instance = new Singleton($param);
        }
        return self::$_instance;
    }

    public function getParam(){
        return $this->param;
    }
}

$obj1 = Singleton::getInstance("test1");
$obj2 = Singleton::getInstance("test2");

echo $obj1->getParam().'<br/>'.$obj2->getParam();


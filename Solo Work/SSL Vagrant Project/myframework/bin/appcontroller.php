<?php

session_start();
class AppController
{

    public function __construct($urlPathParts, $config)
    {
        $dsn = 'mysql:dbname=fruits;host=127.0.0.1';
        $user = 'root';
        $pass = 'root';

        try {
            $dbh = new PDO('mysql:host=localhost;dbname=fruits', $user, $pass);
            $this->db = new PDO('mysql:host=localhost;dbname=fruits', $user, $pass);
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        $this->urlPathParts = $urlPathParts;

        // check for controller
        if ($urlPathParts[0]) {
            include './controllers/'.$urlPathParts[0].'.php';
            $appcon = new $urlPathParts[0]($this);

            // if the controller is there, look for a parameter
            if (isset($urlPathParts[1])) {
                if ($urlPathParts[1] == "welcome") {
                    $appcon->index($this);
                }
                else {
                    $appcon->$urlPathParts[1]();
                }
            }
            else {
                // if theres no parameter, search for index
                $methodVariable = array($appcon, 'index');

                if(is_callable($methodVariable, false, $callable_name)){
                    $appcon->index($this);
                }
            }

        }

        else {
            include './controllers/'.$config['defaultController'].'.php';
            $appcon = new $config['defaultController']($this);

            if (isset($urlPathParts[1])) {
                $appcon->config['defaultController'][1]();
            }
            else{

                $methodVariable = array($appcon, 'index');

                if(is_callable($methodVariable, false, $callable_name)){
                    $appcon->index($this);
                }
            }

        }
    }

    public function getView($page, $data=array()) {

        require_once './views/'.$page.'.php';

    }

    public function getModel($page, $data=array()) {
        
        // then pass data to that page(view)
        require_once './models/'.$page.".php";
        $model = new $page($this);
        return $model;
    }
}

?>

<?

// auth controller

class auth extends AppController
{

    // function __construct()
    // {
    //
    // }

    function __construct($parent)
    {
        $this->parent = $parent;

    }

    // add a user to the database
    public function register() {

        var_dump($_POST);
        if ($_POST['email'] && $_POST['password']) {
            $this->parent->getModel("users")->add("INSERT INTO users (email, password) VALUES(:email, :password)",array(":email"=>$_POST["email"], ":password"=>sha1($_POST["password"])));
            header("Location:/welcome/login?msg=You are now registered! Please log in below.");
        }
        else {
            header("Location:/welcome/register?msg=Invalid email or password. Please try again.");
        }

    }

    // delete a user from the database
    public function delete() {

        $this->parent->getModel("users")->delete("DELETE FROM users WHERE email = :email",array(":email"=>$_SESSION['email'] ));
        session_destroy();
        header("Location:/welcome");

    }

    // public function login() {
    //
    //     if ((@$_POST['Email'] && @$_POST['Password']) || (@$_SESSION['Email'] && @$_SESSION['Password'])) {
    //
    //         // get file contents of user information
    //         $result = array();
    //         $file = explode("\n\n", file_get_contents("./assets/users.txt"));
    //         foreach ( $file as $content ) {
    //             $result[] = array_filter(array_map("trim", explode("|", $content)));
    //         }
    //
    //         for($i=0; $i< count($result); $i++){
    //
    //             if((strtolower($result[$i][0]) === strtolower($_POST['Email']) && $result[$i][1] === $_POST['Password']) || (strtolower($result[$i][0]) === strtolower($_SESSION['Email']) && $result[$i][1] === $_SESSION['Password']))
    //             {
    //                 $_SESSION['Email'] = $_POST['Email'];
    //                 $_SESSION['Password'] = $_POST['Password'];
    //                 $_SESSION['desc'] = $result[$i][2];
    //                 $_SESSION['loggedin']=1;
    //
    //                 header("Location:/profile?msg=Logged In!");
    //
    //             }
    //             elseif ($_SESSION['loggedin']=1) {
    //                 header("Location:/profile?msg=Logged In!");
    //             }
    //             else {
    //                 header("Location:/welcome/login");
    //             }
    //         }
    //         //echo "<div class='alert'>".$result[1][1]."</div>";
    //         //echo "<div class='alert'>".file_get_contents("./assets/users.txt")."</div>";
    //
    //     }
    //     else {
    //         header("Location:/welcome/login?msg=Bad Login");
    //     }
    //
    // }

    public function login() {

        if ($_REQUEST['email'] && $_REQUEST['password']) {
            $array = array(':email'=>$_REQUEST['email'],':password'=>sha1($_REQUEST['password']));
            $data = $this->parent->getModel("users")->select("SELECT * FROM users WHERE email = :email AND password=:password", $array);

            if ($data) {
                $_SESSION['loggedin']=1;
                $_SESSION['email']=$_REQUEST['email'];
                $_SESSION['password']=$_REQUEST['password'];
                header("Location:/profile?msg=Logged In!");
            }
            else {
                header("Location:/welcome/login?msg=Bad Login");

            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location:/welcome");

    }

    public function displayNav($view) {

        // menu labels
        if (!isset($_SESSION['loggedin'])) {

            $nav = [0=>"welcome", 1=>"videos", 2=>"login", 3=>"register"];

            // send data to header view
            $this->getView($view, $nav);

        }

        else {

            $nav = [0=>"welcome", 1=>"videos"];

            // send data to header view
            $this->getView($view, $nav);

        }

    }
}


?>

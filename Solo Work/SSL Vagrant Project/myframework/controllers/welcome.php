<!-- welcome.php -->

<?
// default controller
class welcome extends AppController
{

    function __construct()
    {
        //$this->index();
        //$this->getView("header", array("pagename"=>"welcome"));

    }

    // default action for controller
    public function index()  {

        $this->displayNav("header");
        $this->getView("welcome");
        $this->getView("footer");

    }

    // videos
    public function videos() {
        $this->displayNav("header");
        $this->getView("videos");
        $this->getView("footer");
    }

    // login
    public function login() {
        $this->displayNav("header");
        $this->captcha();
        $this->getView("login");
        $this->getView("footer");
    }

    // register
    public function register() {
        $this->displayNav("header");
        $this->getView("register");
        $this->getView("footer");
    }

    // api
    public function api() {
        $this->displayNav("header");
        $this->getView("api");
        $this->getView("footer");
    }

    // recieve information from form
    public function contactRecv() {
        $this->displayNav("header");
        if ($_SESSION['captcha'] == $_POST['captcha']) {

            if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                echo "Email invalid";
                header("Location:/welcome/login?msg=Invalid Email Address");
                //echo "<br><a href='/welcome/login'>Click here to go back</a>";
            }

            else {
                //$_SESSION = $_POST;
                header("Location:/auth/login");
                echo "Email valid";
            }
        }

        else {
            //header("Location:/welcome/login?msg=Invalid Captcha");
            echo "Invalid captcha";
            echo "<br><a href='/welcome/login'>Click here to go back</a>";
            var_dump($_SESSION);
            var_dump($_POST);
        }
    }


    // // recieve ajax parameters
    // public function ajaxParams() {
    //     var_dump($_REQUEST);
    //     $this->displayNav("header");
    //     if (@$_REQUEST["Email"]=="tracy@gmail.com" && @$_REQUEST["Password"]=="1234") {
    //         //echo "<script>alert('Welcome! You have successfully loggd in!')</script>";
    //         $this->getView("welcome");
    //     }
    //     else {
    //         //echo "<script>alert('Bad login. Please try again.')</script>";
    //         $this->getView("login");
    //     }
    //
    //     $this->getView("footer");
    // }

    // captcha
    public function captcha(){

        $random = substr( md5(rand()), 0, 7);
        $this->getView("login",array("captcha"=>$random));

    }

    // pass array of label data to view
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

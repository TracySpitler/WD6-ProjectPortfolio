<!-- google.php -->

<?

class google
{

    function __construct($parent)
    {
        $this->db = $parent;

    }

    public function index() {

        $name = $_GET['name'];
        $email = $_GET['email'];
        $id = $_GET['id'];
        $token = $_GET['token'];

        // store profile info in session
        $_SESSION['loggedin'] = 1;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
        $_SESSION['token'] = $token;
        $_SESSION['name'] = $name;

        header("Location:/profile?msg=Signed in with Google!");

    }

}

<!-- api controller -->

<?

class api extends AppController {

    public function __construct($parent) {

        $this->parent = $parent;
        //$this->showApi();
    }

    public function index() {

        $this->displayNav("header");

        if (isset($_POST['search'])) {

            $search = $_POST['search'];
            $data = $this->parent->getModel("apiModel")->googleBooks($search);
            $this->getView("api", $data);

        }
        else {

            $data = $this->parent->getModel("apiModel")->googleBooks();
            $this->getView("api", $data);

        }

        $this->getView("footer");

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

<!-- about.php -->

<?
ob_start();

class about extends AppController {

    public function __construct($parent) {
        $this->parent = $parent;
        $this->showList();
    }

    public function showList() {

        $data = $this->parent->getModel("fruits")->select("select * from fruit_table");
        $this->displayNav("header");
        $this->getView("about", $data);
        $this->getView("footer");
    }

    // add a fruit to the database
    public function addAction() {

        $this->parent->getModel("fruits")->add("INSERT INTO fruit_table (name) VALUES(:name)",array(":name"=>$_REQUEST["name"]));
        header("Location:/about");

    }

    // delete a fruit from the database
    public function deleteAction() {

        $this->parent->getModel("fruits")->delete("DELETE FROM fruit_table WHERE id = :id",array(":id"=>$_GET["id"] ));
        header("Location:/about");

    }


    // edit a fruit from the database
    public function updateAction() {

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $name = $_POST['name'];
            $record = $this->parent->getModel("fruits")->select("SELECT * FROM fruit_table WHERE id=:id",array(":id"=>$_GET["id"] ));

            if (count($record) == 1 ) {

                $this->parent->getModel("fruits")->update("UPDATE fruit_table SET name=:name WHERE id=:id",array(":id"=>$_GET["id"], ":name"=>$_POST['name'] ));
                header("Location:/about");

            }
            else {
                echo "Something went wrong.";
            }
        }

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

<?

// profile controller

class profile extends AppController
{

    function __construct()
    {

        if (@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1) {

        }

        else {

        }
    }

    public function index() {
        $this->displayNav("header");
        echo "<div class='alert'>Welcome ".$_SESSION['email']."! You have successfully logged in! (this is a protected controller)</div>";
        $this->getView("profile");
        $this->getView("footer");
    }

    public function update() {

        if ($_FILES["img"]["name"]!="") {
            $imageFileType = pathinfo("asset/".$_FILES["img"]["name"],PATHINFO_EXTENSION);

            if (file_exists("asset/".$_FILES["img"]["name"])) {
                echo "sorry, file exists";
            }
            else {
                if ($imageFileType != "jpg" && $imageFileType != "png") {
                    echo "This file type is not supported. Please choose a differnet file.";
                }
                else {
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], "assets/".$_FILES["img"]["name"])) {
                        $_SESSION['photo'] = "assets/".$_FILES["img"]["name"];
                        header("Location:/profile?msg=File Uploaded");
                        //echo "Your file has uploaded.";
                        //echo "<img id='img' src='/assets/".$_FILES['img']['name']."'>";
                    }
                    else {
                        echo "There was an error uploading.";
                    }
                }
            }
        }

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

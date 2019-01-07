<!-- api.php -->

<div class="main">

<div class="container api">

    <div class="text-center">
        <h3 class="text-center">API: <strong>Google Books</strong>.<h4>
            <?
            if (isset($_REQUEST['search'])) {
                echo "<span class='current-search'>Current Search: ".$_REQUEST['search']."</span>";
            }
            else {
                echo "<span class='current-search'>Current Search: Henry David Thoreau</span>";
            }
            ?>
        </h4></h3>

        <!-- search -->
        <form id="search" class="form form-inline navbar-form d-flex justify-content-center" method='post' action='api'>
            <div class='input-wrapper'>
                <input type='text' id='search' name='search' class='form-control' placeholder='search books..' value='' required/>
            </div>
            <div class='input-wrapper'>
                <button id='ajaxButton' type='submit' name='ajaxButton' class='btn'><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <ul class="list-group list-unstyled">

    <div id="list-th">

    <?

    foreach ($data as $item) {

        // variables for the book items
        $title = $item['volumeInfo']['title'];
        $author = $item['volumeInfo']['authors'][0];
        $category = $item['volumeInfo']['categories'][0];
        $pages = $item['volumeInfo']['pageCount'];
        $published = $item['volumeInfo']['publishedDate'];
        $link = $item['volumeInfo']['infoLink'];

        echo "<a class='book-links' href='$link'><div class='book-item'>";

        echo "<li class='list-group-item'>";

        echo "<div id='parent'>
                 <div id='wide'><p><strong>$title</strong></p></div>
                 <div id='narrow'><small>";
                 // if published is not empty - display it
                 if ($published != "") {
                     echo "<strong>Published: </strong>$published<br />";
                 }

                 // if pages is not empty - display it
                 if ($pages != "") {
                     echo "<strong>Pages: </strong>$pages<br />";
                 }

        echo "</small></div></div>";

        echo "<div id='parent'><div id='wide'><p>";

        // if there is an author - display it
        if ($author != "") {
            echo $author;
        }

        // else display no author
        else {
            echo "no author";
        }
        echo "</p></div>";
        echo "<div id='narrow'><small>";

        // if category is not empty - display it
        if ($category != "") {
            echo "<strong>Category: </strong>$category<br />";
        }
        echo "</small></div></div>";
        // echo "<div class='d-flex w-100 justify-content-between'";
        // echo "<p class='title'><strong>$title</strong></p><small>";
        //
        // // if published is not empty - display it
        // if ($published != "") {
        //     echo "<strong>Published:</strong> $published";
        // }
        //
        // // if pages is not empty - display it
        // if ($pages != "") {
        //     echo " - <strong>Pages:</strong> $pages";
        // }
        //
        // echo "</small></div><div class='d-flex w-100 justify-content-between'";
        // echo "<p class='author'>$author</p>";
        //
        // // if category is not empty - display it
        // if ($category != "") {
        //     echo "<small><strong>Category:</strong> $category</small>";
        // }
        // echo "</div>";
        echo "<button class='buy-btn'><strong>MORE INFO</strong></button></li>";
        echo "</div></a>";

    }


    ?>

  </div>

</div>
</div>

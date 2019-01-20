Tracy Spitler
WD6 Online
Week 1 - PHP Assessment - PHP Code

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

60. Write PHP Syntax for the following: 
Store “Michael Jackson” into a PHP variable. 
Next, write all required code (include complete SQL + Prepare/Bind/Execute statements) that  will add Michael Jackson’s name to a database table called “favorite_music_artists”.

<?php

$king_of_pop = 'Michael Jackson';

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "favorite_music_artists";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO artist_name (king_of_pop)
    VALUES (:king_of_pop)");
    $stmt->bindParam(':king_of_pop', $king_of_pop);

    // insert a row
    $stmt->execute();

    echo "New records created successfully";
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>

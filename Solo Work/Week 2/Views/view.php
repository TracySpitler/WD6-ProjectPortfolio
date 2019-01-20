<?php
/**
* The home page view
*/
class BaseView
{
    // class constructor
    function __construct()
    {
        // start HTML
        ?>
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>WD6: PHP Assessment #2</title>

            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="styles.css">
            <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
            <script type="text/javascript" src="javascript.js"></script>
        </head>
        <body>
        <div id="main-div" class="content">
            <p class="courseInfo">Quiz #2: LAMP Practical</p>

        <?
        $this->displayIndex("init");

        // end HTML
        ?>
        <div>
        </body>
        </html>
        <?
    }

    // display index view
    public function displayIndex($records)
    {
        // if records exist
        if ($records && $records != "init") {
            $this->displayUpdateForm($records);
        }
        // no records
        elseif ($records === 0){
            ?>
            <div class="card">
                <h2>Student Grades Report (Teacher's App)</h2>
                <p>Input your student's name and final grade percentage (%):</h3>

                <form action="/" method="POST">
                    <input type="text" name="name" placeholder="Student Name" />
                    <input type="number" step="0.01" min="0" name="percent" placeholder="Student Percent" />
                    <input class="btn" id="createBtn" name="createBtn" type="submit" /> <input class="btn" type="reset" />
                </form>

                <h4>There are currently no student records.</h4>
            </div>
            <?
        }
    }

    // display update form
    public function displayUpdateForm($records)
    {
        ?>
        <div class="card">
            <h2>Student Grades Report (Teacher's App)</h2>
            <p>Input your student's name and final grade percentage (%):</h3>

            <form action="/" method="POST">
                <input type="text" name="name" placeholder="Student Name" />
                <input type="number" step="0.01" min="0" name="percent" placeholder="Student Percent" />
                <input class="btn" name="submit-btn" value="Create" type="submit" /> <input class="btn" type="reset" />
            </form>
        </div>

        <div class="card">
            <h4>Student Records:</h4>
            <table id="all-records-table">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Percent</th>
                    <th>Grade</th>
                    <th>Modify</th>
                </tr>
            <?

            // add record entries to table
            foreach ($records as $entry) {
                $id = $entry['studentid'];
                $name = $entry['studentname'];
                $percent = $entry['studentpercent'];
                $grade = $entry['studentlettergrade'];
                echo "<tr>";
                echo '<td>'.$id.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$percent.'</td>';
                echo '<td>'.$grade.'</td>';
                echo '<td>';
                echo '<form action="/" method="GET">';
                echo '<button class="update-btn btn" id="'.$id.'" type="button"><i class="fas fa-pen"></i></button>';
                echo '<button name="delete-btn" class="delete-btn btn" id="'.$id.'" value="'.$id.'" type="submit" /><i class="fas fa-trash"></i></button>';
                echo '</form>';
                echo '</td>';
                echo "</tr>";
                // hidden update form
                echo '<tr class="toggle-hidden highlight" id="id_'.$id.'">';
                echo '<form id="update-form" action="/" method="POST">';
                echo '<td><input readonly name="id" value="'.$id.'" class="no-change" placeholder="'.$id.'" /></td>';
                echo '<td><input class="change" type="text" name="name" value="'.$name.'" placeholder="'.$name.'" /></td>';
                echo '<td><input class="change" type="number" step="0.01" min="0" name="percent" value="'.$percent.'" placeholder="'.$percent.'" /></td>';
                echo '<td><input readonly name="grade" type="text" value="'.$grade.'" class="no-change" placeholder="'.$grade.'" /></td>';
                echo '<td><input class="edit-btn btn" name="submit-btn" value="Update" type="submit" /></td>';
                echo '</form>';
                echo "</tr>";
            }
            echo "</table></div>";
    }
}

?>

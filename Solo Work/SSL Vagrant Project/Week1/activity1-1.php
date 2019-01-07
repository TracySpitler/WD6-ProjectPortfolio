<?

// --- 1 --- //
echo "// --- Part 1 --- // <br>";

// create a class

class myClass {

    // constructor
    public function __construct() {
        echo "Constructing.. <br>";
    }

    // public function
    public function mymethod() {

        // echo something
        echo "This is an echo from myMethod in myClass. <br>";
    }

    // if this method were static..
    // instantiate & use method from myClass (all together now!)
    // myClass::myMethod();
}

// instantiate myClass
$myNewClass = new myClass();

// use method from myClass
$myNewClass -> myMethod();


// --- 2 --- //
echo "<br> // --- Part 2 --- // <br>";

// variables
$name = "Tracy Spitler";
$age = 32;

// array with name at index 0 and age at index 1
// $person = [$name, $age];

// create associative key/value pairs within $person that contain name and age
$person = ["name"=>$name, "age"=>$age];

// output to browser
print "My name is $name and age is $age. <br>";

// 1. echo name & age using double quotes
echo "1. Name: $name, Age: $age <br>";

// 2. echo name & age using single quotes
echo '2. Name: '.$name.', Age: '.$age.' <br>';

// 3. echo name & age using person index
$personIndex = array_values($person);
echo '3. Name: '.$personIndex[0].', Age: '.$personIndex[1].'<br>';

// 4. echo using key/value pairs
echo '4. Name: '.$person['name'].', Age: '.$person['age'].'<br>';

// 5. set age to null, then echo age (result: age is blank in the browser)
$age = null;
echo "5. Set age to null. Result: $age <br>";

// 6. unset() name, then echo name (result: Notice: Undefined variable on line 58!)
unset ($name);
echo "6. Unset name. Result: $name <br>";


// --- 3 --- //
echo "<br> // --- Part 3 --- // <br>";

// assign letter grades based on points
function getLetter($points) {
    if ($points >= 90) {
        return "$points points is an A <br>";
    }
    elseif ($points >= 80) {
        return "$points points is a B <br>";
    }
    elseif ($points >= 70) {
        return "$points points is a C <br>";
    }
    elseif ($points >= 60) {
        return "$points points is a D <br>";
    }
    else {
        return "$points points is an F <br>";
    }
}

// test the getLetter function

// // 1. 94
// echo getLetter(94);
//
// // 2. 54
// echo getLetter(54);
//
// // 3. 89.9
// echo getLetter(89.9);
//
// // 4. 60.01
// echo getLetter(60.1);
//
// // 5. 102.1
// echo getLetter(102.1);

// simpler way to test the function and get echo grade values:
// stick the points in an array
$grades = [94, 54, 89.9, 60.1, 102.1];

// then loop through the array, calling getLetter() for each point value
foreach ($grades as $letter) {
    echo getLetter($letter);
}


// --- 4 --- //
echo "<br> // --- Part 4 --- // <br>";

// create an array indexed by integers
$colors = [0=>'Red', 1=>'Crimson', 2=>'Yellow', 3=>'Gold', 4=>'Green', 5=>'Lime', 6=>'Blue', 7=>'Turquoise', 8=>'Purple', 9=>'Orchid'];

// loop through and display the index number and color name
foreach ($colors as $key => $value) {
    echo "Index: $key Color: <span style='color:$value'>$value</span> <br>";
}

?>

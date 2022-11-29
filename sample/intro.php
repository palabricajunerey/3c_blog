<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello</h1>
    <?php //openning tag
    #single line comment
    /*
    multiple
    line 
    comment
    */

    echo "<h1>This is from php</h1>";

    // $age;
    // $Age;
    // $AGE;

    $x = 5; //global variable

    function test()
    {
        ///
        //   global $x; 
        //     echo $x;
        static $x = 0;
        echo $x;
        $x++;
    }

    test(); //0
    test(); //1
    test(); //2

    define('SAMPLE', 'Juan');

    echo SAMPLE;

    /*
    PHP supports the following data types:

    String
    Integer
    Float (floating point numbers - also called double)
    Boolean
    Array
    Object
    NULL

    PHP divides the operators in the following groups:

    Arithmetic operators
    Assignment operators
    Comparison operators
    Increment/Decrement operators
    Logical operators
    String operators
    Array operators
    Conditional assignment operators

    
    */
    //ifElse
    if (true/*condition */) {
        //codes if true ang condition
    } else {
        //if false
    }

    /**
switch (n) {
  case label1:
    code to be executed if n=label1;
    break;
  case label2:
    code to be executed if n=label2;
    break;
  case label3:
    code to be executed if n=label3;
    break;
    ...
  default:
    code to be executed if n is different from all labels;
} 

while (condition is true) {
  code to be executed;
} 

for (init counter; test counter; increment counter) {
  code to be executed for each iteration;
} 
foreach ($array as $value) {
  code to be executed;
} 
     */
    $colors = array("red", "green", "blue", "yellow");  //indexed array
    // foreach ($colors as $y => $color) {
    //     echo $y . " $color <br>";
    // }
echo '<hr>';
    //associative array
    $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

    $age['Peter'] = "35";
    $age['Ben'] = "37";
    $age['Joe'] = "43";
    echo  "<br>";
    //multidimensional array
    $cars = array (
        array("Volvo",22,18, "sample"),//0
        array("BMW",15,13),//1
        array("Saab",5,2),//2
        array("Land Rover",17,15),//3
        array("Land Rover",17,15),//3
        array("Land Rover",17,15),//3
        array("Land Rover",17,15) //4
      );
      //echo $cars[0][0];
      //echo $cars[2][0];

      for($row = 0; $row < sizeof($cars); $row++){ //$row = 0, 1, 2, 3, 4
        echo "<p><b>Index # $row </b></p>";
        echo "<ul>";
        for($col = 0; $col < sizeof($cars[$row]); $col++){ //$col = 0, 1
            echo '<li>' .$cars[$row][$col] . '</li>';
        }
        echo "</ul>";

      }

      //$cars[0][0]  == Volvo
      //$cars[0][1] == 22
      //$cars[0][2] == 18
      //$cars[1][0] == BMW
      //$cars[1][1] == 15
      //$cars[1][2] == 13
      //$cars[2][0] == Saab
    ?>
    <!--Closing tag-->
</body>

</html>
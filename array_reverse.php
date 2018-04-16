<?php
function reverse_array_order($input){
    $array_reverse = array_reverse($input, true);
    return $array_reverse;
}

$input  = array('a','b','c','d','e','f','g', 1, 2, 3, 4, 5);
$reverse_order = reverse_array_order($input);

echo '<pre>';
echo "<h1>DEFAULT ORDER</h1>";
print_r($input);

echo "<h1>REVERSE ORDER</h1>";
print_r($reverse_order);


// test 3

$str = 'a,b,c,1,2,3';
print_r(explode(',',$str));

$sqlConditions = array(
    'employee_id = ?',
    'date_started >= ?'
);
$sql = "SELECT * FROM employee WHERE (".implode(',',$sqlConditions).")";
echo $sql;

//
// print_r($sqlConditions);
//
// echo implode(',', $sqlConditions);
?>

<?php

//Q1
$x=15;
if ($x > 18) {
   echo "welcome";
}else {
    echo "invalid";
}


//////////////////////////Q2   function
function mult ($x,$y) {
   return x*y;
}
$answer=mult(5,10);
echo answer;



///////////////////////Q3   array function
function arrsum (array $nums) {
     $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }
    return $sum;
  }    
  $myarray=[1,5,9];
 arrsum($myarray);  
   


//Q4    search

$films = array("Fast", "Predestination", "Persuit", "Prestige");
$keyword = "avatar";

foreach ($films as $film) {
    if ($film == $keyword) {
       echo "yes";
    }
    else{echo "no";}
}


//Q5    BUBBLE SORT

function RouteBubble($arr) {
    $count = count($arr);
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

//Q6    MAX

$tests = array(5, 4, 9, 3, 1, 7, 5, 8, 6);
$max = $tests[0];

foreach ($tests as $num) {
    if ($num > $max) {
        $max = $num;
    }
}
echo $max;

//Q7     COUNTING


$films = array("avatar", "Prestige", "avatar", "Prestige");
$keyword = "avatar";
$count = 0;

foreach ($films as $film) {
    if ($film == $keyword) {
        $count++;
    }
}
echo $count;

//Q8     ROUTERANDOM PASS

function RouteRandomPass($length) {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $pass = "";
    for ($i = 0; $i < $length; $i++) {
        $pass = $chars[rand(0, strlen($chars) - 1)];
    }
    return $pass;
}



//Q9     BOOLEAN
////////for/////////
$tests = array(1, "tariq", 1.5, true, 7, 's', false);
for ($i = 0; $i < count($tests); $i++) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "<br>";
    } else {
        echo $tests[$i] . "<br>";
    }
}

/////////while/////////////

$tests = array(1, "tariq", 1.5, true, 7, 's', false);
$i = 0;
while ($i < count($tests)) {
    if (is_bool($tests[$i])) {
        echo ($tests[$i] ? "Yes" : "No") . "<br>";
    } else {
        echo $tests[$i] . "<br>";
    }
    $i++;
}



//Q10     SORTING

$tests = array(6, 4, 9, 3, 12, 8, 7);
sort($tests);
foreach ($tests as $num) {
    echo $num . " ";
}


//Q11    SAME VALUES
$arr1 = array('a', 'b', 'c', 'd');
$arr2 = array('c', 'd', 'e', 'f');
$common = array_intersect($arr1, $arr2);
echo implode(" - ", $common);




?>

<?php

$first_num = 0;
$second_num = 0;
$func = '+';
$ans = 0;

if (isset($_POST['first_num'])){
	$first_num = $_POST['first_num'];
}	
if (isset($_POST['second_num'])){
	$second_num = $_POST['second_num'];
}

if (isset($_POST['func'])){
	$func = $_POST['func'];
}

switch ($func) {

case '+':
$ans = $first_num + $second_num;
break;

case '-':
$ans = $first_num - $second_num;
break;

case '/':
$ans = $first_num / $second_num;
break;

case '*':
$ans = $first_num * $second_num;
break;
}


$total = $ans * 1.13; //Add 13% to the final number.
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculator for IMM-1531</title>
	<link href="css/general.css" rel="stylesheet">
	
</head>

<body>

<form action="index.php" method="post">
	
  <label for="first_num">Number One</label>
  <input type="number" id="first_num" name="first_num"></br></br>

  <label for="second_num">Number Two</label>
  <input type="number" id="second_num" name="second_num"></br></br>

  <label for="func">Function</label>
  <select id="func" name="func">
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
  </select></br></br>

  <button>Calculate</button></br></br>

  <strong>$<?php echo number_format($total, 2); ?></strong></br>

</form>
</body>
</html>

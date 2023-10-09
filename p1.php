<?php

// use function PHPSTORM_META\type;

// 	//$name = readline('Enter a string: ');
// 	// for ($i=0; $i < strlen($name); $i++) { 
// 	// 	echo $name[$i];
// 	// }
// 	// for ($i=0; $i < $name; $i++) { 
// 	// 	echo "ashik";
// 	// }
// // //date_default_timezone_set('UTC+6');
// // date_default_timezone_set('Asia/dhaka');
// // echo date("H:i:s");
// $filename = "/home/ashik/Documents/input.txt";
// $file = fopen($filename, "r");
// $char = fgetc($file);
// echo $char;
?>
<?php
// $filename = "/home/ashik/Documents/input.txt";
// $file = fopen($filename, "r");

// if ($file) {
// 	fscanf($file, "%d", $t);
// 	for ($i = 0; $i < $t; $i++) {
// 		fscanf($file, "%d", $n);
// 		$a = array();
// 		$b = array();
// 		for ($j = 0; $j < $n; $j++) {
// 			fscanf($file, "%d %d", $a[$j], $b[$j]);
// 		}
// 		$x = $a[0];
// 		$y = $b[0];
// 		$ans = $a[0];
// 		for ($j = 1; $j < $n; $j++) {
// 			if ($a[$j] >= $x && $b[$j] >= $y) {
// 				$ans = -1;
// 			}
// 		}
// 		echo $ans . "\n";
// 	}
// 	fclose($file);
// }
?>
<?php
$in = fopen("php://stdin", "r");
$out = fopen("php://stdout", "w");

function get_input(){
	global $in;
	return fgets($in);
}

function output($output){
	global $out;
	fwrite($out, $output);
}

$t = intval(get_input());
while ($t--) {
	$n = intval(get_input());
	$a = array();
	$b = array();

	for ($i = 0; $i < $n; $i++) {
		list($a[], $b[]) = explode(" ", get_input());
	}

	$x = $a[0];
	$y = $b[0];
	$ans = $a[0];

	for ($i = 1; $i < $n; $i++) {
		if ($a[$i] >= $x && $b[$i] >= $y) {
			$ans = -1;
			break;
		}
	}

	output("$ans\n");
}

fclose($in);
fclose($out);
?>


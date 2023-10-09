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
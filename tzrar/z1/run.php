<?php

if ($argc != 2 ) {
	echo "Incorrect argv";
	return;
}
	
    $str = $argv[1];
	
	$open_p = 0;
	$open_p_index = 0;
	$close_p = 0;
	$close_p_index = 0;
	
	if ($str[0] != '(') {
		echo 'First char must be - (';
		return;
	}
	
	for($i=0; $i<strlen($str); $i++) {
		if ($str[$i] == '('){
			
			if ( $open_p_index >= $close_p_index) {
				$open_p++;
				$open_p_index = $i;
			} else {
				echo 'Wrong condition';
				return;
			}
			
		} elseif ($str[$i] == ')') {
				$close_p_index = $i;			
				$close_p++;			
		}
		else {
			echo ' Wrong condition';
			return;
		}
	}

	if ($open_p === $close_p) {
		echo 'Match';
	} else {
		echo 'Mismatch';
	}
	
?>
<?php

	// Get input
	

	$target = $_REQUEST[ 'ip' ];
    // var_dump($target);
	$target=trim($target);

	// var_dump($target);
	// Set blacklist
	$substitutions = array(
		'&'  => '',
		';' => '',
		'|' => '',
		'-'  => '',
		'$'  => '',
		'('  => '',
		')'  => '',
		'`'  => '',
		'||' => '',
	);

	// Remove any of the charactars in the array (blacklist).
	$target = str_replace( array_keys( $substitutions ), $substitutions, $target );
    

	// var_dump($target);

	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		
		$cmd = shell_exec( 'ping  ' . $target );
	}
	else {
		// *nix
		$cmd = shell_exec( 'ping  -c 1 ' . $target );
	}

	// Feedback for the end user
	echo  "<pre>{$cmd}</pre>";



//猥琐的%0a, 127.0.0.1%0awhoami


//`echo "bHMgLw==" | base64 -d`  对于任意命令执行不可用的字符,可以这样绕过

?>
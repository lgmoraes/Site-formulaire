<?php
	// CONSTS
	define('USERNAME_LENGTH_MIN', 3);
	define('PASSWORD_LENGTH_MIN', 3);
	
	// Javascript regex
	$regex_name = "^[A-Za-zÀ-ÖØ-öø-ÿ \-]+$";
	$regex_username = "^[A-Za-z0-9À-ÖØ-öø-ÿ\-_]{". USERNAME_LENGTH_MIN .",}$";
	$regex_password = "^[A-Za-z0-9À-ÖØ-öø-ÿ\-_*@%$!?]{". PASSWORD_LENGTH_MIN .",}$";
	$regex_email = "^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$";
	$regex_date = "^[0-9]{2}/[0-9]{2}/[0-9]{4}$";
	$regex_urlSafeCharacters = "^[A-Za-z0-9_.+!*'(),\$\-]+$";
?>
<?php

    session_start();
    //initialize number if not set or is unset
    if(!isset($_SESSION['number'])){
        $_SESSION['number'] = array();
    }
 
	//check if product is already in the number
	if(!in_array($_POST['number'], $_SESSION['number'])){
		array_push($_SESSION['number'], $_POST['number']);

		$_SESSION['message'] = 'Number added';
	}
	else{
		$_SESSION['message'] = 'Number already added';
	}
 
	header('location: index.php');

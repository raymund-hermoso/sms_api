<?php
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################

if(isset($_POST['send'])) {

    $number = $_POST['number'];
    $message = $_POST['message'];
    $apicode = 'TR-ALEXA950361_BFZ8U';
    $passwd = 'c}4k)i1dpt';

    $result = itexmo($number, $message, $apicode, $passwd);

    if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help. ";	
    }
    else if ($result == 0){
        echo "Message Sent!";
    }
    else{	
        echo "Error Num ". $result . " was encountered!";
    }
}

function itexmo($number, $message, $apicode, $passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}


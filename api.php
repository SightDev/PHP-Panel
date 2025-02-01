<?php
header("Content-Type: application/json; charset=UTF-8");

require_once 'app/require.php';
require_once 'app/controllers/apiController.php';

$apiController = new apiController;

// Check data
if (empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['hwid']) || empty($_POST['key'])) {
	
	$response = array('status' => 'failed', 'error' => 'Missing arguments');

} else {

	$username = $_POST['user'];
	$password = $_POST['pass'];
	$hwid = $_POST['hwid'];
	$key = $_POST['key'];

    ##HOLY SHIT I FOUND IT, IN OUR LOADER API REQUEST
    ## WE ARE CALLING $user, $pass -_- we need to be calling $username, $password. etc etc

	if (API_KEY === $key) {

		$response = $apiController->getUserInfo($username, $password, $hwid);
        echo "[+] Server is verifying your request!";
        echo "[+] Debug enabled, comment debug out to disable";
        echo "[+] Server has initalized and has POSTed user info";

	} else {

		$response = array('status' => 'failed', 'error' => 'Invalid API key');
		
	}

}

echo (json_encode($response));

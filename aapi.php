<?php
header("Content-Type: application/json; charset=UTF-8");

require_once 'app/require.php';
require_once 'app/controllers/apiController.php';

$apiController = new apiController;

// Check if the request is either POST or GET
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Using POST request
    $username = isset($_POST['user']) ? $_POST['user'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $hwid = isset($_POST['hwid']) ? $_POST['hwid'] : '';
    $key = isset($_POST['key']) ? $_POST['key'] : '';
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Using GET request (for debugging or testing purposes)
    $username = isset($_GET['user']) ? $_GET['user'] : '';
    $password = isset($_GET['pass']) ? $_GET['pass'] : '';
    $hwid = isset($_GET['hwid']) ? $_GET['hwid'] : '';
    $key = isset($_GET['key']) ? $_GET['key'] : '';
} else {
    // Invalid request method
    echo json_encode(['status' => 'failed', 'error' => 'Invalid request method']);
    exit;
}

// Check if all necessary arguments are provided
if (empty($username) || empty($password) || empty($hwid) || empty($key)) {
    $response = array('status' => 'failed', 'error' => 'Missing arguments');
} else {
    // Validate API key
    if (API_KEY === $key) {
        // Call method to get user information
        try {
            $response = $apiController->getUserInfo($username, $password, $hwid);
            // Return success
            echo json_encode($response);
        } catch (Exception $e) {
            // Catch any exception thrown by getUserInfo() and return a proper error message
            $response = array('status' => 'failed', 'error' => 'Error while fetching user info: ' . $e->getMessage());
            echo json_encode($response);
        }
    } else {
        // Invalid API key
        $response = array('status' => 'failed', 'error' => 'Invalid API key');
        echo json_encode($response);
    }
}

// Optionally, log the response for debugging purposes (especially in production)
// file_put_contents('api_debug_log.txt', json_encode($response) . "\n", FILE_APPEND);
?>

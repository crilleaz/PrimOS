<?php
include_once('../cfg.php');
$manual = 'Register a new user with password' . PHP_EOL . 'Example usage: register username,password';
$version = '1.0';

if(!$db_host == '') {
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
    // Register the user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $input = isset($_GET['input']) ? $_GET['input'] : '';
        $password = isset($_GET['password']) ? $_GET['password'] : '';
    
        // Split the input string by comma
        $inputData = explode(',', $input);
        $username = isset($inputData[0]) ? trim($inputData[0]) : '';
        $password = isset($inputData[1]) ? trim($inputData[1]) : '';
    
        if (!empty($username) && !empty($password)) {
            // Check if the user already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM $db_table WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result['count'] > 0) {
                echo 'User already exists, choose another username.';
            } else {
                try {
                    // Save the user data into the database
                    $stmt = $pdo->prepare("INSERT INTO $db_table (username, password) VALUES (:username, :password)");
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();
    
                    echo 'User registered successfully and data saved to the database. Username: ' . $username . ', Password: ' . $password;
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
        } else {
            echo 'Please provide both username and password.';
        }
    }
}

?>


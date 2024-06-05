<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file('users.xml') or die("Ne mogu učitati XML datoteku!");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $authenticated = false;
    foreach ($xml->user as $user) {
        if ($user->username == $username && password_verify($password, $user->password)) {
            $_SESSION['username'] = (string)$user->username;
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Neispravno korisničko ime ili lozinka";
    }
} else {
    echo "Forma nije poslana.";
}
?>

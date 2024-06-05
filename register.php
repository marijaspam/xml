<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file('users.xml') or die("Ne mogu učitati XML datoteku!");

    $newUser = $xml->addChild('user');
    $newUser->addChild('username', $_POST['username']);
    $newUser->addChild('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    $newUser->addChild('ime', $_POST['ime']);
    $newUser->addChild('prezime', $_POST['prezime']);

    $xml->asXML('users.xml');

    echo "Registracija uspješna! <a href='index.html'>Prijavite se</a>";
} else {
    echo "Forma nije poslana.";
}
?>


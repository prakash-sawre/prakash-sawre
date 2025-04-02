<?php
$servername = "13.232.9.213";
$username = "Neonicheintegratedworkbechuser";
$password = "N@on(he(he@56!";
$dbname = "neoniche_integrated_2025";

/*$servername = "localhost";
$username ="root";
$password =""; 
$dbname = "neoniche_integrated_2024";
*/

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
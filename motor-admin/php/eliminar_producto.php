<?php
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql_delete = "DELETE FROM stock WHERE id = ?";
    $stmt = $connection->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: control-stock.php"); // o el nombre de tu archivo principal
exit();

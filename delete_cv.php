<?php
include 'db.php';

$id = $_POST['id'];

$conn->query("DELETE FROM cvss WHERE id=$id");

echo "deleted";
?>

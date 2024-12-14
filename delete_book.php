<?php
include 'includes/session.php';
include 'includes/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM books WHERE id=$id");
header("Location: index.php");
?>

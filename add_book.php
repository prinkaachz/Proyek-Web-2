<?php
include 'includes/session.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published_date = $_POST['published_date'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
    move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO books (title, author, genre, published_date, cover_image) VALUES ('$title', '$author', '$genre', '$published_date', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Add New Book</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" required>
            <label>Author</label>
            <input type="text" name="author" required>
            <label>Genre</label>
            <input type="text" name="genre" required>
            <label>Published Date</label>
            <input type="date" name="published_date" required>
            <label>Cover Image</label>
            <input type="file" name="cover_image" required>
            <button type="submit" name="add">Add Book</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
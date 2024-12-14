<?php
include 'includes/session.php';
include 'includes/db.php';

$id = $_GET['id'];
$book = $conn->query("SELECT * FROM books WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published_date = $_POST['published_date'];

    if ($_FILES['cover_image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
        move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);
    } else {
        $target_file = $book['cover_image'];
    }

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', published_date='$published_date', cover_image='$target_file' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Edit Book</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $book['title']; ?>" required>
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
            <label>Genre</label>
            <input type="text" name="genre" value="<?php echo $book['genre']; ?>" required>
            <label>Published Date</label>
            <input type="date" name="published_date" value="<?php echo $book['published_date']; ?>" required>
            <label>Cover Image</label>
            <input type="file" name="cover_image">
            <?php if ($book['cover_image']): ?>
                <p>Current Image:</p>
                <img src="<?php echo $book['cover_image']; ?>" alt="Cover Image" class="cover-image">
            <?php endif; ?>
            <button type="submit">Update Book</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>
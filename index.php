<?php
include 'includes/session.php';
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Library CRUD</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Book List</h2>
        <table>
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Published Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM books");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['cover_image'] . "' alt='Cover Image' style='width: 50px; height: auto;'></td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['genre'] . "</td>";
                    echo "<td>" . $row['published_date'] . "</td>";
                    echo "<td>
                            <a href='edit_book.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete_book.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirmDelete()'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_book.php" class="btn btn-add">Add New Book</a>
    </div>
    <?php include 'includes/footer.php'; ?>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus buku ini?");
        }
    </script>
</body>

</html>
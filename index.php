<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Library Management System</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_book.php">Add Book</a>
            <a href="search_book.php">Search Books</a>
        </nav>
    </header>

    <main>
        <h2>Available Books</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
            <?php
            $stmt = $con->query("SELECT * FROM books");
            while ($row = $stmt->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['year']}</td>
                        <td>{$row['genre']}</td>
                    </tr>";
            }
            ?>
        </table>
    </main>

    <footer>
        <p>&copy; 2023 Library Management System</p>
    </footer>
</body>
</html>
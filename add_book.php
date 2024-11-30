<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add a New Book</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_book.php">Add Book</a>
            <a href="search_book.php">Search Books</a>
        </nav>
    </header>

    <main>
        <form action="add_book.php" method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="number" name="year" placeholder="Year" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <button type="submit">Add Book</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year = $_POST['year'];
            $genre = $_POST['genre'];

            $stmt = $con->prepare("INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$title, $author, $year, $genre])) {
                echo "<p>Book added successfully!</p>";
            } else {
                echo "<p>Failed to add book.</p>";
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 Library Management System</p>
    </footer>
</body>
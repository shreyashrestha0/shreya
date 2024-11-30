<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Search for a Book</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="add_book.php">Add Book</a>
            <a href="search_book.php">Search Books</a>
        </nav>
    </header>

    <main>
        <form action="search_book.php" method="GET">
            <input type="text" name="query" placeholder="Enter book title or author" required>
            <button type="submit">Search</button>
        </form>

        <?php
        if (isset($_GET['query'])) {
            $query = '%' . $_GET['query'] . '%';
            $stmt = $con->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ?");
            $stmt->execute([$query, $query]);
            $results = $stmt->fetch_assoc();

            if ($results) {
                echo "<h2>Search Results:</h2>";
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Year</th>
                            <th>Genre</th>
                        </tr>";
                foreach ($results as $row) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['author']}</td>
                            <td>{$row['year']}</td>
                            <td>{$row['genre']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 Library Management System</p>
    </footer>
</body>
</html>
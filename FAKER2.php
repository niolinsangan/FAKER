<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Insertion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Book Insertion</h1>
    <?php

    require_once 'vendor/autoload.php';
    use Faker\Factory; // Add this line to import the Factory class

    $host = 'localhost';
    $dbname = 'your_database_name'; // Update with your actual database name
    $username = 'your_username'; // Update with your actual username
    $password = 'your_password'; // Update with your actual password


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<div class='alert alert-success'>Database connected successfully.</div>\n";

        $faker = Factory::create();

        $genres = ['Fiction', 'Non-Fiction', 'Biography', 'History', 'Science Fiction', 'Mystery', 'Fantasy', 'Horror', 'Romance', 'Thriller'];

        $numBooks = 10;

        for ($i = 0; $i < $numBooks; $i++) {
            $title = $faker->sentence(3);
            $author = $faker->name;
            $genre = $faker->randomElement($genres);
            $publicationYear = $faker->numberBetween(1900, 2024);
            $isbn = $faker->isbn13;
            $summary = $faker->paragraph;

            $sql = "INSERT INTO Books (Title, Author, Genre, Publication_Year, ISBN, Summary)
                    VALUES (:title, :author, :genre, :publicationYear, :isbn, :summary)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':author' => $author,
                ':genre' => $genre,
                ':publicationYear' => $publicationYear,
                ':isbn' => $isbn,
                ':summary' => $summary
            ]);

            echo "<div>Inserted Book: <strong>$title</strong> by <strong>$author</strong> ($publicationYear)</div>\n";
        }

        echo "<div class='alert alert-info'>Books table populated successfully!</div>\n";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Database error: " . $e->getMessage() . "</div>";
    }
    ?>
</div>
</body>
</html>

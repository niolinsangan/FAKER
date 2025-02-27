<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Insertion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<div class="container">
    <h1>Book Insertion</h1>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <table class='table table-bordered table-striped'>
    <tr>
        <th>Book Title</th>
        <th>Author</th>
        <th>Publication Year</th>
        <th>Genre</th>
    </tr>

    <?php

    require_once 'vendor/autoload.php';
    use Faker\Factory; // Add this line to import the Factory class

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

        echo "<tr>
                <td>$title</td>
                <td>$author</td>
                <td>$publicationYear</td>
                <td>$genre</td>
              </tr>\n";


    }

    echo "</table>";
    echo "<div class='alert alert-info'>Books data generated successfully!</div>\n";


    ?>
</div>
</body>
</html>

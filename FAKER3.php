<?php
require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

// Function to generate a UUID
function generateUUID() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

// Generate 10 fake user accounts
$users = [];
for ($i = 0; $i < 10; $i++) {
    $fullName = $faker->name;
    $email = $faker->unique()->email;
    $username = strtolower(explode('@', $email)[0]);
    $password = hash('sha256', $faker->password);
    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

    $users[] = [
        'id' => generateUUID(),
        'fullName' => $fullName,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'accountCreated' => $accountCreated
    ];
}

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
echo "<table class='table table-bordered table-striped'>";

echo "<tr>
        <th>User ID</th>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Username</th>
        <th>Password (SHA-256)</th>
        <th>Account Created</th>
      </tr>";

foreach ($users as $user) {
    echo "<tr>
            <td>{$user['id']}</td>
            <td>{$user['fullName']}</td>
            <td>{$user['email']}</td>
            <td>{$user['username']}</td>
            <td>{$user['password']}</td>
            <td>{$user['accountCreated']}</td>
          </tr>";
}

echo "</table>";
?>

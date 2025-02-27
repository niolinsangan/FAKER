<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('fil_PH');
$data = [];

for ($i = 0; $i < 5; $i++) {
    $data[] = [
        'full_name' => $faker->name(),
        'email' => $faker->safeEmail(),
        'phone' => $faker->phoneNumber(),
        'address' => $faker->address(),
        'birthdate' => $faker->date('Y-m-d'),
        'job_title' => $faker->jobTitle(),
    ];
}

for ($i = 0; $i < 5; $i++) {
    $data[] = [
        'full_name' => $faker->name(),
        'email' => $faker->safeEmail(),
        'phone' => $faker->phoneNumber(),
        'address' => $faker->address(),
        'birthdate' => $faker->date('Y-m-d'),
        'job_title' => $faker->jobTitle(),
    ];
}

header('Content-Type: text/html');
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
echo '<div><h1>Generated User Data</h1><table class="table table-bordered"><thead><tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Birthdate</th><th>Job Title</th></tr></thead><tbody>';


foreach ($data as $user) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($user['full_name']) . '</td>';
    echo '<td>' . htmlspecialchars($user['email']) . '</td>';
    echo '<td>' . htmlspecialchars($user['phone']) . '</td>';
    echo '<td>' . htmlspecialchars($user['address']) . '</td>';
    echo '<td>' . htmlspecialchars($user['birthdate']) . '</td>';
    echo '<td>' . htmlspecialchars($user['job_title']) . '</td>';
    echo '</tr>';

}
echo '</tbody></table></div>';




?>

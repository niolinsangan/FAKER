<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('fil_PH');

$employees = [];
$offices = [];
$transactions = [];

for ($i = 1; $i <= 200; $i++) {
    $employees[] = [
        'id' => $i,
        'lastname' => $faker->lastName(),
        'firstname' => $faker->firstName(),
        'office_id' => $faker->numberBetween(1, 50),
        'address' => $faker->address(),
    ];
}

for ($i = 1; $i <= 50; $i++) {
    $offices[] = [
        'id' => $i,
        'name' => $faker->company(),
        'contactnum' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'address' => $faker->address(),
        'city' => $faker->city(),
        'country' => 'Philippines',
        'postal' => $faker->postcode(),
    ];
}

for ($i = 1; $i <= 500; $i++) {
    $dateLog = $faker->dateTimeBetween('-1 year', 'now');

    $transactions[] = [
        'id' => $i,
        'employee_id' => $faker->numberBetween(1, 200),
        'office_id' => $faker->numberBetween(1, 50),
        'datelog' => $dateLog->format('Y-m-d H:i:s'),
        'action' => $faker->word(),
        'remarks' => $faker->sentence(),
        'documentcode' => $faker->uuid(),
    ];
}

// Output the generated data
header('Content-Type: application/json');
echo json_encode(['employees' => $employees, 'offices' => $offices, 'transactions' => $transactions], JSON_PRETTY_PRINT);
?>

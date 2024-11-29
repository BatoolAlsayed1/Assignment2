<?php

$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$response= file_get_contents($URL);
$result= json_decode($response, true);
#var_dump($result);
$result = $result['results'];

if (empty($result) || $response === false ) {
    echo "Error on fetching data.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Students and their Nationality</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    table {
        overflow: auto;
        display: block;
    }
</style>
</head>
<body>
    <h1 class="text-center fw-bold mt-4 mb-4">UOB - Students Enrollment by Nationality</h1>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>The Programs</th>
                <th>Nationality</th>
                <th>Colleges</th>
                <th>Number of Students</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['semester']  . "</td>";
                echo "<td>" . $row['the_programs']  . "</td>";
                echo "<td>" . $row['nationality']  . "</td>";
                echo "<td>" . $row['colleges']  . "</td>";
                echo "<td>" . $row['number_of_students'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>


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
            table-layout: auto; 
            width: 100%; 
        }
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            margin: 0;
            background-color: #f8f9fa;
            padding:20px;
        }
        .container {
            max-width: 90%;
            padding:15px;
            background:#ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;     
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            font-size: clamp(3px, 2vw, 16px);
        }
    </style>
</head>
<body>
<h1>UOB - Students Enrollment by Nationality</h1>
<div class="container">
    <div class="table-responsive">
            <div class="table-responsive">
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
            </div>
    </div>
</div>  
</body>
</html>


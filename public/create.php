<?php
include "../config/db.php";

if (isset($_POST['submit'])) {

    // ===== Animal =====
    $AnimalType   = $_POST['AnimalType'];
    $Breed        = $_POST['Breed'];
    $Age          = $_POST['Age'];
    $HealthStatus = $_POST['HealthStatus'];
    $Weight       = $_POST['Weight'];

    $sql = "INSERT INTO animals (AnimalType, Breed, Age, HealthStatus, Weight)
            VALUES ('$AnimalType', '$Breed', '$Age', '$HealthStatus', '$Weight')";

    if (!mysqli_query($conn, $sql)) {
        die("Animal Error: " . mysqli_error($conn));
    }

    $AnimalID = $conn->insert_id; // ✅ USE THIS EVERYWHERE


    // ===== Crop =====
    $CropName = $_POST['CropName'];
    $Quantity = $_POST['Quantity'];

    $sql1 = "INSERT INTO crops (AnimalID, CropName, Quantity)
             VALUES ('$AnimalID', '$CropName', '$Quantity')";

    if (!mysqli_query($conn, $sql1)) {
        die("Crop Error: " . mysqli_error($conn));
    }


    // ===== Employee =====
    $JobTitle = $_POST['JobTitle'];
    $Salary   = $_POST['Salary'];
    $Contact  = $_POST['Contact'];

    $sql2 = "INSERT INTO employees (AnimalID, JobTitle, Salary, Contact)
             VALUES ('$AnimalID', '$JobTitle', '$Salary', '$Contact')";

    if (!mysqli_query($conn, $sql2)) {
        die("Employee Error: " . mysqli_error($conn));
    }


    // ===== Feed =====
    $FeedType = $_POST['FeedType'];

    $sql3 = "INSERT INTO feed (AnimalID, FeedType, Quantity)
             VALUES ('$AnimalID', '$FeedType', '$Quantity')";

    if (!mysqli_query($conn, $sql3)) {
        die("Feed Error: " . mysqli_error($conn));
    }


    // ===== Irrigation =====
    $WaterUsed = $_POST['WaterUsed'];
    $Method    = $_POST['Method'];

    $sql4 = "INSERT INTO irrigation (AnimalID, WaterUsed, Method)
             VALUES ('$AnimalID', '$WaterUsed', '$Method')";

    if (!mysqli_query($conn, $sql4)) {
        die("Irrigation Error: " . mysqli_error($conn));
    }


    // ===== Task =====
    $TaskName = $_POST['TaskName'];
    $Status   = $_POST['Status'];

    $sql5 = "INSERT INTO tasks (AnimalID, TaskName, Status)
             VALUES ('$AnimalID', '$TaskName', '$Status')";

    if (!mysqli_query($conn, $sql5)) {
        die("Task Error: " . mysqli_error($conn));
    }

    echo "<p class='message'>All data added successfully!</p>";
}
?>

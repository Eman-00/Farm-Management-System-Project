<?php
include "../config/db.php";

if(isset($_POST['submit'])) {

    // ====== Project fields (animals table) ======
    $AnimalType   = $_POST['AnimalType'];
    $Breed         = $_POST['Breed'];
    $Age           = $_POST['Age'];
    $HealthStatus = $_POST['HealthStatus'];
    $Weight        = $_POST['Weight'];
    // ===========================================

    // ====== animals table ======
    $sql = "INSERT INTO animals (AnimalType, Breed, Age, HealthStatus, Weight)
            VALUES ('$AnimalType', '$Breed', '$Age', '$HealthStatus', '$Weight')";
    // ==========================

    if(mysqli_query($conn, $sql)){
        $AnimalID  = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }
    
    $AnimalID = $_POST['AnimalID'];
    $CropName   = $_POST['CropName'];
    $Quantity = $_POST['Quantity'];
    $Weight  = $_POST['Weight'];
    // ===========================================

    // ====== animals table ======
    $sql1 = "INSERT INTO crops (AnimalID, CropName, Quantity)
            VALUES ('$AnimalID', '$CropName', '$Quantity')";
    // ==========================

    if(mysqli_query($conn, $sql1)){
        $CropID  = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }
    $AnimalID = $_POST['AnimalID'];
    $JobTitle   = $_POST['JobTitle'];
    $Salary  = $_POST['Salary'];
    $Contact  = $_POST['Contact'];
    $Quantity = $_POST['Quantity'];
    // ===========================================

    // ====== animals table ======
    $sql2 = "INSERT INTO employees (AnimalID, JobTitle, Salary, Contact)
            VALUES ('$AnimalID',  '$JobTitle', '$Salary', '$Contact')";
    // ==========================

    if(mysqli_query($conn, $sql2)){
        $EmployeeID  = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }
    $AnimalID = $_POST['AnimalID'];
    $FeedType   = $_POST['FeedType'];
    $Quantity  = $_POST['Quantity'];
    // ===========================================

    // ====== animals table ======
    $sql3 = "INSERT INTO feed ($AnimalID, FeedType, Quantity)
            VALUES ('$AnimalID', '$FeedType', '$Quantity')";
    // ==========================

    if(mysqli_query($conn, $sql3)){
        $FeedID = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }

    $AnimalID = $_POST['AnimalID'];
    $WaterUsed   = $_POST['WaterUsed'];
    $Method  = $_POST['Method'];
    // ===========================================

    // ====== animals table ======
    $sql4 = "INSERT INTO irrigation ($AnimalID, WaterUsed, Method)
            VALUES ('AnimalID', '$WaterUsed', '$Method')";
    // ==========================

    if(mysqli_query($conn, $sql4)){
        $IrrigationID  = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }

$AnimalID = $_POST['AnimalID'];
    $TaskName   = $_POST['TaskName'];
    $Status  = $_POST['Status'];
    // ===========================================

    // ====== animals table ======
    $sql5 = "INSERT INTO tasks (AnimalID, TaskName, Status)
            VALUES ('$AnimalID', '$TaskName', '$Status')";
    // ==========================

    if(mysqli_query($conn, $sql5)){
        $TaskID   = $conn->insert_id;
    } else {
        die("Error: ".mysqli_error($conn));
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Animal Management System</title>
    <link rel="stylesheet" href="../assets/css/create.css">

    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 90%; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px 12px; text-align: left; }
        form { margin-bottom: 20px; }
        input[type=text], input[type=number] {
            padding: 6px; margin: 4px 0; width: 200px;
        }
        input[type=submit] { padding: 6px 12px; }
        .message { color: green; }
    </style>
</head>
<body>
    <h2>Animal Management System</h2>
    <form method="POST" action="">
    <h2>Animal</h2>
    <label>Animal Type:</label>
    <input type="text" name="AnimalType" required><br>

    <label>Breed:</label>
    <input type="text" name="Breed" required><br>

    <label>Age:</label>
    <input type="number" name="Age" required><br>

    <label>Health Status:</label>
    <input type="text" name="HealthStatus" required><br>

    <label>Weight:</label>
    <input type="number" step="0.01" name="Weight" required><br>

    <h2>Crop</h2>
    <label>CropName:</label>
    <input type="text" name="CropName" required><br>

    <label>Quantity:</label>
    <input type="text" name="Quantity" required><br>

    <h2>Employee</h2>
    <label>JobTitle:</label>
    <input type="text" name="JobTitle" required><br>

    <label>Salary:</label>
    <input type="text" name="Salary" required><br>

    <label>Contact:</label>
    <input type="number" name="Contact" required><br>

    <h2>Feed</h2>
    <label>FeedType:</label>
    <input type="text" name="FeedType" required><br>

    <label>Quantity:</label>
    <input type="text" name="Quantity" required><br>

    
    <h2>irrigation</h2>
    <label>WaterUsed:</label>
    <input type="text" name="WaterUsed" required><br>

    <label>Method:</label>
    <input type="text" name="Method" required><br>

    <h2>Task</h2>
    <label>TaskName:</label>
    <input type="text" name="TaskName" required><br>

    <label>Status:</label>
    <input type="text" name="Status" required><br>


    <br><br>
    <input type="submit" name="submit" value="Add Animal">
</form>
</body>
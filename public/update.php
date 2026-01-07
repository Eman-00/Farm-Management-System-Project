<?php
include "../config/db.php";

$AnimalID = $_GET['AnimalID'];
$result = mysqli_query($conn, "SELECT * FROM animals WHERE AnimalID=$AnimalID");
$data = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM crops WHERE AnimalID=$AnimalID");
$data1 = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM employees WHERE AnimalID=$AnimalID");
$data2 = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM feed WHERE AnimalID=$AnimalID");
$data3 = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM irrigation WHERE AnimalID=$AnimalID");
$data4 = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $AnimalType   = $_POST['AnimalType'];
    $Breed         = $_POST['Breed'];
    $Age           = $_POST['Age'];
    $HealthStatus = $_POST['HealthStatus'];
    $Weight        = $_POST['Weight'];

    mysqli_query($conn, "UPDATE animals SET AnimalType='$AnimalType', Breed='$Breed', Age='$Age', HealthStatus='$HealthStatus', Weight='$Weight' WHERE AnimalID=$AnimalID");

    $CropName   = $_POST['CropName'];
    $Quantity = $_POST['Quantity'];
    $Weight  = $_POST['Weight'];

    mysqli_query($conn, "UPDATE crops SET CropName='$CropName', Quantity='$Quantity', Weight='$Weight' WHERE AnimalID=$AnimalID");    

    $JobTitle   = $_POST['JobTitle'];
    $Salary  = $_POST['Salary'];
    $Contact  = $_POST['Contact'];
    $Quantity = $_POST['Quantity'];

    mysqli_query($conn, "UPDATE employees SET JobTitle='$JobTitle', Salary='$Salary', Contact='$Contact', Quantity='$Quantity' WHERE AnimalID=$AnimalID");

    $FeedType   = $_POST['FeedType'];
    $Quantity  = $_POST['Quantity'];

    mysqli_query($conn, "UPDATE feed SET FeedType='$FeedType', Quantity='$Quantity' WHERE AnimalID=$AnimalID");

    $WaterUsed   = $_POST['WaterUsed'];
    $Method  = $_POST['Method'];

    mysqli_query($conn, "UPDATE irrigation SET WaterUsed='$WaterUsed', Method='$Method' WHERE AnimalID=$AnimalID");

    header("Location: index.php");
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
    <form method="POST" action="update.php<? echo $AnimalID; ?>">
    <h2>Animal</h2>
    <label>Animal Type:</label>
    <input type="text" name="AnimalType" value="<?= $data['AnimalType'] ?? '' ?>" required><br>

    <label>Breed:</label>
    <input type="text" name="Breed" value="<?= $data['Breed'] ?? '' ?>" required><br>

    <label>Age:</label>
    <input type="number" name="Age" value="<?= $data['Age'] ?? '' ?>" required><br>

    <label>Health Status:</label>
    <input type="text" name="HealthStatus" value="<?= $data['HealthStatus'] ?? '' ?>" required><br>

    <label>Weight:</label>
    <input type="number" step="0.01" name="Weight" value="<?= $data['Weight'] ?? '' ?>" required><br>

    <h2>Crop</h2>
    <label>CropName:</label>
    <input type="text" name="CropName" value="<?= $data1['CropName'] ?? '' ?>" required><br>

    <label>Quantity:</label>
    <input type="text" name="Quantity" value="<?= $data1['Quantity'] ?? '' ?>" required><br>

    <h2>Employee</h2>
    <label>JobTitle:</label>
    <input type="text" name="JobTitle" value="<?= $data2['JobTitle'] ?? '' ?>" required><br>

    <label>Salary:</label>
    <input type="text" name="Salary" value="<?= $data2['Salary'] ?? '' ?>" required><br>

    <label>Contact:</label>
    <input type="number" name="Contact" value="<?= $data2['Contact'] ?? '' ?>" required><br>

    <h2>Feed</h2>
    <label>FeedType:</label>
    <input type="text" name="FeedType" value="<?= $data3['FeedType'] ?? '' ?>" required><br>

    <label>Quantity:</label>
    <input type="text" name="Quantity" value="<?= $data3['Quantity'] ?? '' ?>" required><br>

    
    <h2>irrigation</h2>
    <label>WaterUsed:</label>
    <input type="text" name="WaterUsed" value="<?= $data4['WaterUsed'] ?? '' ?>" required><br>

    <label>Method:</label>
    <input type="text" name="Method" value="<?= $data4['Method'] ?? '' ?>" required><br>

    <h2>Task</h2>
    <label>TaskName:</label>
    <input type="text" name="TaskName" value="<?= $data5['TaskName'] ?? '' ?>" required><br>

    <label>Status:</label>
    <input type="text" name="Status" value="<?= $data5['Status'] ?? '' ?>" required><br>


    <br><br>
    <input type="submit" name="submit" value="Add Animal">
</form>
</body>
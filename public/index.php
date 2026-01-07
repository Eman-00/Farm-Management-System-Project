<?php

include '../config/db.php';   // your DB connection file

// Initialize message variable
$message = "";

// ===============================
// Handle form submission to add new record
// ===============================
if(isset($_POST['submit'])) {

    // ====== Project fields (animals table) ======
    $animal_type   = $_POST['animal_type'];
    $breed         = $_POST['breed'];
    $age           = $_POST['age'];
    $health_status = $_POST['health_status'];
    $weight        = $_POST['weight'];
    // ===========================================

    // ====== animals table ======
    $sql = "INSERT INTO animals (AnimalType, Breed, Age, HealthStatus, Weight)
            VALUES ('$animal_type', '$breed', '$age', '$health_status', '$weight')";
    // ==========================

    if(mysqli_query($conn, $sql)){
        $message = "Animal record added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// ===============================
// Fetch all records to display in table
// ===============================
$sql_fetch = "SELECT * FROM animals";
$result = mysqli_query($conn, $sql_fetch);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animal Management System</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <div class="logo-container">
    <div class="farm-icon">🌱</div>
    <span class="farm-name">Farm Management System</span>
</div>
<hr style="border: 1px solid #ddd; width: 100%; margin: 20px 0;">
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

<button><a href="create.php">Add new</a></button>

<!-- Display message -->
<?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>

<!-- ===============================
     Form to add new animal
================================ -->


<!-- ===============================
     Display table of animals
================================ -->
<table>
    <thead>
        <tr>
            <th>Animal ID</th>
            <th>Animal Type</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Health Status</th>
            <th>Weight</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['AnimalID']."</td>
                        <td>".$row['AnimalType']."</td>
                        <td>".$row['Breed']."</td>
                        <td>".$row['Age']."</td>
                        <td>".$row['HealthStatus']."</td>
                        <td>".$row['Weight']."</td>
                        <td><a href='update.php?AnimalID=".$row['AnimalID']."'>Edit</a></td>
                        <td><a href='delete.php?AnimalID=".$row['AnimalID']."'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
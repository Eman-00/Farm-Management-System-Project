<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "FarmManagement_System";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<?php
include("connection.php"); // database connection

<?php
// ===============================
// Include database connection
// ===============================
include 'db.php';   // your DB connection file

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

<!-- Display message -->
<?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>

<!-- ===============================
     Form to add new animal
================================ -->
<form method="POST" action="">
    <label>Animal Type:</label>
    <input type="text" name="animal_type" required>

    <label>Breed:</label>
    <input type="text" name="breed" required>

    <label>Age:</label>
    <input type="number" name="age" required>

    <label>Health Status:</label>
    <input type="text" name="health_status" required>

    <label>Weight:</label>
    <input type="number" step="0.01" name="weight" required>

    <br><br>
    <input type="submit" name="submit" value="Add Animal">
</form>

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

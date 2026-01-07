<?php
include "../config/db.php";

if (isset($_GET['AnimalID'])) {

    $AnimalID = $_GET['AnimalID'];

    mysqli_query($conn, "DELETE FROM animals WHERE AnimalID='$AnimalID'");
    mysqli_query($conn, "DELETE FROM crops WHERE AnimalID='$AnimalID'");
    mysqli_query($conn, "DELETE FROM employees WHERE AnimalID='$AnimalID'");
    mysqli_query($conn, "DELETE FROM feed WHERE AnimalID='$AnimalID'");
    mysqli_query($conn, "DELETE FROM irrigation WHERE AnimalID='$AnimalID'");
    mysqli_query($conn, "DELETE FROM tasks WHERE AnimalID='$AnimalID'");

    header("Location: index.php");
    exit();
}
?>

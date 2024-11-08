<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.html"); // Redirect to login if not logged in
    exit;
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'employee_management');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new employee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employee'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";
    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all employees
$employees = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    
    <!-- Employee registration form -->
    <h2>Add New Employee</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="position" placeholder="Position" required>
        <input type="number" step="0.01" name="salary" placeholder="Salary" required>
        <input type="submit" name="add_employee" value="Add Employee">
    </form>

    <!-- List of employees -->
    <h2>Employee List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
        </tr>
        <?php while ($row = $employees->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['position']; ?></td>
            <td><?php echo $row['salary']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>

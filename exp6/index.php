<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud_app";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$update_mode = false;
$edit_id = 0;
$edit_name = "";
$edit_email = "";
$edit_role = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = "INSERT INTO users (name, email, role) VALUES ('$name', '$email', '$role')";
        if ($conn->query($sql) === TRUE) {
            $message = "Record inserted successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $message = "Record updated successfully!";
        } else {
            $message = "Error updating record: " . $conn->error;
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully!";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}

if (isset($_GET['edit'])) {
    $update_mode = true;
    $edit_id = $_GET['edit'];

    $sql = "SELECT * FROM users WHERE id=$edit_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $edit_name = $row['name'];
        $edit_email = $row['email'];
        $edit_role = $row['role'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        form { margin-bottom: 20px; display: flex; flex-direction: column; gap: 10px; }
        input, select, button { padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px;}
        button { background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        .success { color: green; font-weight: bold; text-align: center; }
        .actions a { margin-right: 10px; text-decoration: none; color: white; padding: 5px 10px; border-radius: 4px; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h2>User Management System</h2>

    <?php if ($message != "") echo "<p class='success'>$message</p>"; ?>

    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $edit_id; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $edit_name; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $edit_email; ?>" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="Student" <?php if($edit_role == "Student") echo "selected"; ?>>Student</option>
            <option value="Teacher" <?php if($edit_role == "Teacher") echo "selected"; ?>>Teacher</option>
            <option value="Admin" <?php if($edit_role == "Admin") echo "selected"; ?>>Admin</option>
        </select>

        <?php if ($update_mode): ?>
            <button type="submit" name="update" style="background-color: #007bff;">Update User</button>
            <a href="index.php" style="text-align: center; display: block; margin-top: 10px; color: #007bff;">Cancel Edit</a>
        <?php else: ?>
            <button type="submit" name="add">Add User</button>
        <?php endif; ?>
    </form>

    <hr>

    <h3>User List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>

        <?php

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td class='actions'>
                            <a href='index.php?edit={$row['id']}' class='btn-edit'>Edit</a>
                            <a href='index.php?delete={$row['id']}' class='btn-delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>No records found.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php

$conn->close();
?>
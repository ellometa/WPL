Here is a comprehensive guide and code solution for your CRUD application. Since I cannot interact with your local XAMPP installation, I have outlined the exact steps you need to follow, alongside a checklist of when and where to take screenshots for your assignment documentation.

### 📸 XAMPP Setup & Screenshot Instructions

Follow these steps carefully and take screenshots at the marked checkpoints.

**Part 1: Setup & Database Configuration**
1. **Start XAMPP:** Open your XAMPP Control Panel. Start the `Apache` and `MySQL` modules. They should turn green.
   - 📸 **Screenshot 1:** Take a picture of the XAMPP Control Panel showing both Apache and MySQL running.
2. **Open phpMyAdmin:** Go to `http://localhost/phpmyadmin` in your web browser.
3. **Create Database:** Click on "New" on the left sidebar, name the database `crud_app`, and click "Create".
4. **Run SQL Query:** Go to the "SQL" tab at the top and paste the following query to create your table, then hit "Go":
   ```sql
   CREATE TABLE users (
       id INT(11) AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       role VARCHAR(50) NOT NULL
   );
   ```
   - 📸 **Screenshot 2:** Take a picture of the `users` table structure in phpMyAdmin to show it was successfully created.

**Part 2: Running the Application & CRUD Operations**
1. **Place the Files:** In your `xampp/htdocs/` folder, create a new folder named `exp6`. Save the PHP code provided below as `index.php` inside this folder.
2. **Open the App:** Navigate to `http://localhost/exp6/index.php` in your browser.
   - 📸 **Screenshot 3 (HTML Form):** Take a picture of the empty HTML input form and the empty user table.
3. **Insert Data:** Fill out the form with sample data and click "Add User".
   - 📸 **Screenshot 4 (Insert/Fetch):** Take a picture showing the success message and the newly inserted data displayed in the table below.
4. **Update Data:** Click the "Edit" link next to the user you just added. Change the data and click "Update User".
   - 📸 **Screenshot 5 (Update):** Take a picture showing the updated information in the table and the success message.
5. **Delete Data:** Click the "Delete" link next to a user.
   - 📸 **Screenshot 6 (Delete):** Take a picture showing the table after the user has been removed.
   - 📸 **Screenshot 7 (Database Verification):** Go back to phpMyAdmin, browse the `users` table, and take a screenshot proving the data changes (insertions/deletions) reflect in the database backend.

---

### 💻 The Code Implementation (`index.php`)

Save the following code in a file named `index.php` inside your `xampp/htdocs/exp6` directory. It contains both the HTML form and the PHP logic (connection, insert, fetch, update, delete) in a single easy-to-use file.

```php
<?php
// 1 & 3. Establish PHP-MySQL connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud_app";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variables for Update operation
$update_mode = false;
$edit_id = 0;
$edit_name = "";
$edit_email = "";
$edit_role = "";
$message = "";

// 6. Execute queries based on action
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // INSERT OPERATION
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

    // UPDATE OPERATION
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

// DELETE OPERATION
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully!";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}

// Check if Edit button was clicked to populate the form
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

    <!-- 4. HTML form for data input -->
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

    <!-- 7. Display results -->
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
        // Fetch operations
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
// 8. Close database connection
$conn->close();
?>
```

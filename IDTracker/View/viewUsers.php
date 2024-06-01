<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <link rel="stylesheet" href="./assets/css/admin.css">
    </head>
    <body>
        <h1>User List</h1>
        <br>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th>password</th>
            </tr>

            <?php
                include "Model/database.php";

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['full_name']."</td>";
                        echo "<td>".$row['id_no']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No users found</td></tr>";
                }
                $conn->close();
            ?>
        </table>
        <button>Reset id</button>
    </body>
</html>

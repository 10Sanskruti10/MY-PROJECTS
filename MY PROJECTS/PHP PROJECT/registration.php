<?php
session_start();
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if ($username && $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
        $sql->bind_param("ss", $username, $hashedPassword);

        if ($sql->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql->error;
        }

        $sql->close();
    } else {
        echo "<p style='color:red;'>Please fill in all fields!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="container mt-3 text-center">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h3>Admin Registration</h3>

                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        required />
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required />
                                    <label for="password">Password</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
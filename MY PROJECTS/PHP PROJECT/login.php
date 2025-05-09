<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uname = isset($_POST["uname"]) ? trim($_POST["uname"]) : null;
    $pass = isset($_POST["password"]) ? trim($_POST["password"]) : null;

    if ($uname && $pass) {
        $sql = $conn->prepare("SELECT id, password FROM admin WHERE username=?"); 
        $sql->bind_param("s", $uname);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($id, $password);

        if ($sql->fetch() && password_verify($pass, $password)) {
            $_SESSION["username"] = $uname;
            header("Location: index.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid Username or Password</p>";
        }

        $sql->close();
    } else {
        echo "<p style='color:red;'>Please fill in all fields!</p>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center mb-3">Login Page</h3>

                            <form action="" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="uname" placeholder="Username"
                                        required />
                                    <label for="uname">Username</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required />
                                    <label for="password">Password</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Login</button>
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